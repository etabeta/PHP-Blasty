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
 * @subpackage datasource
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

class Datasource {

  /**
   * Please modify according with your needs
   */

  /**
   * Default component configuration
   *
   * dataType
   * The type of data managed by this component between TYPE_UNKNOWN    ()
   *                                                    TYPE_LOCAL      ()
   *                                                    TYPE_XHR        ()
   *                                                    TYPE_SCRIPTNODE ()
   *                                                    TYPE_JSFUNCTION ()
   *
   * responseType
   * The type of data in response between               TYPE_JSARRAY   ()
   *                                                    TYPE_JSON      ()
   *                                                    TYPE_XML       ()
   *                                                    TYPE_TEXT      ()
   *                                                    TYPE_HTMLTABLE ()
   *
   * @access     private
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  private $_default_config = array(
      'dataType'     => 'TYPE_LOCAL',
      'responseType' => 'TYPE_JSARRAY',
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
  const COMPONENT_NAME = 'datasource';

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
  private $_connection = null;

  /**
   * The component callback properties with theirs format
   * @access     private
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  private $_component_callback_property = array(
          'success'        => 'function',
          'failure'        => 'function',
          'scope'          => 'widget',
          'argument'       => 'object',
  );

  /**
   * The component parsed response properties with theirs format
   * @access     private
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  private $_component_parsed_response_property = array(
          'tId'            => 'integer',
          'results'        => 'array',
          'error'          => 'boolean',
          'cached'         => 'boolean',
          'meta'           => 'object',
  );

  /**
   * The component properties with theirs format
   * @access     private
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  private $_component_property = array(
          'dataType'        => 'var',
          'liveData'        => 'object',
          'maxCacheEntries' => 'integer',
          'parseJSONArgs'   => 'mixed/array',
          'Parser'          => 'object',
          'responseSchema'  => 'object',
          'responseType'    => 'var',
          'useXPath'        => 'boolean',
  );

  /**
   * The list of data type
   * @access     private
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  private $_data_type = array(
          'TYPE_UNKNOWN'    => 'LocalDataSource',
          'TYPE_LOCAL'      => 'LocalDataSource',
          'TYPE_XHR'        => 'XHRDataSource',
          'TYPE_SCRIPTNODE' => 'ScriptNodeDataSource',
          'TYPE_JSFUNCTION' => 'FunctionDataSource',
  );

  /**
   * The component event properties
   * @access     private
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  private $_event_property = array(
          'cacheFlushEvent',
          'cacheRequestEvent',
          'cacheResponseEvent',
          'dataErrorEvent',
          'requestEvent',
          'responseCacheEvent',
          'responseEvent',
          'responseParseEvent',
  );

  /**
   * The list of response type
   * @access     private
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  private $_response_type = array(
      'TYPE_JSARRAY'   => array(
          'name'   => 'Array',
          'schema' => array(
              'fields'      => 'array',
          ),
      ),
      'TYPE_JSON'      => array(
          'name'   => 'JSON',
          'schema' => array(
              'resultsList' => 'string',
              'fields'      => 'array',
              'metaFields'  => 'object',
          ),
      ),
      'TYPE_XML'       => array(
          'name'   => 'XML',
          'schema' => array(
              'resultsNode' => 'string',
              'fields'      => 'array',
              'metaNode'    => 'string',
              'metaFields'  => 'object',
          ),
      ),
      'TYPE_TEXT'      => array(
          'name'   => 'Text',
          'schema' => array(
              'recordDelim' => 'string',
              'fieldDelim'  => 'string',
          ),
      ),
      'TYPE_HTMLTABLE' => array(
          'name'   => 'Table',
          'schema' => array(
              'fields'      => 'array',
          ),
      ),
  );

  /**
   * The result set for JSON data
   * @access     private
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  private $_result_set = array(
      'totalResultsAvailable' => '',
      'totalResultsReturned'  => '',
      'firstResultReturned'   => '',
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
      $this->_component_instances[] = $this->_current_instance = $js_instance;
      $this->setDataType($this->_default_config['dataType']);
      $this->setResponseType($this->_default_config['responseType']);
    } else {
      phpBlasty::showWarning('Component ' . self::COMPONENT_NAME . ' already initalized.');
    }
    return $js_instance;
  }

  /**
   * Initialize the component instance
   * @param      string $js_instance
   * @return     string $js_instance
   * @access     public
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  /*
  public function componentInitialize($js_instance) {
    if (!isset ($this->_component_config[$js_instance]['dataType'])) {
      $this->setDataType($this->_default_config['dataType']);
      $this->setResponseType($this->_default_config['responseType']);
    } else {
      phpBlasty::showError('Component ' . self::COMPONENT_NAME . ' already initalized.');
    }
    return $js_instance;
  }
  */

  /**
   * Generate the JavaScript code
   * @param      none
   * @return     The JS code.
   * @access     public
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  /*
  public function generate() {
    //print_r($this->_component_config);
    $output = LF;
    foreach ($this->_component_instances as $key => $js_instance) {
      if (!defined('BLASTY')) {
        $output .= '<script type="text/javascript">' . LF;                      // Generate HTML & Javascript code for Blasty widgets and utilities
        $output .= '  (function() {' . LF;
        $output .= '    var Dom = YAHOO.util.Dom,' . LF;                        // Define Dom variable
        $output .= '        Event = YAHOO.util.Event;' . LF;                    // Define Event variable
      }

      $output .= '    var ' . $js_instance . ' = new YAHOO.util.' . $this->_data_type[$this->_component_config[$js_instance]['dataType']] . '(' . LF;
      $get_data_function = '_get' . $this->_data_type[$this->_component_config[$js_instance]['dataType']];
      $output .= $this->$get_data_function($js_instance) . LF;
      $output .= '        );' . LF;
      $output .= '        ' . $js_instance . '.responseType   = YAHOO.util.' . $this->_data_type[$this->_component_config[$js_instance]['dataType']] . '.';
      $output .= $this->_component_config[$js_instance]['responseType'] . ';' . LF;
      $output .= '        ' . $js_instance . '.responseSchema = ' . $this->_getResponseSchema($js_instance) . '' . LF;
      $this->_getResponseSchema($js_instance);

      if (!defined('BLASTY')) {
        $output .= '  })();'.LF;
        $output .= '</script>'.LF;
      }
      $output .= LF;
    }
    return $output;
  }
  */
  public function generate($js_instance) {
    //print_r($this->_component_config[$js_instance]);
    $output = LF;
      /*
      if (!defined('BLASTY')) {
        $output .= '<script type="text/javascript">' . LF;                      // Generate HTML & Javascript code for Blasty widgets and utilities
        $output .= '  (function() {' . LF;
        $output .= '    var Dom = YAHOO.util.Dom,' . LF;                        // Define Dom variable
        $output .= '        Event = YAHOO.util.Event;' . LF;                    // Define Event variable
      }
      */

      $output .= '    var ' . $js_instance . ' = new YAHOO.util.' . $this->_data_type[$this->_component_config[$js_instance]['Config']['dataType']] . '(';

      $get_data_function = '_get' . $this->_data_type[$this->_component_config[$js_instance]['Config']['dataType']];
      $output .= $this->$get_data_function($js_instance);
      $output .= ');' . LF;
      $output .= '        ' . $js_instance . '.responseType   = YAHOO.util.' . $this->_data_type[$this->_component_config[$js_instance]['Config']['dataType']] . '.';
      $output .= $this->_component_config[$js_instance]['Config']['responseType'] . ';' . LF;
      $output .= '        ' . $js_instance . '.responseSchema = ' . $this->_getResponseSchema($js_instance) . '' . LF;
      //$this->_getResponseSchema($js_instance);

      /*
      if (!defined('BLASTY')) {
        $output .= '  })();'.LF;
        $output .= '</script>'.LF;
      }
      */
      $output .= LF;
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
   * @param      string $js_instance The instance to be ste current
   * @return     none
   * @access     public
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  public function setComponentInstance($js_instance) {
    $this->_component_config[$this->_current_instance]['componentInstance'] = $js_instance;
  }

  /**
   * Set the datasource dataType property to a specific type.
   * @param      string $type The dataType type.
   * @access     public
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  function setDataType($type) {
    $js_instance = $this->getCurrentInstance(self::COMPONENT_NAME);
    if (!array_key_exists($type, $this->_data_type)) {
      $message = self::COMPONENT_NAME . ': ' . $type . ' is not a valid dataType.';
      phpBlasty::logMessage('error', '[' . LIBRARY_NAME . '] ' . $message);
      phpBlasty::showWarning($message);
    } else {
      //$this->_component_config[$js_instance]['dataType'] = $type;
      $this->setProperty('dataType', $type);

      if ($type == 'TYPE_XHR') {
        require_once $this->_path['component'] . 'connection' . EXT;            // Require connection for this component
        $this->_connection = Connection::getInstance();                         // Get the connection instance
        $this->_component_config[$js_instance]['connectionInstance'] = $this->_connection->getCurrentInstance(); // Tells to this component which is his connection manager
        $this->_connection->setComponentInstance($js_instance);                 // Tells to connection manager who called him
        //$this->_connection->setProperty($this->_datasource_default);            // Set default datasource properties
        phpBlasty::$yui_component['connection']['loaded'] --;                   // To prevent datasource double generation
        //print_r(phpBlasty::$yui_component);
      }

    }
  }

  /**
   * Set the datasource data for local data
   * @param      string $local_data
   * @return     none
   * @access     public
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  function setLiveData($live_data) {
    $this->setProperty('liveData', $live_data);
    $js_instance = $this->getCurrentInstance(self::COMPONENT_NAME);
    switch ($this->_component_config[$js_instance]['Config']['dataType']) {
      case 'TYPE_LOCAL':
        //$this->_component_config[$js_instance]['liveData'] = $live_data;
        // codice valido per TYPE_JSON e TYPE_JSARRAY         -- INIZIO --
        $schema['resultsList'] = 'ResultSet.Result';
        if (is_string(key($live_data))) {
          foreach ($live_data[key($live_data)] as $key => $val) {
            $fields[] = $key;
          }
        } else {
          $fields[] = 'field';
        }
        $schema['fields']      = $fields;
        $schema['metaFields']  = array(
            'totalRecords' => 'ResultSet.totalResultsReturned'
            );
        // codice valido per TYPE_JSON e TYPE_JSARRAY          -- FINE --

        $this->_setResponseSchema($schema);
        break;

      case 'TYPE_XHR':
        break;

      default:
        break;
    }

  }

  /**
   *
   * @param
   * @return     none
   * @access     public
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  function setResponseSchema() {
    $js_instance = $this->getCurrentInstance(self::COMPONENT_NAME);
    $schema = func_get_arg(0);
    if (is_array($schema)) {
      foreach($schema as $key => $val) {
        if ( ! isset($this->_response_type[$this->_component_config[$js_instance]['Config']['responseType']]['schema'][$key])) {
          $message = $key . ' is not a '.self::COMPONENT_NAME .' responseSchema valid schema.';
          phpBlasty::logMessage('error', '[' . LIBRARY_NAME . '] ' . $message);
          phpBlasty::showError($message);
        } else {
          $this->_component_config[$js_instance]['responseSchema'][$key] = $val;
        }
      }
    }
  }

  /**
   * Set the datasource responseType property to a specific type.
   * @param string $type The responseType type.
   * @param $string $js_instance The instance in wich set the dataType.
   * @return none
   * @access public
   * @since 0.0.03b (2010-04-30)
   * @see none
   */
  function setResponseType($type) {
    $js_instance = $this->getCurrentInstance(self::COMPONENT_NAME);
    if (!array_key_exists($type, $this->_response_type)) {
      $message = $type . ' is not a '.self::COMPONENT_NAME .' responseType valid type.';
      phpBlasty::logMessage('error', '[' . LIBRARY_NAME . '] ' . $message);
      phpBlasty::showError($message);
    } else {
      //$this->_component_config[$js_instance]['responseType'] = $type;
      $this->setProperty('responseType', $type);
    }
  }

  private function _getResponseSchema($js_instance) {
    $output  = '{' . LF;
    $count_element   = count($this->_response_type[$this->_component_config[$js_instance]['Config']['responseType']]['schema']);
    $current_element = 1;
    foreach($this->_response_type[$this->_component_config[$js_instance]['Config']['responseType']]['schema'] as $key => $val) {
      if (is_array($this->_component_config[$js_instance]['responseSchema'][$key])) {
        $output .= '            ' . $key . ' : ' . phpBlasty::jsDataWrapper($this->_component_config[$js_instance]['responseSchema'][$key], 'list', 4);
      } else {
        $output .= '            ' . $key . ' : "' . $this->_component_config[$js_instance]['responseSchema'][$key] . '"';
      }
      if ($current_element < $count_element) {
        $output .= ', ';                                                                           // Add a colon only if this isn't the last element
        $output .= LF;                                                                //
      } else {
        $output .= LF;                                                                //
      }
      $current_element ++;
    }
    $output .= '        };' . LF;
    //echo $this->_jsObjectArray($this->_component_config[$js_instance]['responseSchema']);
    //echo 'ResponseSchema = ' . $output;
    return $output;
  }

  private function _getLocalDataSource($js_instance) {
    $output = '';
    switch ($this->_component_config[$js_instance]['Config']['responseType']) {
      case 'TYPE_JSARRAY':
        //print_r($this->_component_config[$js_instance]['Config']['liveData']);
        //$output .= $this->_jsObjectArray($this->_component_config[$js_instance]['Config']['liveData'], 12);
        //$this->_jsLiteralArray($this->_component_config[$js_instance]['Config']['liveData'], 'list', 12);
        $output .= phpBlasty::jsDataWrapper($this->_component_config[$js_instance]['Config']['liveData'], 'array', 12);
        break;

      case 'TYPE_JSON':
        $output .= $this->_jsJson($this->_component_config[$js_instance]['Config']['liveData']);
        break;

      case 'TYPE_XML':
        $message = self::COMPONENT_NAME.': TYPE_XML LocalDataSource not yet implemented, please collaborate with the developer';
        phpBlasty::logMessage('error', '[' . LIBRARY_NAME . '] ' . $message);
        phpBlasty::showError($message);
        break;

      case 'TYPE_TEXT':
        $message = self::COMPONENT_NAME.': TYPE_TEXT LocalDataSource not yet implemented, please collaborate with the developer';
        phpBlasty::logMessage('error', '[' . LIBRARY_NAME . '] ' . $message);
        phpBlasty::showError($message);
        break;

      case 'TYPE_TABLE':
        $message = self::COMPONENT_NAME.': TYPE_TABLE LocalDataSource not yet implemented, please collaborate with the developer';
        phpBlasty::logMessage('error', '[' . LIBRARY_NAME . '] ' . $message);
        phpBlasty::showError($message);
        break;

      default:
        $message = self::COMPONENT_NAME.': _getLocalDataSource:  Unknown responseType.';
        phpBlasty::logMessage('error', '[' . LIBRARY_NAME . '] ' . $message);
        phpBlasty::showError($message);
        break;
    }
    return $output;
  }

  private function _getXHRDataSource($js_instance) {
    $output = '"'.$this->_component_config[$js_instance]['Config']['liveData'].'"';
    return $output;
  }

  private function _getScriptNodeDataSource($js_instance) {
    $message = self::COMPONENT_NAME.': ScriptNodeDataSource method not yet implemented, please collaborate with the developer';
    phpBlasty::logMessage('error', '[' . LIBRARY_NAME . '] ' . $message);
    phpBlasty::showError($message);
  }

  private function _getFunctionDataSource($js_instance) {
    $message = self::COMPONENT_NAME.': FunctionDataSource method not yet implemented, please collaborate with the developer';
    phpBlasty::logMessage('error', '[' . LIBRARY_NAME . '] ' . $message);
    phpBlasty::showError($message);
  }

  private function _setResponseSchema($schema) {
    $js_instance = $this->getCurrentInstance(self::COMPONENT_NAME);
    $this->_component_config[$js_instance]['responseSchema'] = $schema;
  }

  /*
   * Flush configuration before output anithing
   */
  function configFlush() {
  }
}