<?php

use intelfric\Azampay\AzampayService;
use Illuminate\Support\Facades\Http;

beforeEach(function () {
    $auth_stub = json_decode(
        file_get_contents(__DIR__.'/stubs/responses/generate_token_success.json'),
        true
    );

    Http::fake([
        AzampayService::SANDBOX_AUTH_BASE_URL.'/*' => Http::response($auth_stub, 200),
        AzampayService::AUTH_BASE_URL.'/*' => Http::response($auth_stub, 200),
    ]);
});

it('can successful and send bank checkout request', function () {
    $stub = json_decode(
        file_get_contents(__DIR__.'/stubs/responses/bank_checkout_success.json'),
        true
    );

    Http::fake([
        AzampayService::BASE_URL.'/azampay/bank/checkout' => Http::response($stub, 200),
        AzampayService::SANDBOX_BASE_URL.'/azampay/bank/checkout' => Http::response($stub, 200),
    ]);

    $azampay = new AzampayService();

    $data = $azampay->bankCheckout([
        'amount' => 1000,
        'currencyCode' => 'TZS',
        'merchantAccountNumber' => '34567890987654',
        'merchantMobileNumber' => '08012345678',
        'merchantName' => 'intelfric@gmail.com',
        'otp' => '1234',
        'provider' => 'CRDB',
        'referenceId' => '24345345',
    ]);

    $this->assertEquals($data, $stub);
});

it('can throw exception if bank checkout request return error', function () {
    $stub = json_decode(
        file_get_contents(__DIR__.'/stubs/responses/bank_checkout_failure.json'),
        true
    );

    Http::fake([
        AzampayService::BASE_URL.'/azampay/bank/checkout' => Http::response($stub, 200),
        AzampayService::SANDBOX_BASE_URL.'/azampay/bank/checkout' => Http::response($stub, 200),
    ]);

    $azampay = new AzampayService();

    $data = $azampay->bankCheckout([
        'amount' => 1000,
        'currencyCode' => 'TZS',
        'merchantAccountNumber' => '34567890987654',
        'merchantMobileNumber' => '08012345678',
        'merchantName' => 'intelfric@gmail.com',
        'otp' => '1234',
        'provider' => 'CRDB',
        'referenceId' => '24345345',
    ]);

    $this->assertEquals($data, $stub);
});
