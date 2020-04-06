<?php
namespace phpXPublish;
class NavCrumbTrail extends NavTrail  {
  function __construct($str_name="mybreadcrumbTrail") {
    parent::__construct($str_name);
    global $obj_xpublish_const;
    $this->int_id_type=$obj_xpublish_const->const_tid_crumbTrail;
    $this->str_type="breadcrumbTrail";
    $this->str_class="breadcrumb";
    $this->str_type_html="nav";
    $this->arr_trailItem=[] ;
  }
  function fn_write($int_id){
    $this->fn_map($int_id);
    $this->arr_trailItem=array_reverse($this->arr_trailItem);
    echo '<!--START CRUMB TRAIL-->'.PHP_EOL;
    echo '<nav aria-label="breadcrumb">'.PHP_EOL;
    echo '<ol class="breadcrumb">'.PHP_EOL;
    foreach ($this->arr_trailItem as $trailItem){
       echo '<li class="breadcrumb-item">';
        echo $trailItem;
        echo '</li>';
    }
    echo '</ol>'.PHP_EOL;
    echo '</nav>'.PHP_EOL;
    echo '<!--END CRUMB TRAIL-->'.PHP_EOL;
  }
}//END CLS CRUMB TRAIL

?>
