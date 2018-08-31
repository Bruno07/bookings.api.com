<?php 

namespace App\Repositories;

use App\Models\User;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RepositoryClients
{
    public function allClients(array $filter = [])
    {
        $query = Client::query()
            ->join('users', 'clients.id', '=', 'users.client_id');

        if (!empty($filter))
            $query = $this->applyFilter($query, $filter);

        $clients = $query->get();

        return $clients;
    }

    public function applyFilter($query, array $filter)
    {
        extract($filter);

        if (isset($name) && !empty($name))
            $query->where('name', 'like', "%{$name}%");

        if (isset($last_name) && !empty($last_name))
            $query->where('last_name', 'like', "%{$last_name}%");

        if (isset($identity) && !empty($identity))
            $query->where('identity', $identity);

        if (isset($social_security) && !empty($social_security))
            $query->where('social_security', $social_security);

        if (isset($login) && !empty($login))
            $query->where('login', $login);

        if (isset($email) && !empty($email))
            $query->where('email', $email);

        return $query;
    }

    public function save(Request $request, $id = null)
    {
        $client_exists = $this->checkClientExists($request);

        if ($client_exists)
            throw new \Exception('client already exists');

        return DB::transaction(function () use ($request, $id) {

            if (empty($id))
                $client = new Client;  
            else
                $client = Client::findOrFail($id);

            $client->name = $request->input('name');
            $client->last_name = $request->input('last_name');
            $client->birth = $request->input('birth');
            $client->identity = $request->input('identity');
            $client->social_security = $request->input('social_security');
            $client->postal_code = $request->input('postal_code');
            $client->address = $request->input('address');
            $client->number = $request->input('number');
            $client->neighborhood = $request->input('neighborhood');
            $client->city = $request->input('city');
            $client->state = $request->input('state');
            $client->phone = $request->input('phone');
            $client->cell_phone = $request->input('cell_phone');
            $client->save();

            $user = new User;
            $user->login = $request->input('login');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $user->client_id = $client->id;
            $user->save();

            return $client;
        });   
    }

    public function checkClientExists(Request $request)
    {
        $identity = $request->input('identity');
        $social_security = $request->input('social_security');

        return Client::query()
            ->where('identity', $identity)
            ->where('social_security', $social_security)
            ->exists();
    }
}