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
 * @subpackage dragdrop
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
define('PHPBLASTY', TRUE);

class Dragdrop {

  /**
   * Please modify according with your needs
   */

  /**
   * Default component configuration
   *
   * @access     private
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  private $_default_config = array(
      'elementReference' => '',
  );

  /**
   * No modifications are necessary under this point
   */

  /**
   * The name of this component
   * @access     private
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  const COMPONENT_NAME = 'dragdrop';

  /**
   * The self object reference
   * @access     private
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  private static $_self = null;

  /**
   * The configuation of this component
   * @access     private
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  private $_component_config = array();

  /**
   * The component instances
   * @access     private
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  private $_component_instances = array();

  /**
   * The current instances
   * @access     private
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  private $_current_instance = '';

  /**
   * The self object reference
   * @access     private
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  private $_path = array();

  /**
   * The component properties with theirs format
   * @access     private
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  private $_component_property = array(
      'elementReference' => 'string',
  );

  /**
   * The class constructor.
   * @param      string $js_instance The instance of this component
   * @return     none
   * @access     public
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   * @todo       see inside the function code
   */
  private function __construct($js_instance) {
    require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'phpblasty.php';

    $this->_path = phpBlasty::getPath();
    phpBlasty::$yui_component[self::COMPONENT_NAME]['loaded'] = 0;              // Initialize the quantity loaded of this component

    phpBlasty::initYuiLoader();
    phpBlasty::$yuiloader->load(self::COMPONENT_NAME);                          // Todo: verify if is necessary to check if the component was previously loaded

    $js_instance = $this->_createInstance($js_instance);                        // Create a new instance name
    $this->_componentInitialize($js_instance);                                  // Initialize the component
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
  public static function getInstance($js_instance = '') {
    if(self::$_self == null) {
      $class = __CLASS__;
      self::$_self = new $class($js_instance);
      phpBlasty::$yui_component[self::COMPONENT_NAME]['obj'] = self::$_self;    // Experimental: probably unnecessary
    } else {
      $js_instance = self::$_self->_createInstance($js_instance);
      self::$_self->_componentInitialize($js_instance);                         // Initialize the component
    }
    return self::$_self;
  }

  /**
   * Create a new instance of a component.
   * @param      [string] $js_instance The chosen instance name.
   * @return     string $js_instance The name of the new component instance
   * @access     public
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  private function _createInstance($js_instance = '') {
    if ($js_instance == '' OR in_array($js_instance, $this->_component_instances)) { // Check if the new instance name was provided as function parameter and if conflicts with old ones
      phpBlasty::$yui_component[self::COMPONENT_NAME]['loaded'] ++;          // Increase the number of the automatically generated instance_name
      $js_instance = phpBlasty::$yui_component[self::COMPONENT_NAME]['prefix'] . phpBlasty::$yui_component[self::COMPONENT_NAME]['loaded'];// The automatically generated instance_name
    }
    return $js_instance;
  }

  /**
   * Initialize the component instance:
   * - Set a default container name;
   * - Set locale calendars labels if environment language is not 'english'.
   * @param      string $js_instance
   * @return     string $js_instance
   * @access     public
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  private function _componentInitialize($js_instance) {
    if (!isset ($this->_component_config[$js_instance])) {
      $this->_component_instances[] = $this->_current_instance = $js_instance;  // Add the component instance to the instance list and set the current instance
      $this->setProperty($this->_default_config);
    } else {
      phpBlasty::showWarning('Component ' . self::COMPONENT_NAME . ' already initalized.');
    }
    return $js_instance;
  }

  /**
   * Generate the JavaScript code
   * @param      string $js_instance
   * @return     The JS code
   * @access     public
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  public function generate() {
    $output = LF;
    foreach ($this->_component_instances as $key => $js_instance) {
      if ($this->_component_config[$js_instance]['Config']['elementReference'] != '') {
        if (!defined('BLASTY')) {
          $output .= '<script type="text/javascript">' . LF;                      // Generate HTML & Javascript code for Blasty widgets and utilities
          $output .= '  (function() {' . LF;
          $output .= '    var Dom = YAHOO.util.Dom,' . LF;                        // Define Dom variable
          $output .= '        Event = YAHOO.util.Event;' . LF;                    // Define Event variable
        }

        $output .= '    var ' . $js_instance . ' = new YAHOO.util.DD("'.$this->_component_config[$js_instance]['Config']['elementReference'].'");' . LF;

        if (!defined('BLASTY')) {
          $output .= '  })();'.LF;
          $output .= '</script>'.LF;
        }
        $output .= LF;
      }
    }
    $this->_component_instances = array();
    return $output;
  }

  /**
   *
   * @param      string $js_instance The instance to be ste current
   * @return     none
   * @access     public
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  public function setCurrentInstance($js_instance) {
    $this->_current_instance = $js_instance;
  }

  /**
   *
   * @param      none
   * @return     string
   * @access     public
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  public function getCurrentInstance() {
    return $this->_current_instance;
  }

  /**
   * Set the property of current YUI component instance to specific value.
   * This function can be used in two ways:
   *  - 1 function param: an array vector as pair of property => value
   *  - 2 function params: the first param is the property name and the second param is the value
   * @param      mixed $properties|$property An array vector as pair of property => value or the property name
   * @param      string $value The value
   * @return     bool
   * @access     public
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  public function setProperty() {
    $args = func_get_args();
    if(is_string($args[0]) AND isset($args[1])) {
      $properties[$args[0]] = $args[1];
    } elseif (is_array($args[0])) {
      $properties = $args[0];
    } else {
      phpBlasty::showError('Invalid ' . self::COMPONENT_NAME . ' setProperty argument.');
    }
    unset($args);
    foreach($properties as $key => $val) {
      if ( ! isset($this->_component_property[$key])) {
        $message = $key . ' is not a ' . self::COMPONENT_NAME .' Property.';
        phpBlasty::logMessage('error', '[' . LIBRARY_NAME . '] ' . $message);
        phpBlasty::showWarning($message);
      } else {
        $this->_component_config[$this->_current_instance]['Config'][$key] = $val;
      }
    }
    return TRUE;
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
   *
   * @param      string
   * @return     none
   * @access     private
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  function setElementReference($element_reference) {
    /*
    $component_instances = phpBlasty::getVar('_component_instances');
    if ($js_instance == '' OR !in_array($js_instance, $component_instances)) {
      phpBlasty::showError('The given instance "' . $js_instance . '" was not found.');
    }
    */
    //echo $element_reference;
    $this->setProperty('elementReference', $element_reference);
  }

}