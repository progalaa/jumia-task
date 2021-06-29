<?php

namespace App\Services;
use App\Contracts\Filter;
use App\Filters\Country;
use App\Filters\Phone;
use App\Models\Client;
use Illuminate\Support\Collection;
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

        if (!$filters) {
            return $clients;
        }

        foreach ($filters as $filter => $value) {
            $filter = ucfirst(Str::camel($filter));

            if (!in_array($filter, ['Country', 'PhoneState'])) {
                continue;
            }

            $filterClass = ($filter == 'Country') ? Country::class : Phone::class;

            $clients = $this->applyFilter(new $filterClass, $clients, $value);
        }

        return $clients;
    }

    private function applyFilter(Filter $filter, Collection $collection, $value): Collection
    {
        return $filter->apply($collection, $value);
    }

}
