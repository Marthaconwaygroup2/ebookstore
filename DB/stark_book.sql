-- phpMyAdmin SQL Dump
-- version 2.10.1
-- http://www.phpmyadmin.net
-- 
-- Host: 67.15.47.12
-- Generation Time: Aug 06, 2009 at 07:22 AM
-- Server version: 4.1.20
-- PHP Version: 4.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `stark_book`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `add_cart`
-- 

CREATE TABLE `add_cart` (
  `cart_id` int(7) NOT NULL auto_increment,
  `product_id` int(7) NOT NULL default '0',
  `cookie_id` varchar(20) NOT NULL default '',
  `entry_date` date NOT NULL default '0000-00-00',
  PRIMARY KEY  (`cart_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

-- 
-- Dumping data for table `add_cart`
-- 

INSERT INTO `add_cart` (`cart_id`, `product_id`, `cookie_id`, `entry_date`) VALUES 
(6, 4, '1249312576', '2009-08-03'),
(12, 1, '1249325129', '2009-08-03'),
(13, 3, '1249325129', '2009-08-03'),
(14, 2, '1249381946', '2009-08-04'),
(15, 4, '1249381946', '2009-08-04'),
(16, 1, '1249391828', '2009-08-04'),
(18, 14, '1249391998', '2009-08-04'),
(19, 1, '1249391957', '2009-08-04'),
(20, 1, '1249393161', '2009-08-04'),
(21, 16, '1249393468', '2009-08-04'),
(22, 4, '1249392256', '2009-08-04'),
(23, 4, '1249392256', '2009-08-04'),
(27, 14, '1249393468', '2009-08-04'),
(28, 1, '1249400774', '2009-08-05'),
(29, 1, '1249457950', '2009-08-05'),
(30, 1, '1249470518', '2009-08-05');

-- --------------------------------------------------------

-- 
-- Table structure for table `admin`
-- 

CREATE TABLE `admin` (
  `user_id` int(5) NOT NULL auto_increment,
  `username` varchar(100) NOT NULL default '',
  `password` varchar(100) NOT NULL default '',
  PRIMARY KEY  (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `admin`
-- 

INSERT INTO `admin` (`user_id`, `username`, `password`) VALUES 
(1, 'admin', 'password');

-- --------------------------------------------------------

-- 
-- Table structure for table `payment_details`
-- 

CREATE TABLE `payment_details` (
  `payment_id` int(6) NOT NULL auto_increment,
  `user_name` varchar(255) NOT NULL default '',
  `payment_date` varchar(15) NOT NULL default '',
  `total_cost` float NOT NULL default '0',
  `subscription_type` varchar(255) NOT NULL default '',
  `transinfoarray` text NOT NULL,
  `transactioncode` varchar(255) NOT NULL default '',
  `transaction_time` varchar(255) NOT NULL default '',
  `ref_no` varchar(50) NOT NULL default '',
  `expiry_date` varchar(15) NOT NULL default '',
  PRIMARY KEY  (`payment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

-- 
-- Dumping data for table `payment_details`
-- 

INSERT INTO `payment_details` (`payment_id`, `user_name`, `payment_date`, `total_cost`, `subscription_type`, `transinfoarray`, `transactioncode`, `transaction_time`, `ref_no`, `expiry_date`) VALUES 
(1, '1249312575', '2009-08-03', 32.92, 'Products', '', '', '', '', ''),
(2, '1249312575', '2009-08-03', 32.92, 'Products', '', '', '', '', ''),
(3, '1249312575', '2009-08-03', 32.92, 'Products', '', '', '', '', ''),
(4, '1249312575', '2009-08-03', 32.92, 'Products', '', '67D83760DG361611X', 'Pending', '', '2009-10-02'),
(5, '1249322231', '2009-08-03', 20.87, 'Products', '', '42C71756E1886791M', 'Pending', '', '2009-10-02'),
(6, '1249323073', '2009-08-03', 0, 'Products', '', '', '', '', ''),
(7, '1249323073', '2009-08-03', 0, 'Products', '', '', '', '', ''),
(8, '1249323073', '2009-08-03', 0, 'Products', '', '', '', '', ''),
(9, '1249323073', '2009-08-03', 12.05, 'Products', '', '25F39240UP337952N', 'Pending', '', '2009-10-02'),
(10, '1249325129', '2009-08-03', 12.05, 'Products', '', '', '', '', ''),
(11, '1249325129', '2009-08-03', 19.82, 'Products', '', '', '', '', ''),
(17, '1249381946', '2009-08-04', 20.87, 'Products', '', '', '', '', ''),
(18, '1249381946', '2009-08-04', 20.87, 'Products', '', '8LY50019RS197811B', 'Pending', '', '2009-10-03'),
(19, '1249391998', '2009-08-04', 10, 'Products', '', '', '', '', ''),
(20, '1249391957', '2009-08-04', 12.05, 'Products', '', '', '', '', ''),
(21, '1249393468', '2009-08-04', 12, 'Products', '', '', '', '', ''),
(22, '1249393468', '2009-08-04', 31.82, 'Products', '', '', '', '', ''),
(23, '1249400774', '2009-08-05', 12.05, 'Products', '', '', '', '', ''),
(24, '1249457950', '2009-08-05', 12.05, 'Products', '', '', '', '', ''),
(25, '1249470518', '2009-08-05', 12.05, 'Products', '', '', '', '', '');

-- --------------------------------------------------------

-- 
-- Table structure for table `products`
-- 

CREATE TABLE `products` (
  `product_id` int(7) NOT NULL auto_increment,
  `product_name` varchar(255) NOT NULL default '',
  `product_image` varchar(255) NOT NULL default '',
  `product_price` float(10,2) NOT NULL default '0.00',
  `product_description` text NOT NULL,
  `product_url` varchar(255) NOT NULL default '',
  `status` int(1) NOT NULL default '0',
  `entry_date` date NOT NULL default '0000-00-00',
  PRIMARY KEY  (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

-- 
-- Dumping data for table `products`
-- 

INSERT INTO `products` (`product_id`, `product_name`, `product_image`, `product_price`, `product_description`, `product_url`, `status`, `entry_date`) VALUES 
(1, 'new', 'new.gif', 12.05, 'new<br>\r\nnew<br>\r\nnew<br>\r\nnew<br>\r\nnew<br>\r\nnew<br>\r\nnew<br>\r\nnew<br>\r\nnew<br>\r\nnew<br>\r\nnew<br>\r\nnew<br>\r\nnew<br>\r\nnew<br>\r\nnew<br>\r\nnew<br>\r\nnew<br>\r\nnew<br>', 'new.pdf', 1, '2009-08-03'),
(2, 'new1', 'new1.gif', 8.88, 'new\r\nnew\r\nnew\r\nnew\r\nnew\r\nnew', 'new1.pdf', 0, '2009-08-03'),
(3, 'new2', 'new2.gif', 7.77, 'new\r\nnew\r\nnew\r\nnew\r\nnew\r\nnew', 'new2.pdf', 1, '2009-08-03'),
(4, 'new3', 'new3.gif', 11.99, 'new\r\nnew\r\nnew\r\nnew\r\nnew\r\nnew', 'new3.pdf', 1, '2009-08-03'),
(14, 'test', 'Error_Contact_Us.jpg', 10.00, 'newaaaaaaa', 'abscorporate.net_Hosting.docx', 1, '2009-08-03'),
(16, 'test', 'im', 12.00, 'newassscccc', 'abscorporate.net_Hosting.docx', 1, '2009-08-04');

-- --------------------------------------------------------

-- 
-- Table structure for table `tbl_cms`
-- 

CREATE TABLE `tbl_cms` (
  `id` int(7) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL default '',
  `page_title` varchar(255) NOT NULL default '',
  `content` blob NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- 
-- Dumping data for table `tbl_cms`
-- 

INSERT INTO `tbl_cms` (`id`, `name`, `page_title`, `content`) VALUES 
(1, 'Home', '', 0x3c703e486f6d653c2f703e0d0a3c703e486f6d653c2f703e0d0a3c703e486f6d653c2f703e0d0a3c703e486f6d653c2f703e0d0a3c703e486f6d653c2f703e0d0a3c703e486f6d653c2f703e0d0a3c703e486f6d653c2f703e0d0a3c703e486f6d653c2f703e),
(2, 'About us', '', 0x3c703e41626f75742075733c2f703e0d0a3c703e41626f75742075733c2f703e0d0a3c703e41626f75742075733c2f703e0d0a3c703e41626f75742075733c2f703e0d0a3c703e41626f75742075733c2f703e0d0a3c703e41626f75742075733c2f703e0d0a3c703e41626f75742075733c2f703e0d0a3c703e41626f75742075733c2f703e),
(3, 'Contact us', '', 0x3c703e436f6e746163742075733c2f703e0d0a3c703e436f6e746163742075733c2f703e0d0a3c703e436f6e746163742075733c2f703e0d0a3c703e436f6e746163742075733c2f703e0d0a3c703e436f6e746163742075733c2f703e0d0a3c703e436f6e746163742075733c2f703e0d0a3c703e436f6e746163742075733c2f703e0d0a3c703e436f6e746163742075733c2f703e),
(4, 'Training Videos', 'Training Videos', 0x3c7461626c6520616c69676e3d2263656e746572222077696474683d22393025223e0d0a090920203c74723e0d0a0909202020203c74642077696474683d2233302522206865696768743d2231383622207374796c653d2270616464696e672d6c6566743a33307078223e0d0a2020202020090920203c6120687265663d22766964656f203120706c6179696e6720666f722068616c662e6d7034223e3c696d67207372633d22696d616765732f766964656f312e676966222077696474683d2232353022206865696768743d223137372220626f726465723d2230223e3c2f613e0909093c2f74643e0d0a0909093c74642077696474683d2233302522206865696768743d22313836223e0d0a2020202020090920203c6120687265663d22766964656f203220706c6179696e67206269672070616972732e6d7034223e3c696d67207372633d22696d616765732f766964656f322e676966222077696474683d2232353022206865696768743d223136332220626f726465723d2230223e3c2f613e0909093c2f74643e0d0a0909093c74642077696474683d2233302522206865696768743d22313836223e0d0a2020202020090920203c6120687265663d22766964656f20332c20707265666c6f702072616973696e672e6d7034223e3c696d67207372633d22696d616765732f766964656f332e676966222077696474683d2232353022206865696768743d223138362220626f726465723d2230223e3c2f613e0909093c2f74643e0909090d0a090920203c2f74723e090920200920200d0a09093c2f7461626c653e);
