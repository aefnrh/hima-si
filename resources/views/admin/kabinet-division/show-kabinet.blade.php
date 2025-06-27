<x-admin-layout header="Detail Kabinet: {{ $kabinet->name }}">

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-xl font-semibold">Informasi Kabinet</h2>
                        <a href="{{ route('admin.kabinet-division.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                            <i class="fas fa-arrow-left mr-2"></i>Kembali
                        </a>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <div class="mb-4">
                                <h3 class="text-lg font-medium">Nama Kabinet</h3>
                                <p>{{ $kabinet->name }}</p>
                            </div>
                            <div class="mb-4">
                                <h3 class="text-lg font-medium">Tahun</h3>
                                <p>{{ $kabinet->year }}</p>
                            </div>
                            <div class="mb-4">
                                <h3 class="text-lg font-medium">Visi</h3>
                                <p>{{ $kabinet->vision }}</p>
                            </div>
                            <div class="mb-4">
                                <h3 class="text-lg font-medium">Misi</h3>
                                <p>{{ $kabinet->mission }}</p>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-lg font-medium mb-2">Gambar Kabinet</h3>
                            @if ($kabinet->image)
                                <img src="{{ asset('images/' . $kabinet->image) }}" alt="{{ $kabinet->name }}" class="max-w-full h-auto rounded">
                            @else
                                <div class="bg-gray-200 p-4 rounded text-center">
                                    <span class="text-gray-500">Tidak ada gambar</span>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-xl font-semibold">Divisi dalam Kabinet {{ $kabinet->name }}</h2>
                        <a href="{{ route('admin.kabinet-division.division.create', ['kabinet_id' => $kabinet->id]) }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                            <i class="fas fa-plus mr-2"></i>Tambah Divisi
                        </a>
                    </div>

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
                                    <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Deskripsi</th>
                                    <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Gambar</th>
                                    <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($divisions as $division)
                                    <tr>
                                        <td class="py-2 px-4 border-b border-gray-200">{{ $division->name }}</td>
                                        <td class="py-2 px-4 border-b border-gray-200">{{ Str::limit($division->description, 100) }}</td>
                                        <td class="py-2 px-4 border-b border-gray-200">
                                            @if ($division->image)
                                                <img src="{{ asset('images/' . $division->image) }}" alt="{{ $division->name }}" class="h-10 w-10 object-cover rounded">
                                            @else
                                                <span class="text-gray-400">No Image</span>
                                            @endif
                                        </td>
                                        <td class="py-2 px-4 border-b border-gray-200">
                                            <div class="flex space-x-2">
                                                <a href="{{ route('admin.kabinet-division.division.edit', $division) }}" class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600" title="Edit Divisi">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="{{ route('admin.divisions.work-programs.index', $division) }}" class="px-3 py-1 bg-green-500 text-white rounded hover:bg-green-600" title="Program Kerja">
                                                    <i class="fas fa-tasks"></i>
                                                </a>
                                                <form action="{{ route('admin.kabinet-division.division.destroy', $division) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus divisi ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600" title="Hapus Divisi">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="py-2 px-4 border-b border-gray-200 text-center">Tidak ada divisi yang ditemukan dalam kabinet ini.</td>
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