<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Product;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $product = Product::all();
        return view('product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $request->validate(
            [
                'name' => 'required|min:4',
                'price' => 'required|min:1',
                'photos' => 'required',
                'photos.*' => 'image|mimes:jpeg,png,jpg,gif,svg,heic|max:2048'
            ],
            [
                'name.required' => 'Jangan lupa isi nama...',
                'name.min' => 'Nama makanan minimal 4 huruf...',
                'price.required' => 'Isi harga nya yaa..',
                'photos.required' => 'masukin foto nya dong..',
                'photos.image' => 'masukin foto bukan yang lain..',
                'photos.mimes' => 'masukin foto bukan yang lain..',
                'photos.max' => 'maksimal ukuran file 2MB..'
            ]
        );
        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
        ]);

        foreach ($request->file('photos') as $photo) {
            $filename = date('YmdHis') . '_product' . $photo->getClientOriginalName();
            $photo->move(public_path('product'), $filename);
            Photo::create([
                'photo_name' => $filename,
                'product_id' => $product->id
            ]);
        }

        return redirect('/master-data/products')->with('status', 'Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        // return $product->photo;
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate(
            [
                'name' => 'required|min:4',
                'price' => 'required|min:1',
                'photos' => 'required',
                'photos.*' => 'image|mimes:jpeg,png,jpg,gif,svg,heic|max:2048'
            ],
            [
                'name.required' => 'Jangan lupa isi nama...',
                'name.min' => 'Nama makanan minimal 4 huruf...',
                'price.required' => 'Isi harga nya yaa..',
                'photos.required' => 'masukin foto nya dong..',
                'photos.image' => 'masukin foto bukan yang lain..',
                'photos.mimes' => 'masukin foto bukan yang lain..',
                'photos.max' => 'maksimal ukuran file 2MB..'
            ]
        );

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $filename = date('YmdHis') . '_product' . $photo->getClientOriginalName();
                if (file_exists(public_path('product/' . $product->photo))) {
                    unlink(public_path('product/' . $product->photo));
                }
                $photo->move(public_path('product'), $filename);
                Photo::where('id', $product->photo->id)->update([
                    'photo_name' => $filename,
                    'product_id' => $product->id
                ]);
            }
        }



        // Product::where('id', $product->id)->update([
        //     'name' => $request->name,
        //     'price' => $request->price,
        //     'photos' => $request->photo //mungkin ini dak perlu
        // ]);
        return redirect('/master-data/products')->with('status', 'Data berhasil ditambahkan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        Product::destroy($product->id);
        return redirect('/master-data/products')->with('delete', 'Data berhasil dihapus!');
    }
}
