<x-admin-layout header="Program Kerja {{ $division->name }}">

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('error') }}</span>
                        </div>
                    @endif

                    <div class="flex justify-between mb-4">
                        <a href="{{ route('admin.divisions.index') }}" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Kembali ke Divisi</a>
                        <a href="{{ route('admin.divisions.work-programs.create', $division) }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Tambah Program Kerja</a>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead>
                                <tr>
                                    <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Program</th>
                                    <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Waktu</th>
                                    <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ketua Pelaksana</th>
                                    <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($division->work_programs) && is_array($division->work_programs) && count($division->work_programs) > 0)
                                    @foreach($division->work_programs as $index => $program)
                                        <tr>
                                            <td class="py-2 px-4 border-b border-gray-200">{{ $program['name'] ?? 'Tidak ada nama' }}</td>
                                            <td class="py-2 px-4 border-b border-gray-200">{{ $program['time'] ?? 'Tidak ditentukan' }}</td>
                                            <td class="py-2 px-4 border-b border-gray-200">{{ $program['leader'] ?? 'Tidak ditentukan' }}</td>
                                            <td class="py-2 px-4 border-b border-gray-200">
                                                <div class="flex space-x-2">
                                                    <a href="{{ route('admin.divisions.work-programs.edit', ['division' => $division, 'index' => $index]) }}" class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">Edit</a>
                                                    <form action="{{ route('admin.divisions.work-programs.destroy', ['division' => $division, 'index' => $index]) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus program kerja ini?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600">Hapus</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4" class="py-2 px-4 border-b border-gray-200 text-center">Tidak ada program kerja yang ditemukan.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>