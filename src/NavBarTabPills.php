<?php
namespace phpxpublish;
class NavBarTabPills extends cls_navPanes {
  function __construct($str_name="mynavBarTabPills") {
    parent::__construct($str_name);
    $this->str_type="navBarTabPills";
    $this->str_class="nav nav-pills";
  }
  function fn_execute() {
      parent::fn_execute();
      $this->fn_write_panes();
  }
}//END CLS NAV BAR TAB  PILLS
?>
