<?php

class Beanie
{
	const AVAILABLE_SIZE = [
		'S', 'M', 'L', 'XL',
	];

	const AVAILABLE_MATERIALS = [
		self::MATERIAL_WOOL =>'Laine', 
		self::MATERIAL_CASHMERE =>'Cachemire', 
		self::MATERIAL_COTTON =>'Coton', 
		self::MATERIAL_SILK =>'Soie',
	];
	const MATERIAL_WOOL = 'Wool';
	const MATERIAL_CASHMERE = 'Cashmere';
	const MATERIAL_COTTON = 'Cotton';
	const MATERIAL_SILK = 'Silk';

    protected ?int $id;

    protected ?string $name;

    protected ?string $description;

    protected float $price = 0.0;
    
    protected ?string $image;

	protected array $sizes = [];

	protected array $materials = [];

	public function getId(): ?int {
		return $this->id;
	}

	public function setId(?int $id): self {
		$this->id = $id;
		return $this;
	}
	public function getName(): ?string {
		return $this->name;
	}

	public function setName(?string $name): self {
		$this->name = $name;
		return $this;
	}

	public function getDescription(): ?string {
		return $this->description;
	}

	public function setDescription(?string $description): self {
		$this->description = $description;
		return $this;
	}

	public function getPrice(): float {
		return $this->price;
	}

	public function setPrice(float $price): self {
		$this->price = $price;
		return $this;
	}

	public function getImage(): ?string {
		return $this->image;
	}

	public function setImage(?string $image): self {
		$this->image = $image;
		return $this;
	}

	public function getSizes(): array {
		return $this->sizes;
	}

	public function setSizes(array $sizes = []): self {
		$this->sizes = $sizes;
		return $this;
	}

	public function addSize(string $size): self {
		if (!in_array($size, self::AVAILABLE_SIZE)) {
			return $this;
		}
		if (!in_array($size, $this->sizes)) {
			$this->sizes[] = $size;
		}
		return $this;
	}

	public function removeSize(string $size): self {
		if (in_array($size, $this->sizes)) {
			foreach ($this->sizes as $key => $currentSize) {
				if ($currentSize == $size) {
					unset($this->sizes[$key]);
				}
			}

		}
		return $this;
	}


	public function getMaterials(): array {
		return $this->materials;
	}
	
	public function setMaterials(array $materials = []): self {
		foreach ($materials as $material) {
			$this->addMaterial($material);
		}
		
		return $this;
	}

	public function addMaterial(string $material): self {
		if (!isset(self::AVAILABLE_MATERIALS[$material])) {
			return $this;
		}
		if (!in_array($material, $this->materials)) {
			$this->materials[$material] = $material;
		}
		return $this;
	}

	public function removeMaterial(string $material): self {
		if (isset($this->materials[$material])) {
			unset($this->materials[$material]);
		}
		return $this;
	}
}

?>