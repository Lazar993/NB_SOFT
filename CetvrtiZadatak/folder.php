<?php
function printFunction($array) {
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}

function listAllFiles($dir) {
  $array = array_diff(scandir($dir), array('.', '..'));
 
  foreach ($array as &$item) {
    $item = $dir . $item;
  }
  unset($item);
  foreach ($array as $item) {
    if (is_dir($item)) {
     $array = array_merge($array, listAllFiles($item . DIRECTORY_SEPARATOR));
    }
  }
  return $array;
}

$dir = "test/";
$files = listAllFiles($dir);
printFunction($files);
?>