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
 * settings.php
 * 
 * @package    ilios
 * @copyright  &copy; 2011 The Regents of the University of California
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author     Carson Tam (carson.tam@ucsf.edu), UC San Francisco
 * 
 */

$settings->add(new admin_setting_configtext('ilios/Server_URL',
                                            get_string('iliosserverurl', 'block_ilios'),
                                            get_string('iliosserverurldescription', 'block_ilios'),
                                            'https://www.youriliosdomain.com'));
$settings->add(new admin_setting_configtext('ilios/Dashboard_Path',
                                            get_string('iliosdashboardpath', 'block_ilios'),
                                            get_string('iliosdashboardpathdescription', 'block_ilios'),
                                            '/ilio2.php/dashboard_controller'));
$settings->add(new admin_setting_configtext('ilios/Embedded_Dashboard_Path',
                                            get_string('iliosembeddeddashboardpath', 'block_ilios'),
                                            get_string('iliosembeddeddashboardpathdescription', 'block_ilios'),
                                            '/ilios2.php/calendar_controller'));
$settings->add(new admin_setting_configtext('ilios/Embedded_Dashboard_Params',
                                            get_string('iliosembeddeddashboardparams', 'block_ilios'),
                                            get_string('iliosembeddeddashboardparamsdescription', 'block_ilios'),
                                            'stripped_view=yes'));
$settings->add(new admin_setting_configtext('block_ilios_calendar_params',
                                            get_string('ilioscalendarparams', 'block_ilios'),
                                            get_string('ilioscalendarparamsdescription', 'block_ilios'),
                                            'iframe_width=100%&iframe_height=800px&moodle_header=yes'));
