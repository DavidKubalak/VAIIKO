Inštalácia a spustenie aplikácie

Požiadavky
Docker a Docker Compose musia byť nainštalované na vašom zariadení.
Súbor docker-compose.yml je už súčasťou projektu.

Nastavenie aplikácie
Vytvorenie .env súboru: Skopírujte obsah .env.example na nový súbor .env: (cp .env.example .env)

Oprávnenia:
Zabezpečte správne oprávnenia pre priečinky: (chmod -R 777 storage bootstrap/cache)

Spustenie aplikácie

Spustenie Docker kontajnerov:
Použite nasledovný príkaz na spustenie všetkých služieb: (docker compose up -d)

Docker automaticky spustí:

PHP aplikáciu na http://localhost:8000.
MySQL databázu.
PHPMyAdmin na http://localhost:8081.

MIGRACIE

Potrebne spustiť migracie inak stranka nebude fungovať : (docker compose exec app php artisan migrate)

Obnova databázy (voliteľné):
Ak potrebujete obnoviť databázu s testovacími dátami teda Test user : (docker compose exec app php artisan migrate:fresh --seed)

Test user -> email: test@example.com
          -> password: password

Ďalšie príkazy

Zastavenie kontajnerov: (docker compose down)

Riešenie problémov

Ak aplikácia nefunguje, skontrolujte, či sú Docker a Docker Compose nainštalované:
(docker --version)
(docker compose version)

Skontrolujte, či kontajnery bežia: (docker ps)

Ak sa vyskytne problém s oprávneniami, spustite: (sudo chmod -R 777 storage bootstrap/cache public/uploads)

