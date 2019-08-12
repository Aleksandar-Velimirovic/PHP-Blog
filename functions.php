<?php

function redirectTo(string $location) : void {
    $root = 'http://localhost/projekat-blog/vivifyacademy-basic-blog-boilerplate';
    header("Location: {$root}/{$location}");
}

function redirectToHome() : void {
    redirectTo('');
    exit;
}

function getDatabaseConnection() {
    return $databaseConnection;
}

?>