<?php

class Filtre 

{
    protected array $bonnetFilter = [];

    protected ?float $minPrice = null;

    protected ?float $maxPrice = null;

    protected ?string $material = null;

    protected ?string $size = null;


    public function __construct(array $bonnetFilter, array $Filtre)
    {
        if (!empty($Filtre['minPrice'])) {
            $this->minPrice = floatval($Filtre['minPrice']);
        }
        if (!empty($Filtre['maxPrice'])) {
            $this->maxPrice = floatval($Filtre['maxPrice']);
        }
        if (!empty($Filtre['material'])) {
            $this->material = trim($Filtre['material']);
        }
        if (!empty($Filtre['size'])) {
            $this->size = trim($Filtre['size']);
        }

        $this->bonnetFilter = $this->apply($bonnetFilter);
    }


    public function apply(array $bonnetFilter): array
    {
        $minPrice = $this->getMinPrice();
        if ($minPrice) {
            $bonnetFilter = array_filter($bonnetFilter, function (Beanie $beanie) use ($minPrice) {
                return $beanie->getPrice() >= $minPrice;
            });
        }

        $maxPrice = $this->getMaxPrice();
        if ($maxPrice) {
            $bonnetFilter = array_filter($bonnetFilter, function (Beanie $beanie) use ($maxPrice) {
                return $beanie->getPrice() <= $maxPrice;
            });
        }

        $material = $this->getMaterial();
        if ($material) {
            $bonnetFilter = array_filter($bonnetFilter, function (Beanie $beanie) use ($material) {
                return in_array($material, $beanie->getMaterials());
            });
        }

        $size = $this->getSize();
        if ($size) {
            $bonnetFilter = array_filter($bonnetFilter, function (Beanie $beanie) use ($size) {
                return in_array($size, $beanie->getSizes());
            });
        }

        return $bonnetFilter;
    }

    public function getSize(): ?string
    {
        return $this->size;
    }

    public function getMaterial(): ?string
    {
        return $this->material;
    }

    public function getMaxPrice(): ?float
    {
        return $this->maxPrice;
    }

    public function getMinPrice(): ?float
    {
        return $this->minPrice;
    }

    public function getResult(): array
    {
        return $this->bonnetFilter;
    }
}




?>