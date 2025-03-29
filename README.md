# Entrega Express 📦

Sistema de gerenciamento de entregas, onde empresas podem cadastrar entregas e entregadores podem aceitar ou recusar via painel.

## 🔧 Tecnologias

- Laravel 12 + Jetstream (Inertia.js)
- Vue 3 + Tailwind CSS
- MySQL + Redis + Docker (via Sail)

## ⚙️ Funcionalidades

- Autenticação e dashboard para empresas e entregadores
- Cadastro de entregas
- Aceitação ou recusa de entregas por entregadores
- Histórico e status de cada entrega

## 🚀 Como rodar

```bash
git clone https://github.com/seu-usuario/entregaexpress.git
cd entregaexpress
cp .env.example .env
./vendor/bin/sail up -d
./vendor/bin/sail artisan migrate
./vendor/bin/sail npm install
./vendor/bin/sail npm run dev
