INSERT INTO `authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('Administrador', 2, NULL, NULL, 'N;'),
('Authenticated', 2, 'Authenticated user', NULL, 'N;');
INSERT INTO `authassignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
('Administrador', '1', NULL, 'N;');