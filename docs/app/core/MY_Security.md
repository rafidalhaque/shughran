# MY_Security.php Documentation

## File Overview
**Path:** `/app/core/MY_Security.php`
**Purpose:** Custom security class that extends CodeIgniter's CI_Security to provide custom CSRF error handling
**Framework:** CodeIgniter 3.x
**Language:** PHP

## Line-by-Line Documentation

### Line 1: PHP Opening Tag and Security Check
```php
<?php (defined('BASEPATH')) OR exit('No direct script access allowed');
```
- **Line 1:** Opens PHP script and prevents direct access to the file
- `(defined('BASEPATH'))` - Checks if CodeIgniter's BASEPATH constant is defined (parentheses for clarity)
- `exit('No direct script access allowed')` - Terminates execution if accessed directly without CodeIgniter framework

### Line 2: Empty Line
```php

```
- **Line 2:** Empty line for code formatting

### Lines 3-4: Class Declaration
```php
class MY_Security extends CI_Security {
```
- **Line 3:** Declares the MY_Security class extending CodeIgniter's base CI_Security class
- This follows CodeIgniter's convention where "MY_" prefix indicates custom extensions
- **Line 4:** Opening brace for class definition

### Line 5: Empty Line
```php

```
- **Line 5:** Empty line for code formatting within class

### Lines 6-8: Constructor Method
```php
function __construct() {
    parent::__construct();
}
```
- **Line 6:** Constructor method that runs when class is instantiated
- **Line 7:** Calls parent CI_Security constructor to initialize CodeIgniter's security features
- **Line 8:** Closing brace for constructor

### Line 9: Empty Line
```php

```
- **Line 9:** Empty line for code formatting between methods

### Lines 10-13: Custom CSRF Error Handler
```php
public function csrf_show_error() {
    header('Location: '.config_item('base_url').'errors/csrf', TRUE, 302);
    die();
}
```
- **Line 10:** Public method to handle CSRF (Cross-Site Request Forgery) errors
- **Line 11:** Sends HTTP redirect header to custom CSRF error page
  - `config_item('base_url')` - Gets the base URL from CodeIgniter configuration
  - `'errors/csrf'` - Redirects to a custom CSRF error page
  - `TRUE` - Replaces any existing headers with same name
  - `302` - HTTP status code for temporary redirect
- **Line 12:** Terminates script execution after redirect
- **Line 13:** Closing brace for method

### Lines 14-15: Class End
```php

}
```
- **Line 14:** Empty line for code formatting
- **Line 15:** Closing brace for MY_Security class

## Summary
This file provides a custom security extension for the Shughran application with the following features:

### Purpose
- Extends CodeIgniter's built-in security functionality
- Provides custom CSRF error handling instead of CodeIgniter's default error display

### Key Functionality
1. **Custom CSRF Error Handling**: Instead of showing CodeIgniter's default CSRF error page, this class redirects users to a custom error page at `/errors/csrf`
2. **Graceful Error Handling**: Uses HTTP redirect (302) to provide a better user experience when CSRF validation fails

### Technical Details
- **CSRF Protection**: CSRF tokens help prevent cross-site request forgery attacks by ensuring requests originate from the same site
- **Redirect vs. Error Page**: Rather than displaying an error message directly, the redirect allows for a more user-friendly error page with proper styling and navigation
- **HTTP 302**: Temporary redirect status code indicates the error is temporary and the user can try again

### Integration
This class is automatically loaded by CodeIgniter when the Security library is used, replacing the default CI_Security class throughout the application.