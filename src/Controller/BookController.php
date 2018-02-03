<?php

namespace App\Controller;

use App\Entity\Book;
use App\Form\BookType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
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
     * @param Book $book
     * @return Response
     */
    public function show(Book $book)
    {
        return $this->render('book/view.html.twig', [
            'book' => $book
        ]);
    }

    /**
     * Create a book
     * @Route("/book/create", name="admin_book_create")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */
    public function create(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(BookType::class);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $book = $form->getData();

            $em->persist($book);
            $em->flush();

            $this->addFlash(
                'success',
                'Ce livre a bien été enregistré'
            );

            return $this->redirectToRoute('admin_book_show', [
                'book' => $book->getId()
            ]);
        }

        return $this->render('book/create.html.twig', [
            'form' => $form->createView()
        ]);

    }

    /**
     * Edit a book
     * @Route("/book/edit/{book}", name="admin_book_edit", requirements={"book"="\d+"})
     * @param Request $request
     * @param Book $book
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */
    public function edit(Request $request, Book $book)
    {
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(BookType::class, $book);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $book = $form->getData();

            $em->persist($book);
            $em->flush();

            $this->addFlash(
                'success',
                'Ce livre a bien été modifié'
            );

            return $this->redirectToRoute('admin_book_show', [
                'book' => $book->getId()
            ]);
        }

        return $this->render('book/edit.html.twig', [
            'form' => $form->createView(),
            'book' => $book
        ]);
    }

    /**
     * Delete a book
     * @Route("book/delete/{book}", name="admin_book_delete", requirements={"book"="\d+"})
     * @param Book $book
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function delete(Book $book)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($book);
        $em->flush();

        return $this->redirectToRoute('admin_index');
    }
}
