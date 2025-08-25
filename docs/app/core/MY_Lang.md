# MY_Lang.php Documentation

## File Overview
**Path:** `/app/core/MY_Lang.php`
**Purpose:** Custom language class that extends CodeIgniter's CI_Lang to provide enhanced language loading functionality for admin and shop modules
**Framework:** CodeIgniter 3.x
**Language:** PHP

## Line-by-Line Documentation

### Line 1: PHP Opening Tag and Security Check
```php
<?php (defined('BASEPATH')) OR exit('No direct script access allowed');
```
- **Line 1:** Opens PHP script and prevents direct access to the file
- `(defined('BASEPATH'))` - Checks if CodeIgniter's BASEPATH constant is defined
- `exit('No direct script access allowed')` - Terminates execution if accessed directly without CodeIgniter framework

### Line 2: Empty Line
```php

```
- **Line 2:** Empty line for code formatting

### Lines 3-4: Class Declaration
```php
class MY_Lang extends CI_Lang {
```
- **Line 3:** Declares the MY_Lang class extending CodeIgniter's base CI_Lang class
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
- **Line 7:** Calls parent CI_Lang constructor to initialize CodeIgniter's language functionality
- **Line 8:** Closing brace for constructor

### Line 9: Empty Line
```php

```
- **Line 9:** Empty line for code formatting between methods

### Lines 10-12: Admin Language Loader
```php
public function admin_load($langfile, $idiom = '', $return = FALSE, $add_suffix = TRUE, $alt_path = '') {
    return $this->my_load($langfile, $idiom, $return, $add_suffix, $alt_path, 'admin');
}
```
- **Line 10:** Public method to load language files specifically for admin interface
- Parameters:
  - `$langfile` - Name of language file to load
  - `$idiom` - Language code (e.g., 'english', 'spanish')
  - `$return` - Whether to return language array instead of loading into memory
  - `$add_suffix` - Whether to automatically add '_lang' suffix
  - `$alt_path` - Alternative path to search for language files
- **Line 11:** Calls the custom my_load method with 'admin' path
- **Line 12:** Closing brace for method

### Line 13: Empty Line
```php

```
- **Line 13:** Empty line for code formatting between methods

### Lines 14-16: Shop Language Loader
```php
public function shop_load($langfile, $idiom = '', $return = FALSE, $add_suffix = TRUE, $alt_path = '') {
    return $this->my_load($langfile, $idiom, $return, $add_suffix, $alt_path, 'shop');
}
```
- **Line 14:** Public method to load language files specifically for shop interface
- Same parameters as admin_load method
- **Line 15:** Calls the custom my_load method with 'shop' path
- **Line 16:** Closing brace for method

### Line 17: Empty Line
```php

```
- **Line 17:** Empty line for code formatting between methods

### Lines 18-88: Custom Language Loader Method
```php
public function my_load($langfile, $idiom = '', $return = FALSE, $add_suffix = TRUE, $alt_path = '', $path = NULL) {
```
- **Line 18:** Main custom language loading method with additional $path parameter

### Lines 19-25: Handle Array Input
```php
if (is_array($langfile)) {
    foreach ($langfile as $value) {
        $this->load($value, $idiom, $return, $add_suffix, $alt_path);
    }
    
    return;
}
```
- **Line 19:** Checks if multiple language files passed as array
- **Lines 20-22:** Recursively loads each file in the array using standard load method
- **Line 24:** Returns early after loading all files in array

### Lines 26-33: File Name Processing
```php
$langfile = str_replace('.php', '', $langfile);

if ($add_suffix === TRUE) {
    $langfile = preg_replace('/_lang$/', '', $langfile).'_lang';
}

$langfile .= '.php';
```
- **Line 26:** Removes .php extension if present
- **Line 28:** Checks if suffix should be added
- **Line 29:** Removes existing '_lang' suffix and adds it back (ensures single suffix)
- **Line 32:** Adds .php extension to filename

### Lines 34-37: Language Detection
```php
if (empty($idiom) OR ! preg_match('/^[a-z_-]+$/i', $idiom)) {
    $config =& get_config();
    $idiom = empty($config['language']) ? 'english' : $config['language'];
}
```
- **Line 34:** Validates language code (empty or invalid characters)
- **Line 35:** Gets CodeIgniter configuration
- **Line 36:** Sets default language to 'english' or configured language

### Lines 39-42: Check If Already Loaded
```php
if ($return === FALSE && isset($this->is_loaded[$langfile]) && $this->is_loaded[$langfile] === $idiom) {
    return;
}
```
- **Line 39:** Checks if file already loaded for same language and not returning array
- **Line 40:** Returns early if already loaded

### Lines 43-47: Load from Base Path
```php
$basepath = BASEPATH.'language/'.$idiom.'/'.($path ? $path.'/' : '').$langfile;
if (($found = file_exists($basepath)) === TRUE) {
    include($basepath);
}
```
- **Line 43:** Constructs path to language file in system directory with optional subdirectory
- **Line 44:** Checks if file exists at base path
- **Line 45:** Includes the file if found

### Lines 48-63: Alternative Path Loading
```php
if ($alt_path !== '') {
    $alt_path .= 'language/'.$idiom.'/'.$langfile;
    if (file_exists($alt_path)) {
        include($alt_path);
        $found = TRUE;
    }
} else {
    foreach (get_instance()->load->get_package_paths(TRUE) as $package_path) {
        $package_path .= 'language/'.$idiom.'/'.($path ? $path.'/' : '').$langfile;
        if ($basepath !== $package_path && file_exists($package_path)) {
            include($package_path);
            $found = TRUE;
            break;
        }
    }
}
```
- **Lines 48-54:** If alternative path provided, try loading from there
- **Lines 55-62:** Otherwise, search through all package paths for the language file
- Includes path subdirectory if specified

### Lines 65-67: Error Handling
```php
if ($found !== TRUE) {
    show_error('Unable to load the requested language file: language/'.$idiom.'/'.($path ? $path.'/' : '').$langfile);
}
```
- **Line 65:** Checks if file was found in any location
- **Line 66:** Shows CodeIgniter error if file not found

### Lines 69-76: Validate Language Data
```php
if ( ! isset($lang) OR ! is_array($lang)) {
    log_message('error', 'Language file contains no data: language/'.$idiom.'/'.($path ? $path.'/' : '').$langfile);
    
    if ($return === TRUE) {
        return array();
    }
    return;
}
```
- **Line 69:** Checks if $lang variable exists and is array (should be set by included file)
- **Line 70:** Logs error if language file contains no data
- **Lines 72-75:** Returns empty array or nothing based on $return parameter

### Lines 78-87: Process Language Data
```php
if ($return === TRUE) {
    return $lang;
}

$this->is_loaded[$langfile] = $idiom;
$this->language = array_merge($this->language, $lang);

log_message('info', 'Language file loaded: language/'.$idiom.'/'.($path ? $path.'/' : '').$langfile);
return TRUE;
```
- **Lines 78-80:** Returns language array if requested
- **Line 82:** Marks file as loaded for this language
- **Line 83:** Merges loaded language data with existing language array
- **Line 85:** Logs successful loading
- **Line 86:** Returns TRUE to indicate success

### Line 88: Empty Line
```php

```
- **Line 88:** Empty line for code formatting between methods

### Lines 89-99: Enhanced Line Method
```php
public function line($line, $params = NULL) {
    $return = parent::line($line);
    if($return === false) {
        return str_replace('_', ' ', $line);
    } else {
        if(! is_null($params)) {
            $return = $this->_ni_line($return, $params);
        }
        return $return;
    }
}
```
- **Line 89:** Enhanced method to get language line with parameter substitution
- **Line 90:** Calls parent method to get language line
- **Line 91:** Checks if line was not found (returns false)
- **Line 92:** Returns formatted version of key (replace underscores with spaces) if not found
- **Line 94:** Checks if parameters provided for substitution
- **Line 95:** Calls private method to substitute parameters
- **Line 97:** Returns the processed language line

### Line 100: Empty Line
```php

```
- **Line 100:** Empty line for code formatting between methods

### Lines 101-113: Parameter Substitution Method
```php
private function _ni_line($str, $params) {
    $return = $str;
    $params = is_array($params) ? $params : array($params);
    $search = array();
    $cnt = 1;
    foreach($params as $param) {
        $search[$cnt] = "/\\${$cnt}/";
        $cnt++;
    }
    unset($search[0]);
    $return = preg_replace($search, $params, $return);
    return $return;
}
```
- **Line 101:** Private method to substitute parameters in language strings
- **Line 102:** Initialize return value
- **Line 103:** Ensure parameters is an array
- **Line 104:** Initialize search patterns array
- **Line 105:** Initialize counter starting at 1
- **Lines 106-108:** Build regex patterns for each parameter ($1, $2, etc.)
- **Line 109:** Remove index 0 (not used)
- **Line 110:** Replace all parameter placeholders with actual values
- **Line 111:** Return processed string

### Lines 114-115: Class End
```php
}
```
- **Line 114:** Closing brace for MY_Lang class
- **Line 115:** Empty line at end of file

## Summary
This file enhances CodeIgniter's language functionality with:

### Key Features
1. **Module-Specific Loading**: Separate methods for admin and shop language files
2. **Subdirectory Support**: Can load language files from subdirectories (admin/, shop/)
3. **Enhanced Error Handling**: Graceful fallback when language lines don't exist
4. **Parameter Substitution**: Support for placeholder replacement in language strings
5. **Flexible Path Loading**: Supports alternative paths and package paths

### Usage Examples
- `$this->lang->admin_load('sma', 'english')` - Load admin language file
- `$this->lang->shop_load('products', 'spanish')` - Load shop language file
- `$this->lang->line('welcome_message', array('John'))` - Get line with parameter substitution

### Technical Benefits
- **Organized Language Files**: Separates admin and shop translations
- **Backward Compatibility**: Maintains all original CI_Lang functionality
- **Better UX**: Shows formatted key names when translations are missing
- **Dynamic Content**: Supports parameterized language strings