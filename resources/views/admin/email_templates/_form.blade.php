@csrf
<div class="mb-3">
    <label for="title" class="form-label">Título de la Plantilla (Interno)</label>
    {{-- CORREGIDO: Se usa $emailTemplate en lugar de $template --}}
    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $emailTemplate->title ?? '') }}" required>
    @error('title')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="subject" class="form-label">Asunto del Email</label>
    {{-- CORREGIDO: Se usa $emailTemplate en lugar de $template --}}
    <input type="text" class="form-control @error('subject') is-invalid @enderror" id="subject" name="subject" value="{{ old('subject', $emailTemplate->subject ?? '') }}" required>
    @error('subject')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    <small class="form-text text-muted">Puedes usar placeholders como (student_name), (scholarship_title), etc.</small>
</div>

{{-- CAMPO ENTITY_TYPE COMO DESPLEGABLE --}}
<div class="mb-3">
    <label for="entity_type" class="form-label">Tipo de Entidad Principal</label>
    <select class="form-select @error('entity_type') is-invalid @enderror" id="entity_type" name="entity_type" required>
        <option value="">Selecciona un tipo de entidad...</option>
        @foreach($entityTypes as $key => $value)
            {{-- CORREGIDO: Se usa $emailTemplate en lugar de $template --}}
            <option value="{{ $key }}" {{ (old('entity_type', $emailTemplate->entity_type ?? '') == $key) ? 'selected' : '' }}>
                {{ $value }}
            </option>
        @endforeach
    </select>
    @error('entity_type')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    <small class="form-text text-muted">Indica a qué entidad principal se aplica esta plantilla.</small>
</div>

{{-- CAMPO ACTION_IDENTIFIER COMO DESPLEGABLE --}}
<div class="mb-3">
    <label for="action_identifier" class="form-label">Identificador de Acción (Opcional)</label>
    <select class="form-select @error('action_identifier') is-invalid @enderror" id="action_identifier" name="action_identifier">
        @foreach($actionIdentifiers as $key => $value)
            {{-- CORREGIDO: Se usa $emailTemplate en lugar de $template --}}
            <option value="{{ $key }}" {{ (old('action_identifier', $emailTemplate->action_identifier ?? '') == $key) ? 'selected' : '' }}>
                {{ $value }}
            </option>
        @endforeach
    </select>
    @error('action_identifier')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    <small class="form-text text-muted">Un identificador específico para la acción o propósito de la plantilla.</small>
</div>

<div class="mb-3">
    <label for="body" class="form-label">Cuerpo del Email (HTML)</label>
    {{-- Editor Quill.js que se inicializa desde el script de la página --}}
    <textarea class="form-control @error('body') is-invalid @enderror" id="body" name="body" rows="15" required placeholder="Escriba el contenido del email aquí...">{{ old('body', $emailTemplate->body ?? '') }}</textarea>
    @error('body')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    <small class="form-text text-muted">Editor WYSIWYG con formato HTML. Puedes usar placeholders como {regNombre}, {regEmail}, etc.</small>
</div>

<div class="mb-3">
    <label for="description" class="form-label">Descripción (Opcional)</label>
    {{-- CORREGIDO: Se usa $emailTemplate en lugar de $template --}}
    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description', $emailTemplate->description ?? '') }}</textarea>
    @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    <small class="form-text text-muted">Notas internas sobre el uso de esta plantilla.</small>
</div>

<button type="submit" class="btn btn-primary">{{ $buttonText ?? 'Guardar Plantilla' }}</button>
<a href="{{ route('admin.email-templates.index') }}" class="btn btn-secondary">Cancelar</a>