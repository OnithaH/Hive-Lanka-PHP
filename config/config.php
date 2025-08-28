<?php
// ==============================
// Hive Lanka - Global Config
// ==============================

// ---- Base URL ----
// If your project is at domain root -> "/"
// If it's inside a folder -> "/hivelanka"
define("BASE_URL", "/hivelanka");

// ---- Site Information ----
$site_name = "Hive Lanka";

// ---- Timezone ----
date_default_timezone_set("Asia/Colombo");

// ---- Session Handling ----
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// ---- Language (Multilingual Support) ----
// Default language = English
if (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = "en";
}
?>
