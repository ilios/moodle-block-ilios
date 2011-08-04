<?php

/**
 * @copyright &copy; 2010 The Regents of the University of California
 * @author Carson Tam (carson.tam@ucsf.edu), UC San Francisco
 * @package block_ilios
 */

class block_ilios extends block_base {
    function init() {
        $this->title = get_string('iliosblocktitle', 'block_ilios');
        $this->version = 2011072701;
    }

    // only one instance of this block is required
    function instance_allow_multiple() {
        return false;
    } //instance_allow_multiple

    // label and button values can be set in admin
    function has_config() {
        return true;
    } //has_config

    function get_content() {
        global $CFG, $USER;
        
        if ($this->content !== NULL) {
            return $this->content;
        }
 
        $this->content = new stdClass;
        
        
        $ilios_server_link = $CFG->block_ilios_serverurl.$CFG->block_ilios_dashboard_path;
     
        $ilios_calendar_link = $CFG->wwwroot.'/blocks/ilios/calendar.php';
        if (!empty($CFG->block_ilios_calendar_params))
            $ilios_calendar_link .= '?'.$CFG->block_ilios_calendar_params;
        
        $this->content->text .= '<a href="'.$ilios_server_link.'" target="_blank">Go to Ilios Dashboard</a><br />';
        $this->content->text .= '<a href="'.$ilios_calendar_link.'">Go to Ilios Calendar</a><br />';
        
        $this->content->footer = '';
        
        return $this->content;
    }
    
    // Hide this block from non-shibboleth users

    function is_empty() {
        global $USER;
        
        return parent::is_empty() || ($USER->auth != 'shibboleth');        
    }
}

?>
