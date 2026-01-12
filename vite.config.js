import { defineConfig } from 'vite'
import path from 'path'
import tailwindcss from '@tailwindcss/vite'


export default defineConfig({
    root: 'Views',
    plugins: [tailwindcss()],
    build: {
        outDir: 'public',
        emptyOutDir: true,
        rollupOptions: {
            input: {
                app: path.resolve(__dirname, 'Views/script/app.js')
            }
        }
    }
})
