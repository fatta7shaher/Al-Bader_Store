@extends('admin.master')

@section('title')
    {{ __('Create Product') }}
@stop

@section('css')

@stop

@section('title_page')
    {{ __('Create Product') }}
@endsection

@section('content')


    <!-- Content Wrapper. Contains page content -->
    <div class="card-body">
        @if (session('error_catch'))
            <div class="bg-danger">{{ session('error_catch') }}</div>
        @endif

        <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
            @csrf


            <div class="row">
                <label for="name_ar">{{ __('category') }}</label>
                <select name="category_id" id="" class="form-control">
                    <option value="">{{ __('please_select') }}</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>


            <div class="row">
                <div class="col">
                    <label for="name_ar">{{ __('name_ar') }}</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control @error('name_ar') is-invalid @enderror" name="name_ar"
                            value="{{ old('name_ar') }}">
                    </div>
                    @error('name_ar')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label for="name_en">{{ __('name_en') }}</label>
                    <div class="input-group mb-3 col">
                        <input type="text" class="form-control @error('name_en') is-invalid @enderror" name="name_en"
                            value="{{ old('name_en') }}">

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
                            value="{{ old('slug') }}">
                    </div>
                    @error('slug')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label for="image">{{ __('image') }}</label>
                    <div class="input-group mb-3 col">
                        <input type="file" class="form-control  @error('image') is-invalid @enderror" name="image"
                            value="{{ old('image') }}">
                    </div>
                    @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <div class="row">
                <div class="col">
                    <label for="short_description_ar">{{ __('short_description_ar') }}</label>
                    <div class="input-group mb-3">
                        <textarea name="short_description_ar" rows="3" cols="3"
                            class="form-control @error('short_description_ar') is-invalid @enderror">{{ old('short_description_ar') }}</textarea>
                    </div>
                    @error('short_description_ar')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label for="short_description_en">{{ __('short_description_en') }}</label>
                    <div class="input-group mb-3">
                        <textarea name="short_description_en" rows="3" cols="3"
                            class="form-control @error('short_description_en') is-invalid @enderror">{{ old('short_description_en') }}</textarea>
                    </div>
                    @error('short_description_en')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label for="description_ar">{{ __('description_ar') }}</label>
                    <div class="input-group mb-3">
                        <textarea name="description_ar" rows="3" cols="3"
                            class="form-control @error('description_ar') is-invalid @enderror">{{ old('description_ar') }}</textarea>
                    </div>
                    @error('description_ar')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label for="description_en">{{ __('description_en') }}</label>
                    <div class="input-group mb-3">
                        <textarea name="description_en" rows="3" cols="3"
                            class="form-control @error('description_en') is-invalid @enderror">{{ old('description_en') }}</textarea>
                    </div>
                    @error('description_en')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label for="status">{{ __('status') }}</label>
                    <div class="input-group mb-3">
                        <input type="checkbox" class="" id="status" name="status">
                    </div>

                </div>
                <div class="col">
                    <label for="trend">{{ __('trend') }}</label>
                    <div class="input-group mb-3 col">
                        <input type="checkbox" class="" id="trend" name="trend">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label for="price">{{ __('price') }}</label>
                    <div class="input-group mb-3">
                        <input type="number" name="price" class="form-control @error('price') is-invalid @enderror"
                            value="{{ old('price') }}">
                    </div>
                    @error('price')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label for="selling_price">{{ __('selling_price') }}</label>
                    <div class="input-group mb-3">
                        <input type="number" name="selling_price"
                            class="form-control @error('selling_price') is-invalid @enderror"
                            value="{{ old('selling_price') }}">
                    </div>
                    @error('selling_price')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label for="qty">{{ __('qty') }}</label>
                    <div class="input-group mb-3">
                        <input type="number" name="qty" class="form-control @error('qty') is-invalid @enderror"
                            value="{{ old('qty') }}">
                    </div>
                    @error('qty')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label for="tax">{{ __('tax') }}</label>
                    <div class="input-group mb-3">
                        <input type="number" name="tax" class="form-control @error('tax') is-invalid @enderror"
                            value="{{ old('tax') }}">
                    </div>
                    @error('tax')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label for="meta_title">{{ __('meta_title') }}</label>
                    <div class="input-group mb-3">
                        <input type="text" name="meta_title"
                            class="form-control @error('meta_title') is-invalid @enderror"
                            value="{{ old('meta_title') }}">
                    </div>
                    @error('meta_title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label for="meta_description_ar">{{ __('meta_description_ar') }}</label>
                    <div class="input-group mb-3">
                        <textarea name="meta_description_ar" rows="3" cols="3"
                            class="form-control @error('meta_description_ar') is-invalid @enderror">{{ old('meta_description_ar') }}</textarea>
                    </div>
                    @error('meta_description_ar')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label for="meta_description_en">{{ __('meta_description_en') }}</label>
                    <div class="input-group mb-3">
                        <textarea name="meta_description_en" rows="3" cols="3"
                            class="form-control @error('meta_description_en') is-invalid @enderror">{{ old('meta_description_en') }}</textarea>
                    </div>
                    @error('meta_description_en')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label for="meta_keywords">{{ __('meta_keyword') }}</label><span
                        class="text-danger">{{ __('meta_keyword_note') }}</span>
                    <div class="input-group mb-3">
                        <textarea name="meta_keywords" rows="3" cols="3"
                            class="form-control @error('meta_keywords') is-invalid @enderror">{{ old('meta_keywords') }}</textarea>
                    </div>
                    @error('meta_keywords')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn btn-outline-primary">{{ __('Save') }}</button>
        </form>
    </div>

@endsection

@section('js')

@endsection
