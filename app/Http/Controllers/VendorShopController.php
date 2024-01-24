<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use App\Models\VendorShop;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VendorShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->middleware('auth:admin');
        $vendors = Vendor::select(['id','name'])->get();
        return view('admin.register-vendor-shop', ['vendors' => $vendors]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validations
        $request->validate([
            'shop_name' => ['required', 'string', 'max:255'],
            'shop_id' => ['required', 'string', 'max:255', 'unique:vendor_shops'],
            'vendor_id' => ['required', 'integer'],
        ]);
        $is_active= $request->is_active ? 1 : 0 ;

        $vendorShop = new VendorShop();

        $vendorShop->shop_name = $request->shop_name;
        $vendorShop->shop_id = $request->shop_id;
        $vendorShop->vendor_id = $request->vendor_id;
        $vendorShop->is_active = $is_active;

        $vendorShop->save();

        return redirect()->route('admin')->with('success', 'VendorShop created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(VendorShop $vendorShop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $vendorShop = VendorShop::find($id);
        return view('admin.edit-vendor-shop', ['vendor' => $vendorShop]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'shop_name' => ['required', 'string', 'max:255'],
            'shop_id'   => ['required', 'string', 'max:255'],
        ]);

        $request->is_active = $request->is_active ? 1 : 0 ;
        //dd($request);

        $vendorShop = VendorShop::find($id);
        $vendorShop->is_active = $request->is_active ? 1 : 0 ;
        $vendorShop->shop_name = $request->shop_name ;
        $vendorShop->shop_id = $request->shop_id ;
        $vendorShop->shop_owner_phone_number = $request->shop_owner_phone_number ;
        $vendorShop->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VendorShop $vendorShop)
    {
        //
    }

    public function vendorShops($vendorID)
    {
        $vendorShops = VendorShop::where('vendor_id',$vendorID)->get();

        //dd($vendorShops);
        return view('admin.vendor-shop-list', ['vendorShops' => $vendorShops]);
    }

    public function shopChangeStatus(Request $request)
    {
        $vendorShop = VendorShop::find($request->id);
        $vendorShop->is_active = $request->status;
        $vendorShop->save();
        return response()->json(['success'=>'Status change successfully.']);
    }

    public function vendorMlm($vendorID)
    {
        $vendorShops = VendorShop::where('vendor_id',$vendorID)->get();
        //dd($vendorShops);
        return view('admin.vendor-mlm-chart', ['vendorShops' => $vendorShops]);
    }
}
