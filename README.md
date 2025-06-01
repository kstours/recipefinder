# Recipe Finder Web App

A simple, lightweight PHP + MySQL web application that allows users to create, share, and discover recipes. Built with core PHP — no frameworks required.

---

## Features

- Secure account system (Bcrypt password hashing)  
- Create, upload, and delete your own recipes  
- Upload images with your recipes  
- Search and view other users' recipes  
- Password recovery via email
- Basic user authentication and session handling  

---

## Setup Instructions
### 1. Clone the repository

```bash
git clone https://github.com/kstours/recipefinder.git /var/www/html/recipefinder
```

Create a MySQL database (e.g., recipefinder) using phpMyAdmin or MySQL CLI.

### 2. Import the database schema:

## Option 1: Using phpMyAdmin

    Select your new database

    Go to the Import tab

    Upload the SQL file: database/recipefinder.sql

## Option 2: Using MySQL CLI

```mysql -u your_user -p your_database < database/recipefinder.sql```

Set file permissions (Linux only):
```
sudo chown -R www-data:www-data /var/www/html/recipefinder
sudo chmod -R 755 /var/www/html/recipefinder
```

### 3. Configure environment variables by creating a .env file in the root directory with the following content:
```
#MySQL database

DB_HOST=localhost
DB_USER=your_mysql_user
DB_PASS=your_mysql_password
DB_NAME=recipefinder
DB_PORT=3306

#Mail Server (for account recovery codes)

MAIL_HOST=your_mail_server
MAIL_USER=your_email_username
MAIL_PASS=your_email_password
MAIL_PORT=port
```
## Live Demo

Try the app live here: https://kylestours.com/recipefinder/


## Tech Stack

  -  PHP (Vanilla)

  -  MySQL

  -  HTML/CSS

  -  JavaScript (optional)

License

This project is open source and free to use under the MIT License.
