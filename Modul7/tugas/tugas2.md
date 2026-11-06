# Tugas 2

## a. Apa yang kamu ketahui mengenai fungsi ID pada session?

**Jawaban:**

ID pada session (`session_id`) berfungsi sebagai pengenal unik (identifier string) yang diberikan oleh server kepada setiap klien atau browser yang terhubung. ID ini digunakan server untuk membedakan dan mencocokkan data session milik satu pengguna dengan pengguna lainnya.

## b. Apa saja perbedaan antara cookie dan session?

**Jawaban:**

- **Lokasi penyimpanan:** Data cookie disimpan di sisi klien (browser), sedangkan data session disimpan di sisi server.
- **Keamanan:** Session umumnya lebih aman daripada cookie karena data sensitif tidak terekspos langsung di browser pengguna.
- **Kapasitas penyimpanan:** Cookie memiliki batas ukuran (sekitar 4 KB per cookie), sedangkan session dapat menyimpan data yang lebih besar, bergantung pada kapasitas server.
- **Masa berlaku:** Cookie dapat diatur agar bertahan selama jangka waktu tertentu, bahkan setelah browser ditutup. Session secara default berakhir ketika browser ditutup.

## c. Hal apa saja yang dapat membuat session kedaluwarsa?

**Jawaban:**

- **Menutup browser:** Secara default, cookie session ID berakhir saat browser ditutup.
- **Pemanggilan fungsi untuk mengakhiri session:** Fungsi `session_destroy()` dapat mengakhiri session, sedangkan `session_unset()` menghapus variabel session.
- **Timeout server (GC lifetime):** Masa berlaku yang diatur melalui `session.gc_maxlifetime` telah terlampaui tanpa aktivitas baru dari pengguna.
- **Custom timeout logic:** Logika pembatasan waktu, seperti timer 10 detik pada script tugas, dapat menghapus session secara otomatis jika waktu sejak akses terakhir melebihi batas yang ditentukan.
