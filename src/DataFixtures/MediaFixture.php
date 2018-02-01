<?php
/**
 * Created by IntelliJ IDEA.
 * User: fred
 * Date: 01/02/18
 * Time: 12:24
 */

namespace App\DataFixtures;

use App\Entity\Book;
use App\Entity\Movie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class MediaFixture extends Fixture
{
    /**
     * A list of book with their author & title
     * @var array
     */
    private $books =[
        [ 'author' => 'Jean Anouilh',           'title' => 'Fables'],
        [ 'author' => 'Guillaume Musso',        'title' => 'Sauve-moi'],
        [ 'author' => 'Franz-olivier Giesbert', 'title' => 'L\'affreux'],
        [ 'author' => 'Jean Anouilh',           'title' => 'En marge du théâtre'],
        [ 'author' => 'Guillaume Musso',        'title' => 'Et après'],
        [ 'author' => 'Franz-olivier Giesbert', 'title' => 'Le lessiveur'],
        [ 'author' => 'Jules Verne',            'title' => '20.000 lieux sous les mers'],
        [ 'author' => 'G.R.R Martin',           'title' => 'A song of ice and fire'],
        [ 'author' => 'Phillip K. Dick',        'title' => 'I am legend'],
        [ 'author' => 'Jules Verne',            'title' => 'De la terre à la lune']
    ];

    /**
     * A list of movie with director, title, and actors
     * @var array
     */
    private $movies=[
        ['director' => 'Steven Spielberg', 'title' => 'Catch me if you can',        'actors' => 'Leonardo Di Caprio, Tom Hanks'],
        ['director' => 'Woody Allen',      'title' => 'Blue Jasmine',               'actors' => 'Cate Blanchett, Alec Baldwin'],
        ['director' => 'Steven Spielberg', 'title' => 'Jurassic Park',              'actors' => 'Sam Neil, Samuel Jackson'],
        ['director' => 'Woody Allen',      'title' => 'Everyone says I love you',   'actors' => 'Edward Norton, Drew Barrymore'],
        ['director' => 'Stanley Kubrick',  'title' => 'Shinning',                   'actors' => 'Jack Nicholson, Shelley Duvall'],
        ['director' => 'Martin Scorsese',  'title' => 'The departed',               'actors' => 'Jack Nicholson, Leonardo Di Caprio'],
        ['director' => 'Martin Scorsese',  'title' => 'Killers of the flower Moon', 'actors' => 'Leonardo Di Caprio, Robert De Niro'],
        ['director' => 'Martin Scorsese',  'title' => 'The wolf of wall street',    'actors' => 'Jean Dujardin, Leonardo Di Caprio'],
        ['director' => 'Spike Lee',        'title' => '25th hour',                  'actors' => 'Edward Norton, Rosario Dawson'],
        ['director' => 'Takashi Miike',    'title' => 'Crows Zero',                 'actors' => 'Shun Ogori, Takayuki Yamada']
    ];

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        foreach ($this->books as $book){
            $fakeBook = new Book();
            $fakeBook->setIsnb($faker->isbn13)
                ->setTitle($book['title'])
                ->setAuthor($book['author'])
                ->setReleaseDate($faker->date())
                ->setPages(rand(5, 1000))
                ->setResume($faker->text(rand(5, 1000)))
                ->setPrice(rand(1, 1000))
            ;
            $manager->persist($fakeBook);
        }

        foreach ($this->movies as $movie){
            $fakeMovie = new Movie();
            $fakeMovie->setIsan('ISAN ' . rand(10000, 99999))
                ->setTitle($movie['title'])
                ->setDirector($movie['director'])
                ->setActors($movie['actors'])
                ->setReleaseDate($faker->date())
                ->setDuration(rand(10, 500))
                ->setResume($faker->text(rand(5, 1000)))
                ->setPrice(rand(1, 1000))
            ;
            $manager->persist($fakeMovie);
        }

        $manager->flush();
    }
}