-- ไฟล์สร้างตารางข้อมูล

-- ตารางสำหรับเก็บข้อมูลแผนกพนักงาน
CREATE TABLE ams_department (
    dep_id int(11) NOT NULL AUTO_INCREMENT COMMENT 'ไอดีแผนก',
    dep_name varchar(255) NOT NULL COMMENT 'ชื่อแผนก',
    PRIMARY KEY (dep_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ตารางข้อมูลแผนก';
-- สร้างตาราง ams_department เอาไว้เก็บไอดีแผนกและชื่อแผนก

INSERT INTO `ams_department` (`dep_id`, `dep_name`) VALUES
(1, 'ธุรการ'),
(2, 'บัญชี'),
(3, 'การตลาด');
-- เพิ่มข้อมูลเริ่มต้นลงในตารางแผนก

CREATE TABLE `ams_type` (
  `typ_id` INT NOT NULL AUTO_INCREMENT COMMENT 'ไอดีประเภท',
  `typ_name` VARCHAR(255) NOT NULL COMMENT 'ชื่อประเภท',
  PRIMARY KEY (`typ_id`)
) ENGINE = InnoDB DEFAULT CHARSET=utf8 COMMENT='ตารางข้อมูลประเภทครุภัณฑ์';
-- สร้างตาราง ams_type เอาไว้เก็บไอดีประเภทและชื่อประเภท

INSERT INTO `ams_type` (`typ_id`, `typ_name`) VALUES
(1, 'เครื่องใช้ไฟฟ้า'),
(2, 'อุปกรณ์ไอที'),
(3, 'เฟอร์นิเจอร์'),
(4, 'ยานพาหนะ');

-- เพิ่มข้อมูลเริ่มต้นเข้าไปในตารางประเภทครุภัณฑ์

CREATE TABLE `ams_category` (
  `cat_id` INT NOT NULL AUTO_INCREMENT COMMENT 'ไอดีหมวดหมู่',
  `cat_code` INT NOT NULL COMMENT 'เลขหมวดหมู่',
  `cat_name` VARCHAR(255) NOT NULL COMMENT 'ชื่อหมวดหมู่',
  `cat_typ_id` INT NOT NULL COMMENT 'ไอดีประเภท',
  PRIMARY KEY (`cat_id`)
) ENGINE = InnoDB DEFAULT CHARSET=utf8 COMMENT='ตารางข้อมูลหมวดหมู่';
-- สร้างตาราง ams_category เอาไว้เก็บไอดีหมวดหมู่ เลขหมวดหมู่ ชื่อหมวดหมู่ และไอดีประเภท

INSERT INTO `ams_category` (`cat_id`, `cat_code`, `cat_name`, `cat_typ_id`) VALUES
(1, 1, 'พัดลม', 1),
(2, 2, 'เครื่องปรับอากาศ', 1),
(3, 3, 'ตู้เย็น', 1),
(4, 1, 'รถยนต์', 4),
(5, 2, 'รถจักรยานยนต์', 4),
(6, 1, 'โน๊ตบุ๊ค', 2),
(7, 2, 'เมาส์', 2),
(8, 3, 'คีย์บอร์ด', 2),
(9, 4, 'แฟลชไดร์ฟ', 2),
(10, 5, 'หูฟัง', 2),
(11, 1, 'โซฟา', 3),
(12, 2, 'โต๊ะ', 3),
(13, 3, 'เก้าอี้', 3);


-- เพิ่มข้อมูลเริ่มต้นเข้าไปในตาราง ams_category

CREATE TABLE `ams_formula` (
  `for_id` INT NOT NULL AUTO_INCREMENT COMMENT 'ไอดีสูตรคำนวณ',
  `for_name` VARCHAR(255) NOT NULL COMMENT 'ชื่อสูตรคำนวณ',
  PRIMARY KEY (`for_id`)
) ENGINE = InnoDB DEFAULT CHARSET=utf8 COMMENT='ตารางข้อมูลสูตรคำนวณ';
-- สร้างตาราง ams_formula เอาไว้เก็บข้อมูลไอดีสูตรคำนวณและชื่อสูตรคำนวณ
-- สูตรคำนวณค่าเสื่อมราคาแบบเส้นตรงกับลดยอด

INSERT INTO `ams_formula` (`for_id`, `for_name`) VALUES
(1, 'สูตรเส้นตรง'),
(2, 'สูตรลดยอด');
-- เพิ่มข้อมูลเริ่มต้นเข้าไปในตาราง ams_formula

CREATE TABLE `ams_status` (
  `sta_id` INT NOT NULL AUTO_INCREMENT COMMENT 'ไอดีสถานะ',
  `sta_name` VARCHAR(255) NOT NULL COMMENT 'ชื่อสถานะ',
  PRIMARY KEY (`sta_id`)
) ENGINE = InnoDB DEFAULT CHARSET=utf8 COMMENT='ตารางข้อมูลสถานะ';
-- สร้างตาราง ams_status เอาไว้เก็บไอดีสถานะและชื่อสถานะของครุภัณฑ์

INSERT INTO `ams_status` (`sta_id`, `sta_name`) VALUES
(1, 'ว่าง'),
(2, 'ถูกยืม'),
(3, 'เลิกใช้งาน');
-- เพิ่มข้อมูลสถานะลงในตาราง ams_formula

CREATE TABLE `ams_asset` (
  `ast_id` INT AUTO_INCREMENT NOT NULL COMMENT 'ไอดีครุภัณฑ์',
  `ast_code` VARCHAR(255) NOT NULL COMMENT 'เลขทะเบียนครุภัณฑ์',
  `ast_name` VARCHAR(255) NOT NULL COMMENT 'ชื่อครุภัณฑ์',
  `ast_price` FLOAT NOT NULL COMMENT 'ราคา',
  `ast_scrap` FLOAT NOT NULL COMMENT 'ค่าซาก',
  `ast_begin` DATE NOT NULL COMMENT 'วันที่ซื้อ',
  `ast_end` DATE NULL COMMENT 'วันที่เลิกใช้งาน',
  `ast_lifespan` INT NOT NULL COMMENT 'อายุการใช้งาน(เดือน)',
  `ast_detail` VARCHAR(255) NOT NULL COMMENT 'รายละเอียด',
  `ast_cat_id` INT NOT NULL COMMENT 'ไอดีหมวดหมู่',
  `ast_for_id` INT NOT NULL COMMENT 'ไอดีสูตรคำนวณค่าเสื่อมราคา',
  `ast_sta_id` INT NOT NULL COMMENT 'ไอดีสถานะ',
  PRIMARY KEY (`ast_id`)
) ENGINE = InnoDB DEFAULT CHARSET=utf8 COMMENT='ตารางข้อมูลครุภัณฑ์';
-- สร้างตาราง ams_asset จะเอาไว้เก็บข้อมูลไอดีครุภัณฑ์ เลขทะเบียนครุภัณฑ์ ราคา ค่าซาก วันที่ซื้อ วันที่เลิกใช้งาน 
-- อายุการใช้งาน รายละเอียด ไอดีหมวดหมู่ ไอดีสูตรคำนวณ และไอดีสถานะ
INSERT INTO `ams_asset` (`ast_id`, `ast_code`, `ast_name`, `ast_price`, `ast_scrap`, `ast_begin`, `ast_end`, `ast_lifespan`, `ast_detail`, `ast_cat_id`, `ast_for_id`, `ast_sta_id`) VALUES

-- พัดลม
(1, '6301010001', 'พัดลมไอเย็น HATARI AC TURBO1', '5000', '1', '2020-01-09', NULL, '5', 'HATARI AC TURBO1 32 ลิตร สีขาว', '1', '1', '1'),

-- แอร์
(2, '6301020001', 'เครื่องปรับอากาศ รุ่น AR24TYHZ', '9000', '1', '2020-01-08', NULL, '10', 'เครื่องปรับอากาศ (21500 BTU, Inverter)', '2', '1', '1'),

-- โน๊ตบุ๊ค
(3, '6302010001', 'Notebook DELL XPS', '107900', '5000', '2021-11-22', NULL, '5', '17.0 inch / Intel i7-11800H / 16GB DDR4/ 1TB SSD / GeForce RTX 3050 4GB', '6', '1', '1'),
(4, '6302020003', 'Notebook DELL XPS', '107900', '5000', '2021-11-22', NULL, '5', '17.0 inch / Intel i7-11800H / 16GB DDR4/ 1TB SSD / GeForce RTX 3050 4GB', '6', '1', '1'),

-- เมาส์
(5, '6302002001', 'Dconnexion: SpaceMouse', '12844', '8900', '2020-01-09', NULL, '5', 'Product details of 3Dconnexion: SpaceMouse Pro Wireless', '7', '2', '1'),
(6, '6302020002', 'LOGITECH MOUSE WIRELESS', '7237', '4500', '2020-01-15', NULL, '5', 'LOGITECH G502 LIGHTSPEED เมาส์บลูทูธ Mouse Wireless', '7', '2', '1'),
(7, '6302020003', 'MOUSE LOGITECH G PRO X ("WHITE)', '4831', '500', '2020-01-08', NULL, '5', 'WIRELESS MOUSE LOGITECH G PRO X SUPERLIGHT GAMING WHITE', '7', '2', '1'),
(8, '6302020004', 'HP M160 Wired Mouse', '1550', '500', '2020-01-31', NULL, '5', 'เมาส์มีสายคุณภาพระดับสูงRazer DeathAdder Essential Wired Gaming Mouse', '7', '2', '1'),

-- ยานพนะ
(9, '6304050001', 'Honda Civic', '950000', '1', '2020-10-08', NULL, '20', 'PCX2020 150cc', '4', '2', '1'),
(10, '6304050002', 'HONDA CITY', '600000', '10000', '2020-06-18', NULL, '20', 'HONDA CITY HATCHBACK', '4', '2', '1'),
(11, '6304050003', 'Ford mustang', '6000000', '50000', '2020-09-28', NULL, '20', 'Ford mustang ยุค 60 ขุมพลังงานไฟฟ้า', '4', '2', '1'),

-- คีย์บอร์ด
(12, '6302030001', 'KEYBOARD (คีย์บอร์ด) ARROW X YDK-SK-K8620', '250', '10', '2020-11-22', NULL, '3', 'Rubber Dome English / Thai Legend (Font) USB 2.0', '8', '1', '1'),
(13, '6302030002', 'KEYBOARD (คีย์บอร์ด) DELL BUSINESS MULTIMEDIA KB522', '720', '50', '2020-11-22', NULL, '3', 'Keys Qty : 104 • Keycap Font : English/Thai • Connectivity : USB-A (Wired)', '8', '1', '1'),
(14, '6302030003', 'KEYBOARD WIRELESS (คีย์บอร์ดไร้สาย) RAPOO KB-E1050-BK (BLACK)', '490', '20', '2020-11-22', NULL, '3', 'FEATURES : KEYBOARD WIRELESS', '8', '1', '1');




CREATE TABLE `ams_employee` (
  `emp_id` INT NOT NULL  AUTO_INCREMENT COMMENT 'ไอดีพนักงาน',
  `emp_code` VARCHAR(255) NOT NULL COMMENT 'รหัสพนักงาน',
  `emp_full_name` VARCHAR(255) NOT NULL COMMENT 'ชื่อ',
  `emp_email` VARCHAR(255) NOT NULL COMMENT 'อีเมล',
  `emp_password` VARCHAR(255) NULL COMMENT 'รหัสผ่าน',
  `emp_dep_id` INT NOT NULL COMMENT 'ไอดีแผนก',
  PRIMARY KEY (`emp_id`)
) ENGINE = InnoDB DEFAULT CHARSET=utf8 COMMENT='ตารางข้อมูลพนักงาน';
-- สร้างตาราง ams_employee จะเอาไว้เก็บข้อมูลไอดีพนักงาน รหัสพนักงาน ชื่อ อีเมล รหัสผ่าน และไอดีแผนก

INSERT INTO `ams_employee` (`emp_id`, `emp_code`, `emp_full_name`, `emp_email`, `emp_password`, `emp_dep_id`) VALUES
(1, '63160020', 'พิทักษ์ ทองใบ', '63160020@go.buu.ac.th', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', '1'),
(2, '63160094', 'พงศธร บุญธรรม', '63160094@go.buu.ac.th', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', '1'),
(3, '63160247', 'เบญจมาศ กรโสภา', '63160247@go.buu.ac.th', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', '1'),
(4, '63160248', 'ปฏิภาณ ปั้นสง่า', '63160248@go.buu.ac.th', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', '1'),
(5, '63160262', 'วัชรพงศ์ ซื่อตรง', '63160262@go.buu.ac.th', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', '1'),
(6, '63160265', 'สิรภัทร ตันเสวตวงษ์', '63160265@go.buu.ac.th', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', '1'),
(7, '63160289', 'จุลานนท์ สยามล', '63160289@go.buu.ac.th', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', '1'),
(8, '63160999', 'ขจรศักดิ์ ผักใบเขียว', '63160999@go.buu.ac.th', NULL, '3'),
(9, '63160998', 'จุฑามณี เทพสุวรรณ', '63160998@go.buu.ac.th', NULL, '3'),
(10, '63160234', 'กิติวัฒน์ อรุญวงษ์', '63160234@go.buu.ac.th', NULL, '3'),
(11, '63160996', 'จิรายุทธ บุญมั่น', '63160997@go.buu.ac.th', NULL, '3');
-- เพิ่มข้อมูลเริ่มต้นเข้าไปในตาราง ams_employee

CREATE TABLE `ams_circulation` (
  `cir_id` INT NOT NULL  AUTO_INCREMENT COMMENT 'ไอดีการยืม-คืน',
  `cir_borrow` DATE NOT NULL COMMENT 'วันที่ยืม',
  `cir_return` DATE NULL COMMENT 'วันที่คืน',
  `cir_ast_id` INT NOT NULL COMMENT 'ไอดีครุภัณฑ์',
  `cir_emp_id` INT NOT NULL COMMENT 'ไอดีพนักงาน',
  PRIMARY KEY (`cir_id`)
) ENGINE = InnoDB DEFAULT CHARSET=utf8 COMMENT='ตารางข้อมูลการยืม-คืนครุภัณฑ์';
-- สร้างตาราง ams_circulation ไว้เก็บข้อมูลไอดีการยืม-คืน วันที่ยืม วันที่คืน ไอดีครุภัณฑ์ และไอดีพนักงาน
-- INSERT INTO `ams_circulation` (`cir_id`, `cir_borrow`, `cir_return`, `cir_ast_id`, `cir_emp_id`) VALUES
-- (NULL, '2022-02-01', NULL, 4, 10);


CREATE TABLE `ams_image` (
  `img_id` INT NOT NULL AUTO_INCREMENT COMMENT 'ไอดีภาพ',
  `img_name` VARCHAR(255) NOT NULL COMMENT 'ชื่อภาพ',
  `img_ast_id` INT NOT NULL COMMENT 'ไอดีครุภัณฑ์',
  PRIMARY KEY (`img_id`)
) ENGINE = InnoDB DEFAULT CHARSET=utf8 COMMENT='ตารางข้อมูลรูปภาพครุภัณฑ์';
-- สร้างตาราง ams_image ไว้เก็บไอดีของภาพ ชื่อภาพ และไอดีของครุภัณฑ์