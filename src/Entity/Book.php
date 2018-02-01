<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     */
    private $isnb;

    /**
     * @ORM\Column(type="string", length=120)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=120)
     */
    private $author;

    /**
     * @ORM\Column(type="date")
     */
    private $releaseDate;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $pages;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $resume;

    /**
     * @ORM\Column(type="smallint", nullable=true)
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
