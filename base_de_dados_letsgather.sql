-- --------------------------------------------------------
-- Anfitrião:                    127.0.0.1
-- Versão do servidor:           8.4.3 - MySQL Community Server - GPL
-- SO do servidor:               Win64
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

-- A despejar estrutura para tabela matchpoint.eventos
CREATE TABLE IF NOT EXISTS `eventos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `nome` varchar(255) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `data_evento` date NOT NULL,
  `hora_evento` time DEFAULT NULL,
  `local_evento` varchar(255) NOT NULL,
  `descricao` text,
  `imagem` varchar(255) DEFAULT NULL,
  `visibilidade` enum('publico','privado') DEFAULT 'publico',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `eventos_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- A despejar dados para tabela matchpoint.eventos: ~13 rows (aproximadamente)
INSERT INTO `eventos` (`id`, `user_id`, `nome`, `tipo`, `data_evento`, `hora_evento`, `local_evento`, `descricao`, `imagem`, `visibilidade`, `created_at`) VALUES
	(2, 1, 'Aniversário', 'social', '2026-01-19', '16:00:00', 'Alcanena, Santarém', '', 'evento_69406b056a4d8.jpg', 'publico', '2025-12-15 20:09:41'),
	(3, 1, 'Bem Vindos a 2026!', 'social', '2025-12-31', '18:30:00', 'Quinta do Outeiro (Rua Outeiro da Cruz- 3140-563 Tentúgal).', 'Receba 2026 com uma festa inesquecível, a melhor vista para o fogo de artifício e música pela noite dentro!', 'evento_69418cb209b69.jpg', 'publico', '2025-12-16 16:45:38'),
	(4, 1, 'Fim de Semestre', 'social', '2025-12-20', '23:00:00', 'Local Escola Superior Agrária (ESAC)  3045-601 Coimbra', 'A última grande festa antes das férias! Junte-se à celebração com o melhor DJ da cidade e pista de dança garantida até de manhã.', 'evento_69418cf4ea58e.jpg', 'publico', '2025-12-16 16:46:44'),
	(5, 1, 'Páscoa Festiva', 'social', '2026-04-05', '10:00:00', 'Local Parque Manuel Braga- Av. Emídio Navarro 36, 3000-150 Coimbra', 'Celebre a Páscoa em família! Uma feira temática com decoração gigante, atividades para crianças, mercado de artesanato e doces tradicionais.', 'evento_69418e776f263.png', 'publico', '2025-12-16 16:47:33'),
	(6, 1, 'Conferência Anual: Inovação & Futuro Digital', 'profissional', '2026-09-10', '09:30:00', 'Convento São Francisco-Av. da Guarda Inglesa 1a, 3040-193 Coimbra', 'O ponto de encontro anual para líderes e visionários. Dois dias de networking e insights sobre o futuro do setor. Inscrições abertas!', 'evento_69418fade863a.png', 'publico', '2025-12-16 16:58:21'),
	(7, 1, 'Workshop de Inovação: Mente Aberta, Ideias Novas', 'profissional', '2026-03-25', '09:00:00', 'Digipro Academy -Ladeira das Alpenduradas 54, Edifício Lote B, Salas J e L, 3030-167 Coimbra', ' Uma sessão prática para desbloquear a criatividade e potenciar a inovação em equipa. Aprenda metodologias ágeis e leve as suas ideias para o próximo nível.', 'evento_69418fe39cb2b.png', 'publico', '2025-12-16 16:59:15'),
	(8, 1, 'Reunião de Equipa', 'profissional', '2026-01-05', '10:00:00', 'Digipro Academy -Ladeira das Alpenduradas 54, Edifício Lote B, Salas J e L, 3030-167 Coimbra', 'Sessão de alinhamento semanal obrigatória. Encontro essencial para a equipa rever o progresso, discutir desafios e estabelecer as prioridades de trabalho para os próximos dias.', 'evento_694190164d181.png', 'publico', '2025-12-16 17:00:06'),
	(9, 1, 'Lançamento de Produto', 'profissional', '2026-11-18', '18:30:00', 'Organideia-Av. da Guarda Inglesa 27, 3040-193 Coimbra', ' O futuro chegou! Junte-se a nós para a revelação do nosso novo produto. Networking, demonstrações exclusivas e cocktail de celebração.', 'evento_694190454d8ed.png', 'publico', '2025-12-16 17:00:53'),
	(10, 1, 'Futebol 5v5', 'desportivo', '2026-02-23', '22:30:00', 'Campo de Futebol - Hospital dos Covões-R. Carminé de Miranda 55, 3045 Coimbra', 'Jogo semanal de futebol de 5. Confirmação obrigatória até quarta-feira. Traz o equipamento e a boa disposição!', 'evento_6941907c2cf8d.png', 'publico', '2025-12-16 17:01:48'),
	(11, 1, 'Visita ao Museu ', 'desportivo', '2026-07-01', '15:00:00', 'Museu Nacional de Machado de Castro-Largo Dr. José Rodrigues, 3000-236 Coimbra', 'Uma visita guiada à magnífica coleção de arte e escultura. Uma oportunidade para explorar o património histórico de Coimbra.', 'evento_694190a308a47.png', 'publico', '2025-12-16 17:02:27'),
	(12, 1, 'Caminhada na Serra', 'desportivo', '2026-05-09', '08:00:00', 'Estacionamento do Estádio Cidade de Coimbra-Via Rápida, 3030 Coimbra', 'Ponto de encontro em Coimbra para carpooling e partida para a Serra da Lousã. Trilha com vistas deslumbrantes. Nível de dificuldade moderado.', 'evento_694190c6c352c.png', 'publico', '2025-12-16 17:03:02'),
	(13, 1, 'Sessão de Cinema', 'desportivo', '2026-02-08', '23:00:00', ' Cinema City Forum Coimbra-Av. José Bonifácio de Andrade e Silva Lotes 1 e 2, 3040-389 Coimbra', 'Sessão relaxada com pipocas e o filme mais aguardado. Perfeito para encerrar o fim-de-semana.', 'evento_694190f1f01d4.png', 'publico', '2025-12-16 17:03:45'),
	(14, 1, 'Sunset no Mondego', 'social', '2026-08-20', '15:30:00', 'Parque Verde do Mondego, Coimbra', 'Venha aproveitar o fim de tarde com boa música, bebidas frescas e a melhor vista sobre o rio. Traga amigos e boa disposição! O ponto de encontro é junto às esplanadas do urso.', 'evento_6941919d2cb7d.jpg', 'publico', '2025-12-16 17:06:37');

-- A despejar estrutura para tabela matchpoint.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- A despejar dados para tabela matchpoint.users: ~2 rows (aproximadamente)
INSERT INTO `users` (`id`, `nome`, `email`, `password`, `created_at`) VALUES
	(1, 'Afonso', 'afonso@gmail.com', '$2y$10$buW1Gs25kQLhxqcIO0X0u.2eBkyH90rbV.n69376SO9z.sSJhqR.6', '2025-12-15 19:49:33'),
	(2, 'João', 'joao@gmail.com', '$2y$10$0wrbcN13tACCw7agsAtutuKkPpVwiBTMFTrxA09Ik0pRgCI1Oz6qu', '2025-12-15 20:15:22');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
