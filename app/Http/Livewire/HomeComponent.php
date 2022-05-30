<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\HomeSlider;
use App\Models\Product;
use App\Models\Category;
use App\Models\HomeCategory;
use App\Models\Sale;

class HomeComponent extends Component
{
    public function render()
    {
        $sliders = HomeSlider::where('status',1)->get();
        $latestProducts = Product::orderBy('created_at', 'DESC')->get()->take(10);
        $category = HomeCategory::find(1);
        $cats = explode(',',$category->sel_categories);
        $categories = Category::whereIn('id',$cats)->get();
        $no_of_products = $category->no_of_products;
        $sale_products = Product::where('sale_price','>',0)->inRandomOrder()->get()->take(8);
        $sale = Sale::find(1);
        return view('livewire.home-component',compact('sliders','latestProducts','categories','no_of_products','sale_products','sale'))->layout('layouts.base');
    }
}
