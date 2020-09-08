<?php
declare(strict_types=1);

namespace App\Exception;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Symfony\Component\Validator\Exception\ValidatorException;

class ExceptionListener
{
    public function onKernelException(ExceptionEvent $event)
    {
        // You get the exception object from the received event
        $exception = $event->getThrowable();
        $message = sprintf(
            'My Error says: %s with code: %s',
            $exception->getMessage(),
            $exception->getCode()
        );
        if (!$exception instanceof ValidatorException){
            return;
        }
        dump($exception);
        // Customize your response object to display the exception details
        $response = new Response();
        $response->setContent($message);

        if ($exception instanceof ValidatorException) {
            dump($exception);
            $response->setStatusCode($exception->getStatusCode());
            $response->headers->replace($exception->getHeaders());
        } else {
            $response->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        // HttpExceptionInterface is a special type of exception that
        // holds status code and header details
//        if ($exception instanceof HttpExceptionInterface) {
//            $response->setStatusCode($exception->getStatusCode());
//            $response->headers->replace($exception->getHeaders());
//        } else {
//            $response->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
//        }

        // sends the modified response object to the event
        $event->setResponse($response);
    }
}
