<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bank = Bank::all();

        return view('admin/pages/banks.index',[
            'data' => $bank,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $new_bank = new Bank();

        $bank = (object) $new_bank->getDefaultValues();

        return view('admin/pages/banks.form',[
            'bank' => $bank,
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
        $data = $request->validate([
            'name' => ['required', 'string'],
            'account_number' => ['required', 'integer', 'unique:banks'],
            'bank' => ['required'],
        ],[
            'name.required' => 'Kolom nama masih kosong!',
            'name.string' => 'Kolom nama harus bertipe huruf!',
            'account_number.required' => 'Kolom rekening masih kosong!',
            'account_number.integer' => 'Kolom rekening harus bertipe angka!',
            'account_number.unique' => 'Rekening sudah terdaftar!',
            'bank.required' => 'Pilih salah satu bank!',
        ]);

        $bank = Bank::create($data);

        return redirect('admin/bank')->with('success','Data Bank Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function show(Bank $bank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function edit(Bank $bank)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bank $bank)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bank = Bank::where('id',$id)->delete();

        return redirect('admin/bank')->with('success','Data Bank Berhasil Dihapus!');
    }
}
