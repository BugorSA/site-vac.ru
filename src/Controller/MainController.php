<?php
declare(strict_types=1);

namespace App\Controller;


use App\Entity\Resume;
use App\Exception\MyException;
use DateTime;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class MainController extends AbstractController
{


    /**
     * @Route("/", name="index")
     */
    public function index(Request $request)
    {
        if ($request->get("auth_key") === 'junior_test'){ //$request->get("auth_key") $_GET["auth_key"]
            $serializer = $this->container->get('serializer');
            echo $this->getJsonList($serializer);
            return new Response();
        }
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
        $expected_profit = $request->get("price");
        $provider = $request->get("provider");
        $fran_checks = $request->get("fran");
        $about_me = $request->get("comment");
        $about_future = $request->get("comment2");
        $date = new DateTime();
        if ($areaAn !== "") {
            $area = $areaAn;
        }
        $resume = new Resume;
        $resume->setName($name);
        $resume->setEmail("wdafsdgf");
        $resume->setTelephone($phone);
        $resume->setArea($area);
        $resume->setExpectedProfit($expected_profit);
        $resume->setProvider($provider);
        $resume->setFranChecks(($fran_checks === "Да"));
        $resume->setAboutMe($about_me);
        $resume->setAboutFuture($about_future);
        $resume->setDepartureDate($date);
        $answer = $this->addResume($resume, $validator);
        return new Response("$answer");
    }

    public function addResume(Resume $resume, ValidatorInterface $validator)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $errors = $validator->validate($resume);
        if (count($errors) === 0) {
            $entityManager->persist($resume);
            $entityManager->flush();
        }
        else{
            throw new MyException((string)$errors, 400);
        }
    }

    public function getJsonList(Serializer $serializer){
        $array_resume = $this->getResumeList();//
        return $serializer->serialize($array_resume, 'json');
    }

    public function getResumeList(): array
    {
        return $this->getDoctrine()->getRepository(Resume::class)->findAll();
    }
}