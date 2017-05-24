<?php 

isset( $_GET['kod'] ) && die( '<meta charset="utf-8">

<style>
  body > code
  {
    display: block; border: 2px ridge; background: #ccc;
    padding: 3px; margin: 0; word-wrap: break-word; font: bold 18px "Courier New";
  }
</style>'.

    highlight_string( file_get_contents( $_SERVER['SCRIPT_FILENAME'] ), true ) );