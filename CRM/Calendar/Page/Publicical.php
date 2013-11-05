<?php

class CRM_Calendar_Page_Publicical extends CRM_Calendar_Page_Ical {
  function run() {
    // Example: Set the page-title dynamically; alternatively, declare a static title in xml/Menu/*.xml
    CRM_Utils_System::setTitle(ts('Ical'));

   $contact_id   = CRM_Utils_Request::retrieve('cid', 'Integer', CRM_Core_DAO::$_nullObject);
   if (!$contact_id) die ("need a param cid={the contact you want}");

    $activities = civicrm_api ("Activity","get",array("version"=>3, "contact_id"=> $contact_id,"sequential"=>true));
 
    $template = CRM_Core_Smarty::singleton();
    $template->assign('activities', $activities["values"]);
    echo $template->fetch('ICal.tpl');
  
    CRM_Utils_System::civiExit();

//    parent::run();
  }

}
