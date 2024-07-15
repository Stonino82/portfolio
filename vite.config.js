import path from 'path';
import { defineConfig } from 'vite';

const ROOT = path.resolve('../../../');
const BASE = __dirname.replace(ROOT, '');

export default defineConfig({
  base: process.env.NODE_ENV === 'production' ? `${BASE}/dist2/` : '/',
  build: {
    manifest: true,
    assetsDir: '.',
    outDir: 'dist2',
    emptyOutDir: true,
    sourcemap: true,
    rollupOptions: {
      input: {
        main: path.resolve(__dirname, 'src/index.js'), // Usar path absoluto
        // style: path.resolve(__dirname, 'src/style.scss'), // Usar path absoluto
      },
      output: {
        entryFileNames: 'main.js',
        assetFileNames: 'main.[ext]',
      },
    },
  },
  plugins: [
    {
      name: 'php-reload',
      handleHotUpdate({ file, server }) {
        if (file.endsWith('.php')) {
          server.ws.send({ type: 'full-reload', path: '*' });
        }
      },
    },
  ],
  server: {
    watch: {
      usePolling: true,
    },
    host: 'localhost',
    port: 3000,
    proxy: {
      '/': {
        target: 'http://localhost/antoninolattene', // Asegúrate de que este sea el puerto correcto
        changeOrigin: true,
        rewrite: (path) => path.replace(/^\/\//, '/'),
      },
    }
  }
});