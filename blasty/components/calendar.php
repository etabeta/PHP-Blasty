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
 * @subpackage calendar
 * @version    0.1.00b 2010-08-12
 * @copyright  2010 Fabio Ingala
 * @author     Fabio Ingala (http://fabio.ingala.it) - fabio [at] ingala [dot] it
 * @link       http://blasty.sourceforge.net
 * @link       http://sourceforge.net/projects/blasty/files/ Get full documentation.
 * @link       http://sourceforge.net/projects/blasty/support Please submit all bug reports and feature requests to the forums.
 * @license    http://www.opensource.org/licenses/bsd-license.php BSD License
 * @todo       phpDoc comments
 */

class Calendar {

  /**
   * Please modify according with your needs
   */

  /**
   * Default component configuration
   *
   * propertiesSetMode
   * The mode how to set properties between config (In the constructor, via an object literal)
   *                                        queue  (Via "queueProperty" and then "fireQueue")
   *                                        set    (Via "setProperty")
   * If wrong or not set the default is 'config'
   *
   * @access     private
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  private $_default_config = array(
      'propertiesSetMode' => 'config',
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
  const COMPONENT_NAME = 'calendar';

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
   * @todo       leave or delete?
   */
  private $_translation = array();

  /**
   * The component properties with theirs format
   * @access     private
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  private $_component_property = array(
          'close'                   => 'boolean',
          'hide_blank_weeks'        => 'boolean',
          'iframe'                  => 'boolean',
          'locale_months'           => 'array',
          'locale_weekdays'         => 'array',
          'maxdate'                 => 'string',
          'mindate'                 => 'string',
          'multi_select'            => 'boolean',
          'nav_arrow_left'          => 'string',
          'nav_arrow_right'         => 'string',
          'navigator'               => 'boolean/object',                        // The object name or true|false to activate|deactivate the navigator functionality
          'pagedate'                => 'string',
          'selected'                => 'string',
          'show_week_footer'        => 'boolean',
          'show_week_header'        => 'boolean',
          'show_weekdays'           => 'boolean',
          'start_weekday'           => 'integer',
          'title'                   => 'string',
          'DATE_DELIMITER'          => 'string',
          'DATE_FIELD_DELIMITER'    => 'string',
          'DATE_RANGE_DELIMITER'    => 'string',
          'MD_DAY_POSITION'         => 'integer',
          'MD_MONTH_POSITION'       => 'integer',
          'MDY_DAY_POSITION'        => 'integer',
          'MDY_MONTH_POSITION'      => 'integer',
          'MDY_YEAR_POSITION'       => 'integer',
          'MONTHS_LONG'             => 'list',
          'MONTHS_SHORT'            => 'list',
          'MY_LABEL_MONTH_POSITION' => 'integer',
          'MY_LABEL_MONTH_SUFFIX'   => 'string',
          'MY_LABEL_YEAR_POSITION'  => 'integer',
          'MY_LABEL_YEAR_SUFFIX'    => 'string',
          'MY_MONTH_POSITION'       => 'integer',
          'MY_YEAR_POSITION'        => 'integer',
          'PAGES'                   => 'integer',
          'WEEKDAYS_1CHAR'          => 'list',
          'WEEKDAYS_LONG'           => 'list',
          'WEEKDAYS_MEDIUM'         => 'list',
          'WEEKDAYS_SHORT'          => 'list',
          'YEAR_OFFSET'             => 'integer'
  );

  /**
   * The calendar event properties
   * @access     private
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  private $_event_property = array(
          'beforeDeselectEvent' => '',
          'beforeHideEvent'     => '',
          'beforeHideNavEvent'  => '',
          'beforeRenderEvent'   => '',
          'beforeSelectEvent'   => '',
          'beforeShowEvent'     => '',
          'beforeShowNavEvent'  => '',
          'changePageEvent'     => '',
          'clearEvent'          => '',
          'deselectEvent'       => '',
          'hideEvent'           => '',
          'hideNavEvent'        => '',
          'renderEvent'         => '',
          'resetEvent'          => '',
          'selectEvent'         => '',
          'showEvent'           => '',
          'showNavEvent'        => '',
  );

  /**
   * The calendar navigator properties
   * @access     private
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  private $_navigator_property = array(
          'cancel'       => 'string',
          'initialFocus' => 'string',
          'invalidYear'  => 'string',
          'month'        => 'string',
          'monthFormat'  => 'object',
          'strings'      => 'object',
          'submit'       => 'string',
          'year'         => 'string',
  );

  /**
   * The navigator strings Properties (the text to display in the navigator window)
   * @access     private
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  private $_navigator_strings_property = array(
          'cancel'       => 'string',
          'invalidYear'  => 'string',
          'month'        => 'string',
          'submit'       => 'string',
          'year'         => 'string',
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

    phpBlasty::loadLanguage(self::COMPONENT_NAME);
    $this->_translation = phpBlasty::getVar('_translation');

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
      $this->_component_instances[] = $this->_current_instance = $js_instance;
      $this->setPropertiesMode($this->_default_config['propertiesSetMode']);    // Set the propertiesSetMode to get safe setting
      $this->_component_config[$js_instance]['containerId'] = $js_instance.'Container'; // Set the containerId value for the given instance
      if (phpBlasty::$phpblasty_config['language'] != 'english') {                        // Set locale calendar preferences if environment language is not 'english'
        $this->_setMdyPosition();                                               // Set the position of day, month abd year in the field
        $this->_setMonth();                                                     // Set weekday month
        $this->_setWeekday();                                                   // Set weekday labels
      }
    } else {
      phpBlasty::showWarning('Component ' . self::COMPONENT_NAME . ' already initalized.');
    }
    return $js_instance;
  }

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
   * @param      none
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

      if (isset($this->_component_config[$js_instance]['Config']['navigator'])) {
        if (strtolower($this->_component_config[$js_instance]['Config']['navigator']) != true AND strtolower($this->_component_config[$js_instance]['Config']['navigator']) != false) {
          $output .= $this->_getNavigatorConfigs($js_instance);
        }
      }
      $output .=  '        ' . $js_instance . ' = new YAHOO.widget.';
      if (@$this->_component_config[$js_instance]['Config']['PAGES'] > 1) {
        $output .= 'CalendarGroup';                                             // Use CalendarGroup widget when PAGES widgetProperty is more than 1
      } else {
        $output .= 'Calendar';                                                  // Use Calendar widget when PAGES widgetProperty is 1 or not set
      }
      $output .= '("' . $js_instance . '", "' . $this->_component_config[$js_instance]['containerId'] . '"';

      if ($this->_default_config['propertiesSetMode'] == 'config') {
        $output .= ', ' . $this->_getConfigProperty($js_instance);
      }
      $output .= ');' . LF;

      if ($this->_default_config['propertiesSetMode'] == 'queue') {             // Set widget properties in 'queue' mode
        $output .= $this->_getQueueProperty($js_instance);
      }

      if ($this->_default_config['propertiesSetMode'] == 'set') {               // Set widget properties in 'set' mode
        $output .= $this->_getSetProperty($js_instance);
      }

      $output .= '        ' . $js_instance . '.render();' . LF;

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
   * Set the navigato calendar property to a specific value.
   * This function can be used in two ways:
   *  - 1 function param: an array vector as pair of property => value
   *  - 2 function params: the first param is the property name and the second param is the value
   * @param      mixed $properties|$property An array vector as pair of property => value
   * @param      string $value The value
   * @return     none
   * @access     public
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  public function setNavigatorProperty() {
    $args = func_get_args();
    if(is_string($args[0]) AND isset($args[1])) {
      $properties[$args[0]] = $args[1];
    } elseif (is_array($args[0])) {
      $properties = $args[0];
    } else {
      phpBlasty::showError('Invalid ' . self::COMPONENT_NAME . ' setNavigatorProperty argument.');
    }
    unset($args);
    foreach($properties as $key => $val) {
      if ( ! isset($this->_navigator_property[$key])) {
        $message = $key . ' is not a ' . self::COMPONENT_NAME .' navigatorProperty.';
        phpBlasty::showWarning($message);
      } else {
        $this->_component_config[$this->_current_instance]['navigatorConfig'][$key] = $val;
      }
    }
    return TRUE;
  }

  /**
   * Set the mode how to set the properties between 'config', 'queue' or 'set'.
   * If none or wrong parameter is passed to the function, it will set the mode to 'config' (default mode).
   * @param      string $mode The mode how to set properties between 'config', 'queue' or 'set'.
   * @return     none
   * @access
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  public function setPropertiesMode($mode = '') {
    if ($mode != '' AND ($mode == 'config' OR $mode == 'queue' OR $mode == 'set') ) {
      $this->_default_config['propertiesSetMode'] = $mode;
    } else {
      $this->_default_config['propertiesSetMode'] = 'config';
    }
  }

  /**
   * Get the calendar settings in 'config' mode.
   * @param      string $js_instance
   * @return     The JS code.
   * @access     private
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  private function _getConfigProperty($js_instance) {
    $count_element   = count($this->_component_config[$js_instance]['Config']);
    $current_element = 1;
    $output  = '{' . LF;                                                        // Start a new output
    foreach($this->_component_config[$js_instance]['Config'] as $key => $val) {
      $output .= '            '.$key.':';
      $output .= phpBlasty::jsDataWrapper($this->_component_config[$js_instance]['Config'][$key], $this->_component_property[$key]);
      if ($current_element < $count_element) {
        $output .= ', ' . LF;                                                   // Add a colon only if this isn't the last element
      } else {
        $output .= LF;
      }
      $current_element ++;
    }

    $output .= '        }';
    return $output;
  }

  /**
   * Get the calendar settings in 'queue' mode.
   * @param      string $js_instance
   * @return     The JS code.
   * @access     private
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  private function _getQueueProperty($js_instance) {
    $output = '';
    foreach($this->_component_config[$js_instance]['Config'] as $key => $val) {
      $output .= '        ' . $js_instance . '.cfg.queueProperty("' . $key . '", ';
      $output .= phpBlasty::jsDataWrapper($this->_component_config[$js_instance]['Config'][$key], $this->_component_property[$key]);
      $output .= ', false);' . LF;
    }
    $output .= '        ' . $js_instance . '.cfg.fireQueue();' . LF;
    return $output;
  }

  /**
   * Get the calendar settings in 'set' mode.
   * @param      string $js_instance
   * @return     The JS code.
   * @access     private
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  private function _getSetProperty($js_instance) {
    $output = '';
    foreach($this->_component_config[$js_instance]['Config'] as $key => $val) {
      if ($this->_component_config[$js_instance]['Config'][$key] != '') {
        $output .= '        ' . $js_instance . '.cfg.setProperty("' . $key . '", ';
        $output .= phpBlasty::jsDataWrapper($this->_component_config[$js_instance]['Config'][$key], $this->_component_property[$key]);
        $output .= ', false);' . LF;
      }
    }
    return $output;
  }

  /**
   * Get the calendar navigatorProperty in the right way.
   * @param string $navigatorProperty The name of the navigatorProperty.
   * @param      string $js_instance
   * @return     The JS code.
   * @access     private
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  private function _getNavigatorConfigs($js_instance) {
    $output  = '    var ' . $this->_component_config[$js_instance]['Config']['navigator'] . ' = {' . LF;
      foreach($this->_navigator_strings_property as $key => $val) {
        $navigator_strings_configs = FALSE;
        if (isset($this->_component_config[$js_instance]['navigatorConfig'][$key])) {
          if (!$navigator_strings_configs) {
            $output .= '      strings : {';
            $navigator_strings_configs = TRUE;                                  // Almost one navigator strings config is set
          }
          $output .= '      $key: "' . addslashes($this->_component_config[$js_instance]['navigatorConfig'][$key]) . '"' . LF;
        }
      }
      if ($navigator_strings_configs) {
        $output .= '    },';
      }
      if (isset($this->_component_config[$js_instance]['navigatorConfig']['monthFormat'])) {
        $output .= '      monthFormat: YAHOO.widget.Calendar.' . $this->_component_config[$js_instance]['navigatorConfig']['monthFormat'] . ',' . LF;
      } else {
        $output .= '      monthFormat: YAHOO.widget.Calendar.LONG,' . LF;
      }
      if (isset($this->_component_config[$js_instance]['navigatorConfig']['initialFocus'])) {
        $output .= '      initialFocus: "' . $this->_component_config[$js_instance]['navigatorConfig']['initialFocus'] . '",' . LF;
      } else {
        $output .= '      initialFocus: "year",' . LF;
      }
      $output .= '    };'.LF;
      return $output;
  }

  /**
   * Set weekday labels according with language
   * @param      none
   * @return     none
   * @access     private
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  private function _setWeekday() {
    $weekday_list = array(
        '0' => 'sunday',
        '1' => 'monday',
        '2' => 'tuesday',
        '3' => 'wednesday',
        '4' => 'thursday',
        '5' => 'friday',
        '6' => 'saturday'
    );

    foreach($weekday_list as $key => $val) {
      $weekdays[] = substr($this->_translation['cal_' . $val],0,1);
    }
    $this->setProperty('WEEKDAYS_1CHAR', $weekdays);
    unset($weekdays);

    $yui_weekday_names = array('WEEKDAYS_SHORT' => 2, 'WEEKDAYS_MEDIUM' => 3,'WEEKDAYS_LONG' => 10);
    foreach($yui_weekday_names as $key => $val) {
      $counter = 0;
      $weekdays = '';
      while ($counter <= 6) {
        $weekdays[] = htmlentities($this->_translation['cal_' . substr($weekday_list[$counter], 0 , $val)]);
        $counter ++;
      }
      $this->setProperty($key, $weekdays);
    }
  }

  /**
   * Set month labels according with language
   * @param      none
   * @return     none
   * @access     private
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  private function _setMonth() {
    $month_list = array(
        '01' => 'january',
        '02' => 'february',
        '03' => 'march',
        '04' => 'april',
        '05' => 'mayl',
        '06' => 'june',
        '07' => 'july',
        '08' => 'august',
        '09' => 'september',
        '10' => 'october',
        '11' => 'november',
        '12' => 'december'
    );

    $yui_months_type = array('MONTHS_LONG' => 9, 'MONTHS_SHORT' => 3);
    foreach($yui_months_type as $key => $val) {
      $counter = 1;
      $months = '';
      while ($counter <= 12) {
        if ($counter < 10) {
          $month_number = '0'.$counter;
        } else {
          $month_number = $counter;
        }
        $months[] = $this->_translation['cal_' . substr($month_list[$month_number], 0 , $val)];
        $counter ++;
      }
      $this->setProperty($key, $months);
    }
  }

  /**
   * Set the position of day, month and year in the field.
   * The default mode is RFC822: day/month, day/month/year, month/year
   * @param      string [$fmt] The date format.
   * @return     none
   * @access     private
   * @since      0.1.00b (2010-08-12)
   * @version    0.1.00b (2010-08-12)
   * @see        none
   */
  private function _setMdyPosition($fmt = 'DATE_RFC822') {
    $formats = array(
            'DATE_ATOM'    => array('MD_DAY_POSITION' => '2', 'MD_MONTH_POSITION' => '1', 'MDY_DAY_POSITION' => '3', 'MDY_MONTH_POSITION' => '2', 'MDY_YEAR_POSITION' => '1', 'MY_MONTH_POSITION' => '2', 'MY_YEAR_POSITION' => '1', 'MY_LABEL_MONTH_POSITION' => '2', 'MY_LABEL_YEAR_POSITION' => '1'),
            'DATE_COOKIE'  => array('MD_DAY_POSITION' => '1', 'MD_MONTH_POSITION' => '2', 'MDY_DAY_POSITION' => '1', 'MDY_MONTH_POSITION' => '2', 'MDY_YEAR_POSITION' => '3', 'MY_MONTH_POSITION' => '1', 'MY_YEAR_POSITION' => '2', 'MY_LABEL_MONTH_POSITION' => '1', 'MY_LABEL_YEAR_POSITION' => '2'),
            'DATE_ISO8601' => array('MD_DAY_POSITION' => '2', 'MD_MONTH_POSITION' => '1', 'MDY_DAY_POSITION' => '3', 'MDY_MONTH_POSITION' => '2', 'MDY_YEAR_POSITION' => '1', 'MY_MONTH_POSITION' => '2', 'MY_YEAR_POSITION' => '1', 'MY_LABEL_MONTH_POSITION' => '2', 'MY_LABEL_YEAR_POSITION' => '1'),
            'DATE_RFC822'  => array('MD_DAY_POSITION' => '1', 'MD_MONTH_POSITION' => '2', 'MDY_DAY_POSITION' => '1', 'MDY_MONTH_POSITION' => '2', 'MDY_YEAR_POSITION' => '3', 'MY_MONTH_POSITION' => '1', 'MY_YEAR_POSITION' => '2', 'MY_LABEL_MONTH_POSITION' => '1', 'MY_LABEL_YEAR_POSITION' => '2'),
            'DATE_RFC850'  => array('MD_DAY_POSITION' => '1', 'MD_MONTH_POSITION' => '2', 'MDY_DAY_POSITION' => '1', 'MDY_MONTH_POSITION' => '2', 'MDY_YEAR_POSITION' => '3', 'MY_MONTH_POSITION' => '1', 'MY_YEAR_POSITION' => '2', 'MY_LABEL_MONTH_POSITION' => '1', 'MY_LABEL_YEAR_POSITION' => '2'),
            'DATE_RFC1036' => array('MD_DAY_POSITION' => '1', 'MD_MONTH_POSITION' => '2', 'MDY_DAY_POSITION' => '1', 'MDY_MONTH_POSITION' => '2', 'MDY_YEAR_POSITION' => '3', 'MY_MONTH_POSITION' => '1', 'MY_YEAR_POSITION' => '2', 'MY_LABEL_MONTH_POSITION' => '1', 'MY_LABEL_YEAR_POSITION' => '2'),
            'DATE_RFC1123' => array('MD_DAY_POSITION' => '1', 'MD_MONTH_POSITION' => '2', 'MDY_DAY_POSITION' => '1', 'MDY_MONTH_POSITION' => '2', 'MDY_YEAR_POSITION' => '3', 'MY_MONTH_POSITION' => '1', 'MY_YEAR_POSITION' => '2', 'MY_LABEL_MONTH_POSITION' => '1', 'MY_LABEL_YEAR_POSITION' => '2'),
            'DATE_RSS'     => array('MD_DAY_POSITION' => '1', 'MD_MONTH_POSITION' => '2', 'MDY_DAY_POSITION' => '1', 'MDY_MONTH_POSITION' => '2', 'MDY_YEAR_POSITION' => '3', 'MY_MONTH_POSITION' => '1', 'MY_YEAR_POSITION' => '2', 'MY_LABEL_MONTH_POSITION' => '1', 'MY_LABEL_YEAR_POSITION' => '2'),
            'DATE_W3C'     => array('MD_DAY_POSITION' => '2', 'MD_MONTH_POSITION' => '1', 'MDY_DAY_POSITION' => '3', 'MDY_MONTH_POSITION' => '2', 'MDY_YEAR_POSITION' => '1', 'MY_MONTH_POSITION' => '2', 'MY_YEAR_POSITION' => '1', 'MY_LABEL_MONTH_POSITION' => '2', 'MY_LABEL_YEAR_POSITION' => '1'),
            'test'         => array('MD_DAY_POSITION' => '2', 'MD_MONTH_POSITION' => '1', 'MDY_DAY_POSITION' => '2', 'MDY_MONTH_POSITION' => '1', 'MDY_YEAR_POSITION' => '3', 'MY_MONTH_POSITION' => '1', 'MY_YEAR_POSITION' => '2', 'MY_LABEL_MONTH_POSITION' => '1', 'MY_LABEL_YEAR_POSITION' => '2'),
    );

    if ( ! isset($formats[$fmt])) {                                             // If the format is wrong, will use the standard format
      $fmt = 'DATE_RFC822';
    }

    $this->setProperty($formats[$fmt]);
  }

}