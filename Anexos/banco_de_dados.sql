-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.0.40 - MySQL Community Server - GPL
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para projeto_solar
CREATE DATABASE IF NOT EXISTS `projeto_solar` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `projeto_solar`;

-- Copiando estrutura para tabela projeto_solar.postagems
CREATE TABLE IF NOT EXISTS `postagems` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned DEFAULT NULL,
  `categoria_id` bigint unsigned DEFAULT NULL,
  `titulo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `conteudo` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `postagems_user_id_foreign` (`user_id`),
  KEY `postagems_categoria_id_foreign` (`categoria_id`),
  CONSTRAINT `postagems_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE CASCADE,
  CONSTRAINT `postagems_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela projeto_solar.postagems: ~1 rows (aproximadamente)
INSERT INTO `postagems` (`id`, `user_id`, `categoria_id`, `titulo`, `foto`, `conteudo`, `data`, `created_at`, `updated_at`) VALUES
	(2, 1, 1, 'Os benefícios da Energia Solar para sua casa', 'fotos_postagem/EzrGcFMghaJppVVR6G9lBWLSdW4ATsMr5V2GKCaK.jpg', 'Os Benefícios da Energia Solar para sua Casa\r\n\r\n🌞 A energia solar não é apenas uma solução sustentável para o planeta, mas também uma excelente forma de reduzir seus custos com eletricidade. Se você está pensando em adotar essa fonte de energia renovável em sua casa, confira alguns dos principais benefícios:\r\n\r\nRedução de Custos de Energia\r\nCom a instalação de painéis solares, você pode reduzir significativamente sua conta de luz. A energia solar capta a luz do sol, transformando-a em eletricidade, o que diminui a dependência da rede elétrica e reduz os gastos mensais.\r\n\r\nSustentabilidade e Contribuição Ambiental\r\nAo utilizar energia solar, você estará contribuindo para a preservação do meio ambiente. A energia solar é limpa, renovável e não emite gases de efeito estufa, ajudando a combater as mudanças climáticas.\r\n\r\nValorização do Imóvel\r\nImóveis com sistemas de energia solar têm uma valorização maior no mercado. A instalação de painéis solares pode ser vista como um diferencial na hora de vender ou alugar sua casa, além de tornar o imóvel mais atraente para futuros compradores conscientes da importância da sustentabilidade.\r\n\r\nBaixa Manutenção e Longa Durabilidade\r\nOs sistemas solares exigem pouca manutenção. Com cuidados simples, como a limpeza periódica dos painéis, você pode garantir que eles operem de forma eficiente por muitos anos. Além disso, a vida útil de um sistema solar pode ultrapassar 25 anos.\r\n\r\nIndependência Energética\r\nCom a energia solar, você fica menos vulnerável às flutuações dos preços da energia elétrica. Produza sua própria eletricidade e tenha mais controle sobre seus custos energéticos a longo prazo.\r\n\r\n🌍 Quer saber mais sobre como a energia solar pode beneficiar sua casa? Fale conosco e agende uma consultoria personalizada! Na Apollo Solar, ajudamos você a dar o próximo passo para um futuro mais econômico e sustentável.\r\n\r\n#EnergiaSolar #Sustentabilidade #EconomiaDeEnergia #EnergiaRenovável #ApolloSolar', '2024-12-02', NULL, '2024-12-04 12:55:30');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
