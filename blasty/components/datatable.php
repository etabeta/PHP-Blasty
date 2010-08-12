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
 * @subpackage datatable
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

class Datatable {

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
  const COMPONENT_NAME = 'datatable';

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
   *
   * @access     private
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  private $_datasource = null;

  /**
   * The component properties with theirs format
   * @access     private
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  private $_component_property = array(
          'caption'          => 'string',
          'currencyOptions'  => 'object',
          //'currencySymbol'   => '',
          'dateOptions'      => 'object',
          'draggableColumns' => 'boolean',
          'dynamicData'      => 'boolean',
          'formatRow'        => 'function',
          'generateRequest'  => 'function',
          'initialLoad'      => 'boolean/object',
          'initialRequest'   => 'mixed',
          'MSG_EMPTY'        => 'string',
          'MSG_ERROR'        => 'string',
          'MSG_LOADING'      => 'string',
          'MSG_SORTASC'      => 'string',
          'MSG_SORTDESC'     => 'string',
          'numberOptions'    => 'object',
          'paginator'        => 'object',
          'renderLoopSize'   => 'integer',
          'selectionMode'    => 'string',
          'sortedBy'         => 'object',
          'summary'          => 'string',
  );

  /**
   * The column properties with theirs format
   * @access     private
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  private $_column_property = array(
          'abbr'          => 'string',
          'children'      => 'objects',
          'className'     => 'string',
          'editor'        => 'string',
          'editorOptions' => 'object',
          'field'         => 'string',
          'formatter'     => 'string',
          'hidden'        => 'boolean',
          'key'           => 'string',  // Necessary property
          'label'         => 'string',
          'maxAutoWidth'  => 'integer',
          'minWidth'      => 'integer',
          'resizeable'    => 'boolean',
          'selected'      => 'boolean',
          'sortable'      => 'boolean',
          'sortOptions'   => 'object',
          'width'         => 'integer',
  );

  /**
   * The datatable event properties
   * @access     private
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  private $_event_property = array(
  );

  /**
   * The class constructor.
   * @param      string $js_instance The instance of this component
   * @return     none
   * @access     public
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
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
   * The class constructor.
   * @param      object $parent_instance The blasty instance
   * @param      string $js_instance The instance of this component
   * @return     none
   * @access     public
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  /*
  public function __construct($parent_instance, $js_instance) {
    $this->blasty = &$parent_instance;
    $this->blasty->_component_config[$js_instance]['dataSourceInstance'] = $this->blasty->loadComponent('datasource'); // Autocomplete need datasource to work
    $this->blasty->_component_config[$this->blasty->_component_config[$js_instance]['dataSourceInstance']]['componentInstance'] = $js_instance; // Tell to datasource instance for which component he works
    $this->componentInitialize($js_instance);                                      // Initialize the component
  }
   */

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
      $this->_component_instances[] = $this->_current_instance   = $js_instance;
      $this->_component_config[$js_instance]['containerId']      = $js_instance.'Container'; // Set the containerId value for the given instance
      $this->_component_config[$js_instance]['Config']              = array();
      
      require_once $this->_path['component'] . 'datasource' . EXT;              // Instantiate datasource for this component
      $this->_datasource = Datasource::getInstance();
      $this->_component_config[$js_instance]['dataSourceInstance'] = $this->_datasource->getCurrentInstance();
      $this->_datasource->setComponentInstance($js_instance);
      phpBlasty::$yui_component['datasource']['loaded'] --;                    // To prevent datasource double generate
    } else {
      phpBlasty::showWarning('Component ' . self::COMPONENT_NAME . ' already initalized.');
    }
    return $js_instance;
  }

  /**
   * Create a new JS component instance (for multiple instance of this component).
   * This is like a sub costructor.
   * @param none.
   * @return The new current instance
   * @access public
   * @since 0.0.03b (2010-04-30)
   * @version 0.0.03b (2010-08-01)
   * @see none
   */
  /*
  public function componentInitialize($js_instance) {
    if (!isset ($this->blasty->_component_config[$js_instance]['containerId'])) {
      $this->blasty->_component_config[$js_instance]['containerId'] = $js_instance . 'Container'; // Set the containerId value for the new instance
    } else {
      phpBlasty::showError('Component ' . self::COMPONENT_NAME . ' already initalized.');
    }
    return $js_instance;
  }
  */

  /**
   * Generate the HTML code that will contain the component.
   * @param      string $js_instance The component istance
   * @return     The HTML code.
   * @access     public
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  public function container($js_instance = '') {
    if ($js_instance == '' OR !in_array($js_instance, $this->_component_instances)) {
      $js_instance = $this->_current_instance;                                  // Chose the right instance if wron or no specific istance where requested
    }
    return '<div id="' . $this->_component_config[$js_instance]['containerId'] . '"></div>' . LF; // Generate HTML div container
  }

  /**
   * Generate the JavaScript code
   * @param      string $js_instance The instance to generate
   * @return     The JS code.
   * @access     public
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  public function generate() {
    $output = LF;
    foreach ($this->_component_instances as $key => $js_instance) {
      if (!defined('BLASTY')) {
        $output .= '<script type="text/javascript">' . LF;                      // Generate HTML & Javascript code for Blasty widgets and utilities
        $output .= '  (function() {' . LF;
        $output .= '    var Dom = YAHOO.util.Dom,' . LF;                        // Define Dom variable
        $output .= '        Event = YAHOO.util.Event;' . LF;                    // Define Event variable
      }

      $output .= $this->_datasource->generate($this->_component_config[$js_instance]['dataSourceInstance']);
      //$output  = $this->blasty->datasource->generate($this->blasty->_component_config[$js_instance]['dataSourceInstance']); // Because datasource code is generated here we need to avoid dual code generation (see below)

      $output .= $this->_getColumnDefs($js_instance) . LF;
      $output .= $this->_getConfigs($js_instance) . LF;
      $output .= '    var ' . $js_instance . ' = new YAHOO.widget.DataTable("' . $this->_component_config[$js_instance]['containerId'] . '", ';
      $output .=                                                                 $js_instance . 'ColumnDefs, ';
      $output .=                                                                 $this->_component_config[$js_instance]['dataSourceInstance'] . ', ';
      $output .=                                                                 $js_instance . 'Configs';
      $output .=                                                          ');' . LF;
      //unset ($this->_component_instances[$this->_component_config[$js_instance]['dataSourceInstance']]); // Avoid dual code generation for data source

      if (!defined('BLASTY')) {
        $output .= '  })();'.LF;
        $output .= '</script>'.LF;
      }
      $output .= LF;
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
   *
   * @param      none
   * @return     string
   * @access     public
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  public function getContainerId() {
    return $this->_component_config[$this->_current_instance]['containerId'];
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
   * Set the column property of current YUI component instance to specific value.
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
  /*
  public function setColumnProperty() {
    $args = func_get_args();
    if(is_string($args[0]) AND isset($args[1])) {
      $properties[$args[0]] = $args[1];
    } elseif (is_array($args[0])) {
      $properties = $args[0];
    } else {
      phpBlasty::showError('Invalid ' . self::COMPONENT_NAME . ' setColumnProperty argument.');
    }
    $js_instance = $this->blasty->getCurrentInstance(self::COMPONENT_NAME);
    unset($args);
    foreach($properties as $key => $val) {
      if ( ! isset($this->_column_property[$key])) {
        $message = $key . ' is not a ' . self::COMPONENT_NAME .' columnProperty.';
        //log_message('error', '[' . LIBRARY_NAME . '] ' . $message);
        $this->blasty->_showWarning($message);
      } else {
        $this->blasty->_component_config[$js_instance]['columnsConfig'][$key] = $val;
      }
    }
    return TRUE;
  }
  */

  /**
   * Set the column property of current YUI component instance to specific value.
   * This function can be used in two ways:
   *  - 1 function param: an array vector as pair of property => value
   *  - 2 function params: the first param is the property name and the second param is the value
   * @param array [$property] An array vector as pair of property => value.
   * @return     bool
   * @access     public
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  function setColumnProperty() {
    //$js_instance = $this->blasty->getCurrentInstance(self::COMPONENT_NAME);
    $columns = func_get_arg(0);
    if (is_array($columns)) {
      foreach($columns as $column => $properties) {
        //$properties = array_unshift($properties, array('key' => $column));
        $properties['key'] = $column;
        foreach ($properties as $key => $val) {
          if ( ! isset($this->_column_property[$key])) {
            $message = $key . ' is not a '.self::COMPONENT_NAME .' columnProperty.';
            phpBlasty::logMessage('error', '[' . LIBRARY_NAME . '] ' . $message);
            phpBlasty::showWarning($message);
          } else {
            //echo '$val['.$key.'] = ' . $val . '<br />';
            $this->_component_config[$this->_current_instance]['columnsConfig'][$column][$key] = $val;
            //$this->columnsConfigs[$this->currentinstance][$column][$key] = $val;
          }
        }
      }
    }
  }

  /**
   *
   * @param string $js_instance The columnDef of given instance
   * @return     The JS code.
   * @access     public
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  private function _getColumnDefs($js_instance) {
    //print_r($this->_component_config[$js_instance]['columnsConfig']);
    $output = '    var ' . $js_instance . 'ColumnDefs = ';                      // 
    $output .= phpBlasty::jsDataWrapper($this->_component_config[$js_instance]['columnsConfig'], 'objectArray', 8);
    $output .= ';';
    return $output;
  }

  /**
   *
   * @param string $js_instance The columnDef of given instance
   * @return     The JS code.
   * @access     public
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  private function _getConfigs($js_instance) {
    $output = '    var ' . $js_instance . 'Configs = ';                         // 
    //$output .= $this->blasty->__jsObjectList(array('caption' => 'prova'),8);
    //$output .= $this->blasty->_jsObjectList($this->blasty->_component_config[$js_instance]['Config'], 8);
    $output .= phpBlasty::jsDataWrapper($this->_component_config[$js_instance]['Config'], 'object', 8);
    $output .= ';';
    return $output;
  }

  function setLiveData($live_data) {
    $this->_datasource->setLiveData($live_data);
  }

  function setDataType($type) {
    $this->_datasource->setDataType($type);
  }

  function setResponseSchema($schema) {
    $this->_datasource->setResponseSchema($schema);
  }
  
}