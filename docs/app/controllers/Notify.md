# Notify.php Documentation

## File Overview
**Path:** `/app/controllers/Notify.php`
**Purpose:** Controller for handling various notification pages including errors, offline mode, and payment status notifications
**Framework:** CodeIgniter 3.x
**Language:** PHP

## Line-by-Line Documentation

### Line 1: PHP Opening Tag and Security Check
```php
<?php defined('BASEPATH') OR exit('No direct script access allowed');
```
- **Line 1:** Opens PHP script and prevents direct access to the file
- `defined('BASEPATH')` - Checks if CodeIgniter's BASEPATH constant is defined
- `exit('No direct script access allowed')` - Terminates execution if accessed directly without CodeIgniter framework

### Line 2: Empty Line
```php

```
- **Line 2:** Empty line for code formatting

### Lines 3-4: Class Declaration
```php
class Notify extends CI_Controller
{
```
- **Line 3:** Declares the Notify class extending CodeIgniter's base CI_Controller
- **Line 4:** Opening brace for class definition

### Line 5: Empty Line
```php

```
- **Line 5:** Empty line for code formatting within class

### Lines 6-9: Constructor Method
```php
function __construct() {
    parent::__construct();
    $this->lang->admin_load('sma');
}
```
- **Line 6:** Constructor method that runs when class is instantiated
- **Line 7:** Calls parent CI_Controller constructor to initialize CodeIgniter framework
- **Line 8:** Loads 'sma' language file for admin interface using custom language loader
- **Line 9:** Closing brace for constructor

### Line 10: Empty Line
```php

```
- **Line 10:** Empty line for code formatting between methods

### Lines 11-14: 404 Error Handler
```php
function error_404() {
    $this->session->set_flashdata('error', lang('error_404_message').site_url($this->uri->uri_string()));
    redirect('/');
}
```
- **Line 11:** Method to handle 404 (Not Found) errors
- **Line 12:** Sets flash data with error message including:
  - `lang('error_404_message')` - Localized 404 error message
  - `site_url($this->uri->uri_string())` - The URL that was not found
- **Line 13:** Redirects user to home page after setting error message
- **Line 14:** Closing brace for method

### Line 15: Empty Line
```php

```
- **Line 15:** Empty line for code formatting between methods

### Lines 16-21: CSRF Error Handler
```php
function csrf($msg = NULL) {
    $data['page_title'] = lang('csrf_error');
    if (!$msg) { $msg = lang('cesr_error_msg'); }
    $this->session->set_flashdata('error', $msg);
    redirect('/', 'location');
}
```
- **Line 16:** Method to handle CSRF (Cross-Site Request Forgery) errors with optional custom message
- **Line 17:** Sets page title from language file for CSRF error
- **Line 18:** Sets default CSRF error message if none provided (note: 'cesr_error_msg' appears to be a typo)
- **Line 19:** Sets flash data with error message for display on next page
- **Line 20:** Redirects to home page with 'location' redirect type
- **Line 21:** Closing brace for method

### Line 22: Empty Line
```php

```
- **Line 22:** Empty line for code formatting between methods

### Lines 23-27: Offline Mode Handler
```php
function offline($msg = NULL) {
    $data['page_title'] = lang('site_offline');
    $data['msg'] = $msg;
    $this->load->view('default/notify', $data);
}
```
- **Line 23:** Method to display offline/maintenance mode page with optional custom message
- **Line 24:** Sets page title from language file for offline mode
- **Line 25:** Stores custom message (if provided) in data array for view
- **Line 26:** Loads the 'default/notify' view template with prepared data
- **Line 27:** Closing brace for method

### Line 28: Empty Line
```php

```
- **Line 28:** Empty line for code formatting between methods

### Lines 29-34: Payment Success Handler
```php
function payment_success($msg = NULL) {
    $data['page_title'] = lang('payment');
    $data['msg'] = $msg ? $msg : lang('thank_you');
    $data['msg1'] = lang('payment_added');
    $this->load->view('default/notify', $data);
}
```
- **Line 29:** Method to display payment success page with optional custom message
- **Line 30:** Sets page title from language file for payment
- **Line 31:** Sets main message - uses custom message if provided, otherwise uses 'thank_you' language string
- **Line 32:** Sets secondary message indicating payment was added successfully
- **Line 33:** Loads the 'default/notify' view template with prepared data
- **Line 34:** Closing brace for method

### Line 35: Empty Line
```php

```
- **Line 35:** Empty line for code formatting between methods

### Lines 36-41: Payment Failed Handler
```php
function payment_failed($msg = NULL) {
    $data['page_title'] = lang('payment');
    $data['msg'] = $msg ? $msg : lang('error');
    $data['msg1'] = lang('payment_failed');
    $this->load->view('default/notify', $data);
}
```
- **Line 36:** Method to display payment failure page with optional custom message
- **Line 37:** Sets page title from language file for payment
- **Line 38:** Sets main message - uses custom message if provided, otherwise uses generic 'error' language string
- **Line 39:** Sets secondary message indicating payment failed
- **Line 40:** Loads the 'default/notify' view template with prepared data
- **Line 41:** Closing brace for method

### Line 42: Empty Line
```php

```
- **Line 42:** Empty line for code formatting between methods

### Lines 43-48: Payment Processing Handler
```php
function payment() {
    $data['page_title'] = lang('payment');
    $data['msg'] = lang('info');
    $data['msg1'] = lang('payment_processing');
    $this->load->view('default/notify', $data);
}
```
- **Line 43:** Method to display payment processing page (interim status)
- **Line 44:** Sets page title from language file for payment
- **Line 45:** Sets main message to generic 'info' from language file
- **Line 46:** Sets secondary message indicating payment is being processed
- **Line 47:** Loads the 'default/notify' view template with prepared data
- **Line 48:** Closing brace for method

### Line 49: Empty Line
```php

```
- **Line 49:** Empty line for code formatting

### Lines 50-51: Class End
```php
}
```
- **Line 50:** Closing brace for Notify class
- **Line 51:** Empty line at end of file

## Summary
This controller serves as a centralized notification system for the Shughran application with the following key features:

### Error Handling
- **404 Errors**: Captures page not found errors and redirects with informative messages
- **CSRF Errors**: Handles Cross-Site Request Forgery security violations

### System Status
- **Offline Mode**: Displays maintenance/offline pages when system is down

### Payment Processing
- **Success Pages**: Shows confirmation when payments are completed successfully
- **Failure Pages**: Displays error information when payments fail
- **Processing Pages**: Shows interim status during payment processing

### Technical Features
1. **Centralized Messaging**: All notification types use the same view template
2. **Internationalization**: All messages use language files for multi-language support
3. **Flexible Messaging**: Accepts custom messages while providing sensible defaults
4. **Flash Data**: Uses session flash data for error messages that persist across redirects
5. **Consistent Structure**: All methods follow similar data preparation patterns

### Usage Context
This controller is typically called by:
- CodeIgniter's routing system for 404 errors
- Security components for CSRF violations
- Payment gateways for transaction status updates
- System administrators during maintenance periods

The controller provides a clean, user-friendly way to handle exceptional situations and keep users informed about system status.