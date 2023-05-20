# ArbitrarilyTong's dynamic RESTful API server
Use for OTA Updates checking 

# Setting up the app
1. Use composer to install environment before you use or develop it
```bash
composer install —no-dev
```

2. Create a file named `.env`
```
###> symfony/framework-bundle ###
APP_ENV=prod
APP_SECRET=
###< symfony/framework-bundle ###

###> doctrine/doctrine-bundle ###
# MySQL:
# DATABASE_URL="mysql://username:password@127.0.0.1:3306/database_name?serverVersion=8&charset=utf8mb4"

###< doctrine/doctrine-bundle ###
```

You can change the MySQL version in .env,please visit [Symfony document](https://symfony.com/doc/current/doctrine.html) to learn more

3. Create a MySQL database and use MySQL commands to initialize the database
Please run these commands in MySQL console

```sql
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE TABLE IF NOT EXISTS ota (
  id int(11) NOT NULL AUTO_INCREMENT,
  name1 longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  name2 longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  filename longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  size bigint(20) NOT NULL,
  url longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  version longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  filehash longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  maintainers longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  info_id longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  datetime datetime NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO ota (id, name1, name2, filename, size, url, version, filehash, maintainers, info_id, datetime) VALUES
  (1, 'name1A', 'name2A', 'filename', 114514, 'url', 'version', 'filehash', 'a:2:{i:0;s:11:"maintainer1";i:1;s:11:"maintainer2";}', 'id', '1970-01-23 13:16:50');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
```

4. Setting up rewrite rules
If you are using Apache,you can skip this step,because `.htaccess` is ready for you

If you are using Nginx,please write these rewrite rules in your Nginx config file
```
	rewrite ^/(.*)$ /public/$1 last;
```
