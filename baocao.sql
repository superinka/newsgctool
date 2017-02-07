/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 5.6.34 : Database - baocao
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`baocao` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;

USE `baocao`;

/*Table structure for table `tb_daily_report` */

DROP TABLE IF EXISTS `tb_daily_report`;

CREATE TABLE `tb_daily_report` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `create_by` int(8) NOT NULL,
  `create_time` datetime(6) NOT NULL,
  `status` int(8) NOT NULL DEFAULT '1',
  `task_id` int(8) NOT NULL,
  `update_time` datetime(6) NOT NULL,
  `description` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `code` text COLLATE utf8_unicode_ci NOT NULL,
  `time_spend` int(8) NOT NULL,
  `progress` int(8) NOT NULL,
  `review_by` int(8) DEFAULT NULL,
  `review_status` int(8) DEFAULT NULL,
  `create_date` date NOT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `file_att` text COLLATE utf8_unicode_ci,
  `department_id` int(8) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tb_daily_report` */

insert  into `tb_daily_report`(`id`,`create_by`,`create_time`,`status`,`task_id`,`update_time`,`description`,`code`,`time_spend`,`progress`,`review_by`,`review_status`,`create_date`,`note`,`file_att`,`department_id`) values (1,62,'2017-01-19 15:04:16.000000',1,3,'2017-01-19 15:04:16.000000','Xác thực đăng ký qua sms','41140951b652ee146cee196807b0ea6610bb761',8,100,62,1,'2017-01-19','Xác thực đăng kí qua sms',NULL,6),(2,61,'2017-01-19 16:29:45.000000',1,4,'2017-01-19 16:29:45.000000','Cài đặt cấu hình OS và ứng dụng','417973806eb98ab489928c4871a130f265066c6',5,0,60,1,'2017-01-19','- Cài đặt và cấu hình xong hệ điều hành.\r\n- Cài đặt và cấu hình xong mysql, java, php\r\n- Dựng xong game server, webgame, CMS',NULL,7),(3,61,'2017-01-19 16:42:51.000000',1,0,'2017-01-19 16:42:51.000000','Công việc phát sinh ngày 19/1/2017','004489cfa82d28c45860574ff5bb0f4068d906',3,100,60,1,'2017-01-19','- Kiểm tra hệ thống các server hàng ngày.\r\n- Kiểm tra cập nhật SVN, FTP hàng ngày.\r\n- Hỗ trợ máy móc trong công ty.',NULL,7),(4,65,'2017-01-24 08:33:22.000000',1,8,'2017-01-24 08:33:22.000000','Tài xỉu','413368164551fa0faccfecd07775345b18a9a50',8,100,62,1,'2017-01-24','- Tạo menu select game mini (Có thể drag)\r\n- Thay giao diện tài xỉu, các dialog liên quan\r\n- Thay animation của xúc xắc\r\n- Sửa lỗi',NULL,6),(5,66,'2017-01-24 08:35:42.000000',1,9,'2017-01-24 08:35:42.000000','Sửa lỗi Game TLMN solo, so tài trí tuệ','42114526a585ebb78213e749334253159f35048b',8,100,62,1,'2017-01-24','- sửa lỗi avatar FB trong so tài trí tuệ\r\n- sửa lỗi quân bài trên bài trong game TLMN solo\r\n- thêm chức năng đăng nhập nhiều sever',NULL,6),(6,67,'2017-01-24 08:42:01.000000',1,10,'2017-01-24 08:42:01.000000','Gửi thông tin động cho client hiển thị chọn server','421036862cdda84720af5b443dd2c34009ff27b9',2,100,62,1,'2017-01-24','Gửi thông tin động cho client hiển thị chọn server',NULL,6),(7,67,'2017-01-24 08:42:26.000000',1,11,'2017-01-24 08:42:26.000000','Tạo sự kiện chạy event tết','4210749746a95681adff854f8bd7a93a4a662d69',4,100,62,1,'2017-01-24','Tạo sự kiện chạy event tết',NULL,6),(8,62,'2017-01-24 08:55:58.000000',1,14,'2017-01-24 08:55:58.000000','Sửa game tài xỉu.','4112891c53819912e4a411ae3c4a8147745a8b6',8,100,62,1,'2017-01-24','Xong',NULL,6),(9,67,'2017-01-24 09:23:34.000000',1,20,'2017-01-24 09:23:34.000000','Fix những lỗi trên trello của đội test','42104665cf58fc5bebb0b3c78f9e3597c7eaed96',2,0,62,1,'2017-01-24','cộng trừ tiền sai, bàn cược 100 nhưng khi thắng lại được cộng có 5 vàng',NULL,6),(10,68,'2017-01-24 09:33:59.000000',1,0,'2017-01-24 09:33:59.000000','Chỉnh sửa giao diện game TLMN , TLMN so lo, sâm, tài xỉu','004328945e8cfcccedaf219cf2034003afab6',12,100,62,1,'2017-01-24','Chỉnh sửa giao diện game TLMN , TLMN so lo, sâm, tài xỉu',NULL,6),(11,70,'2017-01-24 09:35:11.000000',1,30,'2017-01-24 09:35:11.000000','sửa kích thước ảnh','411969307fbc382e90661f252d1386215f9b2099',4,100,70,1,'2017-01-24','sửa kích thước và cắt 2 màn giao diện chính web',NULL,9),(12,68,'2017-01-24 09:35:42.000000',1,0,'2017-01-24 09:35:42.000000','Chỉnh sửa giao diện game mậu binh, xóc đĩa, bay cây','00673099d8a5b05f021f778ebfc00251397709',12,100,62,1,'2017-01-24','Chỉnh sửa giao diện game mậu binh, xóc đĩa, bay cây',NULL,6),(13,68,'2017-01-24 09:36:00.000000',1,31,'2017-01-24 09:36:00.000000','Chỉnh sửa giao diện game mậu binh, xóc đĩa, bay cây','4142359af57934ccbf1abac61fbb81e65ed6499',12,100,62,1,'2017-01-24','Chỉnh sửa giao diện game mậu binh, xóc đĩa, bay cây',NULL,6),(14,63,'2017-01-24 09:48:19.000000',1,39,'2017-01-24 09:48:19.000000','Làm dialog login game','416305556b5758a41597c21604400d8ff08916',4,0,62,1,'2017-01-24','làm theo iframe',NULL,8),(15,67,'2017-01-24 10:16:32.000000',1,20,'2017-01-24 10:16:32.000000','Fix những lỗi trên trello của đội test','42102883406ea2c3990cfbdd872569943ac891ad',3,0,67,0,'2017-01-24','-Hủy đơn hàng sau 30 phút mới có 1 đơn hàng mới, nếu muốn ngay thì cần mất phí là 1 kim cương\r\n-game so tài ghi mức cược nhưng tiền cần lại là 0\r\n-ở màn chọn bàn thấy bàn mức cược toàn bằng 0 hết nhưng tiền cần lại khác nhau',NULL,6),(16,61,'2017-01-24 15:00:02.000000',1,5,'2017-01-24 15:00:02.000000','Hỗ trợ cập nhật Game','4172304bede849dd2c5ad63db8504b706c61d2e',4,100,61,0,'2017-01-24','- Cập nhật bản test game Vking\r\n- Cập nhật webgame',NULL,7),(17,61,'2017-01-24 15:01:04.000000',1,0,'2017-01-24 15:01:04.000000','Công việc phát sinh ngày 24/1/2017','0092536300638f3eb906cb395b115e9117b709',1,100,61,0,'2017-01-24','- Kiểm tra hệ thống server hàng ngày.\r\n- Kiểm tra cập nhật FTP, SVN.\r\n- Hỗ trợ mọi người cập nhật báo cáo.',NULL,7),(18,64,'2017-02-03 09:14:25.000000',1,43,'2017-02-03 09:14:25.000000','Xây dựng giao diện HTML5 cho bản web','422115189d623b7902a411a5fa5953a58be5d9b0',8,0,64,0,'2017-02-03','Xây dựng giao diện HTML5 cho bản web babylon v2',NULL,8),(19,62,'2017-02-03 16:49:32.000000',1,15,'2017-02-03 16:49:32.000000','Code trường hơp ván đấu hoà điểm','411501448640e590f537e62aed255b7f79b4ae2',8,0,62,1,'2017-02-03','Code trường hơp ván đấu hoà điểm',NULL,6),(20,61,'2017-02-03 16:51:15.000000',1,0,'2017-02-03 16:51:15.000000','Báo cáo công việc phát sinh ngày 3/2/2017','007667e363530b59d536d5d35565aed8571832',8,100,61,0,'2017-02-03','- Kiểm tra hệ thống server hàng ngày. \r\n- Kiểm tra cập nhật FTP, SVN. \r\n- Hỗ trợ mọi người cập nhật báo cáo.\r\n- Kiểm tra, xóa bớt dữ liệu backup cũ.',NULL,7),(21,66,'2017-02-03 16:56:30.000000',1,52,'2017-02-03 16:56:30.000000','Sửa lỗi Khu máy móc','42118397a82241369b80eafe4736003c56f5003e',8,100,66,0,'2017-02-03','Sửa lỗi Khu máy móc',NULL,6);

/*Table structure for table `tb_department` */

DROP TABLE IF EXISTS `tb_department`;

CREATE TABLE `tb_department` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `manager` int(32) DEFAULT NULL,
  `vicemanager` int(32) DEFAULT NULL,
  `parent_id` int(8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tb_department` */

insert  into `tb_department`(`id`,`name`,`description`,`manager`,`vicemanager`,`parent_id`) values (1,'Ban Lãnh Đạo','Giám đốc, phó giám đốc',0,NULL,0),(2,'Trung Tâm Nghiên Cứu Và Phát Triển',NULL,NULL,NULL,1),(3,'Trung Tâm Vận Hành Và Khai Thác',NULL,NULL,NULL,1),(4,'Phòng Kinh Doanh',NULL,NULL,NULL,1),(5,'Kế Toán Và Hành Chính Nhân Sự',NULL,NULL,NULL,1),(6,'Phòng Lập Trình',NULL,NULL,NULL,2),(7,'Phòng Hệ Thống',NULL,NULL,NULL,2),(8,'Phòng Web',NULL,NULL,NULL,2),(9,'Phòng Đồ Họa',NULL,NULL,NULL,2),(10,'Phòng Vận Hành',NULL,NULL,NULL,3),(13,'Phòng Kế Toán',NULL,NULL,NULL,5),(14,'Phòng Hành Chính và Nhân Sự',NULL,NULL,NULL,5),(15,'Phòng Kinh Doanh',NULL,NULL,NULL,4);

/*Table structure for table `tb_employee` */

DROP TABLE IF EXISTS `tb_employee`;

CREATE TABLE `tb_employee` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `user_id` int(8) NOT NULL,
  `fullname` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `skype` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `sex` int(8) NOT NULL,
  `address` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tb_employee` */

insert  into `tb_employee`(`id`,`user_id`,`fullname`,`email`,`phone`,`skype`,`facebook`,`birthday`,`sex`,`address`,`avatar`) values (54,60,'Nguyễn Văn Cương','cuongnv@sdcmedia.com.vn','12345678','','','2017-01-09',1,'',NULL),(55,61,'Nguyễn Minh Quang','quangnm@sdcmedia.com.vn','0943666108','','','1987-08-05',1,'','81c93d1d81c6ca941606a4d3f26c9220.jpg'),(56,62,'Nguyễn Bá Thành','thanhnb@sdcmedia.com.vn','01689917321','thanhnb_it','khongduocah','1990-07-10',1,'Hải Hoà - Tĩnh Gia - Thanh Hoá',NULL),(57,63,'Lưu Văn Thịnh','thinhlv@sdcmedia.com.vn','12345678','','','2017-01-09',1,'','284fb8a85c8edfb187ede7684d0df6bf.jpg'),(58,64,'Vũ Mạnh Huân','huanvm@sdcmedia.com.vn','0979030879','','','1989-05-29',1,'','6d8c4824416913396d34ce368862755c.jpg'),(59,65,'Vũ Ngọc Tuân','tuanvn@sdcmedia.com.vn','0938683966','','','2017-01-09',1,'',NULL),(60,66,'Nguyễn Đình Khoa','khoand@sdcmedia.com.vn','01236455117','khoa_kiki','','1988-01-14',1,'',NULL),(61,67,'Phạm Ngọc Tuấn','tuanpn@sdcmedia.com.vn','0972605006','tuanpn_bkhn','','1991-01-30',1,'','4a65d84d2bcb7409a9d3087f49c00c9b.jpg'),(62,68,'Nguyễn Trung Kiên','kiennt@sdcmedia.com.vn','0969940999','nguyentrungkientn93','','1993-06-15',1,'Số 5 ngõ 155 Nguyễn Lân , P. Phương Liệt, Q. Thanh Xuân, Hà nội',NULL),(64,70,'Trần Thị Hưng','hungtt@sdcmedia.com.vn','01674641745','','','1992-09-14',2,'','d13871531ca94d1684dc1a75a2ee99c4.jpg'),(65,71,'Nguyễn Huy Hoàng','hoangnh@sdcmedia.com.vn','0906679177','','','1992-01-03',1,'',NULL),(66,72,'Lê Thị Phương','phuonglt@sdcmedia.com.vn','12345678','','','2017-01-09',2,'',NULL),(67,73,'Hoàng Thị Thu Hương','huonghtt@sdcmedia.com.vn','0963194550','','','2017-01-09',2,'','79f09f263019b6fedefb64974b2a3163.jpg'),(68,74,'Lê Danh Thành','thanhld@sdcmedia.com.vn','0977721897','','','1989-01-19',1,'',NULL),(69,75,'Lê Hữu Vinh','vinhlh@sdcmedia.com.vn','','','','2017-01-16',1,'',NULL),(71,77,'Lê Thị Vân','vanlt@sdcmedia.com.vn','112345678','','','2017-01-16',2,'',NULL),(72,78,'Nguyễn Thị Hằng','hangnt@sdcmedia.com.vn','12345678','','','2017-01-16',2,'',NULL),(74,80,'Lê Thị Thương','thuonglt@sdcmedia.com.vn','','','','2017-01-16',2,'',NULL),(75,81,'Hà Thanh Hoa','hoaht@sdcmedia.com.vn','0979286000','','','1984-08-09',2,'',NULL),(76,82,'Phạm Ngọc Tú','tu@sdcmedia.com.vn','','','','2017-01-18',1,'',NULL),(77,83,'Lê Tài Đại','dailt@sdcmedia.com.vn','','','','2017-01-18',1,'',NULL),(78,84,'Nguyễn Trịnh Thị Huyền','huyenntt@sdcmedia.com.vn','01656383649','','','2017-01-18',2,'','33b2004934109ba51fcdb02eded57d3d.jpg'),(79,85,'Lê Thị Lan Anh','anhltl@sdcmedia.com.vn','','','','2017-01-18',2,'',NULL),(80,86,'Vũ Diên Cường','cuongvd@sdcmedia.com.vn','','','','2017-02-02',1,'',NULL),(81,87,'Trần Văn Huy','huytv@sdcmedia.com.vn','','','','2017-02-03',1,'',NULL);

/*Table structure for table `tb_mission` */

DROP TABLE IF EXISTS `tb_mission`;

CREATE TABLE `tb_mission` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(24) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `create_by` int(8) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `update_time` datetime(6) DEFAULT NULL,
  `progress` int(8) DEFAULT NULL,
  `project_id` int(8) NOT NULL,
  `status` int(8) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `code` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `update_by` int(8) DEFAULT NULL,
  `department_id` int(8) DEFAULT NULL,
  `level` int(8) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tb_mission` */

insert  into `tb_mission`(`id`,`name`,`description`,`create_by`,`create_date`,`update_time`,`progress`,`project_id`,`status`,`start_date`,`end_date`,`code`,`update_by`,`department_id`,`level`) values (1,'Code Server','Code tính năng và sửa luật chơi theo kịch bản.',62,'2017-01-19','2017-01-19 09:37:11.000000',38,41,1,'2017-01-17','2017-03-01','417666523da452def3ff45f2bbe8ca43cda1cd',62,6,3),(2,'Fix lỗi Server','Fix lỗi do bên test gửi sang.',62,'2017-01-19','2017-01-19 09:38:29.000000',0,41,1,'2017-03-02','2017-03-15','417761c9485b4f64e0e6724e32eff6591c91c3',62,6,3),(3,'Code Client Mobile','Code bản mobile (Android, IOS).',62,'2017-01-19','2017-01-19 09:40:09.000000',67,41,1,'2017-01-17','2017-03-01','414568cb49eb92e5b06ac20937cb349f3ac506',62,6,4),(4,'Code Client Web M1','Code bản client web module 1',62,'2017-01-19','2017-01-19 09:42:48.000000',29,41,1,'2017-01-17','2017-03-01','414512f8c72f9500ba9755f946dcba4a528a40',62,6,4),(5,'Code Client Web M2','Code bản client web module 2',62,'2017-01-19','2017-01-19 09:43:29.000000',0,41,1,'2017-01-17','2017-03-01','41716020a6e1bc3f90337074bd07c2c9fc752e',62,6,4),(6,'Code Client Web M3','Code bản client web module 3',62,'2017-01-19','2017-01-19 09:48:15.000000',33,41,1,'2017-01-17','2017-03-01','4199091c58ff94ad7c2f87f1e54da51bac46a8',62,8,4),(7,'Cài đặt server','cài đặt hệ điều hành và hỗ trợ cài đặt các bản test file của game',60,'2017-01-19','2017-01-19 15:35:19.000000',50,41,1,'2017-01-17','2017-03-15','41202281424d08c2847c713ae0ce534a3a34c6',60,7,4),(8,'Mua tài khoản developer','tài khoản upload game cho IOS và Android, Windowphone',60,'2017-01-19','2017-01-19 15:38:26.000000',0,41,1,'2017-01-19','2017-02-25','4123975b1640d10dd11747925fb69ae37d501c',60,7,3),(9,'Liên hệ đầu mối kết nối ','lấy kết nối các kênh thanh toán , SMS, 9029, Thẻ Nạp, Topup',60,'2017-01-19','2017-01-19 15:41:58.000000',0,41,1,'2017-01-19','2017-02-15','416966ecb27911e734389d654f6d4ec16f8682',60,7,3),(10,'Fix lỗi Server','Fix lỗi do bên test gửi sang.',62,'2017-01-24','2017-01-24 08:32:42.000000',67,42,1,'2017-02-01','2017-02-28','427032c9485b4f64e0e6724e32eff6591c91c3',62,6,4),(11,'Fix lỗi Client','Fix lỗi do bên test gửi sang.',62,'2017-01-24','2017-01-24 08:33:07.000000',0,42,1,'2017-02-01','2017-02-28','4216629d773eb081a5a63a77239345fd51b8e4',62,6,4),(12,'Sửa trang quản trị','Sửa theo yêu cầu của đội vận hành',62,'2017-01-24','2017-01-24 08:33:47.000000',0,42,1,'2017-02-01','2017-02-28','42230384972a5f3a9b103d62fee4e4e8bb7502',62,8,4),(13,'CSKH các game - Thành','Nghe điện thoại, check CCU, trả thưởng',60,'2017-01-24','2017-01-24 08:37:21.000000',0,45,1,'2017-01-01','2017-12-31','453638dd4e27e61f344cafcdfeee65e93eb4c2',60,10,4),(14,'CSKH các game - Phương','Tổng hợp báo cáo, check CCU, kiểm duyệt đổi thưởng, fanpage, chát admin',60,'2017-01-24','2017-01-24 08:39:55.000000',0,45,1,'2017-01-01','2017-12-31','455459fba17326d271e7f65a5c09add2860b23',60,10,4),(15,'CSKH các game - Hương','Nghe điện thoại, Check CCU, kiểm duyệt đổi thưởng, hỗ trợ chát fanpage, admin',60,'2017-01-24','2017-01-24 08:39:20.000000',0,45,1,'2017-01-01','2017-12-31','45604515d77033fb3096170e1ffd28fd6686c',60,10,4),(16,'CSKH các game - Huyền','Nghe điện thoại, check CCU, fanpage, chát admin',60,'2017-01-24','2017-01-24 08:40:21.000000',0,45,1,'2017-01-01','2017-12-31','456609c7ceaa7b9d4410c1c8300b2c37f558cb',60,10,4),(17,'Vẽ Đồ họa mobile','',70,'2017-01-24','2017-01-24 09:21:02.000000',100,41,1,'2017-01-17','2017-01-21','414972ff131559a1b8210f8a5ef7434bb2fdd7',70,9,3),(18,'Vẽ đồ họa web','',70,'2017-01-24','2017-01-24 09:22:10.000000',100,41,1,'2017-01-17','2017-01-21','4119303a3a30b330a9c83a1464c1293977b85b',70,9,3),(19,'Sửa kích thước web v1','',70,'2017-01-24','2017-01-24 09:24:37.000000',100,41,1,'2017-01-23','2017-01-24','4115896bed3bdc2e3869e534a462ff22d02400',70,9,3),(20,'Sửa kích thước web v2','',70,'2017-01-24','2017-01-24 09:42:00.000000',0,41,1,'2017-02-02','2017-03-15','416695e1c02e66f5d3c7ad1992615be138fc80',70,9,4),(21,'Xây dựng web quảng bá','Xây dựng trang web cho game.',62,'2017-01-24','2017-01-24 09:36:11.000000',0,42,1,'2017-02-01','2017-02-15','4219268f5ca2116860f4e6db0e01f06b4b65cb',62,8,4),(22,'Xây dựng trang wap','',62,'2017-01-24','2017-01-24 09:36:59.000000',0,42,1,'2017-02-16','2017-02-28','42204120fa06d4b5ec1922278685a31bc6941b',62,8,4),(23,'Sửa trang quản trị','Sửa theo yêu cầu của đội vận hành',62,'2017-01-24','2017-01-24 09:53:10.000000',0,41,1,'2017-01-17','2017-03-01','41578184972a5f3a9b103d62fee4e4e8bb7502',62,8,4),(24,'Test Babylon','Test game mini',60,'2017-01-24','2017-01-24 09:56:28.000000',0,44,1,'2017-01-01','2017-02-28','444310994731076715184c999bb3c5579a48ec',60,10,4);

/*Table structure for table `tb_mission_user` */

DROP TABLE IF EXISTS `tb_mission_user`;

CREATE TABLE `tb_mission_user` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `mission_id` int(8) NOT NULL,
  `user_id` int(8) NOT NULL,
  `update_time` datetime(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

/*Data for the table `tb_mission_user` */

insert  into `tb_mission_user`(`id`,`mission_id`,`user_id`,`update_time`) values (1,1,62,'2017-01-19 09:37:12.000000'),(2,2,62,'2017-01-19 09:38:29.000000'),(3,3,65,'2017-01-19 09:39:49.000000'),(4,4,68,'2017-01-19 09:42:48.000000'),(5,5,69,'2017-01-19 09:43:30.000000'),(6,6,63,'2017-01-19 09:48:15.000000'),(7,7,61,'2017-01-19 15:35:19.000000'),(8,8,60,'2017-01-19 15:38:26.000000'),(9,9,60,'2017-01-19 15:41:59.000000'),(10,10,67,'2017-01-24 08:32:42.000000'),(11,11,66,'2017-01-24 08:33:07.000000'),(12,12,63,'2017-01-24 08:33:47.000000'),(13,13,74,'2017-01-24 08:37:21.000000'),(14,14,72,'2017-01-24 08:38:18.000000'),(15,15,73,'2017-01-24 08:39:20.000000'),(16,16,84,'2017-01-24 08:40:21.000000'),(17,17,70,'2017-01-24 09:21:02.000000'),(18,18,70,'2017-01-24 09:22:10.000000'),(19,19,70,'2017-01-24 09:23:13.000000'),(20,20,71,'2017-01-24 09:24:49.000000'),(21,21,64,'2017-01-24 09:36:11.000000'),(22,22,64,'2017-01-24 09:36:59.000000'),(23,23,63,'2017-01-24 09:53:10.000000'),(24,24,73,'2017-01-24 09:56:28.000000');

/*Table structure for table `tb_notification` */

DROP TABLE IF EXISTS `tb_notification`;

CREATE TABLE `tb_notification` (
  `id` int(64) NOT NULL AUTO_INCREMENT,
  `code` text COLLATE utf8_unicode_ci,
  `create_by` int(8) DEFAULT NULL,
  `review_by` int(8) DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `department_id` int(8) DEFAULT NULL,
  `review_status` int(8) DEFAULT NULL,
  `level_creater` int(8) DEFAULT NULL,
  `type` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `review_time` datetime DEFAULT NULL,
  `content_old` text COLLATE utf8_unicode_ci,
  `content_new` text COLLATE utf8_unicode_ci,
  `status` int(8) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tb_notification` */

insert  into `tb_notification`(`id`,`code`,`create_by`,`review_by`,`note`,`department_id`,`review_status`,`level_creater`,`type`,`create_time`,`review_time`,`content_old`,`content_new`,`status`) values (1,'41706ca79528240eab18f5ffa2ebc79d3c0',61,53,'Đã hoàn thành xong các công việc',7,2,4,'c201','2017-01-19 16:44:16','2017-01-19 16:44:16','0','100^Đã hoàn thành xong các công việc',0),(2,'41706ca79528240eab18f5ffa2ebc79d3c0',60,60,'Đã hoàn thành xong các công việc',7,2,3,'c201','2017-01-20 10:05:52','2017-01-20 10:05:52','0','100^Đã hoàn thành xong các công việc',2),(3,'4131351cdbe4dc27345e44603006ab07398',65,53,'Hoàn thành tài xỉu',6,2,4,'c201','2017-01-24 08:34:24','2017-01-24 08:34:24','0','100^Hoàn thành tài xỉu',0),(4,'4137de85121a76f1170ebd89494a4ee6744',65,53,'Sửa xong',6,2,4,'c201','2017-01-24 08:34:37','2017-01-24 08:34:37','0','100^Sửa xong',0),(5,'4131351cdbe4dc27345e44603006ab07398',62,62,'Hoàn thành tài xỉu',6,2,3,'c201','2017-01-24 08:37:09','2017-01-24 08:37:09','0','100^Hoàn thành tài xỉu',2),(6,'4137de85121a76f1170ebd89494a4ee6744',62,62,'Sửa xong',6,2,3,'c201','2017-01-24 08:37:22','2017-01-24 08:37:22','0','100^Sửa xong',2),(7,'42106df13dc8a411fe1c795d509d58f9e96b',67,53,'chưa cập nhật tiến độ',6,2,4,'c201','2017-01-24 09:27:07','2017-01-24 09:27:07','0','100^chưa cập nhật tiến độ',0),(8,'42106f4776d447c144b3ea6d3cafb3400a13',67,53,'chưa cập nhật tiến độ',6,2,4,'c201','2017-01-24 09:27:16','2017-01-24 09:27:16','0','100^chưa cập nhật tiến độ',0),(9,'42106f4776d447c144b3ea6d3cafb3400a13',62,62,'chưa cập nhật tiến độ',6,2,3,'c201','2017-01-24 09:28:35','2017-01-24 09:28:35','0','100^chưa cập nhật tiến độ',2),(10,'42106df13dc8a411fe1c795d509d58f9e96b',62,62,'chưa cập nhật tiến độ',6,2,3,'c201','2017-01-24 09:28:42','2017-01-24 09:28:42','0','100^chưa cập nhật tiến độ',2),(11,'414c27e994d6d6534509e09373f694514c0',68,53,'Hoàn thành',6,2,4,'c201','2017-01-24 09:34:21','2017-01-24 09:34:21','0','100^Hoàn thành',0),(12,'4212f0f1c431aa1a745bc8a1decc80fce4c6',63,53,'Tạo nhầm',8,2,4,'c101','2017-01-24 09:37:39','2017-01-24 09:37:39','2017-02-01^2017-02-28^eof','2017-02-01^2017-02-06^Tạo nhầm',0),(13,'414e12b9a8180bf731d0c121e533238ebf0',68,53,'Hoàn thành',6,2,4,'c201','2017-01-24 09:37:41','2017-01-24 09:37:41','0','100^Hoàn thành',0),(14,'4212f0f1c431aa1a745bc8a1decc80fce4c6',62,62,'Tạo nhầm',8,2,3,'c101','2017-01-24 09:38:56','2017-01-24 09:38:56','2017-02-01^2017-02-28^eof','2017-02-01^2017-02-06^Tạo nhầm',2),(15,'414e12b9a8180bf731d0c121e533238ebf0',62,62,'Hoàn thành',6,2,3,'c201','2017-01-24 09:39:10','2017-01-24 09:39:10','0','100^Hoàn thành',2),(16,'414c27e994d6d6534509e09373f694514c0',62,62,'Hoàn thành',6,2,3,'c201','2017-01-24 09:39:27','2017-01-24 09:39:27','0','100^Hoàn thành',2),(17,'414656c9c8e461ff21a8a90cd5e6eb1160e',68,53,'Sửa thời gian, ưu tiên công việc khác trước',6,2,4,'c101','2017-01-24 09:43:28','2017-01-24 09:43:28','2017-02-02^2017-02-11^eof','2017-02-02^2017-02-03^Sửa thời gian, ưu tiên công việc khác trước',0),(18,'414656c9c8e461ff21a8a90cd5e6eb1160e',68,53,'Sửa thời gian, ưu tiên công việc khác trước',6,2,4,'c101','2017-01-24 09:45:08','2017-01-24 09:45:08','2017-02-02^2017-02-11^eof','2017-02-06^2017-02-14^Sửa thời gian, ưu tiên công việc khác trước',0),(19,'41671bb3c6081121b218e03eadd77666db3',63,53,'Chuyển đổi từ bootstrap sang iframe',8,2,4,'c201','2017-01-24 09:47:11','2017-01-24 09:47:11','0','100^Chuyển đổi từ bootstrap sang iframe',0),(20,'41671bb3c6081121b218e03eadd77666db3',62,62,'Chuyển đổi từ bootstrap sang iframe',8,2,3,'c201','2017-01-24 09:50:01','2017-01-24 09:50:01','0','100^Chuyển đổi từ bootstrap sang iframe',2),(21,'414656c9c8e461ff21a8a90cd5e6eb1160e',62,62,'Sửa thời gian, ưu tiên công việc khác trước',6,2,3,'c101','2017-01-24 09:50:12','2017-01-24 09:50:12','2017-02-02^2017-02-11^eof','2017-02-06^2017-02-14^Sửa thời gian, ưu tiên công việc khác trước',2),(22,'4142f99cf198eab96d9fcd3b754381c7e40',68,53,'ghi nhầm thời gian',6,2,4,'c101','2017-01-24 09:51:52','2017-01-24 09:51:52','2017-02-20^2017-01-25^eof','2017-02-20^2017-02-25^ghi nhầm thời gian',0),(23,'4142f99cf198eab96d9fcd3b754381c7e40',62,62,'ghi nhầm thời gian',6,2,3,'c101','2017-01-24 09:52:21','2017-01-24 09:52:21','2017-02-20^2017-01-25^eof','2017-02-20^2017-02-25^ghi nhầm thời gian',2),(24,'4210b531dd3d962eb357c29f9a7fb0124f81',67,53,'bổ xung fix thêm lỗi mới',6,0,4,'c201','2017-01-24 09:56:37','2017-01-24 09:56:37','0','100^bổ xung fix thêm lỗi mới',0),(25,'422246db1819e7d0e6b0e01c9ebf251fcc34',64,53,'Tạo nhầm',8,2,4,'c101','2017-01-24 10:03:01','2017-01-24 10:03:01','2017-02-16^2017-01-21^eof','2017-02-16^2017-02-21^Tạo nhầm',0),(26,'422246db1819e7d0e6b0e01c9ebf251fcc34',62,62,'Tạo nhầm',8,2,3,'c101','2017-01-24 10:15:28','2017-01-24 10:15:28','2017-02-16^2017-01-21^eof','2017-02-16^2017-02-21^Tạo nhầm',2);

/*Table structure for table `tb_project` */

DROP TABLE IF EXISTS `tb_project`;

CREATE TABLE `tb_project` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `project_name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_date` date NOT NULL,
  `create_by` int(8) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `status` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `department_id` int(8) DEFAULT NULL,
  `progress` int(8) DEFAULT NULL,
  `update_by` int(8) DEFAULT NULL,
  `update_time` datetime(6) DEFAULT NULL,
  `short_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tb_project` */

insert  into `tb_project`(`id`,`project_name`,`description`,`create_date`,`create_by`,`start_date`,`end_date`,`status`,`department_id`,`progress`,`update_by`,`update_time`,`short_name`) values (41,'VKing V1','Phát triển game Vking version 1.','2017-01-19',62,'2017-01-17','2017-03-15','1',2,30,62,'2017-01-24 08:24:00.000000','VKing_V1'),(42,'Babylon V2','Fix lỗi do bên test gửi sang.','2017-01-24',62,'2017-01-24','2017-02-28','1',2,20,62,'2017-01-24 13:44:52.000000','BBL_V2'),(43,'Test game Verking','test game, trang quan tri','2017-01-24',60,'2016-12-01','2017-03-15','1',3,0,60,'2017-01-24 08:33:04.000000','VK'),(44,'Test Babylon','phiên bản game mini','2017-01-24',60,'2017-01-01','2017-02-28','1',3,0,60,'2017-01-24 08:34:43.000000','BB'),(45,'CSKH các game','Check CCU, kiểm duyệt đổi thưởng, hỗ trợ chát fanpage, admin','2017-01-24',60,'2017-01-01','2017-12-31','1',3,0,60,'2017-01-24 08:36:09.000000','cskh');

/*Table structure for table `tb_project_user` */

DROP TABLE IF EXISTS `tb_project_user`;

CREATE TABLE `tb_project_user` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `des` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `project_id` int(8) NOT NULL,
  `user_id` int(8) NOT NULL,
  `update_time` datetime(6) NOT NULL,
  `department_id` int(8) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=227 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tb_project_user` */

insert  into `tb_project_user`(`id`,`des`,`project_id`,`user_id`,`update_time`,`department_id`) values (199,NULL,41,61,'2017-01-24 08:24:01.000000',7),(200,NULL,41,60,'2017-01-24 08:24:01.000000',7),(201,NULL,41,63,'2017-01-24 08:24:01.000000',8),(202,NULL,41,65,'2017-01-24 08:24:01.000000',6),(203,NULL,41,68,'2017-01-24 08:24:01.000000',6),(204,NULL,41,69,'2017-01-24 08:24:01.000000',6),(205,NULL,41,62,'2017-01-24 08:24:01.000000',6),(206,NULL,41,70,'2017-01-24 08:24:01.000000',9),(207,NULL,41,71,'2017-01-24 08:24:01.000000',9),(214,NULL,43,73,'2017-01-24 08:33:04.000000',NULL),(215,NULL,43,72,'2017-01-24 08:33:04.000000',NULL),(216,NULL,43,74,'2017-01-24 08:33:04.000000',NULL),(217,NULL,43,84,'2017-01-24 08:33:04.000000',NULL),(218,NULL,44,73,'2017-01-24 08:34:43.000000',NULL),(219,NULL,45,73,'2017-01-24 08:36:10.000000',NULL),(220,NULL,45,72,'2017-01-24 08:36:10.000000',NULL),(221,NULL,45,74,'2017-01-24 08:36:10.000000',NULL),(222,NULL,45,84,'2017-01-24 08:36:10.000000',NULL),(223,NULL,42,64,'2017-01-24 09:33:49.000000',8),(224,NULL,42,63,'2017-01-24 09:33:49.000000',8),(225,NULL,42,66,'2017-01-24 09:33:49.000000',6),(226,NULL,42,67,'2017-01-24 09:33:49.000000',6);

/*Table structure for table `tb_proportion_department` */

DROP TABLE IF EXISTS `tb_proportion_department`;

CREATE TABLE `tb_proportion_department` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `department_id` int(8) DEFAULT NULL,
  `project_id` int(8) DEFAULT NULL,
  `proportion` int(8) DEFAULT NULL,
  `update_time` datetime(6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=latin1;

/*Data for the table `tb_proportion_department` */

insert  into `tb_proportion_department`(`id`,`department_id`,`project_id`,`proportion`,`update_time`) values (98,7,41,15,'2017-01-24 08:24:01.000000'),(99,8,41,20,'2017-01-24 08:24:01.000000'),(100,6,41,50,'2017-01-24 08:24:01.000000'),(101,9,41,15,'2017-01-24 08:24:01.000000'),(105,10,43,100,'2017-01-24 08:33:04.000000'),(106,10,44,100,'2017-01-24 08:34:43.000000'),(107,10,45,100,'2017-01-24 08:36:10.000000'),(108,8,42,40,'2017-01-24 09:33:50.000000'),(109,6,42,60,'2017-01-24 09:33:50.000000');

/*Table structure for table `tb_role` */

DROP TABLE IF EXISTS `tb_role`;

CREATE TABLE `tb_role` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `user_id` int(8) NOT NULL,
  `department_id` int(8) NOT NULL,
  `desciption` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=130 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tb_role` */

insert  into `tb_role`(`id`,`user_id`,`department_id`,`desciption`) values (88,61,7,''),(95,64,8,''),(96,65,6,''),(97,66,6,''),(98,67,6,''),(99,68,6,''),(104,70,9,''),(105,60,7,''),(106,60,10,''),(107,73,10,''),(108,72,10,''),(109,74,10,''),(110,63,8,''),(111,75,1,''),(112,71,9,''),(117,80,15,''),(118,81,14,''),(119,77,15,''),(120,78,13,''),(121,78,14,''),(122,82,1,''),(123,83,1,''),(124,84,10,''),(125,85,14,''),(126,62,6,''),(127,62,8,''),(128,86,1,''),(129,87,6,'');

/*Table structure for table `tb_task` */

DROP TABLE IF EXISTS `tb_task`;

CREATE TABLE `tb_task` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_by` int(8) NOT NULL,
  `create_date` date NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `status` int(8) NOT NULL,
  `mission_id` int(11) NOT NULL,
  `code` text COLLATE utf8_unicode_ci NOT NULL,
  `project_id` int(8) NOT NULL,
  `completion` int(8) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tb_task` */

insert  into `tb_task`(`id`,`name`,`description`,`create_by`,`create_date`,`start_date`,`end_date`,`status`,`mission_id`,`code`,`project_id`,`completion`) values (3,'Xác thực đăng ký qua SMS.','Xác thực đăng ký qua sms, cộng tiền kích hoạt, hết tiền cộng thêm 1 lần nữa.',62,'2017-01-24','2017-01-18','2017-01-20',100,1,'411aa6feec4beffe5fd343c79e5c37ec3a5',41,100),(4,'Cài đặt cấu hình CentOS và các ứng dụng','Cài đặt, cấu hình hệ điều hành CentOS, các phần mềm mysql, php, java. Dựng server game, webgame, cms',61,'2017-01-19','2017-01-17','2017-01-20',100,7,'41706ca79528240eab18f5ffa2ebc79d3c0',41,100),(5,'Hỗ trợ cập nhật game và web','Hỗ trợ update các bản test game server, webgame, cms.',61,'2017-01-19','2017-01-20','2017-03-15',0,7,'417b7fab0dae9c6e1793efc33d9c3030b47',41,15),(6,': Mua tài khoản developer','Mua tài khoản developer',60,'2017-01-23','2017-01-20','2017-01-21',100,8,'418aaf1d0a740ddfecba83b30352352be75',41,0),(7,'Thay giao diện màn ngoài','Các màn ngoài, dialog,',65,'2017-01-24','2017-01-17','2017-01-21',100,3,'4137de85121a76f1170ebd89494a4ee6744',41,0),(8,'Game mini tài xỉu','Đưa tài xỉu ra ngoài màn hình bên ngoài',65,'2017-01-24','2017-01-20','2017-01-24',100,3,'4131351cdbe4dc27345e44603006ab07398',41,100),(9,'Sửa lỗi Game TLMN solo, so tài trí tuệ','Sửa lỗi Game TLMN solo, so tài trí tuệ',66,'2017-01-24','2017-01-24','2017-02-18',0,11,'4211252008aa2e4362dfe7babc1a5ad4c291',42,30),(10,'Tạo  5 server','Gửi thông tin động cho client hiển thị chọn server',67,'2017-01-24','2017-01-24','2017-01-24',100,10,'42106df13dc8a411fe1c795d509d58f9e96b',42,100),(11,'tạo event tết','Tạo event cho tết âm lịch',67,'2017-01-24','2017-01-24','2017-01-24',100,10,'42106f4776d447c144b3ea6d3cafb3400a13',42,100),(12,'Sửa lại một số trường hợp','Các trường hợp khi hết tiền, lệnh liên quan đến sự kiện....',65,'2017-01-24','2017-02-02','2017-02-04',0,3,'4135409f3ab1e64238dcf5c097c691f8753',41,0),(13,'Tính năng chơi ngay theo cấu hình từ admin','Đưa người chơi vào 1 game bất kỳ theo cấu hình của admin',62,'2017-01-24','2017-01-20','2017-01-21',100,1,'41198cfaf6ae9a93293b47edce2595806d3',41,0),(14,'Sửa game Tài Xỉu theo kịch bản mới','Xây dựng Bot chơi tự động, cân cửa.',62,'2017-01-24','2017-01-23','2017-01-24',100,1,'4111944034de1fd97fb794ac28866a56c83',41,100),(15,'Sửa luật game Liêng','Thêm luật Chào Liêng.',62,'2017-02-03','2017-02-03','2017-02-07',0,1,'411caebc7dc5f8271191cae45c88eebdc3b',41,30),(16,'Sửa luật chơi game Mậu Binh','Sửa lại toàn bộ luật game Mậu Binh',62,'2017-01-24','2017-02-08','2017-02-16',0,1,'411d08c3d6e7a4d1f60b8f035cd59db23d7',41,0),(17,'Kết nối thanh toán','Kết nối thanh toán thẻ nạp, sms.',62,'2017-01-24','2017-02-20','2017-02-25',0,1,'41165cf40a40e134d67813664981d3ebf2d',41,0),(18,'Sửa luật game TLMN','Sửa lại phần lượt đánh trước trong game TLMN.',62,'2017-01-24','2017-02-17','2017-02-18',0,1,'4113ff8ade39b730e9947d60e48cf88e5ed',41,0),(19,'Sửa luồng tiền in game trên Server.','Sửa in game theo kịch bản.',62,'2017-01-24','2017-02-27','2017-02-28',0,1,'4117be23639ee51a9d3962f1ea0bb2ec8b9',41,0),(20,'Fix lỗi trello','Fix những lỗi trên trello của đội test',67,'2017-01-24','2017-01-24','2017-02-28',0,10,'4210b531dd3d962eb357c29f9a7fb0124f81',42,15),(21,'Giao diện các màn ngoài','',70,'2017-01-24','2017-01-17','2017-01-20',100,17,'4117f47505762c8473c845e7ae3ee72580a8',41,0),(22,'giao diên các bàn chơi','',70,'2017-01-24','2017-01-17','2017-01-20',100,17,'41173e391915b1e8cb71ffe3632f56655481',41,0),(23,'giao diện game mini','',70,'2017-01-24','2017-01-17','2017-01-21',100,17,'41176cd60705b2718bd991d218e7cb24b0b6',41,0),(24,'giao diện dialog','',70,'2017-01-24','2017-01-17','2017-01-21',100,17,'4117b98a3a3c6d7e0ab04671ea5f423b7bc3',41,0),(25,'vẽ giao diện các màn ngoài','',70,'2017-01-24','2017-01-17','2017-01-21',100,18,'41182c70b1745dd745e14e25f1e4cbf064a4',41,0),(26,'giao diện bàn chơi','',70,'2017-01-24','2017-01-17','2017-01-21',100,18,'411834cab0f94658cfe2e26849aa610b07ba',41,0),(27,'game mini','',70,'2017-01-24','2017-01-17','2017-01-21',100,18,'4118e53520a0fb81878983f3ee8adb670137',41,0),(28,'giao diện dialog','',70,'2017-01-24','2017-01-17','2017-01-21',100,18,'4118d44312e8facf5d0e99583a82ffe726d9',41,0),(29,'Sửa giao diện game TLMN , TLMN so lo, sâm, tài xỉu','Sửa giao diện game TLMN , TLMN so lo, sâm, tài xỉu',68,'2017-01-24','2017-01-20','2017-01-23',100,4,'414c27e994d6d6534509e09373f694514c0',41,0),(30,'sửa kích thước và cắt 2 màn ngoài','',70,'2017-01-24','2017-01-23','2017-01-24',100,19,'4119de0f44aa19ed064a662c8bec18a32afc',41,100),(31,'Sửa giao diện game Mậu binh, xóc đĩa, ba cây','',68,'2017-01-24','2017-01-23','2017-01-25',100,4,'414e12b9a8180bf731d0c121e533238ebf0',41,0),(32,'Tạo quản lý các cms cho 5 server test thêm','',63,'2017-01-24','2017-02-01','2017-02-06',0,12,'4212f0f1c431aa1a745bc8a1decc80fce4c6',42,0),(33,'cộng quà , vật phẩm cho người chơi trực tiếp từ trang quản trị','',63,'2017-01-24','2017-02-06','2017-02-11',0,12,'421268c56119e9e27672109dba9aa1f43eee',42,0),(34,'Thống kê từng sự kiện của từng Server riêng biệt.','',63,'2017-01-24','2017-02-12','2017-02-18',0,12,'42128f0565333dff42355a8c16d84eaebf64',42,0),(35,'Làm game xèng hoa quả','Làm game xèng hoa quả',68,'2017-01-24','2017-02-06','2017-02-14',0,4,'414656c9c8e461ff21a8a90cd5e6eb1160e',41,0),(36,'Làm các Dialog web game theo mô hình bootstrap','Không dùng được do không phù hợp với bên client game(Huy + kiên)',63,'2017-01-24','2017-01-17','2017-01-20',100,6,'41671bb3c6081121b218e03eadd77666db3',41,0),(37,'Chia phòng free - phòng vip','Chia phòng free - phòng vip trong các game',68,'2017-01-24','2017-02-02','2017-02-03',0,4,'414aeed6b3cacbd634d2721ec94f209a4b2',41,0),(38,'Làm đạo cụ','Làm đạo cụ và hiệu ứng đạo cụ',68,'2017-01-24','2017-02-15','2017-02-16',0,4,'41460d8f77709e08ed5b59e18feeaf1d3aa',41,0),(39,'Làm Dialog Login game','',63,'2017-01-24','2017-01-21','2017-02-04',0,6,'416757e7971233c3f3ca29fad725d04b022',41,10),(40,'Làm lại game mậu binh','Làm lại game mậu binh',68,'2017-01-24','2017-02-20','2017-02-25',0,4,'4142f99cf198eab96d9fcd3b754381c7e40',41,0),(41,'Làm các Dialog game','Dialog đăng ký , đk nhanh qua fb, đổi thưởng, rút tiền ...',63,'2017-01-24','2017-02-06','2017-03-01',0,6,'416f6d3a9d8b9662f8be56e4cd2ba05fc8a',41,0),(42,'Làm lại chức năng thông mình game TLMN, solo','Làm lại chức năng thông mình game TLMN, solo',68,'2017-01-24','2017-01-26','2017-01-30',0,4,'4140426a354aa34e79d3cbe0f23e4244539',41,0),(43,'Xây dựng giao diện HTML5 cho bản web','Chuyển từ psd-> html',64,'2017-01-24','2017-02-01','2017-02-09',0,21,'4221ffcf62ec4f278f044c1e2ece1eb42c73',42,10),(44,'Sửa trang quản trị Vking','Sửa theo yêu cầu bên vận hành',63,'2017-01-24','2017-01-17','2017-03-01',0,23,'4123053dcb5eb948d4d590d58db4873c1ecb',41,0),(45,'Build web qua wordpress dựa trên giao diện đã tạo','html - > wordpress',64,'2017-01-24','2017-02-09','2017-02-15',0,21,'422188487aec70d7fc2e696acd14b1e67361',42,0),(46,'kiểm tra trả thưởng','thống kê số lượng thẻ trả thưởng cho khách, số thẻ hủy, trả thưởng đúng hay sai,',73,'2017-01-24','2017-01-01','2017-01-31',0,15,'4515281b821331a129acc3d0c8cb3bcb7696',45,0),(47,'hỗ trợ trả lời tin nhắn fanpage các game, viết bài trên fanpage, trực điện thoại','',73,'2017-01-24','2017-01-01','2017-01-31',0,15,'45151f1a4a1e655cb5a6a1796c8d47642402',45,0),(48,'Xây dựng giao diện HTML5 cho trang wap','',64,'2017-01-24','2017-02-16','2017-02-21',0,22,'422246db1819e7d0e6b0e01c9ebf251fcc34',42,0),(49,'Tiến hành chạy bản wap','',64,'2017-01-24','2017-02-21','2017-02-28',0,22,'4222569b9d507f3d96b251cd9f6e6ff61b66',42,0),(50,'CSKH - Rgame Vua bài','Nghe điện thoại và duyệt đổi thưởng',74,'2017-01-24','2017-01-01','2017-01-31',0,13,'45138d3b318b48e3ce1c708ce4a991440e78',45,0),(51,'CSKH game bài','Nghe đt, chat admin, fanpage',84,'2017-01-24','2017-01-01','2017-12-31',0,16,'4516419d386a84ab3be2019c7f85310aa60a',45,0),(52,'Sửa lỗi Khu máy móc','Sửa lỗi Khu máy móc',66,'2017-02-03','2017-02-03','2017-02-13',0,11,'4211c0051f459942e02eb20ab2ae94da76eb',42,10);

/*Table structure for table `tb_user` */

DROP TABLE IF EXISTS `tb_user`;

CREATE TABLE `tb_user` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `username` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `create_date` date DEFAULT NULL,
  `status` int(8) DEFAULT NULL,
  `account_type` int(8) NOT NULL,
  `update_time` datetime(6) DEFAULT NULL,
  `update_by` int(8) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tb_user` */

insert  into `tb_user`(`id`,`username`,`password`,`create_date`,`status`,`account_type`,`update_time`,`update_by`) values (1,'superadmin','c20ad4d76fe97759aa27a0c99bff6710','2016-12-23',1,1,NULL,NULL),(60,'cuongnv','25d55ad283aa400af464c76d713c07ad','2017-01-09',1,3,'2017-01-09 16:45:58.000000',1),(61,'quangnm','1669694125290d9366852c6b01984531','2017-01-09',1,4,'2017-01-19 09:20:27.000000',61),(62,'thanhnb','18975e581139380f26e8371b32f4514e','2017-01-09',1,3,'2017-01-24 08:27:35.000000',62),(63,'thinhlv','25d55ad283aa400af464c76d713c07ad','2017-01-09',1,4,'2017-01-24 09:31:51.000000',63),(64,'huanvm','25d55ad283aa400af464c76d713c07ad','2017-01-09',1,4,'2017-01-24 09:21:59.000000',64),(65,'tuanvn','ae1b3ca9c8b826c276127faa20879964','2017-01-09',1,4,'2017-01-24 09:06:45.000000',65),(66,'khoand','25d55ad283aa400af464c76d713c07ad','2017-01-09',1,4,'2017-01-18 17:10:02.000000',66),(67,'tuanpn','25d55ad283aa400af464c76d713c07ad','2017-01-09',1,4,'2017-01-18 17:09:13.000000',67),(68,'kiennt','62bc45081adfb02f0312dfba6c946ca2','2017-01-09',1,4,'2017-01-18 17:14:11.000000',68),(70,'hungtt','25d55ad283aa400af464c76d713c07ad','2017-01-09',1,3,'2017-01-24 09:15:53.000000',70),(71,'hoangnh','25d55ad283aa400af464c76d713c07ad','2017-01-09',1,4,'2017-01-24 09:44:54.000000',71),(72,'phuonglt','25d55ad283aa400af464c76d713c07ad','2017-01-09',1,4,'2017-01-09 16:51:10.000000',1),(73,'huonghtt','25d55ad283aa400af464c76d713c07ad','2017-01-09',1,4,'2017-01-24 09:46:02.000000',73),(74,'thanhld','25d55ad283aa400af464c76d713c07ad','2017-01-09',1,4,'2017-01-18 17:16:21.000000',74),(75,'vinhlh','25d55ad283aa400af464c76d713c07ad','2017-01-16',1,2,NULL,NULL),(77,'vanlt','25d55ad283aa400af464c76d713c07ad','2017-01-16',1,3,'2017-01-16 11:30:07.000000',1),(78,'hangnt','25d55ad283aa400af464c76d713c07ad','2017-01-16',1,3,'2017-01-16 11:30:55.000000',1),(80,'thuonglt','25d55ad283aa400af464c76d713c07ad','2017-01-16',1,4,NULL,NULL),(81,'hoaht','25d55ad283aa400af464c76d713c07ad','2017-01-16',1,4,'2017-01-16 13:07:52.000000',81),(82,'tupn','25d55ad283aa400af464c76d713c07ad','2017-01-18',1,2,NULL,NULL),(83,'dailt','25d55ad283aa400af464c76d713c07ad','2017-01-18',1,2,NULL,NULL),(84,'huyenntt','25d55ad283aa400af464c76d713c07ad','2017-01-18',1,4,'2017-01-24 09:40:50.000000',84),(85,'anhltl','25d55ad283aa400af464c76d713c07ad','2017-01-18',1,4,NULL,NULL),(86,'cuongvd','25d55ad283aa400af464c76d713c07ad','2017-02-02',1,2,NULL,NULL),(87,'huytv','25d55ad283aa400af464c76d713c07ad','2017-02-03',1,4,NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
