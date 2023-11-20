<?php

namespace App\Services\PagSeguro;

use Illuminate\Support\Facades\Http;

class PlanCreateService
{

    public string $email;
    public string $token;

    public function __construct()
    {
        $this->email = config('pagseguro.email');
        $this->token = config('pagseguro.token');
    }

    public function create(array $data): string
    {
        $response = Http::withHeaders([
            'Authorization' => $this->token,
            'accept' => 'application/json',
            'content-type' => 'application/json',
        ])->post(
            'https://sandbox.api.assinaturas.pagseguro.com/plans',
            [
                'reference_id' => $data['slug'],
                'name' => $data['name'],
                'amount' => [
                    'value' => $data['price'],
                    'currency' => 'BRL',
                ],
                'interval' => [
                    'length' => 1,
                    'unit' => 'MONTH',
                ],
            ]

        );

        return $response->json()['id'];
    }

}
