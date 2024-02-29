@extends('website.layouts.master')
@section('title')
    {{ __('trans.Category') }}
@endsection
@section('content')
    <div class="py-5">
        <div class="container">
            <h3 class="text-center">{{ __('Trend Category') }}</h3>
            <div class="row">
                @foreach ($categories as $category)
                    <div class="col-md-4">
                        <a href="{{ route('get_category_slug', $category->slug) }}">
                            <div class="card my-5" style="width: 18rem;">
                                <div class="img">
                                    <img src="{{ Storage::url($category->image) }}" class="card-img-top img-responsive"
                                        style="height: 250px ; width: 100% ;" alt="...">
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">{{ $category->meta_title }}</h5>
                                    <p class="card-text">{{ $category->meta_description }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
