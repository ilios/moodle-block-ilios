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
 * calendar.php
 * 
 * @package    ilios
 * @copyright  &copy; 2011 The Regents of the University of California
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author     Carson Tam (carson.tam@ucsf.edu), UC San Francisco
 * 
 */

require_once('../../config.php');

$moodle_header = strtolower(optional_param('moodle_header', 'false', PARAM_TEXT));
$iframe_width = optional_param('iframe_width', 'default', PARAM_TEXT);
$iframe_height = optional_param('iframe_height', 'default', PARAM_TEXT);

$content_url = $CFG->block_ilios_serverurl.$CFG->block_ilios_embedded_dashboard_path;

if (!empty($CFG->block_ilios_embedded_dashboard_params)) {
    $content_url .= '?'.$CFG->block_ilios_embedded_dashboard_params;
}

if ($moodle_header == 'true' or $moodle_header == 'yes') {
    $strcalendar = get_string('ilioscalendartitle', 'block_ilios');

    $urlcalendar = basename(__FILE__);
    $navlinks = array();
    $navlinks[] = array('name' => $strcalendar,
                        'link' => $urlcalendar,
                        'type' => 'misc');

    $navigation = build_navigation($navlinks);
    $site = get_site();

    print_header("$site->shortname: $strcalendar", $strcalendar, $navigation,
                 '', '', true, '', user_login_string($site));
}

echo "<iframe frameborder='0' width=\"".$iframe_width.'" height="'.$iframe_height.'" src="'.$content_url.'" >';
echo '  <p>Your browser does not support iframe.</p>';
echo '</iframe>';

if ($moodle_header == 'true' or $moodle_header == 'yes') {
    print_footer();
}

