<?php 

namespace App\Transformers;

use Carbon\Carbon;
use League\Fractal;
use App\Models\Client;
use League\Fractal\TransformerAbstract;

class ClientsTransformer extends Fractal\TransformerAbstract
{

    protected $availableIncludes = [
        'user'
    ];

    public function transform(Client $client)
    {
        return [
            'id' => $client->id,
            'name' => $client->name,
            'last_name' => $client->last_name,
            'birth' => Carbon::parse($client->birth)->format('d/m/Y'),
            'identity' => $client->identity,
            'social_security' => $client->social_security,
            'postal_code' => $client->postal_code,
            'address' => $client->address,
            'number' => $client->number,
            'neighborhood' => $client->neighborhood,
            'city' => $client->city,
            'state' => $client->state,
            'phone' => $client->phone,
            'cell_phone' => $client->cell_phone
        ];
    }

    public function includeUser(Client $client)
    {
        $user = $client->user;

        return $this->item($user, new UsersTransformer, 'user');
    }
}