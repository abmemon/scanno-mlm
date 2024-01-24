<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //dd(__LINE__);
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.home');
    }

    public function vendors()
    {
        $vendors = Vendor::with(['category'])->get();
        $categories = Category::all();
//        foreach ($vendors as $vendor){
//            echo $vendor->category->category_name;
//        }
//        dd($vendors[0]->category());
//        dd($vendors[0]->category->category_name);
        return view('admin.vendors-list',['vendors'=>$vendors,'categories'=>$categories]);
    }

    /** START VENDOR REGISTRATION */
    public function showVendorRegisterForm()
    {
        $categories = Category::all();
        return view('admin.register-vendor', ['url' => 'vendor','categories'=>$categories]);
    }

    protected function createVendor(Request $request)
    {
        // validations
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:vendors'],
            'password' => ['required', 'string', 'min:6',],
            'category_id'  => ['required', 'exists:categories,id'],
        ]);

        $vendor = new Vendor();

        $vendor->name = $request->name;
        $vendor->email = $request->email;
        $vendor->password = Hash::make($request->password);
        $vendor->phone_number = $request->phone_number;
        $vendor->bank_name = $request->bank_name;
        $vendor->bank_account_number = $request->bank_account_number;


        $vendor->save();
        //dd();
        return redirect()->route('admin')->with('success', 'Post created successfully.');

    }

    public function loginAsVendor($vendorId)
    {
        // Assuming you have a Vendor model
        $vendor = Vendor::find($vendorId);

        if ($vendor) {
            // Switch the guard to 'vendor'
            Auth::guard('vendor')->login($vendor);

            // Redirect to the vendor's dashboard or wherever you want
            return redirect()->route('vendor');
        }

        // Handle the case when the vendor is not found
        // You might want to customize this based on your application's logic
        abort(404);
    }
    /** END VENDOR REGISTRATION */

    public function claims()
    {
        return view('admin.claims');
    }

}
