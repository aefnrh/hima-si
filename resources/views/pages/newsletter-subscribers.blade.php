@extends('layouts.main')

@section('content')
<div class="bg-gradient-to-r from-[#4A5568] to-[#667EEA] py-16">
    <div class="container mx-auto px-4">
        <div class="text-center">
            <h1 class="text-4xl font-bold text-white mb-4">Daftar Subscriber Newsletter</h1>
            <p class="text-xl text-blue-100">Berikut adalah daftar orang yang telah berlangganan newsletter HIMA SI.</p>
        </div>
    </div>
</div>

<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-semibold text-gray-800">Daftar Subscriber</h2>
        <a href="{{ route('dashboard') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition duration-300">
            <i class="fas fa-arrow-left mr-2"></i> Kembali ke Dashboard
        </a>
    </div>
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="p-6">
            @if(count($subscribers) > 0)
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Tanggal Berlangganan</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($subscribers as $subscriber)
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="text-sm leading-5 text-gray-900">{{ $subscriber->name ?? 'Tidak ada nama' }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="text-sm leading-5 text-gray-900">{{ $subscriber->created_at->format('d F Y') }}</div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    {{ $subscribers->links() }}
                </div>
            @else
                <div class="text-center py-8">
                    <p class="text-gray-500 text-lg">Belum ada yang berlangganan newsletter.</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection