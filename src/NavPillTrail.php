<?php
namespace phpxpublish;
class NavPillTrail extends NavTrail  {
  function __construct($str_name="mypillTrail") {
    parent::__construct($str_name);
    global $obj_xpublish_const;
    $this->int_id_type=$obj_xpublish_const->const_tid_pillTrail;
    $this->str_type="pillTrail";
    $this->str_class="nav nav-pills";
    $this->str_type_html="nav";
    $this->arr_trailItem=[] ;
  }
}//END CLS NAV PILL TRAIL
?>
