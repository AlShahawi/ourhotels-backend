<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Hotels\Apis\BestHotelApi;
use App\Hotels\Providers\BestHotelProvider;
use App\Hotels\Providers\Abstracts\HotelProvider;

class BestHotelProviderTest extends TestCase
{
    public function testItReturnHotelsAndHydrateHotel()
    {
        $this->mock(BestHotelApi::class, function ($mock) {
            $mock->shouldReceive('getHotels')->once()->andReturn([
                [
                    'hotel' => 'Excellent Hotel',
                    'hotelRate' => 4.8,
                    'hotelFare' => 399.99,
                    'roomAmenities' => 'TV,Wifi,Wireless Speaker,Local travel guides',
                ],
                [
                    'hotel' => 'Good Hotel',
                    'hotelRate' => 4,
                    'hotelFare' => 349,
                    'roomAmenities' => 'TV,Wifi',
                ],
            ]);
        });

        /** @var HotelProvider $provider */
        $provider = $this->app->make(BestHotelProvider::class);

        $hotelsCollection = collect($provider->findMany('2020-01-20', '2020-01-30', 'CAI', 2));

        $this->assertCount(2, $hotelsCollection);

        $this->assertEquals(BestHotelProvider::PROVIDER_NAME, $hotelsCollection->first()->getProvider());
        $this->assertEquals('Excellent Hotel', $hotelsCollection->first()->getName());
        $this->assertEquals(4.8, $hotelsCollection->first()->getRate());
        $this->assertEquals(399.99, $hotelsCollection->first()->getFare());
        $this->assertEquals(
            ['TV', 'Wifi', 'Wireless Speaker', 'Local travel guides'],
            $hotelsCollection->first()->getAmenities()
        );

        $this->assertEquals(BestHotelProvider::PROVIDER_NAME, $hotelsCollection->last()->getProvider());
        $this->assertEquals('Good Hotel', $hotelsCollection->last()->getName());
        $this->assertEquals(4, $hotelsCollection->last()->getRate());
        $this->assertEquals(349, $hotelsCollection->last()->getFare());
        $this->assertEquals(
            ['TV', 'Wifi'],
            $hotelsCollection->last()->getAmenities()
        );
    }
}
