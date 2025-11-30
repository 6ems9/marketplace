<?php

namespace App\Controllers;

use App\Models\Product;
use App\Support\View;

class ProductController
{
    private $products;

    public function __construct()
    {
        $this->products = new Product();
    }

    public function index(): string
    {
        $products = $this->products->all();

        return View::render('products/index', [
            'products' => $products,
        ]);
    }

    /**
     * @param array{id:string} $params
     */
    public function show(array $params): string
    {
        $product = $this->products->find($params['id']);

        if (!$product) {
            http_response_code(404);
            return View::render('errors/404', ['path' => '/product/' . $params['id']]);
        }

        return View::render('products/show', ['product' => $product]);
    }

    public function create(): string
    {
        return View::render('products/create');
    }

    public function store(): void
    {
        $product = $this->products->create($_POST);

        header('Location: /product/' . $product['id']);
        exit;
    }
}
