<p align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="200" alt="Laravel Logo">
</p>

<p align="center">
  <strong>CompareJa</strong> — Plataforma de comparação de preços em supermercados
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-11.x-red?logo=laravel" alt="Laravel 11">
  <img src="https://img.shields.io/badge/PHP-8.2%2B-blue?logo=php" alt="PHP 8.2+">
  <img src="https://img.shields.io/badge/MySQL-8.0%2B-orange?logo=mysql" alt="MySQL">
  <img src="https://img.shields.io/badge/Bootstrap-5.3-purple?logo=bootstrap" alt="Bootstrap 5">
</p>

---

## Sobre o Projeto

O **CompareJa** é uma aplicação web para comparação de preços de produtos em supermercados da região de Campinas/SP. A plataforma permite que usuários visualizem produtos, comparem preços entre diferentes supermercados e filtrem por categoria ou cidade.

---

## Funcionalidades

- Listagem paginada de produtos com filtro por categoria e cidade
- Busca de produtos por nome ou fabricante
- Página de descrição do produto com lista de supermercados disponíveis e simulação de preços
- Cadastro, edição e exclusão de produtos (área autenticada)
- Gerenciamento de produtos via DataTable com AJAX
- Autenticação com sessão (login, logout, cadastro)
- Soft delete em todas as entidades
- Upload de imagens de produtos
- Perfil de usuário

---

## Requisitos

| Ferramenta | Versão mínima |
|------------|--------------|
| PHP        | 8.2          |
| Composer   | 2.x          |
| MySQL      | 8.0          |
| Node.js    | 18.x *(opcional, para assets)* |

Extensões PHP necessárias: `pdo`, `pdo_mysql`, `mbstring`, `openssl`, `tokenizer`, `xml`, `ctype`, `json`, `bcmath`, `fileinfo`, `gd`.

---

## Instalação

### 1. Clonar o repositório

```bash
git clone https://github.com/seu-usuario/compareja.git
cd compareja
```

### 2. Instalar dependências PHP

```bash
composer install
```

### 3. Copiar e configurar o `.env`

```bash
cp .env.example .env
```

Edite o arquivo `.env` com as credenciais do seu banco de dados:

```dotenv
APP_NAME=CompareJa
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=compareja
DB_USERNAME=root
DB_PASSWORD=sua_senha
```

### 4. Gerar a chave da aplicação

```bash
php artisan key:generate
```

### 5. Criar o banco de dados

Crie o banco de dados manualmente no MySQL antes de rodar as migrations:

```sql
CREATE DATABASE compareja CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

### 6. Executar as migrations

```bash
php artisan migrate
```

Isso criará todas as tabelas na ordem correta:

| Ordem | Tabela                   | Descrição                                      |
|-------|--------------------------|------------------------------------------------|
| 1     | `usuario`                | Usuários da plataforma                         |
| 2     | `categoria`              | Categorias de produtos                         |
| 3     | `cidade`                 | Cidades disponíveis                            |
| 4     | `produto`                | Produtos cadastrados                           |
| 5     | `produto_categoria_cidade` | Relação produto × categoria × cidade         |
| 6     | `supermercado`           | Supermercados cadastrados                      |
| 7     | `produto_supermercado`   | Relação produto × supermercado                 |

### 7. Popular o banco com os dados iniciais (Seeders)

```bash
php artisan db:seed
```

Isso executará os seeders na ordem correta via `DatabaseSeeder`:

```
UsuarioSeeder              → 1 usuário de teste
CategoriaSeeder            → 19 categorias
CidadeSeeder               → 20 cidades da região de Campinas/SP
ProdutoSeeder              → 35 produtos
SupermercadoSeeder         → 10 supermercados
ProdutoCategoriaCidadeSeeder → 30 vínculos produto×categoria×cidade
ProdutoSupermercadoSeeder  → 80 vínculos produto×supermercado
```

> Para rodar migrations e seeders em um único comando:
> ```bash
> php artisan migrate --seed
> ```

> Para **resetar** e recriar tudo do zero:
> ```bash
> php artisan migrate:fresh --seed
> ```

### 8. Criar o link simbólico de storage

```bash
php artisan storage:link
```

Isso cria o link `public/storage → storage/app/public`, necessário para servir as imagens de produtos e supermercados.

### 9. Criar as pastas de imagens

```bash
mkdir -p storage/app/public/img-produtos
mkdir -p storage/app/public/img-supermercados
mkdir -p storage/app/public/img-profiles
```

### 10. Iniciar o servidor de desenvolvimento

```bash
php artisan serve
```

Acesse: [http://localhost:8000](http://localhost:8000)

---

## Usuário padrão (após seed)

| Campo  | Valor                    |
|--------|--------------------------|
| E-mail | jonas.almeida@gmail.com  |
| Senha  | 123456                   |

---

## Estrutura do Projeto

```
compareja/
├── app/
│   ├── Helpers/
│   │   └── helpers.php              # Funções globais (currency, formatDate, etc.)
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── AuthController.php   # Login, logout, cadastro
│   │   │   ├── ProductController.php # CRUD de produtos
│   │   │   └── UserController.php   # Perfil do usuário
│   │   └── Middleware/
│   │       └── Authenticate.php     # Proteção de rotas autenticadas
│   ├── Models/
│   │   ├── Categoria.php
│   │   ├── Cidade.php
│   │   ├── Produto.php
│   │   ├── Supermercado.php
│   │   └── Usuario.php
│   └── Providers/
│       └── AppServiceProvider.php
├── bootstrap/
│   ├── app.php                      # Ponto de entrada da aplicação
│   └── providers.php
├── config/
│   ├── app.php
│   ├── cache.php
│   ├── database.php
│   ├── filesystems.php
│   ├── logging.php
│   └── session.php
├── database/
│   ├── migrations/                  # 7 migrations na ordem correta
│   └── seeders/                     # 7 seeders + DatabaseSeeder
├── public/
│   ├── index.php                    # Entry point web
│   ├── .htaccess
│   └── storage/                     # Link simbólico (gerado via artisan)
├── resources/
│   └── views/
│       ├── auth/
│       │   ├── signin.blade.php
│       │   └── signup.blade.php
│       ├── layouts/
│       │   ├── app.blade.php
│       │   └── navbar.blade.php
│       ├── product/
│       │   ├── index.blade.php
│       │   ├── description.blade.php
│       │   ├── form.blade.php
│       │   ├── list.blade.php
│       │   └── show.blade.php
│       ├── user/
│       │   └── profile.blade.php
│       └── errors/
│           └── unauthorized.blade.php
├── routes/
│   ├── web.php
│   └── console.php
├── storage/
│   └── app/public/
│       ├── img-produtos/
│       ├── img-supermercados/
│       └── img-profiles/
├── .env.example
├── .gitignore
├── artisan
└── composer.json
```

---

## Rotas da aplicação

### Públicas

| Método | URI                        | Nome                  | Descrição                        |
|--------|----------------------------|-----------------------|----------------------------------|
| GET    | `/`                        | `home`                | Redireciona para lista de produtos|
| GET    | `/produto`                 | `produto.index`       | Listagem paginada de produtos    |
| GET    | `/produto/buscar`          | `produto.search`      | Busca por nome/fabricante        |
| GET    | `/produto/{id}/descricao`  | `produto.description` | Detalhes públicos do produto     |
| GET    | `/auth/login`              | `auth.login`          | Formulário de login              |
| POST   | `/auth/login`              | `auth.do_login`       | Autenticação                     |
| GET    | `/auth/logout`             | `auth.logout`         | Encerrar sessão                  |
| GET    | `/auth/register`           | `auth.register`       | Formulário de cadastro           |
| POST   | `/auth/register`           | `auth.signup`         | Criar conta                      |
| GET    | `/unauthorized`            | `unauthorized`        | Página de acesso negado          |

### Autenticadas (requer login)

| Método | URI                         | Nome               | Descrição                        |
|--------|-----------------------------|--------------------|----------------------------------|
| GET    | `/produto/listar`           | `produto.list`     | DataTable de produtos            |
| GET    | `/produto/adicionar`        | `produto.create`   | Formulário de criação            |
| POST   | `/produto/salvar`           | `produto.store`    | Salvar novo produto              |
| GET    | `/produto/{id}/exibir`      | `produto.show`     | Exibir produto (área admin)      |
| GET    | `/produto/{id}/editar`      | `produto.edit`     | Formulário de edição             |
| POST   | `/produto/{id}/atualizar`   | `produto.update`   | Atualizar produto                |
| POST   | `/produto/{id}/excluir`     | `produto.destroy`  | Excluir produto (soft delete)    |
| GET    | `/perfil`                   | `user.profile`     | Perfil do usuário                |
| POST   | `/perfil/atualizar`         | `user.update`      | Atualizar perfil                 |

---

## Helpers disponíveis

Definidos em `app/Helpers/helpers.php` e carregados automaticamente via `composer.json`:

| Função             | Descrição                                                         |
|--------------------|-------------------------------------------------------------------|
| `currency($value)` | Formata valor para `R$ 1.234,56`                                  |
| `currency($value, true)` | Converte `1.234,56` para `1234.56` (salvar no banco)        |
| `formatDate($date, $format)` | Formata data com timezone `America/Fortaleza`           |
| `product_value($price)` | Gera um preço simulado ±20% do valor base                    |
| `isArrayOfArrays($array)` | Verifica se um array é multidimensional                    |
| `transformArray($array)` | Converte array de arrays em array de objetos                | 

---

## Tecnologias utilizadas

- **[Laravel 11](https://laravel.com)** — Framework PHP
- **[Bootstrap 5.3](https://getbootstrap.com)** — Interface responsiva
- **[Font Awesome 6](https://fontawesome.com)** — Ícones
- **[Toastr.js](https://codestin.com/utility/all.php?q=https%3A%2F%2Fgithub.com%2FCodeSeven%2Ftoastr)** — Notificações toast
- **[DataTables 1.13](https://datatables.net)** — Tabela de gerenciamento com AJAX
- **[jQuery 3.7](https://jquery.com)** — Manipulação DOM

---

## Licença

Este projeto é de uso acadêmico. Sinta-se livre para adaptá-lo conforme sua necessidade.<br>
O framework Laravel é um software de código aberto licenciado sob a [MIT license](https://opensource.org/licenses/MIT).