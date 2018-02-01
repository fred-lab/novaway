<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MovieRepository")
 * @ORM\Table(name="movie")
 */
class Movie
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30, unique=true)
     * @Assert\NotNull()
     * @Assert\NotBlank()
     */
    private $isan;

    /**
     * @ORM\Column(type="string", length=120)
     * @Assert\NotNull()
     * @Assert\NotBlank()
     * @Assert\Length(min="3", max="120")
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=120)
     * @Assert\NotNull()
     * @Assert\NotBlank()
     * @Assert\Length(min="3", max="120")
     */
    private $director;

    /**
     * @ORM\Column(type="simple_array", length=1000)
     * @Assert\NotNull()
     * @Assert\NotBlank()
     * @Assert\Length(min="3", max="1000")
     */
    private $actors;

    /**
     * @ORM\Column(type="date")
     * @Assert\Date()
     * @Assert\NotNull()
     * @Assert\NotBlank()
     */
    private $releaseDate;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     * @Assert\Range(min="1", max="5000")
     * @Assert\Type(type="integer")
     */
    private $duration;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Assert\Length(min="5", max="1000")
     */
    private $resume;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     * @Assert\Type(type="integer")
     * @Assert\Range(min="0", max="10000")
     */
    private $price;


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Movie
     */
    public function setId($id): Movie
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIsan()
    {
        return $this->isan;
    }

    /**
     * @param mixed $isan
     * @return Movie
     */
    public function setIsan($isan): Movie
    {
        $this->isan = $isan;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     * @return Movie
     */
    public function setTitle($title): Movie
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDirector()
    {
        return $this->director;
    }

    /**
     * @param mixed $director
     * @return Movie
     */
    public function setDirector($director): Movie
    {
        $this->director = $director;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getActors()
    {
        return $this->actors;
    }

    /**
     * @param mixed $actors
     * @return Movie
     */
    public function setActors($actors): Movie
    {
        $this->actors = $actors;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getReleaseDate()
    {
        return $this->releaseDate;
    }

    /**
     * @param mixed $releaseDate
     * @return Movie
     */
    public function setReleaseDate($releaseDate): Movie
    {
        $this->releaseDate = $releaseDate;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param mixed $duration
     * @return Movie
     */
    public function setDuration($duration): Movie
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getResume()
    {
        return $this->resume;
    }

    /**
     * @param mixed $resume
     * @return Movie
     */
    public function setResume($resume): Movie
    {
        $this->resume = $resume;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     * @return Movie
     */
    public function setPrice($price): Movie
    {
        $this->price = $price;

        return $this;
    }
}
