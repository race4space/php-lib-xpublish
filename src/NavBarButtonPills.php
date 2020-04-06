<?php
namespace phpXPublish;
class NavBarButtonPills extends NavBox {
  function __construct($str_name="mylinkPills") {
    parent::__construct($str_name);
    $this->str_type="navBarButtonPills";
    $this->str_class="nav nav-pills";
  }
}//END CLS NAV BUTTON PILLS
?>
