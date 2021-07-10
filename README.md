<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Aktueller Stand im MASTER-Branch

- Code downloaden
- git checkout master
-  Befüllte Testtabelle (sql) befindet sich in der Abgabe auf Moodle
-  Diese Tabelle zB. in phpmyadmin importieren

    DB-Zugangsdaten ( .env File ):
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=haimingermarkttageapp
    DB_USERNAME=root
    DB_PASSWORD=
- dann Laravel Server starten mit php artisan serve
- dann npm script starten mit npm run watch
- Es sollte nun eine 404 Not Found Page geöffnet werden, da die Seite auf localhost:3000/app beheimatet ist.
- Dazu einfach auf Home klicken, oder /app in die Adressleiste geben

Weitere Informationen und Test-Zugangsdaten für den Admin-Login finden Sie in der Abgabe auf Moodle (Benutzerdokumentation).
Dazu muss die befüllte Test-DB importiert und benutzt werden.


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
