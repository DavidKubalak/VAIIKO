Inštalácia a spustenie aplikácie

Požiadavky
    Docker a Docker Compose musia byť nainštalované na vašom zariadení.
    Súbor docker-compose.yml je už súčasťou projektu.

1.  Nastavenie aplikácie
    Vytvorenie .env súboru: Skopírujte obsah .env.example na nový súbor .env: (cp .env.example .env)

    .env.example obsahuje predvolené hodnoty. 
    Ak potrebujete iné nastavenia (napr. pre produkciu), upravte hodnoty v .env.

2.  Vytvorenie symbolického linku pre storage: 
    Uistite sa, že symbolický link pre storage je správne nastavený: (php artisan storage:link)

3. Oprávnenia:
   Uistite sa, že priečinky storage a bootstrap/cache majú správne oprávnenia: (chmod -R 777 storage bootstrap/cache)


Spustenie aplikácie

1.  Spustenie Docker kontajnerov: 
    Použite nasledovný príkaz na spustenie všetkých služieb: (docker compose up -d)

    Docker automaticky spustí:

    PHP aplikáciu na http://localhost:8000.
    MySQL databázu.
    PHPMyAdmin na http://localhost:8081.

2.  Obnova databázy (voliteľné): 
    Ak potrebujete obnoviť databázu s testovacími dátami: (docker compose exec app php artisan migrate:fresh --seed)

Ďalšie príkazy

1.  Zastavenie kontajnerov: (docker compose down)

Poznámky
    .env.example obsahuje všetky predvolené hodnoty. 
    Pre iné prostredia (produkčné, staging) odporúčame vytvoriť nové .env súbory s príslušnými konfiguráciami.
    Ak narazíte na problémy s oprávneniami alebo symbolickými linkami, uistite sa, že súborový systém je správne nastavený pre váš operačný systém.
