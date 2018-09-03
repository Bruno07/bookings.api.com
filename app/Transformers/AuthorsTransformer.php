<?php 

namespace App\Transformers;

use League\Fractal;
use App\Models\Author;
use League\Fractal\TransformerAbstract;

class AuthorsTransformer extends Fractal\TransformerAbstract
{
    public function transform(Author $author)
    {
        return [
            'id' => $author->id,
            'authorName' => $author->name,
            'authorLastName' => $author->last_name,
            'authorBirth' => $author->birth,
            'authorPostalCode' => $author->postal_code,
            'authorAddress' => $author->address,
            'authorNumber' => $author->number,
            'authorNeighborhood' => $author->neighborhood,
            'authorCity' => $author->city,
            'authorState' => $author->state,
            'authorEmail' => $author->email,
            'authorWebSite' => $author->web_site,
            'authorPhone' => $author->phone,
        ];
    }
}