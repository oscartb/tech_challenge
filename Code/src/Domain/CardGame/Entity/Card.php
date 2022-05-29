<?php

namespace App\Domain\CardGame\Entity;

use App\Domain\CardGame\DomainEvent\CardCreatedDomainEvent;
use App\Domain\CardGame\DomainEvent\CardRemovedDomainEvent;
use App\Domain\Shared\Aggregate\AggregateRoot;
use App\Domain\Shared\ValueObject\Uuid;
use App\Infrastructure\Persistance\Doctrine\CardRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CardRepository::class)
 */
class Card extends AggregateRoot
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string", unique=true)
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

    /**
     * @ORM\Column(type="boolean" ,options={"default" : 0})
     */
    private bool $markedForRemoval = false;

    public function __construct(
        string $name,
        int $damage,
        int $hp
    )
    {
        $this->id = Uuid::random();
        $this->name = $name;
        $this->damage = $damage;
        $this->HP = $hp;
        $this->decks = new ArrayCollection();
        $this->markedForRemoval = false;
    }

    public static function create(
        string $name,
        int $damage,
        int $hp
    ): Card
    {
        $card = new self($name, $damage, $hp);
        $card->record(
            new CardCreatedDomainEvent(
                $card->getId(), $card->getName(), $card->getDamage(), $card->getHP()
            )
        );

        return $card;
    }

    public function remove()
    {
        $this->record(
            new CardRemovedDomainEvent(
                $this->getId()
            )
        );
    }

    public function update($name, $damage, $hp): self
    {
        $this->name = $name;
        $this->damage = $damage;
        $this->HP = $hp;

        return $this;
    }

    public function getId(): ?string
    {
        return $this->id;
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
     * @return Collection
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

    /**
     * @return bool
     */
    public function isMarkedForRemoval(): bool
    {
        return $this->markedForRemoval;
    }



    public function markCardToBeRemoved()
    {
        $this->markedForRemoval = true;
    }
}
