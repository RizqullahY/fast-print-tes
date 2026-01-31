<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Status;
use App\Helpers\ApiResponse;
use App\Helpers\Currency;

use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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

    public function store(ProductRequest $request)
    {
        Produk::create([
            'id_produk'   => Produk::max('id_produk') + 1,
            'nama_produk' => $request->nama_produk,
            'harga'       => $request->harga,
            'kategori_id' => $request->kategori_id,
            'status_id'   => 1,
        ]);

        return ApiResponse::success('Produk berhasil ditambahkan');
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

    public function update(ProductRequest $request, string $id_produk)
    {
        $produk = Produk::findOrFail($id_produk);

        $produk->update($request->only([
            'nama_produk',
            'kategori_id',
            'status_id',
            'harga'
        ]));

        return ApiResponse::success('Produk berhasil diupdate');
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

    public function destroy(string $id_produk)
    {
        Produk::destroy($id_produk);

        return ApiResponse::success('Produk berhasil dihapus');
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
            ->addColumn('harga', function ($row) {
                return Currency::rupiah($row->harga);
            })
            ->addColumn('action', function ($row) {
                return '
                    <button class="btn btn-sm btn-primary" onclick="editProduk('.$row->id_produk.')"><i class="ti ti-pencil"></i></button>
                    <button class="btn btn-sm btn-danger" onclick="deleteProduk('.$row->id_produk.')"><i class="ti ti-trash"></i> </button>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
    } 
}
