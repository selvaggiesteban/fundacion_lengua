import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import { viteStaticCopy } from 'vite-plugin-static-copy';

export default defineConfig({
  plugins: [
    laravel({
      input: [
        'resources/js/app.js',
        'resources/assets/vendor/js/helpers.js',
        'resources/assets/js/config.js',
        'resources/assets/js/main.js',
        'resources/assets/vendor/scss/core.scss',
        'resources/assets/vendor/scss/theme-default.scss',
        'resources/assets/vendor/scss/pages/page-auth.scss',
        'resources/assets/vendor/fonts/remixicon/remixicon.scss',
        'resources/assets/css/demo.css',
        'resources/assets/vendor/libs/apex-charts/apex-charts.scss',
        'resources/assets/vendor/libs/apex-charts/apexcharts.js',
        'resources/assets/js/dashboards-analytics.js'
      ],
      refresh: true
    }),
    vue(),
    viteStaticCopy({
      targets: [
        {
          // Copiaremos el contenido de la carpeta de tinymce...
          src: 'node_modules/tinymce/*',
          // ...a una ruta mucho más simple dentro de 'public'.
          dest: 'tinymce'
        }
      ]
    })
  ]
});
