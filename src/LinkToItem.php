<?php
namespace phpxpublish;
class LinkToItem extends Nav  {
  function __construct($str_name="mylinkToItem") {
    parent::__construct($str_name);
    $this->str_type="linkToItem";
  }
  function fn_execute() {
    try{
      $obj_link=new NavItem();
      $obj_link->int_id=$this->int_id_link;
      $obj_link->fn_adopt_id();
      $obj_link->fn_execute();
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
  }//end function execute
}//END CLS LINK TO ITEM
?>
