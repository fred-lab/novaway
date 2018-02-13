<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class HomepageController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */
    public function index()
    {
        return $this->render('homepage/index.html.twig');
    }

    /**
     * @Route("/{vue}", name="api_redirect", requirements={"vue" = "[\/\w\.-]*"})
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */
    public function redirectToHomepage()
    {
        return $this->render('homepage/index.html.twig');
    }
}
