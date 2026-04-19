<?php
require 'vendor/autoload.php';
use Aws\S3\S3Client;

$s3Client = new S3Client([
    'version' => 'latest',
    'region'  => 'us-east-2', 
    'credentials' => [
        'key'    => $_SERVER['AWS_ACCESS_KEY_ID'], 
        'secret' => $_SERVER['AWS_SECRET_ACCESS_KEY'],
    ],
]);

$bucketName = 'bytebazaar-asset-bucket'; 

// Define the base URL for your S3 bucket assets
$s3_base = "https://bytebazaar-asset-bucket.s3.us-east-2.amazonaws.com/";

// Use environment variables set in Elastic Beanstalk for security
$host = $_SERVER['RDS_HOSTNAME'];
$user = $_SERVER['RDS_USERNAME'];
$pass = $_SERVER['RDS_PASSWORD'];
$db   = $_SERVER['RDS_DB_NAME'];
$port = $_SERVER['RDS_PORT']; 

// Establish the connection
$con = mysqli_connect($host, $user, $pass, $db, $port);

// Check connection
if (!$con) {
    error_log("Database connection failed: " . mysqli_connect_error());
    die("A technical error occurred. Please try again later.");
}
?><?php

// Define the base URL for your S3 bucket assets
$s3_base = "https://bytebazaar-asset-bucket.s3.us-east-2.amazonaws.com/";

// Use environment variables set in Elastic Beanstalk for security
$host = $_SERVER['RDS_HOSTNAME'];
$user = $_SERVER['RDS_USERNAME'];
$pass = $_SERVER['RDS_PASSWORD'];
$db   = $_SERVER['RDS_DB_NAME'];
$port = $_SERVER['RDS_PORT']; // Usually 3306

// Establish the connection
$con = mysqli_connect($host, $user, $pass, $db, $port);

// Check connection
if (!$con) {
    // In production, avoid showing raw error messages to users for security
    error_log("Database connection failed: " . mysqli_connect_error());
    die("A technical error occurred. Please try again later.");
}
?>