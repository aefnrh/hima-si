<x-admin-layout header="Kelola Kabinet">

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <!-- Kabinet Section -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl font-semibold">Daftar Kabinet</h2>
                        <a href="{{ route('admin.kabinet-division.kabinet.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                            <i class="fas fa-plus mr-2"></i>Tambah Kabinet
                        </a>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead>
                                <tr>
                                    <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                                    <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tahun</th>
                                    <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Gambar</th>
                                    <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah Divisi</th>
                                    <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($kabinets as $kabinet)
                                    <tr>
                                        <td class="py-2 px-4 border-b border-gray-200">{{ $kabinet->name }}</td>
                                        <td class="py-2 px-4 border-b border-gray-200">{{ $kabinet->year }}</td>
                                        <td class="py-2 px-4 border-b border-gray-200">
                                            @if ($kabinet->image)
                                                <img src="{{ asset('images/' . $kabinet->image) }}" alt="{{ $kabinet->name }}" class="h-10 w-10 object-cover rounded">
                                            @else
                                                <span class="text-gray-400">No Image</span>
                                            @endif
                                        </td>
                                        <td class="py-2 px-4 border-b border-gray-200">
                                            {{ $kabinet->divisions->count() }}
                                        </td>
                                        <td class="py-2 px-4 border-b border-gray-200">
                                            <div class="flex space-x-2">
                                                <a href="{{ route('admin.kabinet-division.kabinet.edit', $kabinet) }}" class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600" title="Edit Kabinet">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="{{ route('admin.kabinet-division.kabinet.show', $kabinet) }}" class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600" title="Lihat Detail & Divisi">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.kabinet-division.division.create', ['kabinet_id' => $kabinet->id]) }}" class="px-3 py-1 bg-green-500 text-white rounded hover:bg-green-600" title="Tambah Divisi ke Kabinet Ini">
                                                    <i class="fas fa-plus"></i>
                                                </a>
                                                <form action="{{ route('admin.kabinet-division.kabinet.destroy', $kabinet) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kabinet ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600" title="Hapus Kabinet">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="py-2 px-4 border-b border-gray-200 text-center">Tidak ada kabinet yang ditemukan.</td>
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