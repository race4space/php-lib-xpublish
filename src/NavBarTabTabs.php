<?php
namespace phpXPublish;
class cls_navBarTabTabs extends cls_navPanes {
  function __construct($str_name="mynavBarTabTabs") {
    parent::__construct($str_name);
    $this->str_type="mynavBarTabTabs";
    $this->str_class="nav nav-tabs";
  }
  function fn_execute() {
      parent::fn_execute();
      $this->fn_write_panes();
  }
}//END CLS NAV BAR TAB TABS
?>
