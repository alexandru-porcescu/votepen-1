## Installation Steps

Installing the Server.

### Apache
```
sudo apt-get update
sudo apt-get install apache2
sudo systemctl restart apache2
```
### MySQL and phpMyAdmin
```
sudo apt-get install mysql-server
sudo apt-get install php libapache2-mod-php php-mcrypt php-mysql
sudo apt-get install phpmyadmin
sudo systemctl restart apache2
```
### PHP CLI
```
sudo apt-get install php-cli
```
### PHP 7.1
```
sudo apt-get install -y python-software-properties
sudo add-apt-repository -y ppa:ondrej/php
sudo apt-get update
sudo apt-get install php7.1
```
### PHP MBString
```
sudo apt-get install php7.1-mbstring
```
### PHP XML Dom
```
sudo apt-get install php7.1-xml
```
### Curl
```
sudo apt-get install curl
sudo apt-get install php7.1-curl
```
### Simple
```
sudo apt-get install -f apache2 mysql-server mysql-client php7.2-mysql php7.2-curl php7.2-json php7.2-cgi php7.2 phpmyadmin libapache2-mod-php7.2 php7.2-mbstring php7.2-fpm php7.2-cli php7.2-common php7.2-gd php7.2-bz2 php7.2-xml php7.2-intl php-pear php-imagick php7.2-imap php-memcache php7.2-pspell php7.2-recode php7.2-sqlite3 php7.2-tidy php7.2-xmlrpc php7.2-xsl php-gettext php-apcu
```
### PHP Composer
```
sudo apt-get install composer
```
## Application Setup

After cloning the repository, first create a .env from the example file:

```
cp .env.example .env
```

Open ".env" file with your desired editor and enter your services info.
Now run below commands:

```
composer install
php artisan key:generate
php artisan migrate
php artisan passport:install
npm install
npm run prod
```

### Create admin user

To create an admin user, run the below command from the root of the project

```
php artisan db:seed --class=AdminUserSeeder
```

The login details for the admin user is `admin` and `admin`.

After running the seeder, be sure to clear your redis cache, you should now be able to navigate to `https://example.com/backend`