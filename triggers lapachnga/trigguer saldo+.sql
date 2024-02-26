DELIMITER $$

CREATE TRIGGER after_partido_update 
AFTER UPDATE ON partidos 
FOR EACH ROW
BEGIN
    IF OLD.estado != 'Finalizado' AND NEW.estado = 'Finalizado' THEN
        -- Suponemos que la tabla de apuestas se llama 'apuestas' y que hay una columna 'resultado' que se compara
        -- con 'ganador' en 'partidos'. Además, asumimos que 'ganancia' es lo que se suma al 'saldo' del usuario
        -- y que la tabla de usuarios se llama 'usuarios' con una columna 'saldo' para el dinero del usuario.
        UPDATE users u
        INNER JOIN apuestas a ON u.id = a.user_id
        SET u.saldo = u.saldo + a.ganancias
        WHERE a.partido_id = NEW.id AND a.resultado = NEW.ganador;
    END IF;
END$$

DELIMITER ;

UPDATE partidos SET estado = 'Finalizado', ganador = 'Equipo Ganador' WHERE id = 1;
