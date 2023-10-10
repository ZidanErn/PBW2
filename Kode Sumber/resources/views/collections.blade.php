<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Custom Styles -->
    <style>
        /* tailwindcss styles */
        *,
        ::after,
        ::before {
            box-sizing: border-box;
            border-width: 0;
            border-style: solid;
            border-color: #e5e7eb;
        }

        html {
            line-height: 1.5;
            -webkit-text-size-adjust: 100%;
            -moz-tab-size: 4;
            tab-size: 4;
            font-family: Figtree, sans-serif;
            font-feature-settings: normal;
        }

        body {
            margin: 0;
            line-height: inherit;
            background-color: #f3f4f6; /* Added background color */
        }

        h1 {
            font-size: 1.5rem; /* Adjusted font size */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem; /* Added margin-top */
        }

        th, td {
            border: 1px solid #e5e7eb;
            padding: 0.75rem;
            text-align: left;
        }

        th {
            background-color: #4b5563;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #edf2f7; /* Alternate row color */
        }
    </style>
</head>
<body>
    <!-- Konten HTML -->
    <x-app-layout>
    <div class="bg-gray-100 p-6">
        <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Laravel Collections</h1>

        <table class="w-full bg-white rounded-lg shadow-2xl">
            <thead>
                <tr>
                    <th class="px-6 py-3">ID</th>
                    <th class="px-6 py-3">Nama Koleksi</th>
                    <th class="px-6 py-3">Jenis Koleksi</th>
                    <th class="px-6 py-3">Created At</th>
                    <th class="px-6 py-3">Jumlah Koleksi</th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop over your collection data and populate the table rows -->
                @foreach($collections as $collection)
                    <tr>
                        <td class="border px-6 py-4">{{ $collection->id }}</td>
                        <td class="border px-6 py-4">{{ $collection->namaKoleksi }}</td>
                        <td class="border px-6 py-4">{{ $collection->jenisKoleksi }}</td>
                        <td class="border px-6 py-4">{{ $collection->createdAt }}</td>
                        <td class="border px-6 py-4">{{ $collection->jumlahKoleksi }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>

</x-app-layout>