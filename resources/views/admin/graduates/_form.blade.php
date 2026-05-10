    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="mb-3">
                <label for="name" class="form-label">Nombre de la Galería <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $graduate->name ?? '') }}" required placeholder="Ej: Gala de Graduación 2024">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="event_date" class="form-label">Fecha del Evento <span class="text-danger">*</span></label>
                <input type="date" class="form-control @error('event_date') is-invalid @enderror" id="event_date" name="event_date" value="{{ old('event_date', isset($graduate) && $graduate->event_date ? \Carbon\Carbon::parse($graduate->event_date)->format('Y-m-d') : '') }}" required>
                @error('event_date')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <small class="form-text text-muted">Esta fecha se usará para organizar las galerías.</small>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descripción (Opcional)</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description', $graduate->description ?? '') }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    <hr>
    <h5 class="mt-4 mb-3">Imágenes de la Galería</h5>
    <div class="mb-3">
        <label for="gallery_images" class="form-label">Añadir Nuevas Imágenes (Múltiples)</label>
        <input type="file" class="form-control @error('gallery_images.*') is-invalid @enderror" id="gallery_images" name="gallery_images[]" multiple onchange="previewGalleryImages(event)">
        @error('gallery_images.*')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>

    <div id="gallery_images_preview_container" class="row g-3 mb-3">
        {{-- Las previsualizaciones de nuevas imágenes se añadirán aquí con JS --}}
    </div>

    @if(isset($graduate) && $graduate->images->count() > 0)
        <h6 class="mt-4 mb-2">Imágenes Existentes</h6>
        <div class="row g-3">
            @foreach($graduate->images as $image)
            <div class="col-md-3 col-sm-4 col-6 mb-3" id="existing_image_{{ $image->id }}">
                <div class="card h-100">
                    <img src="{{ Storage::url($image->image_path) }}" class="card-img-top" alt="{{ $image->caption ?? 'Imagen de galería' }}" style="object-fit: cover; height: 150px;">
                    <div class="card-body p-2">
                        <input type="text" name="existing_captions[{{ $image->id }}]" value="{{ old('existing_captions.'.$image->id, $image->caption ?? '') }}" class="form-control form-control-sm mb-1" placeholder="Leyenda (opcional)">
                        <div class="form-check">
                             <input class="form-check-input" type="checkbox" name="delete_images[]" value="{{ $image->id }}" id="delete_image_{{ $image->id }}">
                             <label class="form-check-label small" for="delete_image_{{ $image->id }}">
                                Marcar para eliminar
                             </label>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @endif

    <div class="mt-4">
        <button type="submit" class="btn btn-primary">
            {{ isset($graduate) ? 'Actualizar Galería' : 'Crear Galería' }}
        </button>
        <a href="{{ route('admin.graduates.index') }}" class="btn btn-secondary">Cancelar</a>
    </div>

    @push('scripts')
    <script>
        function previewGalleryImages(event) {
            const previewContainer = document.getElementById('gallery_images_preview_container');
            previewContainer.innerHTML = ''; // Limpiar previsualizaciones anteriores
            if (event.target.files) {
                Array.from(event.target.files).forEach((file, index) => {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const col = document.createElement('div');
                        col.className = 'col-md-3 col-sm-4 col-6 mb-3';

                        const card = document.createElement('div');
                        card.className = 'card h-100';

                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.className = 'card-img-top';
                        img.style.objectFit = 'cover';
                        img.style.height = '150px';

                        const cardBody = document.createElement('div');
                        cardBody.className = 'card-body p-2';

                        const captionInput = document.createElement('input');
                        captionInput.type = 'text';
                        captionInput.name = `captions[${index}]`;
                        captionInput.className = 'form-control form-control-sm';
                        captionInput.placeholder = 'Leyenda (opcional)';

                        cardBody.appendChild(captionInput);
                        card.appendChild(img);
                        card.appendChild(cardBody);
                        col.appendChild(card);
                        previewContainer.appendChild(col);
                    }
                    reader.readAsDataURL(file);
                });
            }
        }
    </script>
    @endpush
    