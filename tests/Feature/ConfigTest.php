<?php

declare(strict_types=1);

use Illuminate\Validation\ValidationException;
use WendellAdriel\Lift\Tests\Datasets\ProductConfig;

it('can set all configurations with the Config attribute', function () {
    $product = ProductConfig::create([
        'name' => 'Product 1',
        'price' => '10.99',
        'random_number' => '123',
        'expires_at' => '2023-12-31 23:59:59',
    ]);

    expect($product->name)->toBe('Product 1')
        ->and($product->price)->toBe(10.99)
        ->and($product->random_number)->toBe(123)
        ->and($product->expires_at)->toBeInstanceOf(Carbon\CarbonImmutable::class)
        ->and($product->expires_at->format('Y-m-d H:i:s'))->toBe('2023-12-31 23:59:59')
        ->and($product->toArray())->not->toHaveKey('random_number');
});

it('throws validation error if data is invalid when set with the Config attribute', function () {
    ProductConfig::create([
        'name' => 'Product 1',
        'price' => '10.99',
        'random_number' => '123',
    ]);
})->throws(ValidationException::class);
