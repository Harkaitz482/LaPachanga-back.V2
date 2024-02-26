use lapachanga;

DELIMITER $$

CREATE TRIGGER trg_restar_saldo_despues_apuesta
AFTER INSERT ON apuestas
FOR EACH ROW
BEGIN
    UPDATE users
    SET saldo = saldo - NEW.gasto
    WHERE id = NEW.user_id;
END$$

DELIMITER ;

