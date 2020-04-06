<?php
namespace phpxpublish;
class PageDelight extends Page {
  function __construct($str_name="mypageDelight") {
    parent::__construct($str_name);
    $this->str_type="pageDelighte";
    $this->bln_border=false;
  }
  function fn_execute() {
    try{

      /*
      $obj_trail=new CrumbTrail();
      $obj_trail->fn_write($obj_site->row["id"]);
      //*/

      //fn_echo("str_tags", $this->str_tags);
      //echo "<!-- start page -->'";
      $this->fn_write_containerBox_start();

      /*
      $this->fn_write_NavTitle();
      //*/
      //*
      $obj_BarTop=new BarTop();
      $obj_BarTop->fn_adopt_type();
      $obj_BarTop->fn_execute();
      //*/

      //$this->fn_write_containerBox_start();

      //*
      parent::fn_execute();
      //*/

      /*
      $obj_BarTop=new BarTop();
      $obj_BarTop->fn_adopt_type();
      $obj_BarTop->fn_execute();
      //*/

      $this->fn_write_containerBox_end();
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
  }//end function execute
}//END CLS PAGE DELIGHT

?>
