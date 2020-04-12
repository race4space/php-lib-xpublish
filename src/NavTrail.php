<?php
namespace phpxpublish;
class NavTrail extends Nav  {

  function fn_execute() {
      global $obj_site;
      $this->fn_write($obj_site->row["id"]);
  }
  function fn_write($int_id){
    $this->fn_map($int_id);
    $this->arr_trailItem=array_reverse($this->arr_trailItem);
    echo '<!--START TRAIL-->'.PHP_EOL;
    echo '<'.$this->str_type_html.' class="'.$this->str_class.'">'.PHP_EOL;
    foreach ($this->arr_trailItem as $trailItem){
        echo $trailItem;
    }
    echo '</'.$this->str_type_html.'>'.PHP_EOL;
    echo '<!--END TRAIL-->'.PHP_EOL;
  }
  function fn_map($int_id_parent) {

    global $obj_xpublish_const;
    try{
      switch ($this->int_id_type) {
        case $obj_xpublish_const->const_tid_pillTrail:
            $obj_nav=new NavPillTrailItem();
          break;
        case $obj_xpublish_const->const_tid_crumbTrail:
              $obj_nav=new NavCrumbTrailItem();
        break;
        default:
          $this->fn_echo("Trail Type Not Found", $this->int_id_type);
      }
      $obj_nav->str_sql="SELECT * FROM `container` WHERE id=? and type=?;";
      $obj_nav->params=[$int_id_parent, $obj_xpublish_const->const_type_PageItem];
      $obj_nav->fn_grow();

      if($obj_nav->row){
        if($this->bln_set_active_crumb){
            $this->bln_set_active_crumb=false;
            $obj_nav->bln_active=true;
        }
        $s=$obj_nav->fn_execute_get();
        array_push($this->arr_trailItem, $s);
        $this->fn_map($obj_nav->int_id_parent);//recursive call to fn_map
      }
    }
    catch(\PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
  }
}//END CLS NAV TRAIL
?>
