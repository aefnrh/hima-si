<x-admin-layout>
    @section('header', 'Dashboard Admin')

    <div class="py-4">
        <div class="container-fluid">
            <!-- Welcome Banner -->
            <div class="admin-card mb-4 slide-in-up">
                <div class="card-body p-4">
                    <div class="row align-items-center">
                        <div class="col-lg-8">
                            <h2 class="display-6 fw-bold mb-2">Selamat Datang di Dashboard HIMA SI</h2>
                            <p class="text-muted mb-4">Kelola dan pantau aktivitas Himpunan Mahasiswa Sistem Informasi</p>
                            <div class="d-flex flex-wrap gap-3">
                                <a href="{{ route('admin.kabinet.index') }}" class="admin-btn admin-btn-primary">
                                    <i class="fas fa-building btn-icon"></i>
                                    <span>Kelola Kabinet</span>
                                </a>
                                <a href="{{ route('admin.events.create') }}" class="admin-btn admin-btn-success">
                                    <i class="fas fa-plus-circle btn-icon"></i>
                                    <span>Buat Acara Baru</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 d-none d-lg-block text-center">
                            <img src="{{ asset('images/LOGO HIMA/LOGO HIMA SI BARU.png') }}" alt="HIMA SI Logo" class="img-fluid" style="max-height: 180px;">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="row mb-4">
                <!-- Divisions Card -->
                <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                    <div class="stat-card primary slide-in-left" style="animation-delay: 0.1s">
                        <div class="stat-icon">
                            <i class="fas fa-sitemap"></i>
                        </div>
                        <div class="stat-content">
                            <div class="stat-value">{{ \App\Models\Division::count() }}</div>
                            <div class="stat-label">Divisi</div>
                            <a href="{{ route('admin.divisions.index') }}" class="mt-2 d-inline-block text-primary">
                                <span>Kelola Divisi</span>
                                <i class="fas fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Members Card -->
                <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                    <div class="stat-card success slide-in-left" style="animation-delay: 0.2s">
                        <div class="stat-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="stat-content">
                            <div class="stat-value">{{ \App\Models\Member::count() }}</div>
                            <div class="stat-label">Anggota</div>
                            <a href="{{ route('admin.members.index') }}" class="mt-2 d-inline-block text-success">
                                <span>Kelola Anggota</span>
                                <i class="fas fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Events Card -->
                <div class="col-md-6 col-lg-3 mb-4 mb-md-0">
                    <div class="stat-card warning slide-in-left" style="animation-delay: 0.3s">
                        <div class="stat-icon">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                        <div class="stat-content">
                            <div class="stat-value">{{ \App\Models\Event::count() }}</div>
                            <div class="stat-label">Acara</div>
                            @if(\App\Models\Event::where('date', '>=', now())->count() > 0)
                                <span class="admin-badge admin-badge-success mt-1 d-inline-block">
                                    {{ \App\Models\Event::where('date', '>=', now())->count() }} mendatang
                                </span>
                            @endif
                            <a href="{{ route('admin.events.index') }}" class="mt-2 d-inline-block text-warning">
                                <span>Kelola Acara</span>
                                <i class="fas fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Aspirations Card -->
                <div class="col-md-6 col-lg-3">
                    <div class="stat-card danger slide-in-left" style="animation-delay: 0.4s">
                        <div class="stat-icon">
                            <i class="fas fa-comment-alt"></i>
                        </div>
                        <div class="stat-content">
                            <div class="stat-value">{{ \App\Models\Aspiration::count() }}</div>
                            <div class="stat-label">Aspirasi</div>
                            @if(\App\Models\Aspiration::where('status', 'pending')->count() > 0)
                                <span class="admin-badge admin-badge-danger mt-1 d-inline-block">
                                    {{ \App\Models\Aspiration::where('status', 'pending')->count() }} belum dibaca
                                </span>
                            @endif
                            <a href="{{ route('admin.aspirations.index') }}" class="mt-2 d-inline-block text-danger">
                                <span>Kelola Aspirasi</span>
                                <i class="fas fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content Grid -->
            <div class="row mb-4">
                <!-- Recent Aspirations -->
                <div class="col-lg-6 mb-4">
                    <div class="admin-card slide-in-up" style="animation-delay: 0.5s">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-comment-alt text-danger me-2"></i>
                                Aspirasi Terbaru
                            </h3>
                            <a href="{{ route('admin.aspirations.index') }}" class="text-primary">
                                Lihat Semua <i class="fas fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                        <div class="card-body p-0">
                            <div class="list-group list-group-flush">
                                @forelse (\App\Models\Aspiration::orderBy('created_at', 'desc')->take(5)->get() as $aspiration)
                                    <div class="list-group-item p-3 {{ $aspiration->status === 'pending' ? 'border-start border-4 border-warning bg-light' : '' }}">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <div>
                                                <h5 class="mb-1 fw-bold">{{ $aspiration->subject }}</h5>
                                                <p class="text-muted small mb-0">Dari: {{ $aspiration->name }}</p>
                                            </div>
                                            <span class="admin-badge 
                                                {{ $aspiration->status === 'pending' ? 'admin-badge-warning' : '' }}
                                                {{ $aspiration->status === 'read' ? 'admin-badge-info' : '' }}
                                                {{ $aspiration->status === 'responded' ? 'admin-badge-success' : '' }}
                                            ">
                                                {{ ucfirst($aspiration->status) }}
                                            </span>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mt-3">
                                            <small class="text-muted">{{ $aspiration->created_at->format('d M Y H:i') }}</small>
                                            <a href="{{ route('admin.aspirations.show', $aspiration) }}" class="admin-btn admin-btn-primary py-1 px-3">
                                                <i class="fas fa-eye me-1"></i> Lihat
                                            </a>
                                        </div>
                                    </div>
                                @empty
                                    <div class="text-center py-5">
                                        <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                                        <p class="text-muted">Tidak ada aspirasi yang ditemukan.</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Upcoming Events -->
                <div class="col-lg-6 mb-4">
                    <div class="admin-card slide-in-up" style="animation-delay: 0.6s">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-calendar-alt text-warning me-2"></i>
                                Acara Mendatang
                            </h3>
                            <a href="{{ route('admin.events.index') }}" class="text-primary">
                                Lihat Semua <i class="fas fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                        <div class="card-body p-0">
                            <div class="list-group list-group-flush">
                                @forelse (\App\Models\Event::where('date', '>=', now())->orderBy('date', 'asc')->take(5)->get() as $event)
                                    <div class="list-group-item p-0">
                                        <div class="d-flex">
                                            <div class="bg-warning text-white p-3 d-flex flex-column align-items-center justify-content-center" style="width: 80px">
                                                <span class="fs-4 fw-bold">{{ $event->date->format('d') }}</span>
                                                <span class="small text-uppercase">{{ $event->date->format('M') }}</span>
                                            </div>
                                            <div class="p-3 flex-grow-1">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <h5 class="mb-1 fw-bold">{{ $event->title }}</h5>
                                                        <span class="admin-badge admin-badge-success">Coming Soon</span>
                                                    </div>
                                                    <a href="{{ route('admin.events.edit', $event) }}" class="btn btn-sm btn-outline-warning rounded-circle">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                </div>
                                                <div class="mt-2 d-flex align-items-center text-muted small">
                                                    <i class="fas fa-clock me-1"></i>
                                                    <span>{{ $event->date->format('H:i') }}</span>
                                                    <span class="mx-2">•</span>
                                                    <i class="fas fa-map-marker-alt me-1"></i>
                                                    <span>{{ $event->location }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="text-center py-5">
                                        <i class="fas fa-calendar-times fa-3x text-muted mb-3"></i>
                                        <p class="text-muted">Tidak ada acara mendatang yang ditemukan.</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kabinet Overview -->
            <div class="admin-card mb-4 slide-in-up" style="animation-delay: 0.7s">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-building text-primary me-2"></i>
                        Kabinet Aktif
                    </h3>
                    <a href="{{ route('admin.kabinet.index') }}" class="text-primary">
                        Kelola Kabinet <i class="fas fa-arrow-right ms-1"></i>
                    </a>
                </div>
                <div class="card-body">
                    @php
                        $currentKabinet = \App\Models\Kabinet::orderBy('year', 'desc')->first();
                    @endphp

                    @if($currentKabinet)
                        <div class="row">
                            <div class="col-md-3 mb-4 mb-md-0">
                                @if($currentKabinet->image)
                                    <img src="{{ asset('images/' . $currentKabinet->image) }}" alt="{{ $currentKabinet->name }}" class="img-fluid rounded shadow-sm">
                                @else
                                    <div class="bg-light rounded p-4 text-center h-100 d-flex align-items-center justify-content-center">
                                        <i class="fas fa-image fa-4x text-muted"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-9">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <div>
                                        <h4 class="fw-bold mb-0">{{ $currentKabinet->name }}</h4>
                                        <p class="text-muted">Periode {{ $currentKabinet->year }}</p>
                                    </div>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('admin.kabinet.edit', $currentKabinet) }}" class="admin-btn admin-btn-outline-primary py-1 px-3">
                                            <i class="fas fa-pencil-alt btn-icon"></i>
                                            <span>Edit</span>
                                        </a>
                                        <a href="{{ route('admin.members.index') }}" class="admin-btn admin-btn-success py-1 px-3">
                                            <i class="fas fa-users btn-icon"></i>
                                            <span>Anggota</span>
                                        </a>
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <div class="col-12">
                                        <div class="card bg-light border-0 mb-3">
                                            <div class="card-body">
                                                <h5 class="card-title fw-bold">Visi</h5>
                                                <p class="card-text">{{ $currentKabinet->vision }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="card bg-light border-0">
                                            <div class="card-body">
                                                <h5 class="card-title fw-bold">Misi</h5>
                                                <p class="card-text">{{ $currentKabinet->mission }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="fas fa-building fa-4x text-muted mb-3"></i>
                            <p class="text-muted mb-4">Belum ada kabinet yang dibuat.</p>
                            <a href="{{ route('admin.kabinet.create') }}" class="admin-btn admin-btn-primary">
                                <i class="fas fa-plus-circle btn-icon"></i>
                                <span>Buat Kabinet Baru</span>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>