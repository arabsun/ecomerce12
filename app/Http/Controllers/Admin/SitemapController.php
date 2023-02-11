<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class SitemapController extends Controller
{
    public function index() {
        $products = Product::all();
        return response()->view('admin.sitemap.index', ['products' => $products])->header('Content-Type', 'text/xml');
    }
}
