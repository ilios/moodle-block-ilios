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
 * @copyright  &copy; 2014 The Regents of the University of California
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author     Carson Tam (carson.tam@ucsf.edu), UC San Francisco
 *
 */

require_once('../../config.php');

$moodle_header = strtolower(optional_param('moodle_header', 'false', PARAM_TEXT));
$iframe_width = optional_param('iframe_width', '100%', PARAM_TEXT);
$iframe_height = optional_param('iframe_height', '100%', PARAM_TEXT);
$iframe_style = "width: $iframe_width; height: $iframe_height; ";

$content_url = get_config('ilios','Server_URL');
$content_url .= get_config('ilios', 'Embedded_Dashboard_Path');

$url_params = get_config('ilios', 'Embedded_Dashboard_Params');
if (!empty($url_params)) {
    $content_url .= '?'.$url_params;
}

if ($moodle_header == 'true' or $moodle_header == 'yes') {

    $strcalendar = get_string('ilioscalendartitle', 'block_ilios');

    $urlcalendar = new moodle_url("/blocks/ilios/". basename(__FILE__));

    $context = context_system::instance();
    $PAGE->set_context($context);
    $PAGE->set_url($urlcalendar);
    $PAGE->set_pagelayout('base');
    $PAGE->navbar->add($strcalendar);

    $PAGE->set_title($SITE->fullname.": ". $strcalendar);
    $PAGE->set_heading($SITE->fullname);

    // When included moodle header, the iframe_height percentage doesn't have any effect...so set a min-height for now.
    $iframe_style = "width: $iframe_width; height: $iframe_height; min-height: 420px;";
    echo $OUTPUT->header();
}
echo "<iframe frameborder='0' src='$content_url' style='$iframe_style'>";
echo '  <p>Your browser does not support iframe.</p>';
echo '</iframe>';

if ($moodle_header == 'true' or $moodle_header == 'yes') {
    echo $OUTPUT->footer();
}

