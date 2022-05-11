<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


Class helloController {
    /**
     * @Route("hello")
     */
    public function hello(): Response {
        echo "hello world";
        return new Response;
    }

    /**
     * @Route("hello/{name}")
     */
    public function helloName($name): Response {
        echo "hello $name";
        return new Response;
    }
}