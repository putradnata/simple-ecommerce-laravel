<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Auth;

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

        return view('seller/pages/products.index',[
            'data' => $product,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $new_product = new Product();

        $product = (object) $new_product->getDefaultValues();

        return view('seller/pages/products.form',[
            'product' => $product,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data_image_name = [];

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required'],
            'image' => ['required'],
            'image.*' => ['image','mimes:png,jpg'],
            'qty' => ['required', 'integer', 'min:1'],
            'price' => ['required', 'integer', 'min:1'],
            'status' => ['required'],
        ],[
            'name.required' => 'Kolom nama produk masih kosong!',
            'name.string' => 'Kolom nama produk harus bertipe huruf/angka!',
            'name.max' => 'Kolom nama produk maksimal 255 karakter!',
            'description.required' => 'Kolom deskripsi produk masih kosong!',
            'image.required' => 'Kolom image masih kosong!',
            'image.*.required' => 'Kolom image masih kosong!',
            'image.*.mimes' => 'Format file harus JPG/PNG!',
            'qty.required' => 'Kolom qty masih kosong!',
            'qty.integer' => 'Kolom qty harus angka!',
            'qty.min' => 'Kolom qty minimal 1!',
            'price.required' => 'Kolom harga masih kosong!',
            'price.integer' => 'Kolom harga harus angka!',
            'price.min' => 'Kolom harga minimal 1!',
            'status.required' => 'Kolom status masih kosong!',
        ]);

        if($request->hasfile('image'))
         {
            foreach($request->file('image') as $image_product)
            {
                $new_name_image =  uniqid().'_'.time().'.'.$image_product->extension();
                $image_product->move(public_path('product_image'), $new_name_image);
                $data_image_name[] = $new_name_image;
            }
         }

        $data['image'] = json_encode($data_image_name);
        $data['user_id'] = Auth::user()->id;

        $product = Product::create($data);

        return redirect('seller/product')->with('success','Data Produk Berhasil Ditambahkan!');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::where('id',$id)->delete();

        return redirect('seller/product')->with('success','Data Product Berhasil Dihapus!');
    }
}
