# index.php Documentation

## File Overview
**Path:** `/index.php`
**Purpose:** Front controller and main entry point for the Shughran application - handles all HTTP requests and initializes the CodeIgniter framework
**Framework:** CodeIgniter 3.x
**Language:** PHP

## Line-by-Line Documentation

### Line 1: PHP Opening Tag
```php
<?php
```
- **Line 1:** Opens PHP script without closing tag (recommended for front controllers)

### Lines 2-12: Timezone Configuration
```php
/*
 * --------------------------------------------------------------------
 * SET YOUR TIMEZONE
 * --------------------------------------------------------------------
 *
 * Find your timezone here
 * http://php.net/manual/en/timezones.php
 */
	$timezone = "Asia/Dhaka";
	if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
	define('TIMEZONE', $timezone);
```
- **Lines 2-9:** Multi-line comment explaining timezone configuration
- **Line 10:** Sets timezone to "Asia/Dhaka" (Bangladesh timezone)
- **Line 11:** Sets PHP's default timezone if function exists (safety check for older PHP versions)
- **Line 12:** Defines TIMEZONE constant for application use

### Lines 14-22: Demo Mode Configuration
```php
/*
 * --------------------------------------------------------------------
 * ENABLE/DISABLE DEMO
 * --------------------------------------------------------------------
 *
 * DEMO should always be set to 0 for production
 * To restrict the instllation as demo set DEMO to 1
 */
	define("DEMO", 0);
```
- **Lines 14-21:** Comment explaining demo mode functionality
- **Line 22:** Defines DEMO constant as 0 (disabled) - prevents write operations in demo mode

### Lines 24-43: Environment Configuration
```php
/*
 *---------------------------------------------------------------
 * APPLICATION ENVIRONMENT
 *---------------------------------------------------------------
 *
 * You can load different configurations depending on your
 * current environment. Setting the environment also influences
 * things like logging and error reporting.
 *
 * This can be set to anything, but default usage is:
 *
 *     development
 *     testing
 *     production
 *
 * NOTE: If you change these, also change the error_reporting() code below
 */
	// define('ENVIRONMENT', isset($_SERVER['CI_ENV']) ? $_SERVER['CI_ENV'] : 'development');
	
	define('ENVIRONMENT', 'production');
```
- **Lines 24-40:** Comment explaining environment configuration options
- **Line 41:** Commented out dynamic environment detection from server variable
- **Line 43:** Hard-coded environment as 'production' for deployment

### Lines 45-77: Error Reporting Configuration
```php
/*
 *---------------------------------------------------------------
 * ERROR REPORTING
 *---------------------------------------------------------------
 *
 * Different environments will require different levels of error reporting.
 * By default development will show errors but testing and live will hide them.
 */
switch (ENVIRONMENT)
{
	case 'development':
		error_reporting(-1);
		ini_set('display_errors', 1);
	break;

	case 'testing':
	case 'production':
		ini_set('display_errors', 0);
		if (version_compare(PHP_VERSION, '5.3', '>='))
		{
			error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED);
		}
		else
		{
			error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_USER_NOTICE);
		}
	break;

	default:
		header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
		echo 'The application environment is not set correctly.';
		exit(1); // EXIT_ERROR
}
```
- **Lines 45-52:** Comment explaining error reporting configuration
- **Line 53:** Switch statement based on ENVIRONMENT constant
- **Lines 55-58:** Development environment: Shows all errors and warnings
- **Lines 60-71:** Testing/Production environment: Hides display errors, filters error types
- **Lines 63-70:** PHP version-specific error reporting (different for PHP 5.3+)
- **Lines 73-77:** Default case: Shows 503 error if environment is invalid

### Lines 79-87: System Directory Configuration
```php
/*
 *---------------------------------------------------------------
 * SYSTEM DIRECTORY NAME
 *---------------------------------------------------------------
 *
 * This variable must contain the name of your "system" directory.
 * Set the path if it is not in the same directory as this file.
 */
	$system_path = 'system';
```
- **Lines 79-86:** Comment explaining system directory configuration
- **Line 87:** Sets system directory to 'system' (contains CodeIgniter framework files)

### Lines 89-104: Application Directory Configuration
```php
/*
 *---------------------------------------------------------------
 * APPLICATION DIRECTORY NAME
 *---------------------------------------------------------------
 *
 * If you want this front controller to use a different "application"
 * directory than the default one you can set its name here. The directory
 * can also be renamed or relocated anywhere on your server. If you do,
 * use an absolute (full) server path.
 * For more info please see the user guide:
 *
 * https://codeigniter.com/user_guide/general/managing_apps.html
 *
 * NO TRAILING SLASH!
 */
	$application_folder = 'app';
```
- **Lines 89-103:** Comment explaining application directory configuration
- **Line 104:** Sets application directory to 'app' (contains application-specific code)

### Lines 106-119: View Directory Configuration
```php
/*
 *---------------------------------------------------------------
 * VIEW DIRECTORY NAME
 *---------------------------------------------------------------
 *
 * If you want to move the view directory out of the application
 * directory, set the path to it here. The directory can be renamed
 * and relocated anywhere on your server. If blank, it will default
 * to the standard location inside your application directory.
 * If you do move this, use an absolute (full) server path.
 *
 * NO TRAILING SLASH!
 */
	$view_folder = 'themes';
```
- **Lines 106-118:** Comment explaining view directory configuration
- **Line 119:** Sets view directory to 'themes' (contains view templates and themes)

### Lines 122-149: Custom Routing Configuration
```php
/*
 * --------------------------------------------------------------------
 * DEFAULT CONTROLLER
 * --------------------------------------------------------------------
 *
 * Normally you will set your default controller in the routes.php file.
 * You can, however, force a custom routing by hard-coding a
 * specific controller class/function here. For most applications, you
 * WILL NOT set your routing here, but it's an option for those
 * special instances where you might want to override the standard
 * routing in a specific front controller that shares a common CI installation.
 *
 * IMPORTANT: If you set the routing here, NO OTHER controller will be
 * callable. In essence, this preference limits your application to ONE
 * specific controller. Leave the function name blank if you need
 * to call functions dynamically via the URI.
 *
 * Un-comment the $routing array below to use this feature
 */
	// The directory name, relative to the "controllers" directory.  Leave blank
	// if your controller is not in a sub-directory within the "controllers" one
	// $routing['directory'] = '';

	// The controller class file name.  Example:  mycontroller
	// $routing['controller'] = '';

	// The controller function you wish to be called.
	// $routing['function']	= '';
```
- **Lines 122-149:** Comment and commented code for custom routing override
- All routing variables are commented out - application uses routes.php instead

### Lines 152-166: Custom Config Values
```php
/*
 * -------------------------------------------------------------------
 *  CUSTOM CONFIG VALUES
 * -------------------------------------------------------------------
 *
 * The $assign_to_config array below will be passed dynamically to the
 * config class when initialized. This allows you to set custom config
 * items or override any default config values found in the config.php file.
 * This can be handy as it permits you to share one application between
 * multiple front controller files, with each file containing different
 * config values.
 *
 * Un-comment the $assign_to_config array below to use this feature
 */
	// $assign_to_config['name_of_config_item'] = 'value of config item';
```
- **Lines 152-166:** Comment and commented code for custom config override
- Config assignment is commented out - application uses standard config.php

### Lines 170-172: End of User Configuration
```php
// --------------------------------------------------------------------
// END OF USER CONFIGURABLE SETTINGS.  DO NOT EDIT BELOW THIS LINE
// --------------------------------------------------------------------
```
- **Lines 170-172:** Comment marking end of user-configurable settings

### Lines 174-198: System Path Resolution
```php
/*
 * ---------------------------------------------------------------
 *  Resolve the system path for increased reliability
 * ---------------------------------------------------------------
 */

	// Set the current directory correctly for CLI requests
	if (defined('STDIN'))
	{
		chdir(dirname(__FILE__));
	}

	if (($_temp = realpath($system_path)) !== FALSE)
	{
		$system_path = $_temp.DIRECTORY_SEPARATOR;
	}
	else
	{
		// Ensure there's a trailing slash
		$system_path = strtr(
			rtrim($system_path, '/\\'),
			'/\\',
			DIRECTORY_SEPARATOR.DIRECTORY_SEPARATOR
		).DIRECTORY_SEPARATOR;
	}
```
- **Lines 174-178:** Comment for system path resolution
- **Lines 180-184:** Sets correct directory for CLI (command line) requests
- **Lines 186-198:** Resolves system path to absolute path with proper directory separators

### Lines 200-206: System Path Validation
```php
	// Is the system path correct?
	if ( ! is_dir($system_path))
	{
		header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
		echo 'Your system folder path does not appear to be set correctly. Please open the following file and correct this: '.pathinfo(__FILE__, PATHINFO_BASENAME);
		exit(3); // EXIT_CONFIG
	}
```
- **Line 200:** Comment for system path validation
- **Lines 201-206:** Validates system directory exists, shows 503 error if not found

### Lines 208-224: Path Constants Definition
```php
/*
 * -------------------------------------------------------------------
 *  Now that we know the path, set the main path constants
 * -------------------------------------------------------------------
 */
	// The name of THIS file
	define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));

	// Path to the system directory
	define('BASEPATH', $system_path);

	// Path to the front controller (this file) directory
	define('FCPATH', dirname(__FILE__).DIRECTORY_SEPARATOR);

	// Name of the "system" directory
	define('SYSDIR', basename(BASEPATH));
```
- **Lines 208-212:** Comment for path constants
- **Line 214:** Defines SELF constant as filename of this file
- **Line 217:** Defines BASEPATH constant for system directory
- **Line 220:** Defines FCPATH constant for front controller directory
- **Line 223:** Defines SYSDIR constant as system directory name

### Lines 225-256: Application Path Resolution
```php
	// The path to the "application" directory
	if (is_dir($application_folder))
	{
		if (($_temp = realpath($application_folder)) !== FALSE)
		{
			$application_folder = $_temp;
		}
		else
		{
			$application_folder = strtr(
				rtrim($application_folder, '/\\'),
				'/\\',
				DIRECTORY_SEPARATOR.DIRECTORY_SEPARATOR
			);
		}
	}
	elseif (is_dir(BASEPATH.$application_folder.DIRECTORY_SEPARATOR))
	{
		$application_folder = BASEPATH.strtr(
			trim($application_folder, '/\\'),
			'/\\',
			DIRECTORY_SEPARATOR.DIRECTORY_SEPARATOR
		);
	}
	else
	{
		header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
		echo 'Your application folder path does not appear to be set correctly. Please open the following file and correct this: '.SELF;
		exit(3); // EXIT_CONFIG
	}

	define('APPPATH', $application_folder.DIRECTORY_SEPARATOR);
```
- **Lines 225-255:** Resolves application directory path with multiple fallback attempts
- **Line 256:** Defines APPPATH constant for application directory

### Lines 258-293: View Path Resolution
```php
	// The path to the "views" directory
	if ( ! isset($view_folder[0]) && is_dir(APPPATH.'views'.DIRECTORY_SEPARATOR))
	{
		$view_folder = APPPATH.'views';
	}
	elseif (is_dir($view_folder))
	{
		if (($_temp = realpath($view_folder)) !== FALSE)
		{
			$view_folder = $_temp;
		}
		else
		{
			$view_folder = strtr(
				rtrim($view_folder, '/\\'),
				'/\\',
				DIRECTORY_SEPARATOR.DIRECTORY_SEPARATOR
			);
		}
	}
	elseif (is_dir(APPPATH.$view_folder.DIRECTORY_SEPARATOR))
	{
		$view_folder = APPPATH.strtr(
			trim($view_folder, '/\\'),
			'/\\',
			DIRECTORY_SEPARATOR.DIRECTORY_SEPARATOR
		);
	}
	else
	{
		header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
		echo 'Your view folder path does not appear to be set correctly. Please open the following file and correct this: '.SELF;
		exit(3); // EXIT_CONFIG
	}

	define('VIEWPATH', $view_folder.DIRECTORY_SEPARATOR);
```
- **Lines 258-292:** Resolves view directory path with multiple fallback attempts
- **Line 293:** Defines VIEWPATH constant for view/theme directory

### Lines 295-304: Framework Bootstrap
```php
/*
 * --------------------------------------------------------------------
 * LOAD THE BOOTSTRAP FILE
 * --------------------------------------------------------------------
 *
 * And away we go...
 */


require_once BASEPATH.'core/CodeIgniter.php';
```
- **Lines 295-301:** Comment for framework bootstrap
- **Line 304:** Requires CodeIgniter core file to start the framework
- **Line 305:** Empty line at end of file

## Summary
This front controller file serves as the main entry point for the Shughran application with the following key features:

### Configuration Management
- **Timezone**: Set to Asia/Dhaka for Bangladesh
- **Environment**: Production mode with appropriate error reporting
- **Demo Mode**: Disabled for production use
- **Directory Structure**: Custom paths for app/, system/, and themes/

### Path Resolution
- **Robust Path Handling**: Multiple fallback attempts for directory resolution
- **Cross-Platform**: Uses DIRECTORY_SEPARATOR for Windows/Linux compatibility
- **Validation**: Checks directory existence before proceeding

### Error Handling
- **Environment-Specific**: Different error reporting for development vs production
- **Graceful Failures**: 503 Service Unavailable for configuration errors
- **User-Friendly**: Clear error messages for configuration issues

### Framework Integration
- **CodeIgniter Bootstrap**: Loads framework core after configuration
- **Constants Definition**: Sets up essential path constants for framework use
- **CLI Support**: Handles command-line interface requests

### Security Features
- **No Direct Access**: All requests go through this single entry point
- **Path Validation**: Ensures directories exist before use
- **Error Suppression**: Hides errors in production environment

This file follows CodeIgniter best practices and provides a solid foundation for the application's request handling.