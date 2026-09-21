# Referensi Elemen dan Atribut HTML

Dokumen ini berisi daftar dan penjelasan mengenai fungsi dari berbagai elemen serta atribut dasar yang sering digunakan dalam pembuatan struktur halaman web menggunakan HTML.

## Daftar Referensi

| No. | Elemen / Atribut | Deskripsi Fungsi |
| :-- | :--- | :--- |
| 1 | `<a href=”index.html”>` | Membuat *hyperlink internal/relatif* yang mengarahkan pengguna ke halaman "index.html" di direktori yang sama. |
| 2 | `<a href=”https://www.google.com/”>` | Membuat *hyperlink eksternal/absolut* yang mengarahkan pengguna ke situs web eksternal (Google). |
| 3 | `<a href=”#referensi”>` | Membuat tautan *anchor* yang mengarahkan pengguna melompat ke bagian pada halaman yang sama yang memiliki ID "referensi". |
| 4 | `target=”_blank”` | Atribut tautan agar halaman tujuan dibuka pada jendela (*window*) atau tab peramban (*browser*) yang **baru**. |
| 5 | `target=”_top”` | Atribut tautan agar halaman tujuan dibuka pada jendela teratas (memecah semua frame jika dokumen berada dalam iframe). |
| 6 | `<input type="radio">` | Membuat tombol radio, di mana pengguna hanya diperbolehkan **memilih salah satu** dari beberapa opsi yang tersedia dalam satu grup. |
| 7 | `<input type="checkbox">` | Membuat kotak centang, di mana pengguna diperbolehkan memilih **satu, lebih dari satu, atau tidak memilih sama sekali** opsi yang tersedia. |
| 8 | `<input type="submit">` | Membuat tombol yang berfungsi untuk **mengirimkan (submit)** data dari dalam form ke server. |
| 9 | `<input type="reset">` | Membuat tombol yang berfungsi untuk **menghapus atau mengembalikan semua inputan** di form tersebut ke nilai awal (default). |
| 10 | `<textarea>` | Membuat bidang input teks multi-baris untuk menginput teks yang panjang (seperti alamat atau pesan). |
| 11 | `name=”text”` | Memberikan identitas/nama variabel "text" pada elemen input, yang nantinya akan dikirimkan dan diproses oleh server saat form dikirim. |
| 12 | `cols=”20”` | Atribut pada `<textarea>` yang menentukan **lebar** area teks berdasarkan jumlah karakter (20 kolom). |
| 13 | `rows=”30”` | Atribut pada `<textarea>` yang menentukan **tinggi** area teks berdasarkan jumlah baris (30 baris). |
| 14 | `value=”submit”` | Menentukan nilai bawaan (*default value*) pada elemen input form, atau teks yang tertulis pada sebuah tombol. |
| 15 | `<label for=”color”>` | Mengikat label teks agar terhubung dengan elemen form yang memiliki ID "color". Jika diklik, input yang terhubung akan otomatis fokus. |
| 16 | `<th>` | Singkatan dari *Table Heading*, mendefinisikan sel untuk **judul kolom/baris** di dalam tabel (teks otomatis rata tengah dan tebal). |
| 17 | `<tr>` | Singkatan dari *Table Row*, mendefinisikan satu **baris horizontal** di dalam tabel. |
| 18 | `<td>` | Singkatan dari *Table Data*, mendefinisikan **sel data reguler** di dalam suatu baris tabel. |
| 19 | `colspan=”2”` | Atribut tabel untuk menggabungkan sel secara **horizontal** sebanyak 2 kolom. |
| 20 | `rowspan=”2”` | Atribut tabel untuk menggabungkan sel secara **vertikal** sebanyak 2 baris. |

---
*Dokumen ini disusun sebagai bagian dari pemenuhan Tugas Modul HTML.*