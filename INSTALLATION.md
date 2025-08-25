# Shughran Installation Guide

This guide provides comprehensive setup instructions for the Shughran organizational management system - a CodeIgniter-based PHP application for managing organizational departments, reports, and administrative functions.

## Table of Contents

1. [System Requirements](#system-requirements)
2. [Server Setup](#server-setup)
3. [Database Setup](#database-setup)
4. [Application Installation](#application-installation)
5. [Configuration](#configuration)
6. [Post-Installation](#post-installation)
7. [Troubleshooting](#troubleshooting)

## System Requirements

### Minimum Requirements

- **PHP**: Version 7.1.3 or higher
- **Database**: MySQL 5.6+ or MariaDB 10.0+
- **Web Server**: Apache 2.4+ or Nginx 1.12+
- **Memory**: 256MB RAM minimum, 512MB recommended
- **Disk Space**: 500MB minimum
- **Extensions**: 
  - php-mysqli
  - php-mbstring
  - php-curl
  - php-gd
  - php-zip
  - php-xml

### Recommended Requirements

- **PHP**: Version 7.4 or 8.0+
- **Database**: MySQL 8.0+ or MariaDB 10.5+
- **Memory**: 1GB RAM or more
- **Extensions**: All minimum extensions plus php-opcache

## Server Setup

### Apache Configuration

1. **Enable mod_rewrite**:
   ```bash
   sudo a2enmod rewrite
   sudo systemctl restart apache2
   ```

2. **Virtual Host Configuration**:
   ```apache
   <VirtualHost *:80>
       ServerName yourdomain.com
       DocumentRoot /var/www/html/shughran
       
       <Directory /var/www/html/shughran>
           Options Indexes FollowSymLinks
           AllowOverride All
           Require all granted
       </Directory>
       
       ErrorLog ${APACHE_LOG_DIR}/shughran_error.log
       CustomLog ${APACHE_LOG_DIR}/shughran_access.log combined
   </VirtualHost>
   ```

### Nginx Configuration

```nginx
server {
    listen 80;
    server_name yourdomain.com;
    root /var/www/html/shughran;
    index index.php index.html index.htm;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php7.4-fpm.sock;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.ht {
        deny all;
    }
}
```

## Database Setup

### 1. Create MySQL Database

```sql
-- Login to MySQL as root
mysql -u root -p

-- Create database
CREATE DATABASE sushovito_reporting_db_v2 CHARACTER SET utf8 COLLATE utf8_general_ci;

-- Create database user (optional but recommended)
CREATE USER 'shughran_user'@'localhost' IDENTIFIED BY 'secure_password_here';

-- Grant privileges
GRANT ALL PRIVILEGES ON sushovito_reporting_db_v2.* TO 'shughran_user'@'localhost';

-- Flush privileges
FLUSH PRIVILEGES;

-- Exit MySQL
EXIT;
```

### 2. Database Configuration

The application uses CodeIgniter's migration system to set up the database schema. The migrations will be run automatically during the installation process.

**Database Details:**
- **Name**: `sushovito_reporting_db_v2`
- **Prefix**: `sma_`
- **Character Set**: `utf8`
- **Collation**: `utf8_general_ci`
- **Engine**: InnoDB (default)

### 3. Required Database Tables

The application will create the following types of tables:
- User management and authentication
- Organizational departments and branches
- Reports and analytics
- Settings and configuration
- Payment and transaction tracking
- Notification systems

## Application Installation

### 1. Download and Extract

```bash
# Clone the repository or extract the downloaded files
cd /var/www/html
git clone https://github.com/rafidalhaque/shughran.git
# OR extract ZIP file
# unzip shughran.zip

# Set proper ownership
sudo chown -R www-data:www-data shughran/
```

### 2. Install Dependencies

```bash
cd shughran

# Install PHP dependencies via Composer
composer install --no-dev --optimize-autoloader

# If composer is not installed, install it first:
# curl -sS https://getcomposer.org/installer | php
# sudo mv composer.phar /usr/local/bin/composer
```

### 3. Set Directory Permissions

```bash
# Set write permissions for cache and logs
chmod 755 app/cache/
chmod 755 app/logs/
chmod 755 assets/uploads/
chmod 755 assets/uploads/csv/
chmod 755 assets/uploads/avatars/
chmod 755 assets/uploads/thumbs/

# Set write permissions for config files
chmod 666 app/config/
chmod 666 index.php

# For update functionality
chmod 755 update/
chmod 666 update/config/
```

## Configuration

### 1. Database Configuration

```bash
# Copy the example database configuration
cp app/config/database.example.php app/config/database.php

# Edit the database configuration
nano app/config/database.php
```

Update the database settings:

```php
$db['default'] = array(
    'dsn'      => '',
    'hostname' => 'localhost',           // Your database host
    'username' => 'shughran_user',       // Your database username
    'password' => 'secure_password_here', // Your database password
    'database' => 'sushovito_reporting_db_v2', // Your database name
    'dbdriver' => 'mysqli',
    'dbprefix' => 'sma_',
    'pconnect' => FALSE,
    'db_debug' => FALSE,  // Set to FALSE in production
    'cache_on' => FALSE,
    'cachedir' => '',
    'char_set' => 'utf8',
    'dbcollat' => 'utf8_general_ci',
    'swap_pre' => '',
    'encrypt'  => FALSE,
    'compress' => FALSE,
    'stricton' => FALSE,
    'failover' => array(),
    'save_queries' => FALSE  // Set to FALSE in production
);
```

### 2. Application Configuration

Create the main configuration file:

```bash
# If config.php doesn't exist, create it based on CodeIgniter defaults
cp system/core/Common.php app/config/config.php  # This is just a placeholder
```

Edit `app/config/config.php` with your specific settings:

```php
$config['base_url'] = 'https://yourdomain.com/';  // Your domain
$config['encryption_key'] = 'your-32-character-encryption-key-here';
$config['timezone'] = 'Asia/Dhaka';  // Your timezone
```

### 3. Environment Configuration

Edit the main `index.php` file:

```php
// Set environment to production for live sites
define('ENVIRONMENT', 'production');

// Set your timezone
$timezone = "Asia/Dhaka";  // Change to your timezone
```

### 4. URL Rewriting

Ensure `.htaccess` is properly configured:

```apache
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php/$1 [L]

# Security measures
<Files "composer.json">
    Order allow,deny
    Deny from all
</Files>

<Files "composer.lock">
    Order allow,deny
    Deny from all
</Files>

<Files ".env">
    Order allow,deny
    Deny from all
</Files>
```

## Post-Installation

### 1. Run Database Migrations

The application includes a migration system. Access your site and the migrations should run automatically, or you can run them manually:

```bash
# If needed, run migrations via CLI
php index.php migrate
```

### 2. Initial Setup

1. **Access the Application**:
   - Open your web browser
   - Navigate to your domain (e.g., `https://yourdomain.com`)
   - You should see the login page

2. **Default Admin Credentials**:
   - Username: `admin` (check application documentation)
   - Password: `admin123` (check application documentation)
   - **Important**: Change these immediately after first login

3. **System Configuration**:
   - Login to the admin panel
   - Navigate to Settings/Configuration
   - Update company information, logo, and system preferences
   - Configure email settings for notifications
   - Set up payment gateways if needed

### 3. Security Hardening

```bash
# Remove write permissions after installation
chmod 644 app/config/database.php
chmod 644 app/config/config.php

# Remove or restrict access to installation files
rm -rf update/  # Remove if not needed for future updates

# Set secure permissions
find . -type f -exec chmod 644 {} \;
find . -type d -exec chmod 755 {} \;

# Keep upload directories writable
chmod -R 755 assets/uploads/
chmod -R 755 app/cache/
chmod -R 755 app/logs/
```

### 4. SSL Certificate (Recommended)

```bash
# Using Let's Encrypt (example for Ubuntu/Debian)
sudo apt install certbot python3-certbot-apache
sudo certbot --apache -d yourdomain.com
```

## Troubleshooting

### Common Issues

1. **Database Connection Error**:
   - Verify database credentials in `app/config/database.php`
   - Ensure MySQL service is running: `sudo systemctl status mysql`
   - Check database user permissions

2. **File Permission Errors**:
   ```bash
   # Reset permissions
   sudo chown -R www-data:www-data /var/www/html/shughran/
   chmod -R 755 /var/www/html/shughran/
   chmod -R 777 app/cache/ app/logs/ assets/uploads/
   ```

3. **500 Internal Server Error**:
   - Check Apache/Nginx error logs
   - Verify `.htaccess` file exists and is readable
   - Ensure mod_rewrite is enabled (Apache)
   - Check PHP error logs

4. **CodeIgniter Errors**:
   - Enable debugging in `index.php`: `define('ENVIRONMENT', 'development');`
   - Check `app/logs/` for application-specific errors
   - Verify all required PHP extensions are installed

5. **Migration Errors**:
   ```bash
   # Check migration status
   # Access: yourdomain.com/migrate (if enabled)
   # Or run manually via CLI
   ```

### Performance Optimization

1. **Enable PHP OPcache**:
   ```ini
   ; In php.ini
   opcache.enable=1
   opcache.memory_consumption=128
   opcache.max_accelerated_files=4000
   ```

2. **Database Optimization**:
   ```sql
   -- Regular maintenance
   OPTIMIZE TABLE sma_users;
   OPTIMIZE TABLE sma_settings;
   ```

3. **File Caching**:
   - Enable CodeIgniter caching in production
   - Configure appropriate cache drivers

### Log Files

Monitor these log files for issues:
- Apache: `/var/log/apache2/error.log`
- Nginx: `/var/log/nginx/error.log`
- PHP: `/var/log/php/error.log`
- Application: `app/logs/`

## Support

For additional support:
1. Check the application logs in `app/logs/`
2. Review CodeIgniter documentation: https://codeigniter.com/docs
3. Verify server requirements and PHP extensions
4. Check database connectivity and permissions

## Security Notes

- Always keep the application updated
- Use strong passwords for database and admin accounts
- Regular database backups are recommended
- Monitor access logs for suspicious activity
- Keep PHP and server software updated
- Use HTTPS in production environments