
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

-- Copiando estrutura para tabela db_aula_tai.produto
CREATE TABLE IF NOT EXISTS `produto` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `lote` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `preco` decimal(12,2) NOT NULL DEFAULT '0.00',
  `nome_imagem` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela db_aula_tai.produto: ~0 rows (aproximadamente)
INSERT INTO `produto` (`id`, `nome`, `lote`, `preco`, `nome_imagem`) VALUES
	(1, 'Mouse', '11', 50.00, '0'),
	(2, 'Teclado', '05', 80.00, '0');