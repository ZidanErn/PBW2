@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('transaksiStore') }}">
                        @csrf

                        
                        <div class="row mb-3">
                            <label for="IdPeminjam" class="col-md-4 col-form-label text-md-end">{{ __('Peminjam') }}</label>

                            <div class="col-md-6">
                                <select id="IdPeminjam" name="IdPeminjam" :value="old('IdPeminjam')" required autofocus autocomplete="IdPeminjam" class="w-full mt-2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                    <option disabled selected>Pilih</option>
                                    @foreach ($users as $user)
                                    @if ($user->id == old('IdPeminjam'))
                                    <option value="{{ $user->id }}" selected>{{ $user->fullname }}</option>
                                    @else
                                    <option value="{{ $user->id }}">{{ $user->fullname }}</option>
                                    @endif
                                    @endforeach
                                </select>
                                @error('IdPeminjam')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Koleksi 1 -->
                        <div class="row mb-3">
                            <label for="koleksi1" class="col-md-4 col-form-label text-md-end">{{ __('Koleksi 1') }}</label>

                            <div class="col-md-6">
                                <select id="koleksi1" name="koleksi1" :value="old('koleksi1')" required autofocus autocomplete="koleksi1" class="w-full mt-2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                    <option disabled selected>Pilih</option>
                                    @foreach ($collections as $collection)
                                    @if ($collection->id == old('koleksi1'))
                                    <option value="{{ $collection->id }}" selected>{{ $collection->namaKoleksi }}</option>
                                    @else
                                    <option value="{{ $collection->id }}">{{ $collection->namaKoleksi }}</option>
                                    @endif
                                    @endforeach
                                </select>
                                @error('koleksi1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="koleksi2" class="col-md-4 col-form-label text-md-end">{{ __('Koleksi 2') }}</label>

                            <div class="col-md-6">
                                <select id="koleksi2" name="koleksi2" :value="old('koleksi2')" required autofocus autocomplete="koleksi2" class="w-full mt-2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                    <option disabled selected>Pilih</option>
                                    @foreach ($collections as $collection)
                                    @if ($collection->id == old('koleksi2'))
                                    <option value="{{ $collection->id }}" selected>{{ $collection->namaKoleksi }}</option>
                                    @else
                                    <option value="{{ $collection->id }}">{{ $collection->namaKoleksi }}</option>
                                    @endif
                                    @endforeach
                                </select>
                                @error('koleksi1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="koleksi3" class="col-md-4 col-form-label text-md-end">{{ __('Koleksi 3') }}</label>

                            <div class="col-md-6">
                                <select id="koleksi3" name="koleksi3" :value="old('koleksi3')" required autofocus autocomplete="koleksi3" class="w-full mt-2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                    <option disabled selected>Pilih</option>
                                    @foreach ($collections as $collection)
                                    @if ($collection->id == old('koleksi3'))
                                    <option value="{{ $collection->id }}" selected>{{ $collection->namaKoleksi }}</option>
                                    @else
                                    <option value="{{ $collection->id }}">{{ $collection->namaKoleksi }}</option>
                                    @endif
                                    @endforeach
                                </select>
                                @error('koleksi1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ url('/transaksi') }}">
                {{ __('Dashboard Collection') }}
            </a>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
