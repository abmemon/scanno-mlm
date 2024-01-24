<?php

namespace App\Http\Controllers;

use App\Models\VendorClaim;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendorClaimController extends Controller
{

    public function submit(Request $request)
    {
        // Validate the request
        $request->validate([
            'claim_amount' => 'required|numeric|min:1',
        ]);
        //dd($request);
        // Create a new claim for the authenticated user
        $claim = auth()->user()->claims()->create([
            'claim_amount' => $request->input('claim_amount'),
        ]);
        return redirect()->route('vendor-claims');
        // Redirect or respond as needed
    }

    public function vendorList()
    {
        $vendorClaims = VendorClaim::where('vendor_id', Auth::user()->id)->get();
        return view('vendor.claims', compact('vendorClaims'));
        //dd($vendorClaims);
    }

    public function adminList()
    {
        // Fetch all claims for the admin view
        $claims = VendorClaim::with('vendor')->get();;
//        foreach ($claims as $claim){
//            echo "<pre>";
//            print_r($claim);
//            echo "</pre>";
//
//
//        }
//        dd($claim);
        return view('admin.claims', compact('claims'));

        // Return the admin view with claims
    }

    public function approve(Request $request)
    {
        $vendorClaim = VendorClaim::find($request->vendor_claim_id);
        $vendorClaim->claim_status = $request->claim_status;
        $vendorClaim->save();
        return response()->json(['success'=>'Status change successfully.']);
    }

    public function reject(Request $request)
    {
        $vendorClaim = VendorClaim::find($request->vendor_claim_id);
        $vendorClaim->claim_status = $request->claim_status;
        $vendorClaim->save();
        return response()->json(['success'=>'Status change successfully.']);

    }

}

