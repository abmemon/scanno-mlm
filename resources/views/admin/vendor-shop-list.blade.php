@extends('layouts.admin')
@include('admin.navbar-admin')
@section('title', 'Vendors')

@section('content')
    <meta name="_token" content="{!! csrf_token() !!}">

    <article class="home">
        <section class="profile-section">
            <div class="container-xxl">
                <div class="home-arrows">

                    <div class="page-title">
                        <h2 class="entry-title">Vendor's Shops</h2>
                    </div>

                </div>

                <table class="table">
                    <thead class="table-light">
                    <tr>
                        <th>S#</th>
                        <th>Shop Id</th>
                        <th>Shop Name</th>
                        <th>Shop Owner Phone Number</th>
                        <th>Shop Level</th>
                        <th>Shop Expiration Date</th>
                        <th>Shop Status</th>
                        <th class="text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($vendorShops) && !empty($vendorShops))
                        @php
                            $counter = 0;
                        @endphp
                        @foreach($vendorShops as $shop)
                            <tr>
                                <td>{{++$counter}}</td>
                                <td>{{$shop->shop_id}}</td>
                                <td>{{$shop->shop_name}}</td>
                                {{--                        <span class="date-time"> {{$shop->shop_owner_name}}</span>--}}
                                <td>{{$shop->shop_owner_phone_number}}</td>
                                <td>{{$shop->shop_level}}</td>
                                <td>{{$shop->expiration_date}}</td>
                                <td>{{$shop->is_active ? 'Active' : 'Inactive'}}</td>
                                <td class="text-center">
                                    @if(! $shop->is_active)
                                        <button class="approve-btn profile-btn active-btn" data-shopid="{{$shop->id}}">
                                            Active
                                        </button>
                                    @elseif($shop->is_active)
                                        <button class="reject-btn profile-btn inactive-btn" data-shopid="{{$shop->id}}">
                                            Inactive
                                        </button>
                                    @endif
                                    <a href="{{route('vendor-shop-update',$shop->id)}}" class="btn btn-secondary">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </section>
    </article>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
            integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });

            $(function () {
                var shopID = 0;
                var shopStatus = 0;

                $('.active-btn').on('click', function () {
                    shopID = $(this).data("shopid");
                    shopStatus = 1;
                    $.ajax({
                        type: "GET",
                        dataType: "json",
                        url: '/vendor-shop-change-status',
                        data: {
                            'status': shopStatus,
                            'id': shopID
                        },
                        success: function (data) {
                            location.reload();
                        }
                    });
                });

                $('.inactive-btn').on('click', function () {
                    shopID = $(this).data("shopid");
                    shopStatus = 0;
                    $.ajax({
                        type: "GET",
                        dataType: "json",
                        url: '/vendor-shop-change-status',
                        data: {'status': shopStatus, 'id': shopID},
                        success: function (data) {
                            location.reload();
                        }
                    });
                });


            });
        });

    </script>
