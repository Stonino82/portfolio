import path from 'path';
import { defineConfig } from 'vite';
import liveReload from 'vite-plugin-live-reload';

export default defineConfig({
  css: {
    // Enable CSS source maps during development
    devSourcemap: true
  },
  // For production, we use a relative base path. This ensures that the paths in the
  // manifest.json are relative to the 'dist' folder (e.g., 'assets/style.css'),
  // making the build portable and letting WordPress handle the full URL construction.
  base: process.env.NODE_ENV === 'production' ? './' : '/',
  build: {
    // Explicitly set the manifest path to match your environment's output.
    // This makes the configuration the single source of truth.
    manifest: '.vite/manifest.json',
    outDir: 'dist',
    emptyOutDir: true,
    sourcemap: false, // Disable sourcemaps for production as requested.
    rollupOptions: {
      input: {
        main: path.resolve(__dirname, 'src/index.js'), // Usar path absoluto
      },
      // Vite gestionará los nombres de los archivos de salida de forma optimizada por defecto.
    },
  },
  plugins: [
    // Usamos un plugin estándar para la recarga en vivo de archivos PHP.
    // Es más robusto y está diseñado específicamente para este propósito.
    liveReload([
      path.resolve(__dirname, '**/*.php'),
    ]),
  ],
  server: {
    // usePolling es necesario en MAMP si los eventos del sistema de archivos no se detectan.
    watch: {
      usePolling: true,
    },
    host: true, // This allows access from other devices on the same network.
    port: 3000,
    cors: true,
    proxy: {
      // Proxy requests that are not for Vite's assets to the WordPress backend.
      // This allows assets in CSS (e.g., url('/src/img/file.svg')) to work correctly in dev mode.
      '^(?!/@vite/|/src/|/node_modules/|/favicon.ico).*$': {
        target: 'http://localhost/antoninolattene',
        changeOrigin: true,
      }
    }
  }
});