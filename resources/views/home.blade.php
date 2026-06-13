<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UBSonline API - Apresentação do Projeto</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg: #f7fafc;
            --surface: #ffffff;
            --border: #e2e8f0;
            --text: #111827;
            --muted: #6b7280;
            --primary: #0f766e;
            --accent: #0891b2;
            --radius: 18px;
            --font-family: 'Outfit', system-ui, -apple-system, sans-serif;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: var(--font-family);
            background: linear-gradient(180deg, #ffffff 0%, #e2e8f0 100%);
            color: var(--text);
            line-height: 1.6;
        }

        .container {
            width: min(1080px, 94%);
            margin: 0 auto;
            padding: 2rem 0 3rem;
        }

        header {
            text-align: center;
            padding: 2rem 1rem;
        }

        header h1 {
            margin: 0;
            font-size: clamp(2.25rem, 4vw, 3.25rem);
            letter-spacing: -0.04em;
            color: var(--primary);
        }

        header p {
            margin: 1rem auto 0;
            max-width: 680px;
            color: var(--muted);
            font-size: 1.05rem;
        }

        .grid {
            display: grid;
            gap: 1.5rem;
            margin-top: 2rem;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
        }

        .card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 1.75rem;
            box-shadow: 0 18px 40px rgba(15, 23, 42, 0.06);
        }

        .card h2 {
            margin-top: 0;
            font-size: 1.2rem;
            color: var(--text);
        }

        .card p,
        .card li,
        .card span {
            color: var(--muted);
            font-size: 1rem;
        }

        .card ul {
            padding-left: 1.25rem;
            margin: 0.75rem 0 0;
        }

        .card li {
            margin-bottom: 0.75rem;
        }

        .endpoint-list {
            background: transparent;
            border: none;
            box-shadow: none;
        }

        .endpoint-item {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            gap: 0.75rem;
            background: #ffffff;
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 1rem 1.2rem;
        }

        .endpoint-link {
            color: var(--accent);
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
        }

        .endpoint-link:hover {
            text-decoration: underline;
        }

        .method-badge {
            background: rgba(8, 145, 178, 0.12);
            color: var(--accent);
            border-radius: 999px;
            padding: 0.25rem 0.65rem;
            font-size: 0.8rem;
            font-weight: 700;
        }

        .footer {
            text-align: center;
            margin-top: 2.5rem;
            color: var(--muted);
            font-size: 0.95rem;
        }

        @media (max-width: 640px) {
            .container {
                padding: 1rem 0 2rem;
            }

            .endpoint-item {
                flex-direction: column;
                align-items: flex-start;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>UBSonline API</h1>
            <p>Uma página de apresentação simples para a API do projeto de TCC, com foco em clareza, uso prático e endpoints principais.</p>
        </header>

        <main class="grid">
            <article class="card">
                <h2>Resumo do problema</h2>
                <p>Unidades de saúde precisam de informações claras sobre o estado do sistema e seus recursos para garantir o atendimento e a integração com outros serviços.</p>
            </article>

            <article class="card">
                <h2>Público-alvo</h2>
                <ul>
                    <li>Desenvolvedores que consomem a API.</li>
                    <li>Equipe técnica da UBS responsável pelo sistema.</li>
                    <li>Orientadores e avaliadores do TCC.</li>
                </ul>
            </article>

            <article class="card">
                <h2>Funcionalidades principais</h2>
                <ul>
                    <li>Verificar status da aplicação com um endpoint dedicado.</li>
                    <li>Expor recursos via endpoints simples e diretos.</li>
                    <li>Permitir acesso rápido a informações para demonstração e testes.</li>
                </ul>
            </article>

            <section class="card endpoint-list">
                <h2>Endpoints da API</h2>
                <div class="endpoint-item">
                    <a href="/api/status" target="_blank" rel="noopener" class="endpoint-link">
                        <span class="method-badge">GET</span> /api/status
                    </a>
                    <span>Verifica se a API está online.</span>
                </div>
                <div class="endpoint-item">
                    <a href="/api/recurso1" target="_blank" rel="noopener" class="endpoint-link">
                        <span class="method-badge">GET</span> /api/recurso1
                    </a>
                    <span>Recurso de exemplo 1 disponível.</span>
                </div>
                <div class="endpoint-item">
                    <a href="/api/recurso2" target="_blank" rel="noopener" class="endpoint-link">
                        <span class="method-badge">GET</span> /api/recurso2
                    </a>
                    <span>Recurso de exemplo 2 disponível.</span>
                </div>
            </section>
        </main>

        <footer class="footer">
            Projeto TCC UBSonline · API publicada no Render.
        </footer>
    </div>
</body>
</html>
