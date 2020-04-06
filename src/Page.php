<?php
namespace phpXPublish;
class Page extends Nav {

  function __construct($str_name="myPage") {
    parent::__construct($str_name);
    $this->str_type="page";
    $this->str_class="container";
    $this->bln_containerbox=false;
    $this->int_publish=0;
  }
  function fn_load($obj_row){
    parent::fn_load($obj_row);
    $this->int_publish=$this->fn_load_item($this->int_publish, $obj_row["publish"]);

  }
  function fn_set_href_parent(){
    global $obj_xpublish_const;
    $obj_nav=new Nav();
    $obj_nav->str_sql="SELECT * FROM `container` WHERE id=? and type=?;";
    $obj_nav->params=[$this->int_id_parent, $obj_xpublish_const->const_type_PageItem];
    $obj_nav->fn_grow();
    $this->str_href_parent=$obj_nav->str_href;
  }
  function fn_write_NavTitle(){
    echo '<h2><a href="'.$this->str_href_parent.'">'.$this->str_title.'</a></h2>'.PHP_EOL;
  }
}//End CLS PAGE
?>
