<?php
namespace phpxpublish;
class BarTop extends BorderBox {
  public $content;
  function __construct($str_name="myBarTop") {
    parent::__construct($str_name);
    $this->str_type="BarTop";
  }

  function fn_execute() {

    global $obj_page;
    try{

      global $obj_site;

      //*
      $obj_trail=new NavCrumbTrail();
      $obj_trail->fn_write($obj_site->row["id"]);
      //*/

      //if($this->bln_containerbox){
        $this->fn_write_containerBox_start();
      //}

      //*
      $obj_navBarTop=new BarTopNav();
      $obj_navBarTop->fn_adopt_type();
      $obj_navBarTop->fn_execute();
      //*/

      //*
      $s='';
      $s.='<table style="border:0px solid black">'.PHP_EOL;
      $s.='<tr>'.PHP_EOL;
      $s.='<td style="width:30%">'.PHP_EOL;
      echo $s;

      $obj_page->fn_write_NavTitle();

      $obj_Logo=new Logo();
      $obj_Logo->fn_adopt_type();
      $obj_Logo->fn_execute();

      $s='';
      $s.='</td>'.PHP_EOL;
      echo $s;

      $s='';
      $s.='<td style="width:50%">'.PHP_EOL;
      $s.='<a href="http://www.google.com" style="color:white;text-decoration:none">'.PHP_EOL;
      //$s.='<div class="" style="max-height: 100%;max-width: 100%;margin:20px;padding:5px;font-size:40pt;color:white;font-style:italic;font-weight:bold;border:1px solid black;background-image:url(images/tropicalisland.jpg);">'.PHP_EOL;
      $s.='<img class="img-fluid rounded" src="/images/tropicalisland.jpg">'.PHP_EOL;
      $s.='<figcaption class="figure-caption">Your Adventure Starts Here.</figcaption>';
      //$s.='Your Adventure Starts Here'.PHP_EOL;
      //$s.='</div>'.PHP_EOL;
      $s.='</a>'.PHP_EOL;
      $s.='</td>'.PHP_EOL;
      $s.='</tr>'.PHP_EOL;
      $s.='</table>'.PHP_EOL;
      echo $s;
      //*/

      //*
      $obj_trail=new NavPillTrail();
      $obj_trail->fn_write($obj_site->row["id"]);
      //*/

      //*
      $obj_trail=new NavCrumbTrail();
      $obj_trail->fn_write($obj_site->row["id"]);
      //*/

      //*
      $obj_site->obj_page->fn_write_NavTitle();
      //*/

      //if($this->bln_containerbox){
        $this->fn_write_containerBox_end();
      //}

    }
    catch(\PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
  }//end function execute
}//END CLS TOP BAR

?>
