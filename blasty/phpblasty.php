<?php //if ( ! defined('PHPBLASTY')) exit('No direct script access allowed');
/**
 * PHP Blasty (http://blasty.sourceforge.net)
 *
 * PHP Blasty (PHP Blast YUI) is a YAHOO! User Interface wrapper written in PHP
 * It makes easy embedding YUI in PHP web applications.
 *
 * Copyright (c) 2010, Fabio Ingala
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without modification, are
 * permitted provided that the following conditions are met:
 *
 * 	* Redistributions of source code must retain the above copyright notice, this list of
 * 	  conditions and the following disclaimer.
 *
 * 	* Redistributions in binary form must reproduce the above copyright notice, this list
 * 	  of conditions and the following disclaimer in the documentation and/or other materials
 * 	  provided with the distribution.
 *
 * 	* Neither the name of the author nor the names of its contributors may be used
 * 	  to endorse or promote products derived from this software without specific prior
 * 	  written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS
 * OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY
 * AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDERS
 * AND CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR
 * SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR
 * OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @package    PHP Blasty
 * @subpackage phpBlasty
 * @version    0.1.00b 2010-08-12
 * @copyright  2010 Fabio Ingala
 * @author     Fabio Ingala (http://fabio.ingala.it) - fabio [at] ingala [dot] it
 * @link       http://blasty.sourceforge.net
 * @link       http://sourceforge.net/projects/blasty/files/ Get full documentation.
 * @link       http://sourceforge.net/projects/blasty/support Please submit all bug reports and feature requests to the forums.
 * @license    http://www.opensource.org/licenses/bsd-license.php BSD License
 * @todo       phpDoc comments
 */

/**
 * The PHP Blasty version
 * @access     
 * @since      0.1.00b (2010-08-12)
 * @version    0.1.00b (2010-08-12)
 * @see        none
 */
define('PHPBLASTY_VERSION', '0.1.00b');

/**
 * Library name
 * @access     
 * @since      0.1.00b (2010-08-12)
 * @version    0.1.00b (2010-08-12)
 * @see        none
 */
define('EXT', '.php');

/**
 * To fire a new line at the end of the line in JS code.
 * @access     
 * @since      0.1.00b (2010-08-12)
 * @version    0.1.00b (2010-08-12)
 * @see        none
 */
define('LF', "\n");

class phpBlasty {

  /**
   * Please modify according with your needs
   */

  /**
   * The PHP Blasty configuration
   *   - filter         (string) Which JS output type PHP Blasty will return between 'verbose' and 'min' - Note: 'min' isn't yet supported
   *   - language       (string)
   *   - yui_base       (string)
   *   - yui_base_local (string)
   *   - yui_loader     (string)
   *   - yui_version    (string) The YUI version used with PHP Blasty. Es. 2.8.0r4 - Note: The latest YUI version (2.8.1) is not yet supported
   * @access     static
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  static $phpblasty_config = array(
      'filter'         => 'verbose',
      'language'       => 'italian',
      'yui_base'       => 'remote',
      'yui_base_local' => 'yui/build/',
      'yui_loader'     => 'php',
      'yui_version'    => '2.8.0r4',
  );

  /**
   * No modifications are necessary under this point
   */

  /**
   * Library name
   * @access     private
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  const LIBRARY_NAME = 'PHP Blasty';

  /**
   * The intent step used to generate js code
   * @access
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  const JS_INTENT = 4;

  /**
   * The list of YUI component
   * @access     static private
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  static public $yui_component       = array(
      'animation'     => array('name' => 'Animation',          'type' => 'utility', 'prefix' => 'anim'       , 'obj' => null), // Just minimal functionality
      'autocomplete'  => array('name' => 'AutoComplete',       'type' => 'widget',  'prefix' => 'ac'         , 'obj' => null), // Just minimal functionality
      'button'        => array('name' => 'Button',             'type' => 'widget',  'prefix' => 'button'     , 'obj' => null),
      'calendar'      => array('name' => 'Calendar',           'type' => 'widget',  'prefix' => 'cal'        , 'obj' => null), // Just minimal functionality
      'carousel'      => array('name' => 'Carousel',           'type' => 'widget',  'prefix' => 'carousel'   , 'obj' => null),
      'charts'        => array('name' => 'Charts',             'type' => 'widget',  'prefix' => 'chart'      , 'obj' => null),
      'colorpicker'   => array('name' => 'Color Picker',       'type' => 'widget',  'prefix' => 'colpick'    , 'obj' => null),
      'connection'    => array('name' => 'Connection Manager', 'type' => 'utility', 'prefix' => 'cm'         , 'obj' => null),
      'container'     => array('name' => 'Container',          'type' => 'widget',  'prefix' => 'cont'       , 'obj' => null),
      'containercore' => array('name' => 'Container Core',     'type' => 'widget',  'prefix' => 'contcore'   , 'obj' => null),
      'cookie'        => array('name' => 'Cookie',             'type' => 'utility', 'prefix' => 'cookie'     , 'obj' => null),
      'datasource'    => array('name' => 'Data Source',        'type' => 'utility', 'prefix' => 'ds'         , 'obj' => null), // Just minimal functionality
      'datatable'     => array('name' => 'DataTable',          'type' => 'widget',  'prefix' => 'dt'         , 'obj' => null), // Just minimal functionality
      'dom'           => array('name' => 'DOM Collection',     'type' => 'utility', 'prefix' => 'dom'        , 'obj' => null),
      'dragdrop'      => array('name' => 'Drag and Drop',      'type' => 'utility', 'prefix' => 'dd'         , 'obj' => null), // Just minimal functionality
      'editor'        => array('name' => 'Rich Text Editor',   'type' => 'widget',  'prefix' => 'editor'     , 'obj' => null),
      'element'       => array('name' => 'Element',            'type' => 'utility', 'prefix' => 'element'    , 'obj' => null),
      'event'         => array('name' => 'Event',              'type' => 'utility', 'prefix' => 'event'      , 'obj' => null),
      'font'          => array('name' => 'Fonts',              'type' => 'utility', 'prefix' => 'font'       , 'obj' => null),
      'get'           => array('name' => 'Get',                'type' => 'utility', 'prefix' => 'get'        , 'obj' => null),
      'grids'         => array('name' => 'Grids',              'type' => 'utility', 'prefix' => 'grids'      , 'obj' => null),
      'history'       => array('name' => 'Browser History',    'type' => 'utility', 'prefix' => 'browser'    , 'obj' => null),
      'imagecropper'  => array('name' => 'ImageCropper',       'type' => 'widget',  'prefix' => 'imgcrop'    , 'obj' => null),
      'imageloader'   => array('name' => 'ImageLoader',        'type' => 'utility', 'prefix' => 'imgloader'  , 'obj' => null),
      'json'          => array('name' => 'JSON',               'type' => 'utility', 'prefix' => 'json'       , 'obj' => null), // Just minimal functionality
      'layout'        => array('name' => 'Layout Manager',     'type' => 'widget',  'prefix' => 'layout'     , 'obj' => null),
      'logger'        => array('name' => 'Logger',             'type' => 'utility', 'prefix' => 'logger'     , 'obj' => null),
      'menu'          => array('name' => 'Menu',               'type' => 'widget',  'prefix' => 'menu'       , 'obj' => null),
      'paginator'     => array('name' => 'Paginator',          'type' => 'widget',  'prefix' => 'pag'        , 'obj' => null),
      'profiler'      => array('name' => 'Profiler',           'type' => 'widget',  'prefix' => 'prof'       , 'obj' => null),
      'profilerview'  => array('name' => 'Profiler view',      'type' => 'widget',  'prefix' => 'profview'   , 'obj' => null),
      'progressbar'   => array('name' => 'Progress Bar',       'type' => 'widget',  'prefix' => 'progbar'    , 'obj' => null),
      'resize'        => array('name' => 'Resize',             'type' => 'utility', 'prefix' => 'resize'     , 'obj' => null),
      'reset'         => array('name' => 'Reset',              'type' => 'utility', 'prefix' => 'reset'      , 'obj' => null),
      'selector'      => array('name' => 'Selector',           'type' => 'utility', 'prefix' => 'slector'    , 'obj' => null),
      'slider'        => array('name' => 'Slider',             'type' => 'widget',  'prefix' => 'slider'     , 'obj' => null),
      'storage'       => array('name' => 'Storage',            'type' => 'utility', 'prefix' => 'storage'    , 'obj' => null),
      'swf'           => array('name' => 'SWF',                'type' => 'utility', 'prefix' => 'swf'        , 'obj' => null),
      'swfstore'      => array('name' => 'SWFStore',           'type' => 'utility', 'prefix' => 'swfstore'   , 'obj' => null),
      'tabview'       => array('name' => 'TabView',            'type' => 'widget',  'prefix' => 'tabview'    , 'obj' => null),
      'treeview'      => array('name' => 'TreeView',           'type' => 'widget',  'prefix' => 'treeview'   , 'obj' => null),
      'uploader'      => array('name' => 'Uploader',           'type' => 'widget',  'prefix' => 'upld'       , 'obj' => null),
      'yahoo'         => array('name' => 'Yahoo',              'type' => 'utility', 'prefix' => 'yahoo'      , 'obj' => null),
      'yuiloader'     => array('name' => 'yuiloader',          'type' => 'utility', 'prefix' => 'yahooloader', 'obj' => null),  //
      'yuitest'       => array('name' => 'yuitest',            'type' => 'utility', 'prefix' => 'yuitest'    , 'obj' => null),
  );

  /**
   * The YUILoader reference object
   * @access     private
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  static public $yuiloader = null;

  /**
   * The YUI Loader configuration
   *   - allowRollups (boolean) Should Loader use aggregate files (like yahoo-dom-event.js  or utilities.js) that combine several YUI components in a single HTTP request? Default: true.
   *   - base         (string)  Allows you to specify a different location (as a full or relative filepath) for the YUI build directory. By default, YUI PHP Loader will serve files from Yahoo's servers.
   *   - combine      (boolean) If set to true, YUI files will be combined into a single request using the combo service provided on the Yahoo! CDN
   *   - comboBase    (string)  The base path to the Yahoo! CDN service. Default: "http://yui.yahooapis.com/combo?  Note: YUI PHP Loader also ships with an intrinsic, lightweight combo-handler (see combo.php). Refer to the included examples for example code and an illustration of how you might want to use this functionality.
   *   - filter       (string)  A filter to apply to result urls. This filter will modify the default path for all modules. The default path for the YUI library is the minified version of the files.
   *   - loadOptional (boolean) Should loader load optional dependencies for the components you're requesting? (Note: If you only want some but not all optional dependencies, you can list out the dependencies you want as part of your required list.) Default: false.
   * @access     static private
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  static public $yuiloader_config = array(
      'allowRollups' => TRUE,
      'base'         => 'http://yui.yahooapis.com/',
      'combine'      => FALSE,
      'comboBase'    => 'http://yui.yahooapis.com/combo?',
      'filter'       => 'MIN',
      'loadOptional' => FALSE,
  );

  /**
   * The path of Blasty library
   * @access     static private
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  static private $_path = array();

  /**
   *
   * @access     static private
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  static private $_base_url = '';

  /**
   *
   * @access     static private
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  static private $_blasty_url = '';

  /**
   *
   * @var        array
   * @access     static private
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  static private $_translation = array();

  /**
   * Class constructor
   * @param      none
   * @return     none
   * @access     private
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  function __construct() {
  }

  /**
   *
   * @param      none
   * @return     none
   * @access     public
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  static function initYuiLoader() {
    if (!isset(self::$yuiloader)) {
      require_once self::$_path['loader'] . 'loader' .EXT;                      // Require the YUI Loader class
      self::$yuiloader = new YAHOO_util_Loader(self::$phpblasty_config['yui_version']);           // Instantiate the "YUI component loader"
      self::setYuiBase();                                                       // Set the YUI base
      foreach (self::$yuiloader_config as $key => $val) {                      // Set YUI Loader configuration
        self::$yuiloader->$key = self::$yuiloader_config[$key];
      }
    }
  }

  static function flushYui() {
    //print_r(self::$yui_component);
    foreach (self::$yui_component as $key => $val) {
      if (isset(self::$yui_component[$key]['loaded']) AND !isset(self::$yui_component[$key]['flushed'])) {
        //$obj = $key::getInstance();
        $obj = self::$yui_component[$key]['obj'];
        //echo $key . ': ';
        //echo $obj->getCurrentInstance();
        //echo '<br />';
        self::$yui_component[$key]['flushed'] = true;
      }
    }
    //print_r(phpBlasty::$yui_component);
    //echo 'flush <br />' . LF;
  }

  /**
   * Load a language file
   *
   * @param      mixed  the name of the language file to be loaded. Can be an array
   * @param      string  the language (english, etc.)
   * @return     mixed
   * @access     public
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  static function loadLanguage($component) {
    self::getPath();
    $language_file = self::$_path['language'] . self::$phpblasty_config['language'] . DIRECTORY_SEPARATOR . $component . EXT;
    if (file_exists($language_file)) {
      include($language_file);
      self::$_translation = array_merge(self::$_translation, $lang);
      unset($lang);
      return TRUE;
    } else {
      self::showWarning('Unable to load the ' . self::$phpblasty_config['language'] . ' language for ' . $component . ' component');
    }
  }

  /**
   * Get the root path to the class folder
   * @param      none
   * @return     array $_path
   * @access     public
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  static function getPath() {
    if (count(self::$_path) == 0) {
      self::$_path['base_path']  = realpath(dirname(__FILE__)) . DIRECTORY_SEPARATOR;
      self::$_path['blasty']     = self::$_path['base_path'];
      self::$_path['loader']     = self::$_path['blasty'] . self::$phpblasty_config['yui_loader'] . 'loader' . DIRECTORY_SEPARATOR;
      self::$_path['components'] = self::$_path['blasty'] . 'components' .DIRECTORY_SEPARATOR;
      self::$_path['language']   = self::$_path['blasty'] . 'language' .DIRECTORY_SEPARATOR;
      self::getBaseUrl();
    }
    return self::$_path;
  }

  /**
   * Get the base url
   * @param      none
   * @return     array $_path
   * @access     public
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  static function getBaseUrl() {
    if (self::$_base_url == '') {
      self::$_base_url   = 'http://' . $_SERVER['SERVER_NAME'] . '/';
      if (!isset(self::$_path['blasty'])) {
        self::getPath();
      }
      $path = substr(self::$_path['blasty'], strlen($_SERVER['DOCUMENT_ROOT']) + 1, strlen(self::$_path['blasty']));
      self::$_blasty_url = self::$_base_url . str_replace(chr(92), '/', $path);
    }
    return self::$_base_url;
  }

  /**
   * Get
   * @param      string $var_name
   * @return     mixed $$var_name
   * @access     public
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   * @todo       Split this function in one function per var
   */
  static function &getVar($var_name) {
    if (isset (self::$$var_name)) {
      return self::$$var_name;
    } else {
      self::showWarning('The request var ' . $var_name . ' does not exists.');
    }
  }

  /**
   * Set YUI base
   * @param      string $var_name
   * @return     mixed $$var_name
   * @access     public
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   * @todo       Split this function in one function per var
   */
  static function setYuiBase() {
    if (self::$phpblasty_config['yui_base'] == 'local') {
      self::$yuiloader_config['base'] = self::$_base_url . self::$phpblasty_config['yui_base_local'];
    } else {
      self::$yuiloader_config['base'] .= self::$phpblasty_config['yui_version'] . '/build/';      // Set the YUI base
    }
  }

  /**
   * Set
   * @param      string $var_name
   * @return     mixed $$var_name
   * @access     public
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   * @todo       Split this function in one function per var
   */
  static function setVar($var_name, $val) {
    $var_name = 'self::'.$var_name;
    //echo $var_name;
    if (is_array($val)) {
      $$var_name[key($val)] = $val[key($val)];
    } else {
      $$var_name = $val;
    }
  }

  /**
   * Show error message
   *
   * @param      string $message The warning message
   * @return     none
   * @access     public
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  static function showError($message) {
    $heading = self::LIBRARY_NAME . ' error';
    require (self::$_path['blasty'] . 'error_tpl' . EXT);
    exit;
  }

  /**
   * Show warning message
   *
   * @param      string $message The warning message
   * @return     none
   * @access     public
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  static function showWarning($message) {
    $heading = self::LIBRARY_NAME . ' warning';
    require (self::$_path['blasty'] . 'error_tpl' . EXT);
  }

  /**
   * 
   * @param      string $message The warning message
   * @return     none
   * @access     private
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   * @todo       Develope this function ;-)
   */
  static function logMessage($type, $message) {
  }



  /**
   * Builds JS code with the right sintax.
   * @param      array $array The list of elements of an object
   * @return     string $output The JS code that descibe an object
   * @access     private
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  static function jsDataWrapper($js_data, $data_type, $js_intent = 0) {
    switch ($data_type) {
      case 'array':
        $js_data_wrapped = self::_jsArray($js_data, $js_intent);
        break;

      case 'boolean':
        $js_data_wrapped = self::_jsValue($js_data, $js_intent);
        break;

      case 'boolean/object':
        if (is_bool($js_data)) {
          $js_data_wrapped = self::_jsValue($js_data, $js_intent);
        } else {
          $js_data_wrapped = self::_jsObject($js_data, $js_intent);
        }
        break;

      case 'char/array':
        if (is_array($js_data)) {
          $js_data_wrapped = self::_jsArray($js_data, $js_intent);
        } else {
          $js_data_wrapped = '"'.addslashes($js_data).'"';
        }
        break;

      case 'const':
        $js_data_wrapped = $js_data;
        break;

      case 'integer':
        $js_data_wrapped = $js_data;
        break;

      case 'list':
        $js_data_wrapped = self::_jsList($js_data, $js_intent);
        break;

      case 'objectArray':
        $js_data_wrapped = self::_jsObjectArray($js_data, $js_intent);
        break;

      case 'object':
        $js_data_wrapped = self::_jsObject($js_data, $js_intent);
        break;

      case 'string':
        $js_data_wrapped = '"'.addslashes($js_data).'"';
        break;

      case 'json':
        $js_data_wrapped = self::_jsJson($js_data, '', $js_intent);
        break;

      case 'var':
        $js_data_wrapped = $js_data;
        break;

      default:
        self::showWarning('JS data wrapper: data type for "'.$js_data.'" not recognized.');
        $js_data_wrapped = '';
        break;
    }
    return $js_data_wrapped;
  }

  /**
   *
   * @param      mixed $value The value to output with JS sintax
   * @return     string $jsList The array in JS syntax
   * @access     private
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  static private function _jsArray($data, $js_intent = 0) {
    if (is_array($data)) {
      $is_array        = FALSE;
      $count_element   = count($data);
      $current_element = 1;

      $output = '[';                                                              //
      foreach ($data as $key => $val) {
        if (is_array($val)) {
          $output .= self::_jsArray($val, $js_intent + self::JS_INTENT);
        } else {
          $output .= self::_jsValue($val);
        }
        if ($current_element < $count_element) {
          $output  .= ', ';                                                       // Add a colon only if this isn't the last element
        }
        $current_element ++;
      }
      $output .= ']';
    } else {
      $output = '_jsArray: error';
    }
    return $output;
  }

  /**
   *
   * @param      mixed $value The value to output with JS sintax
   * @return     string $jsList The array list in JS syntax
   * @access     private
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  static private function _jsList($data, $js_intent = 0) {
    if (is_array($data)) {
      $output          = '[';                                                   // Reset the output content;
      $count_element   = count($data);
      $current_element = 1;

      foreach($data as $key => $val) {
        $output .= self::_jsValue($val);
        if ($current_element < $count_element) {
          $output .= ', ';                                                      // Add a colon only if this isn't the last element
        }
        $current_element ++;
      }
      $output .= ']';
    } else {
      $output = '_jsList: error';
    }
    return $output;
  }

  static private function _jsObject($data, $js_intent = 0) {
    if (is_array($data)) {
      $output          = '{';                                                   // Reset the output content;
      $count_element   = count($data);
      $current_element = 1;

      foreach($data as $key => $val) {
        $output .= $key . ': ' . self::_jsValue($val);
        if ($current_element < $count_element) {
          $output .= ', ';                                                      // Add a colon only if this isn't the last element
        }
        $current_element ++;
      }
      $output .= '}';
    } else {
      $output = '_jsObject: error';
    }
    return $output;
  }

  static private function _jsObjectArray($data, $js_intent) {
    if (is_array($data)) {
      $is_array        = FALSE;
      $count_element   = count($data);
      $current_element = 1;

      $output = '[';                                                              //
      foreach ($data as $key => $val) {
        if (is_array($val)) {
          $output .= self::_jsObject($val, $js_intent + self::JS_INTENT);
        } else {
          $output .= self::_jsValue($val);
        }
        if ($current_element < $count_element) {
          $output  .= ', ';                                                       // Add a colon only if this isn't the last element
        }
        $current_element ++;
      }
      $output .= ']';
    } else {
      $output = '_jsObjectArray: error';
    }
    return $output;
  }

  /**
   * Output the JS value in the correct way
   * @param      mixed $value The value to output with JS sintax
   * @return     string $jsValue The value in JS syntax
   * @access     private
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  static private function _jsValue($value) {
    $output = '';
    if (is_int($value) or is_float($value)) {
      $output .= $value;
    } elseif (is_bool($value)) {
      if ($value) {
        $output .= 'true';
      } else {
        $output .= 'false';
      }
    } elseif (is_string($value)) {
      $output .= '"' . addslashes($value) . '"';
    } elseif ($value == null) {
      $output .= 'null';
    } else {
      $output .= 'Unable to recognize type of ' . $value . ', please refer to the developer';
    }
    return $output;
  }

  /*
  static private function _jsArray($array, $intent = 0) {
    $output          = str_repeat(' ', $intent) . '[';                          // Reset the output content;
    $count_element   = count($array);
    $current_element = 1;
    foreach($array as $key => $val) {
      if (is_array($val)) {
        $new_intent = $intent + 4;
        $output .= self::_jsArray($val, $new_intent);
      } else {
        $output .= self::_jsValue($val);
      }
      if ($current_element < $count_element) {
        $output .= ', ';                                                        // Add a colon only if this isn't the last element
        //$output .= LF;                                                          //
      } else {
        //$output .= LF;                                                          //
      }
      $current_element ++;
    }
    $output .= str_repeat(' ', $intent) . ']';
    return $output;
  }
  */

  /**
   * Generate the json data from array.
   * @param      array $array The data in array format
   * @return     string $output The data in JSON format
   * @access     public
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see none
   */
  /*
  static private function _jsJson($array, $resultSet = '', $js_intent = 4) {
    $output = '';
    if (is_array($array)) {
      if ($resultSet == '') {
        $totalResultsAvailable = $totalResultsReturned  = count($array);
        $firstResultReturned   = 1;
      } else {
        $totalResultsAvailable = $resultSet['totalResultsAvailable'];
        $totalResultsReturned  = $resultSet['totalResultsReturned'];
        $firstResultReturned   = $resultSet['firstResultReturned'];
      }
      $output .= '{';
      $output .= '"ResultSet":{' . LF;
      $output .= '"totalResultsAvailable":' . $totalResultsAvailable . ',' . LF;      // TODO recuperare l'elenco di questi campi da datasource.responseSchema
      $output .= '"totalResultsReturned":' . $totalResultsReturned . ',' . LF;
      $output .= '"firstResultPosition":' . $firstResultReturned . ',' . LF;
      $output .= '"Result":[' . LF;

      $current_pointer = 1;
      $count_element   = count($array);
      foreach ($array as $key => $val) {
        $output .= self::_jsObjectList($val);
        if ($current_pointer < $count_element) {
          $output .= ',' . LF;                                                        // Add a colon only if this isn't the last element
        }
        $current_pointer ++;
      }
      $output .= LF . ']}}' . LF;
    }
    return $output;
  }
  */

  /*
  static private function _jsArray($array, $intent = 0) {
    $is_array        = FALSE;
    $count_element   = count($array);
    $current_element = 1;
    $output = str_repeat(' ', $intent) . '[' . LF;                                    // Reset the output content;
    $output_array = str_repeat(' ', $intent + self::JS_INTENT);
    $output_list  = str_repeat(' ', $intent + self::JS_INTENT);

    foreach ($array as $key => $val) {
      if(is_string($key)) {
        $is_array = TRUE;
      }
      $output_list  .= self::_jsValue($val);
      if (is_array($val)) {
        $output_array .= self::_jsObjectList($val, $intent + self::JS_INTENT) . LF;
        //$output_array .= $key . ': ' . LF;
        //$output_array .= self::_jsLiteralArray($val, $intent + self::JS_INTENT * 2);
      } else {
        $output_array .= $key . ': ' . self::_jsValue($val);
      }
      if ($current_element < $count_element) {
        $output_list  .= ', ';                                                                     // Add a colon only if this isn't the last element
        $output_array .= ', ';                                                                     // Add a colon only if this isn't the last element
      } else {
        $output_list  .= LF;                                                                     // Add a colon only if this isn't the last element
      }
      $current_element ++;
      //$output_array .= LF;                                                                         // Add a colon only if this isn't the last element
    }
    if ($is_array) {
      $output .= $output_array;
      unset($output_list);
    } else {
      $output .= $output_list;
      unset($output_array);
    }
    $output .= str_repeat(' ', $intent) . ']';
    return $output;
  }
  */

  /**
   * Build a JS array of object from a given php array
   * @param      array $array The php array to convert in JS array of objects
   * @param      integer $intent Number of spaces per intent
   * @return     string $js_object_array The JS array of objects
   * @access     public
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  /*
  static private function _jsObjectArray($array, $intent = 0) {
    $count_element   = count($array);
    $current_element = 1;
    $output = str_repeat(' ', $intent) . '[' . LF;                                    // Reset the output content;
    foreach ($array as $key => $val) {
      $new_intent = $intent + self::JS_INTENT;
      $output .= self::_jsObjectList($val, $new_intent);
      if ($current_element < $count_element) {
        $output .= ', ';                                                                           // Add a colon only if this isn't the last element
      }
      $current_element ++;
      $output .= LF;                                                                  // Add a colon only if this isn't the last element
    }
    $output .= str_repeat(' ', $intent) . ']';
    //$output .= LF;
    return $output;
  }
  */

  /**
   * Build a JS list of object from a given php array
   * @param      array $array The php array to convert in JS list of objects
   * @param      integer $intent Number of spaces per intent
   * @return     string $js_object_list The JS list of objects
   * @access     public
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  /*
  static private function _jsObjectList($array, $intent = 0) {
    $output          = str_repeat(' ', $intent) . '{ ';
    $count_element   = count($array);
    $current_element = 1;
    foreach($array as $key => $val) {
      $output .= '"' . addslashes($key) . '": ';
      if (is_array($val)) {
        $new_intent = $intent + 4;
        $output .= self::_arrayToList($val, $new_intent);
      } else {
        $output .= self::_jsValue($val);
      }
      if ($current_element < $count_element) {
        $output .= ', ';                                                                           // Add a colon only if this isn't the last element
        //$output .= LF;                                                                //
      } else {
        //$output .= LF;                                                                //
      }
      $current_element ++;
    }
    //$output .= str_repeat(' ', $intent);
    $output .= ' }';
    return $output;
  }
  */

}

  /**
   *
   *   - 2.8.0r4
   *   - 2.8.1   (not yet supported)
   * @access     private
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  //static $_yui_version = '2.8.0r4';                                             // The YUI version

  /**
   * Where YUI reside
   *   - local   It will used local YUI
   *   - remote  It will used YUI provided by Yahoo! server
   * @access     private
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  //static $_yui_base = 'local';

  /**
   * The base path where YUI locally reside.
   * Used only when yuiloader_method is 'php'
   * @access     private
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  //static $_yui_base_local = 'yui/build/';

  /**
   * Define wich YUI loader use between PHPLoader and JSLoader.
   * Possible values are: 'php' or 'js' (Actually 'js' does not work)
   * @access     private
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  //static $_yui_loader = 'php';

  /**
   *
   * @access     private
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  //static private $_language = 'italian';