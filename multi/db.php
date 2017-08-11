<?php

$host = "10.0.0.20";

$user = 'vagrant';
$pass = 'password';
$db = 'vagrant_intro';

try {
    $dbh = new PDO("mysql:dbname=$db;host=$host", $user, $pass);

    $table = 'users';

    $dbh->exec("DROP TABLE IF EXISTS $table;")
    or die(print_r($dbh->errorInfo(), true));

    showtables($dbh);

    $dbh->exec("CREATE TABLE $table(id int(10) unsigned auto_increment primary key, username varchar(255) not null);")
    or die(print_r($dbh->errorInfo(), true));

    showtables($dbh);

} catch (PDOException $e) {
    die("DB ERROR: ". $e->getMessage());
}

function showtables($connection) {
    $results = $connection->query('SHOW TABLES');
    foreach($results as $record) {
        echo $record['Tables_in_users'];
    }
}

?>