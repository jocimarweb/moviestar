<?php

// Iniciar a Seção
session_start();

// URL BASE
// $BASE_URL = "http://" . $_SERVER["SERVER_NAME"] . dirname($_SERVER["REQUEST_URI"] . "?") . "/";

$BASE_URL = $_SERVER["SERVER_NAME"] . dirname($_SERVER["REQUEST_URI"] . "?") . "/";