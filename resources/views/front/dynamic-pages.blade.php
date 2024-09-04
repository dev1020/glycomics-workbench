{{--@extends($lab['a'])--}}
@extends('front.layouts'.'.'.$page->page_layout)
@section('title')
    {{($page->title)}}
@endsection
@section('content')
        <div class="dynamic-content {{$page->page_layout}}">
            @if(!request()->is('*home*') && !request()->is('/'))
            <h1 class="title font-weight-bold text-success">{{($page->title)}}</h1>
            @endif
            <hr>
            {!!($page->body)!!}
        </div>
@endsection
