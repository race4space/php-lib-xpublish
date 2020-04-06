<?php
namespace phpxpublish;
class PdoObject extends BaseObject  {


  function __construct($str_name="myPDOObject") {
    parent::__construct($str_name);

    $this->str_type="pdoObject";

    $this->str_sql="";
    $this->str_sql_child="";

    $this->int_id=0;
    $this->int_id_parent=0;
    $this->int_id_type=0;
    $this->int_id_tab=0;
    $this->int_id_link=0;

    $this->str_sql="";
    $this->params=[];

    $this->obj_pdo=new \phprace4space\PDO;

    global $con_host;
    global $con_user;
    global $con_pass;
    global $con_schema;

    $this->obj_pdo->fn_connect($con_host, $con_user, $con_pass, $con_schema);
  }
  function fn_debug() {
    parent::fn_debug();
    //echo interpolateQuery($this->str_sql, $this->params);
  }
  function fn_create(){

    $int_id_type=$this->row["tid"];
    $str_type=$this->row["type"];

    $bln_debug=false;
    global $obj_xpublish_const;

    $obj_child=false;
    switch ($int_id_type) {
      case $obj_xpublish_const->const_tid_container:
        $obj_child=new Container();
      break;
      case $obj_xpublish_const->const_tid_borderBox:
        $obj_child=new BorderBox();
      break;
      case $obj_xpublish_const->const_tid_borderlessBox:
        $obj_child=new BorderLessBox();
      break;
      case $obj_xpublish_const->const_tid_contentBox:
        $obj_child=new BorderLessBox();
      break;
      case $obj_xpublish_const->const_tid_navBarTabPills:
        $obj_child=new NavBarTabPills();
      break;
      case $obj_xpublish_const->const_tid_navTabPill:
        $obj_child=new NavTabPill();
      break;
      case $obj_xpublish_const->const_tid_navBarButtonPills:
        $obj_child=new NavBarButtonPills();
      break;
      case $obj_xpublish_const->const_tid_navButtonPill:
        $obj_child=new NavButtonPill();
      break;
      case $obj_xpublish_const->const_tid_navBarTabTabs:
        $obj_child=new NavBarTabTabs();
      break;
      case $obj_xpublish_const->const_tid_navTabTab:
        $obj_child=new NavTabPill();
      break;
      case $obj_xpublish_const->const_tid_pillTrail:
        $obj_child=new NavPillTrail();
      break;
      case $obj_xpublish_const->const_tid_crumbTrail:
        $obj_child=new CrumbTrail();
      break;
      case $obj_xpublish_const->const_tid_navBox:
        $obj_child=new NavBox();
      break;
      case $obj_xpublish_const->const_tid_navBoxFlexColumn:
        $obj_child=new NavBoxFlexColumn();
      break;
      case $obj_xpublish_const->const_tid_linkToItem:
        $obj_child=new LinkToItem();
      break;
      case $obj_xpublish_const->const_tid_contentItem:
        $obj_child=new ItemContent();
      break;
      case $obj_xpublish_const->const_tid_mediaItem:
        $obj_child=new ItemMedia();
      break;
      case $obj_xpublish_const->const_tid_pageSimple:
        $obj_child=new PageSimple();
      break;
      case $obj_xpublish_const->const_tid_pagetagOpen:
        $obj_child=new PageTag();
      break;
      case $obj_xpublish_const->const_tid_pageDelight:
        $obj_child=new PageDelight();
      break;
      case $obj_xpublish_const->const_tid_template:
        $obj_child=$this->fn_create_template($int_id_type, $str_type);
      break;
      default:
    }
    if(empty($obj_child)){
      fn_echo("Type Not Found", $int_id_type);
      die();
    }
    return $obj_child;
  }
  function fn_create_template(){

    $int_id_type=$this->row["tid"];
    $str_type=$this->row["type"];

    global $bln_debug;


    //$obj_child=new PdoObject(
    /*
    fn_echo("int_id_type", $int_id_type);
    fn_echo("str_type", $str_type);
    //*/

    $str_sql="SELECT * FROM `container` WHERE type=? and cid=? and live LIMIT 1 ;";
    $params=[$str_type, 0];
    $stmt = $this->obj_pdo->pdo->prepare($str_sql);
    $stmt->execute($params);
    $this->row = $stmt->fetch();
    $obj_child=$this->fn_create();
    return $obj_child;
  }


  function fn_load_item($str_item, $str_load) {
    if(empty($str_load)){
      return $str_item;
    }
    return $str_load;
  }

  function fn_load($obj_row){
    parent::fn_load($obj_row);
    $this->int_id=$obj_row["id"];
    $this->int_id_parent=$obj_row["cid"];
    $this->int_id_type=$obj_row["tid"];
    $this->int_id_tab=$obj_row["tab"];
    $this->int_id_link=$obj_row["linkid"];

    $this->str_tags=$obj_row["tags"];
    $this->str_tag=$obj_row["tag"];
    $this->int_tab=$obj_row["tab"];
    $this->str_name=$obj_row["name"];
    $this->str_title=$this->fn_load_item($this->str_title, $obj_row["title"]);
    $this->str_type=$this->fn_load_item($this->str_type, $obj_row["type"]);
    $this->int_active=$this->fn_load_item($this->int_active, $obj_row["active"]);
    $this->str_type=$this->fn_load_item($this->str_type, $obj_row["type"]);
    $this->str_content=$obj_row["content"];

  }
  function fn_born(){


    $this->stmt = $this->obj_pdo->pdo->prepare($this->str_sql);
    $this->stmt->execute($this->params);
  }
  function fn_grow(){
    $this->fn_born();
    $this->row = $this->stmt->fetch();
    if($this->row){
      $this->fn_load($this->row);
    }
  }
  function fn_adopt_id(){
    $this->str_sql="SELECT * FROM `container` WHERE id=? and live LIMIT 1;";
    $this->params=[$this->int_id];
    $this->fn_grow();
  }
  function fn_adopt_type(){
    $this->str_sql="SELECT * FROM `container` WHERE type=? and live LIMIT 1 ;";
    $this->params=[$this->str_type];
    $this->fn_grow();
  }

  function fn_have_children(){

    global $obj_xpublish_const;



    $s="";
    $s.="SELECT * FROM `container` WHERE cid=? ";
    $this->params=[$this->int_id];
    if($this->int_id_type>=$obj_xpublish_const->const_max_container){
        $s.="and tid<>? and type<>? ";
        $this->params[] = $this->int_id_type;
        $this->params[] = $this->str_type;
    }
    $s.="and live order by tab; ";
    $this->str_sql=$s;
    //echo $this->obj_pdo->interpolateQuery($this->str_sql, $this->params);
    $stmt = $this->obj_pdo->pdo->prepare($this->str_sql);
    $this->fn_born();
  }

function fn_grow_children(){
    while($this->row = $this->stmt->fetch()){
      $obj_child=$this->fn_create();
      $obj_child->fn_load($this->row);
      $obj_child->fn_execute();
    }
  }
}//END CLS PDO OBJECT
?>
