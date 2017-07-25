<?php

try {
  // Connect and create the PDO object
  $conn = new \PDO(
		'mysql:host=db;dbname=site',
		'siteRoot',
		'siteRootPass'
	);
  $conn->exec("SET CHARACTER SET utf8");      // Sets encoding UTF-8
  

  // Define an insert query
  $sql = "select * from 'sites'";
  $count = $conn->exec($sql);

  $conn = null;        // Disconnect
}
catch(PDOException $e) {
  echo $e->getMessage();
}

// If data added ($count not false) displays the number of rows added
if($count !== false) echo 'Number of rows added: '. $count;
?>