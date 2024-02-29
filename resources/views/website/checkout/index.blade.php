@extends('website.layouts.master')
@section('title')
    {{ __('Checkout') }}
@endsection
@section('content')
    <div class="container">
        <div class="row py-5">
            <div class="col-7">
                <div class="card">
                    <div class="card-title text-center">
                        <h3>{{ __('Customer_Details') }}</h3>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <div class="row">
                                <div class="col">
                                    <label for="firstname" class="form-label">{{ __('first_name') }}</label>
                                    <input type="text" class="form-control" value="{{ $user->fname }}" name="firstname"
                                        id="firstname" placeholder="your first name">
                                </div>
                                <div class="col">
                                    <label for="lastname" class="form-label">{{ __('last_name') }}</label>
                                    <input type="text" class="form-control" value="{{ $user->lname }}" name="lastname"
                                        id="lastname" placeholder="your last name">
                                </div>

                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="email" class="form-label">{{ __('email') }}</label>
                                    <input type="email" class="form-control" value="{{ $user->email }}" name="email"
                                        id="email" placeholder="your email">
                                </div>
                                <div class="col">
                                    <label for="phone" class="form-label">{{ __('phone') }}</label>
                                    <input type="phone" class="form-control" value="{{ $user->phone }}" name="phone"
                                        id="phone" placeholder="your phone">
                                </div>

                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="address" class="form-label">{{ __('address') }}</label>
                                    <input type="text" class="form-control" value="{{ $user->address }}" name="address"
                                        id="address" placeholder="address">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="city" class="form-label">{{ __('city') }}</label>
                                    <input type="text" class="form-control" value="{{ $user->city }}" name="city"
                                        id="city" placeholder="city">
                                </div>
                                <div class="col">
                                    <label for="country" class="form-label">{{ __('country') }}</label>
                                    <input type="text" class="form-control" value="{{ $user->country }}" name="country"
                                        id="country" placeholder="country">
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-5">
                <div class="card">
                    <div class="card-title text-center">
                        <h3>{{ __('Order_Details') }}</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>

                                <tr>
                                    <th></th>
                                    <th>{{ __('Products') }}</th>
                                    <th>{{ __('Quantity') }}</th>
                                    <th>{{ __('Selling_Price') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1; @endphp
                                @foreach ($carts as $cart)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $cart->product->name }}</td>
                                        <td>{{ $cart->qty }}</td>
                                        <td>${{ $cart->product->selling_price }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <button class="btn btn-outline-primary float-end">{{ __('Place_Order') }}</button>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('js')
@endsection
