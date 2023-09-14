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
}