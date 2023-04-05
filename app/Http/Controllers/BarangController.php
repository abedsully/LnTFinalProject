<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    public function create(){
        return view('createBarang');
    }

    public function store(Request $request){



        $validasi = $request->validate([
            'category' => 'required|regex:/^\w+$/u|min:5|max:10',
            'name' => 'required|min:5|max:80|string',
            'price' => 'required|numeric',
            'amount' => 'required|numeric'
        ]);




        $filename = NULL;
        if($request->file('image') != NULL) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $filename = $request->name.'_'.$extension;
            $request->file('image')->storeAs('/public/Barang', $filename);
        }


        Barang::create([
            'category' => $request->category,
            'name' => $request->name,
            'price' => ($request->price),
            'amount' => $request->amount,
            'image' => $filename
        ]);

        return redirect('/dashboard');
    }


    public function index(Request $request){
        $barangs = Barang::all();

        if($request->has('search')){
            $barangs = Barang::where('category', 'LIKE', '%' .$request->search.'%')->orWhere('name', 'LIKE', '%' .$request->search.'%')->paginate();
            // $barangs = Barang::orWhere('name', 'LIKE', '%' .$request->search.'%')->paginate();
        }

        else{
            $barangs = Barang::paginate();
        }
        $barangs = $barangs->reverse();
        return view('dashboard', compact('barangs'));
    }
}
