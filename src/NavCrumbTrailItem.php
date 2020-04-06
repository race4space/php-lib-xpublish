<?php
namespace phpxpublish;
class NavCrumbTrailItem extends NavItem  {
  function __construct($str_name="mybreadCrumbItem") {
    parent::__construct($str_name);
    $this->str_type="breadCrumbItem";
    $this->str_class="breadcrumb-item";
    $this->str_class_link="";
  }
}//END CLS CRUM TRAIL ITEM
?>
