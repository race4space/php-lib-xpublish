<?php
namespace phpXPublish;
class ItemMedia extends PdoObject  {
  public $content;
  function __construct($str_name="mymediaItem") {
    parent::__construct($str_name);
    $this->str_type="mediaItem";
    $this->content="";
  }
  function fn_execute() {

    try{
      //Write Self
      //Write Self
      //Write Children
      //Write Media Item
      $s="";
      $s.="<p>";
      $s.=$this->str_content.PHP_EOL;
      $s.="</p>";
      echo $s;
      //Write Content Item
      //Write Children
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
  }//end function execute
}//END CLS Item Media
?>
