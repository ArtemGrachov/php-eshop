# PHP e-Shop
## Educational project

I developed this project to study PHP, MySQL and MVC implementation for PHP.

This is an e-Shop with the following features:

- products
- product taxons
- cart
- checkout processing
- file upload
- admin authentication
- admin panel
- admin users
- internationalization

All the project is written from scratch, third-party libs used only for the front-end path (Bulma.css and jQuery).

## Configs

App configuration is stored in `/app/config` folder.
File `/app/config/config.php` is ignored by Git and used to store your own variables.
File `/app/config/_config.php` is a config template file.

## Installation
You will need some PHP server and SQL database. You have to clone this repository into appropriate folder on your server, then create a database.

Database connection details (DB name, user, password) are stored in config file (see above).

After server and DB preparations:
- import the `/db.sql` file to get database structure;
- execute `/init.php` script to create admin account.

Admin's username and password are taken from `/app/config/config.php` (or `/_config.php`) file.
