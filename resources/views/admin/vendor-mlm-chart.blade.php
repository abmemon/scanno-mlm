@extends('layouts.admin')
@include('admin.navbar-admin')
@section('title', 'Vendors')

@section('content')
    <article class="reward">
        <section class="shop-mlm-tree">
            <div class="tree">
                @if(isset($vendorShops) && !empty($vendorShops))
                    @php
                        $counter = 0;
                    @endphp
                    @foreach($vendorShops as $shop)
                        @php ++$counter; @endphp
                        @if($shop->shop_level == "L1")
                            <div class="level-1 levels level-count">
                                <div class="shop-tree-block">
                                    <div class="shop-tree text-center {{$shop->is_active ? 'btn-success': 'btn-danger'}}">
                                        <span class="shop-name-mlm">{{$shop->shop_id}}</span>
                                    </div>
                                    <p class="expiry-mlm">
                                        ex: {{ floor((strtotime($shop->expiration_date) - time())/60/60/24) }} dy
                                        mre</p>
                                </div>
                            </div>
                        @endif
                        @if($counter == 2 )
                            <div class="level-2 levels level-count">
                                <div class="d-flex justify-content-center">
                        @endif
                        @if($shop->shop_level == "L2" && $counter == 2)
                                    <div class="shop-tree-block shop-tree-arrow-left">
                                            <div class="shop-tree shop-tree-arrow {{$shop->is_active ? 'btn-success': 'btn-danger'}} text-center">
                                                <span class="shop-name-mlm"> {{$shop->shop_id}}</span>
                                            </div>
                                            <p class="expiry-mlm">
                                                ex: {{ floor((strtotime($shop->expiration_date) - time())/60/60/24) }}
                                                dy mre</p>
                                        </div>
                        @endif
                        @if($shop->shop_level == "L2" && $counter == 3)
                                    <div class="shop-tree-block shop-tree-arrow-right">
                                            <div class="shop-tree shop-tree-arrow {{$shop->is_active ? 'btn-success': 'btn-danger'}} text-center">
                                                <span class="shop-name-mlm"> {{$shop->shop_id}}</span>
                                            </div>
                                            <p class="expiry-mlm">
                                                ex: {{ floor((strtotime($shop->expiration_date) - time())/60/60/24) }}
                                                dy mre</p>
                                        </div>
                                </div>
                            </div>
                        @endif
                        @if($counter == 4 )
                            <div class="level-3 levels level-count">
                                <div class="d-flex justify-content-center">
                        @endif
                        @if($shop->shop_level == "L3" && $counter == 4)
                                    <div class="shop-tree-block shop-tree-arrow-left">
                                            <div class="shop-tree shop-tree-arrow {{$shop->is_active ? 'btn-success': 'btn-danger'}} text-center">
                                                <span class="shop-name-mlm">{{$shop->shop_id}}</span>
                                            </div>
                                            <p class="expiry-mlm">
                                                ex: {{ floor((strtotime($shop->expiration_date) - time())/60/60/24) }}
                                                dy mre</p>
                                        </div>
                        @endif
                        @if($shop->shop_level == "L3" && $counter == 5)
                                    <div class="shop-tree-block shop-tree-arrow-right">
                                            <div class="shop-tree shop-tree-arrow {{$shop->is_active ? 'btn-success': 'btn-danger'}} text-center">
                                                <span class="shop-name-mlm">{{$shop->shop_id}}</span>
                                            </div>
                                            <p class="expiry-mlm">
                                                ex: {{ floor((strtotime($shop->expiration_date) - time())/60/60/24) }}
                                                dy mre</p>
                                        </div>
                        @endif
                        @if($shop->shop_level == "L3" && $counter == 6)
                                    <div class="shop-tree-block shop-tree-arrow-left">
                                            <div class="shop-tree shop-tree-arrow {{$shop->is_active ? 'btn-success': 'btn-danger'}} text-center">
                                                <span class="shop-name-mlm">{{$shop->shop_id}}</span>
                                            </div>
                                            <p class="expiry-mlm">
                                                ex: {{ floor((strtotime($shop->expiration_date) - time())/60/60/24) }}
                                                dy mre</p>
                                        </div>
                        @endif
                        @if($shop->shop_level == "L3" && $counter == 7)
                                    <div class="shop-tree-block shop-tree-arrow-right">
                                            <div class="shop-tree shop-tree-arrow {{$shop->is_active ? 'btn-success': 'btn-danger'}} text-center">
                                                <span class="shop-name-mlm">{{$shop->shop_id}}</span>
                                            </div>
                                            <p class="expiry-mlm">
                                                ex: {{ floor((strtotime($shop->expiration_date) - time())/60/60/24) }}
                                                dy mre</p>
                                        </div>
                                </div>
                            </div>
                        @endif
                        @if($counter == 8 )
                            <div class="level-4 levels level-count">
                                <div class="d-flex justify-content-center">
                        @endif
                        @if($shop->shop_level == "L4" && $counter == 8)
                                    <div class="shop-tree-block shop-tree-arrow-left">
                                            <div class="shop-tree shop-tree-arrow {{$shop->is_active ? 'btn-success': 'btn-danger'}} text-center">
                                                <span class="shop-name-mlm">{{$shop->shop_id}}</span>
                                            </div>
                                            <p class="expiry-mlm">
                                                ex: {{ floor((strtotime($shop->expiration_date) - time())/60/60/24) }}
                                                dy mre</p>
                                        </div>
                        @endif
                        @if($shop->shop_level == "L4" && $counter == 9)
                                    <div class="shop-tree-block shop-tree-arrow-right">
                                            <div class="shop-tree shop-tree-arrow {{$shop->is_active ? 'btn-success': 'btn-danger'}} text-center">
                                                <span class="shop-name-mlm">{{$shop->shop_id}}</span>
                                            </div>
                                            <p class="expiry-mlm">
                                                ex: {{ floor((strtotime($shop->expiration_date) - time())/60/60/24) }}
                                                dy mre</p>
                                        </div>
                        @endif
                        @if($shop->shop_level == "L4" && $counter == 10)
                                    <div class="shop-tree-block shop-tree-arrow-left">
                                            <div class="shop-tree shop-tree-arrow {{$shop->is_active ? 'btn-success': 'btn-danger'}} text-center">
                                                <span class="shop-name-mlm">{{$shop->shop_id}}</span>
                                            </div>
                                            <p class="expiry-mlm">
                                                ex: {{ floor((strtotime($shop->expiration_date) - time())/60/60/24) }}
                                                dy mre</p>
                                        </div>
                        @endif
                        @if($shop->shop_level == "L4" && $counter == 11)
                                    <div class="shop-tree-block shop-tree-arrow-right">
                                            <div class="shop-tree shop-tree-arrow {{$shop->is_active ? 'btn-success': 'btn-danger'}} text-center">
                                                <span class="shop-name-mlm">{{$shop->shop_id}}</span>
                                            </div>
                                            <p class="expiry-mlm">
                                                ex: {{ floor((strtotime($shop->expiration_date) - time())/60/60/24) }}
                                                dy mre</p>
                                        </div>
                        @endif
                        @if($shop->shop_level == "L4" && $counter == 12)
                                    <div class="shop-tree-block shop-tree-arrow-left">
                                            <div class="shop-tree shop-tree-arrow {{$shop->is_active ? 'btn-success': 'btn-danger'}} text-center">
                                                <span class="shop-name-mlm">{{$shop->shop_id}}</span>
                                            </div>
                                            <p class="expiry-mlm">
                                                ex: {{ floor((strtotime($shop->expiration_date) - time())/60/60/24) }}
                                                dy mre</p>
                                        </div>
                        @endif
                        @if($shop->shop_level == "L4" && $counter == 13)
                                    <div class="shop-tree-block shop-tree-arrow-right">
                                            <div class="shop-tree shop-tree-arrow {{$shop->is_active ? 'btn-success': 'btn-danger'}} text-center">
                                                <span class="shop-name-mlm">{{$shop->shop_id}}</span>
                                            </div>
                                            <p class="expiry-mlm">
                                                ex: {{ floor((strtotime($shop->expiration_date) - time())/60/60/24) }}
                                                dy mre</p>
                                        </div>
                        @endif
                        @if($shop->shop_level == "L4" && $counter == 14)
                                    <div class="shop-tree-block shop-tree-arrow-left">
                                            <div class="shop-tree shop-tree-arrow {{$shop->is_active ? 'btn-success': 'btn-danger'}} text-center">
                                                <span class="shop-name-mlm">{{$shop->shop_id}}</span>
                                            </div>
                                            <p class="expiry-mlm">
                                                ex: {{ floor((strtotime($shop->expiration_date) - time())/60/60/24) }}
                                                dy mre</p>
                                        </div>
                        @endif
                        @if($shop->shop_level == "L4" && $counter == 15)
                                    <div class="shop-tree-block shop-tree-arrow-right">
                                            <div class="shop-tree shop-tree-arrow {{$shop->is_active ? 'btn-success': 'btn-danger'}} text-center">
                                                <span class="shop-name-mlm">{{$shop->shop_id}}</span>
                                            </div>
                                            <p class="expiry-mlm">
                                                ex: {{ floor((strtotime($shop->expiration_date) - time())/60/60/24) }}
                                                dy mre</p>
                                        </div>
                                </div>
                            </div>
                        @endif
                        @if($counter == 16 )
                            <div class="level-5 levels level-count">
                                <div class="d-flex justify-content-center">
                        @endif

                        @if($shop->shop_level == "L5" && $counter == 16)
                                    <div class="shop-tree-block shop-tree-arrow-left">
                                            <div class="shop-tree shop-tree-arrow {{$shop->is_active ? 'btn-success': 'btn-danger'}} text-center">
                                                <span class="shop-name-mlm">{{$shop->shop_id}}</span>
                                            </div>
                                            <p class="expiry-mlm">
                                                ex: {{ floor((strtotime($shop->expiration_date) - time())/60/60/24) }}
                                                dy mre</p>
                                        </div>
                        @endif

                        @if($shop->shop_level == "L5" && $counter == 17)
                                    <div class="shop-tree-block shop-tree-arrow-right">
                                            <div class="shop-tree shop-tree-arrow {{$shop->is_active ? 'btn-success': 'btn-danger'}} text-center">
                                                <span class="shop-name-mlm">{{$shop->shop_id}}</span>
                                            </div>
                                            <p class="expiry-mlm">
                                                ex: {{ floor((strtotime($shop->expiration_date) - time())/60/60/24) }}
                                                dy mre</p>
                                        </div>
                        @endif

                        @if($shop->shop_level == "L5" && $counter == 18)
                                    <div class="shop-tree-block shop-tree-arrow-left">
                                            <div class="shop-tree shop-tree-arrow {{$shop->is_active ? 'btn-success': 'btn-danger'}} text-center">
                                                <span class="shop-name-mlm">{{$shop->shop_id}}</span>
                                            </div>
                                            <p class="expiry-mlm">
                                                ex: {{ floor((strtotime($shop->expiration_date) - time())/60/60/24) }}
                                                dy mre</p>
                                        </div>
                        @endif

                        @if($shop->shop_level == "L5" && $counter == 19)
                                    <div class="shop-tree-block shop-tree-arrow-right">
                                            <div class="shop-tree shop-tree-arrow {{$shop->is_active ? 'btn-success': 'btn-danger'}} text-center">
                                                <span class="shop-name-mlm">{{$shop->shop_id}}</span>
                                            </div>
                                            <p class="expiry-mlm">
                                                ex: {{ floor((strtotime($shop->expiration_date) - time())/60/60/24) }}
                                                dy mre</p>
                                        </div>
                        @endif

                        @if($shop->shop_level == "L5" && $counter == 20)
                                    <div class="shop-tree-block shop-tree-arrow-left">
                                            <div class="shop-tree shop-tree-arrow {{$shop->is_active ? 'btn-success': 'btn-danger'}} text-center">
                                                <span class="shop-name-mlm">{{$shop->shop_id}}</span>
                                            </div>
                                            <p class="expiry-mlm">
                                                ex: {{ floor((strtotime($shop->expiration_date) - time())/60/60/24) }}
                                                dy mre</p>
                                        </div>
                        @endif

                        @if($shop->shop_level == "L5" && $counter == 21)
                                    <div class="shop-tree-block shop-tree-arrow-right">
                                            <div class="shop-tree shop-tree-arrow {{$shop->is_active ? 'btn-success': 'btn-danger'}} text-center">
                                                <span class="shop-name-mlm">{{$shop->shop_id}}</span>
                                            </div>
                                            <p class="expiry-mlm">
                                                ex: {{ floor((strtotime($shop->expiration_date) - time())/60/60/24) }}
                                                dy mre</p>
                                        </div>
                        @endif

                        @if($shop->shop_level == "L5" && $counter == 22)
                                    <div class="shop-tree-block shop-tree-arrow-left">
                                            <div class="shop-tree shop-tree-arrow {{$shop->is_active ? 'btn-success': 'btn-danger'}} text-center">
                                                <span class="shop-name-mlm">{{$shop->shop_id}}</span>
                                            </div>
                                            <p class="expiry-mlm">
                                                ex: {{ floor((strtotime($shop->expiration_date) - time())/60/60/24) }}
                                                dy mre</p>
                                        </div>
                        @endif

                        @if($shop->shop_level == "L5" && $counter == 23)
                                    <div class="shop-tree-block shop-tree-arrow-right">
                                            <div class="shop-tree shop-tree-arrow {{$shop->is_active ? 'btn-success': 'btn-danger'}} text-center">
                                                <span class="shop-name-mlm">{{$shop->shop_id}}</span>
                                            </div>
                                            <p class="expiry-mlm">
                                                ex: {{ floor((strtotime($shop->expiration_date) - time())/60/60/24) }}
                                                dy mre</p>
                                        </div>

                        @endif

                        @if($shop->shop_level == "L5" && $counter == 24)
                                    <div class="shop-tree-block shop-tree-arrow-left">
                                            <div class="shop-tree shop-tree-arrow {{$shop->is_active ? 'btn-success': 'btn-danger'}} text-center">
                                                <span class="shop-name-mlm">{{$shop->shop_id}}</span>
                                            </div>
                                            <p class="expiry-mlm">
                                                ex: {{ floor((strtotime($shop->expiration_date) - time())/60/60/24) }}
                                                dy mre</p>
                                        </div>
                        @endif

                        @if($shop->shop_level == "L5" && $counter == 25)
                                    <div class="shop-tree-block shop-tree-arrow-right">
                                            <div class="shop-tree shop-tree-arrow {{$shop->is_active ? 'btn-success': 'btn-danger'}} text-center">
                                                <span class="shop-name-mlm">{{$shop->shop_id}}</span>
                                            </div>
                                            <p class="expiry-mlm">
                                                ex: {{ floor((strtotime($shop->expiration_date) - time())/60/60/24) }}
                                                dy mre</p>
                                        </div>
                        @endif

                        @if($shop->shop_level == "L5" && $counter == 26)
                                    <div class="shop-tree-block shop-tree-arrow-left">
                                            <div class="shop-tree shop-tree-arrow {{$shop->is_active ? 'btn-success': 'btn-danger'}} text-center">
                                                <span class="shop-name-mlm">{{$shop->shop_id}}</span>
                                            </div>
                                            <p class="expiry-mlm">
                                                ex: {{ floor((strtotime($shop->expiration_date) - time())/60/60/24) }}
                                                dy mre</p>
                                        </div>
                        @endif

                        @if($shop->shop_level == "L5" && $counter == 27)
                                    <div class="shop-tree-block shop-tree-arrow-right">
                                        <div class="shop-tree shop-tree-arrow {{$shop->is_active ? 'btn-success': 'btn-danger'}} text-center">
                                            <span class="shop-name-mlm">{{$shop->shop_id}}</span>
                                        </div>
                                        <p class="expiry-mlm">
                                            ex: {{ floor((strtotime($shop->expiration_date) - time())/60/60/24) }}
                                            dy mre</p>
                                    </div>
                        @endif

                        @if($shop->shop_level == "L5" && $counter == 28)
                                    <div class="shop-tree-block shop-tree-arrow-left">
                                            <div class="shop-tree shop-tree-arrow {{$shop->is_active ? 'btn-success': 'btn-danger'}} text-center">
                                                <span class="shop-name-mlm">{{$shop->shop_id}}</span>
                                            </div>
                                            <p class="expiry-mlm">
                                                ex: {{ floor((strtotime($shop->expiration_date) - time())/60/60/24) }}
                                                dy mre</p>
                                        </div>
                        @endif

                        @if($shop->shop_level == "L5" && $counter == 29)
                                    <div class="shop-tree-block shop-tree-arrow-right">
                                            <div class="shop-tree shop-tree-arrow {{$shop->is_active ? 'btn-success': 'btn-danger'}} text-center">
                                                <span class="shop-name-mlm">{{$shop->shop_id}}</span>
                                            </div>
                                            <p class="expiry-mlm">
                                                ex: {{ floor((strtotime($shop->expiration_date) - time())/60/60/24) }}
                                                dy mre</p>
                                        </div>
                        @endif

                        @if($shop->shop_level == "L5" && $counter == 30)
                                    <div class="shop-tree-block shop-tree-arrow-left">
                                            <div class="shop-tree shop-tree-arrow {{$shop->is_active ? 'btn-success': 'btn-danger'}} text-center">
                                                <span class="shop-name-mlm">{{$shop->shop_id}}</span>
                                            </div>
                                            <p class="expiry-mlm">
                                                ex: {{ floor((strtotime($shop->expiration_date) - time())/60/60/24) }}
                                                dy mre</p>
                                        </div>
                        @endif

                        @if($shop->shop_level == "L5" && $counter == 31)
                                    <div class="shop-tree-block shop-tree-arrow-right">
                                            <div class="shop-tree shop-tree-arrow {{$shop->is_active ? 'btn-success': 'btn-danger'}} text-center">
                                                <span class="shop-name-mlm">{{$shop->shop_id}}</span>
                                            </div>
                                            <p class="expiry-mlm">
                                                ex: {{ floor((strtotime($shop->expiration_date) - time())/60/60/24) }}
                                                dy mre</p>
                                        </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif

            </div>
        </section>
    </article>



