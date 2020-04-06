<?php
namespace phpXPublish;
class NavBoxFlexColumn extends NavBox {

  function __construct($str_name="mynavBoxFlexColumn") {
    parent::__construct($str_name);
    $this->str_type="navBoxFlexColumn";
    $this->str_class="nav flex-column";
  }
}//END CLS NAV BOX FLEX COLUMN
?>
