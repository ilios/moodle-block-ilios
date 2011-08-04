<?php

require_once('../../config.php');

$moodle_header = strtolower(optional_param('moodle_header', 'false', PARAM_TEXT));
$iframe_width = optional_param('iframe_width', 'default', PARAM_TEXT);
$iframe_height = optional_param('iframe_height', 'default', PARAM_TEXT);

$content_url = $CFG->block_ilios_serverurl.$CFG->block_ilios_embedded_dashboard_path.'?shib_mail_id='.$USER->email;
if (!empty($CFG->block_ilios_calendar_params))
    $content_url .= '&'.$CFG->block_ilios_embedded_dashboard_params;

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
echo '<p>Your browser does not support iframe.</p>';
echo '</iframe>';

if ($moodle_header == 'true' or $moodle_header == 'yes') {
  print_footer();
}

?>