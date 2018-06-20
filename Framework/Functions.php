<?php

function strpos_arr($haystack, $needle) {

  if(!is_array($needle)) $needle = array($needle);
  foreach($needle as $char) {
      if(($pos = strpos($haystack, $char))!==false) return $pos;
  }
  return false;

}