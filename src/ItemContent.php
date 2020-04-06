<?php
namespace phpxpublish;
class ItemContent extends PdoObject  {
  public $content;
  function __construct($str_name="mycontentItem") {
    parent::__construct($str_name);
    $this->str_type="contentItem";
    $this->content="";
  }
  function fn_execute() {

    try{
      $s="";
      $s.="<p>";
      $s.=nl2br($this->str_content).PHP_EOL;
      $s.="</p>";
      echo $s;
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
  }//end function execute
}//END CLS Content Item

?>
