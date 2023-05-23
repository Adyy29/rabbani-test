<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index', [
            'title' => 'Outlet',
            'deskripsi' => 'Halaman pengelolaan Product',
            'outlets' => product::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create', [
            'title' => 'Outlet',
            'deskripsi' => 'Halaman pengelolaan Product',
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
        $rules = $request->validate([
            'nama' => 'required',
            'harga' => 'required',
            'keterangan' => 'required',
            'gambar' => 'image|file|mimes:jpeg,png,jpg,gif,svg|max:20000'
        ]);

        if ($request->file('gambar')) {
            $rules['gambar'] = $request->file('gambar')->store('post-images');
        }

        product::create($rules);

        if($rules) {
            return redirect('/admin')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect('/admin')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        return view('admin.edit', [
            'title' => 'Outlet',
            'deskripsi' => 'Halaman ubah data outlet',
            'products' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        $rules = [
            'nama' => 'required',
            'harga' => 'required',
            'keterangan' => 'required',
            'gambar' => 'image|file|mimes:jpeg,png,jpg,gif,svg|max:20000'
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('gambar')) {
            if($product->gambar){
                Storage::delete($outlet->gambar);
            }
            $validatedData['gambar'] = $request->file('gambar')->store('post-images');
        }

        product::where('id', $product->id)
            ->update($validatedData);

        if($validatedData) {
            return redirect('/admin')->with(['success' => 'Data Berhasil Diubah!']);
        } else {
            return redirect('/admin')->with(['error' => 'Data Gagal Diubah!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        if($product->gambar){
            Storage::delete($product->gambar);
        }

        product::destroy($product->id);

        if($product) {
            return redirect('/admin')->with(['success' => 'Data Berhasil Dihapus!']);
        } else {
            return redirect('/admin')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
}
