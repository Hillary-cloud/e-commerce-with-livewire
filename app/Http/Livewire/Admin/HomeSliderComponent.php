<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\HomeSlider;

class HomeSliderComponent extends Component
{
    public function deleteSlide($id){
        $HomeSlider = HomeSlider::find($id);
        $HomeSlider->delete();
        session()->flash('message','Slide deleted successfully');
    }
    public function render()
    {
        $sliders = HomeSlider::all();
        return view('livewire.admin.home-slider-component',compact('sliders'))->layout('layouts.base');;
    }
}
