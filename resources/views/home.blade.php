<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UBSonline - Portal da API</title>
    <!-- Google Fonts: Outfit -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg: #0b0f19;
            --card: rgba(17, 24, 39, 0.7);
            --card-border: rgba(255, 255, 255, 0.08);
            --text: #f3f4f6;
            --muted: #9ca3af;
            --primary: #0ea5e9; /* Sky Blue */
            --accent: #2dd4bf; /* Teal */
            --accent-glow: rgba(45, 212, 191, 0.15);
            --font-family: 'Outfit', system-ui, -apple-system, sans-serif;
        }

        * {
            box-sizing: border-box;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        body {
            margin: 0;
            font-family: var(--font-family);
            background: radial-gradient(circle at 80% 20%, rgba(14, 165, 233, 0.15) 0%, rgba(11, 15, 25, 1) 50%),
                        radial-gradient(circle at 20% 80%, rgba(45, 212, 191, 0.1) 0%, rgba(11, 15, 25, 1) 60%),
                        #0b0f19;
            color: var(--text);
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow-x: hidden;
        }

        .container {
            width: min(900px, 92%);
            margin: 2rem auto;
            padding: 1rem 0;
        }

        .hero {
            background: rgba(15, 23, 42, 0.4);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid var(--card-border);
            border-radius: 24px;
            padding: 3rem;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
            position: relative;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 10%;
            width: 80%;
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--primary), var(--accent), transparent);
        }

        h1, h2, h3 {
            margin: 0;
            font-weight: 700;
            letter-spacing: -0.02em;
        }

        h1 {
            font-size: clamp(2rem, 4vw, 3rem);
            background: linear-gradient(135deg, #ffffff 40%, var(--primary), var(--accent));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 0.5rem;
        }

        h2 {
            font-size: 1.5rem;
            color: #ffffff;
            margin-bottom: 0.75rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        p {
            margin: 0 0 1.5rem;
            color: var(--muted);
            font-size: 1.1rem;
            font-weight: 300;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-top: 2rem;
        }

        .card {
            background: var(--card);
            border: 1px solid var(--card-border);
            border-radius: 16px;
            padding: 1.5rem;
            position: relative;
            overflow: hidden;
        }

        .card:hover {
            transform: translateY(-5px);
            border-color: rgba(14, 165, 233, 0.4);
            box-shadow: 0 10px 25px rgba(14, 165, 233, 0.1);
        }

        .card::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: linear-gradient(90deg, var(--primary), var(--accent));
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .card:hover::after {
            opacity: 1;
        }

        ul {
            padding-left: 1.25rem;
            margin: 0;
        }

        li {
            margin-bottom: 0.6rem;
            color: var(--muted);
            font-weight: 400;
        }

        li strong {
            color: var(--text);
        }

        .endpoint-list {
            margin-top: 2rem;
        }

        .endpoint-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: rgba(15, 23, 42, 0.6);
            border: 1px solid var(--card-border);
            border-radius: 12px;
            padding: 1rem 1.25rem;
            margin-bottom: 0.75rem;
        }

        .endpoint-item:hover {
            border-color: rgba(45, 212, 191, 0.4);
            background: rgba(15, 23, 42, 0.8);
        }

        .endpoint-link {
            font-family: monospace;
            font-size: 1.05rem;
            color: var(--accent);
            text-decoration: none;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .method-badge {
            background: rgba(45, 212, 191, 0.1);
            color: var(--accent);
            border: 1px solid rgba(45, 212, 191, 0.3);
            border-radius: 6px;
            font-size: 0.75rem;
            font-weight: 700;
            padding: 0.15rem 0.5rem;
            font-family: var(--font-family);
        }

        .endpoint-link:hover {
            text-decoration: underline;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            background: var(--accent-glow);
            color: var(--accent);
            border: 1px solid rgba(45, 212, 191, 0.25);
            border-radius: 99px;
            font-size: 0.85rem;
            font-weight: 500;
            padding: 0.25rem 0.8rem;
            margin-bottom: 1.5rem;
        }

        .badge-dot {
            width: 8px;
            height: 8px;
            background: var(--accent);
            border-radius: 50%;
            display: inline-block;
            box-shadow: 0 0 8px var(--accent);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { transform: scale(0.9); opacity: 0.6; }
            50% { transform: scale(1.1); opacity: 1; }
            100% { transform: scale(0.9); opacity: 0.6; }
        }

        .footer {
            margin-top: 2rem;
            text-align: center;
            font-size: 0.9rem;
            color: #4b5563;
        }
    </style>
</head>
<body>
    <main class="container">
        <section class="hero">
            <span class="badge">
                <span class="badge-dot"></span>
                API UBSonline Ativa
            </span>
            <h1>UBSonline API Hub</h1>
            <p>Portal da API para o sistema unificado de cadastros e serviços da Unidade Básica de Saúde (UBS). Desenvolvido para apresentação de TCC.</p>

            <div class="grid">
                <article class="card">
                    <h2>
                        <svg width="20" height="20" fill="none" stroke="var(--primary)" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                        Regras de Acesso
                    </h2>
                    <p>Os cadastros de <strong>médicos</strong> e <strong>pacientes</strong> são restritos e só podem ser feitos por funcionários autorizados da UBS.</p>
                </article>

                <article class="card">
                    <h2>
                        <svg width="20" height="20" fill="none" stroke="var(--accent)" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                        Ações do Paciente
                    </h2>
                    <p>O paciente pode visualizar seus dados cadastrados, listar serviços e consultar vagas para agendar consultas.</p>
                </article>
            </div>

            <article class="card" style="margin-top: 1.5rem;">
                <h2>Funcionalidades Principais da API</h2>
                <ul>
                    <li><strong>Status:</strong> Acompanhamento de integridade e ambiente da aplicação.</li>
                    <li><strong>Serviços:</strong> Listagem de exames, vacinas e procedimentos da UBS.</li>
                    <li><strong>Vagas:</strong> Agenda de médicos e especialidades com horários disponíveis.</li>
                    <li><strong>Pacientes:</strong> Consulta didática dos dados cadastrais do cidadão.</li>
                </ul>
            </article>

            <article class="card endpoint-list" style="margin-top: 1.5rem;">
                <h2>Endpoints Disponíveis (GET)</h2>
                
                <div class="endpoint-item">
                    <a href="/api/status" target="_blank" rel="noopener" class="endpoint-link">
                        <span class="method-badge">GET</span> /api/status
                    </a>
                    <span style="color: var(--muted); font-size: 0.95rem;">Integridade da API</span>
                </div>

                <div class="endpoint-item">
                    <a href="/api/servicos" target="_blank" rel="noopener" class="endpoint-link">
                        <span class="method-badge">GET</span> /api/servicos
                    </a>
                    <span style="color: var(--muted); font-size: 0.95rem;">Lista de serviços da UBS</span>
                </div>

                <div class="endpoint-item">
                    <a href="/api/vagas" target="_blank" rel="noopener" class="endpoint-link">
                        <span class="method-badge">GET</span> /api/vagas
                    </a>
                    <span style="color: var(--muted); font-size: 0.95rem;">Vagas de consulta livres</span>
                </div>

                <div class="endpoint-item">
                    <a href="/api/pacientes/1" target="_blank" rel="noopener" class="endpoint-link">
                        <span class="method-badge">GET</span> /api/pacientes/{id}
                    </a>
                    <span style="color: var(--muted); font-size: 0.95rem;">Dados cadastrados do paciente</span>
                </div>
            </article>
        </section>
        
        <div class="footer">
            UBSonline &copy; 2026 - Desenvolvido para Trabalho de Conclusão de Curso (TCC)
        </div>
    </main>
</body>
</html>
