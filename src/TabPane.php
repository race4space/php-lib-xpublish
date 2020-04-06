<?php
namespace phpxpublish;
class TabPane extends Container  {
  function __construct($str_name="myTabPane") {
    parent::__construct($str_name);
    $this->str_type="tabPane";
    $this->str_class="container tab-pane";
    $this->str_class_extension="";
    $this->bln_containerbox=true;
  }
  function fn_load($obj_row){
    parent::fn_load($obj_row);
    $this->fn_set_active();
  }
  function fn_set_active(){
    if($this->int_tab==0){
      $this->bln_active=true;
    }
  }
}//END CLS TAB PANE
?>
