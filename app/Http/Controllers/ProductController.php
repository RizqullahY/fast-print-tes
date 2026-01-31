<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Status;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        return view('pages.product.index');
    }

    public function create(Request $request)
    {
        $kategori = Kategori::orderBy('nama_kategori')->get();
        $status   = Status::orderBy('id_status')->get();

        return $request->boolean('is_component')
            ? view('pages.product.components.create', compact('kategori','status'))
            : view('pages.product.create', compact('kategori','status'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategori,id_kategori',
            'harga'       => 'required|numeric|min:0',
        ]);

        DB::transaction(function () use ($request) {
            Produk::create([
                'id_produk'   => Produk::max('id_produk') + 1,
                'nama_produk' => $request->nama_produk,
                'harga'       => $request->harga,
                'kategori_id' => $request->kategori_id,
                'status_id'   => 1,
            ]);
        });

        return response()->json([
            'success' => true,
            'message' => 'Product berhasil ditambahkan'
        ]);
    }



    public function edit(Request $request, string $id_produk)
    {
        $produk   = Produk::findOrFail($id_produk);
        $kategori = Kategori::orderBy('nama_kategori')->get();
        $status   = Status::orderBy('id_status')->get();

        return $request->boolean('is_component')
            ? view('pages.product.components.edit', compact('produk', 'kategori', 'status'))
            : view('pages.product.edit', compact('produk', 'kategori', 'status'));
    }


    public function update(Request $request, string $id_produk)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategori,id_kategori',
            'status_id'   => 'required|exists:status,id_status',
            'harga'      => 'required|numeric|min:0',
        ]);

        DB::transaction(function() use ($request, $id_produk){
            $produk = Produk::findOrFail($id_produk);

            $produk->update([
                'nama_produk' => $request->nama_produk,
                'kategori_id' => $request->kategori_id,
                'status_id'   => $request->status_id,
                'harga'       => $request->harga,
            ]);
        });

        return response()->json([
            'success' => true,
            'message' => 'Product berhasil ditambahkan'
        ]);
    }

    public function show(Request $request, string $id_produk)
    {
        $produk   = Produk::findOrFail($id_produk);
        $kategori = Kategori::orderBy('nama_kategori')->get();
        $status   = Status::orderBy('id_status')->get();

        return $request->boolean('is_component')
            ? view('pages.product.components.delete', compact('produk', 'kategori', 'status'))
            : view('pages.product.delete', compact('produk', 'kategori', 'status'));
    }

    public function destroy(Produk $id_produk)
    {
        Produk::destroy($id_produk);

        return response()->json([
            'success' => true,
            'message' => 'Product berhasil ditambahkan'
        ]);
    }


    public function list(Request $request)
    {
        $query = Produk::query()
            ->with(['category'])
            ->where('status_id', 1)   
            ->select('produk.*');

        return DataTables::of($query)
            ->addColumn('kategori', function ($row) {
                return $row->category->nama_kategori ?? '-';
            })
            ->addColumn('action', function ($row) {
                return '
                    <button class="btn btn-sm btn-primary" onclick="editProduk('.$row->id_produk.')"> Edit </button>
                    <button class="btn btn-sm btn-danger" onclick="deleteProduk('.$row->id_produk.')"> Delete </button>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
 
}
