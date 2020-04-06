<?php
namespace phpXPublish;
class BarTopNav extends BorderLessBox  {
//class BarTopNav extends Container  {
  function __construct($str_name="mynavBarTop") {
    parent::__construct($str_name);
    $this->str_type="navBarTop";
    $this->int_padding=2;
    $this->int_margin_y_axis=0;
    $this->str_border_style="dotted";
    //$this->fn_compile();
  }
}//END CLS BAR TOP NAV

?>
