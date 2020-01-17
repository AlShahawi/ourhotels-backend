<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Hotels\OurHotelsService;
use App\Hotels\Apis\TopHotelsApi;
use App\Hotels\Apis\BestHotelApi;

class OurHotelsServiceTest extends TestCase
{
    public function testItAggregatesHotelsFromMultipleProviders()
    {
        $this->mock(TopHotelsApi::class, function ($mock) {
            $mock->shouldReceive('findHotels')->once()->andReturn([
                [
                    'hotelName' => 'Good Hotel',
                    'rate' => '****',
                    'price' => 299.99,
                    'amenities' => ['TV', 'Wifi', 'Local travel guides'],
                ],
                [
                    'hotelName' => 'Great Hotel',
                    'rate' => '*****',
                    'price' => 399.99,
                    'discount' => 10,
                    'amenities' => ['60 Inch TV', 'High Speed Wifi', 'Wireless Speaker',
                        'Local travel guides', 'A showerhead with wireless speaker'],
                ],
            ]);
        });

        $this->mock(BestHotelApi::class, function ($mock) {
            $mock->shouldReceive('getHotels')->once()->andReturn([
                [
                    'hotel' => 'Excellent Hotel',
                    'hotelRate' => 4.8,
                    'hotelFare' => 399.99,
                    'roomAmenities' => 'TV,Wifi,Wireless Speaker,Local travel guides',
                ],
                [
                    'hotel' => 'Very Good Hotel',
                    'hotelRate' => 4.5,
                    'hotelFare' => 349,
                    'roomAmenities' => '60 Inch TV,High Speed Wifi,Wireless Speakers,Local travel guides',
                ],
            ]);
        });

        /** @var OurHotelsService $provider */
        $provider = $this->app->make(OurHotelsService::class);

        $hotelsCollection = collect($provider->search('2020-01-20', '2020-01-30', 'CAI', 2));

        $this->assertCount(4, $hotelsCollection);
        $this->assertEquals(
            [5, 4.8, 4.5, 4.0],
            $hotelsCollection->map(function ($hotel) {
                return $hotel->getRate();
            })->toArray()
        );
        $this->assertEquals(
            ['Great Hotel', 'Excellent Hotel', 'Very Good Hotel', 'Good Hotel'],
            $hotelsCollection->map(function ($hotel) {
                return $hotel->getName();
            })->toArray()
        );
    }
}
