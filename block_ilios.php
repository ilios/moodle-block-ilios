<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * block_ilios.php
 * 
 * @package    ilios
 * @copyright  &copy; 2014 The Regents of the University of California
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author     Carson Tam (carson.tam@ucsf.edu), UC San Francisco
 * 
 */

class block_ilios extends block_base {

    public function init() {
        $this->title = get_string('iliosblocktitle', 'block_ilios');
    }

    // only one instance of this block is required
    public function instance_allow_multiple() {
        return false;
    } //instance_allow_multiple

    // label and button values can be set in admin
    public function has_config() {
        return true;
    } //has_config

    public function get_content() {
        global $CFG, $USER;

        if (null !== $this->content) {
            return $this->content;
        }

        $this->content = new stdClass;

        $ilios_server_link = get_config('ilios', 'Server_URL');
        $ilios_server_link .= get_config('ilios', 'Dashboard_Path');

        $ilios_calendar_link = $CFG->wwwroot.'/blocks/ilios/calendar.php';
        $ilios_calendar_params = get_config('ilios', 'Calendar_Params');
        if (!empty($ilios_calendar_params)) {
            $ilios_calendar_link .= '?'. $ilios_calendar_params;
        }

        $this->content->text .= '<a href="'.$ilios_server_link.'" target="_blank">';
        $this->content->text .= 'Go to Ilios Dashboard</a><br />';
        $this->content->text .= '<a href="'.$ilios_calendar_link.'">Go to Ilios Calendar</a><br />';

        $this->content->footer = '';

        return $this->content;
    }

    /**
     * Which page types this block may appear on.
     *
     * @return array page-type prefix => true/false.
     */
    function applicable_formats() {
        return array('all' => true, 'my' => false, 'tag' => false);
    }

    // Hide this block from non-shibboleth users
    public function is_empty() {
        global $USER;

        return parent::is_empty() || !isset($USER->auth) || ($USER->auth != 'shibboleth');
    }
}

