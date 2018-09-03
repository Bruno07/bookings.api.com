<?php 

namespace App\Transformers;

use League\Fractal;
use App\Models\Publisher;
use League\Fractal\TransformerAbstract;

class PublisherTransformer extends Fractal\TransformerAbstract
{
    public function transform(Publisher $publisher)
    {
        return [
            'id' => $publisher->id,
            'publisherFantasyName' => $publisher->fantasy_name,
            'publisherCnpj' => $publisher->cnpj,
            'publisherPostalCode' => $publisher->postal_code,
            'publisherAddress' => $publisher->address,
            'publisherNumber' => $publisher->number,
            'publisherNeighborhood' => $publisher->neighborhood,
            'publisherCity' => $publisher->city,
            'publisherState' => $publisher->state,
            'publisherPhone' => $publisher->phone,
        ];
    }
}