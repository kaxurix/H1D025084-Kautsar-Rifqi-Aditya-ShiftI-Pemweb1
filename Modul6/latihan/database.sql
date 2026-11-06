CREATE DATABASE IF NOT EXISTS modul_6_latihan;
USE modul_6_latihan;

CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100),
  `konten` varchar(1000),
  PRIMARY KEY (`id`)
);

INSERT INTO `posts` (`judul`, `konten`) VALUES
('Tips Menjaga Baterai Laptop Tetap Awet',
'Baterai adalah salah satu komponen laptop yang paling cepat menurun kualitasnya. Kebiasaan sehari-hari seperti membiarkan laptop terus tercolok charger atau membiarkannya kehabisan daya sampai mati dapat mempercepat penurunan kapasitas baterai.

Agar baterai lebih awet, usahakan menjaga level daya di kisaran 20 hingga 80 persen, hindari suhu yang terlalu panas, dan gunakan charger bawaan pabrikan. Mengaktifkan mode hemat daya saat tidak membutuhkan performa tinggi juga sangat membantu.'),
('Mengenal PHP sebagai Bahasa Pemrograman Web',
'PHP adalah bahasa skrip yang berjalan di sisi server dan banyak digunakan untuk membangun halaman web dinamis. Kode PHP dieksekusi di server, sehingga pengunjung hanya menerima hasil akhirnya dalam bentuk HTML.

Selain mudah dipelajari, PHP memiliki dukungan database yang baik, terutama MySQL. Karena itu PHP sering menjadi pilihan pertama bagi pemula yang ingin belajar membuat aplikasi web, seperti sistem CRUD sederhana.'),
('Pentingnya Membuat Cadangan Data Secara Rutin',
'Kehilangan data bisa terjadi kapan saja, mulai dari kerusakan perangkat, serangan malware, hingga kesalahan manusia. Tanpa cadangan, data penting seperti tugas kuliah dan dokumen pribadi bisa hilang selamanya.

Terapkan aturan 3-2-1: simpan tiga salinan data, di dua jenis media yang berbeda, dan satu salinan di lokasi lain seperti penyimpanan awan. Biasakan melakukan pencadangan secara terjadwal agar data selalu terbarui.');
