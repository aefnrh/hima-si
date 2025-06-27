<x-admin-layout header="Detail Aspirasi">


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-6">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-semibold">{{ $aspiration->subject }}</h3>
                            <span class="px-3 py-1 text-sm font-semibold rounded-full 
                                {{ $aspiration->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                {{ $aspiration->status === 'read' ? 'bg-blue-100 text-blue-800' : '' }}
                                {{ $aspiration->status === 'responded' ? 'bg-green-100 text-green-800' : '' }}
                            ">
                                {{ ucfirst($aspiration->status) }}
                            </span>
                        </div>
                        
                        <div class="mb-4">
                            <p class="text-sm text-gray-600">Dari: {{ $aspiration->name }} ({{ $aspiration->email }})</p>
                            <p class="text-sm text-gray-600">Tanggal: {{ $aspiration->created_at->format('d M Y H:i') }}</p>
                        </div>
                        
                        <div class="bg-gray-50 p-4 rounded mb-4">
                            <p class="whitespace-pre-line">{{ $aspiration->message }}</p>
                        </div>
                        
                        <form action="{{ route('admin.aspirations.update', $aspiration) }}" method="POST" class="mb-4">
                            @csrf
                            @method('PUT')
                            
                            <div class="mb-4">
                                <label for="status" class="block text-sm font-medium text-gray-700">Ubah Status</label>
                                <select name="status" id="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    <option value="pending" {{ $aspiration->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="read" {{ $aspiration->status === 'read' ? 'selected' : '' }}>Read</option>
                                    <option value="responded" {{ $aspiration->status === 'responded' ? 'selected' : '' }}>Responded</option>
                                </select>
                            </div>
                            
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Perbarui Status</button>
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