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
	
	namespace Captaincode0\Console;

	use Symfony\Component\Console\Command\Command;
	use Symfony\Component\Console\Input\InputInterface;
	use Symfony\Component\Console\Input\InputOption;
	use Symfony\Component\Console\Output\OutputInterface;


	/**
	 * @class Common class that represents a setup command to create the project
	 * @classdesc this class allows to create the base of one Silex project
	 */
	class SetUpCommand extends Command{
		/**
		 * @ineritdoc
		 */
		protected function configure(){
			$this
				->setName("project:setup")
				->setDescription("This shells create the Silex application base")
				->setProcessTitle("app-shell-setup")
				->addOption(
					"create",
					null,
					InputOption::VALUE_NONE
				);
		}

		/**
		 * @ineritdoc
		 */
		protected function execute(InputInterface $input, OutputInterface $output){
			$output->writeln("<info>Captaincode0 Set Up Silex Project Console</info>");

			if($input->getOption("create")){
				$output->writeln("<comment>[+] Creating folders var/log var/cache </comment>");
				system("mkdir -p var/log var/cache");

				$output->writeln("<info>[-] Setting permissions using the system ACL</info>");
				system("setfacl -R -m u:www-data:rwx var/log var/cache");
				system("setfacl -R -d -m u:www-data:rwx var/log var/cache");
				system("setfacl -R -m u:`whoami`:rwx var/log var/cache");
				system("setfacl -R -d -m u:`whoami`:rwx var/log var/cache");
				system("setfacl -R -m mask:rwx var/log var/cache");
				system("setfacl -R -d -m mask:rwx var/log var/cache");
				
				$output->writeln("<comment>[+] Creating folder web/assets</comment>");
				system("mkdir -p web/assets");

				$output->writeln("<comment>[+] Creating folder web/assets/libs</comment>");
				system("mkdir -p web/assets/libs");

				$output->writeln("<comment>[+] Creating folder web/assets/img</comment>");
				system("mkdir -p web/assets/img");
			}
		}
	}

