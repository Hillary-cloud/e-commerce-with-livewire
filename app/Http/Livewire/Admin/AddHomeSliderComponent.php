<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\HomeSlider;
use Carbon\Carbon;
use Livewire\WithFileUploads;

class AddHomeSliderComponent extends Component
{
    use WithFileUploads;
    public $title;
    public $subtitle;
    public $price;
    public $image;
    public $status;
    public $link;
    
    public function mount(){
        $this->status = 0;
    }

    public function storeSlide(){
        $slider = new HomeSlider();
        $slider->title = $this->title;
        $slider->subtitle = $this->subtitle;
        $slider->price = $this->price;
        $slider->link = $this->link;
        $slider->status = $this->status;
        $imageName = Carbon::now()->timestamp. '.' . $this->image->extension();
        $this->image->storeAs('sliders',$imageName);
        $slider->image = $imageName;
        $slider->save();
        session()->flash('message','Slide added successfully');
       
    }
    public function render()
    {
        return view('livewire.admin.add-home-slider-component')->layout('layouts.base');;
    }
}
