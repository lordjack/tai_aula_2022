
-- Copiando estrutura do banco de dados para db_aula_tai
CREATE DATABASE IF NOT EXISTS `db_aula_tai` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_bin */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_aula_tai`;

-- Copiando estrutura para tabela db_aula_tai.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8mb4_bin NOT NULL DEFAULT '0',
  `telefone` varchar(20) COLLATE utf8mb4_bin NOT NULL DEFAULT '0',
  `cpf` varchar(14) COLLATE utf8mb4_bin NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Copiando dados para a tabela db_aula_tai.usuario: ~6 rows (aproximadamente)
INSERT INTO `usuario` (`id`, `nome`, `telefone`, `cpf`) VALUES
	(1, 'Jackson', '(84) 9998-8888', '888888'),
	(2, 'Maria', '49 5555-0000', '999999999999'),
	(3, 'jackson', '444', '5555'),
	(5, 'Chiquinha', '7777', '8888'),
	(6, 'Kiko', '77777', '9999');

