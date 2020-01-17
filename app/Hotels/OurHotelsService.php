<?php

namespace App\Hotels;

use Illuminate\Support\Collection;
use Illuminate\Container\Container;

class OurHotelsService
{
    /**
     * @var Container
     */
    private $container;

    /**
     * OurHotelsService constructor.
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * @param string $fromDate
     * @param string $toDate
     * @param string $city
     * @param int $adultsNumber
     * @return Collection
     */
    public function search(string $fromDate, string $toDate, string $city, int $adultsNumber): Collection
    {
        /** @var \Illuminate\Support\Collection $providersHotelsResult */
        $providersHotelsResult = collect([]);

        foreach ($this->getProviders() as $provider) {
            $providersHotelsResult = $providersHotelsResult->concat(
                $provider->findMany($fromDate, $toDate, $city, $adultsNumber)
            );
        }

        return $providersHotelsResult->sortByDesc(function ($hotel) {
            /** @var Hotel $hotel */
            return $hotel->getRate();
        })->values();
    }

    /**
     * @return Providers\Abstracts\HotelProvider[]
     */
    private function getProviders(): array
    {
        foreach ($this->container['config']['hotels.providers'] as $availableProvider) {
            $availableProviders[] = $this->container->make($availableProvider);
        }

        return $availableProviders ?? [];
    }
}
