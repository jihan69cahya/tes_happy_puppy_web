<?php

namespace App\Http\Controllers\Data;

use App\Helpers\Money;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProdukRequest;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class ProdukController extends Controller
{
    // fungsi menampilkan halaman dan mengambil data tabel produk
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $kategori = $request->kategori;
            $data = Produk::when($kategori, function ($query, $kategori) {
                return $query->where('kategori', $kategori);
            })->get();
            return DataTables::of($data)
                ->addColumn("aksi", function ($row) {
                    $id = encrypt($row->id);
                    $button = "<button class='btn btn-warning btn-xs text-dark' data-bs-toggle='modal'
                                data-bs-target='#modal' onclick='submit(\"$id\")'>
                                <i class='fa-solid fa-pen'></i> Edit
                            </button>
                            <button class='btn btn-danger btn-xs' onclick='hapus_data(\"$id\")'>
                                <i class='fa-solid fa-trash'></i> Hapus
                            </button>
                            ";
                    return $button;
                })
                ->addIndexColumn()
                ->rawColumns(['aksi'])
                ->make(true);
        }
        $data['breadcrumbs'] = [['title' => 'Produk', 'url' => null]];
        return view('pages.produk.index', compact('data'));
    }

    // fungsi mengambil data produk berdasarkan ID
    public function edit($id)
    {
        $data = Produk::find(decrypt($id));
        return response()->json($data);
    }

    // fungsi tambah data produk
    public function store(ProdukRequest $request)
    {
        DB::beginTransaction();
        try {
            Produk::create([
                'nama' => $request->nama,
                'kategori' => $request->kategori,
                'harga' => Money::rupiahToString($request->harga),
                'stok' => $request->stok,
            ]);

            DB::commit();
            return response()->json(['success' => 'Produk berhasil ditambahkan']);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('TAMBAH PRODUK ERROR: ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
            return response()->json(['error' => 'Terjadi kesalahan saat menambahkan data, silakan coba lagi.', 'message' => $e->getMessage()]);
        }
    }

    // fungsi edit data produk
    public function update(ProdukRequest $request, $id)
    {
        $id = decrypt($id);

        DB::beginTransaction();
        try {
            $data = Produk::find($id);
            $data->nama = $request->nama;
            $data->kategori = $request->kategori;
            $data->harga = Money::rupiahToString($request->harga);
            $data->stok = $request->stok;
            $data->save();

            DB::commit();
            return response()->json(['success' => 'Produk berhasil diperbarui']);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('EDIT PRODUK ERROR: ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
            return response()->json(['error' => 'Terjadi kesalahan saat menambahkan data, silakan coba lagi.', 'message' => $e->getMessage()]);
        }
    }

    // fungsi hapus data produk
    public function destroy($id)
    {
        $id = decrypt($id);

        DB::beginTransaction();

        try {
            $data = Produk::findOrFail($id);
            $data->delete();

            DB::commit();
            return response()->json(['success' => 'Produk berhasil dihapus']);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('HAPUS MANAJEMEN PRODUK ERROR: ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
            return response()->json([
                'error' => 'Terjadi kesalahan saat menghapus data, silakan coba lagi.',
                'message' => $e->getMessage()
            ]);
        }
    }
}
