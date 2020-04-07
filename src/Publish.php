<?php
namespace phpxpublish;
$obj_file_publish;
class Publish extends BaseObject{

  function __construct($obj_page) {

    $this->obj_page=$obj_page;
    $this->bln_debug=false;
  }
  function fn_delete_path(){

    $this->fn_set_path();
    $fpath=$this->str_path_file;
    if (file_exists($fpath)) {
      unlink($fpath);
    }
    $fpath=$this->str_path_file_folder;
    if(empty($fpath)){}
    elseif (is_dir($fpath)) {
         rmdir($fpath);
    }
  }

  function fn_start(){
    global $obj_request;
    switch ($this->obj_page->int_publish) {
      case 0;//dont publish
          $this->bln_publish_file=false;
          break;
      case 1;//publish
          $this->bln_publish_file=true;
      break;
      case 2;//republish
          $this->bln_publish_file=true;//WILL OCCUR IF FILE DOES NOT EXIST, BUT DB NOT RESET TO 1
      break;
      default://NO CHANGE
    }

    if($obj_request->server_address==$obj_request->local_address){
        if($this->bln_publish_file){$this->bln_publish_file=false;}
    }

    if(!$this->bln_publish_file){
      return;
    }

    $this->fn_set_path();
    $this->fn_create_path();
    $this->fn_open_file();
    ob_start('ob_file_callback');
  }
  function fn_end(){
    if(!$this->bln_publish_file){return;}
    ob_end_flush();
    if(!$this->bln_debug){header("Location: /".$this->str_path_file_folder);}
  }
  function fn_set_path(){
      global $obj_request;

      $this->str_path_page_folder=$obj_request->server_folder_prefix;

      $this->str_path_file_folder=$obj_request->fn_get_basename_tok($this->obj_page->str_href);

      $fpath=$this->str_path_file_folder;
      if(empty($fpath)){}
      else{$fpath=$fpath."/";}
      $this->str_path_file=$fpath.'index.html';
  }
  function fn_create_path(){

    $fpath=$this->str_path_page_folder;
    $bln_success=$this->fn_create_folder($fpath);

    $fpath=$this->str_path_file_folder;
    $bln_success=$this->fn_create_folder($fpath);
  }
  function fn_create_folder($fpath){
    if(empty($fpath)){return false;}
    if(!is_dir($fpath)) {
      mkdir($fpath);
      return true;
      if($this->bln_debug){$this->fn_echo("1. Page Parent Folder created", $fpath);}
    }
    return false;
  }
  function fn_open_file(){
    //$this->obj_file=fopen($this->str_path_file,'w');
    global $obj_file_publish;
    $obj_file_publish=fopen($this->str_path_file,'w');
  }
}//Enf Class Publish
function ob_file_callback($buffer){
  global $obj_file_publish;
  fwrite($obj_file_publish,$buffer);
}
?>
