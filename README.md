Huszka Gábor szakdolgozata (Google Drive link: https://drive.google.com/drive/folders/1Op7JyR6sm4o3-ebvwOxSDUCWjlY8mvln)

Futtatási útmutató

1. Kód klónozása GitHub-ról a kívánt célmappába

    - git clone https://github.com/hgabo19/Szakdolgozat.git

2. Előfeltételek

    - Megnyitott terminál a projekt mappában.
    - Szükséges eszközök:
        - Composer
        - XAMPP/WAMP VAGY
          PHP 8.1 vagy újabb verzió
          MySQL és egy adatbáziskezelő eszköz, pl. DBeaver

3. Függőségek telepítése

    - Laravel függőségek telepítése
        - composer install
    - Javascript és Tailwind CSS függőségek telepítése
        - npm install

4. Adatbázis beimportálása (opcionális, friss adatbázishoz nem szükséges)

    - Google Drive linken elérhető liftitup.sql és images mappa letöltése
    - liftitup.sql beimportálása phpMyAdmin felületen, vagy más adatbáziskezelőben
    - images mappa elhelyezése a projekt storage/app/public/ mappájába

5. Környezeti beállítások a projektben

    - .env.example fájl átnevezése .env-re
    - port (DB_PORT) beállítása és adatbázis nevének (DB_DATABASE) megadása a .env fájlban. Az adatbázis neve legyen „liftitup”.
    - Ha a MySQL alapértelmezett portja (3306) nem működik XAMPP-ban indítás után, érdemes megpróbálni 3307-re átállítani. Emellett az Apache szervert is el kell indítani, hogy működjön a XAMPP MySQL szolgáltatása.
    - Adatbázis felhasználónév és jelszó beírása a .env fájlba

6. Alkalmazás kulcs generálása

    - php artisan key:generate parancs hatására beállítódik az „APP_KEY” a .env fájlban.

7. Adatbázis migrációk futtatása

    - php artisan migrate

8. Képkezelési link létrehozása

    - php artisan storage:link

9. Laravel alkalmazás futtatása

    - php artisan serve

10. Tailwind CSS futtatása

    - npm run dev

Ezután az oldal elérhető a http://127.0.0.1:8000/ URL alatt (vagy azon, ami meg lett adva a .env fájlban).
