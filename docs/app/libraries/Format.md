---
layout: page
title: Format.php Documentation
parent: Application Code Documentation
---

# Format.php Documentation

## File Overview
**Path:** `/app/libraries/Format.php`
**Purpose:** Data format conversion library supporting multiple formats (JSON, XML, CSV, HTML, Array, PHP, Serialized)
**Framework:** CodeIgniter 3.x
**Language:** PHP
**Author:** Phil Sturgeon, Chris Kacerguis, @softwarespot
**License:** DBAD License

## Line-by-Line Documentation

### Lines 1-5: PHP Opening and Security
```php
<?php
// Note, this cannot be namespaced for the time being due to how CI works
//namespace Restserver\Libraries;

defined('BASEPATH') OR exit('No direct script access allowed');
```
- **Line 1:** PHP opening tag
- **Lines 2-3:** Comment noting namespace limitation due to CodeIgniter compatibility
- **Line 5:** Security check to prevent direct file access

### Lines 7-14: Class Header and Documentation
```php
/**
 * Format class
 * Help convert between various formats such as XML, JSON, CSV, etc.
 *
 * @author    Phil Sturgeon, Chris Kacerguis, @softwarespot
 * @license   http://www.dbad-license.org/
 */
class Format {
```
- **Lines 7-13:** PHPDoc header with class description, authors, and license
- **Line 14:** Class declaration

### Lines 16-54: Format Constants
```php
/**
 * Array output format
 */
const ARRAY_FORMAT = 'array';

/**
 * Comma Separated Value (CSV) output format
 */
const CSV_FORMAT = 'csv';

/**
 * Json output format
 */
const JSON_FORMAT = 'json';

/**
 * HTML output format
 */
const HTML_FORMAT = 'html';

/**
 * PHP output format
 */
const PHP_FORMAT = 'php';

/**
 * Serialized output format
 */
const SERIALIZED_FORMAT = 'serialized';

/**
 * XML output format
 */
const XML_FORMAT = 'xml';

/**
 * Default format of this class
 */
const DEFAULT_FORMAT = self::JSON_FORMAT; // Couldn't be DEFAULT, as this is a keyword
```
- **Lines 16-54:** Define constants for supported output formats
- Each constant has PHPDoc documentation explaining its purpose
- **Line 54:** Default format set to JSON with explanatory comment

### Lines 56-76: Class Properties
```php
/**
 * CodeIgniter instance
 *
 * @var object
 */
private $_CI;

/**
 * Data to parse
 *
 * @var mixed
 */
protected $_data = [];

/**
 * Type to convert from
 *
 * @var string
 */
protected $_from_type = NULL;
```
- **Lines 56-61:** Private property to store CodeIgniter instance
- **Lines 63-68:** Protected property to store data for conversion
- **Lines 70-76:** Protected property to track source format type

### Lines 78-108: Constructor Method
```php
/**
 * DO NOT CALL THIS DIRECTLY, USE factory()
 *
 * @param NULL $data
 * @param NULL $from_type
 * @throws Exception
 */

public function __construct($data = NULL, $from_type = NULL)
{
    // Get the CodeIgniter reference
    $this->_CI = &get_instance();

    // Load the inflector helper
    $this->_CI->load->helper('inflector');

    // If the provided data is already formatted we should probably convert it to an array
    if ($from_type !== NULL)
    {
        if (method_exists($this, '_from_'.$from_type))
        {
            $data = call_user_func([$this, '_from_'.$from_type], $data);
        }
        else
        {
            throw new Exception('Format class does not support conversion from "'.$from_type.'".');
        }
    }

    // Set the member variable to the data passed
    $this->_data = $data;
}
```
- **Lines 78-84:** PHPDoc recommending use of factory() method instead
- **Line 85:** Constructor with optional data and source format parameters
- **Line 88:** Gets CodeIgniter instance reference
- **Line 91:** Loads inflector helper for string manipulation
- **Lines 94-104:** Converts input data if source format is specified
- **Line 96:** Checks if conversion method exists for the format
- **Line 98:** Calls appropriate conversion method using dynamic method calling
- **Line 102:** Throws exception for unsupported formats
- **Line 107:** Stores processed data in class property

### Lines 110-125: Factory Method
```php
/**
 * Create an instance of the format class
 * e.g: echo $this->format->factory(['foo' => 'bar'])->to_csv();
 *
 * @param mixed $data Data to convert/parse
 * @param string $from_type Type to convert from e.g. json, csv, html
 *
 * @return object Instance of the format class
 */
public function factory($data, $from_type = NULL)
{
    // $class = __CLASS__;
    // return new $class();

    return new static($data, $from_type);
}
```
- **Lines 110-118:** PHPDoc with usage example and parameter descriptions
- **Line 119:** Factory method for creating Format instances
- **Lines 121-122:** Commented out alternative implementation
- **Line 124:** Returns new instance using late static binding

### Lines 127-165: Array Conversion Method
```php
// FORMATTING OUTPUT ---------------------------------------------------------

/**
 * Format data as an array
 *
 * @param mixed|NULL $data Optional data to pass, so as to override the data passed
 * to the constructor
 * @return array Data parsed as an array; otherwise, an empty array
 */
public function to_array($data = NULL)
{
    // If no data is passed as a parameter, then use the data passed
    // via the constructor
    if ($data === NULL && func_num_args() === 0)
    {
        $data = $this->_data;
    }

    // Cast as an array if not already
    if (is_array($data) === FALSE)
    {
        $data = (array) $data;
    }

    $array = [];
    foreach ((array) $data as $key => $value)
    {
        if (is_object($value) === TRUE || is_array($value) === TRUE)
        {
            $array[$key] = $this->to_array($value);
        }
        else
        {
            $array[$key] = $value;
        }
    }

    return $array;
}
```
- **Line 127:** Comment section divider for output formatting methods
- **Lines 129-135:** PHPDoc for array conversion method
- **Line 136:** Method to convert data to array format
- **Lines 140-143:** Uses constructor data if no parameter provided
- **Lines 146-149:** Ensures data is an array
- **Lines 151-162:** Recursively converts nested objects/arrays to arrays
- **Line 164:** Returns final array

### Lines 167-244: XML Conversion Method
```php
/**
 * Format data as XML
 *
 * @param mixed|NULL $data Optional data to pass, so as to override the data passed
 * to the constructor
 * @param NULL $structure
 * @param string $basenode
 * @return mixed
 */
public function to_xml($data = NULL, $structure = NULL, $basenode = 'xml')
{
    if ($data === NULL && func_num_args() === 0)
    {
        $data = $this->_data;
    }

    if ($structure === NULL)
    {
        $structure = simplexml_load_string("<?xml version='1.0' encoding='utf-8'?><$basenode />");
    }

    // Force it to be something useful
    if (is_array($data) === FALSE && is_object($data) === FALSE)
    {
        $data = (array) $data;
    }

    foreach ($data as $key => $value)
    {

        //change false/true to 0/1
        if (is_bool($value))
        {
            $value = (int) $value;
        }

        // no numeric keys in our xml please!
        if (is_numeric($key))
        {
            // make string key...
            $key = (singular($basenode) != $basenode) ? singular($basenode) : 'item';
        }

        // replace anything not alpha numeric
        $key = preg_replace('/[^a-z_\-0-9]/i', '', $key);

        if ($key === '_attributes' && (is_array($value) || is_object($value)))
        {
            $attributes = $value;
            if (is_object($attributes))
            {
                $attributes = get_object_vars($attributes);
            }

            foreach ($attributes as $attribute_name => $attribute_value)
            {
                $structure->addAttribute($attribute_name, $attribute_value);
            }
        }
        // if there is another array found recursively call this function
        elseif (is_array($value) || is_object($value))
        {
            $node = $structure->addChild($key);

            // recursive call.
            $this->to_xml($value, $node, $key);
        }
        else
        {
            // add single node.
            $value = htmlspecialchars(html_entity_decode($value, ENT_QUOTES, 'UTF-8'), ENT_QUOTES, 'UTF-8');

            $structure->addChild($key, $value);
        }
    }

    return $structure->asXML();
}
```
- **Lines 167-175:** PHPDoc for XML conversion method
- **Line 176:** XML conversion method with optional parameters
- **Lines 178-181:** Uses constructor data if no parameter provided
- **Lines 183-186:** Creates XML structure if none provided
- **Lines 189-192:** Ensures data is array or object
- **Lines 194-241:** Main conversion loop:
  - **Lines 197-200:** Converts boolean values to integers
  - **Lines 203-207:** Handles numeric keys by using singular form
  - **Line 210:** Sanitizes key names to be XML-valid
  - **Lines 212-225:** Handles XML attributes specially
  - **Lines 227-232:** Recursively processes nested arrays/objects
  - **Lines 234-239:** Adds leaf nodes with proper HTML entity handling
- **Line 243:** Returns XML string

### Lines 246-296: HTML Conversion Method
```php
/**
 * Format data as HTML
 *
 * @param mixed|NULL $data Optional data to pass, so as to override the data passed
 * to the constructor
 * @return mixed
 */
public function to_html($data = NULL)
{
    // If no data is passed as a parameter, then use the data passed
    // via the constructor
    if ($data === NULL && func_num_args() === 0)
    {
        $data = $this->_data;
    }

    // Cast as an array if not already
    if (is_array($data) === FALSE)
    {
        $data = (array) $data;
    }

    // Check if it's a multi-dimensional array
    if (isset($data[0]) && count($data) !== count($data, COUNT_RECURSIVE))
    {
        // Multi-dimensional array
        $headings = array_keys($data[0]);
    }
    else
    {
        // Single array
        $headings = array_keys($data);
        $data = [$data];
    }

    // Load the table library
    $this->_CI->load->library('table');

    $this->_CI->table->set_heading($headings);

    foreach ($data as $row)
    {
        // Suppressing the "array to string conversion" notice
        // Keep the "evil" @ here
        $row = @array_map('strval', $row);

        $this->_CI->table->add_row($row);
    }

    return $this->_CI->table->generate();
}
```
- **Lines 246-252:** PHPDoc for HTML conversion method
- **Line 253:** HTML table conversion method
- **Lines 257-260:** Uses constructor data if no parameter provided
- **Lines 263-266:** Ensures data is an array
- **Lines 269-279:** Determines table structure (multi-dimensional vs single array)
- **Line 282:** Loads CodeIgniter's table library
- **Line 284:** Sets table headings
- **Lines 286-293:** Adds data rows, converting all values to strings
- **Line 295:** Returns generated HTML table

### Lines 298-385: CSV Conversion Method
```php
/**
 * @link http://www.metashock.de/2014/02/create-csv-file-in-memory-php/
 * @param mixed|NULL $data Optional data to pass, so as to override the data passed
 * to the constructor
 * @param string $delimiter The optional delimiter parameter sets the field
 * delimiter (one character only). NULL will use the default value (,)
 * @param string $enclosure The optional enclosure parameter sets the field
 * enclosure (one character only). NULL will use the default value (")
 * @return string A csv string
 */
public function to_csv($data = NULL, $delimiter = ',', $enclosure = '"')
{
    // Use a threshold of 1 MB (1024 * 1024)
    $handle = fopen('php://temp/maxmemory:1048576', 'w');
    if ($handle === FALSE)
    {
        return NULL;
    }

    // If no data is passed as a parameter, then use the data passed
    // via the constructor
    if ($data === NULL && func_num_args() === 0)
    {
        $data = $this->_data;
    }

    // If NULL, then set as the default delimiter
    if ($delimiter === NULL)
    {
        $delimiter = ',';
    }

    // If NULL, then set as the default enclosure
    if ($enclosure === NULL)
    {
        $enclosure = '"';
    }

    // Cast as an array if not already
    if (is_array($data) === FALSE)
    {
        $data = (array) $data;
    }

    // Check if it's a multi-dimensional array
    if (isset($data[0]) && count($data) !== count($data, COUNT_RECURSIVE))
    {
        // Multi-dimensional array
        $headings = array_keys($data[0]);
    }
    else
    {
        // Single array
        $headings = array_keys($data);
        $data = [$data];
    }

    // Apply the headings
    fputcsv($handle, $headings, $delimiter, $enclosure);

    foreach ($data as $record)
    {
        // If the record is not an array, then break. This is because the 2nd param of
        // fputcsv() should be an array
        if (is_array($record) === FALSE)
        {
            break;
        }

        // Suppressing the "array to string conversion" notice.
        // Keep the "evil" @ here.
        $record = @ array_map('strval', $record);

        // Returns the length of the string written or FALSE
        fputcsv($handle, $record, $delimiter, $enclosure);
    }

    // Reset the file pointer
    rewind($handle);

    // Retrieve the csv contents
    $csv = stream_get_contents($handle);

    // Close the handle
    fclose($handle);

    return $csv;
}
```
- **Lines 298-307:** PHPDoc with reference link and parameter descriptions
- **Line 308:** CSV conversion method with customizable delimiter and enclosure
- **Lines 311-316:** Creates in-memory file handle with 1MB limit
- **Lines 319-322:** Uses constructor data if no parameter provided
- **Lines 325-334:** Sets default delimiter and enclosure if not specified
- **Lines 337-340:** Ensures data is an array
- **Lines 343-353:** Determines CSV structure and headings
- **Line 356:** Writes CSV header row
- **Lines 358-373:** Writes data rows, converting values to strings
- **Lines 376-382:** Rewinds file, reads content, and closes handle
- **Line 384:** Returns CSV string

### Lines 387-423: JSON Conversion Method
```php
/**
 * Encode data as json
 *
 * @param mixed|NULL $data Optional data to pass, so as to override the data passed
 * to the constructor
 * @return string Json representation of a value
 */
public function to_json($data = NULL)
{
    // If no data is passed as a parameter, then use the data passed
    // via the constructor
    if ($data === NULL && func_num_args() === 0)
    {
        $data = $this->_data;
    }

    // Get the callback parameter (if set)
    $callback = $this->_CI->input->get('callback');

    if (empty($callback) === TRUE)
    {
        return json_encode($data);
    }

    // We only honour a jsonp callback which are valid javascript identifiers
    elseif (preg_match('/^[a-z_\$][a-z0-9\$_]*(\.[a-z_\$][a-z0-9\$_]*)*$/i', $callback))
    {
        // Return the data as encoded json with a callback
        return $callback.'('.json_encode($data).');';
    }

    // An invalid jsonp callback function provided.
    // Though I don't believe this should be hardcoded here
    $data['warning'] = 'INVALID JSONP CALLBACK: '.$callback;

    return json_encode($data);
}
```
- **Lines 387-393:** PHPDoc for JSON conversion method
- **Line 394:** JSON conversion method
- **Lines 398-401:** Uses constructor data if no parameter provided
- **Line 404:** Gets JSONP callback parameter from request
- **Lines 406-409:** Returns plain JSON if no callback specified
- **Lines 412-416:** Returns JSONP if valid callback provided
- **Lines 419-422:** Handles invalid callback by adding warning to data

### Lines 425-442: Serialized Format Method
```php
/**
 * Encode data as a serialized array
 *
 * @param mixed|NULL $data Optional data to pass, so as to override the data passed
 * to the constructor
 * @return string Serialized data
 */
public function to_serialized($data = NULL)
{
    // If no data is passed as a parameter, then use the data passed
    // via the constructor
    if ($data === NULL && func_num_args() === 0)
    {
        $data = $this->_data;
    }

    return serialize($data);
}
```
- **Lines 425-431:** PHPDoc for serialization method
- **Line 432:** Serialization method
- **Lines 436-439:** Uses constructor data if no parameter provided
- **Line 441:** Returns PHP serialized data

### Lines 444-461: PHP Format Method
```php
/**
 * Format data using a PHP structure
 *
 * @param mixed|NULL $data Optional data to pass, so as to override the data passed
 * to the constructor
 * @return mixed String representation of a variable
 */
public function to_php($data = NULL)
{
    // If no data is passed as a parameter, then use the data passed
    // via the constructor
    if ($data === NULL && func_num_args() === 0)
    {
        $data = $this->_data;
    }

    return var_export($data, TRUE);
}
```
- **Lines 444-450:** PHPDoc for PHP format method
- **Line 451:** PHP format method
- **Lines 455-458:** Uses constructor data if no parameter provided
- **Line 460:** Returns var_export string representation

### Lines 463-525: Input Parsing Methods
```php
// INTERNAL FUNCTIONS

/**
 * @param string $data XML string
 * @return array XML element object; otherwise, empty array
 */
protected function _from_xml($data)
{
    return $data ? (array) simplexml_load_string($data, 'SimpleXMLElement', LIBXML_NOCDATA) : [];
}

/**
 * @param string $data CSV string
 * @param string $delimiter The optional delimiter parameter sets the field
 * delimiter (one character only). NULL will use the default value (,)
 * @param string $enclosure The optional enclosure parameter sets the field
 * enclosure (one character only). NULL will use the default value (")
 * @return array A multi-dimensional array with the outer array being the number of rows
 * and the inner arrays the individual fields
 */
protected function _from_csv($data, $delimiter = ',', $enclosure = '"')
{
    // If NULL, then set as the default delimiter
    if ($delimiter === NULL)
    {
        $delimiter = ',';
    }

    // If NULL, then set as the default enclosure
    if ($enclosure === NULL)
    {
        $enclosure = '"';
    }

    return str_getcsv($data, $delimiter, $enclosure);
}

/**
 * @param string $data Encoded json string
 * @return mixed Decoded json string with leading and trailing whitespace removed
 */
protected function _from_json($data)
{
    return json_decode(trim($data));
}

/**
 * @param string $data Data to unserialize
 * @return mixed Unserialized data
 */
protected function _from_serialize($data)
{
    return unserialize(trim($data));
}

/**
 * @param string $data Data to trim leading and trailing whitespace
 * @return string Data with leading and trailing whitespace removed
 */
protected function _from_php($data)
{
    return trim($data);
}
```
- **Line 463:** Comment section for internal parsing functions
- **Lines 465-471:** XML parsing method using SimpleXML
- **Lines 473-498:** CSV parsing method with configurable delimiters
- **Lines 500-507:** JSON parsing method with trimming
- **Lines 509-516:** Serialized data parsing method
- **Lines 518-525:** PHP data parsing method (just trimming)

### Lines 526-527: Class End
```php
}
```
- **Line 526:** Closing brace for Format class
- **Line 527:** Empty line at end of file

## Summary
This Format library provides comprehensive data conversion capabilities for the Shughran application with the following key features:

### Supported Output Formats
1. **Array**: Native PHP arrays with recursive conversion
2. **JSON**: Standard JSON with optional JSONP callback support
3. **XML**: Well-formed XML with attribute support and proper escaping
4. **HTML**: HTML tables using CodeIgniter's table library
5. **CSV**: Comma-separated values with configurable delimiters
6. **PHP**: var_export format for debugging/serialization
7. **Serialized**: PHP serialize format

### Supported Input Formats
1. **XML**: Parsed using SimpleXML
2. **JSON**: Parsed using json_decode
3. **CSV**: Parsed using str_getcsv
4. **Serialized**: Parsed using unserialize
5. **PHP**: Basic trimming

### Technical Features
- **Factory Pattern**: Recommended instantiation method
- **Method Chaining**: Fluent interface support
- **Memory Efficient**: Uses php://temp for large CSV operations
- **Error Handling**: Graceful handling of invalid formats
- **Flexibility**: Override data at conversion time
- **Security**: Input validation and proper escaping
- **JSONP Support**: Callback validation for cross-domain requests

### Usage Examples
```php
// Basic usage
$format = new Format($data);
echo $format->to_json();

// Factory method (recommended)
echo $this->format->factory($data)->to_csv();

// Input conversion
$xml_data = $this->format->factory($xml_string, 'xml')->to_array();
```

This library is essential for API responses and data interchange in the Shughran application.