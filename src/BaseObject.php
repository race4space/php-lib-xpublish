<?php
namespace phpxpublish;
class BaseObject {
  use \phplibrary\General;

  public $int_id;
  public $str_name;
  function __construct($str_name="myObject") {
    $this->str_type = "object";
    $this->str_name = $str_name;
    $this->str_tags = "";
    $this->str_tag = "";


    $this->int_tab = 0;
    $this->str_title = $str_name;
    $this->bln_active = false;
    $this->int_active = 0;
    $this->str_content = "";
  }
  function fn_debug() {
    $this->fn_write_debug("", get_object_vars($this));
  }
  function fn_get_active() {

    if($this->bln_active){
      return "active";
    }
    return "";
  }
  function fn_set_active(){
    $this->bln_active=false;
    switch ($this->int_active) {
      case 1:
        if($this->int_tab==0){
          $this->bln_active=true;
        }
        break;
      case 2:
          $this->bln_active=true;
        break;
    }
  }
  function fn_execute() {
    //$this->fn_echo("Information", "cls object execute");
  }
  function fn_load($obj) {
  }
  function fn_in_str($needle, $haystack){
    $int_pos=strpos($haystack, $needle);
    if($int_pos===false){
      return false;
    }
    return true;
  }
  function __destruct() {
      //echo "Destroying " . __CLASS__ . " ".$this->name."</br>";
   }
}//END CLS OBJECT
?>
