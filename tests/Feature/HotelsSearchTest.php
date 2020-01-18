<?php

namespace Tests\Feature;

use Tests\TestCase;

class HotelsSearchTest extends TestCase
{
    public function testItGetsHotelsFromMultipleProviders()
    {
        $response = $this->getJson(route('hotels.search', [
            'from_date' => '2020-01-25',
            'to_date' => '2020-01-31',
            'city' => 'CIA',
            'adults_number' => 3,
        ]));

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'provider',
                        'hotelName',
                        'fare',
                        'amenities',
                    ],
                ]
            ]);
    }

    public function testItReturnValidationErrorsForInvalidData()
    {
        $response = $this->getJson(route('hotels.search', [
            'from_date' => 'invalid-date',
            'to_date' => 'invalid-date',
            'city' => 'invalid-IATA-code',
            'adults_number' => 'invalid-value',
        ]));

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['from_date', 'to_date', 'city', 'adults_number']);
    }
}
