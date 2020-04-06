<?php
namespace phpXPublish;
class Container extends PdoObject  {

  function __construct($str_name="myContainer") {
    parent::__construct($str_name);
    $this->str_type="Container";
    $this->str_class='container';
    $this->str_type_html="div";
    $this->bln_containerbox=false;

    $this->bln_border=false;
    $this->str_theme="";
    $this->str_class="";
    $this->str_class_extension="";
    $this->str_style="";

    $this->int_padding="default";
    $this->int_margin_x_axis="default";
    $this->int_margin_y_axis="default";
    $this->int_border_width="default";
    $this->str_border_style="default";
  }
  function fn_load($obj_row){
    parent::fn_load($obj_row);

    $this->bln_border=$this->fn_load_item($this->bln_border, $obj_row["border"]);
    $this->str_theme=$obj_row["theme"];
    $this->str_class=$this->fn_load_item($this->str_class, $obj_row["class"]);
    $this->str_class_extension=$this->fn_load_item($this->str_class_extension, $obj_row["classextension"]);
  }

  function fn_write_containerBox_start() {
    global $obj_bootstrap;
    //echo '<div class="container p-3 my-3 border border-'.$obj_bootstrap->str_theme.' rounded-lg">'.PHP_EOL;
    echo PHP_EOL;
    $this->fn_compile();

    //fn_echo("this->str_type",$this->str_type);

    $s='';
    $s.='<'.$this->str_type_html.' ';
    $s.='id="id'.$this->int_id.'" ';
    if(!empty($this->str_class)){
      $s.='class="';
      $s.=$this->str_class;
      if(!empty($this->str_class_extension)){
        $s.=' '.$this->str_class_extension;
      }
      $s.='" ';
    }
    if(!empty($this->str_style)){
      $s.='style="'.$this->str_style.'" ';
    }
    if(!empty($this->str_type)){
      $s.='role="'.$this->str_type.'" ';
    }
    $s.='>'.PHP_EOL;
    echo  $s;
  }
  function fn_compile(){
    $this->fn_compile_class();
    $this->fn_compile_style();
  }
  function fn_compile_class(){
    global $obj_bootstrap;

    $s='';
    if(!$this->fn_check_default($this->int_padding)){
      $s.='p-'.$this->int_padding.' ';
    }
    if(!$this->fn_check_default($this->int_margin_x_axis)){
      $s.='mx-'.$this->int_margin_x_axis.' ';
    }
    if(!$this->fn_check_default($this->int_margin_y_axis)){
      $s.='my-'.$this->int_margin_y_axis.' ';
    }
    $s.=$this->fn_get_active().' ';

    if($this->bln_border){
      //$s.='border ';
      $s.='my-border-width ';
      $s.='my-border-style ';
      $s.='border-'.$obj_bootstrap->str_theme.' ';
      $s.='rounded-lg';
      //$s.=$this->fn_get_border().' ';
    }
    $this->str_class.=' '.$s;
  }
  function fn_compile_style(){
    $s='';
    if($this->bln_border){
      if(!$this->fn_check_default($this->int_border_width)){
        $s.='border-width:$this->'.$this->int_border_width.'px !important ';
      }
      if(!$this->fn_check_default($this->str_border_style)){

        $s.='border-style:'.$this->str_border_style.' !important ';
      }
    }
    $this->str_style.=$s;
    //$this->str_style.=' '.$s;
  }
  function fn_check_default($str_value){
    if($str_value=="default"){
      return true;
    }
    return false;
  }
  function fn_write_containerBox_end() {
    echo '</'.$this->str_type_html.'>'.PHP_EOL;
  }
  function fn_execute() {

    try{
      //Write Self
      if($this->bln_containerbox){
        $this->fn_write_containerBox_start();
      }
      //Write Self

      //Write Children
      $this->fn_have_children();
      $this->fn_grow_children();

      //Write Self
      if($this->bln_containerbox){
        $this->fn_write_containerBox_end();
      }
      //Write Self
    }
    catch(\PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
  }//end function execute
}//END CLS CONTAINER
?>
