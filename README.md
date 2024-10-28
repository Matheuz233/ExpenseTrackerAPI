# ExpenseTrackerAPI 💼

## Descrição 📝
A **ExpenseTrackerAPI** é uma API desenvolvida utilizando o framework Laravel, com o objetivo de gerenciar despesas pessoais, oferecendo funcionalidades como autenticação de usuários, operações CRUD de gastos e filtragem dos dados cadastrados.

## Funcionalidades da API ⚙️

### 1. **Autenticação de Usuários** 🔐
   - Login para autenticar e gerar um token de sessão utilizando Sanctum.
   - Logout para invalidar o token e encerrar a sessão do usuário.

### 2. **CRUD de Gastos** 💸
   - **Create**: Adicionar novos gastos (descrição, valor, data, categoria).
   - **Read**: Listar todos os gastos ou buscar detalhes de um gasto específico.
   - **Update**: Atualizar informações de um gasto.
   - **Delete**: Excluir um gasto do sistema.

### 3. **Filtragem de Dados** 🔍
   - Filtrar os gastos por categoria, data ou valor.
   - Realizar buscas personalizadas com múltiplos critérios.

## Instalação do Projeto 🛠️

### Requisitos 🧩
- PHP 8.1 ou superior.
- Composer.
- Laravel 9.x.
- Banco de dados MySQL ou equivalente.
- Sanctum para autenticação.

### Passo a Passo de Instalação 🚀

#### 1. Clonar o Repositório 🖥️
```bash
git clone https://github.com/Matheuz233/ExpenseTrackerAPI.git
cd ExpenseTrackerAPI
```

#### 2. Instalar Dependências 📦
```bash
composer install
```

#### 3. Configurar o Arquivo `.env` 🔧
Duplique o arquivo `.env.example` e renomeie para `.env`. Ajuste as variáveis de ambiente como o banco de dados:
```bash
cp .env.example .env
```

Configure as informações de banco de dados no arquivo `.env`:
```plaintext
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=expense_tracker
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
```

#### 4. Gerar Chave da Aplicação 🔑
```bash
php artisan key:generate
```

#### 5. Rodar as Migrações e Seeders 🌱
Execute as migrações para criar as tabelas no banco de dados e preencha o banco com dados de teste utilizando as factories configuradas:
```bash
php artisan migrate --seed
```
Isso rodará as migrations e executará os seeders que irão popular o banco de dados com dados iniciais.

### Senha dos Usuários Seedados 🔐
- Todas as senhas dos usuários seedados no banco de dados são definidas como `"password"`.

#### 6. Publicar a Configuração do Sanctum ⚙️
```bash
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
php artisan migrate
```

#### 7. Iniciar o Servidor 🌐
```bash
php artisan serve
```
A aplicação estará disponível em `http://localhost:8000`.

## Endpoints 🔗

### Autenticação 🔑
- **POST /login**: Realiza o login do usuário e retorna um token de acesso.
- **POST /logout**: Faz o logout do usuário e invalida o token de sessão.

### Usuários 👥
- **GET /users**: Retorna uma lista de todos os usuários cadastrados (requer autenticação).
- **GET /users/{user}**: Exibe os detalhes de um usuário específico (requer autenticação).

### Gastos (Expenses) 💳
- **GET /expenses**: Retorna a lista de todos os gastos cadastrados (requer autenticação).
- **GET /expenses/{id}**: Exibe os detalhes de um gasto específico pelo ID (requer autenticação).
- **POST /expenses**: Cria um novo gasto (requer autenticação).
- **PUT /expenses/{id}**: Atualiza um gasto existente (requer autenticação).
- **DELETE /expenses/{id}**: Exclui um gasto do sistema (requer autenticação).

### Filtragem de Gastos 🎯

| Parâmetro       | Tipo      | Descrição                                                                                  | Exemplo                      |
|------------------|-----------|------------------------------------------------------------------------------------------|------------------------------|
| `value[gt]`      | `float`   | Filtra despesas onde o valor é maior que o especificado.                               | `?value[gt]=100`            |
| `value[lt]`      | `float`   | Filtra despesas onde o valor é menor que o especificado.                               | `?value[lt]=500`            |
| `value[gte]`     | `float`   | Filtra despesas onde o valor é maior ou igual ao especificado.                         | `?value[gte]=200`           |
| `value[lte]`     | `float`   | Filtra despesas onde o valor é menor ou igual ao especificado.                         | `?value[lte]=300`           |
| `value[eq]`      | `float`   | Filtra despesas onde o valor é igual ao especificado.                                   | `?value[eq]=150`            |
| `value[ne]`      | `float`   | Filtra despesas onde o valor não é igual ao especificado.                               | `?value[ne]=50`             |
| `category[eq]`   | `string`  | Filtra despesas que pertencem à categoria especificada.                                 | `?category[eq]=alimentacao` |
| `category[ne]`   | `string`  | Filtra despesas que não pertencem à categoria especificada.                             | `?category[ne]=transporte`  |
| `spent_date[gt]` | `date`    | Filtra despesas onde a data gasta é maior que a especificada.                          | `?spent_date[gt]=2024-10-01`|
| `spent_date[lt]` | `date`    | Filtra despesas onde a data gasta é menor que a especificada.                          | `?spent_date[lt]=2024-10-31`|
| `spent_date[gte]`| `date`    | Filtra despesas onde a data gasta é maior ou igual à especificada.                     | `?spent_date[gte]=2024-10-01`|
| `spent_date[lte]`| `date`    | Filtra despesas onde a data gasta é menor ou igual à especificada.                     | `?spent_date[lte]=2024-10-31`|
| `spent_date[eq]` | `date`    | Filtra despesas onde a data gasta é igual à especificada.                              | `?spent_date[eq]=2024-10-15`|
| `spent_date[ne]` | `date`    | Filtra despesas onde a data gasta não é igual à especificada.                          | `?spent_date[ne]=2024-10-20`|


# Feedback 📫
Se você tiver algum feedback ou observação, sinta-se à vontade para entrar em contato pelo meu email: augustomatheus233@gmail.com.
