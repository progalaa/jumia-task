<?php

namespace App\Services;
use App\Models\Client;
use Illuminate\Support\Str;

class ClientService
{
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function allClients()
    {
        return $this->client->all();
    }

    public function getClientsFiltered(?array $filters)
    {
        $clients = $this->allClients();

//        if (!$filters) {
//            return $clients;
//        }
//
//        foreach ($filters as $filter => $value) {
//            $filter = ucfirst(Str::camel($filter));
//
////            if (!in_array($filter, CustomerFilters::FILTERS)) {
////                continue;
////            }
//
////            $filterPath = CustomerFilters::getFilterClass($filter);
////            $filterClass = new $filterPath;
////            $customers = $this->applyFilter($filterClass, $customers, $value);
//        }

        return $clients;
    }
}
