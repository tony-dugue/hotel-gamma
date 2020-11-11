<?php

namespace App\Entity;


use Symfony\Component\Validator\Constraints as Assert;

class AccomodationSearch
{
    /**
     * @var string
     */
    private $type;

    /**
     * @var int|null
     */
    private $priceMin;

    /**
     * @var int|null
     * @Assert\Range(min=10, max=200)
     */
    private $priceMax;

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return int|null
     */
    public function getPriceMin(): ?int
    {
        return $this->priceMin;
    }

    /**
     * @param int $priceMin
     */
    public function setPriceMin(int $priceMin): void
    {
        $this->priceMin = $priceMin;
    }

    /**
     * @return int|null
     */
    public function getPriceMax(): ?int
    {
        return $this->priceMax;
    }

    /**
     * @param int $priceMax
     */
    public function setPriceMax(int $priceMax): void
    {
        $this->priceMax = $priceMax;
    }


}