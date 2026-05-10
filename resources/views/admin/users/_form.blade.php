@csrf
<div class="mb-3">
    <label for="name" class="form-label">Nombre</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name ?? '') }}" required>
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="email" class="form-label">Correo Electrónico</label>
    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email ?? '') }}" required>
    @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="password" class="form-label">Nueva Contraseña (Opcional)</label>
    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" aria-describedby="passwordHelp">
    <div id="passwordHelp" class="form-text">Dejar en blanco si no deseas cambiar la contraseña.</div>
    @error('password')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="password_confirmation" class="form-label">Confirmar Nueva Contraseña</label>
    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
</div>

{{-- Aquí podrías añadir campos para roles si los implementas --}}
{{-- Ejemplo:
<div class="mb-3">
    <label for="role" class="form-label">Rol</label>
    <select class="form-select @error('role') is-invalid @enderror" id="role" name="role">
        <option value="user" {{ (old('role', $user->role ?? '') == 'user') ? 'selected' : '' }}>Usuario</option>
        <option value="admin" {{ (old('role', $user->role ?? '') == 'admin') ? 'selected' : '' }}>Administrador</option>
    </select>
    @error('role')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
--}}

<div class="mt-4">
    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Cancelar</a>
</div>
