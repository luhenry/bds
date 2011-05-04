<?php

class bdsDumpDatabaseTask extends sfBaseTask {

    protected function configure() {
        // // add your own arguments here
        // $this->addArguments(array(
        //   new sfCommandArgument('my_arg', sfCommandArgument::REQUIRED, 'My argument'),
        // ));

        $this->addOptions(array(
            new sfCommandOption('application', null, sfCommandOption::PARAMETER_REQUIRED, 'The application name'),
            new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'dev'),
            new sfCommandOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'doctrine'),
                // add your own options here
        ));

        $this->namespace = 'bds';
        $this->name = 'db-dump';
        $this->briefDescription = '';
        $this->detailedDescription = <<<EOF
The [bdsDumpDatabase|INFO] task does things.
Call it with:

  [php symfony bdsDumpDatabase|INFO]
EOF;
    }

    protected function execute($arguments = array(), $options = array()) {
        // initialize the database connection
        $databaseManager = new sfDatabaseManager($this->configuration);
        $connection = Doctrine_Manager::connection($databaseManager->getDatabase($options['connection'])->getConnection());
        $file = fopen(sfConfig::get('sf_data_dir') . '/sql/dump.sql', 'w');

        foreach ($connection->import->listTables() as $table) {
            fwrite($file, "INSERT INTO dump.$table SELECT * FROM public.$table;\n");
        }

        fclose($file);
    }

}
