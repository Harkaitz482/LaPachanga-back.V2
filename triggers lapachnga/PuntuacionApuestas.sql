use lapachanga;


DELIMITER $$

CREATE TRIGGER incrementar_puntuacion_despues_apuesta
AFTER INSERT ON apuestas
FOR EACH ROW
BEGIN
    UPDATE partidos
    SET puntuacion = puntuacion + 1
    WHERE id = NEW.partido_id;
END$$

DELIMITER ;