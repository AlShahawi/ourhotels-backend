<?php

namespace App\Hotels;

class Hotel
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $provider;

    /**
     * @var float
     */
    private $fare;

    /**
     * @var string[]
     */
    private $amenities;

    /**
     * @var float
     */
    private $rate;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Hotel
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getProvider(): string
    {
        return $this->provider;
    }

    /**
     * @param string $provider
     */
    public function setProvider(string $provider): self
    {
        $this->provider = $provider;

        return $this;
    }

    /**
     * @return float
     */
    public function getFare(): float
    {
        return $this->fare;
    }

    /**
     * @param float $fare
     * @return Hotel
     */
    public function setFare(float $fare): Hotel
    {
        $this->fare = $fare;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getAmenities(): array
    {
        return $this->amenities;
    }

    /**
     * @param string[] $amenities
     * @return Hotel
     */
    public function setAmenities(array $amenities): Hotel
    {
        $this->amenities = $amenities;

        return $this;
    }

    /**
     * @return float
     */
    public function getRate(): float
    {
        return $this->rate;
    }

    /**
     * @param float $rate
     * @return Hotel
     */
    public function setRate(float $rate): Hotel
    {
        $this->rate = $rate;

        return $this;
    }
}
