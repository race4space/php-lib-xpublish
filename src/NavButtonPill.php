<?php
namespace phpxpublish;
class NavButtonPill extends NavItem  {
  function __construct($str_name="mynavButtonPill") {
    parent::__construct($str_name);
    $this->str_type="navButtonPill";
  }
  function fn_set_active(){
    global $obj_page;
    global $obj_gen;

    $bln_found=false;
    if(!empty($this->str_tags)){
      $bln_found=$this->fn_in_str(";".$this->str_tags.";", ";".$obj_page->str_tags.";");
    }
    if($bln_found){
      $this->bln_active=true;
    }
  }
}//END CLS NAV BUTTON PILL

?>
