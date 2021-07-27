DROP DATABASE IF EXISTS sistem_absen;

CREATE DATABASE sistem_absen;

USE sistem_absen;

CREATE TABLE guru (
    nip char(18) NOT NULL,
    nama_guru varchar(100) NOT NULL,
    username varchar(15) NOT NULL,
    password varchar(255) NOT NULL,
    jenis_kelamin enum('L','P') DEFAULT NULL,
    tanggal_lahir date DEFAULT NULL,
    PRIMARY KEY(nip)
);

INSERT INTO guru (nip, nama_guru, username, password, jenis_kelamin, tanggal_lahir) VALUES
('198503302003121001', 'Riki Putra', 'riki', '$2y$10$SmMFHv0c7DsLP1iVvGZqm.ywhnsZfY6yBLXvSKy9wVV/4k8BKhhdK', 'L', '1985-03-30'),
('198503302003122002', 'Rini Putri', 'rini', '$2y$10$vKPaWQMfYSNAuRebW4zTDOjBINQAM4yuYhsWT99GCf.Ik.CwEffwu', 'P', '1985-03-30');

CREATE TABLE form (
    id_form int(11) AUTO_INCREMENT,
    nip char(18) DEFAULT NULL,
    nama_form varchar(100) NOT NULL,
    tahun_pelajaran char(9) NOT NULL,
    semester char(1) NOT NULL,
    batas_waktu datetime NOT NULL,
    PRIMARY KEY(id_form),
    FOREIGN KEY(nip) REFERENCES guru(nip)
        ON UPDATE CASCADE ON DELETE RESTRICT
);

CREATE TABLE absen (
    id_absen int(11) AUTO_INCREMENT,
    id_form int(11) DEFAULT NULL,
    nis char(10) NOT NULL,
    nama_siswa varchar(100) NOT NULL,
    kelas varchar(10) DEFAULT NULL,
    waktu_absen datetime NOT NULL,
    PRIMARY KEY(id_absen),
    FOREIGN KEY(id_form) REFERENCES form(id_form)
        ON UPDATE CASCADE ON DELETE RESTRICT
);

CREATE TABLE log_absen (
  id_absen int(11) NOT NULL,
  data_lama json,
  data_baru json,
  tipe_dml enum('SELECT','INSERT','UPDATE','DELETE') NOT NULL,
  waktu_log datetime NOT NULL,
  PRIMARY KEY(id_absen,tipe_dml,waktu_log)
);

DELIMITER //
CREATE FUNCTION form_exists(id_form int) RETURNS int
BEGIN
    DECLARE is_exists int;
    SET is_exists = 0;
    SELECT EXISTS(SELECT 1 FROM form WHERE form.id_form = id_form) INTO is_exists;
    RETURN is_exists;
END//
DELIMITER ;

DELIMITER //
CREATE FUNCTION batas_waktu_form(id_form int) RETURNS datetime
BEGIN
    SET @batas_waktu = (SELECT batas_waktu FROM form WHERE form.id_form = id_form);
    RETURN @batas_waktu;
END//
DELIMITER ;

DELIMITER //
CREATE PROCEDURE insert_absen(
    IN in_id_form int,
    IN in_nis char(10),
    IN in_nama_siswa varchar(100),
    IN in_kelas varchar(10),
    IN in_waktu_absen datetime
)
BEGIN
    IF (form_exists(in_id_form)) THEN
        IF (in_waktu_absen <= batas_waktu_form(in_id_form)) THEN
            INSERT INTO absen (
                id_form,
                nis,
                nama_siswa,
                kelas,
                waktu_absen
            )
            VALUES (
                in_id_form,
                in_nis,
                in_nama_siswa,
                in_kelas,
                in_waktu_absen
            );
        END IF;
    END IF;
END//
DELIMITER ;

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