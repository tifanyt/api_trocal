-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 04, 2019 at 12:51 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `api_trocal`
--

-- --------------------------------------------------------

--
-- Table structure for table `evaluations`
--

CREATE TABLE `evaluations` (
  `id` int(11) NOT NULL,
  `assessor_id` int(11) NOT NULL,
  `evaluated_id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `note` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `uder_id` int(11) NOT NULL,
  `state` enum('new','opened') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new',
  `type_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `objects`
--

CREATE TABLE `objects` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `key_words` text COLLATE utf8mb4_unicode_ci,
  `category` enum('home','clothes','high-tech','deco','hobbies','children','other') COLLATE utf8mb4_unicode_ci NOT NULL,
  `zone` int(11) NOT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` enum('available','reserved','unavailable','') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'available',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `objects`
--

INSERT INTO `objects` (`id`, `user_id`, `title`, `description`, `key_words`, `category`, `zone`, `photo`, `state`, `created_at`, `updated_at`) VALUES
(2, 1, 'Pull en laine blanc cassé', 'J\'ai tricoté ce pull parmi une dizaine d\'autres l\'hiver dernier mais je ne l\'ai porté qu\'une seule fois.', 'pull,laine,tricot,hiver', 'clothes', 94, 'https://res.cloudinary.com/dd1g42791/image/upload/v1547129698/clothing-3831823_1280.jpg,https://res.cloudinary.com/dd1g42791/image/upload/v1547129697/fabric-3709238_1280.jpg', 'available', '2019-01-10 13:54:20', '2019-04-21 13:27:16'),
(3, 4, 'Table basse en chêne', 'Cette magnifique table basse en chêne doit disparaître de mon salon car je refait la déco :) Elle a une petite égratignure sur un des pieds mais sinon elle est encore en parfait état !', 'table,basse,bois,chêne,déco', 'deco', 34, 'https://res.cloudinary.com/dd1g42791/image/upload/v1547130328/photo-1461418559055-6f020c5a91e7.jpg', 'available', '2019-01-10 14:34:01', NULL),
(4, 1, 'Paire de Timberland basse T 43', 'Paire de Timberland en cuir taille 43. Portées deux fois et encore en parfait état.\r\nJ\'ai encore la boîte si vous le souhaitez.', 'chaussures,cuir,timberland, marron', 'clothes', 94, 'https://res.cloudinary.com/dd1g42791/image/upload/v1547211343/leather-shoes-505338_1280.jpg,https://res.cloudinary.com/dd1g42791/image/upload/v1547211343/shoes-505341_1280.jpg,https://res.cloudinary.com/dd1g42791/image/upload/v1547211343/shoelace-505344_1280.jpg,https://res.cloudinary.com/dd1g42791/image/upload/v1547211343/shoe-505365_1280.jpg', 'available', '2019-01-11 12:56:18', NULL),
(5, 4, 'Mug blanc à message', 'Mug blanc basique avec message en anglais.\r\nJamais utilisé donc pas de trace de café au fond, promis :D', 'mug,tasse,blanc', 'home', 34, 'https://res.cloudinary.com/dd1g42791/image/upload/v1547211911/photo-1542556398-9e1da7ad3669.jpg', 'available', '2019-01-11 13:06:14', NULL),
(6, 4, 'Vélo rétro', 'Vélo rétro toujours en bon état de marche car bien entretenu.\r\nJe l\'ai remplacé par un nouveau VTT flambant neuf il ne m\'est donc plus d\'aucune utilité et dors dans mon garage.', 'vélo,rétro,vtt', 'hobbies', 34, 'https://res.cloudinary.com/dd1g42791/image/upload/v1547212128/bicycle-789648_1280.jpg', 'available', '2019-01-11 13:09:50', NULL),
(7, 5, 'Guitare acoustique', 'Je me sépare de ma guitare dans l\'espoir qu\'elle trouve un propriétaire qui l\'apprécie à sa juste valeur !\r\n\r\nOn me l\'a offert il y a 3 ans et elle n\'a jamais été utilisée intensivement.', 'guitare,musique,acoustique,folk', 'hobbies', 77, 'https://res.cloudinary.com/dd1g42791/image/upload/v1547212903/photo-1531907933630-126f527982d4.jpg', 'available', '2019-01-11 13:21:53', NULL),
(8, 1, 'Lot de cahiers', 'Je laisse ce lot de cahier idéals pour prendre des notes ou faire un bullet journal par exemple !', 'cahier,bullet journal', 'hobbies', 94, 'https://res.cloudinary.com/dd1g42791/image/upload/v1547216026/photo-1531615018523-12556603349f.jpg,https://res.cloudinary.com/dd1g42791/image/upload/v1547216026/photo-1471970471555-19d4b113e9ed.jpg', 'available', '2019-01-11 14:14:43', '2019-04-04 12:50:48'),
(9, 7, 'Cendrier en terre cuite', 'Cendrier ramené du Maroc lors de mon voyage en 2018. Jamais servi.', 'cendrier,maroc,terre cuite', 'home', 75, 'https://res.cloudinary.com/dd1g42791/image/upload/v1547129697/ashtray-2581249_1280.jpg', 'available', '2019-04-21 14:09:34', NULL),
(10, 7, 'Valise d\'époque', 'Cette vieille valise (bien conservée) m\'encombre et je n\'aimerais pas la jeter. Elle est en cuir et encore en bon état.', 'valise,cuir,époque,marron', 'other', 75, 'https://res.cloudinary.com/dd1g42791/image/upload/v1555856141/luggage-2420316_1280.jpg', 'available', '2019-04-21 14:17:16', NULL),
(11, 7, 'Casque Razor E32', 'Casque Razor E32 blanc en très bon état. Je le propose au troc car on m\'en a offert un neuf et je trouve dommage de le laisser prendre la poussière !', 'casque,razor,blanc,gaming', 'hobbies', 75, 'https://res.cloudinary.com/dd1g42791/image/upload/v1555856434/headset-1377194_1280.jpg', 'available', '2019-04-21 14:22:08', NULL),
(12, 7, 'Coussin \"Love\'', 'Coussin en lin imprimé rouge \"Love\".', 'coussin,love,rouge,lin,déco', 'deco', 75, 'https://res.cloudinary.com/dd1g42791/image/upload/v1555856642/love-115878_1280.jpg', 'available', '2019-04-21 14:24:59', NULL),
(13, 7, 'Montre Festina', 'Je souhaiterais me débarrasser de cette montre. C\'était un cadeau, je ne l\'ai porté que deux fois.', 'montre,festina,marron', 'clothes', 75, 'https://res.cloudinary.com/dd1g42791/image/upload/v1555856924/wristwatch-407096_1280.jpg', 'available', '2019-04-21 14:29:21', NULL),
(14, 7, 'Lot de 3 cadres photos', '3 cadres photos en bois foncé format A5', 'cadres,photos,bois,a5', 'deco', 75, 'https://res.cloudinary.com/dd1g42791/image/upload/v1555858341/photo-1550535424-fd4382da050c.jpg', 'available', '2019-04-21 14:53:43', NULL),
(15, 4, 'Bicyclette rouge', 'Bicyclette rouge parfaitement entretenue ! Les freins étaient vieux mais je les ai changé récemment.', 'vélo,rouge,bicyclette,rétro', 'hobbies', 94, 'https://res.cloudinary.com/dd1g42791/image/upload/v1555858550/photo-1545897287-43e47ad2d0c4.jpg', 'available', '2019-04-21 14:57:14', NULL),
(16, 7, 'Gameboy color vert pomme', 'Donnée sans piles et sans jeux !', 'gameboy color,gameboy,vert', 'hobbies', 75, 'https://res.cloudinary.com/dd1g42791/image/upload/v1555858989/photo-1525799894461-3cfe39b72d69.jpg', 'available', '2019-04-21 15:05:19', NULL),
(17, 5, 'Lots de livres sur l\'entrepreunariat en anglais', 'Livres : Zero to one de Peter Thiel, Ego is the enemy et The obstacle is the way de Ryan Holiday, The Startup owner manual de Steve Blank et The Corporate startup.', 'livres,anglais,entrepreunariat', 'hobbies', 34, 'https://res.cloudinary.com/dd1g42791/image/upload/v1556023423/photo-1512820790803-83ca734da794.jpg', 'available', '2019-04-23 10:46:59', '2019-04-23 10:46:59'),
(18, 1, 'Bottes de pluie enfant T30', 'Je donne les bottes de pluie rouges de ma fille qui ne lui vont plus. Portées une seule fois !', 'bottes,pluie,rouge', 'clothes', 77, 'https://res.cloudinary.com/dd1g42791/image/upload/v1556024036/photo-1554569409-f5ac433e0f67.jpg', 'available', '2019-04-23 10:54:06', '2019-04-23 10:54:06'),
(19, 1, 'Paire de lunettes de soleil Rayban', 'Paire de lunette de soleil noires unisexe de la marque Rayban. Très bon état.', 'lunettes,soleil,noir,rayban', 'clothes', 77, 'https://res.cloudinary.com/dd1g42791/image/upload/v1556024231/photo-1550160115-c501a3601697.jpg', 'available', '2019-04-23 10:58:02', '2019-04-23 10:58:02'),
(20, 5, 'Lot de décorations de Noël', 'Je change toutes mes décorations de Noël du coup je donne celles que je n\'utiliserai plus. Tout est à prendre ensemble.', 'noel,décoration,xmas', 'deco', 34, 'https://res.cloudinary.com/dd1g42791/image/upload/v1556025555/photo-1511795617213-5dda68cf4d19.jpg,https://res.cloudinary.com/dd1g42791/image/upload/v1556025562/photo-1478676584648-9f4e1f30ec1c.jpg,https://res.cloudinary.com/dd1g42791/image/upload/v1556025655/photo-1547275870-de097f0cea8f.jpg,https://res.cloudinary.com/dd1g42791/image/upload/v1556025659/photo-1548687085-41af45027f9b.jpg', 'available', '2019-04-23 12:02:51', '2019-04-23 12:02:51'),
(21, 1, 'Tote bag à motifs', 'Sac en toile à motifs. Assez grand pour y rentrer un ordinateur 13\".', 'totebag,sac,toile,motif', 'other', 77, 'https://res.cloudinary.com/dd1g42791/image/upload/v1556029366/photo-1525708570275-58d59ffe4a93.jpg', 'available', '2019-04-23 12:23:40', '2019-04-23 12:23:40'),
(22, 4, 'Lot de cintres en bois', 'J\'ai environs une 50ène de cintres en bois dont je ne me sers pas, je les donne tous !', 'cintres,bois,rangement', 'other', 94, 'https://res.cloudinary.com/dd1g42791/image/upload/v1556029514/photo-1495915607559-a3fa60cd7ffd.jpg', 'available', '2019-04-23 12:25:19', '2019-04-23 12:25:19'),
(23, 1, '3 petites plantes dans leur pots', 'Je donne ces 3 plantes grasses et leur pot. Pas besoin de beaucoup d\'entretien, juste un peu de lumière et quelques gouttes d\'eau de temps en temps !', 'plantes,grasses,pot', 'home', 77, 'https://res.cloudinary.com/dd1g42791/image/upload/v1556030052/photo-1527642220350-24155bae0505.jpg', 'available', '2019-04-23 12:35:33', '2019-04-23 12:35:33');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `buyer_object_id` int(11) DEFAULT NULL,
  `seller_object_id` int(11) NOT NULL,
  `state` enum('pending','accepted','completed','aborted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `alternative_message` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `buyer_id`, `seller_id`, `buyer_object_id`, `seller_object_id`, `state`, `alternative_message`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 3, 2, 'accepted', NULL, '2019-03-13 12:56:11', '2019-03-13 13:27:44'),
(2, 3, 1, NULL, 5, 'pending', NULL, '2019-03-13 12:56:35', '2019-03-13 12:56:35');

-- --------------------------------------------------------

--
-- Table structure for table `type_notification`
--

CREATE TABLE `type_notification` (
  `id` int(11) NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci,
  `avatar` text COLLATE utf8mb4_unicode_ci,
  `post_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `remember_token`, `phone`, `bio`, `avatar`, `post_code`, `zone`, `note`, `created_at`, `updated_at`, `admin`) VALUES
(1, 'Madeleine', 'Yu', 'madeleine.yu@gmail.com', NULL, '$2y$10$8Ihqf687pR4nNIh..ZdoYuaUZ.KOApuIO9QJs7hjxr.OvBXhGYphK', NULL, '0600667788', 'J\'adore l\'espace et les étoiles.', 'https://res.cloudinary.com/dd1g42791/image/upload/v1548771920/photo-1534382929438-1becd923b203.jpg', '77500', '77', 8, '2019-01-29 12:50:54', '2019-04-04 11:17:02', 0),
(4, 'Joni', 'Weiss', 'joni.weiss@gmail.com', NULL, '$2y$10$n0fXWmdK8oHe.b..q7nTzOBY7EpfHI4TcvjGsAs3sr4Dl1wADpipK', NULL, '0600667788', 'Je ne vis que pour le DIY.', 'https://res.cloudinary.com/dd1g42791/image/upload/v1548772292/photo-1546670134-543b1cdcb3ff.jpg', '94600', '94', NULL, '2019-01-29 13:37:00', '2019-01-29 13:37:00', 0),
(5, 'Aurora', 'King', 'aurora.king@gmail.com', NULL, '$2y$10$JMKflvju.zknEcTk7S1MSeqm8aNoTr1IwasWpV91KhTdKkd5xWPR.', NULL, '0600667788', 'Je veux sauver la planète !', 'https://res.cloudinary.com/dd1g42791/image/upload/v1548772462/photo-1548243609-95309388dff0.jpg', '34750', '34', 7, '2019-01-29 13:37:46', '2019-01-29 13:37:46', 0),
(7, 'Hassan', 'Mueller', 'hassan@mueller.com', NULL, '$2y$10$cl5jNptyUZv4wn8mvLo4EeNR.zC4a163IIsums9M0cELnUcAftd8O', NULL, NULL, 'J\'aime collectionner les aquarelles en rapport avec la mer.', 'https://res.cloudinary.com/dd1g42791/image/upload/v1554385484/photo-1530268729831-4b0b9e170218.jpg', '75020', '75', NULL, '2019-04-04 11:53:59', '2019-04-04 13:01:24', 0),
(11, '', '', 'admin@admin.fr', NULL, '$2y$10$zyLKjzya1puZRUP/4ye6g.b1oDLb5lGUYOULl0dKSjY.0ZvGqmyji', NULL, NULL, '', '', '', '', NULL, '2019-06-04 10:47:09', '2019-06-04 10:47:09', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `evaluations`
--
ALTER TABLE `evaluations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `objects`
--
ALTER TABLE `objects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_notification`
--
ALTER TABLE `type_notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `evaluations`
--
ALTER TABLE `evaluations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `objects`
--
ALTER TABLE `objects`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `type_notification`
--
ALTER TABLE `type_notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
