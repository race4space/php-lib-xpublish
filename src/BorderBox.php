<?php
namespace phpxpublish;
class BorderBox extends Container  {
  function __construct($str_name="myborderBox") {
    parent::__construct($str_name);
    global $obj_bootstrap;
    $this->str_type="borderBox";
    $this->bln_containerbox=true;
    $this->bln_border=true;
    $this->int_padding="3";
    $this->int_margin_x_axis="auto";
    $this->int_margin_y_axis="3";
    $this->str_class_extension="";
  }
}//END CLS BORDER BOX
?>
