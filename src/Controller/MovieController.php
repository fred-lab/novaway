<?php

namespace App\Controller;

use App\Entity\Movie;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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
     * @Method("GET")
     * @param Movie $movie
     */
    public function show(Movie $movie)
    {

    }

    /**
     * Edit a movie
     * @Route("/movie/edit/{movie}", name="admin_movie_edit", requirements={"movie"="\d+"})
     * @Method("PUT")
     * @param Movie $movie
     */
    public function edit(Movie $movie)
    {

    }

    /**
     * Delete a movie
     * @Route("movie/delete/{movie}", name="admin_movie_delete", requirements={"movie"="\d+"})
     * @Method("POST")
     * @param Movie $movie
     */
    public function delete(Movie $movie)
    {

    }
}
