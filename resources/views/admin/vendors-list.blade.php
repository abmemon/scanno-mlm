@extends('layouts.admin')
@include('admin.navbar-admin')
@section('title', 'Vendors')

@section('content')
    <article class="home">
        <section class="profile-section">
            <div class="container-xxl">
                <div class="home-arrows">

                    <div class="page-title">
                        <h2 class="entry-title">Vendors List</h2>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-lg-10 offset-1">
                    <table class="table table-striped table-bordered">
                        <thead class="table-light">
                        <tr>
                            <th>S#</th>
                            <th>Vendor Name</th>
                            <th>Category</th>
                            <th>Vendor Email</th>
                            <th>Vendor Phone Number</th>
                            <th>Vendor Bank</th>
                            <th>Vendor Bank Account</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($vendors) && !empty($vendors))
                            @php
                                $counter = 0;
                            @endphp
                            @foreach($vendors as $vendor)

                                <tr>
                                    <td>{{++$counter}}</td>
                                    <td>{{$vendor->name}}</td>
                                    <td>{{$vendor->category->category_name}}</td>
                                    <td>{{$vendor->email}}</td>
                                    {{-- <td> {{$shop->shop_owner_name}}</td>--}}
                                    <td>{{$vendor->phone_number}}</td>
                                    <td>{{$vendor->bank_name}}</td>
                                    <td>{{$vendor->bank_account_number}}</td>
                                    <td class="text-center">
                                        <a href="{{route('login-as-vendor',$vendor->id)}}" class="approve-btn profile-btn btn btn-primary">Login</a>
                                        <a href="{{route('admin-vendor-list',$vendor->id)}}" class="btn btn-info" >Shop List</a>
                                        <a href="{{route('admin-vendor-mlm',$vendor->id)}}" class="btn btn-warning" >MLM Chart</a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </article>
