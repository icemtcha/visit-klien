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

| Tanggal    | Kode Klien | Nama Klien   | Kegiatan         | Keterangan                 |
|-----------|------------|--------------|----------------|-----------------------------|
| 2026-02-10 | K101      | PT. Alfa     | Meeting Proposal | Bawa dokumen lengkap       |
| 2026-02-12 | K102      | CV. Beta     | Follow-up Order | Konfirmasi harga dan stok  |
| 2026-02-13 | K103      | UD. Gamma    | Survey Lokasi   | Pastikan lokasi sesuai rencana |

---

## ⚡ Cara Import

1. Buat database baru (jika belum ada):

```sql
CREATE DATABASE jadwal_klien;

mysql -u [username] -p jadwal_klien < database.sql
