import { defineConfig, loadEnv } from 'vite'
import tailwindcss from '@tailwindcss/vite'
import { resolve } from 'path'
import fs from 'fs'

export default defineConfig(({ mode }) => {
  const env = loadEnv(mode, process.cwd(), '')
  const appUrl = (env.APP_URL || 'http://localhost').replace(/\/$/, '')
  const appUrlObject = new URL(appUrl)
  const hotFile = resolve(__dirname, 'public/hot')

  return {
    publicDir: false,
    plugins: [
      tailwindcss(),
      {
        name: 'ndg-hot-file',
        configureServer(server) {
          server.httpServer?.once('listening', () => {
            const address = server.httpServer?.address()
            const port = typeof address === 'object' && address ? Number(address.port) : null

            let devUrl = `${appUrlObject.protocol}//${appUrlObject.hostname}`

            if (port && port !== 80 && port !== 443) {
              devUrl += `:${port}`
            }

            fs.writeFileSync(hotFile, devUrl)
          })

          server.httpServer?.once('close', () => {
            if (fs.existsSync(hotFile)) {
              fs.unlinkSync(hotFile)
            }
          })
        },
        closeBundle() {
          if (fs.existsSync(hotFile)) {
            fs.unlinkSync(hotFile)
          }
        }
      }
    ],
    server: {
      host: appUrlObject.hostname
    },
    build: {
      manifest: true,
      rollupOptions: {
        input: {
          app: resolve(__dirname, 'resources/css/app.css'),
          js: resolve(__dirname, 'resources/js/app.js')
        }
      },
      outDir: 'public/build',
      emptyOutDir: true,
    }
  }
})
