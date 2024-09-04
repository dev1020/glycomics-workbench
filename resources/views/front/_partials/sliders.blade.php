<div class="carousel">
    <!-- list item -->
    <div class="list" onmouseenter="pauseSlides()" onmouseleave="resumeSlides()">
        @foreach ($sliders as $slider)
            <div class="item slideitems">
                <img src="{{ URL::asset($slider->slider_image) }}">
                <div class="content">
                    <div class="author">{{$slider->author}}</div>
                    <div class="topic">{{$slider->title}}</div>
                    <div class="des">
                        {!!($slider->description)!!}
                    </div>
                    <div class="buttons">

                        <a href="{{$slider->read_more_url}}">SEE MORE</a>

                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <!-- list thumnail -->
    <div class="thumbnail">
        @foreach ($sliders as $slider)
            <div class="item thumbitems">
                <img src="{{ URL::asset($slider->slider_thumbnail) }}">

            </div>
        @endforeach

    </div>
    <!-- next prev -->

    <div class="arrows">
        <button id="prev"><</button>
        <button id="next">></button>
    </div>
    <!-- time running -->
    <div class="time"></div>
</div>

<script type="text/javascript" src="{{ URL::asset('js/slider.js') }}"></script>
