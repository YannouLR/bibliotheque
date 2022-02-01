<?php

namespace App\Entity;

use Doctrine\DBAL\SQL\Parser\Visitor;

class Borrow{

    private int $id;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="editor_id", referencedColumnName="id")
     */

    private User $visitor;

    /**
     * @ORM\ManyToOne(targetEntity="Livre")
     * @ORM\JoinColumn(name="livre_id", referencedColumnName="id")
     */

    private Livre $livre;

    public function __contruct(User $visitor, Livre $livre)
    {
        $this->visitor = $visitor;

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
     * Get the value of visitor
     *
     * @return User
     */
    public function getVisitor(): User
    {
        return $this->visitor;
    }

    /**
     * Set the value of visitor
     *
     * @param User $visitor
     *
     * @return self
     */
    public function setVisitor(User $visitor): self
    {
        $this->visitor = $visitor;

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