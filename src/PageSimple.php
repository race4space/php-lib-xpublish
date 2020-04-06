<?php
namespace phpxpublish;
class PageSimple extends Page {
  function __construct($str_name="myPageSimple") {
    parent::__construct($str_name);
    $this->str_type="pageSimple";
  }
  function fn_execute() {

    try{
      $this->fn_write_containerBox_start();
      //Write Self
      $this->fn_write_NavTitle();
      //Write Self
      //Write Children
      parent::fn_execute();
      //Write Children
      $this->fn_write_containerBox_end();
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
  }//end function execute
}//END CLS PAGE SIMPLE

?>
