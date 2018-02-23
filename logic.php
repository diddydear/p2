<?php
$friendsJson = file_get_contents('friends.json');

$friends = json_decode($friendsJson, true);


$haveResults = false;

//if (isset ($_GET ['searchMe'])) {
//    $searchMe = $_GET ['searchMe'];
//} else {
//    $searchMe = '';
//}
// Redone Downstairs

//For PHP 7
// $searchMe = $_GET ['searchMe'] ?? '';

$searchMe = isset ($_POST ['searchMe']) ? $searchMe = $_POST ['searchMe'] : '';
$loadMap = isset ($_POST ['loadMap']) ? $loadMap = $_POST ['loadMap'] : '';
$showData = isset  ($_POST ['showData']) ? $showData = $_POST ['showData'] : '';

if ($searchMe) {

    foreach ($friends as $location => $friend) {
        if (strtolower($location) != strtolower($searchMe)) {
            unset ($friends[$location]);
        }
    }
    if (count($friends) > 0) {
        $haveResults = true;
    }
}