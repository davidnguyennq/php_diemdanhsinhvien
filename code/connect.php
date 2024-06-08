<?php 
include 'config.php';
try {
    $conn = new PDO('mysql:host='.servername.';dbname='.db, username, password);
    $conn->query('set names utf8');
    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
  }