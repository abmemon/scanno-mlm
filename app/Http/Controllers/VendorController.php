<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\VendorShop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VendorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //dd(__LINE__);
        $this->middleware('auth:vendor');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vendorCommission = DB::table('vendor_commission')
            ->select(DB::raw('shop_level,count(shop_id) AS members, SUM(commission_amount) AS comission'))
            ->where('vendor_id', Auth::user()->id)
            ->groupBy('shop_level')
            ->get();


        $shops = DB::table('vendor_shops')
            ->select(DB::raw('shop_level,count(shop_id) AS members'))
            ->where('vendor_id', Auth::user()->id)
            ->where('is_active', 1)
            ->groupBy('shop_level')
            ->get();
        if(isset($shops) && count($shops)>0) {
            $newArray = [];

            foreach ($shops as $item) {
                $newArray[$item->shop_level] = $item->members;
            }
            $shops = $newArray;
        }
        //dd($shops);
        $commission = [];
        if(isset($vendorCommission) && count($vendorCommission)>0){
            $commission['L1'] = ['active' => isset($shops['L1']) ? $shops['L1'] : 0,'commission' => 0,'members' => 1,'level'=>1];
            foreach($vendorCommission as $vc){
                $commission[$vc->shop_level] = ['active' => isset($shops[$vc->shop_level]) ? $shops[$vc->shop_level] : 0,'commission' => $vc->comission,'members' => $vc->members];
            }

        }
        //dd($commission);
        return view('vendor.home',['commission'=>$commission]);
    }

    public function vendorMlm()
    {
        if(Auth::check())
        {
            //dd(Auth::user()->id);
            $vendorShops = VendorShop::where('vendor_id', Auth::user()->id)->get();
            //dd($vendorShops);
            return view('vendor.vendor-mlm-chart', ['vendorShops' => $vendorShops]);
        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
