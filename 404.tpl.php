<?php
$ablakcim = array(
    'cim' => 'Coffee Shop',
);

$oldalak = array(
	'/' => array('fajl' => 'cimlap', 'szoveg' => 'Címlap', 'menun' => array(1,1)),
	'bemutatkozas' => array('fajl' => 'bemutatkozas', 'szoveg' => 'Bemutatkozás', 'menun' => array(1,1)),
	'kapcsolat' => array('fajl' => 'kapcsolat', 'szoveg' => 'Kapcsolat', 'menun' => array(1,1)),
    'comment' => array('fajl' => 'comment', 'szoveg' => 'Comment', 'menun' => array(1,1)),
    'commentek' => array('fajl' => 'comment', 'szoveg' => 'Comment', 'menun' => array(0,0)),
    'tablazat' => array('fajl' => 'tablazat', 'szoveg' => 'Táblázat', 'menun' => array(0,1)),
    'belepes' => array('fajl' => 'belepes', 'szoveg' => 'Belépés', 'menun' => array(1,0)),
    'kilepes' => array('fajl' => 'kilepes', 'szoveg' => 'Kilépés', 'menun' => array(0,1)),
    'belep' => array('fajl' => 'belep', 'szoveg' => '', 'menun' => array(0,0)),
    'regisztral' => array('fajl' => 'regisztral', 'szoveg' => '', 'menun' => array(0,0))
);

$hiba_oldal = array ('fajl' => '404', 'szoveg' => 'A keresett oldal nem található!');

$database = array (
    'host' => 'api.uniassist.hu',
    'username' => "CoffeeShop",
    'password' => '[h/VDTMfsEJ_1H@E',
    'database' => 'CoffeeShop'
);
?>
