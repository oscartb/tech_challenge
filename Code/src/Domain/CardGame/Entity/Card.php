<?php

namespace App\Domain\CardGame;

use App\Domain\Shared\ValueObject\Uuid;
use App\Infrastructure\Persistance\Doctrine\CardRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CardRepository::class)
 */
class Card
{
    /**
     * @ORM\Id
     * @ORM\Column(type="uuid", unique=true)
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $damage;

    /**
     * @ORM\Column(type="integer")
     */
    private $HP;

    /**
     * @ORM\ManyToMany(targetEntity=Deck::class, mappedBy="cards")
     */
    private $decks;

    public function __construct(
        string $name,
        int $damage,
        int $hp
    )
    {
        $this->id = Uuid::random()->value();
        $this->name = $name;
        $this->damage = $damage;
        $this->HP = $hp;
        $this->decks = new ArrayCollection();
    }

    public function getId(): ?int
    {
        $uuid = new Uuid($this->id);
        return $uuid->value();
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getDamage(): ?int
    {
        return $this->damage;
    }

    public function getHP(): ?int
    {
        return $this->HP;
    }

    /**
     * @return Collection|Deck[]
     */
    public function getDecks(): Collection
    {
        return $this->decks;
    }

    public function addDeck(Deck $deck): self
    {
        if (!$this->decks->contains($deck)) {
            $this->decks[] = $deck;
            $deck->addCard($this);
        }

        return $this;
    }

    public function removeDeck(Deck $deck): self
    {
        if ($this->decks->removeElement($deck)) {
            $deck->removeCard($this);
        }

        return $this;
    }
}
