<?php

/**
 * 
 * @author Carson Tam (carson.tam@ucsf.edu), UC San Francisco
 */

  class block_ilios extends block_base {
    function init() {
      $this->title = 'Ilios Calendar';
      $this->version = 2011052400;
  }
   
   function get_content() {
     global $CFG, $USER;
   
     if ($this->content !== NULL) {
         return $this->content;
     }
 
     $this->content = new stdClass;
     

     $ilios_prod_link = 'https://curriculum.ucsf.edu/present_actual.php';
     $ilios_stage_link = 'https://ilios-stage.library.ucsf.edu/present_actual.php';
     $ilios_dev_link = 'https://ilios-dev.library.ucsf.edu/present_actual.php';

     $ilios_calendar_link = $CFG->wwwroot.'/blocks/ilios/calendar.php?iframe_width=1300&iframe_height=800';
     
     //$this->content->text = '<pre>'. print_r($USER, 1).'</pre>';

     $this->content->text = '<a href="'.$ilios_prod_link.'" target="_blank">Go to Ilios Dashboard on Prod</a><br />';
     $this->content->text .= '<a href="'.$ilios_stage_link.'" target="_blank">Go to Ilios Dashboard on Stage</a><br />';
     $this->content->text .= '<a href="'.$ilios_dev_link.'" target="_blank">Go to Ilios Dashboard on Dev</a><br />';

     $this->content->text .= '<a href="'.$ilios_calendar_link.'">iRocket Calendar on Prod</a><br />';
     $this->content->text .= '<a href="'.$ilios_calendar_link.'&server=stage">iRocket Calendar on Stage</a><br />';
     $this->content->text .= '<a href="'.$ilios_calendar_link.'&server=dev">iRocket Calendar on Dev</a><br />';

     $this->content->footer = '';
 
     return $this->content;
   }

   function is_empty() {
     global $USER;

     return parent::is_empty() || ($USER->auth != 'shibboleth');
       
   }
 }
 
 
 ?>
