<<<<<<< development
# 🧪 Branch: `development`

Esta branch foi utilizada como **ambiente principal de desenvolvimento** do projeto **Sistema de Gerenciamento de Biblioteca**. Todas as funcionalidades novas, correções e aprimoramentos foram primeiramente implementados e testados aqui antes de serem integrados à branch principal (`main`).

---

## 🚧 Objetivo da Branch

A branch `development` serviu como um **espaço seguro para desenvolvimento iterativo**, possibilitando:

- Criação e validação de novas funcionalidades.
- Execução de **testes manuais e testes unitários**.
- Validação de regras de negócio e fluxo de navegação.
- **Refinamento de layout e design responsivo**.
- Prototipagem de elementos visuais com Bootstrap.

---

## 🧪 Principais Atividades Realizadas

- 💻 Desenvolvimento completo das interfaces de **livros**, **categorias** e **usuários**.
- 🔐 Implementação parcial de **autenticação e sessões**, respeitando o padrão de segurança.
- 🖼️ Integração de modais, botões personalizados e responsividade com **Bootstrap 5**.
- 🧹 Refatoração contínua de código para manter um padrão limpo e modular (MVC).
- 📁 Organização da estrutura de pastas para facilitar a manutenção.
- ✅ Validação de entradas com foco na usabilidade.

---

## 🎨 Design e Experiência do Usuário

Durante o desenvolvimento, houve atenção especial à **experiência visual e navegação fluida**, incluindo:

- Layouts consistentes e centralizados com espaçamento adequado.
- Tabelas estilizadas com ações (Editar, Excluir) organizadas horizontalmente.
- Feedbacks visuais em ações de sucesso ou erro (alerts e modals).
- Integração de **ícones e animações sutis** para enriquecer a navegação.

---

## 🧪 Testes Realizados

Embora o foco tenha sido a implementação funcional, alguns testes manuais e unitários foram aplicados, como:

- Testes de persistência no banco via `PDO`.
- Testes de fluxo de reserva de livros.
- Testes de edição de perfil com e sem senha.
- Verificação do carregamento de sinopses via modal (AJAX).
- Simulação de ações com dados inválidos.

---

## 🛠️ Tecnologias Utilizadas

- **PHP (PDO)** — Backend orientado a objetos.
- **MySQL** — Banco de dados relacional.
- **HTML5 + Bootstrap 5** — Layout responsivo e moderno.
- **JavaScript Vanilla** — Ações em tempo real como modais e requisições AJAX.
- **MVC Simplificado** — Organização clara de responsabilidades no sistema.

---

## 🔮 Melhorias Futuras

Embora esta branch tenha finalizado sua função principal de desenvolvimento, ela deixa espaço para testes e melhorias, como:

- 🛡️ Segurança: implementação de hash de senha com `password_hash()` e `password_verify()`.
- 🔑 Autenticação completa com controle de sessões e níveis de acesso (admin, usuário).
- 📄 Geração de comprovantes e reservas em **formato PDF**.
- 🔁 Funcionalidade de **devolução online**, sem necessidade de comparecimento físico.
- 🧪 Integração futura com bibliotecas de **testes automatizados**.

---

## ✅ Status Atual

✔️ **Branch congelada**: a branch `development` está agora congelada, com todas as funcionalidades principais testadas e migradas para `main`. Novas features devem ser iniciadas a partir de branches específicas derivadas desta.

---