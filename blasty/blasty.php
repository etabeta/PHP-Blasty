<?php
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
 *   * Redistributions of source code must retain the above copyright notice, this list of
 *     conditions and the following disclaimer.
 *
 *   * Redistributions in binary form must reproduce the above copyright notice, this list
 *     of conditions and the following disclaimer in the documentation and/or other materials
 *     provided with the distribution.
 *
 *   * Neither the name of the author nor the names of its contributors may be used
 *     to endorse or promote products derived from this software without specific prior
 *     written permission.
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
 * @subpackage Blasty
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
 *
 * @access     public
 * @since      0.1.00b (2010-08-12)
 * @version    0.1.00b (2010-08-12)
 * @see        none
 */
define('BLASTY', TRUE);

class Blasty {

  /**
   * The self object reference
   * @access     private
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  private static $_self = null;

  /**
   * The reference to component object
   * @access     private
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  private $component = null;

  /**
   * The self object reference
   * @access     private
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  private $_path = array();

  /**
   * The yuiloader instance
   * @access     static private
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  //private $_yuiloader = null;

  /**
   * The current component
   * @access     static private
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  private $_current_component = '';

  /**
   * The utility/widgets instances
   * @access     static private
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  private $_component_instances = array();

  /**
   * The class constructor.
   * @param      string $js_instance The instance of this component
   * @return     none
   * @access     public
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  private function __construct() {
    require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'phpblasty.php';
    $this->_path          =  phpBlasty::getPath();
    $this->_base_url      = phpBlasty::getVar('_base_url');

    if (phpBlasty::$phpblasty_config['yui_loader'] == 'js' OR phpBlasty::$phpblasty_config['yui_loader'] == 'php') {
      phpBlasty::initYuiLoader();
      //require_once $this->_path['loader'] . 'loader' .EXT;                      // Require the YUI Loader class
      //$this->_yuiloader = new YAHOO_util_Loader(phpBlasty::$phpblasty_config['yui_version']);      // Instantiate the "YUI component loader"
      //phpBlasty::setYuiBase();                                                  // Set the YUI base
      //foreach (phpBlasty::$yuiloader_config as $key => $val) {                 // Set YUI Loader configuration
      //  $this->_yuiloader->$key = phpBlasty::$yuiloader_config[$key];
      //}
    } else {
      $message = 'YUI Loader method not set properly (current value is "'.phpBlasty::$phpblasty_config['yui_loader'].'"). Use "js" or "php".';
      phpBlasty::showError($message);
    }

    $this->_setAvailableComponent();
  }

  /**
   * The singleton class costructor
   * @param      string $js_instance The JS instance of this component
   * @return     none
   * @access     public
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  public static function getInstance() {
    if(self::$_self == null) {
       $class = __CLASS__;
       self::$_self = new $class();
    }
    return self::$_self;
  }

  /**
   * Set which components are available into object property.
   * @param
   * @return
   * @access     public
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  private function _setAvailableComponent() {
    foreach (phpBlasty::$yui_component as $key => $val) {
      $file_name = $this->_path['components'] . $key . EXT;
      if(file_exists($file_name)) {
        phpBlasty::$yui_component[$key]['available'] = TRUE;
      } else {
        phpBlasty::$yui_component[$key]['available'] = FALSE;
      }
      //phpBlasty::setVar('_loaded_component', array($key => 0));
    }
  }

  /**
   * YUI Component loader. Load specified YUI component provided as:
   * - list of text arguments provided as one component for each argument - Note: automatic instance_name will be created
   * - non-associative array (eg. 'component_name', 'other_component_name', ...) - Note: automatic instance_name will be created
   * - associative array (provided as (eg. 'instance_name' => 'component_name', 'other_instance_name' => 'other_component_name', ...) - Note: each widget can be instaciated multiple time
   * - list of associative array (one associative array for each argument)
   * @param      string The name of the YUI component to load and init
   * @return     array $js_instance An associative array where key is the instance name and value is associated component
   * @access     public
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  function loadComponent() {
    $args = func_get_args();
    foreach ($args as $arg) {
      if(is_array($arg)) {
        foreach ($arg as $js_instance => $component) {
          if (is_string($js_instance)) {
            $js_instance[$this->_loadSingleComponent($component, $js_instance)] = $component;
          } else {
            $js_instance[$this->_loadSingleComponent($component)]            = $component;
          }
        }
      } else {
        //$component = $arg;
        //$js_instance[$this->_loadSingleComponent($component)]            = $component;
        $js_instance = $this->_loadSingleComponent($arg);
      }
    }
    return $js_instance;
  }

  /**
   * Load single component (private function)
   * @param      string $component The name of the YUI component to load and init
   * @param      [string] $js_instance The chosen instance name.
   * @return     none
   * @access     public
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  private function _loadSingleComponent($component, $js_instance = '') {
    $component_file = $this->_path['components'] . $component . EXT;
    if (phpBlasty::$yui_component[$component]['available']) {                  // Verify if the Blasty component is available
      require_once($component_file);                                            // Load the right Blasty class file
      $this->$component = $component::getInstance($js_instance);                // Instantiate a new object or retrieve the reference
      //$this->_yuiloader->load($component);                                      // Tells to "YUI component loader" wich module to load
      $this->_current_component = $component;                                   // Set the current component
      $js_instance = $this->$component->getCurrentInstance();                   // Get the new instance of the loaded component
      $this->_component_instances[$js_instance] = $component;                   // Add the new instance to the list of component instances
    } else {
      $message = 'Failed to load "'.$component.'" component because is not available in your system.';
      phpBlasty::logMessage('error', '[' . LIBRARY_NAME . '] _loadSingleComponent - ' . $message);
      phpBlasty::showError($message);
    }
    return $js_instance;
  }

  function setProperty() {
    $component = $this->_current_component;
    $args = func_get_args();
    if(isset ($args[1])) {
      $this->$component->setProperty($args[0], $args[1]);
    } else {
      $this->$component->setProperty($args[0]);
    }
  }

  function getContainerId() {
    $component = $this->_current_component;
    return $this->$component->getContainerId();
  }

  /**
   * 
   * @param      string $reference The reference to the HTML element
   * @return     none
   * @access     public
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   * @todo       Verify which component have this function
   */
  function setElementreference($reference) {
    $component = $this->_current_component;
    $this->$component->setElementReference($reference);
  }

  function setLiveData($live_data) {
    $component = $this->_current_component;
    $this->$component->setLiveData($live_data);
  }

  function setDataType($data_type) {
    $component = $this->_current_component;
    $this->$component->setDataType($data_type);
  }

  function setColumnProperty($property) {
    $component = $this->_current_component;
    $this->$component->setColumnProperty($property);
  }

  function setResponseSchema($schema) {
    $component = $this->_current_component;
    $this->$component->setResponseSchema($schema);
  }

  /**
   *
   * @param
   * @return     string
   * @access     public
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  function yuiTags($moduleType = null, $skipSort = false) {
    phpBlasty::flushYui();
    return phpBlasty::$yuiloader->tags($moduleType, $skipSort);
  }

  /**
   * Get the container for the given componet
   * @param      string $component The name of the YUI component
   * @param      [string] $js_instance The name of the component instance
   * @return     none
   * @access     public
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  function container($component, $js_instance = '') {
    if (phpBlasty::$yui_component[$component]['available']) {                  // Verify if the component was previously loaded
      if (phpBlasty::$yui_component[$component]['loaded'] > 0) {
        $container = $this->$component->container($js_instance);
      } else {
        $message = 'container() error: YUI component not previously loaded. To get the HTML container of the "'.$component.'" YUI component, You need to load it before.';
        phpBlasty::logMessage('error', '[' . LIBRARY_NAME . '] ' . $message);
        phpBlasty::showError($message);
      }
    } else {
      $message = 'container() error: The requeste YUI component "'.$component.'" is not available in your system.';
      phpBlasty::logMessage('error', '[' . LIBRARY_NAME . '] ' . $message);
      phpBlasty::showError($message);
    }
    return $container;
  }

  /**
   * Generate the JavaScript code according with the settings.
   * @param
   * @return     string
   * @access     public
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   * @TODO       eternally in progress ;-)
   */
  public function generate() {
    $components_sorted = phpBlasty::$yuiloader->sorted;
    //print_r(phpBlasty::$yui_component);
    $output = '';
    $output .= '<script type="text/javascript">' . LF;                          // Generate HTML & Javascript code for Blasty widgets and utilities
    $output .= '  (function() {' . LF;
    $output .= '    var Dom = YAHOO.util.Dom,' . LF;                            // Define Dom variable
    $output .= '        Event = YAHOO.util.Event;' . LF;                        // Define Event variable
    if (phpBlasty::$phpblasty_config['yui_loader'] == 'js') {
      //$output .= $this->_yuiloader->_generate();                                // ?!?!?!?!?
    } else {
      foreach ($components_sorted as $component => $val) {
       if (phpBlasty::$yui_component[$component]['loaded'] > 0) {
         $output .= $this->$component->generate();
       }
      }
    }
    $output .= '  })();' . LF;
    $output .= '</script>' . LF;
    return $output;
  }

  public function setCurrentComponent($js_instance) {
    if ($js_instance == '' OR !array_key_exists($js_instance, $this->_component_instances)) {
      $message = 'Could not set Current Component. Instance "'.$js_instance.'" not instantiated.';
      phpBlasty::logMessage('error', '[' . LIBRARY_NAME . '] ' . $message);
      phpBlasty::showError($message);
    } else {
      $component                = $this->_component_instances[$js_instance];
      $this->_current_component = $component;
      $this->$component->setCurrentInstance($js_instance);
    }
  }

  /**
   * Like phpinfo() show Blasty configuration info.
   * @param      none
   * @return     none
   * @access     public
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see none
   */
  function blastyinfo() {
    $YUI_widget            = '';
    $YUI_widget_available  = '';
    $YUI_utility           = '';
    $YUI_utility_available = '';
    foreach (phpBlasty::$yui_component as $key => $val) {
      if (phpBlasty::$yui_component[$key]['type'] == 'widget') {
        $YUI_widget .= phpBlasty::$yui_component[$key]['name'].', ';
        if (phpBlasty::$yui_component[$key]['available']) {
          $YUI_widget_available .= phpBlasty::$yui_component[$key]['name'].', ';
        }
      } elseif (phpBlasty::$yui_component[$key]['type'] == 'utility') {
        $YUI_utility .= phpBlasty::$yui_component[$key]['name'].', ';
        if (phpBlasty::$yui_component[$key]['available']) {
          $YUI_utility_available .= phpBlasty::$yui_component[$key]['name'].', ';
        }
      }
    }
    //$YUI_widget_available = substr($YUI_widget_available, 0 , strlen($YUI_widget_available) - 20);
    //$YUI_utility_available = substr($YUI_utility_available, 0 , strlen($YUI_utility_available) - 20);

    $yuiloader_config = phpBlasty::getVar('yuiloader_config');
    $data = array(
            'PHP Blasty version'                   => PHPBLASTY_VERSION,
            'YUI version'                          => phpBlasty::$phpblasty_config['yui_version'],
            'PHPLoader version'                    => PHPLOADER_VERSION,
            'JSLoader version'                     => PHPBLASTY_VERSION,
            'PHP Blasty path'                      => $this->_path['blasty'],
            'YUI base ('.phpBlasty::$phpblasty_config['yui_base'].')' => $yuiloader_config['base'],
            'YUI Loader method'                    => phpBlasty::$phpblasty_config['yui_loader'],
            'Loader lib path'                      => $this->_path['loader'],
            'YUI widgets'                          => substr($YUI_widget, 0 , strlen($YUI_widget) - 2),
            'YUI utilities'                        => substr($YUI_utility, 0 , strlen($YUI_utility) - 2),
            'PHP Blasty widgets availabe'          => substr($YUI_widget_available, 0 , strlen($YUI_widget_available) - 2),
            'PHP Blasty utilities availabe'        => substr($YUI_utility_available, 0 , strlen($YUI_utility_available) - 2),

    );
    echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "DTD/xhtml1-transitional.dtd">
<html>
  <head>
    <style type="text/css">
      body {background-color: #ffffff; color: #000000;}
      body, td, th, h1, h2 {font-family: sans-serif;}
      pre {margin: 0px; font-family: monospace;}
      a:link {color: #000099; text-decoration: none; background-color: #ffffff;}
      a:hover {text-decoration: underline;}
      table {border-collapse: collapse;}
      .center {text-align: center;}
      .center table { margin-left: auto; margin-right: auto; text-align: left;}
      .center th { text-align: center !important; }
      td, th { border: 1px solid #000000; font-size: 75%; vertical-align: baseline;}
      h1 {font-size: 150%;}
      h2 {font-size: 125%;}
      .p {text-align: left;}
      .e {background-color: #ccccff; font-weight: bold; color: #000000; width: 200px;}
      .h {background-color: #9999cc; font-weight: bold; color: #000000;}
      .v {background-color: #cccccc; color: #000000;}
      .vr {background-color: #cccccc; text-align: right; color: #000000;}
      img {float: right; border: 0px;}
      hr {width: 600px; background-color: #cccccc; border: 0px; height: 1px; color: #000000;}
    </style>
    <title>blastyinfo()</title>
    <meta name="ROBOTS" content="NOINDEX,NOFOLLOW,NOARCHIVE" />
    <link  href="'.$this->_base_url.'system/user_guide/images/favicon.gif" rel="icon" type="image/gif"/>
  </head>
  <body>
    <div class="center">
      <table border="0" cellpadding="3" width="600">
        <tr class="h">
          <td><a href="http://blasty.sourceforge.net/"><img border="0" src="'.$this->_base_url.'blasty/user_guide/images/blasty_logo.png" alt="Blasty Logo" /></a><h1 class="p">PHP Blasty <br />Version '.PHPBLASTY_VERSION.'</h1></td>
        </tr>
      </table><br />
      <table border="0" cellpadding="3" width="600">'.LF;
    foreach ($data as $key => $val) {
      echo '        <tr><td class="e">'.htmlentities($key).'</td><td class="v">'.$val.'</td></tr>'.LF;
    }
    echo '      </table><br />'.LF;
    echo '    </div>
  </body>
</html>';
  }

}