# Papelaria Central

Sistema em Laravel 12 de catálogo, cesta de compras e cadastro de artigos.

## Requisitos
- PHP 8.2 ou superior
- Composer
- MySQL (XAMPP)

## Executar
1. Criar um banco chamado `papelaria` no phpMyAdmin.
2. Abrir o terminal na pasta `papelaria-laravel`.
3. Executar `composer install`.
4. Caso o arquivo `.env` não exista, executar `copy .env.example .env` no CMD do Windows e `php artisan key:generate`.
5. Executar `php artisan migrate --seed`.
6. Executar `php artisan serve`.
7. Acessar `http://127.0.0.1:8000`.

## Telas
- `/`: catálogo com filtro por categoria e inclusão na cesta.
- `/cesta`: consulta, alteração de quantidade e remoção de itens.
- `/artigos`: cadastro, listagem, edição e exclusão de artigos.

A cesta usa sessões. O cadastro de artigos utiliza MySQL, Eloquent, migrations e validação. Esta é uma atividade acadêmica, sem login ou pagamento.

Ao publicar no GitHub, o `.env` e a pasta `vendor` devem continuar fora do repositório; o `.env.example` pode ser enviado.
