<?php

//error_reporting(E_ALL);
//ini_set("display errors", 1);

include_once "models/Page_Data.class.php";
$pageData = new Page_Data();
$pageData->title = "LotR LCG Quest Log";
$pageData->addCSS("css/layout.css");
$pageData->addScript("js/editor.js");
$pageData->content .= include_once "views/header.php";

$dbInfo = getenv("DATABASE_URL");
$dbUser = getenv("SENDGRID_USERNAME");
$dbPassword = getenv("SENDGRID_PASSWORD");

$db = new PDO($dbInfo, $dbUser, $dbPassword);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

include_once "models/User.class.php";
$user = new User();
$pageData->content .= include_once "controllers/login.php";

if ($user->isLoggedIn()) {
	$pageData->content .= include_once "views/navigation.php";
	if (isset($_GET['page'])) {
		$controller = $_GET['page'];
	} else {
		$controller = "quest-log";
	}
	$pageData->content .= include_once "controllers/$controller.php";
}
$pageData->content .= include_once "views/footer.php";
/*
//for editing purposes only
$pageData->content .= "</br>";
$pageData->content .= print_r($_SESSION, true);
$pageData->content .= "<p>SESSION</p>";
$pageData->content .= print_r($_POST, true);
$pageData->content .= "<p>POST</p>";
$pageData->content .= print_r($_GET, true);
$pageData->content .= "<p>GET</p>";
*/

$page = include_once "views/page.php";
echo $page;

?>