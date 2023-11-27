<?php require "./config.php"; ?>
<?php

if (isset($_GET["view"])) {

	$view = filter_input(INPUT_GET, "view");

	if (empty($view)) {

		require "./resources/view/home.php";
	} else {

		if (file_exists("./resources/view/" . $view . ".php")) {

			require "./resources/view/" . $view . '.php';
		} else {

			require "./resources/view/404.php";
		}
	}
} else {

	require "./resources/view/home.php";
}
