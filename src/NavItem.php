<?php
namespace phpxpublish;
class NavItem extends Nav  {
  function __construct($str_name="mynavItem") {
    parent::__construct($str_name);
    $this->str_type="navItem";
    $this->str_class="nav-item";
    $this->str_class_link="nav-link";
  }
  function fn_load($obj_row){
    parent::fn_load($obj_row);
    $this->fn_set_href();
    $this->fn_set_active();
  }
  function fn_set_href(){
  }
  function fn_execute() {
    echo $this->fn_execute_get();
  }
  function fn_execute_get() {
    global $bln_debug;
    try{
      $s="";
      //$s.='<li class="'.$this->str_class.'" style="margin-right:3px">'.PHP_EOL;
      $s.='<a class="';
      if(!empty($this->str_class_link)){
        $s.=$this->str_class_link.' ';
      }
      $s.=$this->fn_get_active();
      $s.='" ';
      if($this->datatoggle<>""){
          $s.='data-toggle="'.$this->datatoggle.'" ';
      }
      $s.='href="'.$this->str_href.'" ';
      $s.='style="margin-right:3px">';
      $s.=$this->str_title;
      $s.='</a>'.PHP_EOL;
      //$s.='</li>'.PHP_EOL;
      return $s;
    }
    catch(\PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
  }
}//END CLS NAV ITEM
?>
