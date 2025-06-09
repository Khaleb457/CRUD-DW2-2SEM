# 📚 Sistema de Gerenciamento de Biblioteca

Este projeto é um sistema completo de gerenciamento de uma biblioteca, com funcionalidades para **cadastro, listagem, edição e exclusão de livros, categorias e usuários**, desenvolvido com **PHP Orientado a Objetos** e utilizando o padrão **MVC simplificado**.

> 🎓 Este é o **projeto final da disciplina de Desenvolvimento Web 2** e foi desenvolvido com foco em aprendizado e aplicação prática dos conceitos de PHP, MySQL, Bootstrap e Paradigma Orientado a Objeto.

---

## 🚀 Funcionalidades

### 🔹 Livros
- Cadastro de livros com título, autor, descrição e status.
- Associação de múltiplas categorias (relação N:N).
- Edição e exclusão de livros.
- Visualização das categorias relacionadas a cada livro.

### 🔹 Categorias
- Cadastro de novas categorias de livros.
- Edição e exclusão.
- Listagem com ações rápidas.

### 🔹 Usuários
- Cadastro de usuários com nome, email e senha.
- Estrutura pronta para login e autenticação.
- Integração futura com controle de sessões.

---

## 🗂 Estrutura de Pastas

```bash
📁 projeto/
│
├── 📁 config/             # Conexão com o banco de dados (db.php)
├── 📁 controller/         # Lógica dos controladores (ex: LivroController.php)
├── 📁 model/              # Classes de acesso ao banco (ex: LivroModel.php)
├── 📁 public/
│   └── 📁 partials/       # Navbar, header, footer reutilizáveis
├── 📁 views/
│   ├── 📁 livro/          # Interfaces relacionadas a livros
│   ├── 📁 categoria/      # Interfaces relacionadas a categorias
│   └── 📁 usuario/        # Telas de cadastro/login de usuário
└── README.md              # Este arquivo
