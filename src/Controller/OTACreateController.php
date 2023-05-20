<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\OTA;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\DBAL\Types\Types;
use DateTime;
class OTACreateController extends AbstractController
{
    #[Route('/Create/ota', name: 'app_o_t_a_create')]
    public function index(Request $request, EntityManagerInterface $entityManager): JsonResponse
    {
        $otaObject = new OTA();

        if(($entityManager->getRepository(OTA::class)->findOneBy(['name1'=>$request->query->get("name1")]) != null) ||
            ($entityManager->getRepository(OTA::class)->findOneBy(['name2'=>$request->query->get("name2")]) != null)){
            return $this->json(['result'=>'Object with same name existed'], $status = 500);
        }
        $otaObject->setName1($request->query->get("name1"));
        $otaObject->setName2($request->query->get("name2"));
        $datetime = new DateTime();
        $datetime->setTimestamp($request->query->getInt("datetime"));
        $otaObject->setDatetime($datetime);
        $otaObject->setFilename($request->query->get("filename"));
        $otaObject->setSize($request->query->get("size"));
        $otaObject->setUrl($request->query->get("url"));
        $otaObject->setVersion($request->query->get("version"));
        $otaObject->setFilehash($request->query->get("filehash"));
        $otaObject->setMaintainers(explode(",",$request->query->get("maintainers")));
        $otaObject->setInfoId($request->query->get("id"));

        $entityManager->persist($otaObject);
        $entityManager->flush();
        return $this->json([
            'result' => 'done'
        ]);
    }
}
