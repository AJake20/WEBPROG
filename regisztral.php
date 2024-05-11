
USE `CoffeeShop`;
CREATE TABLE `felhasznalok` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `csaladi_nev` varchar(45) NOT NULL default '',
  `uto_nev` varchar(45) NOT NULL default '',
  `bejelentkezes` varchar(12) NOT NULL default '',
  `jelszo` varchar(40) NOT NULL default '',
  PRIMARY KEY  (`id`)
)
CREATE TABLE `commentek` (
  `sorszam` int(10) unsigned NOT NULL auto_increment,
  `fullname` varchar(45) NOT NULL default '',
  `email` varchar(45) NOT NULL default '',
  `comment` varchar(45) NOT NULL default '',
  PRIMARY KEY  (`sorszam`)
)

