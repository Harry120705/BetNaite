# BetNaite


# Requisitos Funcionais

1. Manter Usuários
    1.1 Criar Novo Usuário
    1.2 Listar Usuários
    1.3 Excluir Usuário
    1.4 Entrar no Sistema
    1.5 Sair do Sistema

2. Manter Conta
    2.1 Criar Conta(disparada pela criação de um usuário)
    2.2 Depositar
    2.3 Sacar
    2.4 Visualizar dados da conta(saldo)

3. Manter Lançamentos
    3.1 Criar lançamento
    3.2 Listar lançamento
    3.3 Excluir lançamento
    3.1 Pesquisar lançamento

4. Manter Jogo
    4.1 Criar Jogo
    4.2 Alterar Jogo
    4.3 Listar Jogos
    4.4 Excluir Jogo
    4.5 Pesquisar Jogo

5. Manter opções de jogo
    5.1 Criar opção de jogo
    5.2 Alterar opção de jogo
    5.3 Excluir opção de jogo

5. Manter Apostas
    5.1 Apostar
    5.2 Cancelar Apostas


Depositar Dinheiro
Sacar Dinheiro
Admnistrar Jogo (Criar, Alterar, Listar, Excluir, Pesquisar)
Apostar
Cancelar Aposta(Até certo tempo)
Admnistrar Usuário (Criar, Alterar, Listar, Excluir, Pesquisar, entrar no Sistema, Sair do Sistema)


## Overview
BetNaite is a web application designed for managing online game betting. It provides functionalities for user management, account handling, game management, and betting operations.

## Features

### User Management
- **User Registration**: New users can create an account through a registration form.
- **Login/Logout**: Users can log in using their email and password, with session management for secure access.
- **Profile Management**: Users can view and edit their personal information, including name and email.
- **Password Change**: Users can change their passwords securely.

### Account Management
- **Account Creation**: An account is automatically created upon user registration.
- **Deposit and Withdrawal**: Users can deposit and withdraw funds from their accounts.
- **Account Balance**: Users can view their current account balance.

### Game Management
- **Game Creation**: Administrators can create new games.
- **Game Modification**: Existing games can be altered as needed.
- **Game Listing**: Users can view a list of available games.
- **Game Deletion**: Administrators can remove games from the system.

### Betting Management
- **Place Bets**: Users can place bets on available games.
- **Cancel Bets**: Users can cancel their bets within a specified time frame.
- **View Bets**: Users can view their betting history.

## Installation

1. Clone the repository to your local machine.
2. Set up a MySQL database and import the SQL schema from `sql/schema.sql`.
3. Configure the database connection settings in `src/config/database.php`.
4. Run a local server (e.g., XAMPP) and navigate to `public/index.php` to access the application.

## Technologies Used
- PHP
- MySQL
- HTML/CSS
- JavaScript

## Future Enhancements
- Implement user roles and permissions for better access control.
- Add features for game statistics and user betting analytics.
- Enhance the user interface with modern design frameworks.

## License
This project is licensed under the MIT License.