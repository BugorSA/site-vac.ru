<?php


namespace App\Controller;


use App\Entity\Resume;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class MainController extends AbstractController
{


    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        return $this->render('interview/first.html.twig');
    }

    /**
     * @Route("/second", name="second")
     */
    public function second(Request $request, ValidatorInterface $validator): Response
    {
        $name = $request->get("name");
        $mail = $request->get("email");
        $phone = $request->get("phone");
        $area = $request->get("area");
        $areaAn = $request->get("areaAn");
        if ($areaAn !== "") {
            $area = $areaAn;
        }
        $resume = new Resume;
        $resume->setName($name);
        $resume->setEmail($mail);
        $resume->setTelephone($phone);
        $resume->setArea($area);
        $answer = $this->addResume($resume, $validator);
        return new Response("$answer");
    }

    public function addResume(Resume $resume, ValidatorInterface $validator): string
    {
        $entityManager = $this->getDoctrine()->getManager();
        $errors = $validator->validate($resume);
        if (count($errors) === 0) {
            $entityManager->persist($resume);
            $entityManager->flush();
        }
        return (string)$errors;
    }
}