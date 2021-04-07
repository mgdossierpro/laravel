<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
            <div class="py-12">
                <ul>
                    <li>
                        <a class="flex-shrink-0 flex items-center" href="{{ route('admin.add') }}">
                            Ajouter un cd
                        </a>
                    </li>

                    <li>
                        <a class="flex-shrink-0 flex items-center" href="{{ route('cds.cds') }}">
                            Retour aux vues users
                        </a>
                    </li>
                    <li>
                        <a class="flex-shrink-0 flex items-center" href="{{ route('admin.updateordelete') }}">
                            Modifier ou supprimer un cd
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
