# Shughran - Organizational Management System

**Shughran** is a comprehensive organizational management system built on CodeIgniter framework. It provides a robust platform for managing organizational departments, generating reports, handling administrative functions, and tracking organizational activities across multiple departments and branches.

## 🏢 Overview

Shughran is designed to serve large organizational structures with multiple departments, supporting complex reporting hierarchies and administrative workflows. The system features a sophisticated multi-department architecture supporting 25+ organizational departments including Literature, International Affairs, Education, Business, and many more.

## ✨ Key Features

### 🎯 Multi-Department Management
- **25+ Department Support**: Literature, International, Education, Business, Training, Social Welfare, and more
- **Hierarchical Structure**: Support for branches, sub-branches, and organizational units
- **Department-Specific Reporting**: Customized reporting modules for each department
- **Cross-Department Integration**: Unified data management across all organizational units

### 👥 User Management & Security
- **Role-Based Access Control**: Owner, Admin, Customer, Supplier roles with granular permissions
- **Multi-Language Support**: Built-in support for Bangla and English with extensible language system
- **Authentication System**: Secure login with session management and CSRF protection
- **User Activity Tracking**: Comprehensive audit trails and user activity monitoring

### 📊 Reporting & Analytics
- **Comprehensive Reporting**: Department-wise reports, branch reports, and organizational analytics
- **Data Export/Import**: Multiple format support (JSON, XML, CSV, HTML, Array, PHP, Serialized)
- **Real-time Dashboard**: Live organizational statistics and performance metrics
- **Custom Report Builder**: Flexible reporting system with customizable parameters

### 🔧 Technical Features
- **Bootstrap UI Framework**: Responsive design with consistent styling and Font Awesome icons
- **CodeIgniter 3.x Framework**: Robust MVC architecture with enhanced security
- **Database Migration System**: Version-controlled database schema management
- **Multi-format Data Handling**: Comprehensive data interchange capabilities
- **Notification System**: Centralized notification management for errors and status updates

## 🚀 Quick Start

### Prerequisites
- PHP 7.1.3 or higher
- MySQL 5.6+ or MariaDB 10.0+
- Apache 2.4+ or Nginx 1.12+
- Composer for dependency management

### Installation
1. **Clone the repository**:
   ```bash
   git clone https://github.com/rafidalhaque/shughran.git
   cd shughran
   ```

2. **Install dependencies**:
   ```bash
   composer install --no-dev --optimize-autoloader
   ```

3. **Set up database and configuration**:
   ```bash
   cp app/config/database.example.php app/config/database.php
   # Edit database.php with your database credentials
   ```

4. **Set proper permissions**:
   ```bash
   chmod 755 app/cache/ app/logs/ assets/uploads/
   ```

5. **Access your application** in the browser and follow the setup wizard.

📖 **For detailed installation instructions, see [INSTALLATION.md](INSTALLATION.md)**

## 🏗️ Architecture

### Directory Structure
```
shughran/
├── app/                    # Application code
│   ├── config/            # Configuration files
│   ├── controllers/       # Application controllers
│   ├── core/             # Core extensions (MY_Controller, MY_Security, etc.)
│   ├── helpers/          # Custom helpers
│   ├── libraries/        # Custom libraries
│   ├── migrations/       # Database migrations
│   ├── models/           # Data models
│   └── views/            # View templates
├── assets/               # Static assets (CSS, JS, images)
├── docs/                 # Comprehensive documentation
├── system/               # CodeIgniter core system
├── themes/               # Application themes and templates
├── update/               # Update and installation system
└── vendor/               # Composer dependencies
```

### Core Components

#### Enhanced Controllers
- **MY_Controller.php**: Base controller with authentication, role management, and page construction
- **MY_Security.php**: Custom CSRF error handling with user-friendly redirects
- **MY_Lang.php**: Enhanced language loading system supporting admin/shop modules

#### Libraries & Helpers
- **Format.php**: Multi-format data conversion library
- **pagination_helper.php**: Bootstrap-styled pagination with Font Awesome icons
- **Notify.php**: Centralized notification system

#### Configuration
- **routes.php**: Complete URL routing for 25+ organizational departments
- **database.php**: Database configuration with migration support

## 🌐 Supported Departments

The system supports comprehensive management for:

| Department | Description |
|------------|-------------|
| Literature | Literary activities and publications |
| International | International affairs and relations |
| Education | Educational programs and training |
| Business | Business operations and finance |
| Training | Training programs and development |
| Social Welfare | Community and social programs |
| Media | Media relations and communications |
| Science & Technology | Technical and research activities |
| Sports | Sports and recreational activities |
| Cultural | Cultural events and programs |
| **And 15+ more departments** | Complete organizational coverage |

## 🛠️ Development

### Built With
- **Backend**: CodeIgniter 3.x (PHP Framework)
- **Frontend**: Bootstrap 4+ with Font Awesome icons
- **Database**: MySQL/MariaDB with migration system
- **Authentication**: Custom authentication with role-based access
- **Security**: CSRF protection, input validation, XSS filtering
- **Languages**: PHP 7.1.3+, JavaScript, HTML5, CSS3

### Key Libraries
- **PDF Generation**: DOMPDF, mPDF
- **Barcode/QR**: PHPQRCode, Zend Barcode
- **Excel**: PHPExcel for spreadsheet operations
- **Email**: PHPMailer for email functionality
- **Payment**: Stripe integration for payments
- **Printing**: ESCPOS-PHP for receipt printing

## 📚 Documentation

- **[Installation Guide](INSTALLATION.md)** - Complete setup instructions
- **[API Documentation](docs/)** - Detailed API reference and code documentation
- **[Development Guide](docs/app/)** - Core application documentation
- **[Configuration Guide](docs/root/)** - System configuration details

## 🔐 Security Features

- **CSRF Protection**: Cross-Site Request Forgery protection
- **Input Validation**: Comprehensive input sanitization
- **SQL Injection Prevention**: Parameterized queries and validation
- **XSS Protection**: Cross-site scripting prevention
- **Role-Based Access**: Granular permission system
- **Session Security**: Secure session management

## 🌍 Internationalization

- **Multi-Language Support**: Bangla and English with extensible system
- **RTL Support**: Right-to-left language support
- **Custom Language Files**: Easy addition of new languages
- **Department-Specific Translations**: Context-aware translations

## 📊 System Requirements

### Minimum Requirements
- **PHP**: 7.1.3+
- **Database**: MySQL 5.6+ / MariaDB 10.0+
- **Web Server**: Apache 2.4+ / Nginx 1.12+
- **Memory**: 256MB RAM (512MB recommended)
- **Storage**: 500MB disk space

### Recommended Setup
- **PHP**: 7.4+ or 8.0+
- **Database**: MySQL 8.0+ / MariaDB 10.5+
- **Memory**: 1GB+ RAM
- **SSL Certificate**: For production environments

## 🤝 Contributing

We welcome contributions to improve Shughran! Please follow these steps:

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## 📄 License

This project is licensed under a Commercial License - see the [LICENSE](LICENSE) file for details.

## 🆘 Support

- **Documentation**: Check the [docs/](docs/) directory for detailed documentation
- **Installation Issues**: See [INSTALLATION.md](INSTALLATION.md) for troubleshooting
- **Bug Reports**: Open an issue with detailed information
- **Feature Requests**: Submit enhancement suggestions via issues

## 📞 Contact

For commercial licensing, support, or custom development:
- **Project Repository**: [github.com/rafidalhaque/shughran](https://github.com/rafidalhaque/shughran)
- **Issues**: [Report bugs or request features](https://github.com/rafidalhaque/shughran/issues)

---

**Shughran** - Empowering organizational excellence through comprehensive management solutions.