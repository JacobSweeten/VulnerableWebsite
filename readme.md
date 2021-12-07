# Vulnerable Website
This website is only to be used for traning students in web exploitation. All vulnerabilities are intended.

## Requirements
- apache2
- php7.4
- php-mysqli
- mariadb-server

## To install
1. Install all requirements
2. Copy html to /var/www/html
3. Import the sql file
4. Create an sql user 'website'@'localhost' with password "VerySecurePassword"
5. Grant all access to the website database to 'website'@'localhost'
6. Copy apache2.conf to /etc/apache2/apache2.conf