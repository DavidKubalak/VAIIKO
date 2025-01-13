# **Ideas**

Tento repozitár obsahuje zdrojový kód pre webovú aplikáciu **Ideas**, semestrálnu prácu z predmentu VAII.
(Vývoj aplikácii pre internet a intranet)

---

## **O projekte**

**Ideas** je platforma navrhnutá na zdieľanie a diskusiu používatľksých nápadoch. Projekt demonštruje:
- Použitie frameworku **Laravel** na tvorbu dynamických a robustných webových aplikácií.
- Responzívne používateľské rozhranie postavené na **Bootstrap-e**.
- Efektívne využitie migrácií databázy, routingu a šablón Blade.

---

## **Funkcie**

- **Správa používateľov**: Obsahuje registráciu, prihlasovanie, úpravu profilu a nahrávanie profilových fotiek.
- **Dynamický obsah**: Používatelia môžu zverejňovať a spravovať svoje nápady.
- **Responzívny dizajn**: Optimalizované pre počítače, tablety a mobilné zariadenia.

---

## **Použité technológie**

- **Framework**: Laravel
- **Frontend styling**: Bootstrap
- **Databáza**: MySQL
- **Kontajnerizácia**: Docker & Docker Compose
- **Programovací jazyk**: PHP 8.2+
- **Správa verzií**: Git & GitHub

---

## **Pokyny na nastavenie**

### **Požiadavky**

Uistite sa, že máte nainštalované:
1. Docker & Docker Compose
2. Git (voliteľné na klonovanie repozitára)

### **Kroky na spustenie lokálne**

1. Klonovanie repozitára:
    ```bash
    git clone https://github.com/DavidKubalak/VAIIKO
    cd VAIIKO
    ```

2. Nastavenie súboru `.env`:
    - Skopírujte `.env.example` na `.env`:
      ```bash
      cp .env.example .env
      ```
    - Aktualizujte databázové premenné v `.env`:
      ```env
      DB_CONNECTION=mysql
      DB_HOST=db
      DB_PORT=3306
      DB_DATABASE=Ideas_db
      DB_USERNAME=root
      DB_PASSWORD=root
      ```

3. Spustenie Docker kontajnerov:
    ```bash
    docker compose up -d
    ```

4. Generovanie aplikačného kľúča:
    ```bash
    docker compose exec app php artisan key:generate
    ```

5. Spustenie migrácií databázy s voliteľným seedovaním:
    ```bash
    docker compose exec app php artisan migrate:fresh --seed
    ```

6. Prístup k aplikácii:
    - Aplikácia: [http://localhost:8000](http://localhost:8000)
    - PHPMyAdmin: [http://localhost:8081](http://localhost:8081)  
      Použite `root` ako používateľské meno a heslo pre databázu.

---

## **Riešenie problémov**

1. **Problémy s profilovými obrázkami**:
   Profilové obrázky sa teraz ukladajú priamo do priečinka `public/uploads`. 
   Tento priečinok je automaticky prístupný bez nutnosti vytvárania symbolických linkov. 
   Ak obrázky nie sú správne zobrazené:
    - Skontrolujte oprávnenia na priečinok `public/uploads`:
      ```bash
      sudo chmod -R 777 public/uploads
      ```

2. **Problémy s oprávneniami**:
   Ak sa vyskytnú chyby oprávnení, spustite:
   ```bash
   sudo chmod -R 777 public storage bootstrap/cache
