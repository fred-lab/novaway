<?php

namespace App\Controller;

use App\Entity\Movie;
use App\Form\BookType;
use App\Form\MovieType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class MovieController
 * @package App\Controller
 * @Route("/admin")
 */
class MovieController extends Controller
{
    /**
     * Show a movie
     * @Route("/movie/{movie}", name="admin_movie_show", requirements={"movie"="\d+"})
     * @param Movie $movie
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function show(Movie $movie)
    {
        return $this->render('movie/view.html.twig', [
            'movie' => $movie
        ]);
    }

    /**
     * Create a book
     * @Route("/movie/create", name="admin_movie_create")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function create(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(MovieType::class);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $movie = $form->getData();

            $em->persist($movie);
            $em->flush();

            $this->addFlash(
                'success',
                'Ce livre a bien été enregistré'
            );

            return $this->redirectToRoute('admin_movie_show', [
                'movie' => $movie->getId()
            ]);
        }

        return $this->render('movie/create.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * Edit a movie
     * @Route("/movie/edit/{movie}", name="admin_movie_edit", requirements={"movie"="\d+"})
     * @param Request $request
     * @param Movie $movie
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function edit(Request $request, Movie $movie)
    {
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(MovieType::class, $movie);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $movie = $form->getData();

            $em->persist($movie);
            $em->flush();

            $this->addFlash(
                'success',
                'Ce DVD/Bluray a bien été modifié'
            );

            return $this->redirectToRoute('admin_movie_show', [
                'movie' => $movie->getId()
            ]);
        }

        return $this->render('movie/edit.html.twig', [
            'form' => $form->createView(),
            'movie' => $movie
        ]);
    }

    /**
     * Delete a movie
     * @Route("movie/delete/{movie}", name="admin_movie_delete", requirements={"movie"="\d+"})
     * @param Movie $movie
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function delete(Movie $movie)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($movie);
        $em->flush();

        return $this->redirectToRoute('admin_index');
    }
}
