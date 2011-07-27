<?php
/**
 * @copyright &copy; 2010 The Regents of the University of California
 * @author Carson Tam (carson.tam@ucsf.edu), UC San Francisco
 * @package block_ilios
 */

$settings->add(new admin_setting_configtext('block_ilios_serverurl', 
                                            get_string('iliosserverurl', 'block_ilios'), 
                                            get_string('iliosserverurldescription', 'block_ilios'),
                                            'https://curriculum.ucsf.edu'));
$settings->add(new admin_setting_configtext('block_ilios_dashboard_path',
                                            get_string('iliosdashboardpath', 'block_ilios'),
                                            get_string('iliosdashboardpathdescription', 'block_ilios'),
                                            '/present_actual.php'));
$settings->add(new admin_setting_configtext('block_ilios_embedded_dashboard_path',
                                            get_string('iliosembeddeddashboardpath', 'block_ilios'),
                                            get_string('iliosembeddeddashboardpathdescription', 'block_ilios'),
                                            '/ilios2.php/dashboard_controller'));
$settings->add(new admin_setting_configtext('block_ilios_embedded_dashboard_params',
                                            get_string('iliosembeddeddashboardparams', 'block_ilios'),
                                            get_string('iliosembeddeddashboardparamsdescription', 'block_ilios'),
                                            'stripped_view=yes'));
$settings->add(new admin_setting_configtext('block_ilios_calendar_params',
                                            get_string('ilioscalendarparams', 'block_ilios'),
                                            get_string('ilioscalendarparamsdescription', 'block_ilios'),
                                            'iframe_width=1300&iframe_height=800&moodle_header=yes'));

?>
