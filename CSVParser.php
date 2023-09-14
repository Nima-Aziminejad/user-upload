<?php

class CSVParser
{
    private $options;
    private $description;
    private $host;
    private $username;
    private $password;
    private $connection;
    private $expectedHeaders = ['nima', 'surname', 'email'];

    public function __construct($options, $description)
    {
        $this->options = $options;
        $this->description = $description;
        $this->host = isset($this->options['h']) ? $this->options['h'] : 'localhost';
        $this->username = isset($this->options['u']) ? $this->options['u'] : 'root';
        $this->password = isset($this->options['p']) ? $this->options['p'] : '';
    }

    public function run()
    {
        if (isset($this->options['help'])) {
            $this->help();
        }
        $this->connectToDatabase();
        $this->connection->query("CREATE DATABASE IF NOT EXISTS parserDB");
        $this->connection->query("USE parserDB");
        if (isset($this->options['create_table'])) {
            $this->connection->query("CREATE TABLE IF NOT EXISTS users (
                                        name VARCHAR(255),
                                        surname VARCHAR(255),
                                        email VARCHAR(255) UNIQUE
                                )");
            $this->closeConnection();
            exit(0);
        }
    }
    private function help()
    {
        echo $this->description;
        exit(0);
    }
    private function connectToDatabase()
    {
        try {
            $this->connection = new mysqli($this->host, $this->username, $this->password);
        } catch (Exception $exception) {
            $this->showError($exception->getMessage());
        }
    }
    private function showError($msg)
    {
        fwrite(STDOUT, "Error: $msg\n");
        exit(1);
    }
    private function closeConnection()
    {
        $this->connection->close();
    }
}