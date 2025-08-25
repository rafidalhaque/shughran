---
layout: page
title: routes.php Documentation
parent: Application Code Documentation
---

# routes.php Documentation

## File Overview
**Path:** `/app/config/routes.php`
**Purpose:** URL routing configuration for the Shughran application, defining how URLs map to controllers and methods
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

### Lines 3-6: Framework Basic Routes
```php
// Framework routes
$route['default_controller'] = 'main';
$route['404_override'] = 'notify/error_404';
$route['translate_uri_dashes'] = TRUE;
```
- **Line 3:** Comment indicating framework-level routing configuration
- **Line 4:** Sets 'main' as the default controller when no controller is specified in URL
- **Line 5:** Redirects 404 errors to 'notify/error_404' instead of default CI 404 page
- **Line 6:** Enables automatic translation of dashes to underscores in controller/method names

### Line 7: Empty Line
```php

```
- **Line 7:** Empty line for section separation

### Lines 8-15: Shop Module Routes
```php
// Shop routes
$route['shop'] = 'main';
$route['shop/search'] = 'shop/shop/search';
$route['shop/products'] = 'shop/shop/products';
$route['product/(:any)'] = 'shop/shop/product/$1';
$route['category/(:any)'] = 'shop/shop/products/$1';
$route['brand/(:any)'] = 'shop/shop/products/0/0/$1';
$route['category/(:any)/(:any)'] = 'shop/shop/products/$1/$2';
```
- **Line 8:** Comment for shop-related routes
- **Line 9:** Routes 'shop' URL to 'main' controller
- **Line 10:** Routes 'shop/search' to 'shop/shop/search' (module/controller/method)
- **Line 11:** Routes 'shop/products' to shop products listing
- **Line 12:** Routes 'product/[anything]' to shop product detail page, passing parameter
- **Line 13:** Routes 'category/[anything]' to category product listing
- **Line 14:** Routes 'brand/[anything]' to brand product listing with specific parameter structure
- **Line 15:** Routes 'category/[param1]/[param2]' to products with two parameters

### Line 16: Empty Line
```php

```
- **Line 16:** Empty line for section separation

### Lines 17-18: Page Route
```php
// Page route
$route['page/(:any)'] = 'shop/shop/page/$1';
```
- **Line 17:** Comment for page routing
- **Line 18:** Routes 'page/[anything]' to shop page controller, passing page identifier

### Line 19: Empty Line
```php

```
- **Line 19:** Empty line for section separation

### Lines 20-23: Cart Routes
```php
// Cart routes
$route['cart'] = 'shop/cart_ajax';
$route['cart/(:any)'] = 'shop/cart_ajax/$1';
$route['cart/(:any)/(:any)'] = 'shop/cart_ajax/$1/$2';
```
- **Line 20:** Comment for cart-related routes
- **Line 21:** Routes 'cart' to AJAX cart controller
- **Line 22:** Routes 'cart/[action]' to cart controller with one parameter
- **Line 23:** Routes 'cart/[action]/[param]' to cart controller with two parameters

### Line 24: Empty Line
```php

```
- **Line 24:** Empty line for section separation

### Lines 25-28: Miscellaneous Shop Routes
```php
// Misc routes
$route['shop/(:any)'] = 'shop/shop/$1';
$route['shop/(:any)/(:any)'] = 'shop/shop/$1/$2';
$route['shop/(:any)/(:any)/(:any)'] = 'shop/shop/$1/$2/$3';
```
- **Line 25:** Comment for miscellaneous shop routes
- **Line 26:** Routes 'shop/[method]' to shop controller with one parameter
- **Line 27:** Routes 'shop/[method]/[param]' with two parameters
- **Line 28:** Routes 'shop/[method]/[param1]/[param2]' with three parameters

### Line 29: Empty Line
```php

```
- **Line 29:** Empty line for section separation

### Lines 30-40: Authentication Routes
```php
// Auth routes
$route['login'] = 'main/login';
$route['logout'] = 'main/logout';
$route['profile'] = 'main/profile';
$route['register'] = 'main/register';
$route['login/(:any)'] = 'main/login/$1';
$route['logout/(:any)'] = 'main/logout/$1';
$route['profile/(:any)'] = 'main/profile/$1';
$route['forgot_password'] = 'main/forgot_password';
$route['activate/(:any)/(:any)'] = 'main/activate/$1/$2';
$route['reset_password/(:any)'] = 'main/reset_password/$1';
```
- **Line 30:** Comment for authentication routes
- **Line 31:** Routes 'login' to main controller login method
- **Line 32:** Routes 'logout' to main controller logout method
- **Line 33:** Routes 'profile' to main controller profile method
- **Line 34:** Routes 'register' to main controller register method
- **Lines 35-37:** Authentication routes with additional parameters
- **Line 38:** Routes 'forgot_password' to password recovery
- **Line 39:** Routes 'activate/[token]/[code]' to account activation with two parameters
- **Line 40:** Routes 'reset_password/[token]' to password reset with token

### Line 41: Empty Line
```php

```
- **Line 41:** Empty line for section separation

### Lines 42-47: Basic Admin Routes
```php
// Admin area routes
$route['admin'] = 'admin/welcome';
$route['admin/mantransferlist'] = 'admin/welcome/mantransferlist';
$route['admin/mancomminglist'] = 'admin/welcome/mancomminglist';
$route['admin/memberpending'] = 'admin/welcome/memberpending';
$route['admin/memberpending/(:num)'] = 'admin/welcome/memberpending/$1';
```
- **Line 42:** Comment for admin area routes
- **Line 43:** Routes 'admin' to admin welcome controller (dashboard)
- **Line 44:** Routes manpower transfer list to welcome controller
- **Line 45:** Routes manpower incoming list to welcome controller
- **Line 46:** Routes member pending list to welcome controller
- **Line 47:** Routes member pending with numeric ID parameter

### Lines 48-50: Member Candidate Pending Routes
```php
$route['admin/membercandidatepending'] = 'admin/welcome/membercandidatepending';
$route['admin/membercandidatepending/(:num)'] = 'admin/welcome/membercandidatepending/$1';
```
- **Line 49:** Routes member candidate pending list
- **Line 50:** Routes member candidate pending with numeric ID

### Lines 51-80: Core Admin Module Routes
```php
$route['admin/dashboard'] = 'admin/welcome/dashboard';
$route['admin/dashboardtransfer'] = 'admin/welcome/dashboardtransfer';
$route['admin/users'] = 'admin/auth/users';
$route['admin/users/create_user'] = 'admin/auth/create_user';
$route['admin/users/profile/(:num)'] = 'admin/auth/profile/$1';
$route['admin/login'] = 'admin/auth/login';
$route['admin/login/(:any)'] = 'admin/auth/login/$1';
$route['admin/logout'] = 'admin/auth/logout';
$route['admin/logout/(:any)'] = 'admin/auth/logout/$1';
// $route['admin/register'] = 'admin/auth/register';
$route['admin/forgot_password'] = 'admin/auth/forgot_password';
$route['admin/sales/(:num)'] = 'admin/sales/index/$1';
$route['admin/manpower/(:num)'] = 'admin/manpower/index/$1';

$route['admin/manpowerlist/(:num)'] = 'admin/manpowerlist/index/$1';

$route['admin/departmentsreport/(:num)'] = 'admin/departmentsreport/index/$1';
$route['admin/dawat/(:num)'] = 'admin/dawat/index/$1'; 
$route['admin/organization/(:num)'] = 'admin/organization/index/$1'; 
$route['admin/training/(:num)'] = 'admin/training/index/$1'; 
$route['admin/bm/(:num)'] = 'admin/bm/index/$1'; 
$route['admin/guest/(:num)'] = 'admin/guest/index/$1'; 
$route['admin/highersyllabus/(:num)'] = 'admin/highersyllabus/index/$1'; 
$route['admin/others/(:num)'] = 'admin/others/index/$1'; 
$route['admin/associate/(:num)'] = 'admin/associate/index/$1'; 
$route['admin/membercandidate/(:num)'] = 'admin/membercandidate/index/$1'; 
$route['admin/worker/(:num)'] = 'admin/worker/index/$1';

$route['admin/export/(:num)'] = 'admin/export/index/$1';


$route['admin/departmentsreport'] =  'admin/departmentsreport/index';
```
- **Lines 52-53:** Dashboard routes for different dashboard views
- **Lines 54-61:** User management and authentication routes
- **Line 61:** Commented out registration route (disabled)
- **Lines 62-78:** Various admin module routes with numeric parameters for branch/organization IDs
- **Line 80:** Export functionality route
- **Line 83:** Departments report base route

### Lines 89-103: Literature Department Routes
```php
//poriklpona-bivag
$route['admin/departmentsreport/poriklpona-bivag']='admin/departments_report/Poriklpona/poriklpona_bivag';
$route['admin/departmentsreport/poriklpona-bivag/(:num)']='admin/departments_report/Poriklpona/poriklpona_bivag/$1';

$route['admin/departmentsreport/delete-row'] = 'admin/departments_report/Literature/delete_row';
$route['admin/departmentsreport/add-literature-publication/(:num)'] = 'admin/departments_report/Literature/add_literature_publication/$1';

$route['admin/departmentsreport/add-literature-songothon/(:num)'] = 'admin/departments_report/Literature/add_literature_songothon/$1';

$route['admin/departmentsreport/literature-page-one'] = 'admin/departments_report/Literature/literature_page_one';
$route['admin/departmentsreport/literature-page-one/(:num)'] = 'admin/departments_report/Literature/literature_page_one/$1';

$route['admin/departmentsreport/literature-page-two'] = 'admin/departments_report/Literature/literature_page_two';
$route['admin/departmentsreport/literature-page-two/(:num)'] = 'admin/departments_report/Literature/literature_page_two/$1';
```
- **Line 89:** Comment in Bengali for "poriklpona-bivag" (planning department)
- **Lines 90-102:** Literature department routes including:
  - Planning department pages
  - Row deletion functionality
  - Literature publication and organization forms
  - Multi-page literature reports

### Lines 105-115: International Department Routes
```php
//international
$route['admin/departmentsreport/add-international-bideshe-study/(:num)'] = 'admin/departments_report/International/add_international_bideshe_study/$1';
$route['admin/departmentsreport/add-international-language-interested/(:num)'] = 'admin/departments_report/International/add_international_language_interested/$1';
$route['admin/departmentsreport/add-international-manpower-course/(:num)'] = 'admin/departments_report/International/add_international_manpower_course/$1';
$route['admin/departmentsreport/add-international-shabek-embassy/(:num)'] = 'admin/departments_report/International/add_international_shabek_embassy/$1';

$route['admin/departmentsreport/international-page-one'] = 'admin/departments_report/International/international_page_one';
$route['admin/departmentsreport/international-page-one/(:num)'] = 'admin/departments_report/International/international_page_one/$1';

$route['admin/departmentsreport/international-page-two'] = 'admin/departments_report/International/international_page_two';
$route['admin/departmentsreport/international-page-two/(:num)'] = 'admin/departments_report/International/international_page_two/$1';
```
- **Line 105:** Comment for international department
- **Lines 106-115:** International department routes for:
  - Foreign study tracking
  - Language interest forms
  - Manpower course management
  - Embassy/branch contact management
  - Multi-page international reports

### Lines 117-484: Extensive Department Routes
The file continues with similar routing patterns for multiple departments:

#### Education Department (Lines 117-125)
- `shikha-page-one`, `shikha-page-two`, `shikha-page-three` - Education report pages

#### Business Department (Lines 127-132)
- `business-page-one`, `business-page-two` - Business report pages

#### Madrasha Department (Lines 134-151)
- Six pages of madrasha (Islamic school) reports and management

#### Publicity Department (Lines 153-158)
- Two pages of publicity department reports

#### College Department (Lines 161-169)
- Three pages of college department reports

#### Student Movement Department (Lines 171-183)
- Student movement and organization routes including institution and council management

#### Debate Department (Lines 185-190)
- Two pages of debate department reports

#### Information Department (Lines 192-198)
- Information department with file protection and circulation management

#### Social Welfare Department (Lines 201-206)
- Social welfare department with social organization management

#### Research Department (Lines 210-218)
- Two pages of research reports with researcher and research interest tracking

#### Culture Department (Lines 221-229)
- Three pages of culture department reports

#### Publication Department (Lines 231-238)
- Two pages of publication reports with miscellaneous publication tracking

#### Manpower Development Department (Lines 240-242)
- Manpower development department reports

#### Library Department (Lines 245-248)
- Library department reports ("pathagar-bivag")

#### Foundation Department (Lines 250-261)
- Foundation department with various asset tracking (trust, land, flat, others)

#### Law Department (Lines 266-278)
- Two pages of law department with case tracking, release information, and protection records

#### Science Department (Lines 280-293)
- Four pages of science department with school magazine circulation tracking

#### IT Department (Lines 295-297)
- IT department reports

#### Social Media Department (Lines 299-301)
- Social media department reports (IT_bivag_SM)

#### Sports Department (Lines 304-311)
- Two pages of sports department with contact management

#### Dawah Department (Lines 314-319)
- Two pages of dawah (Islamic outreach) department

#### School Department (Lines 321-333)
- Four pages of school department reports

#### School Activities Department (Lines 336-338)
- School activities department ("school-karjokrom-bivag")

#### Others Department (Lines 342-388)
- Comprehensive "Others" department with seven pages covering:
  - Organization names and management
  - Student councils
  - Ward and thana growth/decline tracking
  - Branch and sub-branch statistics
  - Travel reports for different leadership levels

#### Media Department (Lines 400-448)
- Extensive media department covering:
  - Multiple report pages
  - Manpower tracking
  - Growth monitoring
  - Contact management
  - Library and training management
  - HR development
  - Course and recruitment reports
  - Portal and organization reports
  - Online and print media management

#### Student Welfare Department (Lines 461-463)
- Student welfare department ("chatrokollan-bivag")

#### Serials Department (Lines 466-468)
- Serial number management for departments

#### Human Rights Department (Lines 471-486)
- Human rights department ("manobadhikar-bivag") with:
  - Organization establishment tracking
  - Program management
  - Violation statistics
  - Contact management

### Line 489: File End
```php

```
- **Line 489:** Empty line at end of file

## Summary
This comprehensive routing file defines URL patterns for the Shughran application with the following key features:

### Organizational Structure
- **Main Application**: Shop functionality, authentication, basic pages
- **Admin Panel**: Administrative interface with extensive departmental reporting
- **Department Reports**: Detailed routing for multiple organizational departments

### Key Patterns
1. **Numeric Parameters**: `(:num)` for branch/organization IDs
2. **Any Parameters**: `(:any)` for flexible string parameters
3. **Module Structure**: `admin/departments_report/[Department]/[method]`
4. **Hierarchical Organization**: Logical grouping of related functionality

### Department Coverage
The application manages reports and data for approximately 25+ departments including:
- Educational institutions (schools, colleges, madrashas)
- Media and publication
- Legal and human rights
- Sports and culture
- International affairs
- Research and development
- And many more organizational aspects

### Technical Benefits
- **SEO-Friendly URLs**: Clean, descriptive URLs instead of controller/method structure
- **Modular Organization**: Clear separation of concerns by department
- **Flexible Parameters**: Support for both numeric IDs and string parameters
- **Scalable Structure**: Easy to add new departments and functionality