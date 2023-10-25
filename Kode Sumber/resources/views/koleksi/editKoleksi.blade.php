<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Koleksi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('koleksi.updateKoleksi', $collection->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{$collection->id}}">
                        <div class="mb-4">
                            <label for="namaKoleksi" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Nama Koleksi
                            </label>
                            <input type="text" name="namaKoleksi" id="namaKoleksi" value="{{ $collection->namaKoleksi }}" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                        </div>

                        <div class="mb-4">
                            <label for="jenisKoleksi" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Jenis Koleksi
                            </label>
                            <select name="jenisKoleksi" id="jenisKoleksi" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                                <option value="1" {{ $collection->jenisKoleksi == 1 ? 'selected' : '' }}>Buku</option>
                                <option value="2" {{ $collection->jenisKoleksi == 2 ? 'selected' : '' }}>Majalah</option>
                                <option value="3" {{ $collection->jenisKoleksi == 3 ? 'selected' : '' }}>Cakram Digital</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="jumlahKoleksi" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Jumlah Koleksi
                            </label>
                            <input type="number" name="jumlahKoleksi" id="jumlahKoleksi" value="{{ $collection->jumlahKoleksi }}" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                        </div>

                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update Pengguna</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
