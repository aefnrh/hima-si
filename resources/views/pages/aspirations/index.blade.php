<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Aspirasi Publik') }}
        </h2>
</x-slot>
<div class="container mx-auto px-4 py-8">
    <div class="text-center mb-10">
        <h1 class="text-3xl font-bold mb-2">Aspirasi Mahasiswa</h1>
        <p class="text-gray-600">Kumpulan aspirasi dari mahasiswa untuk kemajuan bersama</p>
    </div>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <div class="flex flex-col md:flex-row gap-8 mb-10">
        <div class="w-full md:w-2/3">
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="p-6">
                    <h2 class="text-2xl font-semibold mb-6">Aspirasi Terbaru</h2>
                    
                    @php
                        $aspirations = \App\Models\Aspiration::where('is_visible', true)
                            ->where('status', 'responded')
                            ->orderBy('created_at', 'desc')
                            ->paginate(5);
                    @endphp
                    
                    @if($aspirations->count() > 0)
                        <div class="space-y-6">
                            @foreach($aspirations as $aspiration)
                                <div class="border-b pb-6 last:border-b-0 last:pb-0">
                                    <div class="flex justify-between items-start mb-2">
                                        <h3 class="text-lg font-semibold">{{ $aspiration->subject }}</h3>
                                        <span class="text-sm text-gray-500">{{ $aspiration->created_at->format('d M Y') }}</span>
                                    </div>
                                    <p class="text-sm text-gray-600 mb-1">Dari: {{ $aspiration->name }}</p>
                                    <div class="bg-gray-50 p-4 rounded mb-4">
                                        <p class="whitespace-pre-line">{{ Str::limit($aspiration->message, 200) }}</p>
                                    </div>
                                    @if($aspiration->response)
                                        <div class="bg-blue-50 p-4 rounded border-l-4 border-blue-500">
                                            <h4 class="font-medium mb-2">Balasan:</h4>
                                            <p class="whitespace-pre-line">{{ Str::limit($aspiration->response, 200) }}</p>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                        
                        <div class="mt-6">
                            {{ $aspirations->links() }}
                        </div>
                    @else
                        <div class="text-center py-8">
                            <p class="text-gray-500">Belum ada aspirasi yang ditampilkan.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        
        <div class="w-full md:w-1/3">
            <div class="bg-white rounded-lg shadow-md overflow-hidden mb-6">
                <div class="p-6">
                    <h2 class="text-xl font-semibold mb-4">Kirim Aspirasi Anda</h2>
                    <p class="text-gray-600 mb-4">Sampaikan aspirasi, saran, atau masukan Anda untuk kemajuan bersama.</p>
                    <a href="{{ route('aspirations.create') }}" class="block w-full text-center bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
                        Kirim Aspirasi
                    </a>
                </div>
            </div>
            
            @auth
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="p-6">
                        <h2 class="text-xl font-semibold mb-4">Aspirasi Saya</h2>
                        <p class="text-gray-600 mb-4">Lihat dan kelola aspirasi yang telah Anda kirimkan.</p>
                        <a href="{{ route('aspirations.index') }}" class="block w-full text-center bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded">
                            Lihat Aspirasi Saya
                        </a>
                    </div>
                </div>
            @endauth
        </div>
    </div>
</div>
</x-app-layout>