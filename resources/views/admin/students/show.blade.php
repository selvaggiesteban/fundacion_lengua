@extends('layouts/contentNavbarLayout')

@section('title', 'Detalles del Estudiante')

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
        <h5 class="mb-0">Detalles del Estudiante: {{ $student->name }}</h5>
        <div>
          <a href="{{ route('admin.students.edit', $student->id) }}" class="btn btn-primary me-2">
            <i class="ri-pencil-line me-1"></i> Editar
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

        <div class="row">
          <div class="col-12">
            <h6 class="fw-bold">Información General</h6>
            <hr class="mt-0">
          </div>

          <div class="col-md-6 mb-3">
            <label class="form-label fw-bold">Nombre Completo</label>
            <div>{{ $student->name }}</div>
          </div>

          <div class="col-md-6 mb-3">
            <label class="form-label fw-bold">Email</label>
            <div><a href="mailto:{{ $student->email }}">{{ $student->email }}</a></div>
          </div>

          <div class="col-md-4 mb-3">
            <label class="form-label fw-bold">Pasaporte/DNI</label>
            <div>{{ $student->passport }}</div>
          </div>

          <div class="col-md-4 mb-3">
            <label class="form-label fw-bold">Fecha de Nacimiento</label>
            <div>{{ $student->birthdate ? $student->birthdate->format('d/m/Y') : 'No especificada' }}</div>
          </div>

          <div class="col-md-4 mb-3">
            <label class="form-label fw-bold">Género</label>
            <div>
              @if($student->sex == 'M')
                Masculino
              @elseif($student->sex == 'F')
                Femenino
              @elseif($student->sex == 'O')
                Otro
              @else
                No especificado
              @endif
            </div>
          </div>

          <div class="col-12">
            <h6 class="fw-bold mt-3">Dirección</h6>
            <hr class="mt-0">
          </div>

          <div class="col-md-12 mb-3">
            <label class="form-label fw-bold">Dirección</label>
            <div>{{ $student->address }}</div>
          </div>

          <div class="col-md-4 mb-3">
            <label class="form-label fw-bold">Código Postal</label>
            <div>{{ $student->postal_code }}</div>
          </div>

          <div class="col-md-4 mb-3">
            <label class="form-label fw-bold">Ciudad</label>
            <div>{{ $student->city }}</div>
          </div>

          <div class="col-md-4 mb-3">
            <label class="form-label fw-bold">Provincia</label>
            <div>{{ $student->province }}</div>
          </div>

          <div class="col-md-4 mb-3">
            <label class="form-label fw-bold">País</label>
            <div>{{ $student->country }}</div>
          </div>

          <div class="col-md-4 mb-3">
            <label class="form-label fw-bold">Teléfono</label>
            <div>{{ $student->phone }}</div>
          </div>

          <div class="col-12">
            <h6 class="fw-bold mt-3">Información Académica</h6>
            <hr class="mt-0">
          </div>

          <div class="col-md-4 mb-3">
            <label class="form-label fw-bold">Idioma Principal</label>
            <div>
              @switch($student->language)
                @case('spanish')
                  Español
                  @break
                @case('english')
                  Inglés
                  @break
                @case('french')
                  Francés
                  @break
                @case('german')
                  Alemán
                  @break
                @case('italian')
                  Italiano
                  @break
                @case('other')
                  Otro
                  @break
                @default
                  No especificado
              @endswitch
            </div>
          </div>

          <div class="col-md-4 mb-3">
            <label class="form-label fw-bold">Segundo Idioma</label>
            <div>
              @switch($student->second_language)
                @case('spanish')
                  Español
                  @break
                @case('english')
                  Inglés
                  @break
                @case('french')
                  Francés
                  @break
                @case('german')
                  Alemán
                  @break
                @case('italian')
                  Italiano
                  @break
                @case('other')
                  Otro
                  @break
                @default
                  Ninguno
              @endswitch
            </div>
          </div>

          <div class="col-md-4 mb-3">
            <label class="form-label fw-bold">Nivel</label>
            <div>{{ $student->level ?? 'No especificado' }}</div>
          </div>

          <div class="col-md-4 mb-3">
            <label class="form-label fw-bold">Centro</label>
            <div>{{ $student->center }}</div>
          </div>

          <div class="col-md-4 mb-3">
            <label class="form-label fw-bold">Socio/Referencia</label>
            <div>{{ $student->partner ?? 'No especificado' }}</div>
          </div>

          <div class="col-12">
            <h6 class="fw-bold mt-3">Estado y Fechas</h6>
            <hr class="mt-0">
          </div>

          <div class="col-md-4 mb-3">
            <label class="form-label fw-bold">Estado</label>
            <div>
              @if($student->status === 'active')
                <span class="badge bg-success">Activo</span>
              @else
                <span class="badge bg-danger">Inactivo</span>
              @endif
            </div>
          </div>

          <div class="col-md-4 mb-3">
            <label class="form-label fw-bold">Estado de Pago</label>
            <div>{{ $student->payment_status_text ?? 'No especificado' }}</div>
          </div>

          <div class="col-md-4 mb-3">
            <label class="form-label fw-bold">Nivel de Usuario</label>
            <div>
              @if($student->user_level == 'premium')
                <span class="badge bg-primary">Premium</span>
              @elseif($student->user_level == 'vip')
                <span class="badge bg-warning">VIP</span>
              @else
                <span class="badge bg-secondary">Estándar</span>
              @endif
            </div>
          </div>

          <div class="col-md-6 mb-3">
            <label class="form-label fw-bold">Fecha de Inicio</label>
            <div>{{ $student->start_date ? $student->start_date->format('d/m/Y') : 'No especificada' }}</div>
          </div>

          <div class="col-md-6 mb-3">
            <label class="form-label fw-bold">Fecha de Fin</label>
            <div>{{ $student->end_date ? $student->end_date->format('d/m/Y') : 'No especificada' }}</div>
          </div>

          <div class="col-12">
            <h6 class="fw-bold mt-3">Becas Asociadas</h6>
            <hr class="mt-0">
          </div>

          <div class="col-md-12 mb-3">
            <div>
              @if($student->scholarships && $student->scholarships->count() > 0)
                <div class="table-responsive">
                  <table class="table table-sm table-bordered">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Sección</th>
                        <th>Código de Descuento</th>
                        <th>Acción</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($student->scholarships as $scholarship)
                        <tr>
                          <td>{{ $scholarship->id }}</td>
                          <td>{{ $scholarship->title }}</td>
                          <td>{{ $scholarship->section_text }}</td>
                          <td>{{ $scholarship->discount_code ?? 'N/A' }}</td>
                          <td>
                            <a href="{{ route('admin.scholarships.show', $scholarship->id) }}" class="btn btn-sm btn-info">
                              <i class="ri-eye-line"></i>
                            </a>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              @else
                <p>No hay becas asociadas a este estudiante.</p>
              @endif
            </div>
          </div>

          <div class="col-12">
            <h6 class="fw-bold mt-3">Alojamientos Asignados</h6>
            <hr class="mt-0">
          </div>

          <div class="col-md-12 mb-3">
            <div>
              @if($student->accomodations && $student->accomodations->count() > 0)
                <div class="table-responsive">
                  <table class="table table-sm table-bordered">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Tipo</th>
                        <th>Dirección</th>
                        <th>Contacto</th>
                        <th>Acción</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($student->accomodations as $accommodation)
                        <tr>
                          <td>{{ $accommodation->id }}</td>
                          <td>{{ $accommodation->name }}</td>
                          <td>{{ $accommodation->section_text }}</td>
                          <td>{{ $accommodation->address }}, {{ $accommodation->city }}</td>
                          <td>{{ $accommodation->contact1_name }}</td>
                          <td>
                            <a href="{{ route('admin.accomodations.show', $accommodation->id) }}" class="btn btn-sm btn-info">
                              <i class="ri-eye-line"></i>
                            </a>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              @else
                <p>No hay alojamientos asignados a este estudiante.</p>
              @endif
            </div>
          </div>

          <div class="col-12">
            <h6 class="fw-bold mt-3">Estado Contable</h6>
            <hr class="mt-0">
          </div>

          <div class="col-md-12 mb-3">
            <div class="row">
              <div class="col-md-3">
                <div class="card bg-info text-white">
                  <div class="card-body text-center">
                    <h5 class="card-title">Balance Actual</h5>
                    <h3>€{{ number_format($student->current_balance, 2) }}</h3>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card bg-success text-white">
                  <div class="card-body text-center">
                    <h5 class="card-title">Total Pagado</h5>
                    <h4>€{{ number_format($student->total_credits, 2) }}</h4>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card bg-warning text-white">
                  <div class="card-body text-center">
                    <h5 class="card-title">Total Cargos</h5>
                    <h4>€{{ number_format($student->total_debits, 2) }}</h4>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="text-center">
                  <button type="button" class="btn btn-primary mb-2 w-100" 
                          data-bs-toggle="modal" 
                          data-bs-target="#sendEmailModal"
                          data-student-id="{{ $student->id }}"
                          data-identifier="invoice"
                          onclick="loadEmailTemplate(this)">
                    <i class="ri-file-paper-line me-1"></i> Generar Factura
                  </button>
                  <button type="button" class="btn btn-warning w-100"
                          data-bs-toggle="modal"
                          data-bs-target="#paymentOrderModal"
                          data-student-id="{{ $student->id }}">
                    <i class="ri-bank-card-line me-1"></i> Orden de Pago
                  </button>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-12 mb-3">
            <div>
              @if($student->accountingEntries && $student->accountingEntries->count() > 0)
                <div class="table-responsive">
                  <table class="table table-sm table-bordered">
                    <thead>
                      <tr>
                        <th>Fecha</th>
                        <th>Descripción</th>
                        <th>Referencia</th>
                        <th>Débito</th>
                        <th>Crédito</th>
                        <th>Balance</th>
                        <th>Tipo</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($student->accountingEntries as $entry)
                        <tr>
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
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              @else
                <p>No hay movimientos contables registrados para este estudiante.</p>
              @endif
            </div>
          </div>

          <div class="col-12 mt-4">
            <a href="{{ route('admin.students.edit', $student->id) }}" class="btn btn-primary me-2">
              <i class="ri-pencil-line me-1"></i> Editar
            </a>
            <a href="{{ route('admin.students.index') }}" class="btn btn-secondary">
              <i class="ri-arrow-left-line me-1"></i> Volver al Listado
            </a>
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
// Función para cargar plantilla de email (reutiliza la funcionalidad existente)
function loadEmailTemplate(button) {
    const studentId = button.dataset.studentId;
    const identifier = button.dataset.identifier;
    
    document.getElementById('modalStudentId').value = studentId;
    document.getElementById('modalIdentifier').value = identifier;
    
    // Cargar plantilla via AJAX (similar al comportamiento existente)
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

// Función para generar orden de pago
document.addEventListener('DOMContentLoaded', function() {
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
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                window.open(data.redirect_url, '_blank');
                bootstrap.Modal.getInstance(paymentOrderModal).hide();
                location.reload(); // Recargar para mostrar nuevo asiento contable
            } else {
                alert('Error al generar la orden de pago: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error al procesar la solicitud');
        });
    });
});
</script>
@endsection 