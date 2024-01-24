@extends('layouts.admin')
@include('admin.navbar-admin')
@section('title', 'Admin - Claims')

@section('content')
    <article class="home">
        <meta name="_token" content="{!! csrf_token() !!}">
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
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($claims as $claim)
                                <tr>
                                    <th>{{$claim->claim_amount}}</th>
                                    <td><button type="button" class="btn {{$claim->claim_status == "Pending" ? 'btn-primary' : ($claim->claim_status == "Approved" ? 'btn-success' : 'btn-danger')}}">{{$claim->claim_status}}</button></td>
                                    <td>{{$claim->created_at}}</td>
                                    <td>
                                        @if($claim->claim_status == 'Pending')
                                        <button class="approve-btn btn btn-success" data-claimid="{{$claim->vendor_claim_id}}">
                                            Approve
                                        </button>
|
                                        <button class="reject-btn btn btn-danger" data-claimid="{{$claim->vendor_claim_id}}">
                                            Reject
                                        </button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
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
                var claimid = 0;
                var claimStatus = 0;

                $('.approve-btn').on('click', function () {
                    claimid = $(this).data("claimid");
                    claimStatus = 'Approved';

                    $.ajax({
                        type: "POST",
                        dataType: "json",
                        url: '/admin/claim/approve',
                        data: {
                            'claim_status': claimStatus,
                            'vendor_claim_id': claimid
                        },
                        success: function (data) {
                            location.reload();
                        }
                    });
                });

                $('.reject-btn').on('click', function () {

                    claimid = $(this).data("claimid");
                    claimStatus = 'Rejected';

                    $.ajax({
                        type: "POST",
                        dataType: "json",
                        url: '/admin/claim/reject',
                        data: {'claim_status': claimStatus, 'vendor_claim_id': claimid},
                        success: function (data) {
                            location.reload();
                        }
                    });
                });


            });
        });

    </script>
@endsection
