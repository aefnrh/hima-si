<x-admin-layout header="Detail Galeri">

    <div class="admin-content">
        <div class="admin-card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Detail Galeri</h5>
                <a href="{{ route('admin.galleries.index') }}" class="btn btn-secondary btn-sm">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-4">
                            <h6 class="fw-bold">Gambar:</h6>
                            <img src="{{ asset('images/gallery/' . $gallery->image) }}" alt="{{ $gallery->title }}" class="img-fluid rounded" style="max-height: 400px;">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <h6 class="fw-bold">Judul:</h6>
                            <p>{{ $gallery->title }}</p>
                        </div>

                        <div class="mb-3">
                            <h6 class="fw-bold">Deskripsi:</h6>
                            <p>{{ $gallery->description ?? 'Tidak ada deskripsi' }}</p>
                        </div>

                        <div class="mb-3">
                            <h6 class="fw-bold">Kategori:</h6>
                            <p>{{ $gallery->category ?? 'Umum' }}</p>
                        </div>

                        <div class="mb-3">
                            <h6 class="fw-bold">Tanggal Acara:</h6>
                            <p>{{ $gallery->event_date->format('d F Y') }}</p>
                        </div>

                        <div class="mb-3">
                            <h6 class="fw-bold">Tanggal Dibuat:</h6>
                            <p>{{ $gallery->created_at->format('d F Y H:i') }}</p>
                        </div>

                        <div class="mb-3">
                            <h6 class="fw-bold">Terakhir Diperbarui:</h6>
                            <p>{{ $gallery->updated_at->format('d F Y H:i') }}</p>
                        </div>

                        <div class="d-flex gap-2 mt-4">
                            <a href="{{ route('admin.galleries.edit', $gallery->id) }}" class="btn btn-warning">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('admin.galleries.destroy', $gallery->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus galeri ini?')">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-admin-layout>