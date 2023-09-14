<?php
$shortOptions = "u:p:h:";
$longOptions = ["file:","create_table","dry_run","help"];
$flagDescription = <<<PHP_EOL
Script Flags:
1. --file [csv file name]:
     Name of the CSV file to be parsed.
     Example Usage: php script.php --file [csv file name]
2. --create_table:
     Build the MySQL users table and exit.
     Example Usage: php script.php --create_table
3. --dry_run:
     Run the script without inserting into the DB.
     Example Usage: php script.php --file [csv file name] --dry_run
4. -u [MySQL username]:
     Specifies the MySQL username to be used for database access.
5. -p [MySQL password]:
     Specifies the MySQL password to be used for database access.
6. -h [MySQL host]:
     Specifies the MySQL host to be used for database access.
7. --help:
     Displays help information.
     Example Usage: php script.php --help
PHP_EOL;
