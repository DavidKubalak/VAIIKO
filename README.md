Inštalácia a spustenie aplikácie

Požiadavky
Docker a Docker Compose musia byť nainštalované na vašom zariadení.
Súbor docker-compose.yml je už súčasťou projektu.

Nastavenie aplikácie
Vytvorenie .env súboru: Skopírujte obsah .env.example na nový súbor .env: (cp .env.example .env)

Vytvorenie symbolického linku pre storage:
Uistite sa, že symbolický link pre storage je správne nastavený: (php artisan storage:link)

Oprávnenia:
Uistite sa, že priečinky storage a bootstrap/cache majú správne oprávnenia: (chmod -R 777 storage bootstrap/cache)

Spustenie aplikácie

Spustenie Docker kontajnerov:
Použite nasledovný príkaz na spustenie všetkých služieb: (docker compose up -d)

Docker automaticky spustí:

PHP aplikáciu na http://localhost:8000.
MySQL databázu.
PHPMyAdmin na http://localhost:8081.

Obnova databázy (voliteľné):
Ak potrebujete obnoviť databázu s testovacími dátami teda Test user : (docker compose exec app php artisan migrate:fresh --seed)

Ďalšie príkazy

Zastavenie kontajnerov: (docker compose down)

Riešenie problémov

Ak aplikácia nefunguje, skontrolujte, či sú Docker a Docker Compose nainštalované:
(docker --version)
(docker compose version)

Skontrolujte, či kontajnery bežia: (docker ps)

Ak sa vyskytne problém s oprávneniami, spustite: (sudo chmod -R 777 storage bootstrap/cache)
