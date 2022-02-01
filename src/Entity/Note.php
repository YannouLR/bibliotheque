<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */

class Note{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
    */

    private int $id;

    /**
     * @ORM\Column(type="integer")
     */

    private int $note;

    /**
     * @ORM\Column(length=255)
    */

    private string $comment;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="User_id", referencedColumnName="id")
     */

    private User $editeur;

    /**
     * @ORM\ManyToOne(targetEntity="Livre")
     * @ORM\JoinColumn(name="livre_id", referencedColumnName="id")
     */

    private Livre $livre;

    public function __construct(int $note, string $comment, User $editeur, Livre $livre)
    {
        $this->note = $note;
        $this->comment = $comment;
        $this->editeur = $editeur;
        $this->livre = $livre;
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
     * Get the value of note
     *
     * @return int
     */
    public function getNote(): int
    {
        return $this->note;
    }

    /**
     * Set the value of note
     *
     * @param int $note
     *
     * @return self
     */
    public function setNote(int $note): self
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get the value of comment
     *
     * @return string
     */
    public function getComment(): string
    {
        return $this->comment;
    }

    /**
     * Set the value of comment
     *
     * @param string $comment
     *
     * @return self
     */
    public function setComment(string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get the value of editeur
     *
     * @return User
     */
    public function getEditeur(): User
    {
        return $this->editeur;
    }

    /**
     * Set the value of editeur
     *
     * @param User $editeur
     *
     * @return self
     */
    public function setEditeur(User $editeur): self
    {
        $this->editeur = $editeur;

        return $this;
    }

    /**
     * Get the value of livre
     *
     * @return Livre
     */
    public function getLivre(): Livre
    {
        return $this->livre;
    }

    /**
     * Set the value of livre
     *
     * @param Livre $livre
     *
     * @return self
     */
    public function setLivre(Livre $livre): self
    {
        $this->livre = $livre;

        return $this;
    }
}