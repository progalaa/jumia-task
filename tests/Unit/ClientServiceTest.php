<?php

namespace Tests\Unit;

use App\Models\Client;
use App\Services\ClientService;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ClientServiceTest extends TestCase
{
    use DatabaseMigrations;
    private $clientService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->clientService = app()->make(ClientService::class);
    }

    /**
     * @test
     */
    public function it_gets_all_clients()
    {
        Client::factory()->count(4)->create();

        $clients = $this->clientService->allClients();

        $this->assertEquals(4, $clients->count());
    }

    /**
     * @test
     */
    public function it_can_get_clients_with_no_filter()
    {
        Client::factory()->create(
            [
                "phone" => "(002) 0123456789"
            ]
        );


        $clients = $this->clientService->getClientsFiltered([]);

        $this->assertEquals(1, $clients->count());
    }

    /**
     * @test
     */
    public function it_gets_all_data_if_wrong_filter_sent()
    {
        Client::factory()->count(10)->create();

        $clients = $this->clientService->getClientsFiltered(['fakeFilter' => true]);

        $this->assertEquals(10, $clients->count());
    }
}
