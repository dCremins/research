<?php
// Add all files in lib folder into array
$include = [
  '/cpt.php',       // Register Post Type 
];

// Require Once each file in the array
foreach ($include as $file) {
  if (!$filepath = (dirname( __FILE__ ) .$file)) {
    trigger_error(sprintf('Error locating %s for inclusion', $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);



?>
