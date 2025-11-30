<?php

namespace App\Models;

class Product
{
    private $dataFile;

    public function __construct(string $dataFile = null)
    {
        $this->dataFile = $dataFile ?: __DIR__ . '/../../storage/products.json';
        $this->ensureStorage();
    }

    /**
     * @return array<int, array{name:string,description:string,price:float,stock:int,id:string,image?:string}>
     */
    public function all(): array
    {
        return $this->readData();
    }

    /**
     * @param string $id
     * @return array{name:string,description:string,price:float,stock:int,id:string,image?:string}|null
     */
    public function find(string $id): ?array
    {
        foreach ($this->readData() as $product) {
            if ($product['id'] === $id) {
                return $product;
            }
        }

        return null;
    }

    /**
     * @param array{name:string,description:string,price:string|float,stock:string|int,image?:string} $attributes
     * @return array{name:string,description:string,price:float,stock:int,id:string,image?:string}
     */
    public function create(array $attributes): array
    {
        $products = $this->readData();

        $product = [
            'id' => uniqid('prd-', false),
            'name' => trim($attributes['name'] ?? ''),
            'description' => trim($attributes['description'] ?? ''),
            'price' => (float) ($attributes['price'] ?? 0),
            'stock' => (int) ($attributes['stock'] ?? 0),
            'image' => trim($attributes['image'] ?? ''),
        ];

        $products[] = $product;
        $this->writeData($products);

        return $product;
    }

    private function ensureStorage(): void
    {
        if (!file_exists($this->dataFile)) {
            $seed = [
                [
                    'id' => 'prd-1',
                    'name' => 'Kopi Gayo',
                    'description' => 'Biji kopi arabika dari dataran tinggi Gayo, cocok untuk manual brew.',
                    'price' => 85000,
                    'stock' => 24,
                    'image' => 'https://images.unsplash.com/photo-1459257868276-5e65389e2722?auto=format&fit=crop&w=800&q=60',
                ],
                [
                    'id' => 'prd-2',
                    'name' => 'Totebag Tenun',
                    'description' => 'Totebag kain tenun buatan UMKM lokal, ramah lingkungan dan kuat.',
                    'price' => 120000,
                    'stock' => 12,
                    'image' => 'https://images.unsplash.com/photo-1523475472560-d2df97ec485c?auto=format&fit=crop&w=800&q=60',
                ],
                [
                    'id' => 'prd-3',
                    'name' => 'Lilin Aromaterapi',
                    'description' => 'Lilin kedelai aroma lavender, cocok untuk relaksasi di rumah.',
                    'price' => 65000,
                    'stock' => 40,
                    'image' => 'https://images.unsplash.com/photo-1512303382996-13e7934ef91b?auto=format&fit=crop&w=800&q=60',
                ],
            ];

            $this->writeData($seed);
        }
    }

    /**
     * @return array<int, array{name:string,description:string,price:float,stock:int,id:string,image?:string}>
     */
    private function readData(): array
    {
        $contents = file_get_contents($this->dataFile);
        $data = json_decode($contents ?: '[]', true);

        if (!is_array($data)) {
            return [];
        }

        return $data;
    }

    /**
     * @param array<int, array{name:string,description:string,price:float,stock:int,id:string,image?:string}> $products
     */
    private function writeData(array $products): void
    {
        if (!is_dir(dirname($this->dataFile))) {
            mkdir(dirname($this->dataFile), 0777, true);
        }

        file_put_contents($this->dataFile, json_encode($products, JSON_PRETTY_PRINT));
    }
}
