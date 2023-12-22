-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-12-2023 a las 04:44:30
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dw3_guaman_alvin`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `category_id` tinyint(3) UNSIGNED NOT NULL,
  `category` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`category_id`, `category`) VALUES
(3, 'Frutas'),
(1, 'Frutos Secos'),
(2, 'Legumbres'),
(4, 'Semillas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `category_fk` tinyint(3) UNSIGNED NOT NULL,
  `user_fk` int(10) UNSIGNED NOT NULL,
  `name_product` varchar(200) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `weight` decimal(10,2) DEFAULT NULL,
  `detail_product` text DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `img_description` varchar(255) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`product_id`, `category_fk`, `user_fk`, `name_product`, `price`, `weight`, `detail_product`, `img`, `img_description`, `stock`) VALUES
(1, 1, 1, 'Almendras', 2600.00, 400.00, 'Las almendras son uno de los frutos secos con más beneficios para la salud al estar repleto de nutrientes importantes como proteínas, grasas saludables, fibra, vitamina E, magnesio y manganeso.', 'almendra.jpg', 'Almendras', NULL),
(2, 1, 1, 'Pistacho con cascara', 3500.00, 400.00, 'La proporción de nutrientes en los pistachos crudos es muy equilibrada: Aportan nada menos que un 20% de proteínas vegetales, tanto como las legumbres, aunque se comen en menor cantidad. Contienen un 28% de hidratos de carbono, que al ser absorbidos lentamente por el organismo procuran energía gradual. Ofrecen un 10% de fibra, ideal para ayudar a regular el tránsito intestinal.', 'pistacho.jpg', 'Pistacho con cascara', NULL),
(3, 2, 1, 'Maní Vaina', 2200.00, 1000.00, 'Se trata de un producto que tiene un perfil graso amigable y saludable, lo que favorece una disminución del colesterol total sanguíneo y del colesterol LDL (malo), a la vez que puede incrementar el colesterol HDL (bueno). Aunque contiene grandes cantidades de grasa, su consumo ayuda al hígado a equilibrar su funcionamiento y al páncreas a procesar más fácilmente el azúcar.', 'mani.jpg', 'Maní Vaina', NULL),
(4, 4, 1, 'Semillas de Girasol Peladas', 1600.00, 1000.00, 'Las semillas de girasol son uno de los snacks saludables más populares dentro del mundo de las semillas. Además de su sabor irresistible y textura crujiente, estas pequeñas amigas están repletas de una gran cantidad de propiedades y beneficios en su nutrición.', 'semilla-girasol.jpg', 'Semillas de Girasol Peladas', NULL),
(5, 3, 1, 'Arandanos Azules', 850.00, 125.00, 'Su versatilidad y su sabor lo convierten en una de las opciones favoritas para elaborar jaleas, pasteles, vinos, postres y muchas otras recetas. Los arándanos son bajos en calorías y ricos en vitaminas, minerales, fibras, antioxidantes y agua, por lo que pueden incluirse en las dietas para bajar de peso. Además de eso, consumir jugo de arándanos antes o después de la actividad física intensa, ayuda a disminuir la fatiga muscular y a reparar el músculo más rápido.', 'arandanos.jpg', 'Arandanos Azules', NULL),
(6, 3, 1, 'Manzana', 989.00, 1000.00, 'La manzana es una de las frutas más populares y ampliamente consumidas en el mundo. Es rica en fibra, antioxidantes y vitaminas, especialmente vitamina C. Se ha demostrado que las manzanas tienen beneficios para la salud digestiva y pueden ayudar a reducir el riesgo de enfermedades crónicas.', 'manzana.jpg', 'Manzana', NULL),
(7, 3, 1, 'Uvas', 3500.00, 1000.00, 'Las uvas son una excelente fuente de antioxidantes y nutrientes esenciales como las vitaminas K y C, así como de resveratrol, un compuesto que puede tener beneficios para la salud del corazón. También son naturalmente bajas en calorías y proporcionan energía rápida debido a su contenido de azúcares naturales.', 'uva.jpg', ' Uvas', NULL),
(8, 3, 1, 'Naranja', 479.00, 1000.00, 'Las naranjas son conocidas por ser una excelente fuente de vitamina C, que es esencial para el sistema inmunológico y la piel saludable. También contienen fibra, folato, potasio y antioxidantes. Consumir naranjas regularmente puede ayudar a mantener un sistema inmunológico fuerte y promover la salud del corazón.', 'naranja.jpg', 'Naranjas', NULL),
(9, 3, 1, 'Mandarina', 650.00, 1000.00, 'Las mandarinas son una excelente fuente de vitamina C y fibra. También contienen antioxidantes que pueden ayudar a combatir el estrés oxidativo en el cuerpo. Además, son bajas en calorías y proporcionan nutrientes esenciales como potasio y vitamina A.', 'mandarina.jpg', 'Mandarina', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `purchases`
--

CREATE TABLE `purchases` (
  `purchase_id` int(10) UNSIGNED NOT NULL,
  `user_fk` int(10) UNSIGNED NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `purchase_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `purchases`
--

INSERT INTO `purchases` (`purchase_id`, `user_fk`, `total_amount`, `purchase_date`) VALUES
(5, 12, 8700.00, '2023-12-20 15:00:42'),
(6, 12, 3079.00, '2023-12-20 15:11:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `purchase_details`
--

CREATE TABLE `purchase_details` (
  `detail_id` int(10) UNSIGNED NOT NULL,
  `purchases_fk` int(10) UNSIGNED NOT NULL,
  `products_fk` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `purchase_details`
--

INSERT INTO `purchase_details` (`detail_id`, `purchases_fk`, `products_fk`, `quantity`, `price`) VALUES
(3, 5, 1, 2, 2600.00),
(4, 5, 2, 1, 3500.00),
(5, 6, 1, 1, 2600.00),
(6, 6, 8, 1, 479.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `role_id` tinyint(3) UNSIGNED NOT NULL,
  `role` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`role_id`, `role`) VALUES
(1, 'Administrador'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_fk` tinyint(3) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(60) NOT NULL,
  `lastname` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `role_fk`, `email`, `password`, `name`, `lastname`) VALUES
(1, 1, 'admin@gmail.com', '$2y$10$k1ka.X9xFwzcbJLmCqssv.yfHn3NsynjteM5ZwJv8VhRfmIQKS6LW', 'admin', 'admin'),
(12, 2, 'up1@mail.com', '$2y$10$rx0CkdEK5dkBsOf29t3DWel/EZ2doc.t7waVousU2ZpnTE8ByJhPO', 'usuario', 'prueba'),
(13, 2, 'user2@mail.com', '$2y$10$7jo20BiE1ssRM7VcOJCjM.6oV59tmcDn.niBHfrRfFa67gHuo4U6O', 'user', 'prueba');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `category_UNIQUE` (`category`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `fk_products_categories1_idx` (`category_fk`),
  ADD KEY `fk_products_users1_idx` (`user_fk`);

--
-- Indices de la tabla `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`purchase_id`),
  ADD KEY `fk_purchases_users1_idx` (`user_fk`);

--
-- Indices de la tabla `purchase_details`
--
ALTER TABLE `purchase_details`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `fk_purchase_details_purchases1_idx` (`purchases_fk`),
  ADD KEY `fk_purchase_details_products1_idx` (`products_fk`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`),
  ADD UNIQUE KEY `role_UNIQUE` (`role`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD KEY `fk_usuarios_roles_idx` (`role_fk`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `purchases`
--
ALTER TABLE `purchases`
  MODIFY `purchase_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `purchase_details`
--
ALTER TABLE `purchase_details`
  MODIFY `detail_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_products_categories1` FOREIGN KEY (`category_fk`) REFERENCES `categories` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_products_users1` FOREIGN KEY (`user_fk`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `fk_purchases_users1` FOREIGN KEY (`user_fk`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `purchase_details`
--
ALTER TABLE `purchase_details`
  ADD CONSTRAINT `fk_purchase_details_products1` FOREIGN KEY (`products_fk`) REFERENCES `products` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_purchase_details_purchases1` FOREIGN KEY (`purchases_fk`) REFERENCES `purchases` (`purchase_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_usuarios_roles` FOREIGN KEY (`role_fk`) REFERENCES `roles` (`role_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
