# Quick Setup Guide for Shughran

This is a simplified setup guide for experienced developers. For detailed instructions, see [INSTALLATION.md](INSTALLATION.md).

## Prerequisites Checklist

- [ ] PHP 7.1.3+ installed
- [ ] MySQL/MariaDB running
- [ ] Apache/Nginx configured
- [ ] Composer installed

## 5-Minute Setup

### 1. Get the Code
```bash
git clone https://github.com/rafidalhaque/shughran.git
cd shughran
```

### 2. Install Dependencies
```bash
composer install --no-dev --optimize-autoloader
```

### 3. Database Setup
```sql
CREATE DATABASE sushovito_reporting_db_v2 CHARACTER SET utf8 COLLATE utf8_general_ci;
CREATE USER 'shughran_user'@'localhost' IDENTIFIED BY 'your_password';
GRANT ALL PRIVILEGES ON sushovito_reporting_db_v2.* TO 'shughran_user'@'localhost';
FLUSH PRIVILEGES;
```

### 4. Configure Database
```bash
cp app/config/database.example.php app/config/database.php
# Edit database.php with your credentials
```

### 5. Set Permissions
```bash
chmod 755 app/cache/ app/logs/ assets/uploads/
chmod 666 app/config/
```

### 6. Access Application
Open browser → `http://yourdomain.com`

## Default Settings

- **Database Name**: `sushovito_reporting_db_v2`
- **Table Prefix**: `sma_`
- **Timezone**: `Asia/Dhaka`
- **Environment**: Set to `production` for live sites

## Common Issues

1. **500 Error**: Check `.htaccess` and mod_rewrite
2. **DB Error**: Verify credentials in `database.php`
3. **Permissions**: Ensure web server can write to cache/logs/uploads

## Security Note

After installation:
- Change default admin credentials
- Set `ENVIRONMENT` to `production`
- Remove write permissions from config files
- Enable SSL/HTTPS

📖 **Need help?** See the [complete installation guide](INSTALLATION.md)