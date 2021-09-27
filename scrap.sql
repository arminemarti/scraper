-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 25, 2021 at 03:17 PM
-- Server version: 5.7.33
-- PHP Version: 7.1.33

--
-- Database: `scrap`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_pages`--

CREATE TABLE `blog_pages` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `b_title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b_creator` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b_image_src` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b_blog_text` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b_page_url` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b_created_date` date NOT NULL,
  `b_scrap_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,  
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Table structure for table `top_words`
--

CREATE TABLE `top_words` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `b_word` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b_count` int(11) NOT NULL,
  `b_date` date NOT NULL,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

