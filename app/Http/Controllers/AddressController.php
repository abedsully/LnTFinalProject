<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;

class AddressController extends Controller
{
    public function checkout(Request $request){
        $validasi = $request->validate([
            'address' => 'required',
            'post_code' => 'required',
        ]);

        Address::create($validasi);
        return redirect('/cart');
    }

}
