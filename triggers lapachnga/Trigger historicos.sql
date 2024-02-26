use lapachanga;

DELIMITER //
CREATE TRIGGER apuestas_after_insert
AFTER INSERT ON apuestas
FOR EACH ROW
BEGIN
    INSERT INTO apuestas_historico(apuesta_id, gasto, ganancias, fecha, user_id, sala_id, equipo_id, partido_id, tipo_operacion, fecha_operacion)
    VALUES(NEW.id, NEW.gasto, NEW.ganancias, NEW.fecha, NEW.user_id, NEW.sala_id, NEW.equipo_id, NEW.partido_id, 'INSERT', NOW());
END; //
DELIMITER ;

DELIMITER //
CREATE TRIGGER partidos_after_insert
AFTER INSERT ON partidos
FOR EACH ROW
BEGIN
    INSERT INTO partidos_historicos(partido_id, mapa, arbitro, equipo_id, equipo2_id, fecha, hora, puntuacion, liga_id, tipo_operacion, fecha_operacion)
    VALUES(NEW.id, NEW.mapa, NEW.arbitro, NEW.equipo_id, NEW.equipo2_id, NEW.fecha, NEW.hora, NEW.Puntuacion, NEW.liga_id, 'INSERT', NOW());
END; //
DELIMITER ;

DROP TRIGGER  partidos_after_insert;
INSERT INTO apuestas (gasto, ganancias, fecha, user_id, sala_id, equipo_id, partido_id,resultado)
VALUES (400.0, 200.0, '2024-02-08', 2, 1, 1, 1,'que');

INSERT INTO partidos (mapa, arbitro, equipo_id, equipo2_id, fecha, hora, puntuacion,  liga_id)
VALUES ('MapaEjemplo', 'ArbitroEjemplo', 3, 4, '2024-02-26', '01:59', '1', 1);
DESCRIBE partidos;



SELECT * FROM apuestas_historico;
select * from partidos_historicos;
