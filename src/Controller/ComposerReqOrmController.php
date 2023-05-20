<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ComposerReqOrmController extends AbstractController
{
    #[Route('/composer/req/orm', name: 'app_composer_req_orm')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/ComposerReqOrmController.php',
        ]);
    }
}
