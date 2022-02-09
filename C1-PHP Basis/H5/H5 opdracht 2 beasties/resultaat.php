<?php
	if(isset($_POST['dier'])) {
		foreach($_POST['dier'] as $dier) {
			if ($dier=="rat") echo "<img src='img/rat.gif' style='width: 20%'>";
			if ($dier=="vogel") echo "<img src='img/bird.jpeg' style='width: 20%'>";
			if ($dier=="god") echo "<img src='img/god.png' style='width: 20%'>";
		}
	} else{
		header("Location: index.html");
        exit();
	}