<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categori;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use App\Http\Requests\Admin\CategoriRequest;

class CategoriController extends Controller
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
            $query = Categori::query();

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
                                <a class="dropdown-item" href="'. route('kategori.edit', $item->id).'">
                                    Edit
                                </a>
                                <form action="'. route('kategori.destroy' , $item->id).'" method="POST">
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
            ->editColumn('photo', function($item) {
                return $item->photo ? ' <img src="'.Storage::url($item->photo) .'" style="max-height: 48px;display:block; margin-left:auto; margin-right:auto;" />' : '<img src="/image/no-image.png" style="max-height: 50px; display:block; margin-left:auto; margin-right:auto;" /> ';
            })
            ->rawColumns(['action', 'photo'])
            ->make();
        }

        return view('pages.admin.kategori.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriRequest $request)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($request->name);
        $data['photo'] = $request->file('photo')->store('asset/kategori', 'public');

        Categori::create($data);

        return redirect()->route('kategori.index')->with('success', 'Sukses menambahkan kategori baru');
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
        $kategori= Categori::findOrFail($id);

        return view('pages.admin.kategori.edit', compact('kategori'));
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
        if($request->has('photo')) {

        $data = $request->all();

        $data['slug'] = Str::slug($request->name);
        $data['photo'] = $request->file('photo')->store('asset/kategori', 'public');
        }
        else{
        $data['name']= $request->name;
        $data['slug'] =Str::slug($request->name);
        }

        $kategori = Categori::findOrFail($id);
        $kategori->update($data);

        return redirect()->route('kategori.index')->with('success', 'Sukses mengubah kategori');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori = Categori::findOrFail($id);

        $kategori->delete();

        return redirect()->route('kategori.index')->with('success', 'Sukses menghapus kategori');
    }
}