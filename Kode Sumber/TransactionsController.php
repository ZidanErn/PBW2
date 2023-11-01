<?php

namespace App\Http\Controllers;

use App\DataTables\TransactionsDataTable;
use App\Http\Controllers\Controller;
use App\Models\Collection;
use App\Models\DetailTransactions;
use App\Models\Transactions;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class TransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TransactionsDataTable $dataTable)
    {
        return $dataTable->render('transaction.daftarTransaksi');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $users = User::get();
        $collections = Collection::where('jumlahSisa', '>', 0)->get();
        return view('transaction.transaksiTambah', compact('collections','users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'IdPeminjam' => 'required|integer|gt:0',
        'koleksi1' => 'required|integer|gt:0',
        'koleksi2' => 'nullable|integer|gt:0',
        'koleksi3' => 'nullable|integer|gt:0',
    ], [
        'idPeminjam.required' => 'Pilih satu Peminjam',
        'idPeminjam.gt' => 'Pilih satu Peminjam',
        'koleksi1.required' => 'Pilih jenis Item',
        'koleksi1.gt' => 'Pilih jenis Item',
    ]);

    //membuat 1 object transaction dan simpan kedalam table transactions
    $transaction = new Transactions;
    $transaction->userIdPeminjam = $request->IdPeminjam;
    $transaction->userIdPetugas = auth()->user()->id;
    $transaction->tanggalPinjam = Carbon::now()->toDateTimeString();
    $transaction->save();

    //mengambil last transaction id untuk digunakan
    //pada proses insert detail transaction
    $lastTransactionIdStored = $transaction->id;

    //Membuat object detail transation dan simpan kedalam table detail transactions
    //Peminjaman koleksi 1
    $detilTransaksi1 = new DetailTransactions;
    $detilTransaksi1->transaction_id = $lastTransactionIdStored;
    $detilTransaksi1->collection_id = $request->koleksi1;
    $detilTransaksi1->status = 1;
    $detilTransaksi1->save();

    //Mengurangi jumlah stok
    DB::table('collections')->where('id', $request->koleksi1)->decrement('jumlahSisa');
    DB::table('collections')->where('id', $request->koleksi1)->increment('jumlahKeluar');

    //Peminjaman koleksi 2
    if ($request->koleksi2 > 0) {
        $detilTransaksi2 = new DetailTransactions;
        $detilTransaksi2->transaction_id = $lastTransactionIdStored;
        $detilTransaksi2->collection_id = $request->koleksi2;
        $detilTransaksi2->status = 1;
        $detilTransaksi2->save();

        DB::table('collections')->where('id', $request->koleksi2)->decrement('jumlahSisa');
        DB::table('collections')->where('id', $request->koleksi2)->increment('jumlahKeluar');
    }

    //Peminjaman koleksi 3
    if ($request->koleksi3 > 0) {
        $detilTransaksi3 = new DetailTransactions;
        $detilTransaksi3->transaction_id = $lastTransactionIdStored;
        $detilTransaksi3->collection_id = $request->koleksi3;
        $detilTransaksi3->status = 1;
        $detilTransaksi3->save();

        DB::table('collections')->where('id', $request->koleksi3)->decrement('jumlahSisa');
        DB::table('collections')->where('id', $request->koleksi3)->increment('jumlahKeluar');
    }

    return redirect('/transaksi')->with('status', 'Peminjaman berhasil');
}


    /**
     * Display the specified resource.
     */
    public function show(Transactions $transaction)
    {
        //
        $transactions = DB::table('transactions')
        ->join('users as u1', 'useridPeminjam', '=', 'u1.id')
        ->join('users as u2', 'useridPetugas', '=', 'u2.id')
        ->join('detail_transactions as dt', 'transactions.id', '=', 'dt.transaction_id')
        ->select('transactions.id as id',
            'u1.fullname as useridPeminjam',
            'u2.fullname as useridPetugas',
            'tanggalPinjam as tanggalPinjam',
            'dt.tanggalKembali as tanggalSelesai',
            'dt.status as status')
        ->where('transactions.id', '=', $transaction->id)
        ->orderBy('tanggalPinjam', 'asc')
        ->first();
        return view('transaction.transaksiView', compact('transactions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
