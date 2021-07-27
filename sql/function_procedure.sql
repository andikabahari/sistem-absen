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