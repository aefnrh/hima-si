<x-admin-layout header="Kelola Aspirasi">


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead>
                                <tr>
                                    <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                                    <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                    <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Subjek</th>
                                    <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                                    <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($aspirations as $aspiration)
                                    <tr class="{{ $aspiration->status === 'pending' ? 'bg-yellow-50' : '' }}">
                                        <td class="py-2 px-4 border-b border-gray-200">{{ $aspiration->name }}</td>
                                        <td class="py-2 px-4 border-b border-gray-200">{{ $aspiration->email }}</td>
                                        <td class="py-2 px-4 border-b border-gray-200">{{ $aspiration->subject }}</td>
                                        <td class="py-2 px-4 border-b border-gray-200">{{ $aspiration->created_at->format('d M Y H:i') }}</td>
                                        <td class="py-2 px-4 border-b border-gray-200">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                                {{ $aspiration->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                                {{ $aspiration->status === 'read' ? 'bg-blue-100 text-blue-800' : '' }}
                                                {{ $aspiration->status === 'responded' ? 'bg-green-100 text-green-800' : '' }}
                                            ">
                                                {{ ucfirst($aspiration->status) }}
                                            </span>
                                        </td>
                                        <td class="py-2 px-4 border-b border-gray-200">
                                            <div class="flex space-x-2">
                                                <a href="{{ route('admin.aspirations.show', $aspiration) }}" class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">Lihat</a>
                                                <form action="{{ route('admin.aspirations.destroy', $aspiration) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus aspirasi ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600">Hapus</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="py-2 px-4 border-b border-gray-200 text-center">Tidak ada aspirasi yang ditemukan.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>