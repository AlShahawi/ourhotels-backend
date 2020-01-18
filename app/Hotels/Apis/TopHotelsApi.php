<?php

namespace App\Hotels\Apis;

/**
 * Class TopHotelsApi
 *
 * @package App\Hotels\Apis
 */
class TopHotelsApi
{
    /**
     * Mimic the api http request.
     *
     * @param string $from
     * @param string $to
     * @param string $city
     * @param int $adultsCount
     * @return array
     */
    public function findHotels(string $from, string $to, string $city, int $adultsCount): array
    {
        // We're mimicking the process of making an http request.
        // We're not using any of this function paramaters because
        // filtering the data will be the responsibility of the real api.

        return $this->getHotelsData();
    }

    /**
     * @return array
     */
    private function getHotelsData(): array
    {
        return [
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
            [
                'hotelName' => 'Another Good Hotel',
                'rate' => '****',
                'price' => 289,
                'amenities' => ['60 Inch TV', 'High Speed Wifi', 'Local travel guides'],
            ],
            [
                'hotelName' => 'Not Bad Hotel',
                'rate' => '**',
                'price' => 149.99,
                'amenities' => ['Wifi', 'Local travel guides'],
            ],
        ];
    }
}
