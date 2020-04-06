<?php
namespace phpXPublish;
class cls_navPanes extends Nav  {
  function __construct($str_name="mynavPanes") {
    parent::__construct($str_name);
    $this->str_type_html="nav";
    $this->bln_containerbox=true;
    $this->bln_border=false;
    //must be same as navBox
  }
  function fn_write_panes(){
    echo '<div class="tab-content">'.PHP_EOL;
    $this->fn_have_children();
    while($this->row = $this->stmt->fetch()){
      $obj_child=new TabPane();
      $obj_child->fn_load($this->row);
      $obj_child->fn_execute();
    }
    echo '</div>'.PHP_EOL;
    //Write TAB PANES FOR TABBOX ITEM ID
  }
}//END CLS NAVPANES
?>
