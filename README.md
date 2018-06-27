# LifeImmo
 
Lancer le site 
    - clone git repository
    - Rename .env.example file to .envinside your project root and fill the database information. (windows wont let      you do it, so you have to open your console cd your project root directory and run mv .env.example .env )
    - Edit .env and modify informations for your database 
    - Open the console and cd your project root directory
    - Run php composer.phar install (or composer install)
    - Run php artisan key:generate
    - Run php artisan migrate

Lancer le serveur : 
    - php artisan serve
    - ou avec le localhost de wamp
