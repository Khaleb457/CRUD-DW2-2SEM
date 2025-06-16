# 📚 Sistema de Gerenciamento de Biblioteca

Este projeto é um sistema completo de gerenciamento de uma biblioteca, com funcionalidades para **cadastro, listagem, edição e exclusão de livros, categorias e usuários**, além de um sistema funcional de **login, reserva de livros e visualização de sinopse em tempo real**.

> 🎓 Projeto final da disciplina **Desenvolvimento Web II**, com foco no uso prático de **PHP com PDO**, **padrão MVC**, **Bootstrap 5**, e princípios de **programação orientada a objetos**.

---

## 🚀 Funcionalidades

### 📘 Livros
- Cadastro de livros com título, autor, descrição, status e imagem.
- Upload e atualização da imagem de capa.
- Associação com múltiplas categorias (relação N:N).
- Visualização da sinopse em modal com carregamento assíncrono (AJAX).
- Edição e exclusão de livros com confirmação.
- Sistema de reserva de livros por usuários autenticados.

### 🗂 Categorias
- Cadastro, edição e exclusão de categorias.
- Associação com livros.
- Listagem com design limpo e organizado.

### 👤 Usuários
- Cadastro de usuários com nome, e-mail e senha.
- Login e autenticação via sessões.
- Edição de perfil com atualização de dados.
- Sessão ativa com identificação do usuário logado.

---

## 🧰 Tecnologias Utilizadas

- **PHP (com PDO)**
- **MySQL**
- **Bootstrap 5**
- **HTML5 e CSS3**
- **JavaScript Vanilla**
- **Fetch API para AJAX**
- **Padrão MVC (Model-View-Controller)**

---

## 🔐 Autenticação e Sessões

- Sistema de login com sessões seguras.
- Páginas protegidas que exigem autenticação.
- Sessão usada para identificar o usuário e exibir dados personalizados (ex: nome, reservas, edição de perfil).
- Logout seguro com destruição da sessão.

---

## 🗂 Estrutura de Pastas

```bash
📁 projeto/
│
├── 📁 config/             # Conexão com o banco de dados (db.php via PDO)
├── 📁 controller/         # Controladores (LivroController.php, UsuarioController.php etc.)
├── 📁 model/              # Models com regras de negócio e acesso ao banco
├── 📁 public/
│   ├── 📁 uploads/        # Armazena imagens dos livros
│   └── 📁 partials/       # Componentes reutilizáveis (header, navbar, footer)
├── 📁 views/
│   ├── 📁 livro/          # Telas relacionadas aos livros
│   ├── 📁 categoria/      # Telas de categorias
│   └── 📁 usuario/        # Telas de login, cadastro e edição de perfil
└── README.md              # Documentação do projeto
```

---

## 🔮 Implementações Futuras

Para continuar evoluindo este projeto, estão previstas as seguintes melhorias e funcionalidades:

- 🔒 **Segurança reforçada**:
  - Armazenamento de senhas com `password_hash()` e verificação com `password_verify()`.
  - Proteção contra SQL Injection e CSRF.

- 📄 **Geração de comprovantes de reserva em PDF**.
  - Usuário poderá baixar, visualizar ou imprimir um recibo da sua reserva diretamente do site.

- 📦 **Devolução de livros online**:
  - Implementar um sistema de devolução via site, evitando a necessidade de ida física à biblioteca (com registro de confirmação digital).

- 📧 **Notificações por e-mail**:
  - Alertas de reserva, confirmação de devolução e prazos de entrega diretamente na caixa de entrada.

- 📊 **Painel administrativo com relatórios**:
  - Informações detalhadas sobre reservas, livros populares, usuários ativos, entre outros.

- 🌙 **Modo escuro e acessibilidade**:
  - Modo noturno, contraste aprimorado e melhor compatibilidade com leitores de tela.

---

Desenvolvido como parte da disciplina de Desenvolvimento Web II – 2024.