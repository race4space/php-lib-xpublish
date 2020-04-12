<?php
namespace phpxpublish;
class PageNotFound extends Page {
  function __construct($str_name="mypageNotFound") {
    parent::__construct($str_name);
    $this->str_type="pageNotFound";
  }
  function fn_execute() {
    try{
      $this->fn_write_containerBox_start();
      $this->fn_write_message("Information", "Page Not Found!!");
      $this->fn_write_containerBox_end();
    }
    catch(\PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
  }//end function execute
}//END CLS PAGE NOT FOUND
?>
