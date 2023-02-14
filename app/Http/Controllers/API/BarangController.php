<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\BarangModel;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class BarangController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth:api');
    // }


    public function index2()
    {
        return view('welcome');
    }

    public function index()
    {
        $barang = BarangModel::all();
        $data = [];
        foreach($barang as $b){
            $data[] = [
                'id' => Hash::make($b->id),
                'nama' => $b->nama,
                'harga' => $b->harga
                // ... informasi lain tentang barang
            ];
        }
        return response()->json([
            'message' => 'Sukses Tampilkan Data Barang',
            'data' => $data
        ],Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'nama' => 'required',
            'harga' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Gagal isi sesuai ketentuan',
                'errors' => $validator->errors(),
            ],Response::HTTP_NOT_ACCEPTABLE);
        }

        $validator = $validator->validated();

        try {
            $barang = BarangModel::create($validator);
        } catch (\Throwable $th) {
            return response()->json(
                [
                    'message' => 'Gagagl Menambahkan Data',
                    'errors' => $th->getMessage(),
                ]);
        }

        return response()->json(
            [
                'message' => 'Successfully Create new barang',
                'data' => $barang
            ],Response::HTTP_OK);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),
        [
            'nama' => 'required',
            'harga' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'periksa kembali form anda',
                'errors' => $validator->errors()
            ],Response::HTTP_NOT_ACCEPTABLE);
        }

        $validated = $validator->validated();

        try {
            $data = BarangModel::findOrfail($id);
            $data->update($validated);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'data tidak berhasil di edit',
                'errors' => $th->getMessage()
            ]);
        }
        return response()->json([
            'message' => 'Sukses Edit Data',
            'data' => $data
        ]);
    }

    public function show($id)
    {
        $data = BarangModel::findOrfail($id);
        return response()->json([
            'message' => "data berhasil di tampilkan {$id}",
            'data' => $data
        ],Response::HTTP_OK);
    }
}
