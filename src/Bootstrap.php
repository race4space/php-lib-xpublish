<?php
namespace phpXPublish;
class Bootstrap extends BaseObject{

  public $blue;public $indigo;public $purple;public $pink;public $red;public $orange;public $yellow;public $green;
  public $teal;public $cyan;public $white;public $gray;public $gray_dark;public $primary;public$secondary;
  public $success;public $info;public $warning;public $danger;public $light;public $dark;
  public $str_theme;public $theme_color;
  function __construct($str_name="myBootstrapObject", $str_theme="blue") {
    parent::__construct($str_name);
    $this->blue="#007bff";
    $this->indigo="#6610f2";
    $this->purple="#6f42c1";
    $this->pink="#e83e8c";
    $this->red="#dc3545";
    $this->orange="#fd7e14";
    $this->yellow="#ffc107";
    $this->green="#28a745";
    $this->teal="#20c997";
    $this->cyan="#17a2b8";
    $this->white="#fff";
    $this->gray="#6c757d";
    $this->gray_dark="#343a40";
    $this->primary="#007bff";
    $this->secondary="#6c757d";
    $this->success="#28a745";
    $this->info="#17a2b8";
    $this->warning="#ffc107";
    $this->danger="#dc3545";
    $this->light="#f8f9fa";
    $this->dark="#343a40";

    //fn_echo("theme_color", $theme_color);
    //fn_echo("name", $name);

    $this->str_theme=$str_theme;
    switch ($str_theme) {
      case "blue":
        $this->theme_color=$this->blue;
      break;
      case "indigo":
        $this->theme_color=$this->indigo;
      break;
      case "purple":
        $this->theme_color=$this->purple;
      break;
      case "pink":
        $this->theme_color=$this->pink;
      break;
      case "red":
        $this->theme_color=$this->red;
      break;
      case "orange":
        $this->theme_color=$this->orange;
      break;
      case "yellow":
        $this->theme_color=$this->yellow;
      break;
      case "green":
        $this->theme_color=$this->green;
      break;
      case "teal":
        $this->theme_color=$this->teal;
      break;
      case "cyan":
        $this->theme_color=$this->cyan;
      break;
      case "white":
        $this->theme_color=$this->white;
      break;
      case "gray":
        $this->theme_color=$this->gray;
      break;
      case "gray_dark":
        $this->theme_color=$this->gray_dark;
      break;
      case "primary":
        $this->theme_color=$this->primary;
      break;
      case "secondary":
        $this->theme_color=$this->secondary;
      break;
      case "success":
        $this->theme_color=$this->success;
      break;
      case "info":
        $this->theme_color=$this->info;
      break;
      case "warning":
        $this->theme_color=$this->warning;
      break;
      case "danger":
        $this->theme_color=$this->danger;
      break;
      case "light":
        $this->theme_color=$this->light;
      break;
      case "dark":
        $this->theme_color=$this->dark;
      break;
      default:
        $this->theme_color=$this->cyan;
    }

    echo $this->fn_get_theme_pills($this->theme_color).PHP_EOL;

  }
  function fn_get_theme_pills($str_color="#007bff") {
    //return '<style>.nav-pills > li > a.active {background-color: '.$str_color.'!important;}</style>';
    $s="";
    $s.="<style>".PHP_EOL;
    //$s.=".my-theme-border {border-width:10px !important;} ".PHP_EOL;
    $s.=".my-border-width {border-width:3px !important;} ".PHP_EOL;
    $s.=".my-border-style {border-style:solid !important;} ".PHP_EOL;
    //$s.=".nav-pills > li > a.active {background-color: ".$str_color."!important;} ".PHP_EOL;
    $s.=".nav-pills > a.active {background-color: ".$str_color."!important;} ".PHP_EOL;
    $s.="</style>".PHP_EOL;
    return $s;
  }
}


?>
