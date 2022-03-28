<?php
	include 'db.php';
	$initialquery = "SELECT * FROM ProductDetailView Where ProductID = :tempid";
	$longproduct = $mypdo->prepare($initialquery);
	$longproduct->bindParam(':tempid', $_POST['searchedid']);
	$longproduct->execute();
	$presult = $longproduct->fetch();
	echo json_encode($presult);
?>