<?php
namespace phpxpublish;
class Img extends Nav  {
  public $str_src;
  function __construct($str_name="mynavNav") {
    parent::__construct($str_name);
    $this->str_src = "";
  }
  function fn_load($obj_row){
    parent::fn_load($obj_row);
    $this->str_src=$obj_row["src"];
  }
  function fn_execute() {
    try{
      $s="";
      //$s.='<a  href="'.$obj_page->str_href_parent.'">';
      $s.='<a  href="'.$this->str_href.'">';
      $s.='<img class="my-max" alt="'.$this->str_title.'" style="border:0px solid black" src="'.$this->str_src.'">';
      $s.='</a>';
      echo $s;
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
  }//end function execute
}//END CLS IMG
?>
