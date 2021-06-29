<?php

namespace App\Filters;

use App\Contracts\Filter;
use Illuminate\Support\Collection;

class Phone implements Filter
{
    public function apply(Collection $collection, string $value = ""): Collection
    {
        return $collection->filter(
            function ($item) use ($value) {
                return $item->phone_state == filter_var($value, FILTER_VALIDATE_BOOLEAN);
            }
        );
    }
}
