<x-admin-layout header="Edit Galeri">

    <div class="admin-content">
        <div class="admin-card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit Galeri</h5>
                <a href="{{ route('admin.galleries.index') }}" class="btn btn-secondary btn-sm">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.galleries.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="title" class="form-label">Judul <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $gallery->title) }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4">{{ old('description', $gallery->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="category" class="form-label">Kategori</label>
                        <select class="form-select @error('category') is-invalid @enderror" id="category" name="category">
                            <option value="">Pilih Kategori</option>
                            <option value="Workshop" {{ old('category', $gallery->category) == 'Workshop' ? 'selected' : '' }}>Workshop</option>
                            <option value="Seminar" {{ old('category', $gallery->category) == 'Seminar' ? 'selected' : '' }}>Seminar</option>
                            <option value="Kompetisi" {{ old('category', $gallery->category) == 'Kompetisi' ? 'selected' : '' }}>Kompetisi</option>
                            <option value="Bakti Sosial" {{ old('category', $gallery->category) == 'Bakti Sosial' ? 'selected' : '' }}>Bakti Sosial</option>
                            <option value="Kunjungan" {{ old('category', $gallery->category) == 'Kunjungan' ? 'selected' : '' }}>Kunjungan</option>
                            <option value="Lainnya" {{ old('category', $gallery->category) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                        </select>
                        @error('category')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="event_date" class="form-label">Tanggal Acara <span class="text-danger">*</span></label>
                        <input type="date" class="form-control @error('event_date') is-invalid @enderror" id="event_date" name="event_date" value="{{ old('event_date', $gallery->event_date->format('Y-m-d')) }}" required>
                        @error('event_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Gambar</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                        <small class="text-muted">Format: JPG, JPEG, PNG, GIF. Maksimal 2MB. Biarkan kosong jika tidak ingin mengubah gambar.</small>
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Gambar Saat Ini</label>
                        <div class="mt-2">
                            <img src="{{ asset('images/gallery/' . $gallery->image) }}" alt="{{ $gallery->title }}" class="img-thumbnail" style="max-width: 300px; max-height: 200px;">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Preview Gambar Baru</label>
                        <div class="mt-2">
                            <img id="preview" src="#" alt="Preview" style="max-width: 300px; max-height: 200px; display: none;" class="img-thumbnail">
                        </div>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('admin.galleries.index') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">Perbarui</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        document.getElementById('image').addEventListener('change', function(e) {
            const preview = document.getElementById('preview');
            preview.style.display = 'block';
            preview.src = URL.createObjectURL(e.target.files[0]);
            preview.onload = function() {
                URL.revokeObjectURL(preview.src);
            }
        });
    </script>
    @endpush

</x-admin-layout>