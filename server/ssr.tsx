import React from 'react';
import { renderToString } from 'react-dom/server';
import { StaticRouter } from 'react-router-dom';
import App from '../src/App';

export default function render() {
    const jsx = (
        <StaticRouter>
            <App />
        </StaticRouter>
    );

    const app = renderToString(jsx);

    return (
        `<!DOCTYPE html>
    <html>
    <head>
    <meta charset="utf-8">
    <title>Server-side rendering with rehydration</title>
    </head>
    <body>
    <div id="root">${app}</div>
    </body>
</html>`
    );
}
