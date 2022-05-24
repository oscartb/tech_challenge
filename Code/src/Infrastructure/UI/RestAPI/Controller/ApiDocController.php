<?php

namespace App\Infrastructure\UI\RestAPI\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Yaml\Yaml;

class ApiDocController extends AbstractController
{

    /**
     * @Route("api/doc", name="api_doc")
     */
    public function apiDoc(){
        $ymlContents = file_get_contents(__DIR__ . '/../Spec/open-api.yml');
        $parsedYml = Yaml::parse($ymlContents);
        return new JsonResponse($parsedYml);
}

    /**
     * @Route("api/doc/json", name="json_api_doc")
     */
    public function jsonApiDoc(){
        $jsonContents = json_decode(file_get_contents(__DIR__ . '/../Spec/swagger.json'));
        return new JsonResponse($jsonContents);
    }


}