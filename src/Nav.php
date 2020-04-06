<?php
namespace phpxpublish;
class Nav extends Container  {
  public $str_href;
  function __construct($str_name="mynavNav") {
    parent::__construct($str_name);
    $this->datatoggle="";
    $this->bln_set_active_crumb=true;
    $this->str_class="nav-item";
    $this->str_class_link="nav-link";

    $this->str_href = "";
  }
  function fn_load($obj_row){
    parent::fn_load($obj_row);
    $this->str_href=$obj_row["href"];
  }
}//END CLS NAV
?>
