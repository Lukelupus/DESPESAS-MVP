# Este é um MVP de Despesas - Teste Técnico para Onfly

Este é o backend de um teste técnico FullStack. Os dois passos do teste, assim como requisitados são:

    Desenvolver uma API REST com Laravel, implementando:

        - Autenticação de usuário.

        - CRUD de despesas.

        - Restrição de acesso.

        - CRUD deve estar protegido pela autenticação.



    Na entidade despesas, deverá conter:


           - Id

           - Descrição (descrição da despesa)

           - Data (data de quando ocorreu a despesa)

           - Usuário (usuário dono da despesa, um relacionamento com a tabela de Usuários)

           - Valor (valor em reais da despesa)

    Dada a natureza deste repositório, apenas a parte 1 pode ser testada se apenas este repositório for baixado. Para testar o aplicativo completo, clone também o frontend em:

[Parte2] (https://github.com/Lukelupus/USUARIOS-DESPESAS-MVP)

## Pré-requisitos para teste local

Certifique-se de ter as seguintes ferramentas instaladas em seu sistema:

-   [Git](https://git-scm.com/)
-   [PHP](https://www.php.net/)
-   [Composer](https://getcomposer.org/)
-   [Node.js](https://nodejs.org/)
-   [npm](https://www.npmjs.com/)
-   [Quasar CLI](https://quasar.dev/quasar-cli/installation)
-   [MySQL](https://www.mysql.com/) ou outro sistema de gerenciamento de banco de dados de sua escolha

## Observação

Se o teste for realizado em ferramentas como o Postman, colocar Accept: application/json nos Headers quando visitar os endpoints. Isso porque é o mecanismo do Laravel de saber que é um API client fazendo as requisições!

## Clonando o Repositório

Para começar, clone o repositório em sua máquina local:

```bash
git clone https://github.com/seu-nome-de-usuario/nome-do-repositorio.git
```

## Crie um arquivo .env:

Você deve criar um arquivo .env para as configurações locais do seu aplicativo. Para isto, terá um arquivo .env.example fornecido no repositório. Altere o nome deste arquivo para .env.

Em seguida, abra o arquivo .env e atualize as configurações de banco de dados com suas configurações locais.

## Instale as dependências do Composer:

Execute o Composer para instalar todas as dependências do projeto. Certifique-se de estar no diretório do projeto Laravel:

```bash
composer install
```

## Gerar a chave de aplicativo:

No Laravel, cada aplicativo tem uma chave de criptografia única. Você precisa gerar essa chave executando o seguinte comando:

```bash
php artisan key:generate
```

## Migrar o banco de dados:

Você precisará migrar o banco de dados para criar as tabelas necessárias. Certifique-se de que as configurações de banco de dados no arquivo .env estejam corretas antes de prosseguir. Execute o seguinte comando:

```bash
php artisan migrate
```

## Iniciar o servidor de desenvolvimento:

Por fim, você pode iniciar o servidor de desenvolvimento Laravel com o comando:

```bash
php artisan serve
```

O servidor será iniciado na porta padrão 8000. Você pode acessar seu aplicativo em seu navegador digitando http://localhost:8000.
