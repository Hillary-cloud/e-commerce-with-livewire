<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use App\Models\HomeCategory;

class HomeCategoryComponent extends Component
{
    public $selected_categories = [];
    public $numberOfProducts;
    public function mount(){
        $category = HomeCategory::find(1);
        $this->selected_categories = explode(',',$category->sel_categories);
        $this->numberOfProducts = $category->no_of_products;
    }
    public function updateHomeCategory(){
        $category = HomeCategory::find(1);
        $category->sel_categories = implode(',',$this->selected_categories);
        $category->no_of_products = $this->numberOfProducts;
        $category->save();
        session()->flash('message','Category has been updated successfully');
    }
    public function render()
    {
        $categories = Category::all();

        return view('livewire.admin.home-category-component',compact('categories'))->layout('layouts.base');
    }
}
