<x-admin-layout header="Detail Aspirasi">


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-6">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-semibold">{{ $aspiration->subject }}</h3>
                            <div class="flex items-center space-x-3">
                                <span class="px-3 py-1 text-sm font-semibold rounded-full 
                                    {{ $aspiration->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                    {{ $aspiration->status === 'read' ? 'bg-blue-100 text-blue-800' : '' }}
                                    {{ $aspiration->status === 'responded' ? 'bg-green-100 text-green-800' : '' }}
                                ">
                                    {{ ucfirst($aspiration->status) }}
                                </span>
                                <span class="px-3 py-1 text-sm font-semibold rounded-full 
                                    {{ $aspiration->is_visible ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}
                                ">
                                    {{ $aspiration->is_visible ? 'Publik' : 'Privat' }}
                                </span>
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <p class="text-sm text-gray-600">Dari: {{ $aspiration->name }} ({{ $aspiration->email }})</p>
                            <p class="text-sm text-gray-600">Tanggal: {{ $aspiration->created_at->format('d M Y H:i') }}</p>
                            @if($aspiration->user_id)
                                <p class="text-sm text-gray-600">User ID: {{ $aspiration->user_id }}</p>
                            @endif
                        </div>
                        
                        <div class="bg-gray-50 p-4 rounded mb-4">
                            <h4 class="font-medium mb-2">Pesan:</h4>
                            <p class="whitespace-pre-line">{{ $aspiration->message }}</p>
                        </div>
                        
                        @if($aspiration->response)
                            <div class="bg-blue-50 p-4 rounded mb-4 border-l-4 border-blue-500">
                                <h4 class="font-medium mb-2">Balasan Admin:</h4>
                                <p class="whitespace-pre-line">{{ $aspiration->response }}</p>
                            </div>
                        @endif
                        
                        <form action="{{ route('admin.aspirations.update', $aspiration) }}" method="POST" class="mb-4">
                            @csrf
                            @method('PUT')
                            
                            <div class="mb-4">
                                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                                <select name="status" id="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    <option value="pending" {{ $aspiration->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="read" {{ $aspiration->status === 'read' ? 'selected' : '' }}>Read</option>
                                    <option value="responded" {{ $aspiration->status === 'responded' ? 'selected' : '' }}>Responded</option>
                                </select>
                            </div>
                            
                            <div class="mb-4">
                                <label for="response" class="block text-sm font-medium text-gray-700">Balasan</label>
                                <textarea name="response" id="response" rows="5" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ $aspiration->response }}</textarea>
                                <p class="text-sm text-gray-500 mt-1">Menambahkan balasan akan otomatis mengubah status menjadi "Responded"</p>
                            </div>
                            
                            <div class="mb-4">
                                <div class="flex items-center">
                                    <input type="checkbox" name="is_visible" id="is_visible" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" {{ $aspiration->is_visible ? 'checked' : '' }}>
                                    <label for="is_visible" class="ml-2 block text-sm text-gray-700">Tampilkan di halaman publik</label>
                                </div>
                                <p class="text-sm text-gray-500 mt-1">Aspirasi yang ditampilkan di halaman publik akan terlihat oleh semua pengunjung website</p>
                            </div>
                            
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Simpan Perubahan</button>
                        </form>
                        
                        <div class="flex justify-between mt-6">
                            <a href="{{ route('admin.aspirations.index') }}" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Kembali</a>
                            <form action="{{ route('admin.aspirations.destroy', $aspiration) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus aspirasi ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>