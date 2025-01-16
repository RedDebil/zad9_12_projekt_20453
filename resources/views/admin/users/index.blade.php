<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Zarządzanie Użytkownikami
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <div class="mb-6">
                    <a href="{{ route('users.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">
                        Dodaj Użytkownika
                    </a>

                    <!-- Formularz filtrowania -->
                    <form method="GET" action="{{ route('users.index') }}" class="mt-4 mb-4">
                        <label for="role" class="mr-2">Filtruj po roli:</label>
                        <select name="role" id="role" class="border p-2 rounded">
                            @foreach ($roles as $value => $label)
                                <option value="{{ $value }}" {{ request('role') == $value ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                        <button type="submit" class="ml-2 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">
                            Filtruj
                        </button>
                    </form>

                    <table class="table-auto w-full text-left border-collapse">
                        <thead>
                            <tr>
                                <th class="border-b-2 p-2">#</th>
                                <th class="border-b-2 p-2">Imię</th>
                                <th class="border-b-2 p-2">Email</th>
                                <th class="border-b-2 p-2">Rola</th>
                                <th class="border-b-2 p-2">Akcje</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="border-b p-2">{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role }}</td>
                                <td>
                                    <a href="{{ route('users.edit', $user->id) }}" class="text-blue-500 hover:underline">Edytuj</a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                            onclick="return confirm('Czy na pewno chcesz usunąć tego użytkownika?')" 
                                            class="text-red-500 hover:underline">
                                            Usuń
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
