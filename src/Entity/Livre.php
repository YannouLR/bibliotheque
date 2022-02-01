<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */

class Livre{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
    */

    private int $id;

    /**
     * @ORM\Column(length=100)
     */

    private $title;   

    /**
     * @ORM\Column(length=255)
     */

    private $resume;

    /**
     * @ORM\Column(type="integer")
    */

    private int $num_ISBN;

    /**
     * @ORM\Column(type="integer")
    */

    private int $exemplaire_dispo;

    /**
     * @ORM\Column(type="integer")
    */

    private int $exemplaire_emprunte;

     /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="editor_id", referencedColumnName="id")
     */

    private User $editor;

     /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="Author_id", referencedColumnName="id")
     */

    private User $author;

    public function __construct(string $title, string $resume, int $num_ISBN, int $ed, int $ee, User $editor, User $author)
    

    
    {
        $this->title = $title;

        
        $this->resume = $resume;
        
        $this->num_ISBN = $num_ISBN;
        $this->exemplaire_dispo = $ed;
        $this->exemplaire_emprunte = $ee;
        $this->editor = $editor;
        $this->author = $author;
    }

    

    

    /**
     * Get the value of id
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Get the value of title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     */
    public function setTitle($title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of resume
     */
    public function getResume()
    {
        return $this->resume;
    }

    /**
     * Set the value of resume
     */
    public function setResume($resume): self
    {
        $this->resume = $resume;

        return $this;
    }

    /**
     * Get the value of num_ISBN
     *
     * @return int
     */
    public function getNumISBN(): int
    {
        return $this->num_ISBN;
    }

    /**
     * Set the value of num_ISBN
     *
     * @param int $num_ISBN
     *
     * @return self
     */
    public function setNumISBN(int $num_ISBN): self
    {
        $this->num_ISBN = $num_ISBN;

        return $this;
    }

    /**
     * Get the value of exemplaire_dispo
     *
     * @return int
     */
    public function getExemplaireDispo(): int
    {
        return $this->exemplaire_dispo;
    }

    /**
     * Set the value of exemplaire_dispo
     *
     * @param int $exemplaire_dispo
     *
     * @return self
     */
    public function setExemplaireDispo(int $exemplaire_dispo): self
    {
        $this->exemplaire_dispo = $exemplaire_dispo;

        return $this;
    }

    /**
     * Get the value of exemplaire_emprunte
     *
     * @return int
     */
    public function getExemplaireEmprunte(): int
    {
        return $this->exemplaire_emprunte;
    }

    /**
     * Set the value of exemplaire_emprunte
     *
     * @param int $exemplaire_emprunte
     *
     * @return self
     */
    public function setExemplaireEmprunte(int $exemplaire_emprunte): self
    {
        $this->exemplaire_emprunte = $exemplaire_emprunte;

        return $this;
    }

    /**
     * Get the value of editor
     *
     * @return User
     */
    public function getEditor(): User
    {
        return $this->editor;
    }

    /**
     * Set the value of editor
     *
     * @param User $editor
     *
     * @return self
     */
    public function setEditor(User $editor): self
    {
        $this->editor = $editor;

        return $this;
    }

    /**
     * Get the value of author
     *
     * @return User
     */
    public function getAuthor(): User
    {
        return $this->author;
    }

    /**
     * Set the value of author
     *
     * @param User $author
     *
     * @return self
     */
    public function setAuthor(User $author): self
    {
        $this->author = $author;

        return $this;
    }
}