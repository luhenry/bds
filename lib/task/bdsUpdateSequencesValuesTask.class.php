<?php

class bdsUpdateSequencesValuesTask extends sfBaseTask {

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
        $this->name = 'update-sequences-values';
    }

    protected function execute($arguments = array(), $options = array()) {
        $databaseManager = new sfDatabaseManager($this->configuration);
        $connection = $databaseManager->getDatabase($options['connection'])->getConnection();

        foreach (Doctrine_Manager::connection($connection)->import->listTables() as $table) {
            try {
            if (in_array('id', array_keys(@Doctrine_Manager::connection()->import->listTableColumns($table)))) {
                $max = $connection->query("SELECT MAX(id) FROM $table")->fetchColumn();

                if ($max != null)
                    $connection->exec("SELECT setval('{$table}_id_seq', $max)");

                $this->logSection('done', $table);
            }
            } catch (Exception $e) {
                $this->logSection('error', "$table : {$e->getMessage()}");
            }
        }
    }

}
