# LifeImmo

Lancer le site

    - clone git repository
    - Rename .env.example file to .env inside your project root and fill the database information. 
    (windows wont let you do it, so you have to open your console cd your project root directory and run mv .env.example .env )
    - Edit .env and modify informations for your database
    - Insert your keys for "invisible recaptcha" in the .env file (to obtain keys :https://www.google.com/recaptcha/admin)
    - Create the database on Mysql
    - Open the console and cd your project root directory
    - Run php composer install (or composer install.phar for UNIX)
    - Run php artisan key:generate
    - Run php artisan migrate

Lancer le serveur :

    - php artisan serve
    - ou avec le localhost de wamp
