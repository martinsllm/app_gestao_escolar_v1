**Sistema de Gestão Escolar**

**Resumo**

O Sistema de Gestão Escolar é uma aplicação web desenvolvida em PHP com o framework Laravel, que visa ajudar a organizar e controlar as informações de estudantes, turmas e ocorrências em uma escola.

**Funcionalidades**

-   Gerenciamento de estudantes:
    -   Cadastro de estudantes com informações pessoais (nome, data de nascimento, etc.)
    -   Edição e exclusão de estudantes
-   Gerenciamento de turmas:
    -   Cadastro de turmas com informações (nome, descrição, etc.)
    -   Edição e exclusão de turmas
-   Gerenciamento de ocorrências:
    -   Registro de ocorrências (faltas, atrasos, etc.) para cada estudante
    -   Associação de punições a essas ocorrências
-   Relatórios e estatísticas:
    -   Visualização de relatórios de ocorrências por estudante e por turma
    -   Estatísticas de frequência e desempenho dos estudantes

**Tecnologias Utilizadas**

-   PHP
-   Laravel
-   Eloquent (ORM)
-   MySQL (banco de dados)

**Instalação**

1. Clone o repositório Git: `git clone https://github.com/seu-usuario/sistema-de-gestao-escolar.git`
2. Instale as dependências do composer: `composer install`
3. Configure o arquivo `.env` com as informações do banco de dados
4. Execute as migrations: `php artisan migrate`
5. Execute o servidor de desenvolvimento: `php artisan serve`

**Contribuição**

Contribuições são bem-vindas! Se você deseja contribuir com o projeto, por favor, siga os passos abaixo:

1. Faça um fork do repositório Git
2. Crie uma nova branch para sua contribuição
3. Faça as alterações necessárias
4. Envie um pull request para o repositório original

**Licença**

O Sistema de Gestão Escolar é licenciado sob a licença MIT. Leia o arquivo `LICENSE` para mais informações.

**Autores**

-   Lucas Martins

**Agradecimentos**

-   A Codeium por fornecer o suporte técnico e a infraestrutura necessária para o desenvolvimento do projeto.
