import path from 'path';
import { defineConfig } from 'vite';
import liveReload from 'vite-plugin-live-reload';

export default defineConfig({
  // For production, we use a relative base path. This ensures that the paths in the
  // manifest.json are relative to the 'dist' folder (e.g., 'assets/style.css'),
  // making the build portable and letting WordPress handle the full URL construction.
  base: process.env.NODE_ENV === 'production' ? './' : '/',
  build: {
    manifest: true,
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
  }
});