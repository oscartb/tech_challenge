<?php

namespace App\Domain\CardGame;

use App\Domain\Shared\ValueObject\Uuid;
use App\Infrastructure\Persistance\Doctrine\DeckRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use \App\Domain\CardGame\Card;

/**
 * @ORM\Entity(repositoryClass=DeckRepository::class)
 */
class Deck
{
    /**
     * @ORM\Id
     * @ORM\Column(type="uuid", unique=true)
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity=Card::class, inversedBy="decks")
     */
    private $cards;

    public function __construct()
    {
        $this->id = Uuid::random();
        $this->cards = new ArrayCollection();
    }

    public function getId(): ?int
    {
        $uuid = new Uuid($this->id);
        return $uuid->value();
    }

    /**
     * @return Collection|Card[]
     */
    public function getCards(): Collection
    {
        return $this->cards;
    }

    public function addCard(Card $card): self
    {
        if (!$this->cards->contains($card)) {
            $this->cards[] = $card;
        }

        return $this;
    }

    public function removeCard(Card $card): self
    {
        $this->cards->removeElement($card);

        return $this;
    }
}
