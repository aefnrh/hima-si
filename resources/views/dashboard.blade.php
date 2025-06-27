<x-admin-layout>
    @section('header', 'Dashboard Admin')

    <div class="py-4">
        <div class="container-fluid">
            <!-- Welcome Banner -->
            <div class="admin-card mb-4 slide-in-up">
                <div class="card-body">
                    <h2 class="text-xl font-semibold mb-2">Selamat Datang di Dashboard Admin</h2>
                    <p class="text-gray-600">Kelola konten website HIMA SI dengan mudah melalui panel admin ini.</p>
                </div>
            </div>

            <!-- Newsletter Subscribers Section -->
            <div class="admin-card mb-4 slide-in-up">
                <div class="card-header">
                    <h3 class="card-title">Daftar Subscriber Newsletter Terbaru</h3>
                </div>
                <div class="card-body">
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="py-2 px-4 border-b text-left">Nama</th>
                                    <th class="py-2 px-4 border-b text-left">Email</th>
                                    <th class="py-2 px-4 border-b text-left">Tanggal Berlangganan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $subscribers = \App\Models\NewsletterSubscriber::orderBy('created_at', 'desc')->take(5)->get();
                                @endphp
                                @forelse ($subscribers as $subscriber)
                                    <tr>
                                        <td class="py-2 px-4 border-b">{{ $subscriber->name ?? 'Tidak ada nama' }}</td>
                                        <td class="py-2 px-4 border-b">{{ $subscriber->email }}</td>
                                        <td class="py-2 px-4 border-b">{{ $subscriber->created_at->format('d F Y') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="py-2 px-4 border-b text-center">Belum ada subscriber newsletter.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('admin.newsletter.index') }}" class="text-blue-600 hover:text-blue-800">Lihat semua subscriber →</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
