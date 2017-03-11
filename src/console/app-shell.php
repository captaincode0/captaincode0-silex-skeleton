<?php
	// Copyright (C) 2017  captaincode
	
	// This program is free software: you can redistribute it and/or modify it
	// under the terms of the GNU General Public License as published by the Free
	// Software Foundation, either version 3 of the License, or (at your option)
	// any later version.
	
	// This program is distributed in the hope that it will be useful, but WITHOUT
	// ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or
	// FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for
	// more details.
	
	// You should have received a copy of the GNU General Public License along
	// with this program.  If not, see <http://www.gnu.org/licenses/>.
	// 

 	require_once __dir__."/../../vendor/autoload.php";
 	require_once __dir__."/SetUpCommand.php";

 	use Symfony\Component\Console\Application;
 	use Captaincode0\Console\SetUpCommand;

 	$console_app = new Application();
 	$console_app->add(new SetUpCommand());
 	$console_app->run();