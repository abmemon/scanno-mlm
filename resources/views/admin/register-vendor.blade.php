@extends('layouts.admin')
@include('admin.navbar-admin')
@section('title', 'Register Vendor')

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
                        <form method="POST" class="row g-3" action="{{ route('vendor-register') }}">
                            @csrf
                            <div class="col-md-6">
                                <label for="" class="form-label">{{ __('Category Name') }}</label>
                                <select required="required" name="category_id" class="form-select" aria-label="Default select example">
                                    <option value="" selected>Select Category</option>
                                    @if(isset($categories) && count($categories) > 0)
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->category_name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="" class="form-label">{{ __('Name') }}</label>
                                <input type="text" required="required" name="name" id="name" class="form-control" placeholder="{{ __('Name') }}" value="">
                            </div>

                            <div class="col-md-6">
                                <label for="" class="form-label">{{ __('Email Address') }}</label>
                                <input type="email" required="required" name="email" id="email" class="form-control" placeholder="{{ __('Email Address') }}" value="">
                            </div>

                            <div class="col-md-6">
                                <label for="" class="form-label">Password (6digits. Ex:123456)</label>
                                <input type="password" required="required" name="password" id="password" class="form-control" placeholder="Password (6digits. Ex: 123456)" value="">
                            </div>

                            <div class="col-md-6">
                                <label for="" class="form-label">{{ __('Phone Number') }}</label>
                                <input type="text" required="required" name="phone_number" id="phone_number" class="form-control" placeholder="{{ __('Phone Number') }}" value="">
                            </div>

                            <div class="col-md-6">
                                <label for="" class="form-label">{{ __('Bank Name') }}</label>
                                <input type="text" required="required" name="bank_name" id="bank_name" class="form-control" placeholder="{{ __('Bank Name') }}" value="">
                            </div>

                            <div class="col-md-6">
                                <label for="" class="form-label">{{ __('Bank Account Number') }}</label>
                                <input type="text" required="required" name="bank_account_number" id="bank_account_number" class="form-control" placeholder="{{ __('Bank Account Number') }}" value="">
                            </div>

                            <div class="registration-btn-block">
                                <button type="submit" class="voilet-bg-btn">
                                    {{ __('Create Vendor') }}
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</article>
