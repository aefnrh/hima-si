<x-admin-layout header="Edit Divisi">


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('admin.divisions.update', $division) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Nama Divisi</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $division->name) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            @error('name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                            <textarea name="description" id="description" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('description', $division->description) }}</textarea>
                            @error('description')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="image" class="block text-sm font-medium text-gray-700">Gambar</label>
                            @if ($division->image)
                                <div class="mt-2 mb-2">
                                    <img src="{{ asset('images/' . $division->image) }}" alt="{{ $division->name }}" class="h-32 w-32 object-cover rounded">
                                </div>
                            @endif
                            <input type="file" name="image" id="image" class="mt-1 block w-full">
                            <p class="text-xs text-gray-500 mt-1">Biarkan kosong jika tidak ingin mengubah gambar.</p>
                            @error('image')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="kabinet_id" class="block text-sm font-medium text-gray-700">Kabinet</label>
                            <select name="kabinet_id" id="kabinet_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="">Pilih Kabinet</option>
                                @foreach($kabinets as $kabinet)
                                    <option value="{{ $kabinet->id }}" {{ old('kabinet_id', $division->kabinet_id) == $kabinet->id ? 'selected' : '' }}>{{ $kabinet->name }}</option>
                                @endforeach
                            </select>
                            @error('kabinet_id')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-between mt-6">
                            @if(isset($fromKabinet) && $fromKabinet && $division->kabinet)
                                <a href="{{ route('admin.kabinet.show', $division->kabinet) }}" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Kembali ke Kabinet</a>
                            @else
                                <a href="{{ route('admin.divisions.index') }}" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Kembali</a>
                            @endif
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Perbarui</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>