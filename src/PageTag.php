<?php
namespace phpxpublish;
class PageTag extends Page {
  function __construct() {

    parent::__construct("mytagOpen");
    $this->str_type="pageTag";
  }
  function fn_execute() {
    try{
      $this->fn_write_containerBox_start();
      echo '<'.$this->str_tag.'>'.PHP_EOL;
      echo '</'.$this->str_tag.'>'.PHP_EOL;
      //DEFAULT SCRIPTS SUPPLIED HERE
      //TO DO : Do LOOK UP IN DB TO DETEMRINE WHICH SCRIPTS THE TAG NEEDS
      echo '<script src="/xpublish/_client/data.js"></script>'.PHP_EOL;
      echo '<script src="/xpublish/_client/modal.js"></script>'.PHP_EOL;
      /*
      echo '<script src="/'.$this->str_tag.'/_client/data.js"></script>'.PHP_EOL;
      echo '<script src="/'.$this->str_tag.'/_client/modal.js"></script>'.PHP_EOL;
      //*/
      //echo '<script src="/'.$this->str_tag.'/_client/tag.js"></script>'.PHP_EOL;

      echo '<script src="/xpublish/app/'.$this->str_tag.'/_client/tag.js"></script>'.PHP_EOL;
      $this->fn_write_containerBox_end();
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
  }//end function execute
}//END CLS PAGE TAG

?>
