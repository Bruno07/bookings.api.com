<?php 

namespace App\Http\Controllers;

use League\Fractal;
use League\Fractal\Manager;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Repositories\RepositoryClients;
use App\Transformers\ClientsTransformer;

class ControllerClients extends Controller
{
    private $repository_clients;

    public function __construct(RepositoryClients $repository_clients)
    {
        $this->repository_clients = $repository_clients;
    }

    public function index(Request $request)
    {
        $filter = $request->input('filter', []);

        $clients = $this->repository_clients->allClients($filter);

        $fractal  = new Manager();
        $resource = new Fractal\Resource\Collection($clients, new ClientsTransformer, 'clients');

        return $fractal
            ->parseIncludes('user')
            ->createData($resource)
            ->toArray();
    }

    public function store(Request $request)
    {
        $client = $this->repository_clients->save($request);
        
        $fractal  = new Manager();
        $resource = new Fractal\Resource\Item($client, new ClientsTransformer, 'client');

        return $fractal
            ->parseIncludes('user')
            ->createData($resource)
            ->toArray();
    }
}