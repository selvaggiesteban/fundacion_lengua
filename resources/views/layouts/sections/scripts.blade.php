<!-- Core JS -->
@vite([
  'resources/assets/vendor/js/helpers.js',
  'resources/assets/js/main.js',
  'resources/js/app.js'
])

@yield('vendor-script')
@yield('page-script')