<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\ClientService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ClientController extends Controller
{
    protected $clientService;

    public function __construct(ClientService $clientService)
    {
        $this->clientService = $clientService;
    }

    public function listClients(Request $request): JsonResponse
    {
        $clients = $this->clientService->getClientsFiltered($request->all());

        return response()->json(['data' => $clients]);
    }
}
