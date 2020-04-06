<?php
namespace phpXPublish;
class NavPillTrailItem extends NavItem  {
  function __construct($str_name="mypillTrailItem") {
    parent::__construct($str_name);
    $this->str_type="pillTrailItem";
    $this->str_class="nav-item";
  }
}//END CLS PILL TRAIL ITEM
?>
