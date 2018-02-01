<?php

namespace App\Controller;

use App\Entity\Book;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class BookController
 * @package App\Controller
 * @Route("/admin")
 */
class BookController extends Controller
{
    /**
     * Show a book
     * @Route("/book/{book}", name="admin_book_show", requirements={"book"="\d+"})
     * @Method("GET")
     * @param Book $book
     */
    public function show(Book $book)
    {

    }

    /**
     * Edit a book
     * @Route("/book/edit/{book}", name="admin_book_edit", requirements={"book"="\d+"})
     * @Method("PUT")
     * @param Book $book
     */
    public function edit(Book $book)
    {

    }

    /**
     * Delete a book
     * @Route("book/delete/{book}", name="admin_book_delete", requirements={"book"="\d+"})
     * @Method("POST")
     * @param Book $book
     */
    public function delete(Book $book)
    {

    }
}
