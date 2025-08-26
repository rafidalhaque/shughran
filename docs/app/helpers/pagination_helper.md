---
layout: page
title: pagination_helper.php Documentation
parent: Application Code Documentation
---

# pagination_helper.php Documentation

## File Overview
**Path:** `/app/helpers/pagination_helper.php`
**Purpose:** Custom helper function for generating Bootstrap-styled pagination links using CodeIgniter's pagination library
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

### Lines 3-4: Function Existence Check and Declaration
```php
if(! function_exists('pagination')) {
    function pagination($uri, $total, $per_page)
```
- **Line 3:** Checks if 'pagination' function already exists to prevent redefinition
- **Line 4:** Function declaration with three required parameters:
  - `$uri` - Base URI for pagination links
  - `$total` - Total number of records
  - `$per_page` - Number of records per page

### Lines 5-8: CodeIgniter Instance and Library Loading
```php
    {
        $ci = & get_instance();
        $ci->load->library('pagination');
        $config = array();
```
- **Line 5:** Opening brace for function
- **Line 6:** Gets reference to CodeIgniter instance using singleton pattern
- **Line 7:** Loads CodeIgniter's pagination library
- **Line 8:** Initializes empty configuration array

### Lines 9-11: Basic Pagination Configuration
```php
        $config['base_url']             = site_url($uri);
        $config['total_rows']           = $total;
        $config["per_page"]             = $per_page;
```
- **Line 9:** Sets base URL for pagination using CodeIgniter's site_url() helper
- **Line 10:** Sets total number of records for pagination calculation
- **Line 11:** Sets number of items per page

### Lines 12-13: Main Container Tags
```php
        $config['full_tag_open']        = '<ul class="pagination">';
        $config['full_tag_close']       = '</ul>';
```
- **Line 12:** Opens pagination container with Bootstrap pagination class
- **Line 13:** Closes pagination container

### Lines 14-17: First and Last Page Tags
```php
        $config['first_tag_open']       = '<li class="first">';
        $config['first_tag_close']      = '</li>';
        $config['last_tag_open']        = '<li class="last">';
        $config['last_tag_close']       = '</li>';
```
- **Line 14:** Opens first page link with CSS class "first"
- **Line 15:** Closes first page link
- **Line 16:** Opens last page link with CSS class "last"
- **Line 17:** Closes last page link

### Lines 18-21: Next and Previous Page Tags
```php
        $config['next_tag_open']        = '<li class="next">';
        $config['next_tag_close']       = '</li>';
        $config['prev_tag_open']        = '<li class="prev">';
        $config['prev_tag_close']       = '</li>';
```
- **Line 18:** Opens next page link with CSS class "next"
- **Line 19:** Closes next page link
- **Line 20:** Opens previous page link with CSS class "prev"
- **Line 21:** Closes previous page link

### Lines 22-25: Current and Regular Page Tags
```php
        $config['cur_tag_open']         = '<li class="active"><a>';
        $config['cur_tag_close']        = '</a></li>';
        $config['num_tag_open']         = '<li class="page">';
        $config['num_tag_close']        = '</li>';
```
- **Line 22:** Opens current page link with Bootstrap "active" class and anchor tag
- **Line 23:** Closes current page link
- **Line 24:** Opens regular page number links with CSS class "page"
- **Line 25:** Closes regular page number links

### Lines 26-28: Query String Configuration
```php
        $config['page_query_string']    = TRUE;
        $config['use_page_numbers']     = TRUE;
        $config['query_string_segment'] = 'page';
```
- **Line 26:** Enables query string-based pagination instead of URI segments
- **Line 27:** Uses actual page numbers instead of offset values
- **Line 28:** Sets query string parameter name to 'page'

### Lines 29-32: Navigation Link Icons
```php
        $config['first_link']           = '<i class="fa fa-angle-double-left"></i>';
        $config['last_link']            = '<i class="fa fa-angle-double-right"></i>';
        $config['prev_link']            = '<i class="fa fa-angle-left"></i>';
        $config['next_link']            = '<i class="fa fa-angle-right"></i>';
```
- **Line 29:** Sets first page link to Font Awesome double left arrow icon
- **Line 30:** Sets last page link to Font Awesome double right arrow icon
- **Line 31:** Sets previous page link to Font Awesome left arrow icon
- **Line 32:** Sets next page link to Font Awesome right arrow icon

### Lines 33-35: Pagination Initialization and Return
```php
        $ci->pagination->initialize($config);
        return $ci->pagination->create_links();
    }
```
- **Line 33:** Initializes CodeIgniter pagination library with custom configuration
- **Line 34:** Creates and returns the pagination HTML links
- **Line 35:** Closing brace for function

### Lines 36-37: Function and File End
```php
}
```
- **Line 36:** Closing brace for function existence check
- **Line 37:** Empty line at end of file

## Summary
This helper function provides a standardized way to create pagination links throughout the Shughran application with the following key features:

### Bootstrap Integration
- **CSS Classes**: Uses Bootstrap pagination classes for consistent styling
- **Responsive Design**: Compatible with Bootstrap's responsive grid system
- **Visual Consistency**: Matches application's overall Bootstrap theme

### Font Awesome Icons
- **Navigation Icons**: Uses Font Awesome icons for intuitive navigation
- **Double Arrows**: First/last page links use double arrows for clarity
- **Single Arrows**: Previous/next page links use single arrows

### Query String Based
- **SEO Friendly**: Uses query parameters instead of URI segments
- **Bookmarkable**: URLs are bookmarkable and shareable
- **Page Numbers**: Uses actual page numbers for user-friendly URLs

### Configuration Features
1. **Flexible URI**: Accepts any base URI for different pagination contexts
2. **Customizable Layout**: Uses HTML list structure for easy CSS styling
3. **Semantic Classes**: Each element type has specific CSS classes
4. **Active State**: Current page is clearly marked with "active" class

### Usage Examples
```php
// Basic usage
echo pagination('admin/users', 500, 20);
// Generates pagination for 500 users, 20 per page

// Department reports
echo pagination('admin/departmentsreport/literature-page-one', $total_records, 10);
// Generates pagination for department reports

// Search results
echo pagination('shop/search', $search_total, 15);
// Generates pagination for search results
```

### Technical Benefits
- **Reusable**: Single function for all pagination needs
- **Consistent**: Ensures uniform pagination appearance across application
- **Maintainable**: Centralized configuration for easy updates
- **Performance**: Leverages CodeIgniter's optimized pagination library
- **Accessibility**: Proper HTML structure supports screen readers

This helper is essential for maintaining consistent pagination UX throughout the Shughran application's admin panels, reports, and user-facing pages.