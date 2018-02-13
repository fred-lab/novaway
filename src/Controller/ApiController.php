<?php

namespace App\Controller;

use App\Entity\Book;
use App\Entity\Movie;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @Route("/api")
 * Class ApiController
 * @package App\Controller
 */
class ApiController extends Controller
{
    /**
     * @Route("/medias", name="api_medias")
     * @Method("GET")
     * @param SerializerInterface $serializer
     * @return JsonResponse
     */
    public function getAllMedias(SerializerInterface $serializer) : JsonResponse
    {
        $medias['books'] = $this->getDoctrine()->getRepository(Book::class)->findAll();
        $medias['movies'] = $this->getDoctrine()->getRepository(Movie::class)->findAll();

        return new JsonResponse($serializer->serialize($medias, 'json'));
//        return new JsonResponse(['data' => ['nom' => 'toto', 'age' => '25']]);
    }
}
