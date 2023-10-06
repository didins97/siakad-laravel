<?php

namespace App\Http\Controllers;

use App\Prestasi;
use Illuminate\Http\Request;

class PrestasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prestasi = Prestasi::orderBy('created_at', 'desc')->get();
        return view('admin.prestasi.index', compact('prestasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('gambar');

        if ($request->gambar) {
            $gambar = $request->gambar;
            $new_gambar = date('siHdmY') . "_" . $gambar->getClientOriginalName();
            $gambar->move('uploads/prestasi/', $new_gambar);
            $nama_gambar = 'uploads/prestasi/' . $new_gambar;
        } else {
            if ($request->jk == 'L') {
                $nama_gambar = 'uploads/prestasi/35251431012020_male.jpg';
            } else {
                $nama_gambar = 'uploads/prestasi/23171022042020_female.jpg';
            }
        }

        $data['gambar'] = $nama_gambar;

        Prestasi::create($data);

        return redirect()->back()->with('success', 'Berhasil menambahkan data prestasi baru!');
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
        $prestasi = Prestasi::where('id', $id)->first();

        return response()->json($prestasi);
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
        $data = $request->except('gambar', '_token', '_method');

        if ($request->gambar) {
            $gambar = $request->gambar;
            $new_gambar = date('siHdmY') . "_" . $gambar->getClientOriginalName();
            $gambar->move('uploads/prestasi/', $new_gambar);
            $nama_gambar = 'uploads/prestasi/' . $new_gambar;
            $data['gambar'] = $nama_gambar;
        }

        Prestasi::where('id', $id)->update($data);

        return redirect()->route('prestasi.index')->with('success', 'Data prestasi berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prestasi = Prestasi::where('id', $id);

        $prestasi->delete();

        return redirect()->route('prestasi.index')->with('warning', 'Data prestasi berhasil dihapus! (Silahkan cek trash data guru)');
    }

    public function getPrestasiLp()
    {
        $prestasi = Prestasi::orderBy('created_at', 'desc')->limit(4)->get();
        return view('landing_page', compact('prestasi'));
    }
}
