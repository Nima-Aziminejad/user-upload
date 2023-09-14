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
        if (isset($this->options['file'])) {
            $file = $this->options['file'];
            if($this->fileFormatValidation($file)){
                $fileHandle = fopen($file, 'r');
                if($this->fileHeaderValidation($fileHandle)){

                }
            }
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
    private function fileFormatValidation($file)
    {
        $fileExtension = pathinfo($file, PATHINFO_EXTENSION);
        if (strtolower($fileExtension) !== 'csv') {
            $this->showError('Invalid file format. Please provide a CSV file.');
        }
        return true;
    }
    private function fileHeaderValidation($file){
        $headers = fgetcsv($file);
        if ($headers === false || count($headers) !== count($this->expectedHeaders) || array_diff($this->expectedHeaders,$headers) == []) {
            $this->showError('Invalid CSV file headers');
        }
        return true;
    }
}