@extends('layouts/contentNavbarLayout')

@section('title', 'Editar Estudiante')

@section('vendor-style')
@vite('resources/assets/vendor/libs/apex-charts/apex-charts.scss')
@endsection

@section('vendor-script')
@vite('resources/assets/vendor/libs/apex-charts/apexcharts.js')
@endsection

@section('page-script')
@vite('resources/assets/js/dashboards-analytics.js')
@endsection

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Editar Estudiante: {{ $student->name }}</h5>
        <div>
          <a href="{{ route('admin.students.show', $student->id) }}" class="btn btn-secondary me-2">
            <i class="ri-eye-line me-1"></i> Ver Detalles
          </a>
          <a href="{{ route('admin.students.index') }}" class="btn btn-secondary">
            <i class="ri-arrow-left-line me-1"></i> Volver al Listado
          </a>
        </div>
      </div>
      <div class="card-body">
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <form action="{{ route('admin.students.update', $student->id) }}" method="POST" class="row g-3">
          @csrf
          @method('PUT')
          
          <div class="col-12">
            <h6 class="fw-bold">Información General</h6>
            <hr class="mt-0">
          </div>

          <div class="col-md-6">
            <label for="name" class="form-label">Nombre Completo <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $student->name) }}" required>
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-6">
            <label for="accommodations" class="form-label">Alojamientos Asignados</label>
            <select id="accommodations" name="accommodations[]" class="form-select @error('accommodations') is-invalid @enderror" multiple>
              <option value="" disabled>-- Seleccionar Alojamientos --</option>
              @if(isset($accommodations))
                @foreach($accommodations as $accommodation)
                  <option value="{{ $accommodation->id }}" 
                    {{ in_array($accommodation->id, old('accommodations', $student->accomodations->pluck('id')->toArray())) ? 'selected' : '' }}>
                    {{ $accommodation->name }} - {{ $accommodation->section_text }}
                  </option>
                @endforeach
              @endif
            </select>
            <small class="form-text text-muted">Mantén Ctrl presionado para seleccionar múltiples opciones</small>
            @error('accommodations')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-6">
            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $student->email) }}" required>
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-4">
            <label for="passport" class="form-label">Pasaporte/DNI <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('passport') is-invalid @enderror" id="passport" name="passport" value="{{ old('passport', $student->passport) }}" required>
            @error('passport')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-4">
            <label for="birthdate" class="form-label">Fecha de Nacimiento <span class="text-danger">*</span></label>
            <input type="date" class="form-control @error('birthdate') is-invalid @enderror" id="birthdate" name="birthdate" value="{{ old('birthdate', $student->birthdate ? $student->birthdate->format('Y-m-d') : '') }}" required>
            @error('birthdate')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-4">
            <label for="sex" class="form-label">Género <span class="text-danger">*</span></label>
            <select id="sex" name="sex" class="form-select @error('sex') is-invalid @enderror" required>
              <option value="" disabled>Selecciona una opción</option>
              <option value="M" {{ old('sex', $student->sex) == 'M' ? 'selected' : '' }}>Masculino</option>
              <option value="F" {{ old('sex', $student->sex) == 'F' ? 'selected' : '' }}>Femenino</option>
              <option value="O" {{ old('sex', $student->sex) == 'O' ? 'selected' : '' }}>Otro</option>
            </select>
            @error('sex')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-12">
            <h6 class="fw-bold mt-3">Dirección</h6>
            <hr class="mt-0">
          </div>

          <div class="col-md-12">
            <label for="address" class="form-label">Dirección <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address', $student->address) }}" required>
            @error('address')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-4">
            <label for="postal_code" class="form-label">Código Postal <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('postal_code') is-invalid @enderror" id="postal_code" name="postal_code" value="{{ old('postal_code', $student->postal_code) }}" required>
            @error('postal_code')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-4">
            <label for="city" class="form-label">Ciudad <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" name="city" value="{{ old('city', $student->city) }}" required>
            @error('city')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-4">
            <label for="province" class="form-label">Provincia <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('province') is-invalid @enderror" id="province" name="province" value="{{ old('province', $student->province) }}" required>
            @error('province')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-4">
            <label for="country" class="form-label">País <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('country') is-invalid @enderror" id="country" name="country" value="{{ old('country', $student->country) }}" required>
            @error('country')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-4">
            <label for="phone" class="form-label">Teléfono <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone', $student->phone) }}" required>
            @error('phone')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-12">
            <h6 class="fw-bold mt-3">Información Académica</h6>
            <hr class="mt-0">
          </div>

          <div class="col-md-4">
            <label for="language" class="form-label">Idioma Principal <span class="text-danger">*</span></label>
            <select id="language" name="language" class="form-select @error('language') is-invalid @enderror" required>
              <option value="" disabled>Selecciona un idioma</option>
              <option value="spanish" {{ old('language', $student->language) == 'spanish' ? 'selected' : '' }}>Español</option>
              <option value="english" {{ old('language', $student->language) == 'english' ? 'selected' : '' }}>Inglés</option>
              <option value="french" {{ old('language', $student->language) == 'french' ? 'selected' : '' }}>Francés</option>
              <option value="german" {{ old('language', $student->language) == 'german' ? 'selected' : '' }}>Alemán</option>
              <option value="italian" {{ old('language', $student->language) == 'italian' ? 'selected' : '' }}>Italiano</option>
              <option value="other" {{ old('language', $student->language) == 'other' ? 'selected' : '' }}>Otro</option>
            </select>
            @error('language')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-4">
            <label for="second_language" class="form-label">Segundo Idioma</label>
            <select id="second_language" name="second_language" class="form-select @error('second_language') is-invalid @enderror">
              <option value="" {{ old('second_language', $student->second_language) == '' ? 'selected' : '' }}>Ninguno</option>
              <option value="spanish" {{ old('second_language', $student->second_language) == 'spanish' ? 'selected' : '' }}>Español</option>
              <option value="english" {{ old('second_language', $student->second_language) == 'english' ? 'selected' : '' }}>Inglés</option>
              <option value="french" {{ old('second_language', $student->second_language) == 'french' ? 'selected' : '' }}>Francés</option>
              <option value="german" {{ old('second_language', $student->second_language) == 'german' ? 'selected' : '' }}>Alemán</option>
              <option value="italian" {{ old('second_language', $student->second_language) == 'italian' ? 'selected' : '' }}>Italiano</option>
              <option value="other" {{ old('second_language', $student->second_language) == 'other' ? 'selected' : '' }}>Otro</option>
            </select>
            @error('second_language')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-4">
            <label for="level" class="form-label">Nivel <span class="text-danger">*</span></label>
            <select id="level" name="level" class="form-select @error('level') is-invalid @enderror" required>
              <option value="" disabled>Selecciona un nivel</option>
              <option value="A1" {{ old('level', $student->level) == 'A1' ? 'selected' : '' }}>A1 - Principiante</option>
              <option value="A2" {{ old('level', $student->level) == 'A2' ? 'selected' : '' }}>A2 - Elemental</option>
              <option value="B1" {{ old('level', $student->level) == 'B1' ? 'selected' : '' }}>B1 - Intermedio</option>
              <option value="B2" {{ old('level', $student->level) == 'B2' ? 'selected' : '' }}>B2 - Intermedio Alto</option>
              <option value="C1" {{ old('level', $student->level) == 'C1' ? 'selected' : '' }}>C1 - Avanzado</option>
              <option value="C2" {{ old('level', $student->level) == 'C2' ? 'selected' : '' }}>C2 - Dominio</option>
            </select>
            @error('level')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-4">
            <label for="center" class="form-label">Centro <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('center') is-invalid @enderror" id="center" name="center" value="{{ old('center', $student->center) }}" required>
            @error('center')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-4">
            <label for="partner" class="form-label">Socio/Referencia</label>
            <input type="text" class="form-control @error('partner') is-invalid @enderror" id="partner" name="partner" value="{{ old('partner', $student->partner) }}">
            @error('partner')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-12">
            <h6 class="fw-bold mt-3">Estado y Fechas</h6>
            <hr class="mt-0">
          </div>

          <div class="col-md-4">
            <div class="form-check form-switch mt-4">
              <input class="form-check-input" type="checkbox" id="status" name="status" {{ old('status', $student->status) == 'active' ? 'checked' : '' }}>
              <label class="form-check-label" for="status">Estudiante Activo</label>
            </div>
          </div>

          <div class="col-md-4">
            <label for="payment_status" class="form-label">Estado de Pago</label>
            <select id="payment_status" name="payment_status" class="form-select @error('payment_status') is-invalid @enderror">
              <option value="" {{ old('payment_status', $student->payment_status) == '' ? 'selected' : '' }}>No especificado</option>
              <option value="507" {{ old('payment_status', $student->payment_status) == '507' ? 'selected' : '' }}>Renuncia / Aplazamiento</option>
              <option value="503" {{ old('payment_status', $student->payment_status) == '503' ? 'selected' : '' }}>Pago en efectivo</option>
              <option value="501" {{ old('payment_status', $student->payment_status) == '501' ? 'selected' : '' }}>Pago por transferencia</option>
              <option value="500" {{ old('payment_status', $student->payment_status) == '500' ? 'selected' : '' }}>Curso finalizado</option>
              <option value="499" {{ old('payment_status', $student->payment_status) == '499' ? 'selected' : '' }}>Pago con tarjeta</option>
              <option value="485" {{ old('payment_status', $student->payment_status) == '485' ? 'selected' : '' }}>Revisión</option>
              <option value="505" {{ old('payment_status', $student->payment_status) == '505' ? 'selected' : '' }}>Pendiente</option>
            </select>
            @error('payment_status')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-4">
            <label for="user_level" class="form-label">Nivel de Usuario</label>
            <select id="user_level" name="user_level" class="form-select @error('user_level') is-invalid @enderror">
              <option value="" {{ old('user_level', $student->user_level) == '' ? 'selected' : '' }}>Estándar</option>
              <option value="premium" {{ old('user_level', $student->user_level) == 'premium' ? 'selected' : '' }}>Premium</option>
              <option value="vip" {{ old('user_level', $student->user_level) == 'vip' ? 'selected' : '' }}>VIP</option>
            </select>
            @error('user_level')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-6">
            <label for="start_date" class="form-label">Fecha de Inicio</label>
            <input type="date" class="form-control @error('start_date') is-invalid @enderror" id="start_date" name="start_date" value="{{ old('start_date', $student->start_date ? $student->start_date->format('Y-m-d') : '') }}">
            @error('start_date')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-6">
            <label for="end_date" class="form-label">Fecha de Fin</label>
            <input type="date" class="form-control @error('end_date') is-invalid @enderror" id="end_date" name="end_date" value="{{ old('end_date', $student->end_date ? $student->end_date->format('Y-m-d') : '') }}">
            @error('end_date')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-12 mt-4">
            <button type="submit" class="btn btn-primary me-2">
              <i class="ri-save-line me-1"></i> Guardar Cambios
            </button>
            <a href="{{ route('admin.students.index') }}" class="btn btn-secondary">
              <i class="ri-close-line me-1"></i> Cancelar
            </a>
          </div>
        </form>

        <!-- Sección de Gestión Contable -->
        <div class="card mt-4">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h6 class="mb-0 fw-bold">Gestión Contable</h6>
            <div>
              <button type="button" class="btn btn-primary btn-sm me-2" 
                      data-bs-toggle="modal" 
                      data-bs-target="#sendEmailModal"
                      data-student-id="{{ $student->id }}"
                      data-identifier="invoice"
                      onclick="loadEmailTemplate(this)">
                <i class="ri-file-paper-line me-1"></i> Generar Factura
              </button>
              <button type="button" class="btn btn-warning btn-sm"
                      data-bs-toggle="modal"
                      data-bs-target="#paymentOrderModal"
                      data-student-id="{{ $student->id }}">
                <i class="ri-bank-card-line me-1"></i> Orden de Pago
              </button>
            </div>
          </div>
          <div class="card-body">
            <!-- Resumen Contable -->
            <div class="row mb-4">
              <div class="col-md-4">
                <div class="card bg-info text-white">
                  <div class="card-body text-center py-2">
                    <h6 class="card-title mb-1">Balance Actual</h6>
                    <h4 class="mb-0">€{{ number_format($student->current_balance, 2) }}</h4>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card bg-success text-white">
                  <div class="card-body text-center py-2">
                    <h6 class="card-title mb-1">Total Pagado</h6>
                    <h5 class="mb-0">€{{ number_format($student->total_credits, 2) }}</h5>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card bg-warning text-white">
                  <div class="card-body text-center py-2">
                    <h6 class="card-title mb-1">Total Cargos</h6>
                    <h5 class="mb-0">€{{ number_format($student->total_debits, 2) }}</h5>
                  </div>
                </div>
              </div>
            </div>

            <!-- Formulario para nuevo asiento -->
            <div class="row">
              <div class="col-12">
                <h6 class="fw-bold">Registrar Nuevo Asiento Contable</h6>
                <hr>
                <form id="accountingEntryForm" class="row g-3">
                  @csrf
                  <input type="hidden" name="student_id" value="{{ $student->id }}">
                  
                  <div class="col-md-3">
                    <label for="entry_date" class="form-label">Fecha <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" id="entry_date" name="entry_date" value="{{ date('Y-m-d') }}" required>
                  </div>
                  
                  <div class="col-md-3">
                    <label for="entry_type" class="form-label">Tipo <span class="text-danger">*</span></label>
                    <select id="entry_type" name="entry_type" class="form-select" required>
                      <option value="">Seleccionar tipo</option>
                      <option value="payment">Pago</option>
                      <option value="charge">Cargo</option>
                      <option value="adjustment">Ajuste</option>
                      <option value="invoice">Factura</option>
                      <option value="order">Orden</option>
                    </select>
                  </div>
                  
                  <div class="col-md-3">
                    <label for="amount_type" class="form-label">Débito/Crédito <span class="text-danger">*</span></label>
                    <select id="amount_type" name="amount_type" class="form-select" required>
                      <option value="">Seleccionar</option>
                      <option value="debit">Débito (Cargo)</option>
                      <option value="credit">Crédito (Pago)</option>
                    </select>
                  </div>
                  
                  <div class="col-md-3">
                    <label for="amount" class="form-label">Cantidad <span class="text-danger">*</span></label>
                    <div class="input-group">
                      <span class="input-group-text">€</span>
                      <input type="number" step="0.01" class="form-control" id="amount" name="amount" required>
                    </div>
                  </div>
                  
                  <div class="col-md-6">
                    <label for="description" class="form-label">Descripción <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="description" name="description" required>
                  </div>
                  
                  <div class="col-md-6">
                    <label for="reference_number" class="form-label">Referencia</label>
                    <input type="text" class="form-control" id="reference_number" name="reference_number">
                  </div>
                  
                  <div class="col-md-12">
                    <label for="notes" class="form-label">Notas</label>
                    <textarea class="form-control" id="notes" name="notes" rows="2"></textarea>
                  </div>
                  
                  <div class="col-12">
                    <button type="button" class="btn btn-success" id="saveAccountingEntry">
                      <i class="ri-add-line me-1"></i> Registrar Asiento
                    </button>
                  </div>
                </form>
              </div>
            </div>

            <!-- Tabla de asientos existentes -->
            <div class="row mt-4">
              <div class="col-12">
                <h6 class="fw-bold">Historial de Movimientos</h6>
                <hr>
                <div class="table-responsive">
                  <table class="table table-sm table-bordered" id="accountingEntriesTable">
                    <thead>
                      <tr>
                        <th>Fecha</th>
                        <th>Descripción</th>
                        <th>Referencia</th>
                        <th>Débito</th>
                        <th>Crédito</th>
                        <th>Balance</th>
                        <th>Tipo</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($student->accountingEntries as $entry)
                        <tr data-entry-id="{{ $entry->id }}">
                          <td>{{ $entry->entry_date->format('d/m/Y') }}</td>
                          <td>{{ $entry->description }}</td>
                          <td>{{ $entry->reference_number ?? 'N/A' }}</td>
                          <td class="text-danger">
                            @if($entry->debit_amount)
                              €{{ number_format($entry->debit_amount, 2) }}
                            @else
                              -
                            @endif
                          </td>
                          <td class="text-success">
                            @if($entry->credit_amount)
                              €{{ number_format($entry->credit_amount, 2) }}
                            @else
                              -
                            @endif
                          </td>
                          <td class="fw-bold">€{{ number_format($entry->balance, 2) }}</td>
                          <td>
                            <span class="badge bg-secondary">{{ ucfirst($entry->entry_type) }}</span>
                          </td>
                          <td>
                            <button type="button" class="btn btn-sm btn-outline-primary edit-entry" 
                                    data-entry-id="{{ $entry->id }}">
                              <i class="ri-pencil-line"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-danger delete-entry" 
                                    data-entry-id="{{ $entry->id }}">
                              <i class="ri-delete-bin-line"></i>
                            </button>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                  @if($student->accountingEntries->count() == 0)
                    <p class="text-center py-3">No hay movimientos contables registrados.</p>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@include('shared.modals.send-email-modal')

<!-- Modal para Orden de Pago -->
<div class="modal fade" id="paymentOrderModal" tabindex="-1" aria-labelledby="paymentOrderModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="paymentOrderModalLabel">Generar Orden de Pago</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="paymentOrderForm">
          @csrf
          <input type="hidden" id="paymentStudentId" name="student_id">
          
          <div class="mb-3">
            <label for="paymentAmount" class="form-label">Cantidad a Pagar <span class="text-danger">*</span></label>
            <div class="input-group">
              <span class="input-group-text">€</span>
              <input type="number" step="0.01" class="form-control" id="paymentAmount" name="amount" required>
            </div>
          </div>

          <div class="mb-3">
            <label for="paymentDescription" class="form-label">Descripción</label>
            <input type="text" class="form-control" id="paymentDescription" name="description" placeholder="Concepto del pago">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-warning" id="generatePaymentOrderBtn">Generar Orden</button>
      </div>
    </div>
  </div>
</div>

<script>
// Función para cargar plantilla de email
function loadEmailTemplate(button) {
    const studentId = button.dataset.studentId;
    const identifier = button.dataset.identifier;
    
    document.getElementById('modalStudentId').value = studentId;
    document.getElementById('modalIdentifier').value = identifier;
    
    fetch(`/admin/students/${studentId}/get-email-template/${identifier}`)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.getElementById('emailSubject').value = data.subject;
                document.getElementById('emailBody').value = data.body;
            }
        })
        .catch(error => console.error('Error loading template:', error));
}

document.addEventListener('DOMContentLoaded', function() {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    
    // Manejar envío de nuevo asiento contable
    document.getElementById('saveAccountingEntry').addEventListener('click', function() {
        const form = document.getElementById('accountingEntryForm');
        const formData = new FormData(form);
        
        fetch(`/admin/students/${formData.get('student_id')}/accounting-entries`, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            } else {
                alert('Error: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error al procesar la solicitud');
        });
    });

    // Modal para orden de pago
    const paymentOrderModal = document.getElementById('paymentOrderModal');
    const generatePaymentBtn = document.getElementById('generatePaymentOrderBtn');
    
    paymentOrderModal.addEventListener('show.bs.modal', function(event) {
        const button = event.relatedTarget;
        const studentId = button.dataset.studentId;
        document.getElementById('paymentStudentId').value = studentId;
    });
    
    generatePaymentBtn.addEventListener('click', function() {
        const form = document.getElementById('paymentOrderForm');
        const formData = new FormData(form);
        
        fetch(`/admin/students/${formData.get('student_id')}/generate-payment-order`, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                window.open(data.redirect_url, '_blank');
                bootstrap.Modal.getInstance(paymentOrderModal).hide();
                location.reload();
            } else {
                alert('Error al generar la orden de pago: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error al procesar la solicitud');
        });
    });

    // Botones de editar/eliminar asientos
    document.addEventListener('click', function(e) {
        if (e.target.closest('.delete-entry')) {
            const entryId = e.target.closest('.delete-entry').dataset.entryId;
            if (confirm('¿Está seguro de eliminar este asiento contable?')) {
                fetch(`/admin/accounting-entries/${entryId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        location.reload();
                    } else {
                        alert('Error al eliminar: ' + data.message);
                    }
                });
            }
        }
    });
});
</script>
@endsection 