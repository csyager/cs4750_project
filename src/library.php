<?php
	$SERVER = 'cs4750.cs.virginia.edu';
	if (isset($_SESSION['valid'])):
		if ($_SESSION['owner']) {
			$USERNAME = 'rfo8sf_d';
		} else {
			$USERNAME = 'rfo8sf_b';
		}
	else:
		$USERNAME = 'rfo8sf_a';
	endif;
	$PASSWORD = 'Ehooh7ee';
	$DATABASE = 'rfo8sf';
?>
