<?php

require_once('../../config.php');

$ilios_server = optional_param('server', 'prod', PARAM_ALPHA);
$iframe_width = optional_param('iframe_width', 'default', PARAM_TEXT);
$iframe_height = optional_param('iframe_height', 'default', PARAM_TEXT);

$content_url = 'https://ilios-'.$ilios_server.'.library.ucsf.edu/ilios2.php/dashboard_controller?shib_mail_id='.$USER->email.'&stripped_view=yes';

$strcalendar = "Ilios calendar";
$urlcalendar = basename(__FILE__);
$navlinks = array();
$navlinks[] = array('name' => $strcalendar,
                    'link' => $urlcalendar,
                    'type' => 'misc');

$navigation = build_navigation($navlinks);
print_header("$site->shortname: $strcalendar", $strcalendar, $navigation,
	     '', '', true, '', user_login_string($site));



echo "<iframe frameborder='0' width=\"".$iframe_width.'" height="'.$iframe_height.'" src="'.$content_url.'" >';
echo '<p>Your browser does not support iframe.</p>';
echo '</iframe>';

print_footer();

?>