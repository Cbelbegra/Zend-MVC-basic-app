<?php
namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * This class represents a single book in a Library.
 * @ORM\Entity
 * @ORM\Table(name="book")
 */
class Book
{
    /**
     * @ORM\ManyToOne(targetEntity="\Application\Entity\Post", inversedBy="comments")
     * @ORM\JoinColumn(name="post_id", referencedColumnName="id")
     */
    protected $library;

    // Book status constants.
    const STATUS_IN_STOCK       = 1; // In_stock.
    const STATUS_BORROWED       = 2; // Borrowed.

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="id")
     */
    protected $id;

    /**
     * @ORM\Column(name="title")
     */
    protected $title;

    /**
     * @ORM\Column(name="status")
     */
    protected $status;

    // Returns ID of this book.
    public function getId()
    {
        return $this->id;
    }

    // Sets ID of this book.
    public function setId($id)
    {
        $this->id = $id;
    }

    // Returns title.
    public function getTitle()
    {
        return $this->title;
    }

    // Sets title.
    public function setTitle($title)
    {
        $this->title = $title;
    }

    // Returns status.
    public function getStatus()
    {
        return $this->status;
    }

    // Sets status.
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /*
    * Returns associated library.
    * @return \Application\Entity\Library
    */
    public function getLibrary()
    {
        return $this->library;
    }

    /**
     * Sets associated Library.
     * @param \Application\Entity\Library $library
     */
    public function setLibrary($library)
    {
        $this->library = $library;
        $library->addBook($this);
    }
}