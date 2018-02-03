<?php

namespace App\Controller;

use App\Entity\Book;
use App\Entity\Movie;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends Controller
{
    /**
     * Show all books & movies
     * @Route("/admin", name="admin_index")
     * @Method("GET")
     */
    public function index()
    {
        $books = $this->getDoctrine()->getRepository(Book::class)->findAll();
        $movies = $this->getDoctrine()->getRepository(Movie::class)->findAll();

        return $this->render('admin/index.html.twig', [
            'books'     => $books,
            'movies'    => $movies
        ]);
    }
}
