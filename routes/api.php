<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes - UBSonline
|--------------------------------------------------------------------------
|
| Aqui definimos as rotas para a API do sistema UBSonline.
| As respostas JSON são estáticas, simples e didáticas para fins de TCC.
|
*/

// 1. Rota de Status da API
// Endpoint: GET /api/status
Route::get('/status', function () {
    return response()->json([
        'status' => 'online',
        'mensagem' => 'API do sistema UBSonline funcionando perfeitamente.',
        'versao' => '1.0.0',
        'ambiente' => app()->environment()
    ], 200, [], JSON_UNESCAPED_UNICODE);
});

// 2. Rota de Serviços da UBS
// Endpoint: GET /api/servicos
// Finalidade: O paciente pode visualizar quais serviços a UBS oferece.
Route::get('/servicos', function () {
    return response()->json([
        'mensagem' => 'Serviços disponíveis na UBS retornados com sucesso.',
        'servicos' => [
            [
                'id' => 1,
                'nome' => 'Consulta com Clínico Geral',
                'descricao' => 'Atendimento médico geral para diagnóstico e tratamento de diversas condições.',
                'setor' => 'Consultórios',
                'requisitos' => 'Documento com foto e Cartão do SUS.'
            ],
            [
                'id' => 2,
                'nome' => 'Vacinação',
                'descricao' => 'Aplicação de vacinas de rotina e campanhas sazonais.',
                'setor' => 'Sala de Vacinas',
                'requisitos' => 'Caderneta de vacinação e Cartão do SUS.'
            ],
            [
                'id' => 3,
                'nome' => 'Curativos e Enfermagem',
                'descricao' => 'Tratamento de feridas, retirada de pontos e cuidados gerais de enfermagem.',
                'setor' => 'Sala de Curativos',
                'requisitos' => 'Encaminhamento médico ou de enfermagem.'
            ],
            [
                'id' => 4,
                'nome' => 'Atendimento Pediátrico',
                'descricao' => 'Consultas médicas especializadas para crianças e adolescentes.',
                'setor' => 'Consultório 3',
                'requisitos' => 'Certidão de nascimento/RG da criança, documento do responsável e Cartão do SUS.'
            ]
        ]
    ], 200, [], JSON_UNESCAPED_UNICODE);
});

// 3. Rota de Vagas Disponíveis para Consulta
// Endpoint: GET /api/vagas
// Finalidade: O paciente pode ver os horários e médicos com vagas livres para agendar uma consulta.
Route::get('/vagas', function () {
    return response()->json([
        'mensagem' => 'Lista de vagas de consulta disponíveis para agendamento.',
        'vagas' => [
            [
                'id' => 101,
                'medico' => 'Dra. Sandra Souza',
                'especialidade' => 'Clínica Geral',
                'data' => '2026-06-02',
                'horario' => '09:00',
                'status' => 'disponivel'
            ],
            [
                'id' => 102,
                'medico' => 'Dra. Sandra Souza',
                'especialidade' => 'Clínica Geral',
                'data' => '2026-06-02',
                'horario' => '09:30',
                'status' => 'disponivel'
            ],
            [
                'id' => 103,
                'medico' => 'Dr. Marcos Oliveira',
                'especialidade' => 'Pediatria',
                'data' => '2026-06-03',
                'horario' => '14:00',
                'status' => 'disponivel'
            ],
            [
                'id' => 104,
                'medico' => 'Dr. Marcos Oliveira',
                'especialidade' => 'Pediatria',
                'data' => '2026-06-03',
                'horario' => '14:30',
                'status' => 'disponivel'
            ]
        ]
    ], 200, [], JSON_UNESCAPED_UNICODE);
});

// 4. Rota de Dados do Paciente (Visualização do cadastro do próprio paciente)
// Endpoint: GET /api/pacientes/{id}
// Finalidade: O paciente pode visualizar os seus dados cadastrados na UBS pelo funcionário.
Route::get('/pacientes/{id}', function ($id) {
    // Simulação de banco de dados para retorno didático
    $pacientes = [
        1 => [
            'id' => 1,
            'nome' => 'João Silva de Souza',
            'cpf' => '123.456.789-00',
            'cartao_sus' => '700.1234.5678.9012',
            'data_nascimento' => '1990-05-15',
            'telefone' => '(11) 98765-4321',
            'endereco' => 'Rua das Flores, 123 - Centro',
            'cadastrado_por_funcionario' => 'Maria Silva (Matrícula: 9876)'
        ],
        2 => [
            'id' => 2,
            'nome' => 'Mariana Oliveira Reis',
            'cpf' => '987.654.321-99',
            'cartao_sus' => '700.9876.5432.1098',
            'data_nascimento' => '1985-11-23',
            'telefone' => '(11) 99999-8888',
            'endereco' => 'Avenida Brasil, 456 - Jardim América',
            'cadastrado_por_funcionario' => 'Carlos Santos (Matrícula: 5432)'
        ]
    ];

    if (array_key_exists($id, $pacientes)) {
        return response()->json([
            'mensagem' => 'Dados do paciente encontrados com sucesso.',
            'paciente' => $pacientes[$id]
        ], 200, [], JSON_UNESCAPED_UNICODE);
    }

    return response()->json([
        'erro' => 'Paciente não encontrado',
        'mensagem' => 'Não existe nenhum paciente com o ID informado. Lembre-se que pacientes devem ser cadastrados previamente por um funcionário da UBS.'
    ], 404, [], JSON_UNESCAPED_UNICODE);
});

