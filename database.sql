-- DATABASE: jadwal_klien
CREATE DATABASE IF NOT EXISTS jadwal_klien;
USE jadwal_klien;

-- TABEL tbl_klien
CREATE TABLE IF NOT EXISTS tbl_klien (
    id_klien INT AUTO_INCREMENT PRIMARY KEY,
    kode_klien VARCHAR(10) NOT NULL UNIQUE,
    nama_klien VARCHAR(100) NOT NULL
);

-- Contoh data tbl_klien
INSERT INTO tbl_klien (kode_klien, nama_klien) VALUES
('K101', 'PT. Alfa'),
('K102', 'CV. Beta'),
('K103', 'UD. Gamma');

-- TABEL tbl_agenda
CREATE TABLE IF NOT EXISTS tbl_agenda (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tanggal DATE NOT NULL,
    kegiatan VARCHAR(255) NOT NULL,
    kode_klien VARCHAR(10) NOT NULL,
    keterangan TEXT,
    CONSTRAINT fk_klien FOREIGN KEY (kode_klien)
        REFERENCES tbl_klien(kode_klien)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

-- Contoh data tbl_agenda
INSERT INTO tbl_agenda (tanggal, kegiatan, kode_klien, keterangan) VALUES
('2026-02-10', 'Meeting Proposal', 'K101', 'Bawa dokumen lengkap'),
('2026-02-12', 'Follow-up Order', 'K102', 'Konfirmasi harga dan stok'),
('2026-02-13', 'Survey Lokasi', 'K103', 'Pastikan lokasi sesuai rencana');
