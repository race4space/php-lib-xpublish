<?php
namespace phpXPublish;
class SiteItem extends Container {
  function __construct($str_name="mySite") {
    parent::__construct($str_name);
    $this->str_type = "siteItem";
    //echo "<!--SITE_INFORMATION:REQUEST_URI:".$_SERVER['REQUEST_URI']."-->";


    global $obj_xpublish_const;
    global $obj_page;
    global $obj_request;

    $bln_debug=false;
    /*
    echo $this->obj_pdo->interpolateQuery($this->str_sql, $this->params);
    $obj_request->fn_debug();
    //*/

    $this->str_sql="SELECT * FROM `container` WHERE tid=?;";//siteItem
    $this->stmt = $this->obj_pdo->pdo->prepare($this->str_sql);
    $this->stmt->execute([$obj_xpublish_const->const_tid_siteItem]);
    $this->row = $this->stmt->fetch();
    $this->fn_load($this->row);

    $this->str_sql="SELECT * FROM `container` WHERE trim(both '/' from href)=? and type=? and live order by tab;";//PageItem
    $this->stmt = $this->obj_pdo->pdo->prepare($this->str_sql);
    $this->params=[$obj_request->str_basename_tok, $obj_xpublish_const->const_type_PageItem];
    $this->stmt->execute($this->params);
    if($bln_debug){$this->fn_debug();}
    $this->row = $this->stmt->fetch();
    if(!$this->row){
      $this->obj_page=new PageNotFound();
      return;
    }
    $this->obj_page=$this->fn_create();
    $obj_page=$this->obj_page;
    if(empty($this->obj_page)){
      $this->obj_page=new PageNotFound();
      return;
    }
    $this->obj_page->fn_load($this->row);
    $this->obj_page->fn_set_href_parent();


  }
  function fn_execute() {

    try{
      global $obj_bootstrap;
      $obj_bootstrap=new Bootstrap("", $this->str_theme);

      $this->obj_page->fn_execute();
  }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
  }
}

?>
