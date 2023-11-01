@extends('layouts.app')
@section('content')
    <h1>Transactions</h1>
    <h2><a href="/transaksi" class="btn btn-primary">Back</a></h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Peminjam</th>
                <th>Petugas</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td>{{ $transactions->id }}</td>
                    <td>{{ $transactions->useridPeminjam }}</td>
                    <td>{{ $transactions->useridPetugas }}</td>
                    <td>{{ $transactions->tanggalPinjam }}</td>
                    <td>{{ $transactions->tanggalSelesai }}</td>
                    <td>{{ $transactions->status}}</td>
                    <td>Action</td>
                </tr>
        </tbody>
    </table>
@endsection
