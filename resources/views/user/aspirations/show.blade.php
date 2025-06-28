<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Aspirasi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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
                                    {{ $aspiration->status === 'pending' ? 'Menunggu' : '' }}
                                    {{ $aspiration->status === 'read' ? 'Dibaca' : '' }}
                                    {{ $aspiration->status === 'responded' ? 'Dibalas' : '' }}
                                </span>
                                <span class="px-3 py-1 text-sm font-semibold rounded-full 
                                    {{ $aspiration->is_visible ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}
                                ">
                                    {{ $aspiration->is_visible ? 'Publik' : 'Privat' }}
                                </span>
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <p class="text-sm text-gray-600">Tanggal: {{ $aspiration->created_at->format('d M Y H:i') }}</p>
                        </div>
                        
                        <div class="bg-gray-50 p-4 rounded mb-4">
                            <h4 class="font-medium mb-2">Pesan Anda:</h4>
                            <p class="whitespace-pre-line">{{ $aspiration->message }}</p>
                        </div>
                        
                        @if($aspiration->response)
                            <div class="bg-blue-50 p-4 rounded mb-4 border-l-4 border-blue-500">
                                <h4 class="font-medium mb-2">Balasan Admin:</h4>
                                <p class="whitespace-pre-line">{{ $aspiration->response }}</p>
                            </div>
                        @endif
                        
                        <div class="flex justify-between mt-6">
                            <a href="{{ route('user.aspirations.index') }}" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Kembali</a>
                            <form action="{{ route('user.aspirations.destroy', $aspiration) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menarik kembali aspirasi ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Tarik Kembali Aspirasi</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>