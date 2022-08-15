<?php

namespace App\Http\Controllers\Toko;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Categori;
use App\Models\Product;
use App\Models\ProductGallerie;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Toko\ProdukRequest;
use Illuminate\Support\Facades\Session;
use File;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax())
        {
            $query = Product::with(['categori'])->where('shops_id', '1');

            return DataTables::of($query->get())
            ->addColumn('action', function($item) {
                return '
                    <div class="btn-group">
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle mr-1 mb-1"
                                type="button"
                                data-toggle="dropdown">
                                Aksi
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="'. route('produk.edit', $item->slug).'">
                                    Edit
                                </a>
                                <form action="'. route('produk.destroy' , $item->id).'" method="POST">
                                    ' . method_field('delete'). csrf_field(). '
                                    <button type="submit" class="dropdown-item text-danger" >
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                ';
            })
            ->editColumn('description', function($item){
                return $item->description;
            })
            ->addColumn('photos', function($item) {
                return $item->galleries->first()->photos ? ' <img src="'.Storage::url($item->galleries->first()->photos) .'" style="max-height: 48px;display:block; margin-left:auto; margin-right:auto;" />' : '<img src="/image/no-image.png" style="max-height: 50px; display:block; margin-left:auto; margin-right:auto;" /> ';
            })
            ->rawColumns(['action','description','photos'])
            ->make();
        }
        return view('pages.toko.produk');
        // $produk =Product::with(['galleries','categori'])->latest()->get();
        // return view('pages.toko.produk',[
        //     'produk'=> $produk,
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categori = Categori::all();
        return view('pages.toko.tambah-produk', compact('categori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProdukRequest $request)
    {
        // dd($coba);
        if($request->file('photos')){
            $jmlGambar=count($request->file('photos'));
            if($jmlGambar <=4 ){
                $data = $request->all();
            $data['slug'] = Str::slug($request->name);
            $data['shops_id'] = 1;

            $produk = Product::create($data);

            // ======== proses upload gambar produk =======

            // $this->validate($request, [
            //     'photos' => 'required|image|mimes:png,jpg,jpeg,svg'
            // ]);

            $files = $request->file('photos');
            foreach ($files as $file){
                $upload['photos'] = $file->store('asset/produk', 'public');

                $upload['products_id']= $produk->id;
                ProductGallerie::create($upload);
            }

            return redirect()->route('produk.index')->with('success', 'Sukses menambahkan produk baru');
            }
            else{
                Session::flash('gagal','Gambar anda melebihi batas');
                return redirect()->back();
            }
        }else {
            Session::flash('gagal','Anda harus upload gambar produk minimal 1');
            return redirect()->back();

        }



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produk = Product::where('slug', $id)->first();
        $categories = Categori::all();
        return view('pages.toko.edit-produk' , compact('produk', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $data['slug']=Str::slug($request->name);

        $produk = Product::findOrFail($id);
        $produk->update($data);
         return redirect()->route('produk.index')->with('success', 'Sukses mengubah produk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function showGambarProduk($id){
        $galleri = ProductGallerie::findOrFail($id);
        $idProduk = $galleri->products_id;
        $produk =Product::findOrFail($idProduk);
        return view('pages.toko.edit-gambar-produk', compact('galleri', 'produk'));
    }

    public function editGambarProduk(Request $request, $id){
        $this->validate($request, [
            'photos' => 'mimes:png,jpg,jpeg,svg'
        ]);
        $galleri = ProductGallerie::findOrFail($id);
        if($request->has('photos')){
            $path = "storage/";
            File::delete($path . $galleri->photos);
            $photo = $request->photos;
             $upload['photos'] = $photo->store('asset/produk', 'public');
             $galleri->update($upload);
               return redirect()->back()->with('success', 'Sukses mengganti gambar  produk');
        }
        else{
            Session::flash('gagal','Anda belum mengupload gambar');
                return redirect()->back();
        }
    }

     public function storeGambarProduk(Request $request, $id){
       $galeri = ProductGallerie::where('products_id', $id)->get();
       $jumlah = count($galeri);
       $jmlGambar=count($request->file('photos'));
       $totalGambar = $jumlah + $jmlGambar;


        // $this->validate($request, [
        //     'photos' => 'image|mimes:png,jpg,jpeg,svg',
        // ]);
        if($request->file('photos')){
            if($totalGambar <=4){
                $files= $request->file('photos');
                foreach($files as $file){
                    $upload['photos'] = $file->store('asset/produk', 'public');
                    $upload['products_id']= $id;
                    ProductGallerie::create($upload);
                }
                 return redirect()->route('produk.index')->with('success', 'Sukses menambahkan produk baru');
            }
            else{
                Session::flash('gagal','Gambar anda melebihi batas, total gambar produk maksimal 4');
                return redirect()->route('produk.index');
            }
        }
        else{
             Session::flash('gagal','Anda harus mengupload gambar');
            return redirect()->route('produk.index');
        }
     }

    public function destroy($id){
        $produk =Product::findOrFail($id);
        $produk->delete();
        return redirect()->route('produk.index')->with('success', 'Sukses menghapus  produk');
    }


    public function destroyGambar($id)
    {
        $galeri = ProductGallerie::findOrFail($id);
        $idProduct = $galeri->products_id;
        $galleries = ProductGallerie::where('products_id', $idProduct)->get();
        $jumlah = count($galleries);
        // dd($jumlah);

        if($jumlah > 1 ){
            $galeri->delete();
            return redirect()->route('produk.index')->with('success', 'Sukses menghapus galeri produk');
        }
        else{
             Session::flash('gagal','Anda tidak boleh mengosongkan gambar produk');
             return redirect()->route('produk.index');
        }

    }


}