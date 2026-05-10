@extends('layouts/contentNavbarLayout')

@section('title', 'Estudiantes')

@section('vendor-style')
<style>
.student-name-tooltip {
  cursor: pointer;
  color: inherit; /* Mantiene el color original del texto */
  text-decoration: none; /* Sin subrayado */
}

.student-name-tooltip:hover {
  color: inherit; /* No cambia color al hacer hover */
  text-decoration: none; /* Sin subrayado al hacer hover */
}

.student-tooltip-popup {
  display: none;
  max-width: 400px;
  background: white;
  border: 1px solid #dee2e6;
  border-radius: 8px;
  box-shadow: 0 8px 25px rgba(0,0,0,0.15);
  font-size: 12px;
  z-index: 9999;
}

.custom-student-popup .popup-header {
  background-color: #e60000; /* Color rojo específico */
  color: white;
  padding: 10px 15px;
  border-radius: 7px 7px 0 0;
  font-size: 14px;
  font-weight: bold;
}

.custom-student-popup .popup-body {
  padding: 12px 15px;
  line-height: 1.4;
}

.custom-student-popup .popup-body div {
  margin-bottom: 4px;
  padding: 1px 0;
}

.custom-student-popup .popup-body strong {
  color: #333;
  font-weight: 600;
  display: inline-block;
  min-width: 140px;
}

.custom-student-popup .popup-body div:last-child {
  margin-bottom: 0;
}
</style>
@endsection

@section('vendor-script')
@endsection

@section('page-script')
<script>
// Esperar a que jQuery esté disponible
function initStudentTooltips() {
    if (typeof $ !== 'undefined') {
        console.log('jQuery disponible - inicializando tooltips');
        
        // Crear tooltip personalizado usando eventos separados
        $('.student-name-tooltip').on('mouseenter', function() {
            console.log('Mouse enter (jQuery)');
            
            // Eliminar cualquier tooltip existente
            $('#student-tooltip').remove();
            
            const element = $(this);
            const data = element.data();
            
            // Construir el contenido HTML del tooltip
            const tooltipContent = `
                <div class="custom-student-popup">
                    <div class="popup-header">
                        <strong>${data.studentName}</strong>
                    </div>
                    <div class="popup-body">
                        <div><strong>Correo electrónico:</strong> ${data.studentEmail}</div>
                        <div><strong>Teléfono:</strong> ${data.studentPhone}</div>
                        <div><strong>Pasaporte:</strong> ${data.studentPassport}</div>
                        <div><strong>Dirección:</strong> ${data.studentAddress}</div>
                        <div><strong>País:</strong> ${data.studentCountry}</div>
                        <div><strong>C.P.:</strong> ${data.studentPostal}</div>
                        <div><strong>Ciudad:</strong> ${data.studentCity}</div>
                        <div><strong>Provincia:</strong> ${data.studentProvince}</div>
                        <div><strong>Su idioma:</strong> ${data.studentLanguage}</div>
                        <div><strong>Su segundo idioma:</strong> ${data.studentSecondLanguage}</div>
                        <div><strong>Nivel de español:</strong> ${data.studentLevel}</div>
                        <div><strong>Nombre del Centro:</strong> ${data.studentCenter}</div>
                        <div><strong>Fecha de nacimiento:</strong> ${data.studentBirthdate}</div>
                        <div><strong>Sexo:</strong> ${data.studentSex}</div>
                        <div><strong>Notas:</strong> ${data.studentNotes}</div>
                        <div><strong>Alojamientos:</strong> ${data.studentAccommodations}</div>
                    </div>
                </div>
            `;
            
            // Crear elemento tooltip
            const tooltip = $('<div id="student-tooltip" class="student-tooltip-popup">' + tooltipContent + '</div>');
            
            // Agregar evento para cerrar cuando el mouse salga del tooltip
            tooltip.on('mouseleave', function() {
                console.log('Mouse leave tooltip (jQuery)');
                $(this).fadeOut(100, function() {
                    $(this).remove();
                });
            });
            
            $('body').append(tooltip);
            
            // Posicionar tooltip
            const offset = element.offset();
            tooltip.css({
                position: 'absolute',
                top: offset.top - tooltip.outerHeight() - 10,
                left: offset.left + (element.outerWidth() / 2) - (tooltip.outerWidth() / 2),
                zIndex: 9999
            });
            
            tooltip.fadeIn(200);
        });
        
        $('.student-name-tooltip').on('mouseleave', function() {
            console.log('Mouse leave element (jQuery)');
            
            // Delay para permitir mover el mouse al tooltip
            setTimeout(function() {
                const tooltip = $('#student-tooltip');
                if (tooltip.length && !tooltip.is(':hover')) {
                    tooltip.fadeOut(100, function() {
                        $(this).remove();
                    });
                }
            }, 100);
        });
    } else {
        // Fallback con vanilla JavaScript
        console.log('jQuery no disponible - usando vanilla JavaScript');
        initVanillaTooltips();
    }
}

function initVanillaTooltips() {
    const tooltipElements = document.querySelectorAll('.student-name-tooltip');
    
    tooltipElements.forEach(element => {
        element.addEventListener('mouseenter', function() {
            console.log('Mouse enter (vanilla)');
            
            // Eliminar cualquier tooltip existente primero
            removeExistingTooltip();
            
            // Obtener datos del elemento
            const data = this.dataset;
            
            // Construir contenido
            const tooltipContent = `
                <div class="custom-student-popup">
                    <div class="popup-header">
                        <strong>${data.studentName}</strong>
                    </div>
                    <div class="popup-body">
                        <div><strong>Correo electrónico:</strong> ${data.studentEmail}</div>
                        <div><strong>Teléfono:</strong> ${data.studentPhone}</div>
                        <div><strong>Pasaporte:</strong> ${data.studentPassport}</div>
                        <div><strong>Dirección:</strong> ${data.studentAddress}</div>
                        <div><strong>País:</strong> ${data.studentCountry}</div>
                        <div><strong>C.P.:</strong> ${data.studentPostal}</div>
                        <div><strong>Ciudad:</strong> ${data.studentCity}</div>
                        <div><strong>Provincia:</strong> ${data.studentProvince}</div>
                        <div><strong>Su idioma:</strong> ${data.studentLanguage}</div>
                        <div><strong>Su segundo idioma:</strong> ${data.studentSecondLanguage}</div>
                        <div><strong>Nivel de español:</strong> ${data.studentLevel}</div>
                        <div><strong>Nombre del Centro:</strong> ${data.studentCenter}</div>
                        <div><strong>Fecha de nacimiento:</strong> ${data.studentBirthdate}</div>
                        <div><strong>Sexo:</strong> ${data.studentSex}</div>
                        <div><strong>Notas:</strong> ${data.studentNotes}</div>
                        <div><strong>Alojamientos:</strong> ${data.studentAccommodations}</div>
                    </div>
                </div>
            `;
            
            // Crear tooltip
            const tooltip = document.createElement('div');
            tooltip.id = 'student-tooltip';
            tooltip.className = 'student-tooltip-popup';
            tooltip.innerHTML = tooltipContent;
            tooltip.style.display = 'block';
            
            // Agregar evento para cerrar el tooltip cuando el mouse salga del tooltip mismo
            tooltip.addEventListener('mouseleave', function() {
                console.log('Mouse leave tooltip');
                removeExistingTooltip();
            });
            
            document.body.appendChild(tooltip);
            
            // Posicionar
            const rect = this.getBoundingClientRect();
            const tooltipRect = tooltip.getBoundingClientRect();
            
            tooltip.style.position = 'absolute';
            tooltip.style.top = (window.scrollY + rect.top - tooltipRect.height - 10) + 'px';
            tooltip.style.left = (window.scrollX + rect.left + (rect.width / 2) - (tooltipRect.width / 2)) + 'px';
            tooltip.style.zIndex = '9999';
        });
        
        element.addEventListener('mouseleave', function() {
            console.log('Mouse leave element');
            
            // Delay para permitir mover el mouse al tooltip
            setTimeout(function() {
                const tooltip = document.getElementById('student-tooltip');
                if (tooltip && !tooltip.matches(':hover')) {
                    removeExistingTooltip();
                }
            }, 100);
        });
    });
}

function removeExistingTooltip() {
    const existingTooltip = document.getElementById('student-tooltip');
    if (existingTooltip) {
        existingTooltip.remove();
        console.log('Tooltip removed');
    }
}

// Intentar inicializar cuando el DOM esté listo
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM cargado');
    // Esperar un poco para que jQuery se cargue
    setTimeout(initStudentTooltips, 100);
});

// También intentar cuando jQuery esté disponible
if (typeof $ !== 'undefined') {
    $(document).ready(initStudentTooltips);
} else {
    // Polling para esperar jQuery
    let attempts = 0;
    const checkJQuery = setInterval(function() {
        attempts++;
        if (typeof $ !== 'undefined') {
            clearInterval(checkJQuery);
            $(document).ready(initStudentTooltips);
        } else if (attempts > 50) { // 5 segundos máximo
            clearInterval(checkJQuery);
            initVanillaTooltips();
        }
    }, 100);
}
</script>
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Administración /</span> Estudiantes
</h4>

<!-- Estudiantes List Table -->
<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="mb-0">Gestión de Estudiantes</h5>
    <a href="{{ route('admin.students.create') }}" class="btn btn-primary">
      <i class="ri-add-line me-1"></i> Nuevo Estudiante
    </a>
  </div>
  <div class="card-datatable table-responsive">
    <table class="datatables-students table border-top">
      <thead>
        <tr>
          <th>ID</th>
          <th>Acciones</th>
          <th>Nombre</th>
          <th>Email</th>
          <th>Teléfono</th>
          <th>Estado</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($students as $student)
        <tr>
          <td>{{ $student->id }}</td>
          <td>
            <div class="d-flex me-3">
              @if($student->accomodations->count() > 0)
                <i class="ri-home-9-fill text-success me-2" 
                   title="Alojamiento asignado: {{ $student->accomodations->pluck('name')->implode(', ') }}" 
                   style="font-size: 1.2em; align-self: center;"></i>
              @else
                <i class="ri-home-9-fill text-muted me-2" 
                   title="Sin alojamiento asignado" 
                   style="font-size: 1.2em; align-self: center;"></i>
              @endif
              <button class="btn btn-sm btn-danger text-white email-button" 
                      data-student-id="{{ $student->id }}" 
                      data-identifier="DAT" 
                      title="Enviar datos del curso de español">DAT</button>
              <button class="btn btn-sm btn-danger text-white email-button" 
                      data-student-id="{{ $student->id }}" 
                      data-identifier="REG" 
                      title="Enviar confirmación de pago e inscripción">REG</button>
              <button class="btn btn-sm btn-danger text-white email-button" 
                      data-student-id="{{ $student->id }}" 
                      data-identifier="CER" 
                      title="Enviar certificado de estudios en España">CER</button>
              <button class="btn btn-sm btn-danger text-white email-button" 
                      data-student-id="{{ $student->id }}" 
                      data-identifier="REC" 
                      title="Enviar recordatorio de inscripción">REC</button>
              <button class="btn btn-sm" title="Imprimir registro"><i class="ri-printer-line"></i></button>
            </div>
          </td>
          <td>
            <span class="student-name-tooltip" 
                  data-student-name="{{ $student->name }}"
                  data-student-email="{{ $student->email ?: 'N/A' }}"
                  data-student-phone="{{ $student->phone ?: 'N/A' }}"
                  data-student-passport="{{ $student->passport ?: 'N/A' }}"
                  data-student-address="{{ $student->address ?: 'N/A' }}"
                  data-student-country="{{ $student->country ?: 'N/A' }}"
                  data-student-postal="{{ $student->postal_code ?: 'N/A' }}"
                  data-student-city="{{ $student->city ?: 'N/A' }}"
                  data-student-province="{{ $student->province ?: 'N/A' }}"
                  data-student-language="{{ $student->language ?: 'N/A' }}"
                  data-student-second-language="{{ $student->second_language ?: 'N/A' }}"
                  data-student-level="{{ $student->level ?: 'N/A' }}"
                  data-student-center="{{ $student->center ?: 'N/A' }}"
                  data-student-birthdate="{{ $student->birthdate ? $student->birthdate->format('d/m/Y') : 'N/A' }}"
                  data-student-sex="{{ $student->sex ?: 'N/A' }}"
                  data-student-notes="{{ $student->partner ?: 'N/A' }}"
                  data-student-accommodations="{{ $student->accomodations->pluck('name')->implode(', ') ?: 'Ninguno' }}">
              {{ $student->name }}
            </span>
          </td>
          <td>{{ $student->email }}</td>
          <td>{{ $student->phone }}</td>
          <td>
            @if($student->status == 'active')
              <span class="badge bg-success">Activo</span>
            @else
              <span class="badge bg-secondary">Inactivo</span>
            @endif
          </td>
          <td>
            <div class="d-inline-block">
              <a href="{{ route('admin.students.show', $student->id) }}" class="btn btn-sm btn-icon">
                <i class="ri-eye-line"></i>
              </a>
              <a href="{{ route('admin.students.edit', $student->id) }}" class="btn btn-sm btn-icon">
                <i class="ri-pencil-line"></i>
              </a>
              <form action="{{ route('admin.students.destroy', $student->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="button" class="btn btn-sm btn-icon delete-record" data-id="{{ $student->id }}">
                  <i class="ri-delete-bin-line"></i>
                </button>
              </form>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection

<!-- Pre-cargar plantillas de email -->
<div id="emailTemplatesData" style="display: none;">
  <div class="email-template" data-identifier="DAT" 
       data-subject="Datos del curso de español" 
       data-body="<p>Estimado/a estudiante,</p><p>Le enviamos los datos correspondientes al curso de español.</p><p>Saludos cordiales.</p>"></div>
  <div class="email-template" data-identifier="REG" 
       data-subject="Confirmación de pago e inscripción" 
       data-body="<p>Estimado/a estudiante,</p><p>Confirmamos la recepción de su pago y su inscripción al curso.</p><p>Saludos cordiales.</p>"></div>
  <div class="email-template" data-identifier="CER" 
       data-subject="Certificado de estudios en España" 
       data-body="<p>Estimado/a estudiante,</p><p>Adjuntamos su certificado de estudios en España.</p><p>Saludos cordiales.</p>"></div>
  <div class="email-template" data-identifier="REC" 
       data-subject="Recordatorio de inscripción" 
       data-body="<p>Estimado/a estudiante,</p><p>Le recordamos que debe completar su proceso de inscripción.</p><p>Saludos cordiales.</p>"></div>
</div>

@include('shared.modals.send-email-modal') 