<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Group;
use App\Models\Partner;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    function index()
    {
        $products = Product::all();
        $categories = Category::all();
        $partners = Partner::all();
        $groups = Group::all();
        return Inertia::render('Home', [
            'products' => $products,
            'categories' => $categories,
            'partners' => $partners,
            'groups' => $groups
        ]);
    }   
}
