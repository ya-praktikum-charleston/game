import React from 'react'
import {renderToString} from 'react-dom/server'
import App from './src/App'

export default function render() {

  const app = renderToString(
    <App />
  )

  return (
    '' +
    `<!DOCTYPE html>
      <html>
      <head>
        <meta charset="utf-8">
        <title>Server-side rendering with rehydration</title>
      </head>
      <body>
        <div id="app">${app}</div>
        <script src="./client.js"></script>
      </body>
    </html>`
  )
}
