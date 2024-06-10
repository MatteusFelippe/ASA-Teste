# ASA-Teste

ASA-Teste é uma aplicação básica utilizando Laravel que gerencia médicos, pacientes e atendimentos. A aplicação permite o cadastro, a consulta, a atualização e a exclusão de cada uma dessas entidades.

## Tecnologias Utilizadas

- Laravel
- MySQL
- Docker

## Funcionalidades

- Cadastro de médicos
- Cadastro de pacientes
- Cadastro de atendimentos
- Consulta de médicos, pacientes e atendimentos
- Atualização de informações de médicos, pacientes e atendimentos
- Exclusão de médicos, pacientes e atendimentos

## Pré-requisitos

Certifique-se de ter o Docker e o Docker Compose instalados na sua máquina.

- [Docker](https://docs.docker.com/get-docker/)
- [Docker Compose](https://docs.docker.com/compose/install/)

## Configuração do Projeto

Siga os passos abaixo para configurar e rodar o projeto localmente.

### 1. Clone o repositório

```bash
git clone https://github.com/MatteusFelippe/ASA-Teste.git
cd ASA-Teste
```

### 2. Copie o arquivo de ambiente

```bash
cp .env.example .env
```

### 3. Atualize as variáveis de ambiente no arquivo .env

Certifique-se de configurar as variáveis de ambiente relacionadas ao banco de dados e ao Docker. Por exemplo:

```bash
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=asa_teste
DB_USERNAME=root
DB_PASSWORD=root
```

### 4. Configure a aplicação com Docker

```bash
docker-compose up -d
```

Isso irá iniciar os contêineres do Docker para a aplicação Laravel e o banco de dados MySQL.

### 5. Instale as dependências do Laravel

```bash
docker-compose exec app composer install
```

### 6. Gere a chave da aplicação

```bash
docker-compose exec app php artisan key:generate
```

### 7. Execute as migrações do banco de dados

```bash
docker-compose exec app php artisan migrate
```

## Acesso à Aplicação

Após seguir os passos acima, a aplicação estará disponível em http://localhost.

## Estrutura do Projeto

- **app/**: Contém o código principal da aplicação Laravel
- **database/**: Contém migrações, seeders e o arquivo do banco de dados SQLite
- **resources/**: Contém o código das telas da aplicação
- **routes/**: Define as rotas da aplicação

## Contribuição

Contribuições são bem-vindas! Por favor, faça um fork do repositório e envie um pull request com suas alterações.

## Licença

Este projeto está licenciado sob a GPL-3.0 License.