@extends('admin.master')

@section('title')
    {{ __('Show Category') }}
@endsection

@section('css')
@endsection

@section('title_page')
    {{ __('Show Category') }}
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="card-body">
        @if (session('error_catch'))
            <div class="bg-danger">{{ session('error_catch') }}</div>
        @endif

        <form>
            <div class="row">

                <div class="col">
                    <label for="name_ar">{{ __('name_ar') }}</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="name_ar"
                            value="{{ $category->getTranslation('name', 'ar') }}" readonly>
                    </div>
                </div>

                <div class="col">
                    <label for="name_en">{{ __('name_en') }}</label>
                    <div class="input-group mb-3 col">
                        <input type="text" class="form-control @error('name_en') is-invalid @enderror" name="name_en"
                            value="{{ $category->getTranslation('name', 'en') }}">
                    </div>
                    @error('name_en')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <div class="row">

                <div class="col">
                    <label for="slug">{{ __('slug') }}</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="slug" value="{{ $category->slug }}" readonly>
                    </div>
                </div>

                <div class="col">
                    <label for="image">{{ __('image') }}</label>
                    <div class="input-group mb-3 col">
                        <img src="{{ Storage::url($category->image) }}" alt="" class="img-thumbnail"
                            style="max-width:200px;">
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col">
                    <label for="description_ar">{{ __('description_ar') }}</label>
                    <div class="input-group mb-3">
                        <textarea name="description_ar" rows="3" cols="3" class="form-control" readonly>{{ $category->getTranslation('description', 'ar') }}</textarea>
                    </div>
                    @error('description_ar')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col">
                    <label for="description_en">{{ __('description_en') }}</label>
                    <div class="input-group mb-3">
                        <textarea name="description_en" rows="3" cols="3" class="form-control" readonly>{{ $category->getTranslation('description', 'en') }}</textarea>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col">
                    <label for="is_showing">{{ __('is_showing') }}</label>
                    <div class="input-group mb-3">
                        @if ($category->is_showing == 1)
                            <span class="badge badge-success">{{ trans('showing') }}</span>
                        @else
                            <span class="badge badge-danger">{{ trans('hidden') }}</span>
                        @endif
                    </div>
                </div>

                <div class="col">
                    <label for="is_popular">{{ __('is_popular') }}</label>
                    <div class="input-group mb-3 col">
                        @if ($category->is_popular == 1)
                            <span class="badge badge-success">{{ trans('popular') }}</span>
                        @else
                            <span class="badge badge-danger">{{ trans('no_popular') }}</span>
                        @endif
                    </div>
                </div>

            </div>
            <div class="row">

                <div class="col">
                    <label for="meta_title_ar">{{ __('meta_title_ar') }}</label>
                    <div class="input-group mb-3">
                        <input type="text" name="meta_title_ar" class="form-control"
                            value="{{ $category->getTranslation('meta_title', 'ar') }}" readonly>
                    </div>
                </div>

                <div class="col">
                    <label for="meta_title_en">{{ __('meta_title_en') }}</label>
                    <div class="input-group mb-3">
                        <input type="text" name="meta_title_en" class="form-control"
                            value="{{ $category->getTranslation('meta_title', 'en') }}" readonly>
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col">
                    <label for="meta_description_ar">{{ __('meta_description_ar') }}</label>
                    <div class="input-group mb-3">
                        <textarea name="meta_description_ar" rows="3" cols="3" class="form-control" readonly> {{ $category->getTranslation('meta_description', 'ar') }} </textarea>
                    </div>
                </div>

                <div class="col">
                    <label for="meta_description_en">{{ __('meta_description_en') }}</label>
                    <div class="input-group mb-3">
                        <textarea name="meta_description_en" rows="3" cols="3" class="form-control" readonly> {{ $category->getTranslation('meta_description', 'en') }} </textarea>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col">
                    <label for="meta_keywords">{{ __('meta_keywords') }}</label>
                    <div class="input-group mb-3">
                        <textarea name="meta_keywords" rows="3" cols="3" class="form-control" readonly> {{ $category->meta_keywords }} </textarea>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('js')
@endsection
