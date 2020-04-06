<?php
namespace phpxpublish;
class NavTabPill extends NavItem  {
  function __construct($str_name="mynavPill") {
    parent::__construct($str_name);
    $this->str_type="navPill";
    $this->datatoggle="pill";
  }
  function fn_set_href(){
    $this->str_href="#id".$this->int_id;
  }
}//END CLS NAV TAB PILL
?>
