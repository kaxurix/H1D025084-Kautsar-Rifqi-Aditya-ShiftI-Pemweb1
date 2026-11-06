CREATE DATABASE IF NOT EXISTS cod_barang;
USE cod_barang;

CREATE TABLE `barang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100),
  `harga` int(11),
  PRIMARY KEY (`id`)
);

CREATE TABLE `pembeli` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100),
  `nomor_hp` varchar(20),
  `alamat` varchar(255),
  PRIMARY KEY (`id`)
);

CREATE TABLE `kurir` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100),
  `nomor_hp` varchar(20),
  PRIMARY KEY (`id`)
);

INSERT INTO barang (nama, harga) VALUES
('Gergaji', 85000), ('Pulpen', 3000), ('Laptop', 7500000);

INSERT INTO pembeli (nama, nomor_hp, alamat) VALUES
('Muflih', '081234567890', 'Purwokerto'),
('Romi', '082345678901', 'Banyumas'),
('Anin', '083456789012', 'Purbalingga');

INSERT INTO kurir (nama, nomor_hp) VALUES
('Althaaf', '085111111111'),
('Irsyad', '085222222222'),
('Ilhan', '085333333333');
