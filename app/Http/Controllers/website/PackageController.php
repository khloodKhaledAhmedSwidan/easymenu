<?php

namespace App\Http\Controllers\website;

use App\Coupon;
use App\Package;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PackageController extends Controller
{
    public function packages()
    {
        $packages = Package::all();
        return view('packages', compact('packages'));
    }

    public function chooseProduct($id)
    {
        $package = Package::find($id);
        return view('subscripe-package', compact('package'));
    }

//    public function coponesProduct(Request $request)
//    {
//        $restaurant = User::where('email',$request->email)->first();
//
//    }

    public function checkCoupon(Request $request)
    {
        $coupon = Coupon::where('name', $request->coupon)->first();
        if ($coupon) {
            return response()->json($coupon);
        } else {

            return response()->json("here");
        }
    }

}
