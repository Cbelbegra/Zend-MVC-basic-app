<?php
namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Application\Entity\Book;

/**
 * This class represents a Library containing Books.
 * @ORM\Entity
 * @ORM\Table(name="library")
 */
class Library
{
    /**
    * @ORM\Id
    * @ORM\Column(name="id")
    * @ORM\GeneratedValue
    */
    protected $id;

    /**
    * @ORM\Column(name="name")
    */
    protected $name;

    /**
    * @ORM\OneToMany(targetEntity="\Application\Entity\Book", mappedBy="book")
    * @ORM\JoinColumn(name="id", referencedColumnName="book_id")
    */
    protected $books;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->comments = new ArrayCollection();
    }

    // Returns ID of this comment.
    public function getId()
    {
        return $this->id;
    }

    // Sets ID of this comment.
    public function setId($id)
    {
        $this->id = $id;
    }

    // Returns library's name.
    public function getName()
    {
        return $this->name;
    }

    // Sets library's name.
    public function setName($name)
    {
        $this->author = $name;
    }
    /**
     * Returns books for this library.
     * @return array
     */
    public function getBooks()
    {
        return $this->books;
    }

    /**
     * Adds a new book to this library.
     * @param $book
     */
    public function addComment($book)
    {
        $this->books[] = $book;
    }
}