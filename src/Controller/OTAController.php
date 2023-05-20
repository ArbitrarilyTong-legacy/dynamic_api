<?php

namespace App\Controller;

use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\OTA;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Configs;

class OTAController extends AbstractController
{
    #[Route('/ota/{name1}/{name2}', name: 'app_o_t_a')]
    public function index(Request $request, EntityManagerInterface $entityManager): JsonResponse
    {
        $otaObject = $entityManager->getRepository(OTA::class)->findOneBy(['name1'=>$request->attributes->get("name1"), 'name2'=>$request->attributes->get("name2")]);
        $config = $entityManager->getRepository(Configs::class);
        if($otaObject == null){
            return $this->json([
                'datetime' => time(),
                'filename' => '',
                'id' => '',
                'size' => 0,
                'url' => '',
                'version' => '',
                'filehash' => '',
                'maintainers' => [],
                'error' => true,
                'donate_url' => $config->findOneBy(['name' => 'donate_url'])->getValue(),
                'website_url' => $config->findOneBy(['name' => 'website_url'])->getValue(),
                'news_url' => $config->findOneBy(['name' => 'news_url'])->getValue()
            ]);
        }

        return $this->json([
            'datetime' => $otaObject->getDatetime()->getTimestamp(),
            'filename' => $otaObject->getFilename(),
            'id' => $otaObject->getInfoId(),
            'size' => $otaObject->getSize(),
            'url' => $otaObject->getUrl(),
            'version' => $otaObject->getVersion(),
            'filehash' => $otaObject->getFilehash(),
            'maintainers' => $otaObject->getMaintainers(),
            'error' => false,
            'donate_url' => $config->findOneBy(['name' => 'donate_url'])->getValue(),
            'website_url' => $config->findOneBy(['name' => 'website_url'])->getValue(),
            'news_url' => $config->findOneBy(['name' => 'news_url'])->getValue()
        ]);

    }
}
