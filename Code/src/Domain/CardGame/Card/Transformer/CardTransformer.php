<?php

declare(strict_types=1);

namespace App\Domain\CardGame\Card\Transformer;

use App\Domain\CardGame\Entity\Card;

class CardTransformer
{
    public function transform(Card $card)
    {
        return [
           'id' => $card->getId(),
           'name' => $card->getName(),
           'damage' => $card->getDamage(),
           'HP' => $card->getHP()
        ];
    }

    public function transformFromCollection(array $cardCollection)
    {
        $transformedCollection = [];
        foreach($cardCollection as $card){
            $transformedCollection[] = $this->transform($card);
        }
        return $transformedCollection;
    }
}