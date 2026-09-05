# UYE

A Laravel marketplace app for listings, business profiles, and a handful of student-facing mini apps (crossword, job matching, slide marketplace).

**Live demo:** Not currently deployed

## Overview
UYE lets authenticated users create business profiles and post listings that others can browse publicly. It layers in role-based dashboards for admins and students, plus a set of small bundled tools (Teka Teki word puzzles, Veyoyee, JobMatch, and a Slide Market) aimed at a student community. Auth, profile editing, and account management are handled via Laravel Breeze.

## Tech Stack
- PHP 8.2, Laravel 11
- Laravel Breeze (authentication scaffolding)
- `propaganistas/laravel-phone` (phone number validation)
- SQLite (default local database, configurable via `.env`)
- Laravel Pint, PHPUnit, Faker (dev tooling)

## Features
- Public listing browsing (`/listings/public`) with authenticated create/edit/delete for listing owners
- Listing authorization via a dedicated `ListingPolicy`
- Business profile creation and public profile pages
- Role-gated dashboards for `admin` and `student` roles
- User profile management (edit/update/delete) via Breeze
- Bundled mini-features: Teka Teki, Veyoyee, JobMatch, and Slide Market pages

## Getting Started
```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate
npm run build   # or `npm run dev` for local asset watching
php artisan serve
```

| Env var | Purpose |
|---|---|
| `DB_CONNECTION` | Defaults to `sqlite`; switch to `mysql`/`pgsql` and fill in host/credentials for other databases |
| `MAIL_MAILER` | Defaults to `log`; set SMTP credentials for real email delivery |
| `APP_URL` | Base URL used for generated links |

## Deployment
No deployment configuration is present in the repo yet; this is currently run locally only.

---
Built by [Muhammad Taufik](https://taufik.vercel.app)
