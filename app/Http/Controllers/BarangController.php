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
            'name' => 'required|min:5|max:80|string|unique:users',
            'price' => 'required|numeric',
            'stock' => 'required|numeric'
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
            'stock' => $request->stock,
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


    public function editBarang($id){
        $barang = Barang::findOrFail($id);

        return view('editBarang', compact('barang'));
    }

    public function updateBarang(Request $request, $id){
        $filename = NULL;
        if($request->file('image') != NULL) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $filename = $request->name.'_'.$extension;
            $request->file('image')->storeAs('/public/Barang', $filename);
        }

        Barang::findorFail($id)->update([
            'category' => $request->category,
            'name' => $request->name,
            'price' => ($request->price),
            'stock' => $request->stock,
            'image' => $filename,
        ]);

        return redirect('dashboard');
    }

    public function delete($id){
        Barang::destroy($id);

        return redirect('dashboard');
    }

    public function addtoCart($id){
        $barang = Barang::findOrFail($id);

        $cart = session()->get('cart', []);

        if(isset($cart[$id])){
            $cart[$id]['quantity']++;
        }

        else{
            $cart[$id] = [
                "category" => $barang->category,
                "name" => $barang->name,
                "price" => $barang->price,
                "stock" => $barang->stock,
                "image" => $barang->image,
                "quantity" => 1,
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function cart()
    {
        return view('cart');
    }

    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart successfully updated!');
        }
    }

    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product successfully removed!');
        }
    }

}
