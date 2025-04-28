## Book Management

Sistema web para gerenciamento de livros, autores e assuntos.

Descrição
O Book Management é uma aplicação desenvolvida para realizar o cadastro e gestão de livros, autores e assuntos. O projeto foi construído utilizando Laravel, MySQL e Docker, com foco em boas práticas de mercado, como modularização, testes automatizados e tratamento de erros específico.

## Funcionalidades

1 - CRUD Completo
- Cadastro, listagem, edição e exclusão de livros, autores e assuntos.
- Relacionamentos entre tabelas (um livro pode ter vários autores).

2 - Relatórios
- Geração de relatórios em PDF utilizando uma view no banco de dados.
- Agrupamento de livros por autor.

3 - Formatação de Dados
- Máscaras para valores monetários (R$) e datas.
- Uso de bibliotecas como mask-money.js para formatação no frontend.

4 - Testes Automatizados
- Testes unitários para models e controllers
- Testes de integração para rotas e funcionalidades.

5 - Tratamento de Erros
- Evita try-catch genéricos e implementa tratamentos específicos para erros de banco de dados.

6 - Componentização
- Reutilização de componentes CSS e JavaScript.
- Componentes Blade reutilizáveis (alert, form, modal, etc.).

7 - Formatação de Dados
- Configuração completa com Docker para garantir replicabilidade.
- Estrutura organizada com camadas bem definidas.

## Estrutura do Projeto

### Backend

#### Controllers

Manipulação de requisições HTTP.
- AssuntoController.php 
- AutorController.php 
- LivroController.php 
- RelatorioController.php

#### Models

Representação das entidades do sistema.
- Autor.php
- Livro.php
- Assunto.php
- AutorLivro.php (pivot)
- ViewLivroPorAutor.php (view model)

#### Requests

Validação de dados.
- AssuntoRequest.php
- AutorRequest.php
- LivroRequest.php

### Banco de Dados

#### Tabelas

- livros: Armazena informações sobre os livros.
- autores: Armazena informações sobre os autores.
- assuntos: Armazena informações sobre os assuntos.
- autor_livro: Tabela pivot para relacionamento N:N entre autores e livros.

#### Views

- view_livros_por_autor: Agrupa livros por autor para relatórios.

#### Producers

- sp_relatorio_livros_por_autor: Procedure para gerar dados detalhados dos livros por autor.

### Frontend

#### CSS: Estilos modulares na pasta public/css/components

- _alert.css
- _buttons.css
- _inputs.css
- _modal.css
- _table.css

#### Reset e Main:

- reset.css: Normaliza estilos entre navegadores.
- main.css: Define estilos globais.

#### JavaScript: Scripts modulares na pasta public/js

- mask-money.js: Máscara para valores monetários.
- menu-toggle.js: Menu responsivo.
- search.js: Barra de busca.
- modal.js: Modal reutilizável.

#### Blade Components: Componentes reutilizáveis na pasta resources/views/components

- alert.blade.php
- button.blade.php
- confirmationModal.blade.php
- form.blade.php
- input.blade.php
- multiselect.blade.php
- pagination.blade.php
- search.blade.php
- select.blade.php
- table.blade.php


## Metodologia BEM em vez do Bootstrap

#### A escolha da metodologia BEM (Block, Element, Modifier) em vez do Bootstrap foi baseada nos seguintes motivos:

### Modularidade e Escalabilidade:
- A metodologia BEM permite criar componentes CSS altamente modulares e independentes, facilitando a manutenção e escalabilidade do código.
- Cada componente possui sua própria classe única, evitando conflitos de estilo.
### Personalização Total:
- Ao usar BEM, temos controle total sobre os estilos, sem depender de classes pré-definidas do Bootstrap.
- Isso resulta em um design mais personalizado e alinhado com as necessidades específicas do projeto.
### Desempenho:
- O Bootstrap inclui muitos estilos e scripts que podem não ser utilizados no projeto, aumentando o tamanho do CSS e do JavaScript.
- Com BEM, apenas os estilos necessários são carregados, melhorando o desempenho da aplicação.
### Boas Práticas de Mercado:
- A metodologia BEM é amplamente adotada em projetos modernos devido à sua clareza e organização.
- Ela promove um código limpo e fácil de entender, facilitando a colaboração em equipes.

## Como usar

### Pré-requisitos

Para executar este projeto em sua máquina local, você precisará dos seguintes requisitos:

#### PHP: Versão 8.2 ou superior.

- O projeto foi desenvolvido utilizando PHP 8.2, que é compatível com o Laravel 10.
- Certifique-se de que o PHP está instalado e configurado corretamente.

#### Laravel: Versão 11.x. (este projeto está na versão 12.x)

- O projeto utiliza o framework Laravel para gerenciar rotas, controllers, models e outras funcionalidades.
- O Laravel será instalado automaticamente via Composer durante a configuração do ambiente.

#### Docker:

- Docker 20.10+ e Docker Compose 2.0+ são usados para criar um ambiente isolado e replicável.
- Certifique-se de que o Docker está instalado e funcionando corretamente.

#### MySQL:

- O banco de dados utilizado no projeto é o MySQL (ou MariaDB).
- O Docker já inclui uma instância do MariaDB configurada para uso.

#### Composer:

- Ferramenta de gerenciamento de dependências do PHP.
- Será usado para instalar as bibliotecas e pacotes necessários para o projeto.

### Clone o repositório

    git clone https://github.com/cristianoreche/book-management.git

    cd book-management

### Configure o ambiente

    cp .env.example .env

Edite o arquivo .env para ajustar as configurações do banco de dados e outras variáveis, se necessário. Exemplo:

    DB_CONNECTION=mysql
    DB_HOST=db
    DB_PORT=3306
    DB_DATABASE=bookdb
    DB_USERNAME=bookuser
    DB_PASSWORD=bookpass

### Inicie os containers

    docker-compose up -d --build

### Instale as dependências

    docker-compose exec app composer install

### Configure a aplicação

    docker-compose exec app php artisan key:generate
    docker-compose exec app php artisan storage:link

### Execute as migrações

    docker-compose exec app php artisan migrate --seed

### Acesse o sistema

    http://localhost:8080

## Testes
### Executar Testes

    # Todos os testes
    docker-compose exec app php artisan test
    
    # Testes específicos
    docker-compose exec app php artisan test --filter=AssuntoTest


## License
Este projeto é licenciado sob a MIT License, garantindo liberdade total para uso, modificação e distribuição.

#### 🎓 Sobre o Autor
Desenvolvido por Cristiano Reche
Especialista em PHP | Full Stack Web | Arquitetura de Software

- Experiência em PHP e Laravel, com foco em soluções robustas e escaláveis.
- Desenvolvimento Full Stack, unindo frontend responsivo e backend eficiente.
- Conhecimento em arquitetura de software e boas práticas de desenvolvimento.
