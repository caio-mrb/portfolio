import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import postcss from '@tailwindcss/postcss';

export default defineConfig({
  plugins: [
    laravel({
      input: ['resources/css/app.css', 'resources/js/app.js'],
      refresh: true,
    }),
  ],
  css: {
    postcss: {
      plugins: [
        postcss({}),
      ],
    },
  },
});