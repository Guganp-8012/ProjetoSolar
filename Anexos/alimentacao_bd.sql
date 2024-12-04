CREATE DATABASE projeto_solar;

-- Empresa
INSERT INTO empresas (razao_social, logo, email, telefone, endereco, descricao, created_at, updated_at)
VALUES ('Apollo Solar', NULL, 'contato@apollosolar.com', '(11) 98765-4321', 'Av. Sustentável, 123, São Paulo, SP', 
        'Empresa especializada em soluções de energia solar, promovendo economia e sustentabilidade.', NOW(), NOW());

-- Categorias
INSERT INTO categorias (nome, descricao, created_at, updated_at)
VALUES ('Energia Residencial', 'Soluções para residências', NOW(), NOW()),
       ('Energia Comercial', 'Soluções para empresas', NOW(), NOW());

-- Usuários (Funcionários)
INSERT INTO users (name, email, password, foto, telefone, funcionario, ocupacao, email_verified_at, created_at, updated_at)
VALUES ('Carlos Oliveira', 'carlos@apollosolar.com', 'hashed_password', NULL, '(11) 91234-5678', TRUE, 'Engenheiro Solar', NOW(), NOW(), NOW()),
       ('Ana Souza', 'ana@apollosolar.com', 'hashed_password', NULL, '(11) 99876-5432', TRUE, 'Consultora de Vendas', NOW(), NOW(), NOW());

-- Usuário (Cliente)
INSERT INTO users (name, email, password, foto, telefone, funcionario, ocupacao, email_verified_at, created_at, updated_at)
VALUES ('João Mendes', 'joao.mendes@gmail.com', 'hashed_password', NULL, '(11) 92345-6789', FALSE, NULL, NOW(), NOW(), NOW());

-- Postagens
INSERT INTO postagems (user_id, categoria_id, titulo, foto, conteudo, data, created_at, updated_at)
VALUES (1, 1, 'Vantagens da Energia Solar Residencial', NULL, 
        'Descubra como instalar energia solar na sua casa pode reduzir custos e contribuir para o meio ambiente.', 
        '2024-12-01', NOW(), NOW()),
       (2, 2, 'Energia Solar para Pequenos Negócios', NULL, 
        'Pequenas empresas podem economizar muito com a instalação de sistemas fotovoltaicos.', 
        '2024-12-02', NOW(), NOW());

-- Comentário em uma Postagem
INSERT INTO comentarios (user_id, postagem_id, conteudo, created_at, updated_at)
VALUES (3, 1, 'Ótimo artigo! Estou pensando em instalar energia solar na minha casa.', NOW(), NOW());

-- Depoimento
INSERT INTO depoimentos (user_id, empresa_id, texto, created_at, updated_at)
VALUES (3, 1, 'Contratei a Apollo Solar e o serviço foi excelente! Minha conta de luz diminuiu drasticamente.', NOW(), NOW());

-- Portfólios
INSERT INTO portfolios (empresa_id, titulo, descricao, foto, cidade, potencia, tipo, economia, created_at, updated_at)
VALUES (1, 'Instalação em Residência Familiar', 
        'Projeto de energia solar residencial com economia de 80% na conta de luz.', 
        NULL, 'Campinas', 3.2, 'Residencial', 80, NOW(), NOW()),
       (1, 'Sistema Solar para Escritório', 
        'Sistema fotovoltaico instalado para um escritório com redução de 70% nos custos.', 
        NULL, 'São Paulo', 5.5, 'Comercial', 70, NOW(), NOW());