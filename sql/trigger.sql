CREATE TABLE log_absen (
    id_absen int NOT NULL,
    data_lama JSON,
    data_baru JSON,
    tipe_dml enum('SELECT','INSERT','UPDATE','DELETE') NOT NULL,
    waktu_log datetime NOT NULL,
    PRIMARY KEY (id_absen, tipe_dml, waktu_log)
);

DELIMITER //
DROP TRIGGER IF EXISTS trigger_insert_absen//
CREATE TRIGGER trigger_insert_absen
AFTER INSERT
ON absen
FOR EACH ROW
BEGIN
    SET @id_absen = new.id_absen;
    SET @data_lama = NULL;
    SET @data_baru = JSON_OBJECT(
        'id_absen',
        new.id_absen,
        'id_form',
        new.id_form,
        'nis',
        new.nis,
        'nama_siswa',
        new.nama_siswa,
        'kelas',
        new.kelas,
        'waktu_absen',
        new.waktu_absen
    );
    SET @tipe_dml = 'INSERT';
    SET @waktu_log = NOW();

    INSERT INTO log_absen (
        id_absen,
        data_lama,
        data_baru,
        tipe_dml,
        waktu_log
    )
    VALUES(
        @id_absen,
        @data_lama,
        @data_baru,
        @tipe_dml,
        @waktu_log
    );
END//
DELIMITER ;

DELIMITER //
DROP TRIGGER IF EXISTS trigger_delete_absen//
CREATE TRIGGER trigger_delete_absen
AFTER DELETE
ON absen
FOR EACH ROW
BEGIN
    SET @id_absen = old.id_absen;
    SET @data_lama = JSON_OBJECT(
        'id_absen',
        old.id_absen,
        'id_form',
        old.id_form,
        'nis',
        old.nis,
        'nama_siswa',
        old.nama_siswa,
        'kelas',
        old.kelas,
        'waktu_absen',
        old.waktu_absen
    );
    SET @data_baru = NULL;
    SET @tipe_dml = 'DELETE';
    SET @waktu_log = NOW();

    INSERT INTO log_absen (
        id_absen,
        data_lama,
        data_baru,
        tipe_dml,
        waktu_log
    )
    VALUES(
        @id_absen,
        @data_lama,
        @data_baru,
        @tipe_dml,
        @waktu_log
    );
END//
DELIMITER ;


DELIMITER //
DROP TRIGGER IF EXISTS trigger_delete_form//
CREATE TRIGGER trigger_delete_form
BEFORE DELETE
ON form
FOR EACH ROW
BEGIN
    SET @id_form = old.id_form;
    DELETE FROM absen WHERE id_form = @id_form;
END//
DELIMITER ;