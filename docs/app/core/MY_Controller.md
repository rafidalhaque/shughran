---
layout: page
title: MY_Controller.php Documentation
parent: Application Code Documentation
---

# MY_Controller.php Documentation

## File Overview
**Path:** `/app/core/MY_Controller.php`
**Purpose:** Base controller class that extends CodeIgniter's CI_Controller to provide common functionality for all application controllers
**Framework:** CodeIgniter 3.x
**Language:** PHP

## Line-by-Line Documentation

### Line 1: PHP Opening Tag and Security Check
```php
<?php defined('BASEPATH') or exit('No direct script access allowed');
```
- **Line 1:** Opens PHP script and prevents direct access to the file
- `defined('BASEPATH')` - Checks if CodeIgniter's BASEPATH constant is defined
- `exit('No direct script access allowed')` - Terminates execution if accessed directly without CodeIgniter framework

### Lines 3-4: Class Declaration
```php
class MY_Controller extends CI_Controller
{
```
- **Line 3:** Declares the MY_Controller class extending CodeIgniter's base CI_Controller
- This follows CodeIgniter's convention where "MY_" prefix indicates custom extensions
- **Line 4:** Opening brace for class definition

### Lines 6-133: Constructor Method
```php
function __construct()
{
```
- **Line 6:** Constructor method that runs when class is instantiated
- **Line 7:** Opening brace for constructor

```php
parent::__construct();
```
- **Line 8:** Calls parent CI_Controller constructor to initialize CodeIgniter framework

```php
$this->Settings = $this->site->get_setting();
```
- **Line 9:** Retrieves application settings from database via site library
- Stores settings in `$this->Settings` property for global access

### Lines 12-20: Language Configuration
```php
if ($sma_language = $this->input->cookie('sma_language', TRUE)) {
    $this->config->set_item('language', $sma_language);
    $this->lang->admin_load('sma', $sma_language);
    $this->Settings->user_language = $sma_language;
} else {
    $this->config->set_item('language', $this->Settings->language);
    $this->lang->admin_load('sma', $this->Settings->language);
    $this->Settings->user_language = $this->Settings->language;
}
```
- **Line 12:** Checks if language preference is stored in cookie
- **Line 13:** Sets CodeIgniter language configuration from cookie
- **Line 14:** Loads 'sma' language file for admin interface
- **Line 15:** Updates user language setting
- **Lines 16-19:** Fallback to default language if no cookie preference exists

### Lines 21-25: RTL Support Configuration
```php
if ($rtl_support = $this->input->cookie('sma_rtl_support', TRUE)) {
    $this->Settings->user_rtl = $rtl_support;
} else {
    $this->Settings->user_rtl = $this->Settings->rtl;
}
```
- **Line 21:** Checks for RTL (Right-to-Left) support preference in cookie
- **Line 22:** Sets user RTL preference from cookie
- **Line 24:** Falls back to default RTL setting from database

### Lines 26-31: Theme and Assets Configuration
```php
$this->theme = $this->Settings->theme . '/admin/views/';
if (is_dir(VIEWPATH . $this->Settings->theme . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR)) {
    $this->data['assets'] = base_url() . 'themes/' . $this->Settings->theme . '/admin/assets/';
} else {
    $this->data['assets'] = base_url() . 'themes/default/admin/assets/';
}
```
- **Line 26:** Sets theme path for views
- **Line 27:** Checks if theme-specific admin assets directory exists
- **Line 28:** Sets assets URL to theme-specific assets if they exist
- **Line 30:** Falls back to default theme assets if theme assets don't exist

### Lines 33-35: Global Data Setup
```php
$this->data['Settings'] = $this->Settings;
$this->loggedIn = $this->sma->logged_in();
```
- **Line 33:** Makes settings available to all views
- **Line 34:** Checks if user is logged in using sma library

### Lines 36-83: User Authentication and Permissions
```php
if ($this->loggedIn) {
```
- **Line 36:** Executes following code only if user is authenticated

```php
$this->default_currency = $this->site->getCurrencyByCode($this->Settings->default_currency);
$this->data['default_currency'] = $this->default_currency;
```
- **Lines 37-38:** Retrieves and stores default currency information

```php
$this->Owner = $this->sma->in_group('owner') ? TRUE : NULL;
$this->data['Owner'] = $this->Owner;
$this->Customer = $this->sma->in_group('customer') ? TRUE : NULL;
$this->data['Customer'] = $this->Customer;
$this->Supplier = $this->sma->in_group('supplier') ? TRUE : NULL;
$this->data['Supplier'] = $this->Supplier;
$this->Admin = $this->sma->in_group('admin') ? TRUE : NULL;
$this->data['Admin'] = $this->Admin;
```
- **Lines 39-46:** Checks user group membership and sets role flags
- Each line checks if user belongs to specific group (owner, customer, supplier, admin)
- Results stored both as class properties and in data array for views

### Lines 48-66: Date Format Configuration
```php
if ($sd = $this->site->getDateFormat($this->Settings->dateformat)) {
    $dateFormats = array(
        'js_sdate' => $sd->js,
        'php_sdate' => $sd->php,
        'mysq_sdate' => $sd->sql,
        'js_ldate' => $sd->js . ' hh:ii',
        'php_ldate' => $sd->php . ' H:i',
        'mysql_ldate' => $sd->sql . ' %H:%i'
    );
} else {
    $dateFormats = array(
        'js_sdate' => 'mm-dd-yyyy',
        'php_sdate' => 'm-d-Y',
        'mysq_sdate' => '%m-%d-%Y',
        'js_ldate' => 'mm-dd-yyyy hh:ii:ss',
        'php_ldate' => 'm-d-Y H:i:s',
        'mysql_ldate' => '%m-%d-%Y %T'
    );
}
```
- **Line 48:** Attempts to get date format configuration
- **Lines 49-56:** Sets date formats for JavaScript, PHP, and MySQL if config exists
- **Lines 58-65:** Sets default date formats if no configuration found

### Lines 67-76: Module Detection
```php
if (file_exists(APPPATH . 'controllers' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'Pos.php')) {
    define("POS", 1);
} else {
    define("POS", 0);
}
if (file_exists(APPPATH . 'controllers' . DIRECTORY_SEPARATOR . 'shop' . DIRECTORY_SEPARATOR . 'Shop.php')) {
    define("SHOP", 1);
} else {
    define("SHOP", 0);
}
```
- **Lines 67-71:** Checks if POS (Point of Sale) module exists and defines constant
- **Lines 72-76:** Checks if Shop module exists and defines constant

### Lines 77-83: Permission Setup
```php
if (!$this->Owner && !$this->Admin) {
    $gp = $this->site->checkPermissions();
    $this->GP = $gp[0];
    $this->data['GP'] = $gp[0];
} else {
    $this->data['GP'] = NULL;
}
```
- **Line 77:** Checks if user is NOT owner or admin
- **Line 78:** Gets user permissions for non-owner/admin users
- **Lines 79-80:** Stores permissions in class property and data array
- **Line 82:** Sets permissions to NULL for owners/admins (they have all permissions)

### Lines 84-100: Data Preparation and GST Setup
```php
$this->dateFormats = $dateFormats;
$this->data['dateFormats'] = $dateFormats;
$this->load->language('calendar');
```
- **Lines 84-86:** Stores date formats and loads calendar language file

```php
$this->m = strtolower($this->router->fetch_class());
$this->v = strtolower($this->router->fetch_method());
$this->data['m'] = $this->m;
$this->data['v'] = $this->v;
```
- **Lines 89-92:** Gets current controller class and method names
- Converts to lowercase and makes available to views

```php
$this->data['dt_lang'] = json_encode(lang('datatables_lang'));
```
- **Line 93:** Prepares DataTables language configuration as JSON

```php
$this->data['dp_lang'] = json_encode(array(/* date picker language config */));
```
- **Line 94:** Prepares date picker language configuration (very long array with months, days, etc.)

```php
$this->Settings->indian_gst = FALSE;
if ($this->Settings->invoice_view > 0) {
    $this->Settings->indian_gst = $this->Settings->invoice_view == 2 ? TRUE : FALSE;
    $this->Settings->format_gst = TRUE;
    $this->load->library('gst');
}
```
- **Lines 95-100:** Configures GST (Goods and Services Tax) settings for Indian taxation

### Lines 106-123: Report Date Configuration
```php
$entrytimeinfo = $this->site->getOneRecord('entry_settings', '*', array('year' => date('Y')), 'id desc', 1, 0);
```
- **Line 106:** Retrieves entry time settings for current year

```php
$current_date = strtotime(date('Y-m-d'));
$annual_start = strtotime($entrytimeinfo->startdate_annual);
$annual_end = strtotime($entrytimeinfo->enddate_annual);
$half_start = strtotime($entrytimeinfo->startdate_half);
$half_end = strtotime($entrytimeinfo->enddate_half);
```
- **Lines 109-116:** Converts dates to timestamps for comparison

```php
$type = ($current_date >= $half_start && $current_date <= $half_end) ? 'half_yearly' : 'annual';
```
- **Line 118:** Determines if current date falls in half-yearly or annual period

```php
if ($type == 'half_yearly')
    $this->data['reportdate'] = array('type' => 'half_yearly', 'start' => $entrytimeinfo->startdate_half, 'end' => $entrytimeinfo->enddate_half, 'year' => $entrytimeinfo->year);
else
    $this->data['reportdate'] = array('type' => 'annual', 'start' => $entrytimeinfo->startdate_annual, 'end' => $entrytimeinfo->enddate_annual, 'year' => $entrytimeinfo->year);
```
- **Lines 120-123:** Sets report date configuration based on determined type

### Lines 131-132: Entry Permission Setup
```php
$this->data['entry_permission'] = $this->site->get_entry_permission();
```
- **Line 131:** Gets entry permissions for current user
- **Line 132:** Closing brace for authentication check

### Lines 135-177: Page Construction Method
```php
function page_construct($page, $meta = array(), $data = array(), $left_panel = 'leftmenu/left_panel')
{
```
- **Line 135:** Method to construct complete page with header, content, and footer
- Parameters: page template, meta data, page data, left panel template

```php
$meta['message'] = isset($data['message']) ? $data['message'] : $this->session->flashdata('message');
$meta['error'] = isset($data['error']) ? $data['error'] : $this->session->flashdata('error');
$meta['warning'] = isset($data['warning']) ? $data['warning'] : $this->session->flashdata('warning');
```
- **Lines 137-139:** Sets up notification messages from data or flash data

```php
$meta['info'] = $this->site->getNotifications();
$meta['support_ticket'] = $this->site->getTickets();
$meta['events'] = $this->site->getUpcomingEvents();
$meta['ip_address'] = $this->input->ip_address();
```
- **Lines 140-145:** Retrieves notifications, support tickets, events, and IP address

```php
$meta['Owner'] = $data['Owner'];
// ... other role assignments
$meta['reportdate'] = $data['reportdate'];
```
- **Lines 146-154:** Copies role flags and other data to meta array

```php
if ($left_panel == 'leftmenu/left_panel') {
    $meta['pending_list'] = $this->getlist();
    $meta['manpowertransferout'] = $this->manpowertransferout();
    $meta['assocandidateworkerin'] = $this->assocandidateworkerin();
    $meta['assocandidateworkerout'] = $this->assocandidateworkerout();
    $meta['manpowerstdout'] = $this->getstdpendinglist();
    $meta['membercandidatepending'] = $this->getmembercandidatependinglist();
    $meta['thanapendingcount'] = $this->getpendingthanacount();
}
```
- **Lines 161-169:** Gets pending counts for left panel if using default left panel

```php
$this->load->view($this->theme . 'header', $meta);
$this->load->view($this->theme . $left_panel, $meta);
$this->load->view($this->theme . $page, $data);
$this->load->view($this->theme . 'footer');
```
- **Lines 173-176:** Loads header, left panel, page content, and footer views

### Lines 178-205: Alternative Page Construction Method 2
```php
function page_construct2($page, $meta = array(), $data = array(), $left_panel = 'leftmenu/left_panel')
```
- **Line 178:** Similar to page_construct but uses different header and footer templates
- Uses 'header2' and 'footer2' views instead of default ones
- Same logic as page_construct for meta data preparation

### Lines 207-235: Alternative Page Construction Method 3
```php
function page_construct3($page, $meta = array(), $data = array(), $left_panel = 'leftmenu/left_panel')
```
- **Line 207:** Another variant of page construction
- Uses 'footer_guest' instead of regular footer
- Includes support ticket information

### Lines 240-277: Alternative Page Construction Method 4
```php
function page_construct4($page, $meta = array(), $data = array(), $left_panel = 'leftmenu/left_panel')
```
- **Line 240:** Fourth variant of page construction
- Uses 'footer4' template
- Includes same pending list logic as first method

### Lines 282-329: Old Report Type Method
```php
function report_typeold()
```
- **Line 282:** Legacy method for determining report type and date ranges
- **Line 296:** Hard-coded year 2023 for testing/development
- Contains logic to determine if current date is in half-yearly or annual period
- Returns array with report configuration

### Lines 330-378: Current Report Type Method
```php
function report_type()
```
- **Line 330:** Current method for determining report type
- **Line 345:** Uses current year instead of hard-coded value
- Similar logic to old method but with current year
- Returns report configuration array

### Lines 383-415: Manpower Transfer Out Count
```php
function manpowertransferout()
```
- **Line 383:** Method to count outgoing manpower transfers
- **Lines 386-392:** Sets branch_id based on user role (null for Owner/Admin, session value for others)
- **Lines 394-414:** Builds and executes database query to count transfers from current branch

### Lines 419-452: Associate/Candidate Worker Out Count
```php
function assocandidateworkerout()
```
- **Line 419:** Method to count outgoing associate/candidate worker transfers
- Similar structure to manpowertransferout but for different table
- Uses 'manpower_transfer_assoworker' table with status = 2

### Lines 455-493: Associate/Candidate Worker In Count
```php
function assocandidateworkerin()
```
- **Line 455:** Method to count incoming associate/candidate worker transfers
- **Lines 466-483:** Different logic for branch users vs admin users
- Branch users: count transfers TO their branch
- Admin users: count all transfers with status = 2

### Lines 497-535: General Transfer List Count
```php
function getlist()
```
- **Line 497:** Method to count general manpower transfers
- **Lines 509-527:** Different queries for branch users vs admin users
- Branch users: transfers TO their branch
- Admin users: all transfers

### Lines 541-571: Student Pending List Count
```php
function getstdpendinglist()
```
- **Line 541:** Method to count pending studentship applications
- Counts manpower records with orgstatus_id = 1 and is_studentship_pending = 1

### Lines 575-611: Pending Thana Count
```php
function getpendingthanacount()
```
- **Line 575:** Method to count pending thana (sub-districts)
- Counts thana records with is_pending = 1

### Lines 614-644: Member Candidate Pending List Count
```php
function getmembercandidatependinglist()
```
- **Line 614:** Method to count pending member candidate applications
- Counts manpower records with orgstatus_id = 12 and is_studentship_pending = 1

### Lines 645-646: Class End
```php
}
```
- **Line 645:** Closing brace for MY_Controller class
- **Line 646:** Empty line at end of file

## Summary
This file serves as the base controller for the Shughran application, providing:
- User authentication and role management
- Language and theme configuration
- Date format handling
- Page construction methods
- Various counting methods for dashboard pending items
- Report type determination based on date ranges

The class extends CodeIgniter's base controller and adds application-specific functionality that all other controllers can inherit.