<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Admina') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Jesteś zalogowany jako administrator!") }}
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg text-blue-500 hover:underline cursor-pointer">
                        <a href="{{ route('users.index') }}">
                            Zarządzaj użytkownikami
                        </a>
                    </h3>
                </div>

                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg text-blue-500 hover:underline cursor-pointer">
                        <a href="{{ route('kategorie.index') }}">
                            Zarządzaj kategoriami
                        </a>
                    </h3>
                </div>

                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg text-blue-500 hover:underline cursor-pointer">
                        <a href="{{ route('kurierzy.index') }}">
                            Zarządzaj kurierami
                        </a>
                    </h3>
                </div>

                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg text-blue-500 hover:underline cursor-pointer">
                        <a href="{{ route('dostawcy.index') }}">
                            Zarządzaj dostawcami
                        </a>
                    </h3>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
