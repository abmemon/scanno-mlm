@extends('layouts.vendor')
@include('vendor.navbar-vendor')
@section('title', 'Vendor - Claims')

@section('content')
    <article class="home">
        <section class="profile-section">
            <div class="container-xxl">
                <div class="home-arrows">
                    <div class="page-title">
                        <h2 class="entry-title">Claims</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-10 offset-1">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th scope="col">Claim Amount</th>
                                <th scope="col">Claim Status</th>
                                <th scope="col">Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($vendorClaims as $claim)
                                <tr>
                                    <th>{{$claim->claim_amount}}</th>
                                    <td><button type="button" class="btn {{$claim->claim_status == "Pending" ? 'btn-primary' : ($claim->claim_status == "Approved" ? 'btn-success' : 'btn-danger')}}">{{$claim->claim_status}}</button></td>
                                    <td>{{$claim->created_at}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </article>
@endsection
