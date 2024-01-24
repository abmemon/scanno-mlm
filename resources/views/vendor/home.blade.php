@extends('layouts.vendor')
@include('vendor.navbar-vendor')
@section('title', 'Vendor - Home')

@section('content')
    <article class="home">
        <section class="profile-section">
            <div class="container-xxl">
                <div class="home-arrows">
                    <div class="page-title">
                        <h2 class="entry-title">Vendor Dashboard</h2>
                    </div>



                </div>
                <div class="row">
                    <div class="col-6 offset-6">
                        <form class="row g-3" action="{{route('vendor-claim')}}" method="POST">
                            @csrf
                            <div class="col-auto"><button class="btn btn-light mb-3"> Wallet Balance : RM480</button>   </div>
                            <div class="col-auto">
                                <input type="text" class="form-control" id=claim_amount" placeholder="Claim Amount" name="claim_amount">
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary mb-3">Claim</button>
                            </div>
                        </form>
                    </div>

                </div>
                @php
                    $l1_member = isset($commission['L1']['members']) ? $commission['L1']['members'] : 0;
                    $l2_member = isset($commission['L2']['members']) ? $commission['L2']['members'] : 0;
                    $l3_member = isset($commission['L3']['members']) ? $commission['L3']['members'] : 0;
                    $l4_member = isset($commission['L4']['members']) ? $commission['L4']['members'] : 0;
                    $l5_member = isset($commission['L5']['members']) ? $commission['L5']['members'] : 0;

                    $l1_active = isset($commission['L1']['active']) ? $commission['L1']['active'] : 0;
                    $l2_active = isset($commission['L2']['active']) ? $commission['L2']['active'] : 0;
                    $l3_active = isset($commission['L3']['active']) ? $commission['L3']['active'] : 0;
                    $l4_active = isset($commission['L4']['active']) ? $commission['L4']['active'] : 0;
                    $l5_active = isset($commission['L5']['active']) ? $commission['L5']['active'] : 0;

                    $l1_commission = isset($commission['L1']['commission']) ? $commission['L1']['commission'] : 0;
                    $l2_commission = isset($commission['L2']['commission']) ? $commission['L2']['commission'] : 0;
                    $l3_commission = isset($commission['L3']['commission']) ? $commission['L3']['commission'] : 0;
                    $l4_commission = isset($commission['L4']['commission']) ? $commission['L4']['commission'] : 0;
                    $l5_commission = isset($commission['L5']['commission']) ? $commission['L5']['commission'] : 0;

                    $total_members = $l1_member + $l2_member + $l3_member + $l4_member + $l5_member;
                    $total_active = $l1_active + $l2_active + $l3_active + $l4_active + $l5_active;
                    $total_commission = $l1_commission + $l2_commission + $l3_commission + $l4_commission + $l5_commission;

                @endphp
                <div class="row">
                    <div class="col-lg-10 offset-1">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th scope="col">Commission</th>
                                <th scope="col">Level</th>
                                <th scope="col">Members</th>
                                <th scope="col">Active</th>
                                <th scope="col">Commission</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">NIL</th>
                                <td>L1</td>
                                <td>{{$commission['L1']['members']}}</td>
                                <td>{{$commission['L1']['active']}}</td>
                                <td>{{$commission['L1']['commission']}}</td>
                            </tr>
                            <tr>
                                <th scope="row">RM 50 per account</th>
                                <td>L2</td>
                                <td>{{$commission['L2']['members']}}</td>
                                <td>{{$commission['L2']['active']}}</td>
                                <td>{{$commission['L2']['commission']}}</td>
                            </tr>
                            <tr>
                                <th scope="row">RM 25 per account</th>
                                <td>L3</td>
                                <td>{{$commission['L3']['members']}}</td>
                                <td>{{$commission['L3']['active']}}</td>
                                <td>{{$commission['L3']['commission']}}</td>
                            </tr>
                            <tr>
                                <th scope="row">RM 15 per account</th>
                                <td>L4</td>
                                <td>{{$commission['L4']['members']}}</td>
                                <td>{{$commission['L4']['active']}}</td>
                                <td>{{$commission['L4']['commission']}}</td>
                            </tr>
                            <tr>
                                <th scope="row">RM 10 per account</th>
                                <td>L5</td>
                                <td>{{$commission['L5']['members']}}</td>
                                <td>{{$commission['L5']['active']}}</td>
                                <td>{{$commission['L5']['commission']}}</td>
                            </tr>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th colspan="2">Total</th>
                                <td>{{$total_members}}</td>
                                <td>{{$total_active}}</td>
                                <td>{{$total_commission}}</td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </article>
@endsection
