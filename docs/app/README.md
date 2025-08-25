---
layout: page
title: Application Code Documentation
nav_order: 4
has_children: true
---

# Application Code Documentation

This section contains detailed documentation for the Shughran application source code, organized by component type.

## Documentation Structure

### Core Extensions (`app/core/`)
- [MY_Controller.php](core/MY_Controller.md) - Base controller with authentication and role management
- [MY_Security.php](core/MY_Security.md) - Custom CSRF error handling
- [MY_Lang.php](core/MY_Lang.md) - Enhanced language loading system

### Configuration (`app/config/`) 
- [routes.php](config/routes.md) - URL routing configuration for departmental structure

### Controllers (`app/controllers/`)
- [Notify.php](controllers/Notify.md) - Notification controller documentation

### Libraries (`app/libraries/`)
- [Format.php](libraries/Format.md) - Multi-format data conversion library

### Helpers (`app/helpers/`)
- [pagination_helper.php](helpers/pagination_helper.md) - Bootstrap-styled pagination helper

## Navigation

Use the sidebar navigation to browse through the different code documentation sections. Each file includes line-by-line analysis and feature descriptions.