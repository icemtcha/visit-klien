# 📅 Jadwal Klien

Repository ini berisi **database SQL** untuk project **Jadwal Klien**, lengkap dengan struktur tabel dan contoh data. Cocok untuk **testing, development, atau belajar** SQL & relational database.

---

## 🗄 Database

**Nama database:** `jadwal_klien`  

Terdiri dari 2 tabel utama:

### 1. `tbl_klien`
Menyimpan informasi klien.

| Kolom       | Tipe          | Keterangan                  |
|------------|---------------|-----------------------------|
| id_klien   | INT           | Primary Key, Auto Increment |
| kode_klien | VARCHAR(10)   | Unique                      |
| nama_klien | VARCHAR(100)  | Nama klien                  |

**Contoh Data:**
- `K101` – PT. Alfa
- `K102` – CV. Beta
- `K103` – UD. Gamma

### 2. `tbl_agenda`
Menyimpan jadwal kegiatan klien.

| Kolom       | Tipe          | Keterangan                           |
|------------|---------------|--------------------------------------|
| id         | INT           | Primary Key, Auto Increment          |
| tanggal    | DATE          | Tanggal kegiatan                     |
| kegiatan   | VARCHAR(255)  | Nama kegiatan                        |
| kode_klien | VARCHAR(10)   | Foreign Key ke `tbl_klien`          |
| keterangan | TEXT          | Catatan tambahan                     |

**Contoh Data:**
- 2026-02-10 – Meeting Proposal – K101 – Bawa dokumen lengkap  
- 2026-02-12 – Follow-up Order – K102 – Konfirmasi harga dan stok  
- 2026-02-13 – Survey Lokasi – K103 – Pastikan lokasi sesuai rencana  

---

## ⚡ Cara Import

1. Buat database baru (jika belum ada):

```sql
CREATE DATABASE jadwal_klien;
mysql -u [username] -p jadwal_klien < database.sql
