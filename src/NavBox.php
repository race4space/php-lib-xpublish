<?php
namespace phpXPublish;
class NavBox extends Container  {

  function __construct($str_name="mynavBox") {
    parent::__construct($str_name);
    $this->str_type="navBox";
    $this->str_type_html="nav";
    $this->str_class="nav";
    $this->bln_containerbox=true;
    $this->bln_border=false;
  }
}//END CLS NAV BOX
?>
