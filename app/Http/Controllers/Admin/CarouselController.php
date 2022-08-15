<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Carousel;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\CarouselRequest;
use Session;
use Illuminate\Support\Str;

class CarouselController extends Controller
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
            $query = Carousel::query();

            return DataTables::of($query)
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
                                <a class="dropdown-item" href="'. route('carousel.edit', $item->id).'">
                                    Edit
                                </a>
                                <form action="'. route('carousel.destroy' , $item->id).'" method="POST">
                                    ' . method_field('delete'). csrf_field(). '
                                    <button type="submit" class="dropdown-item text-danger">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                ';
            })
            ->editColumn('photos', function($item) {
                return $item->photos ? ' <img src="'.Storage::url($item->photos) .'" style="max-height: 150px;display:block; margin-left:auto; margin-right:auto;" />' : '<img src="/image/no-image.png" style="max-height: 50px; display:block; margin-left:auto; margin-right:auto;" /> ';
            })
            ->rawColumns(['action', 'photos'])
            ->make();
        }

        return view('pages.admin.carousel.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.carousel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarouselRequest $request)
    {
        $data = $request->all();

        $data['photos'] = $request->file('photos')->store('asset/carousel', 'public');

        Carousel::create($data);

        return redirect()->route('carousel.index')->with('success', 'Sukses menambahkan Carousel baru');
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
        $carousel = Carousel::findOrFail($id);

        return view('pages.admin.carousel.edit', compact('carousel'));
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
        if($request->has('photos')) {

        $data = $request->all();

        $data['photos'] = $request->file('photos')->store('asset/carousel', 'public');

        return redirect()->route('carousel.index')->with('success', 'Sukses mengubah gambar carousel');
        }
        else{
            Session::flash('gagal','Anda belum mengupload gambar');
            return redirect()->back();
        }

       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $carousel = Carousel::findOrFail($id);

        if($carousel->id == 1)
        {
            Session::flash('gagal','Anda tidak dapat menghapus item ini, hanya bisa mengedit');
            return redirect()->back();
        }
        else{
            $carousel->delete();
        }

        return redirect()->route('carousel.index')->with('success', 'Sukses menghapus gambar carousel');
    }
}