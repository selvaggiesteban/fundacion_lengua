@extends('layouts/contentNavbarLayout')

@section('title', 'PDFs')

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
<div class="row gy-6">
  <!-- Filtro y Botones -->
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <div class="d-flex justify-content-between">
          <div class="filter">
            <label for="filter">Filtrar:</label>
            <select id="filter" class="form-select">
            <option value="General">General</option>
            </select>
          </div>

          <div class="buttons">
            <button class="btn" id="new-article-btn">
              <i class="ri-file-add-line"></i> Nuevo artículo
            </button>
            <button class="btn" id="export-csv-btn">
              <i class="ri-file-download-line"></i> CSV
            </button>
          </div>
        </div>
      </div>

      <!-- Tabla de registros -->
      <div class="table-responsive">
        <table class="table table-sm">
          <thead>
            <tr>
              <th class="text-truncate">Act.</th>
              <th class="text-truncate">Título</th>
              <th class="text-truncate">Sección</th>
              <th class="text-truncate">Orden</th>
            </tr>
          </thead>
          <tbody>
            <!-- Aquí iría el loop para mostrar los registros -->
            <tr>
              <td>
                <!-- Solo un checkbox en la columna Act. -->
                <input type="checkbox" class="form-check-input" id="selectRecord">
              </td>
              <td>
                <!-- Contenido de la columna Título en una fila compacta utilizando d-flex y align-items-center -->
                <div class="d-flex align-items-center justify-content-between">
                  
                  
                  <!-- Nombre, ID y Fecha -->
                  <div class="d-flex align-items-center ms-2">
                    <strong class="me-2">PDF</strong><br>
                    <small class="me-2">[id: 9999]</small><br>
                    <small class="me-2">01/01/0001</small>
                  </div>
                  
                 
                </div>
              </td>
              <td>
                <select class="form-select me-2">
                    <option value="General">General</option>
              </td>
              <td>
                <div class="d-flex justify-content-start align-items-center">
                  
                  <input type="text" class="form-control" placeholder="Orden">
                  <!-- Íconos de acción -->
                  <button class="btn btn-sm" title="Duplicar"><i class="ri-pages-line ri-2x me-2"></i></button>
                  <button class="btn btn-sm" title="Guardar"><i class="ri-save-line ri-2x me-2"></i></button>
                  <button class="btn btn-sm" title="Eliminar"><i class="ri-delete-bin-line ri-2x"></i></button>
                </div>
              </td>
            </tr>
            <!-- Fin del loop de registros -->
             <!-- Aquí iría el loop para mostrar los registros -->
            <tr>
              <td>
                <!-- Solo un checkbox en la columna Act. -->
                <input type="checkbox" class="form-check-input" id="selectRecord">
              </td>
              <td>
                <!-- Contenido de la columna Título en una fila compacta utilizando d-flex y align-items-center -->
                <div class="d-flex align-items-center justify-content-between">
                  
                  
                  <!-- Nombre, ID y Fecha -->
                  <div class="d-flex align-items-center ms-2">
                    <strong class="me-2">PDF</strong><br>
                    <small class="me-2">[id: 9999]</small><br>
                    <small class="me-2">01/01/0001</small>
                  </div>
                  
                 
                </div>
              </td>
              <td>
                <select class="form-select me-2">
                    <option value="General">General</option>
              </td>
              <td>
                <div class="d-flex justify-content-start align-items-center">
                  
                  <input type="text" class="form-control" placeholder="Orden">
                  <!-- Íconos de acción -->
                  <button class="btn btn-sm" title="Duplicar"><i class="ri-pages-line ri-2x me-2"></i></button>
                  <button class="btn btn-sm" title="Guardar"><i class="ri-save-line ri-2x me-2"></i></button>
                  <button class="btn btn-sm" title="Eliminar"><i class="ri-delete-bin-line ri-2x"></i></button>
                </div>
              </td>
            </tr>
            <!-- Fin del loop de registros -->
             <!-- Aquí iría el loop para mostrar los registros -->
            <tr>
              <td>
                <!-- Solo un checkbox en la columna Act. -->
                <input type="checkbox" class="form-check-input" id="selectRecord">
              </td>
              <td>
                <!-- Contenido de la columna Título en una fila compacta utilizando d-flex y align-items-center -->
                <div class="d-flex align-items-center justify-content-between">
                  
                  
                  <!-- Nombre, ID y Fecha -->
                  <div class="d-flex align-items-center ms-2">
                    <strong class="me-2">PDF</strong><br>
                    <small class="me-2">[id: 9999]</small><br>
                    <small class="me-2">01/01/0001</small>
                  </div>
                  
                 
                </div>
              </td>
              <td>
                <select class="form-select me-2">
                    <option value="General">General</option>
              </td>
              <td>
                <div class="d-flex justify-content-start align-items-center">
                  
                  <input type="text" class="form-control" placeholder="Orden">
                  <!-- Íconos de acción -->
                  <button class="btn btn-sm" title="Duplicar"><i class="ri-pages-line ri-2x me-2"></i></button>
                  <button class="btn btn-sm" title="Guardar"><i class="ri-save-line ri-2x me-2"></i></button>
                  <button class="btn btn-sm" title="Eliminar"><i class="ri-delete-bin-line ri-2x"></i></button>
                </div>
              </td>
            </tr>
            <!-- Fin del loop de registros -->
             <!-- Aquí iría el loop para mostrar los registros -->
            <tr>
              <td>
                <!-- Solo un checkbox en la columna Act. -->
                <input type="checkbox" class="form-check-input" id="selectRecord">
              </td>
              <td>
                <!-- Contenido de la columna Título en una fila compacta utilizando d-flex y align-items-center -->
                <div class="d-flex align-items-center justify-content-between">
                  
                  
                  <!-- Nombre, ID y Fecha -->
                  <div class="d-flex align-items-center ms-2">
                    <strong class="me-2">PDF</strong><br>
                    <small class="me-2">[id: 9999]</small><br>
                    <small class="me-2">01/01/0001</small>
                  </div>
                  
                 
                </div>
              </td>
              <td>
                <select class="form-select me-2">
                    <option value="General">General</option>
              </td>
              <td>
                <div class="d-flex justify-content-start align-items-center">
                  
                  <input type="text" class="form-control" placeholder="Orden">
                  <!-- Íconos de acción -->
                  <button class="btn btn-sm" title="Duplicar"><i class="ri-pages-line ri-2x me-2"></i></button>
                  <button class="btn btn-sm" title="Guardar"><i class="ri-save-line ri-2x me-2"></i></button>
                  <button class="btn btn-sm" title="Eliminar"><i class="ri-delete-bin-line ri-2x"></i></button>
                </div>
              </td>
            </tr>
            <!-- Fin del loop de registros -->
             <!-- Aquí iría el loop para mostrar los registros -->
            <tr>
              <td>
                <!-- Solo un checkbox en la columna Act. -->
                <input type="checkbox" class="form-check-input" id="selectRecord">
              </td>
              <td>
                <!-- Contenido de la columna Título en una fila compacta utilizando d-flex y align-items-center -->
                <div class="d-flex align-items-center justify-content-between">
                  
                  
                  <!-- Nombre, ID y Fecha -->
                  <div class="d-flex align-items-center ms-2">
                    <strong class="me-2">PDF</strong><br>
                    <small class="me-2">[id: 9999]</small><br>
                    <small class="me-2">01/01/0001</small>
                  </div>
                  
                 
                </div>
              </td>
              <td>
                <select class="form-select me-2">
                    <option value="General">General</option>
              </td>
              <td>
                <div class="d-flex justify-content-start align-items-center">
                  
                  <input type="text" class="form-control" placeholder="Orden">
                  <!-- Íconos de acción -->
                  <button class="btn btn-sm" title="Duplicar"><i class="ri-pages-line ri-2x me-2"></i></button>
                  <button class="btn btn-sm" title="Guardar"><i class="ri-save-line ri-2x me-2"></i></button>
                  <button class="btn btn-sm" title="Eliminar"><i class="ri-delete-bin-line ri-2x"></i></button>
                </div>
              </td>
            </tr>
            <!-- Fin del loop de registros -->
             <!-- Aquí iría el loop para mostrar los registros -->
            <tr>
              <td>
                <!-- Solo un checkbox en la columna Act. -->
                <input type="checkbox" class="form-check-input" id="selectRecord">
              </td>
              <td>
                <!-- Contenido de la columna Título en una fila compacta utilizando d-flex y align-items-center -->
                <div class="d-flex align-items-center justify-content-between">
                  
                  
                  <!-- Nombre, ID y Fecha -->
                  <div class="d-flex align-items-center ms-2">
                    <strong class="me-2">PDF</strong><br>
                    <small class="me-2">[id: 9999]</small><br>
                    <small class="me-2">01/01/0001</small>
                  </div>
                  
                 
                </div>
              </td>
              <td>
                <select class="form-select me-2">
                    <option value="General">General</option>
              </td>
              <td>
                <div class="d-flex justify-content-start align-items-center">
                  
                  <input type="text" class="form-control" placeholder="Orden">
                  <!-- Íconos de acción -->
                  <button class="btn btn-sm" title="Duplicar"><i class="ri-pages-line ri-2x me-2"></i></button>
                  <button class="btn btn-sm" title="Guardar"><i class="ri-save-line ri-2x me-2"></i></button>
                  <button class="btn btn-sm" title="Eliminar"><i class="ri-delete-bin-line ri-2x"></i></button>
                </div>
              </td>
            </tr>
            <!-- Fin del loop de registros -->
             <!-- Aquí iría el loop para mostrar los registros -->
            <tr>
              <td>
                <!-- Solo un checkbox en la columna Act. -->
                <input type="checkbox" class="form-check-input" id="selectRecord">
              </td>
              <td>
                <!-- Contenido de la columna Título en una fila compacta utilizando d-flex y align-items-center -->
                <div class="d-flex align-items-center justify-content-between">
                  
                  
                  <!-- Nombre, ID y Fecha -->
                  <div class="d-flex align-items-center ms-2">
                    <strong class="me-2">PDF</strong><br>
                    <small class="me-2">[id: 9999]</small><br>
                    <small class="me-2">01/01/0001</small>
                  </div>
                  
                 
                </div>
              </td>
              <td>
                <select class="form-select me-2">
                    <option value="General">General</option>
              </td>
              <td>
                <div class="d-flex justify-content-start align-items-center">
                  
                  <input type="text" class="form-control" placeholder="Orden">
                  <!-- Íconos de acción -->
                  <button class="btn btn-sm" title="Duplicar"><i class="ri-pages-line ri-2x me-2"></i></button>
                  <button class="btn btn-sm" title="Guardar"><i class="ri-save-line ri-2x me-2"></i></button>
                  <button class="btn btn-sm" title="Eliminar"><i class="ri-delete-bin-line ri-2x"></i></button>
                </div>
              </td>
            </tr>
            <!-- Fin del loop de registros -->
             <!-- Aquí iría el loop para mostrar los registros -->
            <tr>
              <td>
                <!-- Solo un checkbox en la columna Act. -->
                <input type="checkbox" class="form-check-input" id="selectRecord">
              </td>
              <td>
                <!-- Contenido de la columna Título en una fila compacta utilizando d-flex y align-items-center -->
                <div class="d-flex align-items-center justify-content-between">
                  
                  
                  <!-- Nombre, ID y Fecha -->
                  <div class="d-flex align-items-center ms-2">
                    <strong class="me-2">PDF</strong><br>
                    <small class="me-2">[id: 9999]</small><br>
                    <small class="me-2">01/01/0001</small>
                  </div>
                  
                 
                </div>
              </td>
              <td>
                <select class="form-select me-2">
                    <option value="General">General</option>
              </td>
              <td>
                <div class="d-flex justify-content-start align-items-center">
                  
                  <input type="text" class="form-control" placeholder="Orden">
                  <!-- Íconos de acción -->
                  <button class="btn btn-sm" title="Duplicar"><i class="ri-pages-line ri-2x me-2"></i></button>
                  <button class="btn btn-sm" title="Guardar"><i class="ri-save-line ri-2x me-2"></i></button>
                  <button class="btn btn-sm" title="Eliminar"><i class="ri-delete-bin-line ri-2x"></i></button>
                </div>
              </td>
            </tr>
            <!-- Fin del loop de registros -->
            <!-- Aquí iría el loop para mostrar los registros -->
            <tr>
              <td>
                <!-- Solo un checkbox en la columna Act. -->
                <input type="checkbox" class="form-check-input" id="selectRecord">
              </td>
              <td>
                <!-- Contenido de la columna Título en una fila compacta utilizando d-flex y align-items-center -->
                <div class="d-flex align-items-center justify-content-between">
                  
                  
                  <!-- Nombre, ID y Fecha -->
                  <div class="d-flex align-items-center ms-2">
                    <strong class="me-2">PDF</strong><br>
                    <small class="me-2">[id: 9999]</small><br>
                    <small class="me-2">01/01/0001</small>
                  </div>
                  
                 
                </div>
              </td>
              <td>
                <select class="form-select me-2">
                    <option value="General">General</option>
              </td>
              <td>
                <div class="d-flex justify-content-start align-items-center">
                  
                  <input type="text" class="form-control" placeholder="Orden">
                  <!-- Íconos de acción -->
                  <button class="btn btn-sm" title="Duplicar"><i class="ri-pages-line ri-2x me-2"></i></button>
                  <button class="btn btn-sm" title="Guardar"><i class="ri-save-line ri-2x me-2"></i></button>
                  <button class="btn btn-sm" title="Eliminar"><i class="ri-delete-bin-line ri-2x"></i></button>
                </div>
              </td>
            </tr>
            <!-- Fin del loop de registros -->
             <!-- Aquí iría el loop para mostrar los registros -->
            <tr>
              <td>
                <!-- Solo un checkbox en la columna Act. -->
                <input type="checkbox" class="form-check-input" id="selectRecord">
              </td>
              <td>
                <!-- Contenido de la columna Título en una fila compacta utilizando d-flex y align-items-center -->
                <div class="d-flex align-items-center justify-content-between">
                  
                  
                  <!-- Nombre, ID y Fecha -->
                  <div class="d-flex align-items-center ms-2">
                    <strong class="me-2">PDF</strong><br>
                    <small class="me-2">[id: 9999]</small><br>
                    <small class="me-2">01/01/0001</small>
                  </div>
                  
                 
                </div>
              </td>
              <td>
                <select class="form-select me-2">
                    <option value="General">General</option>
              </td>
              <td>
                <div class="d-flex justify-content-start align-items-center">
                  
                  <input type="text" class="form-control" placeholder="Orden">
                  <!-- Íconos de acción -->
                  <button class="btn btn-sm" title="Duplicar"><i class="ri-pages-line ri-2x me-2"></i></button>
                  <button class="btn btn-sm" title="Guardar"><i class="ri-save-line ri-2x me-2"></i></button>
                  <button class="btn btn-sm" title="Eliminar"><i class="ri-delete-bin-line ri-2x"></i></button>
                </div>
              </td>
            </tr>
            <!-- Fin del loop de registros -->
          </tbody>
        </table>
      </div>

      <!-- Paginación -->
      <div class="card-footer d-flex justify-content-between">
        <div>
          <button class="btn btn-sm">« Primero</button>
          <button class="btn btn-sm">Anterior</button>
          <span>1 de 100</span>
          <button class="btn btn-sm">Siguiente</button>
          <button class="btn btn-sm">Último »</button>
        </div>
        <div>Total: 9999</div>
      </div>
    </div>
  </div>
</div>
@endsection
