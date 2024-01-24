@extends('layouts.admin')
@include('admin.navbar-admin')
@section('title', 'Register Vendor Shop')

@section('content')
<article class="bg-color">
    <section class="login-register scanno-screens">
        <div class="container-xxl">
            <div class="row">
                <div class="col-lg-12">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="login-form">
                        <form class="row g-3" method="POST" action="{{ route('vendor-shop-update',$vendor->id) }}">
                            @csrf
                            @method('PATCH')
                            <div class="col-md-6">
                                <label for="shop_name" class="form-label">{{ __('Shop ID') }}</label>
                                <input class="form-control" type="text" name="shop_id" id="shop_id" placeholder="{{ __('Shop ID') }}" value="{{$vendor->shop_id}}">
                            </div>
                            <div class="col-md-6">
                                <label for="shop_name" class="form-label">{{ __('Shop Name') }}</label>
                                <input type="text" name="shop_name" id="shop_name" class="form-control" placeholder="{{ __('Shop Name') }}" value="{{$vendor->shop_name}}">
                            </div>
                            <div class="col-12">
                                <label for="shop_owner_phone_number" class="form-label">{{ __('Shop Owner Phone Number') }}</label>
                                <input type="text" class="form-control" name="shop_owner_phone_number" id="shop_owner_phone_number"  placeholder="{{ __('Shop Owner Phone Number') }}" value="{{$vendor->shop_owner_phone_number}}">
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="is_active" id="is_active" {{ $vendor->is_active == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active">
                                        {{ __('Active') }}
                                    </label>
                                </div>
                            </div>
                            <div class="registration-btn-block">
                                <button type="submit" class="voilet-bg-btn">Update Shop</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
</article>
