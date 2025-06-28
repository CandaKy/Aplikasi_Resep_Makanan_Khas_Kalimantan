SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id_menu` int NOT NULL AUTO_INCREMENT COMMENT 'ID menu',
  `nama_menu` varchar(100) CHARACTER SET utf32 COLLATE utf32_estonian_ci NOT NULL COMMENT 'Nama menu',
  `id_wilayah` int NOT NULL COMMENT 'ID wilayah',
  `bahan` text CHARACTER SET utf32 COLLATE utf32_estonian_ci NOT NULL COMMENT 'Resep bahan',
  `bahan_halus` text CHARACTER SET utf32 COLLATE utf32_estonian_ci NOT NULL COMMENT 'Resep bumbu',
  `cara_membuat` text CHARACTER SET utf32 COLLATE utf32_estonian_ci NOT NULL COMMENT 'Cara membuat',
  `foto` varchar(100) CHARACTER SET utf32 COLLATE utf32_estonian_ci NOT NULL COMMENT 'Foto masakan',
  PRIMARY KEY (`id_menu`),
  KEY `id_wilayah` (`id_wilayah`)
) ENGINE=MyISAM DEFAULT CHARSET=utf32 COLLATE=utf32_estonian_ci;

INSERT INTO `menu` (`id_menu`, `nama_menu`, `id_wilayah`, `bahan`, `bahan_halus`, `cara_membuat`, `foto`) VALUES
(1,	'Kepiting Soka Telur Asin',	2,	' - 5 ekor kepiting soka.\r\n- 4 butir kuning telur asin.\r\n- 3 sdm tepung terigu.\r\n- 3 sdm tepung tapioka. ',	' - daun kari.\r\n- garam.\r\n- susu kental manis.\r\n- susu UHT atau fresh milk.\r\n- air.\r\n- kaldu jamur.\r\n- 1/2 sdm minyak wijen.\r\n- 1 sdt garam.\r\n- 1/2 sdt kaldu jamur\r\n- 1/2 sdt lada.\r\n- 1 butir telur.\r\n- 2 sdm tepung tapioka.\r\n- 1/2 sdt baking soda. ',	' 1. Marinasi kepiting dengan bahan marinasi selama 15 \r\n   menit, masukkan kulkas. Gulingkan ke bahan tepung \r\n   kering dan goreng.\r\n\r\n2. Masak kuning telur asin, hancurkan sambil diaduk. \r\n   Masukkan daun kari, aduk rata.\r\n\r\n3. Masukkan semua sisa bahan kecuali air.\r\n\r\n4. Masukkan kepiting soka goreng. Aduk rata. ',	'Kepiting soka telur asin.jpg'),
(2,	'Soto Banjar',	4,	'   - 800 gram dada ayam.\r\n- 5 bunga lawang.\r\n- 7 cengkeh.\r\n- 1 kayu manis\r\n- 1/2 biji pala.\r\n- lada bubuk.\r\n- garam.\r\n- gula.   ',	' - 12 bawang merah.\r\n- 6 bawang putih.\r\n- 3 kemiri goreng.\r\n- 3 cm jahe.\r\n- 2 sdm kentang rebus dihaluskan.\r\n- 1 sdm susu bubuk.\r\n   ',	' 1. Cuci ayam lalu rebus sampai setengah matang.\r\n\r\n2. Tumis bumbu halus sampai wangi, masukkan rempah bunga lawang, pala, cengkeh, dan kayu manis.\r\n\r\n3. Masukkan tumisan bumbu ke rebusan ayam. Beri garam, gula, dan lada bubuk. Angkat ayam taruh di wadah, suwir-suwirkan.\r\n\r\n4. Masukkan bumbu tambahan ke panci rebusan, aduk rata. Masukkan bawang putih goreng halus. Aduk rata lalu matikan api.   ',	'Soto banjar.jpg'),
(3,	'Sambal Raja',	2,	' - 1 buah Terong.\r\n- 5 kacang panjang.\r\n- 10 bawang merah belah 4.\r\n- 1-2 buah jeruk limau, iris kulit luarnya. Lalu belah 2.\r\n- 1/2 sdt Garam/selera.\r\n- 1 sdm gula pasir.\r\n ',	' - 4 cabe merah kriting.\r\n- 2 cabe merah besar, buang biji+3 sdm minyak.\r\n- 1 sdt terasi.\r\n- 1 sdm minyak untuk tumis. ',	' 1. Siapkan bahanIris kulit limau.Blender cabe+ terasi+ 3 sdm minyak.\r\n\r\n2. Kukus sebentar terong, kacang panjang serta bawang merah atau Saya pakai panci Salad Master, hanya pakai air 40- 5o ml untuk rebus. Bunyi klik. Buka pancinya. Tiriskan Tumis cabe halus. aduk sampai harum..masukkan terong, kacang panjang, bawang merah, irisan kulit limau, garam, gula..aduk rata. Kireksi rasa. Matikan kompor\r\nTerakhir beri perasan air limau.\r\nAduk lagi. ',	'Sambal raja.jpg');

DROP TABLE IF EXISTS `pengguna`;
CREATE TABLE `pengguna` (
  `user_id` varchar(10) NOT NULL COMMENT 'ID pengguna',
  `sandi` varchar(100) NOT NULL COMMENT 'Sandi pengguna',
  `nama_pengguna` varchar(40) NOT NULL COMMENT 'Nama pengguna'
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

INSERT INTO `pengguna` (`user_id`, `sandi`, `nama_pengguna`) VALUES
('admin',	'9ed6a5571323d50fd224af605b4ae077',	'Canda Krisya');

DROP VIEW IF EXISTS `view_resep_menu`;
CREATE TABLE `view_resep_menu` (`id_menu` int, `nama_menu` varchar(100), `id_wilayah` int, `nama_wilayah` varchar(30), `bahan` text, `bahan_halus` text, `cara_membuat` text, `foto` varchar(100));


DROP TABLE IF EXISTS `wilayah`;
CREATE TABLE `wilayah` (
  `id_wilayah` int NOT NULL AUTO_INCREMENT COMMENT 'Id wilayah',
  `nama_wilayah` varchar(30) NOT NULL COMMENT 'Nama wilayah',
  PRIMARY KEY (`id_wilayah`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

INSERT INTO `wilayah` (`id_wilayah`, `nama_wilayah`) VALUES
(1,	'Kalimantan Tengah'),
(2,	'Kalimantan Timur'),
(3,	'Kalimantan Barat'),
(4,	'Kalimantan Selatan'),
(5,	'Kalimantan Utara');

DROP TABLE IF EXISTS `view_resep_menu`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_resep_menu` AS select `m`.`id_menu` AS `id_menu`,`m`.`nama_menu` AS `nama_menu`,`m`.`id_wilayah` AS `id_wilayah`,`w`.`nama_wilayah` AS `nama_wilayah`,`m`.`bahan` AS `bahan`,`m`.`bahan_halus` AS `bahan_halus`,`m`.`cara_membuat` AS `cara_membuat`,`m`.`foto` AS `foto` from (`menu` `m` join `wilayah` `w`) where (`m`.`id_wilayah` = `w`.`id_wilayah`);