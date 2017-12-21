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
    echo $OUTPUT->header();
}

echo get_string('deprecationmessage', 'block_ilios');

if ($moodle_header == 'true' or $moodle_header == 'yes') {
    echo $OUTPUT->footer();
}

