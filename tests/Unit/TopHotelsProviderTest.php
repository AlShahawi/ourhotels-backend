<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Hotels\Apis\TopHotelsApi;
use App\Hotels\Providers\TopHotelsProvider;
use App\Hotels\Providers\Abstracts\HotelProvider;

class TopHotelsProviderTest extends TestCase
{
    public function testItReturnHotelsAndHydrateHotel()
    {
        $this->mock(TopHotelsApi::class, function ($mock) {
            $mock->shouldReceive('findHotels')->once()->andReturn([
                [
                    'hotelName' => 'Excellent Hotel',
                    'rate' => '*****',
                    'price' => 399.99,
                    'discount' => 10,
                    'amenities' => ['60 Inch TV', 'High Speed Wifi', 'Wireless Speaker',
                        'Local travel guides', 'A showerhead with wireless speaker'],
                ],
                [
                    'hotelName' => 'Good Hotel',
                    'rate' => '****',
                    'price' => 299.99,
                    'amenities' => ['60 Inch TV', 'High Speed Wifi', 'Wireless Speaker', 'Local travel guides'],
                ],
            ]);
        });

        /** @var HotelProvider $provider */
        $provider = $this->app->make(TopHotelsProvider::class);

        $hotelsCollection = collect($provider->findMany('2020-01-20', '2020-01-30', 'CAI', 2));

        $this->assertCount(2, $hotelsCollection);

        $this->assertEquals(TopHotelsProvider::PROVIDER_NAME, $hotelsCollection->first()->getProvider());
        $this->assertEquals('Excellent Hotel', $hotelsCollection->first()->getName());
        $this->assertEquals(5, $hotelsCollection->first()->getRate());
        $this->assertEquals(399.99, $hotelsCollection->first()->getFare());
        $this->assertEquals(
            ['60 Inch TV', 'High Speed Wifi', 'Wireless Speaker',
                'Local travel guides', 'A showerhead with wireless speaker'],
            $hotelsCollection->first()->getAmenities()
        );

        $this->assertEquals(TopHotelsProvider::PROVIDER_NAME, $hotelsCollection->last()->getProvider());
        $this->assertEquals('Good Hotel', $hotelsCollection->last()->getName());
        $this->assertEquals(4, $hotelsCollection->last()->getRate());
        $this->assertEquals(299.99, $hotelsCollection->last()->getFare());
        $this->assertEquals(
            ['60 Inch TV', 'High Speed Wifi', 'Wireless Speaker', 'Local travel guides'],
            $hotelsCollection->last()->getAmenities()
        );
    }
}
