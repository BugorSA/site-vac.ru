<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/1)
     */
    public function number()
    {
        $number = random_int(0, 100);

        return $this->render('1.html.twig', [
            'number' => $number,
        ]);
    }
}