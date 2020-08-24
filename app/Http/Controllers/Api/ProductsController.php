<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Список товаров
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function __invoke(Request $request)
    {
        $products = Product::with(['properties' => function ($query) {
            $query->with('values');
        }]);

        if (request()->has('properties')) {
            $products = Product::addFilters($request->get('properties'), $products);
        }

        return $products->paginate();
    }
}
