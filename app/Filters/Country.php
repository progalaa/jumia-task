<?php

namespace App\Filters;

use App\Contracts\Filter;
use App\Models\Client;
use Illuminate\Support\Collection;

class Country implements Filter
{
    public function apply(Collection $collection, string $value = ''): Collection
    {
        return $collection->filter(
            function ($item) use ($value) {
                $client = new Client();
                return $client->countries[$item->country_code] == $value;
            }
        );
    }
}
