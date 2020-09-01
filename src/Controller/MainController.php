<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{

    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        return $this->render('interview/first.html.twig');
    }

    public function second(Request $request): Response
    {
        $name = $request->get("name");
        $mail = $request->get("email");
        $phone = $request->get("phone");

        return new Response($name.' '.$mail.' '.$phone);
    }
}