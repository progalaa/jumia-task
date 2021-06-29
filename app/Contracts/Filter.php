<?php


namespace App\Contracts;


use Illuminate\Support\Collection;

interface Filter
{
    public function apply(Collection $collection,string $value = ''): Collection;
}
