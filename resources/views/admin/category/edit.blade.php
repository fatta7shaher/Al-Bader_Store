@extends('admin.master')

@section('title')
    {{ __('Edit Category') }}
@endsection

@section('css')
@endsection

@section('title_page')
    {{ __('Edit Category') }}
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="card-body">
        @if (session('error_catch'))
            <div class="bg-danger">{{ session('error_catch') }}</div>
        @endif
        <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="row">

                <div class="col">
                    <label for="name_ar">{{ __('name_ar') }}</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control @error('name_ar') is-invalid @enderror" name="name_ar"
                            value="{{ $category->getTranslation('name', 'ar') }}">
                    </div>
                    @error('name_ar')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
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
                        <input type="text" class="form-control  @error('slug') is-invalid @enderror" name="slug"
                            value="{{ $category->slug }}">
                    </div>
                    @error('slug')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col">
                    <label for="image">{{ __('image') }}</label>
                    <div class="input-group mb-3 col">
                        <img src="{{ Storage::url($category->image) }}" alt="" class="img-thumbnail"
                            style="max-width:200px;">
                        <input type="file" class="form-control" name="image">
                    </div>
                    @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <div class="row">

                <div class="col">
                    <label for="description_ar">{{ __('description_ar') }}</label>
                    <div class="input-group mb-3">
                        <textarea name="description_ar" rows="3" cols="3"
                            class="form-control @error('description_ar') is-invalid @enderror">{{ $category->getTranslation('description', 'ar') }}</textarea>
                    </div>
                    @error('description_ar')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col">
                    <label for="description_en">{{ __('description_en') }}</label>
                    <div class="input-group mb-3">
                        <textarea name="description_en" rows="3" cols="3"
                            class="form-control @error('description_en') is-invalid @enderror">{{ $category->getTranslation('description', 'en') }}</textarea>
                    </div>
                    @error('description_en')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <div class="row">

                <div class="col">
                    <label for="is_showing">{{ __('is_showing') }}</label>
                    <div class="input-group mb-3">
                        <input type="checkbox" class="" id="is_showing" name="is_showin"
                            {{ $category->is_showing == 1 ? 'checked' : '' }}>
                    </div>
                </div>

                <div class="col">
                    <label for="is_popular">{{ __('is_popular') }}</label>
                    <div class="input-group mb-3 col">
                        <input type="checkbox" class="" id="is_popular" name="is_popular"
                            {{ $category->is_popular == 1 ? 'checked' : '' }}>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col">
                    <label for="meta_title_ar">{{ __('meta_title_ar') }}</label>
                    <div class="input-group mb-3">
                        <input type="text" name="meta_title_ar"
                            class="form-control @error('meta_title_ar') is-invalid @enderror"
                            value="{{ $category->getTranslation('meta_title', 'ar') }}">
                    </div>
                    @error('meta_title_ar')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col">
                    <label for="meta_title_en">{{ __('meta_title_en') }}</label>
                    <div class="input-group mb-3">
                        <input type="text" name="meta_title_en"
                            class="form-control @error('meta_title_en') is-invalid @enderror"
                            value="{{ $category->getTranslation('meta_title', 'en') }}">
                    </div>
                    @error('meta_title_en')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <div class="row">

                <div class="col">
                    <label for="meta_description_ar">{{ __('meta_description_ar') }}</label>
                    <div class="input-group mb-3">
                        <textarea name="meta_description_ar" rows="3" cols="3"
                            class="form-control @error('meta_description_ar') is-invalid @enderror"> {{ $category->getTranslation('meta_description', 'ar') }} </textarea>
                    </div>
                    @error('meta_description_ar')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col">
                    <label for="meta_description_en">{{ __('meta_description_en') }}</label>
                    <div class="input-group mb-3">
                        <textarea name="meta_description_en" rows="3" cols="3"
                            class="form-control @error('meta_description_en') is-invalid @enderror"> {{ $category->getTranslation('meta_description', 'en') }} </textarea>
                    </div>
                    @error('meta_description_en')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <div class="row">

                <div class="col">
                    <label for="meta_keywords">{{ __('meta_keywords') }}</label><span
                        class="text-danger">{{ __('meta_keyword_note') }}</span>
                    <div class="input-group mb-3">
                        <textarea name="meta_keywords" rows="3" cols="3"
                            class="form-control @error('meta_keywords') is-invalid @enderror"> {{ $category->meta_keywords }} </textarea>
                    </div>
                    @error('meta_keywords')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <button type="submit" class="btn btn-outline-primary">{{ __('save') }}</button>

        </form>

    </div>
@endsection

@section('js')
@endsection
