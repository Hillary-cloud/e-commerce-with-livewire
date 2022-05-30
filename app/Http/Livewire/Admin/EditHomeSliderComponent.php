<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use Livewire\Component;
use Livewire\WithFileUploads;
use Carbon\Carbon;
class EditHomeSliderComponent extends Component
{
    use WithFileUploads;
    public $title;
    public $subtitle;
    public $price;
    public $image;
    public $status;
    public $link;
    public $new_image;
    public $slider_id;
    public $slide_id;

    public function mount($slide_id){
        $this->slide_id = $slide_id;
        $slider = HomeSlider::find($slide_id);
        $this->title = $slider->title;
        $this->subtitle = $slider->subtitle;
        $this->price = $slider->price;
        $this->link = $slider->link;
        $this->status = $slider->status;
        $this->image = $slider->image;
        $this->new_image = $slider->new_image;
        $this->slider_id = $slider->slider_id;
    }

    public function updateSlide(){
        $slider = HomeSlider::find($this->slider_id);
        $slider->title = $this->title;
        $slider->subtitle = $this->subtitle;
        $slider->price = $this->price;
        $slider->link = $this->link;
        if ($this->new_image) {
            $imageName = Carbon::now()->timestamp. '.' . $this->new_image->extension();
            $this->new_image->storeAs('sliders',$imageName);
            $slider->image = $imageName;
        }
        $slider->status = $this->status;
        $slider->save();
        session()->flash('message','Slide updated successfully');
    }

    public function render()
    {
        return view('livewire.admin.edit-home-slider-component')->layout('layouts.base');
    }
}
