<?php

namespace App\Http\Controllers;

use App\Repositories\Product\ProductRepository;

class ProductController extends Controller
{
    protected $productRepo;

    public function __construct(ProductRepository $productRepo)
    {
        $this->productRepo = $productRepo;
    }

    public function index()
    {
        $products = $this->productRepo->getProducts(2);

        return 'index';
    }
}
