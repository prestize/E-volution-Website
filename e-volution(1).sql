-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2022 at 06:27 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-volution`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `requestedText` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `addproduct`
--

CREATE TABLE `addproduct` (
  `brandID` int(11) NOT NULL,
  `model` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `overview` varchar(2000) NOT NULL,
  `warranty` int(11) NOT NULL,
  `location` varchar(500) NOT NULL,
  `lwh` varchar(500) NOT NULL,
  `seat` int(11) NOT NULL,
  `torque` varchar(100) NOT NULL,
  `features` varchar(1000) NOT NULL,
  `color1` varchar(100) NOT NULL,
  `color2` varchar(100) DEFAULT NULL,
  `color3` varchar(100) DEFAULT NULL,
  `color4` varchar(100) DEFAULT NULL,
  `brochure` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `content` varchar(1500) NOT NULL,
  `link` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `numOfProducts` int(11) NOT NULL DEFAULT 0,
  `numOfProductsSold` int(11) NOT NULL DEFAULT 0,
  `rating` int(11) NOT NULL DEFAULT 0 COMMENT 'up to 5'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `numOfProducts`, `numOfProductsSold`, `rating`) VALUES
(1, 'toyota', 0, 0, 0),
(2, 'mitsubishi', 0, 0, 0),
(3, 'kia', 0, 0, 0),
(4, 'honda', 0, 0, 0),
(5, 'mazda', 0, 0, 0),
(6, 'ford', 0, 0, 0),
(7, 'hyundai', 0, 0, 0),
(8, 'nissan', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `name` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(300) NOT NULL,
  `message` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `featured`
--

CREATE TABLE `featured` (
  `featured#` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `featured`
--

INSERT INTO `featured` (`featured#`, `prod_id`) VALUES
(7, 100),
(1, 102),
(5, 107),
(6, 108),
(2, 111),
(4, 111),
(8, 113),
(3, 114);

-- --------------------------------------------------------

--
-- Table structure for table `onsale`
--

CREATE TABLE `onsale` (
  `onSale#` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `onsale`
--

INSERT INTO `onsale` (`onSale#`, `prod_id`) VALUES
(7, 102),
(8, 103),
(5, 105),
(1, 107),
(2, 108),
(6, 112),
(3, 113),
(4, 115);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderNum` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `orderedDate` date NOT NULL DEFAULT current_timestamp(),
  `name` varchar(500) DEFAULT NULL,
  `email` varchar(500) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `preference` varchar(100) DEFAULT NULL,
  `message` varchar(2000) DEFAULT NULL,
  `color` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'NEW'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `model` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `orig_price` int(11) DEFAULT 0,
  `commission` float NOT NULL DEFAULT 0,
  `discount` float NOT NULL DEFAULT 0 COMMENT 'in percent',
  `num_purchases` int(100) NOT NULL DEFAULT 0,
  `overview` varchar(2000) NOT NULL,
  `warranty` int(11) NOT NULL DEFAULT 0 COMMENT 'in years',
  `rating` int(11) NOT NULL DEFAULT 0 COMMENT 'up to 5',
  `location` varchar(100) NOT NULL DEFAULT 'Manila, Philippines',
  `lwh` varchar(100) DEFAULT NULL COMMENT 'lengthxwidthxheight',
  `seat_capacity` int(11) DEFAULT NULL,
  `torque` varchar(50) DEFAULT NULL,
  `features` varchar(500) DEFAULT NULL,
  `color1Name` varchar(100) DEFAULT NULL,
  `color2Name` varchar(100) DEFAULT NULL,
  `color3Name` varchar(100) DEFAULT NULL,
  `color4Name` varchar(100) DEFAULT NULL,
  `image1` varchar(200) DEFAULT NULL,
  `image2` varchar(200) DEFAULT NULL,
  `image3` varchar(200) DEFAULT NULL,
  `image4` varchar(200) DEFAULT NULL,
  `brochure` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `brand_id`, `model`, `type`, `orig_price`, `commission`, `discount`, `num_purchases`, `overview`, `warranty`, `rating`, `location`, `lwh`, `seat_capacity`, `torque`, `features`, `color1Name`, `color2Name`, `color3Name`, `color4Name`, `image1`, `image2`, `image3`, `image4`, `brochure`) VALUES
(100, 1, 'Corolla Cross 1.8 V Hybrid', 'Hybrid Electric Vehicle', 1665000, 83250, 0, 25, 'The Toyota Corolla Cross comes into the Philippine automotive market available with two variants. Based on the Toyota Corolla Altis, the new crossover brings with it a higher ride height and two available powertrain options. Similar to its sedan counterpart it can be had with either a 1.8-liter naturally aspirated gasoline engine or a 1.8-liter hybrid power plant. Both of these engines are available with only a CVT which exclusively sends power to the front wheels.', 3, 4, 'Manila, Philippines', '4460mm x 1825mm x 1620mm', 5, '172 / 4000 Nm/Rpm', '8-way Power Adjust Driver\'s seat.\r\n8\" with Apple Carplay + Android Auto + Smart Device Link (SDL).\r\nBi-beam LED Headlamps.\r\n12V Socket: 1 + Rear USB: 2 Accesory Outlets.\r\nRain-sensing Windshield Wiper.\r\nFront: 2 + Rear: 4 Clearance and Back Sonar.', 'Metal Stream Metallic', 'Attitude Black Mica', 'Platinum White Pearl Mica', NULL, 'https://i.imgur.com/ObmTqzW.jpg', 'https://i.imgur.com/ZabIJUz.jpg', 'https://i.imgur.com/FdDXq3F.jpg', NULL, 'https://d3ggoe3aghc7um.cloudfront.net/uploads/vehicles/27/001_27_1646212394056_000.pdf'),
(101, 1, 'Corolla Altis 1.8 V Hybrid CVT', 'Hybrid Electric Vehicle', 1610000, 80500, 0, 11, 'The Toyota New Global Architecture or TNGA is one of our latest technologies which stands by our commitment of making ever-better cars. The Corolla Altis marks Toyota’s next generation of platform in the pursuit of innovation to help achieve optimum drivability for customers in terms of agility, visibility, and stability.\r\n\r\nToyota gives you the full benefit of advanced Hybrid Technology: seamlessly combining\r\nan efficient gasoline engine and a high-output electric motor that self-charges for maximum fuel mileage.', 3, 3, 'Manila, Philippines', '4630mm x 1780mm x 1455mm', 5, '142 / 3600 Nm/Rpm', 'VVT-I, 4-Cylinder In-Line DOHC, 16 Valve + Electric Motor.\r\nContinuous Variable Transmission.\r\n7\" Color Multi-Information Display.\r\nElectronic Parking Brake (EPB) with Brake Hold.\r\nToyota Safety Sense.\r\nBi-Beam LED.\r\n', 'Platinum White Pearl Mica', 'Celestite Gray Metallic', 'Attitude Black Mica', 'Silver Metallic 1', 'https://i.imgur.com/lw1HBzN.jpg', 'https://i.imgur.com/3k54jcL.jpg', 'https://i.imgur.com/pg4LgRY.jpg', 'https://i.imgur.com/f1En30i.jpg', 'https://d3ggoe3aghc7um.cloudfront.net/uploads/vehicles/2/001_2_1632305816296_000.pdf'),
(102, 1, 'Camry 2.5 V HEV ', 'Hybrid Electric Vehicle', 2350000, 117500, 5000, 8, 'Superior driving and prestige riding meets Hybrid Electric Vehicle technology. Lead a new class of excellence that builds a great legacy for sustainability.\r\n\r\nThe Camry draws more attention than your average sedan with its captivating style and powerful stance.\r\n\r\nThe Camry’s interior is smart and ergonomic in the most luxurious way. It\'s trimmed with top-quality materials – from the black and brown soft leather seats, to the door panels, even on the console box lid.\r\n', 3, 5, 'Manila, Philippines', '4460mm x 1825mm x 1620mm', 5, '172 / 4000 Nm/Rpm', 'Superior driving and prestige riding meets Hybrid Electric Vehicle technology. Lead a new class of excellence that builds a great legacy for sustainability.\r\n\r\nThe Camry draws more attention than your average sedan with its captivating style and powerful stance.\r\n\r\nThe Camry’s interior is smart and ergonomic in the most luxurious way. It\'s trimmed with top-quality materials – from the black and brown soft leather seats, to the door panels, even on the console box lid.\r\n', 'Platinum White Pearl Mica', 'Attitude Black Mica', 'Metal Stream Metallic', 'Graphite Metallic', 'https://i.imgur.com/DmAgw1O.jpg', 'https://i.imgur.com/HwHJYPj.jpg', 'https://i.imgur.com/glrbZXG.jpg', 'https://i.imgur.com/ymKfaEp.jpg', 'https://d3ggoe3aghc7um.cloudfront.net/uploads/vehicles/38/001_38_1639194784087_000.pdf'),
(103, 2, 'Outlander PHEV', 'Plug-in Hybrid Electric Vehicle', 2998000, 149900, 0, 30, 'Take the wheel and steer towards the future now with the new Mitsubishi Outlander PHEV – a combination of the eco-friendly and quiet performance of a plug-in hybrid EV, off-road capability of a 4WD and reliable power of an SUV to give you one-of-a-kind driving pleasure.\r\n\r\nA groundbreaking Plug-in Hybrid Electric Vehicle [PHEV] that uses both electricity and gas to provide incredible efficiency and a smooth ride without compromising power, control and comfort. The future of mobility is ready to take you to new adventures in and out the city.', 5, 5, 'Manila, Philippines', '4695mm x 1800mm x 1710mm', 7, '199/4500 Nm/Rpm', '8-Way Power Adjustable Driver Seat.\r\n8-Way Power Adjustable Passenger Seat.\r\n8.0\" Smartphone-link Display Audio (SDA).\r\nDC Fast Charging Capability.\r\nFAST-Key Entry System.\r\nForward Collision Mitigation (FCM) with Pedestrian Detection.\r\nHeated Power Side Mirrors.\r\nTwin Motor Super All-Wheel Control (S-AWC).', 'White Pearl', 'Red Diamond', 'Ruby Black Pearl', NULL, 'https://i.imgur.com/zSkECwI.jpg', 'https://i.imgur.com/bCScBni.jpg', 'https://i.imgur.com/oBByaST.jpg', NULL, 'https://www.mitsubishi-motors.com.ph/content/dam/mitsubishi-motors-ph/images/brochures/Outlander-PHEV.pdf'),
(104, 3, 'Niro EV', 'Fully Electric Vehicle', 1919520, 95976, 0, 16, 'Niro EV is a fully-electric vehicle and uses a powerful electric motor and high capacity lithium-Ion battery to drive the car, without the need for a traditional internal combustion engine. This means Niro EV delivers impressive range, power and instant acceleration whilst also producing zero tailpipe emissions. The battery is charged through a plug on the front of the Niro. Instead of refueling at the petrol station, you simply recharge at home, at work, or at one of the growing number of public charging points across the country. Through regular driving, the electric motor is fed otherwise lost braking energy, captured by the vehicle\'s regenerative braking system. The EV also features a smart regeneration system, which further assists in improving driving efficiency. The system helps minimize unnecessary operation of the brake and acceleration pedals, by using the front radar to detect and regulate the level of regenerative braking based on what is detected in front.', 7, 4, 'Manila, Philippines', '4375mm x 1805mm x 1570mm', 5, '395/3600 Nm/Rpm', '0-239 Miles of EPA-Estimated Range.\r\n201 Horsepower 291 lb.-ft. of torque Electric Drive Motor.\r\nDC Fast Charging capability.\r\nVoice-Command Navigation System w/10.25-inch Touchscreen Display.\r\nHarmon Kardon® Premium Audio.\r\nApple CarPlay® & Android Auto™.\r\nForward Collision-Avoidance Assist-Ped (FCA-Ped) & Forward Collision-Avoidance Assist-Cyc (FCA-Cyc).\r\nBlind-Spot Collision Warning (BCW).', 'Steel Gray', 'Runway Red', 'Gravity Blue', NULL, 'https://i.imgur.com/Wdh6NFC.jpg', 'https://i.imgur.com/s7YF4RE.jpg', 'https://i.imgur.com/lzjwERG.jpg', NULL, 'https://www.kia.com/content/dam/kwcms/au/en/images/pdf/niro/kia-niro-brochure.pdf'),
(105, 3, 'Sorento PHEV', 'Plug-in Hybrid Electric Vehicle', 2356576, 117828, 30000, 23, 'Outstanding power, extended mileage, confidence the all-new plug-in hybrid (PHEV) gives you all the great qualities of Sorento, plus more 2nd-row legroom than any plug-in hybrid SUV 4 and the longest all-electric range of any plug-in hybrid three-row.\r\n\r\nMore powerful electric motor combined with the PHEV’s higher-capacity battery results in greater horsepower, quick acceleration, and up to a 32-mile electric-only range on a full charge.\r\n\r\n261-HP TURBO PHEV POWERTRAIN supplies impressive power, courtesy of a hybrid-optimized turbocharged GDI engine paired with a powerful electric motor and potent battery.', 5, 3, 'Manila, Philippines', '1694mm x 4800mm x 1900mm', 5, '258 lb.-ft. combined', '261 combined hp with an EPA-estimated 79 MPGe.\r\n460 miles range fully fueled, 32 miles all-electric range (fully charged)\r\nThe most passenger room and second-row legroom of any plug-in hybrid SUV available.\r\n', 'Sapphire Blue', 'Wolf Gray', 'Aruba Green', NULL, 'https://i.imgur.com/vOn9k7S.jpg', 'https://i.imgur.com/eSY7LLD.jpg', 'https://i.imgur.com/3flasN1.jpg', NULL, 'https://www.kia.com/content/dam/kia/us/brochures/brochure_sorento_2022.pdf'),
(106, 3, 'EV6', 'Fully Electric Vehicle', 2160000, 108000, 0, 17, 'Kia EV6 – a car that with its up to 328 mile range lets you explore more of what\r\nthe world has to offer. Along with fast charging speeds that give you more time\r\nto create something new: the Kia EV6 takes as little as 18 minutes to charge from\r\n10 to 80%, giving you more time to spend on things that matter to you most.\r\n\r\nThe EV6 combines a huge real-world range with the ability to charge at speeds that no rival can keep up with, addressing two of the biggest concerns that people still have about electric\r\ncars. What’s more, by using bespoke electric underpinnings rather than a set that’s shared by petrol and diesel models, Kia has been able to take advantage of the compact size of electric motors and produce a car that’s hugely spacious and practical.', 10, 2, 'Manila, Philippines', '4680mm x 1880mm x 1550mm', 5, '605 Nm', 'Free seven-year Kia Connect (UVO).\r\nElectric Global Modular Platform (E-GMP).\r\nVehicle-to-load (V2L).\r\nVelour carpet mats.\r\n', 'Runway Red', 'White Pearl', 'Midnight Black', 'Yacht Blue', 'https://i.imgur.com/b4DoF62.jpg', 'https://i.imgur.com/MlgBE2T.jpg', 'https://i.imgur.com/1maAC71.jpg', 'https://i.imgur.com/pDTqKEp.jpg', 'https://www.kia.com/content/dam/kwcms/kme/uk/en/assets/static/utility/brochure/The%20Kia%20EV6%20-%20Your%20guide%20to%20electric%20driving.pdf'),
(107, 4, 'E', 'Fully Electric Car', 1900000, 95000, 20000, 9, 'The Honda e may work like an automatic but with its single fixed ratio, pressing the accelerator pedal gives a smooth and instant response. A power output of 154PS and 315Nm of torque, matched with 50:50 weight distribution and a low centre of gravity, delivers a sporty yet comfortable drive. And if you’d like a more exhilarating experience, switching to Sport mode significantly increases acceleration response.\r\n\r\nTurning on Single Pedal Control, allows you to drive with even more enjoyment and ease. Using just one pedal, you can accelerate and decelerate by pushing your foot down to go and taking it off to brake. It’s that simple.\r\n\r\nSpace is scarce around town, but with a turning radius of only 4.3m, the Honda e is highly maneuverable and agile, perfect for narrow and twisty streets; and with the added assistance from the Honda Parking Pilot, you can make the most of the city and enjoy every drive.', 3, 5, 'Manila, Philippines', '3894mm x 1753mm x 1512mm', 4, '315 Nm', 'The instrument panel, which extends the full width of the interior, consists of five screens, including one dedicated 8.8 in (220 mm) instrument display in front of the driver and two large 12.3 in (310 mm) infotainment touchscreen displays flanked by two smaller 6 in (150 mm) displays for what Honda calls its Side Camera Mirror System.\r\nThe dual infotainment displays can independently run separate applications and are swappable; they support both Android Auto and Apple CarPlay.', 'Platinum White Pearl', 'Modern Steel Metallic', 'Premium Crystal Blue Metallic', NULL, 'https://i.imgur.com/vNgrkLV.jpg', 'https://i.imgur.com/I8uo5I5.jpg', 'https://i.imgur.com/bgbh9Zw.jpg', NULL, 'https://live.dealer-asset.co/ie33/product/file/New-Honda-e-Brochure-20YM.pdf'),
(108, 5, 'CX-30', 'M Hybrid Electric Vehicle', 1490000, 74500, 10000, 5, 'The Mazda CX-30 can now be had with M Hybrid technology. Not only does this technology ensure a smoother and pleasurable drive, but it also improves your fuel efficiency and reduces carbon dioxide emission by maximizing every pinch of kinetic energy that you generate when braking.\r\nAs the embodiment of Evolved KODO: Soul of Motion Design, the Mazda CX-30 is the result of the close collaboration between designers and engineers to produce the most alluring shape and form that a crossover can assume. Sleek, bold, desirable, and undeniably beautiful. A true work of art.\r\n', 3, 5, 'Manila, Philippines', '4395mm x 1795mm x 1540mm', 5, '200 / 4000 Nm/Rpm', 'MAZDA CONNECT.\r\nE-Skyactiv G M HYBRID ENGINE.\r\n2.0/2.5L ENGINE.\r\nDrivetrain.', 'Soul Red Crystal', 'Machine Gray', 'Snowflake White Pearl', 'Deep Crystal Blue', 'https://i.imgur.com/ZrLp0zp.jpg', 'https://i.imgur.com/BZFOHAM.jpg', 'https://i.imgur.com/OUgGYT0.jpg', 'https://i.imgur.com/miBXZy4.jpg', 'https://imgcdn.zigwheels.ph/brochures/21/2169/mazda-cx-30-317843.pdf'),
(109, 6, 'F-150 Lightning Pro', 'Fully Electic Vehicle', 3398000, 169900, 0, 6, 'More than you ever imagined from an all-electric future. A new age for Ford F-150 is here. Electric powered with your life in mind. All the backup power you need to keep the house running from your truck - for up to 3 days. With 14.1 cubic feet, it\'s the largest sealed front trunk of any all-electric pickup. Advanced technology calculates payload, grade, even weather and traffic, to help predict how much energy you might use.', 8, 4, 'Manila, Philippines', '5910mm x 2438mm x 2004mm', 5, '775 lb.-ft.', 'Dual eMotor all-electric powertrain with standard four-wheel drive, Standard-Range Battery (426 HP / 775 LB-FT TQ) or Extended-Range Battery (563 HP / 775 LB-FT TQ).\nTargeted EPA-estimated EV Range of up to 230 Miles (Standard-Range Battery) and 320 Miles (Extended-Range Battery) with Level 2/Level 3 Fast-Charging Capabilities.\nTargeted 10,000-pound Max Towing Capacity and 2,000-pounds Max Payload Capacity.', 'Stone Gray Metallic', 'Agate Black', NULL, NULL, 'https://i.imgur.com/MiGF3Uu.jpg', 'https://i.imgur.com/Bcfian1.jpg', NULL, NULL, 'https://media.ford.com/content/dam/fordmedia/North%20America/US/product/2022/f-150-lightning/pdf/F-150_Lightning_Tech_Specs.pdf'),
(110, 6, 'Escape SE Hybrid', 'Hybrid Electric Vehicle', 1490000, 74500, 0, 4, 'Escape SE models offer you options: Plug-in Hybrid, Hybrid (AWD available), or 1.5L EcoBoost (AWD available). Every SE has voice-activated SYNC 3 with the 8\" LCD capacitive touchscreen.1 The available Convenience Package gives you an 8-way power driver’s seat, LED signature lighting, a power liftgate and more. The available Cold Weather Package adds a few creature comforts like a heated steering wheel and heated front seats.', 5, 5, 'Manila, Philippines', '4584mm x 1678mm x 1998mm', 5, '80 lb.-ft.', '17-inch alloy wheels.\r\nChrome exterior trim.\r\nKeyless ignition and entry.\r\n8-inch touchscreen.\r\nDual-zone automatic climate control.\r\nSix-speaker sound system.\r\nApple CarPlay and Android Auto compatibility.', 'Oxford White', 'Iconic Silver Metallic', 'Agate Black Metallic', NULL, 'https://i.imgur.com/vYjIgZQ.jpg', 'https://i.imgur.com/Yx0oMoW.jpg', 'https://i.imgur.com/VaN9mbB.jpg', NULL, 'https://www.ford.com/aemservices/brand/api/nameplate/brochure?region=US&make=Ford&model=Escape&year=2022'),
(111, 6, 'Mustang Mach-E', 'Fully Electric Vehicle', 2610000, 130500, 0, 3, 'Panoramic fixed-glass roof. 19\" wheels. Available equipment.  Additional charge. The iconic Ford Mustang® DNA is undeniable in this 100% SOUL-STIRRING SUV. The sloping fastback and sequential tri‑bar turn signals. That arresting stare. Those seductive haunches. Ford Mustang Mach‑E® is easy to recognize. Yet, it’s like no other.\r\n\r\nBeautifully streamlined.Ford Mustang Mach‑E® comes with an Intelligent Access key fob, and the FordPass™ App1 unlocks Phone As A Key access.2 Either way, your Mustang Mach‑E recognizes you as soon as you get close. Just press the illuminated E‑Latch button to release your door. Step into your cabin personalized by up to 3 driver profiles, and experience.', 3, 4, 'Manila, Philippines', '4714mm x 1625mm x 1882mm', 5, '317 lb.-ft.', 'Fast-charging capability.\r\n19-inch wheels.\r\nBand & Olufsen sound system\r\nPanoramic sunroof.\r\nPower liftgate.', 'Rapid Red Metallic Tinted Clear Coat', 'Shadow Black', 'Grabber Blue Metallic', NULL, 'https://i.imgur.com/BABC2WO.jpg', 'https://i.imgur.com/h6QjXRQ.jpg', 'https://i.imgur.com/rH80ZvJ.jpg', NULL, 'https://www.ford.com/ntzlibs/content/dam/bev/us/november-2020-updates/install-specs-sheet/21_MachE_online.pdf'),
(112, 7, 'Ioniq Hybrid Elite', 'Hybrid Electric Vehicle', 1580000, 79000, 15000, 21, 'The IONIQ Hybrid combines technology with power to deliver a smooth driving experience. The electric motor and engine work seamlessly together to deliver plenty of torque when you need it most and maximum efficiency when cruising or at low speed.\r\nThe impressive Dual Clutch Transmission (DCT) places the IONIQ Hybrid at the forefront of innovation, delivering a smooth and enjoyable driving experience. It works with one clutch operating odd-numbered gears and the other operating even-numbered gears, giving you faster responsiveness and a more dynamic overall experience.\r\nThe IONIQ Hybrid\'s battery is recharged through regenerative braking, an innovative technology that captures kinetic energy whenever the brakes are applied or whilst the vehicle is coasting. By using the electric motor as a generator, the captured kinetic energy is used to recharge the lithium-ion polymer battery.', 3, 3, 'Manila, Philippines', '4470mm x 1820mm x 1450mm', 5, '147/4000 Nm/Rpm', 'Hyundai SmartSense™1.\r\nRear View Monitor w/ Parking Guidance (RVM w/ PG).\r\nParking Distance Warning - Reverse (PDW-R).\r\nTyre Pressure Monitoring System (TPMS).\r\nManual Speed Limit Assist (MSLA).\r\n7 airbag.', 'Polar White', 'Fluid Metal', 'Amazon Grey', 'Intense Blue', 'https://i.imgur.com/6zdYjKx.jpg', 'https://i.imgur.com/feYRuM3.jpg', 'https://i.imgur.com/gLERqiE.jpg', 'https://i.imgur.com/TGbyfVr.jpg', 'https://www.hyundai.com/content/dam/hyundai/au/en/documents/Hyundai_IONIQ_Brochure.pdf'),
(113, 7, 'Ioniq Electric Elite', 'Fully Electric Vehicle', 1620000, 81000, 10000, 5, 'Packed with innovative features and a choice of driving modes, the IONIQ Electric has everything the IONIQ Hybrid offers, along with a zero-emission driving experience. The powerfully responsive fully electric powertrain offers excitement and instant torque for reassuring acceleration, keeping you safe when overtaking and pulling out of junctions.\r\nThe IONIQ Electric utilises regenerative braking to great effect, charging your battery while you’re on the move. Steering-mounted paddles allow you to adjust the regenerative braking strength. By using the left hand paddle, you’ll increase the regenerative braking effect to put more power in the battery. Pull the right-hand paddle to decrease the regenerative evel, coasting further to maximise efficiency', 3, 5, 'Manila, Philippines', '4470mm x 1820mm x 1475mm', 5, '295Nm', 'Hyundai SmartSense™ 1.\r\nRear View Monitor w/ Parking Guidance (RVM w/ PG).\r\nPaddle Shifters – regenerative braking control.\r\nSmart key with push button start.\r\nApple CarPlay™ and Android™.\r\nAuto compatibility 2.', 'Polar White', 'Fluid Metal', 'Amazon Grey', 'Intense Blue', 'https://i.imgur.com/tB5vvXF.jpg', 'https://i.imgur.com/iiABLZw.jpg', 'https://i.imgur.com/Ym85oQl.jpg', 'https://i.imgur.com/l9lIvCp.jpg', 'https://www.hyundai.com/content/dam/hyundai/au/en/documents/Hyundai_IONIQ_Brochure.pdf'),
(114, 7, 'Kona EV', 'Fully Electric Vehicle', 2388000, 119400, 0, 8, 'KONA Electric is fitted with a lithium-ion polymer battery, that offers incomparable performance. Enjoy the flexibility of effortlessly charging it at home or on the go, and drive towards a greener tomorrow.\r\nKONA Electric is a world apart for many reasons, design being one of them. From bold exteriors to sleek LED lighting and fine detailing, it has everything to make it distinctive. Add clever integrated features and functionality, and you get a unique green vehicle that makes a statement.', 5, 5, 'Manila, Philippines', '4180mm x 1800mm 1570mm', 5, '395 Nm', 'ABS with EBD.\r\nElectronic stability control (ESC).\r\nVehicle stability management (VSM).\r\nHill assist control (HAC).\r\nRear skid plate.\r\nSporty roof rails.\r\nTurn indicators on outside mirrors.\r\nPremium black interiors.\r\nLeather seats.\r\nLeather wrapped steering wheel.', 'Atlas White', 'Surfy Blue', 'Dark Knight', NULL, 'https://i.imgur.com/jEayX7w.jpg', 'https://i.imgur.com/VKTfoNI.jpg', 'https://i.imgur.com/aKRitaK.jpg', NULL, 'https://www.hyundai.com/content/dam/hyundai/in/en/data/brochure/Hyundai_KONA_SUV_brochure.pdf'),
(115, 8, 'LEAF', 'Fully Electric Vehicle', 2798000, 139900, 7000, 16, 'There\'s excitement. Then there\'s the kind of excitement that makes every moment behind the wheel a rush. With a range of up to 311 kilometers, the Nissan LEAF can take you on amazing adventures. Put your compatible smartphone on the big screen and connect your world: Drive with more confidence, thanks to a suite of Nissan Intelligent Mobility features that can look out all around you. The Nissan LEAF. This is how driving should feel. This is Nissan Intelligent Mobility. \r\n\r\nThe Nissan LEAF is designed with intelligent technology that aids your drive when you need it. For example, when you\'re driving up a spiral parking ramp - the Intelligent Trace Control can assist you in your drive by reading your situation and, if needed, can gradually hit the brake to help you steer smoothly through the corners. It\'s good to know that you\'re not alone. With an entire suite of Nissan Intelligent Mobility features to back you up and help you keep out of trouble, the Nissan LEAF turns your journey into a confident, assured, more exhilarating ride every day.\r\n', 3, 3, 'Manila, Philippines', '4490mm x 1788mm x 1540mm', 5, '320 Nm', '110 kW AC synchronous electric motor.\r\ne-Pedal.\r\nAutomatic Emergency Braking with Pedestrian Detection.\r\nApple CarPlay® integration.\r\nAndroid Auto™.', 'Gun Metallic', 'Deep Blue Pearl', 'Scarlet Ember', 'Pearl White', 'https://i.imgur.com/FUKrjn1.jpg', 'https://i.imgur.com/rPNDekD.jpg', 'https://i.imgur.com/FSU2Olp.jpg', 'https://i.imgur.com/rpHn7ys.jpg', 'https://www-asia.nissan-cdn.net/content/dam/Nissan/ph/vehicles/LEAF/LEAF%20Brochure.pdf'),
(116, 8, 'ARIYA', 'Fully Electric Vehicle', 1920000, 96000, 0, 5, 'Intelligent Power. No matter which version of ARIYA you choose, the driving experience is smooth, serene, and immensely powerful, made possible by Nissan’s proven, ever-evolving battery and EV powertrain technology.\r\nIntelligent Integration. ARIYA seamlessly connects to your world in multiple ways, working in harmony with your smart home and smart devices, streamlining your drive, schedule, and life like never before.\r\nIntelligent Driving With ProPILOT* technologies helping to guide the way. ARIYA ascends you to a higher driving consciousness. Whether monitoring and preparing for road conditions around the next bend, or letting you cruise on the motorway or park hands-free, ARIYA gives you a helping hand when needed.', 6, 4, 'Manila, Philippines', '4595mm x 1850mm x 2172mm', 5, '300Nm', 'Power Sliding Centre Console & Flexible Centre Storage with Tray Table.\r\nIntegrated Display Interface.\r\nVoice Controls.\r\nIntelligent Route Planner.', 'Akatsuki Copper', 'Pearl Black', 'Burgundy', 'White Pearl', 'https://i.imgur.com/PL3SdDW.jpg', 'https://i.imgur.com/dAVIOgT.jpg', 'https://i.imgur.com/7vPx7xD.jpg', 'https://i.imgur.com/oa7dTz0.jpg', 'https://www-europe.nissan-cdn.net/content/dam/Nissan/gb/brochures/Vehicles/Nissan_Ariya_UK.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `prodID` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `comment` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `userpass` varchar(50) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `brandid` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `fname`, `lname`, `email`, `phone`, `userpass`, `active`, `brandid`) VALUES
(1001, 'Admin', '1', 'admin1@gmail.com', '09123456789', 'X05lsP3wDD', 0, 0),
(1002, 'Admin', '2', 'admin2@gmail.com', '09123456789', '8Fqrhw4Tri', 0, 0),
(1003, 'brand', 'ford', 'ford@gmail.com', '09123456789', '0CBY0V8xdw', 0, 6),
(1004, 'brand', 'mitsubishi', 'mitsubishi@gmail.com', '09123456789', '0CBY0V8xdw', 0, 2),
(1005, 'brand', 'toyota', 'toyota@gmail.com', '09123456789', '0CBY0V8xdw', 0, 1),
(1006, 'brand', 'kia', 'kia@gmail.com', '09123456789', '0CBY0V8xdw', 0, 3),
(1007, 'brand', 'honda', 'honda@gmail.com', '09123456789', '0CBY0V8xdw', 0, 4),
(1008, 'brand', 'mazda', 'mazda@gmail.com', '09123456789', '0CBY0V8xdw', 0, 5),
(1009, 'brand', 'hyundai', 'hyundai@gmail.com', '09123456789', '0CBY0V8xdw', 0, 7),
(1010, 'brand', 'nissan', 'nissan@gmail.com', '09123456789', '0CBY0V8xdw', 0, 8),
(1011, 'Maricris', 'Micael', 'micaelmaricris@gmail.com', '09123456789', 'akHNDJ54H', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wishlistid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `color` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `product` varchar(100) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `featured`
--
ALTER TABLE `featured`
  ADD PRIMARY KEY (`featured#`),
  ADD KEY `product_id` (`prod_id`);

--
-- Indexes for table `onsale`
--
ALTER TABLE `onsale`
  ADD PRIMARY KEY (`onSale#`),
  ADD KEY `prod_id` (`prod_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderNum`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `prod_id` (`prod_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `brand_id` (`brand_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wishlistid`),
  ADD KEY `productid` (`productid`),
  ADD KEY `userid` (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderNum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1013;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wishlistid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `featured`
--
ALTER TABLE `featured`
  ADD CONSTRAINT `featured_ibfk_1` FOREIGN KEY (`prod_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `onsale`
--
ALTER TABLE `onsale`
  ADD CONSTRAINT `onsale_ibfk_1` FOREIGN KEY (`prod_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`prod_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`productid`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
