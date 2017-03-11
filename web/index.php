<?php
	define("ROOT_DIRECTORY", __dir__."/../");

	//requires the application framework components
	require_once ROOT_DIRECTORY."vendor/autoload.php";

	//load the application services
	require ROOT_DIRECTORY."src/core/services/ServicesLoader.php";

	//load the application controllers
	require ROOT_DIRECTORY."src/core/controllers/ControllersLoader.php";

	//build the application and return the instance
	$app = require ROOT_DIRECTORY."src/app.php";

	//mount the application http controllers
	require ROOT_DIRECTORY."src/mount-controllers.php";

	//run the application
	$app->run();