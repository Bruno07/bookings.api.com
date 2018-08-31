<?php 

namespace App\Service;

use App\Models\Client;
use App\Repositories\RepositoryClients;

class ServiceClients
{
    private $repository_clients;

    public function __construct(RepositoryClients $repository_clients)
    {
        $this->repository_clients = $repository_clients;
    }
}