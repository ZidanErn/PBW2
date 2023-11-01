<?php

namespace App\Http\Controllers;

use App\DataTables\TransactionsDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Transactions;
use App\Models\DetailTransactions;

class DetailTransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function update(Request $request){
        
        if ($request->status == 1) {
    
        } else {
            
            $affected = DB::table('detail_transactions')
                ->where('id', $request->idDetailTransaksi)
                ->update([
                    'status' => $request->status,
                    'tanggalKembali' => Carbon::now()->toDateString()
                ]);
    
                if ($request->status == 2) {
                    // Update 'tanggalSelesai' in the transactions table
                    DB::table('transactions')
                        ->where('id', $request->idTransaksi)
                        ->update(['tanggalSelesai' => Carbon::now()->toDateString()]);
            
                    // Update 'tanggalSelesai' in the collections table
                    DB::table('collections')->increment('jumlahSisa');
                    DB::table('collections')->decrement('jumlahkeluar');
                } else {
                //Kalau hilang
                DB::table('collections')->increment('jumlahSisa');
            }
        }
    
        $transaction = Transactions::where('id', '=', $request->idTransaksi)->first();
        return redirect('transaksiView/'.$request->idTransaksi)->with('transaction', $transaction);
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    
    public function detailTransactionKembalikan($detailTransactionId) {
        $detailTransaction = DB::table('detail_transactions as dt')
        ->join('collections as c', 'c.id', '=', 'dt.collection_id')
          ->join('transactions as t', 't.id', '=', 'dt.transaction_id')
          ->join('users as uPinjam', 't.userIdPeminjam', '=', 'uPinjam.id')
          ->join('users as uTugas', 't.userIdPetugas', '=', 'uTugas.id')
          ->select([
      't.id as idTransaksi',
            'dt.id as id',
            'dt.tanggalKembali as tanggalKembali',
            't.tanggalPinjam as tanggalpinjam',
            'dt.status',
            'uPinjam.fullname as namaPeminjam',
            'uTugas.fullname as namaPetugas',
            'c.namaKoleksi as koleksi'
          ])
          
          ->where('dt.id', '=', $detailTransactionId)->first();
      
        return view('detailTransaction.detailTransactionKembalikan', compact('detailTransaction'));
      }
}
