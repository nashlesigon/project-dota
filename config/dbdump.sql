-- phpMyAdmin SQL Dump
-- version 2.11.9.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 21, 2011 at 11:09 AM
-- Server version: 5.0.77
-- PHP Version: 5.1.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `dota_resource`
--

-- --------------------------------------------------------

--
-- Table structure for table `heroes`
--

CREATE TABLE IF NOT EXISTS `heroes` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `legend` varchar(100) NOT NULL,
  `image_filename` varchar(200) NOT NULL,
  `primary_attribute_id` int(10) unsigned NOT NULL COMMENT 'strength, agi or int',
  `intro` text,
  `background` text,
  `type_id` int(10) unsigned NOT NULL COMMENT 'melee or range',
  `affiliation_id` int(10) unsigned NOT NULL COMMENT 'sentinel or scourge',
  `basic_strength` int(10) unsigned NOT NULL,
  `basic_agility` int(10) unsigned NOT NULL,
  `basic_intelligence` int(10) unsigned NOT NULL,
  `add_strength` float unsigned NOT NULL,
  `add_agility` float unsigned NOT NULL,
  `add_intelligence` float unsigned NOT NULL,
  `hp` int(10) unsigned NOT NULL,
  `mana` int(10) unsigned NOT NULL,
  `min_damage` int(10) unsigned NOT NULL,
  `max_damage` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `heroes_to_hero_types` (`type_id`),
  KEY `heroes_to_hero_affiliations` (`affiliation_id`),
  KEY `heroes_to_primary_attributes` (`primary_attribute_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `heroes`
--

INSERT INTO `heroes` (`id`, `name`, `legend`, `image_filename`, `primary_attribute_id`, `intro`, `background`, `type_id`, `affiliation_id`, `basic_strength`, `basic_agility`, `basic_intelligence`, `add_strength`, `add_agility`, `add_intelligence`, `hp`, `mana`, `min_damage`, `max_damage`) VALUES
(1, 'King Leoric', 'Skeleton King', 'hero1_king_leoric.gif', 1, 'Despite the overall simplicity of the Skeleton King''s skills, he is one of the most dangerous close combat heroes to fight against, and he becomes extremely powerful when equipped with good items. Hellfire Blast is his one active spell, and it allows him to catch and kill enemies. Vampiric Aura and Critical Strike make him deadly in a straight fight; the Skeleton King hits hard and gains life with every attack. Even if Leoric seems to be destroyed, he is still not beaten. This is where his signature ability comes in: Reincarnation. As long as Reincarnation is ready and the Skeleton King has enough mana, he will revive where he fell after a few seconds at full strength. Reincarnation makes the Skeleton King very difficult to defeat, since you essentially have to kill him twice.', 'Once a noble knight protecting his kingdom, the man was thrown into Hell, where he was ripped apart over and over for centuries. Now, Lucifer has thrown him back onto the soil, corrupted and mindless, as King Leoric, the Skeleton King. He marches on, leading his minions with an unfaltering gaze, knowing only one thing: the orders given to him by the dark lord himself. Able to cripple his opponents by drawing power from the fiery depths of hell itself, King Leoric is a major threat on the battlefield. His mighty blade allows him and others in his presence to drain the blood of their enemies. It is said that he is unkillable, and those who are struck down by his hellfire don''t wake up again.', 1, 2, 22, 18, 13, 2.9, 1.7, 1.6, 568, 169, 54, 56),
(2, 'Kunkka', 'Admiral', 'hero2_kunkka.gif', 1, 'Daelin Proudmoore is a fearsome opponent in nearly any situation. His passive ability, Tidebringer, causes his sword to splash out massive damage over an area when he attacks, making him not only a constant threat in the lane, but a excellent damage dealer later in the game. Through the deadly combination of X Marks the Spot and Torrent, he can also pick off his fleeing enemies at will. He''s not at a loss in large team clashes either; His ultimate summons the legendary ship S.S. CoCo, which empowers his allies with rum and crashes into enemies, causing massive devastation. This ruthless admiral leaves none alive, least not dry!', 'Of all the allies in the Sentinel''s ranks, only one, is known by as many names and is feared in as many lands. Called Capt. CoCo by his mates, Jacksparrow by others, The Legendary Mariner by some, but only a select few know his real name and what it stands for. He can harness the powers of the depths to conjure torrential geysers that blast his enemies into the air. His elegant blade is sworn to the Seas and with each mighty swing it ebbs like the tides. Using a watery form of spacial magic, he can bring you back to your original destination. The Captain now sails towards the Scourge lands, aboard his Phantom vessel boosting the spirits of his comrades with his fabled Rum, paving the way for the victory of the Sentinel. He is Kunkka, Master and Commander of the seven seas.', 1, 1, 21, 14, 18, 2.7, 1.3, 1.5, 549, 234, 47, 57),
(3, 'Azwraith', 'Phantom Lancer', 'hero3_azwraith.gif', 2, 'The Phantom Lancer causes chaos and confusion by creating weaker clones of himself. All of his abilities allow him to summon more illusions. His Spirit Lance deals damage and slows an enemy, while also spawning an image at the target. Doppelwalk renders the Lancer invisible, but an image is immediately created to hide the fact that he disappeared. Juxtapose grants a chance to summon an image whenever he attacks, while Phantom Edge grants images a chance to do the same along with providing him and his copies spell resistance. These illusions make Azwraith a fearsome enemy, and a devastating pusher.', 'Although his true name is unknown to his allies, Azwraith''s assigned name tells you enough. Like the Angel of Death, Azrael, he fights to rid the world of those who choose to embrace undeath. He is able to appear and disappear at will like a wraith, often appearing in many places at once. Azwraith is more than capable of dispatching the undead using his lance, each blow sending them closer to the spirit-realm. This lance is the source of his astounding ability to duplicate himself; whenever it draws blood he can use their life to create weaker copies of himself.', 1, 1, 18, 23, 21, 1.7, 2.8, 2, 492, 273, 45, 67);

-- --------------------------------------------------------

--
-- Table structure for table `hero_affiliations`
--

CREATE TABLE IF NOT EXISTS `hero_affiliations` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `hero_affiliations`
--

INSERT INTO `hero_affiliations` (`id`, `name`) VALUES
(1, 'Sentinel'),
(2, 'Scourge');

-- --------------------------------------------------------

--
-- Table structure for table `hero_skills`
--

CREATE TABLE IF NOT EXISTS `hero_skills` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `hero_id` int(10) unsigned NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `order` tinyint(3) unsigned NOT NULL,
  `skill_type` varchar(45) NOT NULL COMMENT 'ACTIVE or PASSIVE',
  `hotkey` char(1) NOT NULL,
  `image_filename` varchar(200) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `hero_skills_to_heroes` (`hero_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `hero_skills`
--

INSERT INTO `hero_skills` (`id`, `hero_id`, `name`, `description`, `order`, `skill_type`, `hotkey`, `image_filename`) VALUES
(1, 1, 'Hellfire Blast', 'Ignites the target on fire, dealing damage over time. Stuns the target for a brief period followed by a movement speed reduction.', 1, 'ACTIVE', 'T', ''),
(2, 1, 'Vampiric Aura', 'Nearby friendly melee units gain hit points when they hit enemy units.', 2, 'PASSIVE', 'V', ''),
(3, 1, 'Critical Strike', 'Gives a chance to do more damage on an attack.', 3, 'PASSIVE', 'C', ''),
(4, 1, 'Reincarnation', 'When killed the Skeleton King will come back to life and slow enemies in a 700 aoe by 30% for 3 seconds.', 4, 'PASSIVE', 'R', ''),
(5, 2, 'Torrent', 'Using his unparalleled knowledge of the sea, Daelin is able to summon a blast of water at a targeted area. After 2 seconds a fierce torrent of water erupts from the ground, the stream blasting enemies caught in the AoE into the sky, dealing damage and slowing movement speed by 30%.', 1, 'ACTIVE', 'E', 'admiral-skill-0.jpg'),
(6, 2, 'Tidebringer', 'Daelin''s legendary sword Tidebringer is infused with the very power of the sea. Akin to the ebb and flow, Tidebringer passively grants the hero increased damage and large AoE cleave for a single strike every once in awhile.', 2, 'PASSIVE', 'D', 'admiral-skill-1.jpg'),
(7, 2, 'X Marks the Spot', 'In order to make an assembly for his troops, Admiral Proudmore targets a hero and marks its current position on the ground. After a few seconds, the hero will instantly return to the mark.', 3, 'ACTIVE', 'X', 'admiral-skill-2.gif'),
(8, 2, 'Ghost Ship', 'The admiral summons the mythical ghost ship S.S. CoCo to the battlefield. Allies are doused in Captain CoCo''s Rum, inebriating them for 10% bonus movespeed and numbness to incoming damage, causing them to feel only half of the pain now and half after the Rum wears off. Enemies, pirates and scurvy knaves are dashed on the rocks for damage and a brief stun when the ship crashes.', 4, 'ACTIVE', 'T', 'admiral-skill-3.gif');

-- --------------------------------------------------------

--
-- Table structure for table `hero_types`
--

CREATE TABLE IF NOT EXISTS `hero_types` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `hero_types`
--

INSERT INTO `hero_types` (`id`, `name`) VALUES
(1, 'Melee'),
(2, 'Range');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `image_filename` varchar(200) NOT NULL,
  `description` text,
  `additional_info` text NOT NULL,
  `strength` int(10) unsigned NOT NULL,
  `agility` int(10) unsigned NOT NULL,
  `intelligence` int(10) unsigned NOT NULL,
  `damage` int(10) unsigned NOT NULL,
  `armor` int(10) unsigned NOT NULL,
  `hp` int(10) unsigned NOT NULL,
  `mana` int(10) unsigned NOT NULL,
  `price` int(10) unsigned NOT NULL,
  `store_id` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `items_to_item_stores` (`store_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `image_filename`, `description`, `additional_info`, `strength`, `agility`, `intelligence`, `damage`, `armor`, `hp`, `mana`, `price`, `store_id`) VALUES
(1, 'Sange and Yasha', 'sange_yasha.jpg', 'Sange and Yasha, when attuned by the moonlight of Tir''nogth and used together, become a very powerful combination.', 'Movespeed and attack speed bonus does not stack with Yasha, Sange and Yasha, or Manta Style. Gives a 15% chance on attack to slow movement speed and attack speed by 30% for 4 seconds', 16, 16, 0, 12, 0, 0, 0, 4300, 5),
(2, 'Sange', '', 'Sange is an unusually accurate weapon. Magically intelligent, it seeks weak points automatically.', 'Gives a 15% chance on attack to slow movement speed and attack speed by 20% for 4 seconds', 16, 0, 0, 10, 0, 0, 0, 700, 5),
(3, 'Yasha', '', 'Yasha is regarded as the swiftest weapon ever created. The few that have wielded it say that it has no weight whatsoever.', 'Movespeed and attack speed bonus does not stack with Yasha, Sange and Yasha, or Manta Style.', 0, 16, 0, 0, 0, 0, 0, 700, 5),
(4, 'Blade of Alacrity', '', 'A long blade imbued with time magic', '', 0, 10, 0, 0, 0, 0, 0, 1000, 9),
(5, 'Boots of Elvenskin', '', 'A pair of boots often used for moonwalking', '', 0, 6, 0, 0, 0, 0, 0, 450, 9),
(6, 'Ogre Axe', '', 'You feel tougher just by holding it!', '', 10, 0, 0, 0, 0, 0, 0, 1000, 9),
(7, 'Belt of Giant Strength', '', 'Not recommended for use by children or pregnant women', 'Buyable from Goblin Merchant', 6, 0, 0, 0, 0, 0, 0, 450, 9),
(9, 'Perserverance', '', 'Test', 'Test', 0, 0, 0, 10, 0, 0, 0, 0, 7),
(11, 'Test', '780882af55870cbae58d7d02bfeb5f1f66617dee.gif', '', 'Test', 0, 0, 0, 0, 0, 0, 0, 0, 8);

-- --------------------------------------------------------

--
-- Table structure for table `item_recipes`
--

CREATE TABLE IF NOT EXISTS `item_recipes` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `item_id` int(10) unsigned NOT NULL,
  `parent_id` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `item_recipes_to_items` (`item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `item_recipes`
--

INSERT INTO `item_recipes` (`id`, `item_id`, `parent_id`) VALUES
(1, 2, 6),
(2, 2, 7),
(3, 2, 2),
(4, 3, 4),
(5, 3, 5),
(6, 3, 3),
(7, 1, 2),
(8, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `item_stores`
--

CREATE TABLE IF NOT EXISTS `item_stores` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `item_stores`
--

INSERT INTO `item_stores` (`id`, `name`) VALUES
(1, 'Protectorate'),
(2, 'Arcane Sanctum'),
(3, 'Supportive Vestments'),
(4, 'Ancient Weaponry'),
(5, 'Enchanted Artifacts'),
(6, 'Gateway Relics'),
(7, 'Cache of Quel-thelan'),
(8, 'Ancient of Wonders'),
(9, 'Sena the Accesorizer'),
(10, 'Weapon Dealer'),
(11, 'Leragas the Vile');

-- --------------------------------------------------------

--
-- Table structure for table `primary_attributes`
--

CREATE TABLE IF NOT EXISTS `primary_attributes` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(45) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `primary_attributes`
--

INSERT INTO `primary_attributes` (`id`, `name`) VALUES
(1, 'Strength'),
(2, 'Agility'),
(3, 'Intelligence');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `heroes`
--
ALTER TABLE `heroes`
  ADD CONSTRAINT `heroes_to_hero_types` FOREIGN KEY (`type_id`) REFERENCES `hero_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `heroes_to_hero_affiliations` FOREIGN KEY (`affiliation_id`) REFERENCES `hero_affiliations` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `heroes_to_primary_attributes` FOREIGN KEY (`primary_attribute_id`) REFERENCES `primary_attributes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `hero_skills`
--
ALTER TABLE `hero_skills`
  ADD CONSTRAINT `hero_skills_to_heroes` FOREIGN KEY (`hero_id`) REFERENCES `heroes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_to_item_stores` FOREIGN KEY (`store_id`) REFERENCES `item_stores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `item_recipes`
--
ALTER TABLE `item_recipes`
  ADD CONSTRAINT `item_recipes_to_items` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
