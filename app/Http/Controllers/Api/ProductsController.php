<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductPropertiesRequest;
use App\Models\Product;

class ProductsController extends Controller
{
    /**
     * Список товаров
     *
     * @param ProductPropertiesRequest $request
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function __invoke(ProductPropertiesRequest $request)
    {
        $products = Product::with('properties');

        if (request()->has('properties')) {
            $products = Product::addFilters(request()->get('properties'), $products);
        }

        return $products->paginate(Product::DEFAULT_PAGINATION);
    }
}
