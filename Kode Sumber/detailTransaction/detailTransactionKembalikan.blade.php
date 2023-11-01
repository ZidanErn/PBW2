@extends('layouts.app')
@section('content')
@if ($errors->any())
<div class="alert alert-success">
    <div class="row form-inline" onclick='$(this).parent().remove();'>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <span class="label"><strong>X</strong></span>
    </div>
</div>
@endif
<body>
<form method="POST" action="{{ url('detailTransactionUpdate') }}">
@csrf
<!-- ID Transaksi -->
<div class="row mb-3">
    <label for="idTransaksi" class="col-md-4 col-form-label text-md-end">{{ __('ID Transaksi') }}</label>
        <div class="col-md-6">
            <input id="idTransaksi" type="text" class="form-control @error('idTransaksi') is-invalid @enderror" name="idTransaksi" value="{{ $detailTransaction->idTransaksi }}" readonly>

            @error('idTransaksi')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="idDetailTransaksi" class="col-md-4 col-form-label text-md-end">{{ __('ID Detail Transaksi') }}</label>

        <div class="col-md-6">
            <input id="idDetailTransaksi" type="text" class="form-control @error('idDetailTransaksi') is-invalid @enderror" name="idDetailTransaksi" value="{{ $detailTransaction->id }}" readonly>

            @error('idDetailTransaksi')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="idPeminjam" class="col-md-4 col-form-label text-md-end">{{ __('Peminjam') }}</label>

        <div class="col-md-6">
            <input id="idPeminjam" type="text" class="form-control @error('idPeminjam') is-invalid @enderror" name="idPeminjam" value="{{ $detailTransaction->namaPeminjam }}" disabled>

            @error('idPeminjam')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="idPetugas" class="col-md-4 col-form-label text-md-end">{{ __('Petugas') }}</label>

        <div class="col-md-6">
            <input id="idPetugas" type="text" class="form-control @error('idPetugas') is-invalid @enderror" name="idPetugas" value="{{ $detailTransaction->namaPetugas }}" disabled>

            @error('idPetugas')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
             @enderror
        </div>
    </div>


<div class="row mb-3">
        <label for="koleksi" class="col-md-4 col-form-label text-md-end">{{ __('Koleksi') }}</label>

        <div class="col-md-6">
            <input id="koleksi" type="text" class="form-control @error('koleksi') is-invalid @enderror" name="koleksi" value="{{ $detailTransaction->koleksi }}" disabled>

            @error('koleksi')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
             @enderror
        </div>
    </div>

<div class="row mb-3">
    <label class="col-md-4 col-form-label text-md-end">Status</label>
    <div class="col-md-6">
        <select class="w-full mt-2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" id="status" name="status">
            <option value="1" @if(old('status', $detailTransaction->status) == 1) selected @endif>Pinjam</option>
            <option value="2" @if(old('status', $detailTransaction->status) == 2) selected @endif>Kembali</option>
            <option value="3" @if(old('status', $detailTransaction->status) == 3) selected @endif>Hilang</option>
        </select>
    </div>
</div>

<div class="row mb-0">
    <div class="col-md-6 offset-md-4">
    <a href="/transaksi" class="btn btn-default">Back</a>
        <button type="submit" class="btn btn-primary">
            {{ __('Selesai') }}
        </button>
        <button type="reset" class="btn btn-danger">Reset</button>
    </div>
</form>
</body>
@endsection