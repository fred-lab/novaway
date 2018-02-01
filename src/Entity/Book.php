<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/** *
 * @ORM\Entity(repositoryClass="App\Repository\BookRepository")
 * @ORM\Table(name="book")
 */
class Book
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20, unique=true)
     * @Assert\NotNull()
     * @Assert\NotBlank()
     * @Assert\Isbn(message="Cette valeur ne correspond pas à un numéroe ISBN standard")
     */
    private $isnb;

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
    private $author;

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
    private $pages;

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
     * @param $id
     * @return Book
     */
    public function setId($id): Book
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIsnb()
    {
        return $this->isnb;
    }

    /**
     * @param $isnb
     * @return Book
     */
    public function setIsnb($isnb): Book
    {
        $this->isnb = $isnb;

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
     * @return Book
     */
    public function setTitle($title): Book
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     * @return Book
     */
    public function setAuthor($author): Book
    {
        $this->author = $author;

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
     * @return Book
     */
    public function setReleaseDate($releaseDate): Book
    {
        $this->releaseDate = $releaseDate;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPages()
    {
        return $this->pages;
    }

    /**
     * @param mixed $pages
     * @return Book
     */
    public function setPages($pages): Book
    {
        $this->pages = $pages;

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
     * @return Book
     */
    public function setResume($resume): Book
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
     * @return Book
     */
    public function setPrice($price): Book
    {
        $this->price = $price;

        return $this;
    }


}
