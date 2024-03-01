DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `nickName` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `dt_nascimento` date NOT NULL,
  `termoServico` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS `perfil`;
CREATE TABLE IF NOT EXISTS `perfil` (
  `id_perfil` int NOT NULL AUTO_INCREMENT,
  `descricao` varchar(300) DEFAULT NULL,
  `Id_user_fk` int DEFAULT NULL,
  `reputacao` int NOT NULL DEFAULT '100',
  PRIMARY KEY (`id_perfil`),
  KEY `Id_user_fk` (`Id_user_fk`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS `jogo`;
CREATE TABLE IF NOT EXISTS `jogo` (
  `id_jogo` int NOT NULL AUTO_INCREMENT,
  `jogo` varchar(45) NOT NULL,
  `ranking` varchar(45) NOT NULL,
  `Id_perfil_fk` int DEFAULT NULL,
  PRIMARY KEY (`id_jogo`),
  KEY `Id_perfil_fk` (`Id_perfil_fk`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `user` (`id_user`, `nickName`, `email`, `senha`, `dt_nascimento`, `termoServico`) VALUES
(1, '@root', 'adm@adm.com', 'c4ca4238a0b923820dcc509a6f75849b', '2000-11-11', 1);
INSERT INTO `perfil` (`id_perfil`, `descricao`, `Id_user_fk`, `reputacao`) VALUES
(1, 'Digite sua descrição', 1, 100);