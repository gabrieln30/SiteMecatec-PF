# Mecatec - Sistema de Loja Online

## 📌 Sobre o Projeto

Este projeto é um sistema de loja online desenvolvido para simular o funcionamento básico de um e-commerce.

O sistema permite que usuários criem uma conta, façam login, adicionem produtos ao carrinho e realizem interações com segurança através de verificação em duas etapas.

Além disso, o projeto foi pensado para uma **loja de mecânica**, permitindo que a empresa tenha presença online e conecte o site ao banco de dados da própria loja. Dessa forma, o sistema pode ajudar a **expandir o negócio**, facilitar o acesso de novos clientes e melhorar a organização de informações e produtos disponíveis.

---

# ⚙️ Funcionalidades do Sistema

O sistema possui as seguintes funcionalidades:

- 👤 **Sistema de Cadastro de Usuário**
- 🔑 **Sistema de Login**
- 🚪 **Logout (sair da conta)**
- 🔒 **Verificação se o usuário está autenticado**
- 📧 **Envio de e-mail automático**
- 🔐 **Verificação em duas etapas (2FA)**  
  Um código é enviado diretamente para o e-mail do usuário para confirmar o acesso.
- 🛒 **Sistema de Carrinho de Compras**  
  O usuário pode adicionar produtos ao carrinho ao clicar em comprar.
- 💾 **Integração com banco de dados PostgreSQL**

---

# 🛠️ Tecnologias Utilizadas

O projeto foi desenvolvido utilizando as seguintes tecnologias:

- **PHP**
- **JavaScript**
- **HTML**
- **CSS**
- **PostgreSQL**

---

# 🗄️ Banco de Dados

O sistema utiliza **PostgreSQL** para armazenar informações como:

- usuários cadastrados
- autenticação
- carrinho de compras
- dados necessários para funcionamento do sistema

### Criação do Banco de Dados

```sql
CREATE DATABASE mecanica;
```

### Criação da Tabela de Clientes

```sql
CREATE TABLE cliente (
    id_cliente SERIAL PRIMARY KEY,
    nome_cliente VARCHAR(100) NOT NULL,
    email_cliente VARCHAR(100) NOT NULL UNIQUE,
    senha_cliente VARCHAR(100) NOT NULL,
    cpf_cliente VARCHAR(14) NOT NULL UNIQUE,
    telefone_cliente VARCHAR(15)
);
```

---

# 🎯 Objetivo do Projeto

O principal objetivo deste projeto é:

- Simular um **sistema real de e-commerce para uma loja de mecânica**
- Integrar **site + banco de dados**
- Permitir que clientes encontrem produtos da loja online
- Expandir o alcance do negócio para novos clientes através da internet

---


# 👨‍💻 Autor

Desenvolvido por **Gabriel Nunes** e **Carlos Eduardo**.
