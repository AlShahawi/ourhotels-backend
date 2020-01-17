<?php

namespace App\Hotels;

use Exception;

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
     * The discount percentage (from 1 to 100)
     *
     * @var int
     */
    private $discount;

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

    /**
     * @return int
     */
    public function getDiscount(): int
    {
        return $this->discount;
    }

    /**
     * @param int $discount
     * @return Hotel
     * @throws Exception
     */
    public function setDiscount(int $discount): Hotel
    {
        if ($discount > 100 || $discount < 1) {
            throw new Exception('The discount must be an integer between 1 and 100');
        }

        $this->discount = $discount;

        return $this;
    }
}
