-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Des 2020 pada 18.37
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `camshot1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `checkout`
--

CREATE TABLE `checkout` (
  `id_checkout` int(11) NOT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `ongkir` int(11) DEFAULT NULL,
  `total_pembayaran` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(2, 'Nikon'),
(3, 'canon');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nota_pembelian`
--

CREATE TABLE `nota_pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `nota` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `harga` int(128) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `subharga` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nota_pembelian`
--

INSERT INTO `nota_pembelian` (`id_pembelian`, `nota`, `id_produk`, `nama`, `harga`, `jumlah`, `subharga`) VALUES
(24, 19, 28, '213123', 3213, 1, 3213),
(25, 20, 20, 'EOS 800D Kit (EF S18-55 IS STM)', 13800000, 1, 13800000),
(26, 21, 19, 'EOS 200D II (EF-S 18-55mm f/4-5.6 IS STM)', 12250000, 1, 12250000),
(27, 22, 26, 'adsada', 123321, 2, 246642),
(28, 22, 27, 'adeee', 123, 1, 123),
(29, 22, 28, '213123', 3213, 1, 3213),
(30, 23, 21, 'EOS 1500D Kit (EF S18-55 IS II)', 7500000, 1, 7500000),
(31, 23, 26, 'adsada', 123321, 1, 123321),
(32, 23, 28, '213123', 3213, 1, 3213),
(33, 24, 27, 'adeee', 123, 1, 123),
(34, 24, 28, '213123', 3213, 1, 3213),
(35, 25, 26, 'adsada', 123321, 1, 123321),
(36, 26, 31, 'kamera nikon mantap', 12000, 1, 12000),
(37, 27, 28, '213123', 3213, 1, 3213),
(38, 28, 28, '213123', 3213, 1, 3213),
(39, 29, 30, 'kamera nikon mantap', 1234, 1, 1234),
(40, 30, 31, 'kamera nikon mantap', 12000, 1, 12000),
(41, 31, 31, 'kamera nikon mantap', 12000, 1, 12000),
(42, 31, 28, '213123', 3213, 1, 3213),
(43, 32, 27, 'adeee', 123, 1, 123),
(44, 32, 28, '213123', 3213, 1, 3213),
(45, 32, 21, 'EOS 1500D Kit (EF S18-55 IS II)', 7500000, 1, 7500000),
(46, 33, 31, 'kamera nikon mantap', 12000, 1, 12000),
(47, 33, 30, 'kamera nikon mantap', 1234, 1, 1234),
(48, 33, 28, '213123', 3213, 1, 3213);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ongkos_kirim`
--

CREATE TABLE `ongkos_kirim` (
  `id_ongkir` int(11) NOT NULL,
  `nama_kota` varchar(128) NOT NULL,
  `biaya_ongkir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ongkos_kirim`
--

INSERT INTO `ongkos_kirim` (`id_ongkir`, `nama_kota`, `biaya_ongkir`) VALUES
(1, 'Denpasar', 2000),
(2, 'Gianyar', 4000),
(3, 'Badung', 6000),
(4, 'Tabanan', 9000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `nama_kota` varchar(128) NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `biaya_ongkir` int(11) NOT NULL,
  `alamat_pengiriman` varchar(128) NOT NULL,
  `status_pembelian` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_user`, `tanggal_pembelian`, `nama_kota`, `total_pembelian`, `biaya_ongkir`, `alamat_pengiriman`, `status_pembelian`) VALUES
(1, 5, '2020-12-17', '', 3213, 0, '', ''),
(2, 5, '2020-12-17', '', 3213, 0, '', ''),
(3, 5, '2020-12-17', '', 3213, 0, '', ''),
(4, 5, '2020-12-17', '', 3213, 0, 'hjkkhjk', ''),
(5, 5, '2020-12-17', '', 0, 0, 'kkk', ''),
(6, 5, '2020-12-17', '', 0, 0, 'mjjjj', ''),
(7, 5, '2020-12-17', '', 0, 0, 'uyy', ''),
(8, 27, '2020-12-17', '', 0, 0, 'asas', ''),
(9, 27, '2020-12-17', '', 3213, 0, 'sas', ''),
(10, 27, '2020-12-17', 'Tabanan', 132321, 0, 'fsfssa', ''),
(11, 27, '2020-12-17', 'Denpasar', 22002123, 2000, 'ewew', ''),
(12, 27, '2020-12-17', 'Denpasar', 2000, 2000, 'bv', ''),
(13, 27, '2020-12-17', 'Tabanan', 22009000, 9000, 'fhghf', ''),
(14, 27, '2020-12-17', 'Badung', 22006000, 6000, 'bvbv', ''),
(15, 27, '2020-12-17', 'Denpasar', 22002000, 2000, 'Jln Pulau Supiori Gang 2 No.1', ''),
(16, 27, '2020-12-17', 'Denpasar', 5213, 2000, 'fddf', ''),
(17, 27, '2020-12-17', 'Tabanan', 13809000, 9000, 'ert', ''),
(18, 27, '2020-12-17', 'Denpasar', 1233231, 2000, 'uuu', ''),
(19, 27, '2020-12-17', 'Denpasar', 5213, 2000, 'jalan pulau supiori', ''),
(20, 27, '2020-12-17', 'Denpasar', 13802000, 2000, 'lll', ''),
(21, 27, '2020-12-17', 'Denpasar', 12252000, 2000, 'dss', ''),
(22, 27, '2020-12-17', 'Badung', 255978, 6000, 'indie ganteng', ''),
(23, 27, '2020-12-17', 'Tabanan', 7635534, 9000, 'jalan jalan cakep', ''),
(24, 27, '2020-12-17', 'Denpasar', 5336, 2000, 'dsdsadas', ''),
(25, 28, '2020-12-17', 'Badung', 129321, 6000, 'sdsds', ''),
(26, 0, '2020-12-18', 'Denpasar', 14000, 2000, 'jalan mantapss', 'Pending'),
(27, 0, '2020-12-18', 'Denpasar', 5213, 2000, 'sdadsa', 'Pending'),
(28, 0, '2020-12-18', 'Badung', 9213, 6000, 'dadaa', 'Pending'),
(29, 0, '2020-12-18', 'Badung', 7234, 6000, 'das', 'Pending'),
(30, 27, '2020-12-18', 'Denpasar', 14000, 2000, 'dasaasda', 'Lunas'),
(31, 27, '2020-12-18', 'Tabanan', 24213, 9000, 'jalan pulau murah', 'Barang Dikirim'),
(32, 27, '2020-12-18', 'Denpasar', 7505336, 2000, 'sdadadsa', 'Lunas'),
(33, 27, '2020-12-18', 'Badung', 22447, 6000, 'Jalan Pulau Nias', 'Lunas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(5) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `harga_produk` int(20) NOT NULL,
  `stok_produk` int(20) NOT NULL,
  `spesifikasi_produk` text NOT NULL,
  `foto_produk` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `harga_produk`, `stok_produk`, `spesifikasi_produk`, `foto_produk`) VALUES
(32, 3, 'EOS 200D II (EF-S 18-55mm f/4-5.6 IS STM)', 12250000, 2, 'EOS 200D II adalah DSLR Canon paling ringan yang dilengkapi layar LCD Touch Screen Vari-angle. Beratnya tidak melebihi berat dari sebotol air*, kamera ini pas dibawa menggunakan tas dan siap menemanimu memotret setiap hari. Bodi kamera yang mungil ini dilengkapi dengan sensor CMOS APS-C 24,1 megapiksel, prosesor DIGIC 8 dan segudang fitur yang akan memudahkanmu untuk memotret kehidupan yang kamu temui setiap hari.\r\n\r\nUntuk pertama kalinya, fitur Creative Assist dan Smooth Skin, tergabung dalam EOS DSLR. Kamu bisa menghasilkan efek yang kamu inginkan dan dengan mudah mengambil foto selfie yang sempurna. Perangkat selulermu bisa tetap terhubung ke kamera dengan koneksi Bluetooth Hemat Energi dan kamu bisa mengirimkan foto ke perangkat selulermu melalui Wi-Fi seketika saat kamu memotret. Sehingga memudahkanmu untuk berbagi foto.\r\n\r\nEOS 200D II didesain nyaman dengan pegangan yang dalam dan sejumlah dial fungsi yang diatur ergonomis. Dengan pilihan warna Black, Silver dan White, kamera ini semakin melengkapi gayamu.\r\n\r\nSensor CMOS APS-C 24,1MP\r\nDual Pixel CMOS AF\r\nDIGIC 8\r\n3.975 pilihan posisi fokus (Live View)\r\nCreative Assist, Creative Filters dan Smooth Skin\r\nEye Detection AF (One Shot & Servo AF â€“ Live View)', '20201218173446200d.png'),
(33, 3, 'EOS 90D (EF-S18-55mm f/3.5-5.6 IS STM)', 21350000, 2, 'EOS 90D dirancang bagi mereka yang ingin lebih mengasah keterampilannya, memiliki 45 titik AF tipe silang dalam jendela bidik optiknya dengan cakupan 100% dan dapat memotret hingga 10fps, bahkan dalam mode AF tracking (pelacakan AF)--menangkap momen yang menentukan, baik dalam fotografi olahraga maupun kehidupan alam liar. 5.481 pilihan posisi fokus dan Eye Detection AF memberikan kreativitas yang lebih luas dalam menyusun komposisi pada mode Live View, memberikan jaminan setiap gambar dapat terabadikan dengan tajam.\r\n\r\nEOS 90D dapat merekam video 4K dalam mode uncropped (tanpa krop) atau cropped (krop), sehingga pengguna bisa mendapatkan sudut pandang penuh atau menjangkau objek yang lebih jauh dengan lensa mereka.\r\n\r\nOperabilitas EOS 90D semakin ditingkatkan, dilengkapi dengan daya tahan terhadap kelembapan dan kedap debu, multi-controller yang baru serta tombol rana yang lebih sempurna, mengurangi kerepotan selama pemotretan beruntun.\r\n\r\nSensor APS-C CMOS 32,5MP + DIGIC 8\r\nDual Pixel CMOS AF\r\n45 AF tipe silang (Viewfinder Optik)\r\nFace detection (Viewfinder Optik & Live View)\r\n5.481 pilihan posisi fokus (Live View)\r\nEye Detection AF (One Shot & Servo AF â€“ Live View)\r\n4K Video (Uncropped/Cropped)', '2020121817363790d.png'),
(34, 3, 'EOS 6D Mark II Kit (EF 24-70mm f/4L IS USM)', 41800000, 3, 'Hadir sebagai DSLR paling ringan dalam jajaran EOS full-frame DSLR, EOS 6D Mark II adalah kamera DSLR yang dahsyat namun tetap ringkas, yang mampu membawa karya Anda ke level berikutnya. Sensor 26,2 megapiksel, Dual Pixel CMOS AF, dan layar sentuh LCD Vari-angle yang dimiliki kamera ini memberikan Anda kemudahan untuk mengambil foto dan video yang memukau. Anda dapat mengabadikan momen dengan AF cepat, yang dapat dioperasikan melalui layar sentuh dan dari sudut yang berbeda-beda. Movie digital IS, sistem stabilisasi gambar 5-poros, ditanamkan pada kamera ini untuk menekan guncangan kamera apabila merekam film dengan genggaman tangan â€” fitur yang berguna, khususnya apabila merekam dalam kualitas setinggi Full HD 60p / 50p.\r\n\r\nSensor CMOS frame penuh 26,2MP\r\nAF CMOS Piksel Ganda\r\nAF 45 titik semua tipe silang; pemotretan beruntun hingga 6,5 fps\r\nISO 100 â€“ 40000 (Dapat ditingkatkan hingga 102400)\r\nGPS, Wi-Fi, NFC dan Bluetooth hemat energi', '202012181738466d.png'),
(35, 3, 'EOS 80D Kit III (EF-S18-200 IS)', 23590000, 1, 'Dilengkapi dengan sensor CMOS ukuran APS-C 24.2MP yang menangkap gambar resolusi tinggi, EOS 80D, dengan ukuran bodi yang mudah ditangani, memiliki cakupan viewfinder kira-kira 100% yang layak dibanggakan. 45 titik yang baru saja dikembangkan, sensor AF semua tipe silang dan kecepatan pemotretan beruntun hingga 7.0fps, membuatnya sebagai pilihan istimewa untuk menangkap subjek bergerak. Pembuatan film berkualitas hingga Full HD 60p juga didukung, dan Dual Pixel CMOS AF, yang memungkinkannya mencapai AF kecepatan tinggi selama pemotretan Live View sudah disempurnakan agar kompatibel dengan penggunaan semua lensa EF. Pemotretan jarak jauh dan berbagi gambar dengan perangkat cerdas juga mudah, karena kamera ini mendukung Wi-Fi dan NFC.\r\n\r\nCMOS APS-C 24MP + DIGIC 6\r\nAF 45 titik semua tipe silang\r\nAF CMOS Piksel Ganda', '2020121817402480d.png'),
(36, 3, 'EOS 77D Kit (EF-S18-135 IS USM)', 20700000, 3, 'Memiliki kecepatan pemfokusan 0,03det. yang merupakan AF pemfokusan tercepat di dunia *^selama pemotretan Live View, memang layak dibanggakan dan berbagai fungsi menarik serta operabilitas yang tinggi, EOS DSLR ini akan membawa foto Anda ke level berikutnya. Kamera ini dilengkapi dengan dua dial elektronik sehingga Anda bisa merasakan operasional analog secara langsung seperti yang ditemukan pada kamera yang lebih canggih. Pengaturan kamera bisa dilakukan dalam seketika. Kecepatan ISO normal setinggi ISO 25600 terealisasikan berkat DIGIC 7 yang ikut berperan dalam menghasilkan foto serta cuplikan foto serba indah, dan meminimalkan noise serta goyangan kamera. Fokus otomatis cepat dan tepat juga dimungkinkan, apa pun gaya pemotretannya. Yang layak dicatat yaitu, AF Live View, yang dapat menetapkan fokus secepat 0,03 detik^ berkat sistem Dual Pixel CMOS AF yang sudah lebih baik. Untuk pemotretan viewfinder, sistem 45 titik AF Semua tipe silang, secara padat mencakup area lebar layar viewfinder untuk presisi yang lebih baik. Pembuatan film juga lebih menarik dari yang sudah-sudah, karena ada berbagai opsi pemotretan seperti Time Lapse (Jeda Waktu) dan film HDR selain mendukung Full HD 50p / 60p.', '20201218174114eos-77d-l.png'),
(37, 3, 'EOS 5D Mark IV Kit (EF 24 - 70 IS USM)', 66995000, 3, 'Sebagai generasi ke-4 dari kamera EOS full-frame Canon paling laris, EOS 5D Mark IV semakin matang dan memiliki peningkatan besar yang layak dibanggakan. Sensor CMOS full-frame 30.4 megapiksel yang dilengkapi dengan Dual Pixel CMOS AF. AF berkecepatan tinggi dan memiliki presisi tinggi yang bukan hanya untuk memotret tetapi juga untuk pembuatan film 4K yang memungkinkan pembuatan film profesional. Dengan fleksibilitas yang dimilikinya, apa pun subjeknya, DSLR canggih ini mampu menuangkan gagasan kreatif para fotografer profesional menjadi karya yang mengagumkan.\r\n\r\nAF CMOS Piksel Ganda\r\nSensor CMOS frame penuh 30.4MP\r\nPembuatan Film 4K (25 / 30p) dengan Pengambilan Frame 4K\r\nKapabilitas Canon Log', '202012181742095d.png'),
(38, 2, 'Nikon Mirrorless Full Frame Z5 + 24-50mm F/4-6.3', 27000000, 3, 'Deskripsi Nikon Mirrorless Full Frame Z5 + 24-50mm F/4-6.3\r\nHarness the entire view of expansive full frame lenses, and capture over 50% more image area than crop-sensor cameras. Z 5â€™s 24.3 MP full frame CMOS sensor produces intensively detailed images, lifelike 4K UHD video, ultra shallow depth-of-field and particularly clean low-light shots.\r\n\r\nZ 5 is powered by Nikonâ€™s fast, comprehensive EXPEED 6 image processing system. Itâ€™s the secret behind the cameraâ€™s sensational photo and video quality, autofocus performance, low-light capabilities, distortion control, image clarity, color reproduction and more.\r\n\r\nSharpness starts with stability, and Z 5 has one of the best in-camera image stabilization systems available. NIKKOR Z lenses activate 5-axis VR image stabilizationâ€”up to five stops* of stabilization in up to five directions: yaw, pitch, roll, X and Y. Compatible F-Mount NIKKOR lenses**â€”even those without built-in VRâ€”activate 3-axis VR image stabilization. Great for stills, even better for video.\r\n\r\nFreeze time with shutter speeds as fast as 1/8000 of a secondâ€”fast enough to capture moments invisible to the naked eye. When shooting with wide aperture settings for shallow depth-of-field and blurred backgrounds, that speed can also be used to control your shotâ€™s brightness.\r\n\r\nZ 5â€™s sensor is practically covered in focus pointsâ€”273 of them, to be precise. That means wherever your subject is within the frame, thereâ€™s almost certainly a focus point locked on them.', '20201218174539nikon.jpg'),
(39, 2, 'Nikon COOLPIX P950', 10500000, 4, 'Step into a super-telephoto world.\r\nThe 83x optical zoom of the COOLPIX P950 covers an incredible focal-length range, from wide-angle 24mm1 to super-telephoto 2,000mm1 and everything in between. With a zoom this powerful, you can capture distant subjects far beyond the reach of an ordinary cameraâ€”from birds and other animals in the wild, to distant landscapes, aircraft and even planets. Dynamic Fine Zoom2, an enhanced digital zoom that effectively doubles the reach to a 4,000mm1, allowing for even greater zoom potential. At the other end of the spectrum, macro photography can be captured as close as approx. 1 cm/0.4 in.3. From macro close-ups to extreme telephoto superzoom , the COOLPIX P950 delivers sharp, clear and beautiful images, all in a compact, highly portable body.\r\n\r\nDual Detect Optical VR for reliable super-telephoto stabilization.\r\nImage blur can be a major issue, especially with distant subjects and super-telephoto shooting. Thanks to its Dual Detect Optical VR (Vibration Reduction), the COOLPIX P950 effectively reduces image blur caused by camera shake for sharp images of distant subjects even when shooting handheld. In NORMAL mode, images are stabilized with an equivalent of shooting at a shutter speed 5.5 stops faster1, the maximum in the history of Nikon compact digital cameras2.\r\n\r\nTime-lapse movies made easy.\r\nDynamic time-lapse movies of landscapes and more can be automatically created from a series of still images captured in interval timer shooting. Just select one of five scene mode options and the most appropriate interval is automatically set.', '20201218174702nikon1.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_foto`
--

CREATE TABLE `produk_foto` (
  `id_produk_foto` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama_produk_foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk_foto`
--

INSERT INTO `produk_foto` (`id_produk_foto`, `id_produk`, `nama_produk_foto`) VALUES
(68, 27, '20201208161819unud-bg.jpg'),
(69, 28, '20201208161835background.jpg'),
(70, 29, '20201208161908Galaxy.jfif'),
(73, 31, '20201218103940I Putu Indie Surya Jayadi_Koordinator Manager.jpg'),
(74, 19, '20201218173036200d.png'),
(76, 32, '20201218173446200d.png'),
(77, 32, '20201218173446'),
(78, 33, '2020121817363790d.png'),
(79, 34, '202012181738466d.png'),
(80, 35, '2020121817402480d.png'),
(81, 36, '20201218174114eos-77d-l.png'),
(82, 37, '202012181742095d.png'),
(83, 38, '20201218174539nikon.jpg'),
(84, 39, '20201218174702nikon1.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `alamat_user` text NOT NULL,
  `tlp_user` varchar(50) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `name`, `username`, `email`, `password`, `alamat_user`, `tlp_user`, `level`) VALUES
(22, 'ddddddd', 'a', 'adisusilayasa@gmail.com', '$2y$10$62dIkvVG7RFNViAVpAitHutBO.pIqLV/afAxj1mxOfJEvALFn.oea', '', '', 'user'),
(23, 'Adi Susilayasa', '1808561089', 'adisusilayasa@gmail.com', '$2y$10$a8icGhPBLzR6PYGeO3M5JexJ1AxrNGBwLJcRcvo662EnjPUDe/DLe', '', '', 'user'),
(24, 'Inconesian Magazine / Book Front Cover  ', '1808561089', '3523adisusilayasa@gmail.com', '$2y$10$uabWUEcx9s59j3Q4xJSnEeq5iRXxmK8E2to4Ns83jgynkDSjoubq2', '', '', 'user'),
(25, 'Adi Susilayasa', 'kotongzz', 'adisusilayasa@gmail.com', '$2y$10$ZGb4yvsbmG8.lv3PdBMzXOGXNB89zR9JIFVLrOb9uxb./6zQ1Hwre', '', '', 'admin'),
(26, 'Adi Susilayasa', 'kotongzzz', 'adisusilayasa@gmail.comm', '$2y$10$tmYJlTZj4r7A4Ie.lDtrIup6FECmaHR1.Y8z2SwxDY.RYzTrsT.j6', 'saddddddddd', '12321321321', 'user'),
(27, 'Indie Surya', 'indie', 'anaksenja234@gmail.com', 'indie', 'ssss', '6289654323185', 'user'),
(28, 'Indie Surya', 'mantap', 'rvfutsal4@gmail.com', 'mantap', 'dsadasa', '098987876567', 'user'),
(29, 'indiessss', 'indiess', 'indiess@gmail.com', 'indiess', 'jalan mantap', '098765456456', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`id_checkout`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `nota_pembelian`
--
ALTER TABLE `nota_pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indeks untuk tabel `ongkos_kirim`
--
ALTER TABLE `ongkos_kirim`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `produk_foto`
--
ALTER TABLE `produk_foto`
  ADD PRIMARY KEY (`id_produk_foto`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `checkout`
--
ALTER TABLE `checkout`
  MODIFY `id_checkout` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `nota_pembelian`
--
ALTER TABLE `nota_pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `ongkos_kirim`
--
ALTER TABLE `ongkos_kirim`
  MODIFY `id_ongkir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `produk_foto`
--
ALTER TABLE `produk_foto`
  MODIFY `id_produk_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
