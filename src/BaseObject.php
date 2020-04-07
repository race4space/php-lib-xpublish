<?php
namespace phpxpublish;
class BaseObject {

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
    fn_write_debug("", get_object_vars($this));
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
  function fn_write_message($str_title, $foo_message){
    if(is_array($foo_message)){
      $s="";
      foreach ($foo_message as $key => $value) {
        $foo_value=$value;
        if(is_array($foo_value)){
          $foo_value="native array";
        }
        else if(is_object($foo_value)){
          $foo_value="native object";
        }
        $s.=fn_get_echo($key, $foo_value);
      }
      $str_message=$s;
    }
    else{
        $str_message=$foo_message;
    }

    $str="";
    $str=$str.'<h1>'.$str_title.'</h1><p>'."\r\n";
    $str=$str.$str_message;
    $this->fn_write_container($str);
  }
  function fn_write_container($str){

    echo '<div class="container p-3 my-3 bg-dark text-white rounded-lg">'."\r\n";
    echo $str."\r\n";
    echo '</div>'."\r\n";
  }
  function fn_echo($lab, $str=""){
    echo($this->fn_get_echo($lab, $str));
  }
  function fn_get_echo($lab, $str){
    $s="<div>";
    $s.=$lab;
    if(!empty($str) or  $str==="0"){
      $s.=": ";
      $s.=$str;
    }
    $s.="</div>".PHP_EOL;
    return $s;
  }
  function __destruct() {
      //echo "Destroying " . __CLASS__ . " ".$this->name."</br>";
   }
}//END CLS OBJECT
?>
