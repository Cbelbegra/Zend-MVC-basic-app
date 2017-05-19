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
     * @ORM\ManyToMany(targetEntity="\Application\Entity\Library", inversedBy="books")
     * @ORM\JoinTable(name="library_book",
     *      joinColumns={@ORM\JoinColumn(name="library_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="book_id", referencedColumnName="id")}
     *      )
     */
    protected $librarys;

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
    public function addLibrary($library)
    {
        $this->librarys[] = $library;
    }

    // Removes association between this Book and the given Library.
    public function removeLibraryAssociation($library)
    {
        $this->librarys->removeElement($library);
    }
}