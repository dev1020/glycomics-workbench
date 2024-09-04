<?php

namespace App\View\Composers;

use App\Models\Slider;
use Illuminate\View\View;

class SliderComposer
{
    public function compose(View $view){
        $slider = Slider::where('slider_visible', 'yes')->get();
        $view->with(['sliders'=>$slider]);
    }
}
