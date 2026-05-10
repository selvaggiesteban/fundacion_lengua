import './bootstrap';

// Importar jQuery y exponerlo globalmente
import $ from 'jquery';
window.$ = window.jQuery = $;

// Importar Bootstrap JS y exponerlo globalmente
import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;

// Importar Menu class
import { Menu } from '../assets/vendor/js/menu.js';
window.Menu = Menu;

// Importar CSS de DataTables
import 'datatables.net-bs5/css/dataTables.bootstrap5.css';
import 'datatables.net-responsive-bs5/css/responsive.bootstrap5.css';
import 'datatables.net-buttons-bs5/css/buttons.bootstrap5.css';

// Importar CSS de Select2
import 'select2/dist/css/select2.css';

// Importar JS de DataTables
import 'datatables.net';
import 'datatables.net-bs5';
import 'datatables.net-responsive';
import 'datatables.net-responsive-bs5';
import 'datatables.net-buttons';
import 'datatables.net-buttons-bs5';

// Importar JS de Select2
import 'select2/dist/js/select2.js';

/*
  Add custom scripts here
*/
import.meta.glob([
  '../assets/img/**',
  // '../assets/json/**',
  '../assets/vendor/fonts/**'
]);
// Importar TinyMCE (para páginas generales)
import tinymce from 'tinymce/tinymce';

// Importar el modelo DOM (necesario para algunos plugins)
import 'tinymce/models/dom';

// Importar el tema (Silver es el más común y moderno)
import 'tinymce/themes/silver';

// Importar el paquete de íconos por defecto
import 'tinymce/icons/default';

// Plugins esenciales de TinyMCE
import 'tinymce/plugins/code';
import 'tinymce/plugins/table';
import 'tinymce/plugins/lists';
import 'tinymce/plugins/link';
import 'tinymce/plugins/image';
import 'tinymce/plugins/media';
import 'tinymce/plugins/wordcount';
import 'tinymce/plugins/help';
import 'tinymce/plugins/emoticons';
import 'tinymce/plugins/fullscreen';
import 'tinymce/plugins/preview';
import 'tinymce/plugins/searchreplace';
import 'tinymce/plugins/autolink';
import 'tinymce/plugins/visualblocks';
import 'tinymce/plugins/charmap';

// Importar Quill.js (SOLO para modales)
import Quill from 'quill';
import 'quill/dist/quill.snow.css'; // Tema Snow (el más común)

// ========================================
// CONFIGURACIONES GLOBALES
// ========================================

const CONFIG = {
  TINYMCE: {
    SKIN_URL: '/build/tinymce/skins/ui/oxide',
    HEIGHT: 450
  },
  QUILL: {
    MIN_HEIGHT: '300px',
    INIT_DELAY: 300
  },
  DATATABLES: {
    LANGUAGE: {
      processing: "Procesando...",
      lengthMenu: "Mostrar _MENU_ registros",
      zeroRecords: "No se encontraron resultados",
      emptyTable: "Ningún dato disponible en esta tabla",
      infoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
      infoFiltered: "(filtrado de un total de _MAX_ registros)",
      search: "Buscar:",
      infoThousands: ",",
      loadingRecords: "Cargando...",
      paginate: {
        first: "Primero",
        last: "Último",
        next: "Siguiente",
        previous: "Anterior"
      },
      aria: {
        sortAscending: ": Activar para ordenar la columna de manera ascendente",
        sortDescending: ": Activar para ordenar la columna de manera descendente"
      },
      buttons: {
        copy: "Copiar",
        colvis: "Visibilidad",
        collection: "Colección",
        colvisRestore: "Restaurar visibilidad",
        copyKeys: "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br /> <br /> Para cancelar, haga clic en este mensaje o presione escape.",
        copySuccess: {
          1: "Copiada 1 fila al portapapeles",
          _: "Copiadas %ds fila al portapapeles"
        },
        copyTitle: "Copiar al portapapeles",
        csv: "CSV",
        excel: "Excel",
        pageLength: {
          "-1": "Mostrar todas las filas",
          _: "Mostrar %d filas"
        },
        pdf: "PDF",
        print: "Imprimir"
      },
      info: "Mostrando _START_ a _END_ de _TOTAL_ registros"
    },
    DOM_LAYOUT: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end"f>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>'
  },
  TIMEOUTS: {
    BOOTSTRAP_LOAD: 500,
    QUILL_INIT: 300,
    RETRY: 100
  }
};

// ========================================
// QUILL.JS PARA MODALES Y PÁGINAS - SIN PROBLEMAS DE STANDARDS MODE
// ========================================

// Variables globales para rastrear instancias de Quill
window.modalQuillInstances = new Map();
window.pageQuillInstances = new Map();

// Función para inicializar Quill específicamente para modales
function initModalQuill(textareaId, callback) {
  console.log('Initializing Quill for:', textareaId);
  
  // Usar nuestra función mejorada de destrucción
  destroyModalQuill(textareaId);
  
  // Limpieza adicional: remover cualquier toolbar o contenedor Quill huérfano
  document.querySelectorAll('.ql-toolbar').forEach(toolbar => {
    console.log('Removing orphaned toolbar');
    toolbar.remove();
  });
  
  // Remover contenedores personalizados huérfanos
  document.querySelectorAll(`[id^="quill-"]`).forEach(container => {
    console.log('Removing orphaned container:', container.id);
    container.remove();
  });
  
  // Verificar que el textarea esté visible antes de inicializar
  const textarea = document.getElementById(textareaId);
  if (!textarea) {
    console.error('Textarea not found with id:', textareaId);
    return;
  }
  
  if (!textarea.offsetParent) {
    setTimeout(() => initModalQuill(textareaId, callback), CONFIG.TIMEOUTS.RETRY);
    return;
  }
  
  try {
    // Crear contenedor para Quill
    const quillContainer = document.createElement('div');
    quillContainer.id = `quill-${textareaId}`;
    quillContainer.style.cssText = `
      border: 1px solid #ccc;
      border-radius: 4px;
      background: white;
      min-height: ${CONFIG.QUILL.MIN_HEIGHT};
    `;
    
    // Insertar contenedor después del textarea y ocultar textarea
    textarea.style.display = 'none';
    textarea.parentNode.insertBefore(quillContainer, textarea.nextSibling);
    
    // Configuración de Quill con todas las características necesarias
    const quill = new Quill(quillContainer, {
      theme: 'snow',
      placeholder: 'Escriba el contenido del email...',
      modules: {
        toolbar: [
          [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
          ['bold', 'italic', 'underline', 'strike'],
          [{ 'color': [] }, { 'background': [] }],
          [{ 'list': 'ordered'}, { 'list': 'bullet' }],
          [{ 'indent': '-1'}, { 'indent': '+1' }],
          [{ 'align': [] }],
          ['link', 'image', 'code-block'],
          ['clean']
        ]
      }
    });
    
    // Cargar contenido inicial del textarea
    const initialContent = textarea.value || '';
    if (initialContent) {
      quill.clipboard.dangerouslyPasteHTML(initialContent);
    }
    
    // Sincronizar contenido con textarea
    quill.on('text-change', function() {
      textarea.value = quill.root.innerHTML;
    });
    
    // Guardar instancia
    window.modalQuillInstances.set(textareaId, quill);
    
    console.log('Quill initialized successfully for:', textareaId);
    
    // Ejecutar callback si se proporciona
    if (typeof callback === 'function') {
      callback(quill);
    }
    
    return quill;
    
  } catch (error) {
    console.error('Error initializing Quill:', error);
    
    // Fallback: mostrar textarea normal si Quill falla
    if (textarea) {
      textarea.style.display = 'block';
    }
  }
}

// Función para destruir Quill de modal
function destroyModalQuill(textareaId) {
  console.log('Destroying Quill for:', textareaId);
  
  if (window.modalQuillInstances.has(textareaId)) {
    try {
      const quill = window.modalQuillInstances.get(textareaId);
      
      // Remover instancia de Quill
      if (quill) {
        // Buscar y remover toolbar
        const toolbar = document.querySelector(`.ql-toolbar`);
        if (toolbar) {
          toolbar.remove();
          console.log('Toolbar removed');
        }
        
        // Remover el contenedor de Quill si existe
        if (quill.container && quill.container.parentNode) {
          quill.container.parentNode.removeChild(quill.container);
          console.log('Quill container removed');
        }
      }
      
      // Remover el contenedor personalizado que creamos
      const customContainer = document.getElementById(`quill-${textareaId}`);
      if (customContainer) {
        customContainer.remove();
        console.log('Custom container removed');
      }
      
      // Limpiar del Map
      window.modalQuillInstances.delete(textareaId);
      
      // Mostrar textarea original
      const textarea = document.getElementById(textareaId);
      if (textarea) {
        textarea.style.display = 'block';
        console.log('Textarea restored');
      }
      
      console.log('Quill destroyed successfully');
    } catch (error) {
      console.error('Error destroying Quill:', error);
    }
  } else {
    console.log('No Quill instance found for:', textareaId);
  }
}

// Función para obtener contenido de Quill de modal
function getModalQuillContent(textareaId) {
  const quill = window.modalQuillInstances.get(textareaId);
  if (quill) {
    return quill.root.innerHTML;
  }
  
  // Fallback al textarea
  const textarea = document.getElementById(textareaId);
  return textarea ? textarea.value : '';
}

// Función para establecer contenido en Quill de modal
function setModalQuillContent(textareaId, content) {
  const quill = window.modalQuillInstances.get(textareaId);
  if (quill) {
    quill.clipboard.dangerouslyPasteHTML(content);
    // También actualizar textarea
    const textarea = document.getElementById(textareaId);
    if (textarea) {
      textarea.value = content;
    }
  } else {
    // Fallback al textarea
    const textarea = document.getElementById(textareaId);
    if (textarea) {
      textarea.value = content;
    }
  }
}

// ========================================
// QUILL.JS PARA PÁGINAS NORMALES (NO MODALES)
// ========================================

// Función para inicializar Quill específicamente para páginas normales
function initPageQuill(textareaId, callback) {
  console.log('Initializing Quill for page:', textareaId);
  
  // Usar nuestra función mejorada de destrucción
  destroyPageQuill(textareaId);
  
  // Verificar que el textarea esté disponible
  const textarea = document.getElementById(textareaId);
  if (!textarea) {
    console.error('Textarea not found with id:', textareaId);
    return;
  }
  
  try {
    // Crear contenedor para Quill
    const quillContainer = document.createElement('div');
    quillContainer.id = `quill-page-${textareaId}`;
    quillContainer.style.cssText = `
      border: 1px solid #d1d5db;
      border-radius: 6px;
      background: white;
      min-height: 400px;
    `;
    
    // Insertar contenedor después del textarea y ocultar textarea
    textarea.style.display = 'none';
    textarea.parentNode.insertBefore(quillContainer, textarea.nextSibling);
    
    // Configuración de Quill con todas las características necesarias
    const quill = new Quill(quillContainer, {
      theme: 'snow',
      placeholder: 'Escriba el contenido del email aquí...',
      modules: {
        toolbar: [
          [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
          ['bold', 'italic', 'underline', 'strike'],
          [{ 'color': [] }, { 'background': [] }],
          [{ 'list': 'ordered'}, { 'list': 'bullet' }],
          [{ 'indent': '-1'}, { 'indent': '+1' }],
          [{ 'align': [] }],
          ['link', 'image', 'code-block'],
          ['clean']
        ]
      }
    });
    
    // Cargar contenido inicial del textarea
    const initialContent = textarea.value || '';
    if (initialContent.trim()) {
      quill.clipboard.dangerouslyPasteHTML(initialContent);
    }
    
    // Sincronizar contenido con textarea
    quill.on('text-change', function() {
      textarea.value = quill.root.innerHTML;
    });
    
    // Asegurar sincronización antes del envío del formulario
    const form = textarea.closest('form');
    if (form) {
      form.addEventListener('submit', function() {
        textarea.value = quill.root.innerHTML;
      });
    }
    
    // Guardar instancia
    window.pageQuillInstances.set(textareaId, quill);
    
    console.log('Quill initialized successfully for page:', textareaId);
    
    // Ejecutar callback si se proporciona
    if (typeof callback === 'function') {
      callback(quill);
    }
    
    return quill;
    
  } catch (error) {
    console.error('Error initializing Quill for page:', error);
    
    // Fallback: mostrar textarea normal si Quill falla
    if (textarea) {
      textarea.style.display = 'block';
    }
  }
}

// Función para destruir Quill de página
function destroyPageQuill(textareaId) {
  console.log('Destroying Quill for page:', textareaId);
  
  if (window.pageQuillInstances.has(textareaId)) {
    try {
      const quill = window.pageQuillInstances.get(textareaId);
      
      // Remover instancia de Quill
      if (quill && quill.container && quill.container.parentNode) {
        quill.container.parentNode.removeChild(quill.container);
        console.log('Quill container removed for page');
      }
      
      // Remover el contenedor personalizado que creamos
      const customContainer = document.getElementById(`quill-page-${textareaId}`);
      if (customContainer) {
        customContainer.remove();
        console.log('Custom container removed for page');
      }
      
      // Limpiar del Map
      window.pageQuillInstances.delete(textareaId);
      
      // Mostrar textarea original
      const textarea = document.getElementById(textareaId);
      if (textarea) {
        textarea.style.display = 'block';
        console.log('Textarea restored for page');
      }
      
      console.log('Quill destroyed successfully for page');
    } catch (error) {
      console.error('Error destroying Quill for page:', error);
    }
  } else {
    console.log('No Quill instance found for page:', textareaId);
  }
}

// Función para obtener contenido de Quill de página
function getPageQuillContent(textareaId) {
  const quill = window.pageQuillInstances.get(textareaId);
  if (quill) {
    return quill.root.innerHTML;
  }
  
  // Fallback al textarea
  const textarea = document.getElementById(textareaId);
  return textarea ? textarea.value : '';
}

// Función para establecer contenido en Quill de página
function setPageQuillContent(textareaId, content) {
  const quill = window.pageQuillInstances.get(textareaId);
  if (quill) {
    quill.clipboard.dangerouslyPasteHTML(content);
    // También actualizar textarea
    const textarea = document.getElementById(textareaId);
    if (textarea) {
      textarea.value = content;
    }
  } else {
    // Fallback al textarea
    const textarea = document.getElementById(textareaId);
    if (textarea) {
      textarea.value = content;
    }
  }
}

// ========================================
// MODULAR JAVASCRIPT FUNCTIONALITY
// ========================================

document.addEventListener('DOMContentLoaded', function() {
  // Verificar que Bootstrap esté disponible
  if (typeof window.bootstrap === 'undefined') {
    setTimeout(() => {
      initializeApp();
    }, CONFIG.TIMEOUTS.BOOTSTRAP_LOAD);
    return;
  }
  
  initializeApp();
});

function initializeApp() {
  
  // Initialize Quill.js for email template pages instead of TinyMCE
  if (document.querySelector('textarea#body') && 
      (window.location.pathname.includes('/email-templates/') || 
       window.location.pathname.includes('/email_templates/'))) {
    console.log('Email template page detected, initializing Quill.js');
    
    // Wait a bit for DOM to be fully ready
    setTimeout(() => {
      initPageQuill('body', function(editor) {
        console.log('Quill.js initialized for email template page');
      });
    }, 100);
  }
  
  // Initialize TinyMCE for other general textareas (not modal ones and not email templates)
  else if (document.querySelector('textarea#body')) {
    console.log('General page detected, initializing TinyMCE');
    tinymce.init({
      selector: 'textarea#body',
      skin_url: '/build/tinymce/skins/ui/oxide',
      plugins: 'code table lists link image media wordcount help emoticons fullscreen preview searchreplace autolink visualblocks charmap',
      toolbar: 'undo redo | blocks | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | outdent indent | bullist numlist | link image media | forecolor backcolor removeformat | emoticons charmap | code | fullscreen preview | help',
      menubar: 'file edit view insert format tools table help',
      height: 450,
      setup: function (editor) {
        editor.on('change', function () {
          editor.save();
        });
      }
    });
  }
  
  // Initialize DataTables for different pages
  initDataTables();
  
  // Initialize delete functionality
  initDeleteButtons();
  
  // Initialize email functionality
  initEmailFunctionality();
  
  // Initialize modals
  initModalHandlers();
  
  // MANEJADOR DE BOTONES DE EMAIL - Usando Bootstrap estándar
  $(document).on('click', '.email-button', function(e) {
    e.preventDefault();
    e.stopPropagation();
    
    console.log('Email button clicked');
    
    const identifier = $(this).data('identifier');
    const studentId = $(this).data('student-id');
    const template = $(`.email-template[data-identifier="${identifier}"]`);
    
    // Poblar campos del modal
    if (template.length) {
      $('#modalStudentId').val(studentId);
      $('#modalIdentifier').val(identifier);
      $('#emailSubject').val(template.data('subject'));
      $('#emailBody').val(template.data('body'));
    }
    
    // Abrir modal usando Bootstrap estándar
    const modalElement = document.getElementById('sendEmailModal');
    if (modalElement && window.bootstrap) {
      const modal = new window.bootstrap.Modal(modalElement);
      modal.show();
    } else if (modalElement) {
      // Fallback para cuando Bootstrap no esté disponible todavía
      console.log('Bootstrap not ready, using data attributes');
      modalElement.setAttribute('style', 'display: block');
      modalElement.classList.add('show');
    } else {
      console.error('Modal element not found!');
    }
  });
  
  // Función manual de cerrar removida - ahora usamos eventos estándar de Bootstrap
  
  // MANEJADORES DE MODALES CON BOOTSTRAP EVENTS
  
  // Usar eventos estándar de Bootstrap en lugar de MutationObserver
  $(document).on('shown.bs.modal', '#sendEmailModal', function() {
    console.log('Modal shown event fired');
    const modalElement = this;
    
    // Destruir cualquier instancia previa
    destroyModalQuill('emailBody');
    
    setTimeout(() => {
      try {
        initModalQuill('emailBody', function(editor) {
          console.log('Quill initialized successfully');
          
          // Cargar contenido de plantilla
          const identifier = $('#modalIdentifier').val();
          if (identifier) {
            const template = $(`.email-template[data-identifier="${identifier}"]`);
            if (template.length) {
              const content = template.data('body');
              setModalQuillContent('emailBody', content);
            }
          }
        });
      } catch (error) {
        console.error('Error initializing Quill:', error);
      }
    }, CONFIG.TIMEOUTS.QUILL_INIT);
  });
  
  // Limpiar al cerrar modal
  $(document).on('hidden.bs.modal', '#sendEmailModal', function() {
    console.log('Modal hidden event fired');
    destroyModalQuill('emailBody');
    
    // Limpieza adicional de elementos Quill huérfanos
    setTimeout(() => {
      document.querySelectorAll('.ql-toolbar').forEach(toolbar => {
        console.log('Cleaning up orphaned toolbar on close');
        toolbar.remove();
      });
    }, 100);
    
    // Limpiar campos del formulario
    $('#modalStudentId, #modalIdentifier, #emailSubject, #emailBody, #emailCc').val('');
  });
  
  // Eventos de cierre para botones
  // Botón de cierre manejado automáticamente por Bootstrap
  
  // Tecla Escape manejada automáticamente por Bootstrap
  
  // Handler para poblar modal al abrirse (fallback para Bootstrap)
  $('#sendEmailModal').on('show.bs.modal', function(event) {
    const button = $(event.relatedTarget);
    
    if (button.length) {
      const studentId = button.data('student-id');
      const identifier = button.data('identifier');
      const template = $(`.email-template[data-identifier="${identifier}"]`);
      
      if (template.length) {
        $('#modalStudentId').val(studentId);
        $('#modalIdentifier').val(identifier);
        $('#emailSubject').val(template.data('subject'));
        $('#emailBody').val(template.data('body'));
      }
    }
  });
}

// ========================================
// DATATABLES INITIALIZATION
// ========================================

function initDataTable(selector, customConfig = {}) {
  if (document.querySelector(selector)) {
    const defaultConfig = {
      dom: CONFIG.DATATABLES.DOM_LAYOUT,
      language: CONFIG.DATATABLES.LANGUAGE,
      columnDefs: [
        {
          targets: '_all',
          defaultContent: ''
        }
      ],
      order: []
    };
    
    const config = { ...defaultConfig, ...customConfig };
    $(selector).DataTable(config);
  }
}

function initDataTables() {
  const tables = [
    '.datatables-students',
    '.datatables-scholarships',
    '.datatables-tests',
    '.datatables-orders',
    '.datatables-email-templates',
    '.datatables-users',
    '.datatables-graduates',
    '.datatables-inquiries',
    '.datatables-grants',
    '.datatables-accommodations'
  ];
  
  tables.forEach(selector => {
    initDataTable(selector);
  });
}

// ========================================
// DELETE FUNCTIONALITY
// ========================================

function initDeleteButtons() {
  // Generic delete record functionality
  $(document).on('click', '.delete-record', function() {
    if (confirm('¿Estás seguro de que deseas eliminar este registro?')) {
      $(this).closest('form').submit();
    }
  });
  
  // Specific delete handlers for different entities
  $(document).on('click', '.delete-student', function() {
    if (confirm('¿Estás seguro de que deseas eliminar este estudiante?')) {
      $(this).closest('form').submit();
    }
  });
  
  $(document).on('click', '.delete-scholarship', function() {
    if (confirm('¿Estás seguro de que deseas eliminar esta beca?')) {
      $(this).closest('form').submit();
    }
  });
  
  $(document).on('click', '.delete-test', function() {
    if (confirm('¿Estás seguro de que deseas eliminar este test?')) {
      $(this).closest('form').submit();
    }
  });
  
  $(document).on('click', '.delete-order', function() {
    if (confirm('¿Estás seguro de que deseas eliminar esta orden?')) {
      $(this).closest('form').submit();
    }
  });
  
  $(document).on('click', '.delete-template', function() {
    if (confirm('¿Estás seguro de que deseas eliminar esta plantilla?')) {
      $(this).closest('form').submit();
    }
  });
  
  $(document).on('click', '.delete-user', function() {
    if (confirm('¿Estás seguro de que deseas eliminar este usuario?')) {
      $(this).closest('form').submit();
    }
  });
  
  $(document).on('click', '.delete-graduate', function() {
    if (confirm('¿Estás seguro de que deseas eliminar este graduado?')) {
      $(this).closest('form').submit();
    }
  });
  
  $(document).on('click', '.delete-inquiry', function() {
    if (confirm('¿Estás seguro de que deseas eliminar esta consulta?')) {
      $(this).closest('form').submit();
    }
  });
  
  $(document).on('click', '.delete-grant', function() {
    if (confirm('¿Estás seguro de que deseas eliminar esta subvención?')) {
      $(this).closest('form').submit();
    }
  });
}

// ========================================
// EMAIL FUNCTIONALITY - INMEDIATA SIN AJAX
// ========================================

function initEmailFunctionality() {
  console.log('initEmailFunctionality called');
  
  // Handle modal show event to populate with template data
  $('#sendEmailModal').on('show.bs.modal', function(event) {
    const button = $(event.relatedTarget); // Button that triggered the modal
    const studentId = button.data('student-id');
    const identifier = button.data('identifier');
    
    console.log('Modal opening for Student ID:', studentId, 'Identifier:', identifier);
    
    // Get template data from pre-loaded elements
    const template = $(`.email-template[data-identifier="${identifier}"]`);
    
    if (template.length) {
      // Populate modal fields instantly
      $('#modalStudentId').val(studentId);
      $('#modalIdentifier').val(identifier);
      $('#emailSubject').val(template.data('subject'));
      
      // Set content in TinyMCE if available, otherwise in textarea
      if (tinymce.get('emailBody')) {
        tinymce.get('emailBody').setContent(template.data('body'));
      } else {
        $('#emailBody').val(template.data('body'));
      }
      
      // Store the button for later use
      $('#sendEmailModal').data('trigger-button', button);
    } else {
      console.warn('No template found for identifier:', identifier);
    }
  });
}

// ========================================
// MODAL HANDLERS
// ========================================

function initModalHandlers() {
  console.log('initModalHandlers called');
  
  // Send email modal handler
  if (document.querySelector('#sendEmailModalBtn')) {
    console.log('Found #sendEmailModalBtn');
    $('#sendEmailModalBtn').on('click', function() {
      const studentId = $('#modalStudentId').val();
      const identifier = $('#modalIdentifier').val();
      const subject = $('#emailSubject').val();
      const body = getModalQuillContent('emailBody');
      const ccEmail = $('#emailCc').val();
      const sendButton = $('#sendEmailModal').data('trigger-button');

      if (!subject || !body) {
        alert('El asunto y el cuerpo del correo no pueden estar vacíos.');
        return;
      }

      // Disable send button while processing
      $(this).prop('disabled', true).text('Enviando...');

      $.ajax({
        url: `/admin/students/${studentId}/send-email/${identifier}`,
        type: 'POST',
        data: {
          _token: $('meta[name="csrf-token"]').attr('content'),
          subject: subject,
          body: body,
          cc_email: ccEmail
        },
        success: function(response) {
          if (response.success) {
            alert('Correo enviado con éxito');
            if (sendButton) {
              sendButton.removeClass('btn-danger btn-warning').addClass('btn-success');
            }
          } else {
            alert('Error al enviar el correo: ' + response.message);
            if (sendButton) {
              sendButton.removeClass('btn-danger').addClass('btn-warning');
            }
          }
          $('#sendEmailModal').modal('hide');
        },
        error: function(xhr) {
          alert('Error al enviar el correo. Por favor, inténtalo de nuevo.');
          if (sendButton) {
            sendButton.removeClass('btn-danger').addClass('btn-warning');
          }
        },
        complete: function() {
          $('#sendEmailModalBtn').prop('disabled', false).text('Enviar Email');
        }
      });
    });
  }
  
  // Send scholarship email modal handler
  if (document.querySelector('#sendScholarshipEmailBtn')) {
    $('#sendScholarshipEmailBtn').on('click', function() {
      const scholarshipId = $('#modalScholarshipId').val();
      const identifier = $('#modalScholarshipIdentifier').val();
      const subject = $('#scholarshipEmailSubject').val();
      const body = tinymce.get('scholarshipEmailBody') ? tinymce.get('scholarshipEmailBody').getContent() : $('#scholarshipEmailBody').val();
      const sendButton = $('#scholarshipEmailModal').data('trigger-button');

      if (!subject || !body) {
        alert('El asunto y el cuerpo del correo no pueden estar vacíos.');
        return;
      }

      // Disable send button while processing
      $(this).prop('disabled', true).text('Enviando...');

      $.ajax({
        url: `/admin/scholarships/${scholarshipId}/send-email/${identifier}`,
        type: 'POST',
        data: {
          _token: $('meta[name="csrf-token"]').attr('content'),
          subject: subject,
          body: body
        },
        success: function(response) {
          if (response.success) {
            alert('Correo enviado con éxito');
            if (sendButton) {
              sendButton.removeClass('btn-danger btn-warning').addClass('btn-success');
            }
          } else {
            alert('Error al enviar el correo: ' + response.message);
            if (sendButton) {
              sendButton.removeClass('btn-danger').addClass('btn-warning');
            }
          }
          $('#scholarshipEmailModal').modal('hide');
        },
        error: function(xhr) {
          alert('Error al enviar el correo. Por favor, inténtalo de nuevo.');
          if (sendButton) {
            sendButton.removeClass('btn-danger').addClass('btn-warning');
          }
        },
        complete: function() {
          $('#sendScholarshipEmailBtn').prop('disabled', false).text('Enviar Email');
        }
      });
    });
  }
  
  // Destroy TinyMCE when closing modals
  if (document.querySelector('#sendEmailModal')) {
    $('#sendEmailModal').on('hidden.bs.modal', function () {
      if (tinymce.activeEditor) {
        tinymce.activeEditor.destroy();
      }
    });
  }
  
  if (document.querySelector('#scholarshipEmailModal')) {
    $('#scholarshipEmailModal').on('hidden.bs.modal', function () {
      if (tinymce.get('scholarshipEmailBody')) {
        tinymce.get('scholarshipEmailBody').destroy();
      }
    });
  }
  
  if (document.querySelector('#templateModal')) {
    $('#templateModal').on('hidden.bs.modal', function () {
      if (tinymce.get('templateBody')) {
        tinymce.get('templateBody').destroy();
      }
    });
  }
  
  // Scholarship email functionality
  if (document.querySelector('.scholarship-email-button')) {
    console.log('Found .scholarship-email-button elements');
    $('.scholarship-email-button').each(function() {
      const button = $(this);
      const scholarshipId = button.data('scholarship-id');
      const identifier = button.data('identifier');
      
      if (scholarshipId && identifier) {
        $.ajax({
          url: `/admin/scholarships/${scholarshipId}/email-status/${identifier}`,
          type: 'GET',
          success: function(response) {
            if (response.sent) {
              if (response.success) {
                button.removeClass('btn-danger').addClass('btn-success');
              } else {
                button.removeClass('btn-danger').addClass('btn-warning');
              }
            }
          }
        });
      }
    });
    
    // Handle scholarship email button clicks
    $(document).on('click', '.scholarship-email-button', function(e) {
      e.preventDefault();
      console.log('Scholarship button clicked!');
      const button = $(this);
      const scholarshipId = button.data('scholarship-id');
      const identifier = button.data('identifier');

      // Store the button that triggered the modal
      $('#scholarshipEmailModal').data('trigger-button', button);
      
      // Get pre-filled template content
      $.ajax({
        url: `/admin/scholarships/${scholarshipId}/get-email-template/${identifier}`,
        type: 'GET',
        success: function(response) {
          if (response.success) {
            $('#modalScholarshipId').val(scholarshipId);
            $('#modalScholarshipIdentifier').val(identifier);
            $('#scholarshipEmailSubject').val(response.subject);
            
            // Initialize TinyMCE if not initialized or set content
            if (tinymce.get('scholarshipEmailBody')) {
              tinymce.get('scholarshipEmailBody').setContent(response.body);
            } else {
              tinymce.init({
                selector: '#scholarshipEmailBody',
                height: 400,
                menubar: false,
                plugins: [
                  'advlist autolink lists link image charmap print preview anchor',
                  'searchreplace visualblocks code fullscreen',
                  'insertdatetime media table paste code help wordcount'
                ],
                toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help'
              }).then(function(editors) {
                  editors[0].setContent(response.body);
              });
            }

            $('#scholarshipEmailModal').modal('show');
          } else {
            alert('Error al cargar la plantilla: ' + response.message);
          }
        },
        error: function(xhr) {
          alert('Error al cargar la plantilla. Por favor, inténtalo de nuevo.');
        }
      });
    });
  }

  // Template modal handlers for inquiries/grants pages
  if (document.querySelector('.btn-template-modal')) {
    console.log('Found .btn-template-modal elements');
    $('.btn-template-modal').each(function() {
      const button = $(this);
      const templateId = button.data('template-id');
      const entityId = button.data('id') || button.data('inquiry-id') || button.data('grant-id');
      let entityType = 'inquiry';
      
      // Detect entity type based on current page or data attributes
      if (button.data('grant-id') || (button.data('id') && window.location.href.includes('grants'))) {
        entityType = 'grant';
      } else if (button.data('inquiry-id') || (button.data('id') && window.location.href.includes('inquiries'))) {
        entityType = 'inquiry';
      }
      
      if (entityId && templateId) {
        $.ajax({
          url: `/admin/template-email-status/${templateId}/${entityId}`,
          type: 'GET',
          success: function(response) {
            if (response.sent) {
              if (response.success) {
                button.removeClass('btn-danger').addClass('btn-success');
              } else {
                button.removeClass('btn-danger').addClass('btn-warning');
              }
            }
          }
        });
      }
    });
    
    $(document).on('click', '.btn-template-modal', function(e) {
      e.preventDefault();
      console.log('Template modal button clicked!');
      const button = $(this);
      const templateId = button.data('template-id');
      const entityId = button.data('id') || button.data('inquiry-id') || button.data('grant-id');
      let entityType = 'inquiry';
      
      // Detect entity type based on current page or data attributes
      if (button.data('grant-id') || (button.data('id') && window.location.href.includes('grants'))) {
        entityType = 'grant';
      } else if (button.data('inquiry-id') || (button.data('id') && window.location.href.includes('inquiries'))) {
        entityType = 'inquiry';
      }
      
      // Store the button that triggered the modal
      $('#templateModal').data('trigger-button', button);
      
      $('#templateModalEntityType').val(entityType);
      $('#templateModalEntityId').val(entityId);
      $('#templateModalTemplateId').val(templateId);
      
      // Load template content
      $.ajax({
        url: `/admin/email-templates/${templateId}/${entityId}`,
        type: 'GET',
        success: function(response) {
          if (response.success) {
            $('#templateSubject').val(response.subject);
            
            // Initialize TinyMCE if not initialized or set content
            if (tinymce.get('templateBody')) {
              tinymce.get('templateBody').setContent(response.body);
            } else {
              tinymce.init({
                selector: '#templateBody',
                height: 400,
                menubar: false,
                plugins: [
                  'advlist autolink lists link image charmap print preview anchor',
                  'searchreplace visualblocks code fullscreen',
                  'insertdatetime media table paste code help wordcount'
                ],
                toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help'
              }).then(function(editors) {
                  editors[0].setContent(response.body);
              });
            }
            
            $('#templateModal').modal('show');
          } else {
            alert('Error al cargar la plantilla: ' + response.message);
          }
        },
        error: function(xhr) {
          alert('Error al cargar la plantilla. Por favor, inténtalo de nuevo.');
        }
      });
    });
    
    $(document).on('click', '#sendTemplateBtn', function(e) {
      e.preventDefault();
      const entityType = $('#templateModalEntityType').val();
      const entityId = $('#templateModalEntityId').val();
      const templateId = $('#templateModalTemplateId').val();
      const subject = $('#templateSubject').val();
      const body = tinymce.get('templateBody') ? tinymce.get('templateBody').getContent() : $('#templateBody').val();
      
      if (!subject || !body) {
        alert('El asunto y el cuerpo no pueden estar vacíos');
        return;
      }
      
      $(this).prop('disabled', true).text('Enviando...');
      
      $.ajax({
        url: `/admin/send-template-email`,
        type: 'POST',
        data: {
          _token: $('meta[name="csrf-token"]').attr('content'),
          entity_type: entityType,
          entity_id: entityId,
          template_id: templateId,
          subject: subject,
          body: body
        },
        success: function(response) {
          if (response.success) {
            alert('Email enviado exitosamente');
            $('#templateModal').modal('hide');
            
            // Update button color to green
            const triggerButton = $('#templateModal').data('trigger-button');
            if (triggerButton) {
              triggerButton.removeClass('btn-danger').addClass('btn-success');
            }
          } else {
            alert('Error: ' + response.message);
          }
        },
        error: function(xhr) {
          alert('Error al enviar el email');
        },
        complete: function() {
          $('#sendTemplateBtn').prop('disabled', false).text('Enviar');
        }
      });
    });
  }
}

// ========================================
// INITIALIZATION
// ========================================
let emailFunctionalityInitialized = false;

function initializeEmailSystem() {
  if (emailFunctionalityInitialized) {
    console.log('Email functionality already initialized, skipping...');
    return;
  }
  
  console.log('Initializing email functionality for the first time');
  emailFunctionalityInitialized = true;
  initEmailFunctionality();
  initModalHandlers();
}

// Try with jQuery ready
$(document).ready(function() {
  console.log('jQuery ready - initializing email functionality');
  initializeEmailSystem();
});
