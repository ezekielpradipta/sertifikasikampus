<?php

namespace App\Http\Controllers;

use App\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('produk.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produk.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required|string|max:100',
            'description'=>'required',
            'price'=>'required|numeric|min:0',
            'stock'=>'required|numeric|min:0',
            'image' => 'required|image|',
        ]);
        DB::beginTransaction();
        try{
            $data = $request->all();
            $data['image'] = $request->image->store('produk', 'images');

            Produk::create($data);
            DB::commit();
        }catch (\Exception $e)
        {
            DB::rollBack();
            return redirect()->back()
                    ->withInput()
                    ->with('fail','Data produk gagal ditambahkan. <br>'.$e->getMessage());
        }

        return redirect()->route('produk.index')->with('success', 'Data produk berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        //
    }
    public function data(){
        $produk = Produk::latest()->get();
        return DataTables::of($produk)
        ->addIndexColumn()
        ->editColumn('title',function($produk){
          $imageurl =getGambarUrl($produk->image);
          return '<img style="height: 50px; width: 80px; margin-right: 10px;" src="'.$imageurl.'" />'
                    .$produk->title;  
        })
        ->rawColumns(['title'])
        ->make(true);
    }
}
