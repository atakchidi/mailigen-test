# mailigen-test
mini php framework around provided templates

##Requirements
* php
* composer
* mysql

##Set up
*  Change env variables if any of provided defaults does not satisfy your needs.
```
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_USER=root
    DB_PASS=secret
    DB_NAME=mailigen_test_app
```
* run composer install
* serve the app with /web as a root directory e.g
```
php -S 127.0.0.1:8080 -t ./web
```
