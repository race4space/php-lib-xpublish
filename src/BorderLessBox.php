<?php
namespace phpxpublish;
class BorderLessBox extends BorderBox  {
  function __construct($str_name="myborderlessBox") {
    parent::__construct($str_name);
    $this->bln_border=false;
  }
}//END CLS BORDER LESS BOX
?>
