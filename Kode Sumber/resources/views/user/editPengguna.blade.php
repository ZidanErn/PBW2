<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Koleksi') }}
        </h2>
    </x-slot>
    {{-- // 6706223117 Muhammad Zidan Ernandiaz D3IF - 46-04 --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{route("user.updatePengguna")}}" method="POST" class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        @csrf
                        <input type="hidden" value="{{$user->id}}" name="id">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <tr>
                                    <th class="p-4">Full Name</th>
                                 <td> <input type="text" value="{{ $user->fullName }}" name="fullName" id="fullName"></td>
                                </tr>
                                <tr>
                                    <th class="p-4">Email</th>
                                    <td> <input type="text" value="{{ $user->email }}" name="email" id="email"></td>
                                </tr>
                                <tr>
                                    <th class="p-4">Username</th>
                                    <td> <input type="text" value="{{ $user->username }}" name="username" id="username"></td>
                                </tr>
                                <tr>
                                    <th class="p-4">Address</th>
                                    <td> <input type="text" value="{{ $user->address }}" name="address" id="address"></td>
                                </tr>
                                <tr>
                                    <th class="p-4">Phone Number</th>
                                    <td> <input type="text" value="{{ $user->phoneNumber }}" name="phoneNumber" id="phoneNumber"></td>
                                </tr>
                                <tr>
                                    <th class="p-4">Birthdate</th>
                                    <td> <input type="text" value="{{ $user->birthdate }}" name="birthdate" id="birthdate"></td>
                                </tr>
                                <tr>
                                    <th class="p-4">Agama</th>
                                    <td> <input type="text" value="{{ $user->agama }}" name="agama" id="agama"></td>
                                </tr>
                                <tr>
                                   
                                    <th class="p-4">Gender</th>
                                  <td>
                                    <select name="jenisKelamin" id="jenisKelamin">
                                        <option value="0" {{old('jenisKelamin') == 0 ? "selected" : ""}}>Pria</option>
                                        <option value="1" {{old('jenisKelamin') == 1 ? "selected" : ""}}>Wanita</option>
                                    </select>
                                  </td>
                                </tr>
                        </table>
                        <div class="flex justify-end">
                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Update Koleksi</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
{{-- // 6706223117 Muhammad Zidan Ernandiaz D3IF - 46-04 --}}