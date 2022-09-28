<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Test\Constraint\ResponseStatusCodeSame;
use function Symfony\component\string\u;

class VinylController extends AbstractController{

    #[Route('/')]
    function index():Response
    {
        $stat_array = [
            "STR"=>random_int(0,20),
            "DEX"=>random_int(0,20),
            "CON"=>random_int(0,20),
            "INT"=>random_int(0,20),
            "WIS"=>random_int(0,20),
            "CHA"=>random_int(0,20)
        ];
        return($this->json($stat_array));
    }

    #[Route('/browse/{slug}')]
    public function browse(string $slug = null):Response
    {
        if($slug) $title = u(str_replace('-',' ',$slug))->title(true);
        else $title = 'All genres';
        return new Response("You chose : ".$title);
    }



}