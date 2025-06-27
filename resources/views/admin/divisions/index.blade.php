<x-admin-layout header="{{ $kabinet ? 'Divisi Kabinet: ' . $kabinet->name : 'Kelola Divisi' }}">


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    <div class="flex justify-between mb-4">
                        @if ($kabinet)
                            <a href="{{ route('admin.kabinet.show', $kabinet) }}" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Kembali ke Kabinet</a>
                        @else
                            <div></div>
                        @endif
                        <a href="{{ route('admin.divisions.create', ['kabinet_id' => $kabinet ? $kabinet->id : null]) }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Tambah Divisi</a>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead>
                                <tr>
                                    <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                                    <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Slug</th>
                                    <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kabinet</th>
                                    <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Gambar</th>
                                    <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($divisions as $division)
                                    <tr>
                                        <td class="py-2 px-4 border-b border-gray-200">{{ $division->name }}</td>
                                        <td class="py-2 px-4 border-b border-gray-200">{{ $division->slug }}</td>
                                        <td class="py-2 px-4 border-b border-gray-200">
                                            @if ($division->kabinet)
                                                {{ $division->kabinet->name }}
                                            @else
                                                <span class="text-gray-400">Tidak ada</span>
                                            @endif
                                        </td>
                                        <td class="py-2 px-4 border-b border-gray-200">
                                            @if ($division->image)
                                                <img src="{{ asset('images/' . $division->image) }}" alt="{{ $division->name }}" class="h-10 w-10 object-cover rounded">
                                            @else
                                                <span class="text-gray-400">No Image</span>
                                            @endif
                                        </td>
                                        <td class="py-2 px-4 border-b border-gray-200">
                                            <div class="flex space-x-2">
                                                <a href="{{ route('admin.divisions.edit', $division) }}" class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">Edit</a>
                                                <a href="{{ route('admin.divisions.work-programs.index', $division) }}" class="px-3 py-1 bg-green-500 text-white rounded hover:bg-green-600">Program Kerja</a>
                                                <form action="{{ route('admin.divisions.destroy', $division) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus divisi ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600">Hapus</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="py-2 px-4 border-b border-gray-200 text-center">Tidak ada divisi yang ditemukan.</td>
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