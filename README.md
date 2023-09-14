# CSV File Processing Tool

A versatile PHP script for processing CSV files and interacting with a MySQL database.
## Table of Contents
- Introduction
- Features
- Getting Started
    - Prerequisites
    - Installation
- Usage
    - Command-Line Flags
- Examples

## Introduction
The CSV File Processing Tool is a PHP script that simplifies the handling of CSV files and their interaction with a MySQL database.

## Features
- CSV File Handling: Easily process and validate CSV files.
- Database Interaction: Interact with a MySQL database for data storage.
- Customizable Flags: Use command-line flags to tailor script behavior.
- Data Validation: Ensure data integrity through various validation checks.
- Dry Run Support: Preview data processing without making changes to the database.

## Getting Started
Follow these steps to get started with the CSV File Processing Tool.

## Prerequisites
Before using this tool, ensure you have the following prerequisites installed:

- Ubuntu 22.04: Use an Ubuntu instance as your execution environment.
- PHP 8.1.x: Install PHP version 8.1.x on your Ubuntu instance.
- MySQL Database: Ensure you have a MySQL database server installed

## Installation
- Clone the repository

## Usage
To use the CSV File Processing Tool, run the script user_upload.php with the following command-line flags:

## Command-Line Flags
- -u: Specify the MySQL username.
- -p: Specify the MySQL password.
- -h: Specify the MySQL host.
- --file: Provide the path to the CSV file.
- --create_table: Create the necessary database table.
- --dry_run: Run a dry run without inserting data.
- --help: Display help and flag descriptions.

## Examples
Here are some examples of how to use the CSV File Processing Tool:
```
# Process a CSV file and insert data into the database
php user_upload.php -u username -p password -h localhost --file users.csv

# Create the database table without inserting data
php user_upload.php -u username -p password -h localhost --create_table

# Perform a dry run
php user_upload.php  --file users.csv --dry_run

# Display help and flag descriptions
php user_upload.php --help