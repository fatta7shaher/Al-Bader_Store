@extends('admin.master')

@section('title')
    {{ __('Show Product') }} | {{ $product->meta_title }}
@stop

@section('css')

@stop

@section('title_page')
    {{ __('Show Product') }} | {{ $product->meta_title }}
@endsection

@section('content')


    <!-- Content Wrapper. Contains page content -->
    <div class="card-body">
        @if (session('error_catch'))
            <div class="bg-danger">{{ session('error_catch') }}</div>
        @endif

        <form action="#">

            {{-- <div class="row my-2">
                <label for="name_ar">{{ __('category') }}</label>
                <select name="category_id" id="" class="form-control">
                    <option value="">{{ __('please_select') }}</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}</option>
                    @endforeach
                </select>
            </div> --}}

            <div class="row my-2">
                <div class="col">
                    <label for="name_ar">{{ __('category') }}</label>
                    <input type="text" readonly class="form-control" value="{{ $product->category->name }}">
                </div>
            </div>
            <div class="row my-2">
                <div class="col">
                    <label for="name_ar">{{ __('name_ar') }}</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="name_ar"
                            value="{{ $product->getTranslation('name', 'ar') }}">
                    </div>
                </div>
                <div class="col">
                    <label for="name_en">{{ __('name_en') }}</label>
                    <div class="input-group mb-3 col">
                        <input type="text" class="form-control" name="name_en"
                            value="{{ $product->getTranslation('name', 'en') }}">

                    </div>
                </div>
            </div>

            <div class="row my-2">
                <div class="col">
                    <label for="slug">{{ __('slug') }}</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="slug" value="{{ $product->slug }}">
                    </div>
                </div>
                <div class="col">
                    <div class="row my-2">
                        <label for="image">{{ __('image') }}</label>
                        <div class="col-8">
                            <img src="{{ Storage::url($product->image) }}" alt="" class="rounded mx-auto d-block"
                                style="max-width:125px;">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row my-2">
                <div class="col">
                    <label for="short_description_ar">{{ __('short_description_ar') }}</label>
                    <div class="input-group mb-3">
                        <textarea name="short_description_ar" rows="3" cols="3" class="form-control">{{ $product->getTranslation('short_description', 'ar') }}</textarea>
                    </div>
                </div>
                <div class="col">
                    <label for="short_description_en">{{ __('short_description_en') }}</label>
                    <div class="input-group mb-3">
                        <textarea name="short_description_en" rows="3" cols="3" class="form-control">{{ $product->getTranslation('short_description', 'en') }}</textarea>
                    </div>
                </div>
            </div>

            <div class="row my-2">
                <div class="col">
                    <label for="description_ar">{{ __('description_ar') }}</label>
                    <div class="input-group mb-3">
                        <textarea name="description_ar" rows="3" cols="3" class="form-control">{{ $product->getTranslation('description', 'ar') }}</textarea>
                    </div>
                </div>
                <div class="col">
                    <label for="description_en">{{ __('description_en') }}</label>
                    <div class="input-group mb-3">
                        <textarea name="description_en" rows="3" cols="3" class="form-control">{{ $product->getTranslation('description', 'en') }}</textarea>
                    </div>
                </div>
            </div>

            <div class="row my-2">
                <div class="col">
                    <label for="status">{{ __('status') }}</label>
                    <div class="input-group mb-3">
                        @if ($product->status == 1)
                            <span class="badge badge-success">{{ __('showing') }}</span>
                        @else
                            <span class="badge badge-danger">{{ __('hidden') }}</span>
                        @endif
                    </div>

                </div>
                <div class="col">
                    <label for="trend">{{ __('trend') }}</label>
                    <div class="input-group mb-3 col">
                        @if ($product->trend == 1)
                            <span class="badge badge-success">{{ __('popular') }}</span>
                        @else
                            <span class="badge badge-danger">{{ __('no_popular') }}</span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row my-2">
                <div class="col">
                    <label for="price">{{ __('price') }}</label>
                    <div class="input-group mb-3">
                        <input type="number" name="price" class="form-control" value="{{ $product->price }}">
                    </div>
                </div>
                <div class="col">
                    <label for="selling_price">{{ __('selling_price') }}</label>
                    <div class="input-group mb-3">
                        <input type="number" name="selling_price" class="form-control"
                            value="{{ $product->selling_price }}">
                    </div>
                </div>
            </div>

            <div class="row my-2">
                <div class="col">
                    <label for="qty">{{ __('qty') }}</label>
                    <div class="input-group mb-3">
                        <input type="number" name="qty" class="form-control" value="{{ $product->qty }}">
                    </div>
                </div>
                <div class="col">
                    <label for="tax">{{ __('tax') }}</label>
                    <div class="input-group mb-3">
                        <input type="number" name="tax" class="form-control" value="{{ $product->tax }}">
                    </div>
                </div>
            </div>

            <div class="row my-2">
                <div class="col">
                    <label for="meta_title">{{ __('meta_title') }}</label>
                    <div class="input-group mb-3">
                        <input type="text" name="meta_title" class="form-control"
                            value="{{ $product->meta_title }}">
                    </div>
                </div>
            </div>

            <div class="row my-2">
                <div class="col">
                    <label for="meta_description_ar">{{ __('meta_description_ar') }}</label>
                    <div class="input-group mb-3">
                        <textarea name="meta_description_ar" rows="3" cols="3" class="form-control">{{ $product->getTranslation('meta_description', 'ar') }}</textarea>
                    </div>
                </div>
                <div class="col">
                    <label for="meta_description_en">{{ __('meta_description_en') }}</label>
                    <div class="input-group mb-3">
                        <textarea name="meta_description_en" rows="3" cols="3" class="form-control">{{ $product->getTranslation('meta_description', 'en') }}</textarea>
                    </div>
                </div>
            </div>

            <div class="row my-2">
                <div class="col">
                    <label for="meta_keywords">{{ __('meta_keyword') }}</label><span
                        class="text-danger">{{ __('meta_keyword_note') }}</span>
                    <div class="input-group mb-3">
                        <textarea name="meta_keywords" rows="3" cols="3" class="form-control">{{ $product->meta_keywords }}</textarea>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection

@section('js')

@endsection
