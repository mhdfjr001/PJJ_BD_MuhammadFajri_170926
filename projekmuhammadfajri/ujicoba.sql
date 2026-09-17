-- ============================================
-- Script Database: ujicoba
-- Diadaptasi dari materi DDL, DML, DCL XII PPLG
-- ============================================

CREATE DATABASE IF NOT EXISTS ujicoba;
USE ujicoba;

-- DDL: membuat struktur tabel
CREATE TABLE IF NOT EXISTS siswa (
    id_siswa INT PRIMARY KEY AUTO_INCREMENT,
    nis VARCHAR(20),
    nama VARCHAR(100),
    kelas VARCHAR(20),
    jurusan VARCHAR(50)
);

-- DML: mengisi data awal
INSERT INTO siswa (nis, nama, kelas, jurusan)
VALUES
('1001','Andi Saputra','XII PPLG 1','PPLG'),
('1002','Budi Santoso','XII PPLG 1','PPLG'),
('1003','Citra Lestari','XII PPLG 2','PPLG');

-- Contoh DML tambahan (opsional, bisa dijalankan manual jika ingin mengikuti materi asli)
-- UPDATE siswa SET kelas = 'XII PPLG 2' WHERE id_siswa = 1;
-- DELETE FROM siswa WHERE id_siswa = 3;

-- DCL: membuat user dan mengatur hak akses
CREATE USER IF NOT EXISTS 'operator'@'localhost' IDENTIFIED BY 'operator123';
GRANT SELECT, INSERT, UPDATE ON ujicoba.siswa TO 'operator'@'localhost';
-- REVOKE UPDATE ON ujicoba.siswa FROM 'operator'@'localhost';

FLUSH PRIVILEGES;
