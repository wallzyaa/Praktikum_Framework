<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Tambah Kategori</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <x-card>
                @if (session('success'))
                    <div class="mb-4 p-3 bg-green-100 text-green-700 rounded-md text-sm">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('categories.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nama Kategori</label>
                        <input type="text" name="name" value="{{ old('name') }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        @error('name')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
                        <textarea name="description" rows="3"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ old('description') }}</textarea>
                    </div>
                    <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md">
                        Simpan
                    </button>
                </form>
            </x-card>

            <x-card>
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500">Nama Kategori</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500">Deskripsi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse ($categories as $category)
                            <tr>
                                <td class="px-4 py-2 text-sm">{{ $category->name }}</td>
                                <td class="px-4 py-2 text-sm">{{ $category->description }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="px-4 py-6 text-center text-gray-500">
                                    Belum ada data kategori.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-4">
                    {{ $categories->links() }}
                </div>
            </x-card>
        </div>
    </div>
</x-app-layout>