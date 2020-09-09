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
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if ($request->query->get("auth_key") === 'junior_test'){ //$_GET["auth_key"]
            $serializer = $this->container->get('serializer');
            echo $this->getJsonList($serializer);
            return new Response();
        }
        return $this->render('interview/first.html.twig');
    }

    /**
     * @Route("/send", name="ajaxRequestHandler")
     * @param Request $request
     * @param ValidatorInterface $validator
     * @return Response
     * @throws MyException
     */
    public function ajaxRequestHandler(Request $request, ValidatorInterface $validator): Response
    {
        $resume =$this->getResumeFromRequest($request);
        $this->addResume($resume, $validator);
        return new Response("OK",200);
    }

    /**
     * @param Resume $resume
     * @param ValidatorInterface $validator
     * @throws MyException
     */
    private function addResume(Resume $resume, ValidatorInterface $validator)
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

    private function getJsonList(Serializer $serializer){
        $array_resume = $this->getResumeList();//
        return $serializer->serialize($array_resume, 'json');
    }

    private function getResumeList(): array
    {
        return $this->getDoctrine()->getRepository(Resume::class)->findAll();
    }

    private function getResumeFromRequest(Request $request): Resume
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
        return new Resume($name,$mail,$phone,$area,$expected_profit,$provider,($fran_checks === "Да"),$about_me,$about_future,$date);
    }
}