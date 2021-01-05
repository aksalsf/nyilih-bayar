-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2021 at 08:04 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nyilih_bayar`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` char(8) NOT NULL,
  `admin_username` varchar(16) NOT NULL,
  `admin_email` varchar(64) NOT NULL,
  `admin_password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `admin_username`, `admin_email`, `admin_password`) VALUES
('ROOT0001', 'admin', 'admin@nyilihbayar.id', '$2y$10$3RYFiKp6VbBzpJF0ay3nM.wRQhyEJWJjaBr4Lv9A15ILBWQaZdRqC');

-- --------------------------------------------------------

--
-- Table structure for table `tb_akses`
--

CREATE TABLE `tb_akses` (
  `akses_id` char(8) NOT NULL,
  `akses_kode` char(8) NOT NULL,
  `penyewa_id` char(8) NOT NULL,
  `buku_id` char(8) NOT NULL,
  `transaksi_id` char(8) NOT NULL,
  `akses_tanggal_awal` date NOT NULL,
  `akses_tanggal_akhir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_akses`
--

INSERT INTO `tb_akses` (`akses_id`, `akses_kode`, `penyewa_id`, `buku_id`, `transaksi_id`, `akses_tanggal_awal`, `akses_tanggal_akhir`) VALUES
('K2101001', 'U9SDNDX8', 'C2101001', 'B2101002', 'T2101002', '2021-01-05', '2021-01-10'),
('K2101002', 'DX7KN2P4', 'C2101001', 'B2101016', 'T2101001', '2021-01-05', '2021-01-10');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bahasa`
--

CREATE TABLE `tb_bahasa` (
  `bahasa_id` char(8) NOT NULL,
  `bahasa_nama` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_bahasa`
--

INSERT INTO `tb_bahasa` (`bahasa_id`, `bahasa_nama`) VALUES
('BLANG001', 'Bahasa Indonesia'),
('BLANG002', 'English'),
('BLANG003', 'Melayu');

-- --------------------------------------------------------

--
-- Table structure for table `tb_buku`
--

CREATE TABLE `tb_buku` (
  `buku_id` char(8) NOT NULL,
  `buku_judul` varchar(256) NOT NULL,
  `buku_isbn` varchar(18) NOT NULL,
  `kategori_id` char(8) NOT NULL,
  `pengarang_id` char(8) NOT NULL,
  `penerbit_id` char(8) NOT NULL,
  `bahasa_id` char(8) NOT NULL,
  `buku_tahun_terbit` year(4) NOT NULL,
  `buku_sinopsis` text NOT NULL,
  `buku_cover` varchar(24) NOT NULL,
  `buku_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_buku`
--

INSERT INTO `tb_buku` (`buku_id`, `buku_judul`, `buku_isbn`, `kategori_id`, `pengarang_id`, `penerbit_id`, `bahasa_id`, `buku_tahun_terbit`, `buku_sinopsis`, `buku_cover`, `buku_status`) VALUES
('B2101001', 'Belajar PHP', '823729357923759287', 'CAT21002', 'AUTH0019', 'PUB21001', 'BLANG001', 2021, '    Mudah Belajar PHP dari NOL ', '823729357923759287.jpg', 0),
('B2101002', 'Supernova 2: Akar', '9799625726', 'CAT20001', 'AUTH0007', 'PUB20009', 'BLANG001', 2002, 'Di Bolivia, Gio mendapat kabar bahwa Diva hilang dalam sebuah ekspedisi sungai di pedalaman Amazon. \r\n        Di Indonesia, perjalanan seorang anak yatim piatu bernama Bodhi dimulai. Bodhi, yang dibesarkan di wihara oleh Guru Liong, \r\n        akhirnya meninggalkan tempat ia dibesarkan dan bertualang ke Asia Tenggara. Di Bangkok, ia bertemu pria eksentrik bernama Kell yang mengajarinya seni tato.\r\n\r\n        Setelah melalui petualangan yang berliku di berbagai negara, Bodhi akhirnya kembali ke Indonesia. Ia dipertemukan dengan tokoh punk karismatik bernama Bong.\r\n        Sejak itu, Bodhi menjadi bagian dari komunitas punk dengan perannya sebagai seniman tato.\r\n        \r\n        Sebuah surat misterius yang ditemukan secara tidak sengaja oleh Bodhi kembali membawanya ke gerbang petualangan baru.', '9799625726.jpg', 0),
('B2101003', 'Supernova 4: Partikel', '6022910552', 'CAT20001', 'AUTH0007', 'PUB20001', 'BLANG001', 2012, 'naknya mengundang pertentangan dari keluarganya sendiri.\r\n\r\n        Di balik itu semua, masih tersimpan berlapis misteri, di antaranya hubungan khusus Firas dan sebuah tempat angker yang ditakuti warga kampung.\r\n        Tragedi demi tragedi yang menimpa keluarganya akhirnya membawa Zarah ke sebuah pelarian sekaligus pencarian panjang.\r\n        \r\n        Di konservasi orang utanTanjung Puting, Zarah menemukan keluarga baru dan kedekatannya kembali dengan alam. \r\n        Namun, bakat fotografinya membawa Zarah lebih jauh dari yang ia duga. Di London, tempat Zarah akhirnya bermarkas, ia menemukan segalanya.\r\n        Cinta, persahabatan, pengkhianatan. Termasuk petunjuk penting yang membawa titik terang bagi pencariannya.\r\n        \r\n        Sementara itu, di Kota Bandung, Elektra dan Bodhi akhirnya bertemu. Secara bersamaan, keduanya mulai mengingat siapa diri mereka sesungguhnya.', '6022910552.jpg', 0),
('B2101004', 'Filosofi Kopi: Kumpulan Cerita dan Prosa Satu Dekade', '9799625734', 'CAT20001', 'AUTH0007', 'PUB20009', 'BLANG001', 2006, 'Pemaknaan kembali kembali kopi, Buddha, Herman, surat tak tarkirimkan, cinta sejenis yang manis atau apa pun, membuktikan Dee tetap memesona.\r\n        Kalau kemarin panitia Nobel sastra masih maju mundur dengan nama Pramoedya, sekarang bisa memaknai kembali, melalui karya-karya ini.\r\n\r\n        Ruang cerpen yang sempit dijadikannya wahana yang intens namun tidak sesak untuk mengungkapkan apa yang tak selalu mampu dikatakan.\r\n        Lewat refleksi dan monolog interior yang digarap dengan cakap dan jernih. pembaca diajaknya menjelajahi halaman-halaman kecil dalam cerpen yang kini dijadikannya semesta kehidupan.\r\n        \r\n        Cerpen-cerpen Dee itu persis racikan kopi dari tangan seorang ahli peracik kopi: harum, menyegarkan, dan nikmat: pahit, tapi sekaligus mengandung manis.', '9799625734.jpg', 0),
('B2101005', 'Blink: The Power of Thinking Without Thinking', '0316010669', 'CAT20012', 'AUTH0011', 'PUB20013', 'BLANG002', 2005, 'Drawing on cutting-edge neuroscience and psychology and displaying all of the brilliance that made The Tipping Point a classic, Blink changes the way you ll understand every decision you make.\r\n        Never again will you think about thinking the same way.\r\n\r\n        Malcolm Gladwell redefined how we understand the world around us. Now, in Blink, he revolutionizes the way we understand the world within. Blink is a book about how we think without thinking,\r\n        about choices that seem to be made in an instant - in the blink of an eye - that actually arent as simple as they seem. Why are some people brilliant decision makers, while others are consistently inept?\r\n        Why do some people follow their instincts and win, while others end up stumbling into error? How do our brains really work - in the office, in the classroom, in the kitchen, and in the bedroom?\r\n        And why are the best decisions often those that are impossible to explain to others?\r\n        \r\n        In Blink we meet the psychologist who has learned to predict whether a marriage will last, based on a few minutes of observing a couple; the tennis coach who knows when a player will double-fault before the racket even makes contact with the ball;\r\n        the antiquities experts who recognize a fake at a glance. Here, too, are great failures of \"blink\": the election of Warren Harding; \"New Coke\"; and the shooting of Amadou Diallo by police. Blink reveals that great decision makers arent those who process the most information or spend the most time deliberating,\r\n        but those who have perfected the art of thin-slicing - filtering the very few factors that matter from an overwhelming number of variables.', '0316010669.jpg', 0),
('B2101006', 'Bumi Manusia', '9799731232', 'CAT20006', 'AUTH0012', 'PUB20005', 'BLANG001', 1980, 'Roman Tetralogi Buru mengambil latar belakang dan cikal bakal nation Indonesia di awal abad ke-20. Dengan membacanya waktu kita dibalikkan \r\n        sedemikian rupa dan hidup di era membibitnya pergerakan nasional mula-mula, juga pertautan rasa, kegamangan jiwa, percintaan, dan pertarungan kekuatan anonim para srikandi \r\n        yang mengawal penyemaian bangunan nasional yang kemudian kelak melahirkan Indonesia modern.\r\n\r\n        Roman bagian pertama; Bumi Manusia, sebagai periode penyemaian dan kegelisahan dimana Minke sebagai aktor sekaligus kreator adalah manusia berdarah priyayi yang semampu\r\n        mungkin keluar dari kepompong kejawaannya menuju manusia yang bebas dan merdeka, di sudut lain membelah jiwa ke-Eropa-an yang menjadi simbol dan kiblat dari ketinggian pengetahuan dan peradaban.\r\n        \r\n        Pram menggambarkan sebuah adegan antara Minke dengan ayahnya yang sangat sentimentil: Aku mengangkat sembah sebagaimana biasa aku lihat dilakukan punggawa terhadap kakekku dan nenekku dan orangtuaku, waktu lebaran.\r\n        Dan yang sekarang tak juga kuturunkan sebelum Bupati itu duduk enak di tempatnya. Dalam mengangkat sembah serasa hilang seluruh ilmu dan pengetahuan yang kupelajari tahun demi tahun belakangan ini.\r\n        Hilang indahnya dunia sebagaimana dijanjikan oleh kemajuan ilmu .... Sembah pengagungan pada leluhur dan pembesar melalui perendahan dan penghinaan diri! Sampai sedatar tanah kalau mungkin! Uh, anak-cucuku tak kurelakan menjalani kehinaan ini.\r\n        \r\n        \"Kita kalah, Ma,\" bisikku.\r\n        \r\n        \"Kita telah melawan, Nak, Nyo, sebaik-baiknya, sehormat-hormatnya.\"', '9799731232.jpg', 0),
('B2101007', 'Laskar Pelangi', '9793062797', 'CAT20007', 'AUTH0003', 'PUB20001', 'BLANG001', 2005, 'Begitu banyak hal menakjubkan yang terjadi dalam masa kecil para anggota Laskar Pelangi. Sebelas orang anak Melayu Belitong yang luar biasa ini tak menyerah walau keadaan tak bersimpati pada mereka.\r\n        Tengoklah Lintang, seorang kuli kopra cilik yang genius dan dengan senang hati bersepeda 80 kilometer pulang pergi untuk memuaskan dahaganya akan ilmu—bahkan terkadang hanya untuk menyanyikan Padamu Negeri di akhir jam sekolah.\r\n        Atau Mahar, seorang pesuruh tukang parut kelapa sekaligus seniman dadakan yang imajinatif, tak logis, kreatif, dan sering diremehkan sahabat-sahabatnya, namun berhasil mengangkat derajat sekolah kampung mereka dalam karnaval 17 Agustus.\r\n        Dan juga sembilan orang Laskar Pelangi lain yang begitu bersemangat dalam menjalani hidup dan berjuang meraih cita-cita. Selami ironisnya kehidupan mereka, kejujuran pemikiran mereka, indahnya petualangan mereka, dan temukan diri Anda tertawa, menangis,\r\n        dan tersentuh saat membaca setiap lembarnya. Buku ini dipersembahkan buat mereka yang meyakini the magic of childhood memories, dan khususnya juga buat siapa saja yang masih meyakini adanya pintu keajaiban lain untuk mengubah dunia: pendidikan.', '9793062797.jpg', 0),
('B2101008', 'Negeri 5 Menara', '9789792248616', 'CAT20004', 'AUTH0004', 'PUB20003', 'BLANG001', 2009, 'Alif lahir di pinggir Danau Maninjau dan tidak pernah menginjak tanah di luar ranah Minangkabau. Masa kecilnya adalah berburu durian runtuh di rimba Bukit Barisan, bermain bola di sawah berlumpur dan tentu mandi berkecipak di air biru Danau Maninjau.\r\n\r\n        Tiba-tiba saja dia harus naik bus tiga hari tiga malam melintasi punggung Sumatera dan Jawa menuju sebuah desa di pelosok Jawa Timur. Ibunya ingin dia menjadi Buya Hamka walau Alif ingin menjadi Habibie. Dengan setengah hati dia mengikuti perintah Ibunya: belajar di pondok.\r\n        \r\n        Di kelas hari pertamanya di Pondok Madani (PM), Alif terkesima dengan “mantera” sakti man jadda wajada. Siapa yang bersungguh-sungguh pasti sukses.\r\n        \r\n        Dia terheran-heran mendengar komentator sepakbola berbahasa Arab, anak menggigau dalam bahasa Inggris, merinding mendengar ribuan orang melagukan Syair Abu Nawas dan terkesan melihat pondoknya setiap pagi seperti melayang di udara.\r\n        \r\n        Dipersatukan oleh hukuman jewer berantai, Alif berteman dekat dengan Raja dari Medan, Said dari Surabaya, Dulmajid dari Sumenep, Atang dari Bandung dan Baso dari Gowa. Di bawah menara masjid yang menjulang, mereka berenam kerap menunggu maghrib sambil menatap awan lembayung yang berarak pulang ke ufuk.\r\n        Di mata belia mereka, awan-awan itu menjelma menjadi negara dan benua impian masing-masing. Kemana impian jiwa muda ini membawa mereka? Mereka tidak tahu. Yang mereka tahu adalah: Jangan pernah remehkan impian, walau setinggi apa pun. Tuhan sungguh Maha Mendengar.\r\n        \r\n        Bagaimana perjalanan mereka ke ujung dunia ini dimulai? Siapa horor nomor satu mereka? Apa pengalaman mendebarkan di tengah malam buta di sebelah sungai tempat jin buang anak? Bagaimana sampai ada yang kasak-kusuk menjadi mata-mata misterius? Siapa Princess of Madani yang mereka kejar-kejar?\r\n        Kenapa mereka harus botak berkilat-kilat? Bagaimana sampai Icuk Sugiarto, Arnold Schwarzenegger, Ibnu Rusyd, bahkan Maradona sampai akhirnya ikut campur? Ikuti perjalanan hidup yang inspiratif ini langsung dari mata para pelakunya. Negeri Lima Menara adalah buku pertama dari sebuah trilogi.', '9789792248616.jpg', 0),
('B2101009', '5 cm', '9797591514', 'CAT20003', 'AUTH0006', 'PUB20004', 'BLANG001', 2005, 'Lima sahabat telah menjalin persahabatan selama tujuh tahun. Mereka adalah Arial yang paling tampan, Riani sebagai satu-satunya wanita dalam kelompok itu, Zafran yang berlagak seperti seorang penyair, Ian yang paling subur badannya, dan Genta yang dianggap sebagai leader dalam kelompok itu.\r\n         Kegemaran mereka adalah mengeksekusi hal-hal yang tidak mungkin dan mencoba segala hal, mulai dari kafe paling terkenal di Jakarta, sampai nonton layar tancap. Semuanya penggemar film, dari film Hollywood sampai film yang nggak kelas—kecuali film India karena mereka punya prinsip bahwa semua persoalan di dunia atau masalah pasti ada jalan keluarnya, tapi bukan dalam bentuk joget.\r\n\r\n        Suatu saat, karena terdorong oleh rasa bosan di antara satu dan yang lain, mereka memutuskan untuk tidak saling berkomunikasi dan bertemu satu sama lain selama tiga bulan. Selama tiga bulan berpisah itulah telah terjadi banyak hal yang membuat hati mereka lebih kaya dari sebelumnya. Pertemuan setelah tiga bulan yang penuh dengan rasa kangen akhirnya terjadi dan dirayakan dengan sebuah perjalanan.\r\n        Sebuah perjalanan yang penuh dengan keyakinan, mimpi, cita-cita, dan cinta. Sebuah perjalanan yang telah mengubah mereka menjadi manusia sesungguhnya, bukan Cuma seonggok daging yang bisa berbicara, berjalan, dan punya nama.\r\n        \r\n        “Ada yang pernah bilang kalau idealisme adalah kemewahan terakhir yang dimiliki oleh generasi muda….”', '9797591514.jpg', 0),
('B2101010', 'Dilan: Dia Adalah Dilanku Tahun 1990', '6027870419', 'CAT20005', 'AUTH0013', 'PUB20012', 'BLANG001', 2014, '\"Milea, kamu cantik, tapi aku belum mencintaimu. Enggak tahu kalau sore. Tunggu aja\" (Dilan 1990)\r\n\r\n        \"Milea, jangan pernah bilang ke aku ada yang menyakitimu, nanti, besoknya, orang itu akan hilang.\" (Dilan 1990)\r\n        \r\n        \"Cinta sejati adalah kenyamanan, kepercayaan, dan dukungan. Kalau kamu tidak setuju, aku tidak peduli.\" (Milea 1990)', '6027870419.jpg', 0),
('B2101011', 'Antologi Rasa', '9789792274394', 'CAT20005', 'AUTH0010', 'PUB20003', 'BLANG001', 2011, 'Tiga sahabat. Satu pertanyaan. What if in the person that you love, you find a best friend instead of a lover?\r\n\r\n        K e a r a\r\n        \r\n        Were both just people who worry about the breaths we take, not how we breathe.\r\n        How can we be so different and feel so much alike, Rul?\r\n        Dan malam ini, tiga tahun setelah malam yang membuatku jatuh cinta, my dear, dan aku di sini terbaring menatap bintang-bintang di langit pekat Singapura ini, aku masih cinta, Rul. Dan kamu mungkin tidak akan pernah tahu.\r\n        Three years of my wasted life loving you.\r\n        \r\n        R u l y\r\n        \r\n        Yang tidak gue ceritakan ke Keara adalah bahwa sampai sekarang gue merasa mungkin satu-satunya momen yang bisa mengalahkan senangnya dan leganya gue subuh itu adalah kalau suatu hari nanti gue masuk ke ruangan rumah sakit seperti ini dan Denise sedang menggendong bayi kami yang baru dia lahirkan. Yang tidak gue ceritakan ke Keara adalah rasa hangat yang terasa di dada gue waktu suster membangunkan gue subuh itu dan berkata, \"Pak, istrinya sudah sadar,\" dan bahwa gue bahkan tidak sedikit pun berniat mengoreksi pernyataan itu. Mimpi aja terus, Rul.\r\n        \r\n        H a r r i s\r\n        \r\n        Senang definisi gue: elo tertawa lepas. Senang definisi elo? Mungkin gue nggak akan pernah tahu. Karena setiap gue mencoba melakukan hal-hal manis yang gue lakukan dengan perempuan-perempuan lain yang sepanjang sejarah tidak pernah gagal membuat mereka klepek-klepek, ucapan yang harus gue dengar hanya, \"Harris darling, udah deh, nggak usah sok manis. Go back being the chauvinistic jerk that I love.\"\r\n        Thats probably as close as I can get to hearing that she loves me.\r\n        \r\n        \r\n        Kisah kosmopolis ini sesungguhnya mengangkat tema klasik: cinta saling-silang yang menanti titik temu. Dalam bukunya kali ini, dengan berani Ika Natassa \"memerankan\" setiap tokoh dan bercerita dari sudut pandang mereka masing-masing, membuat dinamika yang menarik, tajam, cerdas, sekaligus humoris sepanjang cerita. Untuk penggemar chicklit atau buku-buku bertema metropop, karya Ika Natassa ini tidak sepantasnya dilewatkan.\r\n        -- Dewi Lestari, penulis\r\n        \r\n        Love this novel!\r\n        Dengan banyak karakter dan cerita yang disuguhkan, Ika memberikan cerita yang jujur, apa adanya, dan membumi. Novel ini berbeda dengan novel-novel sebelumnya tanpa kehilangan signature sang penulis. If only every book I read was this good.\r\n        -- Ninit Yunita, penulis\r\n        \r\n        Sebagai pembaca sok pinter, berkali-kali saya berusaha menebak alur novel ini. Berkali-kali juga saya cengar-cengir karena twist yang muncul tak terduga mementahkan tebakan itu dan tanpa disadari saya sudah hanyut dalam cerita ini. Ikut frustrasi bersama Harris. Ikut sedih bareng Keara. Ikut jatuh cinta dengan Ruly. Novel ini wajib dibaca kalau kamu sudah bosan dibuai novel bertema sejenis dengan cerita yang too good to be true. Novel ini akan bikin kamu terharu, bahagia, sedih, sebal, dan akhirnya tersadar: cinta dan realita itu... ya kayak gini.\r\n        -- Jenny Jusuf penulis, blogger\r\n        \r\n        Ika Natassa is one of my favorite writers dan Antologi Rasa benar-benar mengobati kerinduan untuk membaca tulisan Ika. Bahasanya witty, alur cerita mengalir lancar dan plot serta pilihan kata yang selalu bikin jleb after jleb after jleb in my heart. Kena banget! Love is a universal topic and Ika Natassa with her Antologi Rasa has bring it to the next level!\r\n        --Ollie, penulis, pemilik NulisBuku.com\r\n        \r\n        Antologi Rasa mengobati rasa kangen saya pada lembaran kisah makhluk urban khas Ika yang ceplas ceplos dan menggigit. Bersiaplah untuk terombang-ambing di dalamnya karena rasa (di hati) tidak pernah berbohong.\r\n        -- Sitta Karina, novelis dan kontributor lepas\r\n        \r\n        Antologi Rasa is a no-barrier urban novel. Ika Natassa menghadirkan karakter-karakter metropolis yang dibalik kesuksesan karir dan finansialnya mengalami krisis emosional yang dramatis tapi tidak cengeng. Kerapuhan internal pribadi-pribadi kosmopolitan berhasil dilukiskan dengan detil dan seksama. Novel ini penting dibaca oleh pria dan wanita karir agar saling mengerti. Referensi pop culture serta lokasi cerita yang kuat membuat Antologi Rasa jadi kaya, meriah, dan menyenangkan. A page turner indeed!\r\n        -- Ve Handojo, penulis skenario\r\n        \r\n        Brilliant! Membaca novel ini membuat saya teringat masa-masa single dulu, karena alur ceritanya yang terasa begitu dekat dengan realitas sehari-hari. Ika berhasil membuat saya tidak bisa berhenti membaca novel ini sebelum tamat.\r\n        -- Amalia Malik Purtanto, sahabat dan first reader', '9789792274394.jpg', 0),
('B2101012', 'Originals: How Non-Conformists Move the World', '0525429565', 'CAT20009', 'AUTH0001', 'PUB20015', 'BLANG002', 2001, 'In Originals the author addresses the challenge of improving the world from the perspective of becoming original: choosing to champion novel ideas and values that go against the grain, battle conformity, and buck outdated traditions. How can we originate new ideas, policies, and practices without risking it all?\r\n \r\n        Using surprising studies and stories spanning business, politics, sports, and entertainment, Grant explores how to recognize a good idea, speak up without getting silenced, build a coalition of allies, choose the right time to act, and manage fear and doubt; how parents and teachers can nurture originality in children;\r\n        and how leaders can build cultures that welcome dissent. Learn from an entrepreneur who pitches his start-ups by highlighting the reasons not to invest, a woman at Apple who challenged Steve Jobs from three levels below, an analyst who overturned the rule of secrecy at the CIA, a billionaire financial wizard who fires employees for failing to criticize him,\r\n        and a TV executive who didn’t even work in comedy but saved Seinfeld from the cutting-room floor. The payoff is a set of groundbreaking insights about rejecting conformity and improving the status quo.', '0525429565.jpg', 0),
('B2101013', 'Sekolah itu Candu', '9799075580', 'CAT20010', 'AUTH0015', 'PUB20006', 'BLANG001', 1998, '\"HARAP MAKLUM, sekali lagi, terutama dalam rangka membuat orang tersenyum dan tertawa itulah maksud utama buku kecil ini disajikan ke hadapan anda semua. Kalau ada banyak di antara pembaca nanti yang menyelewengkan, sengaja atau tidak sengaja, maksud utama itu --misalnya saja anda lantas berkerut dahi sambil mengangguk-angguk dan berkhayal bahwa memang ada sesuatu yang tidak beres dengan dunia pendidikan kita,\r\n        lantas anda berencana melakukan sesuatu untuk merombaknya habis-habisan-- maka itu menjadi tanggungjawab anda sendiri. Tetapi, kalau ternyata banyak atau semua pembaca buku kecil ini lantas melakukan penyelewengan yang serupa... nah, mungkin kita memang perlu melakukan sesuatu dan bertanggungjawab bersama. Yang jelas, semua isi tersurat maupun tersirat buku kecil ini menjadi tanggungjawab yang empunya tulisan sendiri,\r\n        termasuk atas penyelewengan kalau isi dan makna buku kecil ini ternyata tidak mampu memenuhi tujuan utamanya: membuat anda tersenyum dan tertawa!\" Toto Rahardjo, penyunting', '9799075580.jpg', 0),
('B2101014', 'Jalan Raya Pos, Jalan Daendels', '9799731283', 'CAT20011', 'AUTH0012', 'PUB20011', 'BLANG001', 2005, 'Sebuah buku tentang kesaksian. Dan buku ini adalah kesaksian tentang peristiwa genosida kemanusiaan paling mengerikan di balik pembangunan Jalan Raya Pos atau yang lebih dikenal dengan Jalan Daendels;\r\n        jalan yang membentang 1000 kilometer sepanjang utara pulau Jawa, dari Anyer hingga Panarukan. Inilah satu dari beberapa kisah tragedi kerjapaksa terbesar sepanjang sejarah di Tanah Hindia.', '9799731283.jpg', 0),
('B2101015', 'Sabtu Bersama Bapak', '9797807215', 'CAT20008', 'AUTH0002', 'PUB20002', 'BLANG001', 2014, '“Hai, Satya! Hai, Cakra!” Sang Bapak melambaikan tangan.\r\n        “Ini Bapak.\r\n        Iya, benar kok, ini Bapak.\r\n        Bapak cuma pindah ke tempat lain. Gak sakit. Alhamdulillah, berkat doa Satya dan Cakra.\r\n        \r\n        …\r\n        \r\n        Mungkin Bapak tidak dapat duduk dan bermain di samping kalian.\r\n        Tapi, Bapak tetap ingin kalian tumbuh dengan Bapak di samping kalian.\r\n        Ingin tetap dapat bercerita kepada kalian.\r\n        Ingin tetap dapat mengajarkan kalian.\r\n        Bapak sudah siapkan.\r\n        \r\n        Ketika punya pertanyaan, kalian tidak pernah perlu bingung ke mana harus mencari jawaban.\r\n        I don’t let death take these, away from us.\r\n        I don’t give death, a chance.\r\n        \r\n        Bapak ada di sini. Di samping kalian.\r\n        Bapak sayang kalian.”\r\n        \r\n        Ini adalah sebuah cerita. Tentang seorang pemuda yang belajar mencari cinta.\r\n        Tentang seorang pria yang belajar menjadi bapak dan suami yang baik.\r\n        Tentang seorang ibu yang membesarkan mereka dengan penuh kasih.\r\n        Dan…, tentang seorang bapak yang meninggalkan pesan dan berjanji selalu ada bersama mereka.', '9797807215.jpg', 0),
('B2101016', 'Invent and Wander: The Collected Writings of Jeff Bezos', '1647820715', 'CAT20009', 'AUTH0017', 'PUB20014', 'BLANG002', 2020, 'In this collection of Jeff Bezos’s writings—his unique and strikingly original annual shareholder letters,\r\n        plus numerous speeches and interviews that provide insight into his background, his work, and the evolution of his ideas—you’ll gain an insider’s view of the why and how of his success.\r\n        Spanning a range of topics across business and public policy, from innovation and customer obsession to climate change and outer space,\r\n        this book provides a rare glimpse into how Bezos thinks about the world and where the future might take us.\r\n\r\n        Written in a direct, down-to-earth style, Invent and Wander offers readers a master class in business values, strategy, and execution:\r\n        ● The importance of a Day 1 mindset\r\n        ● Why “it’s all about the long term”\r\n        ● What it really means to be customer obsessed\r\n        ● How to start new businesses and create significant organic growth in an already successful company\r\n        ● Why culture is an imperative\r\n        ● How a willingness to fail is closely connected to innovation\r\n        ● What the Covid-19 pandemic has taught us\r\n        \r\n        Each insight offers new ways of thinking through today’s challenges—and more importantly,\r\n        tomorrow’s—and the never-ending urgency of striving ahead, never resting on one’s laurels.\r\n        Everyone from CEOs to entrepreneurs just setting up shop to the millions who use Amazon’s products and services in their homes or\r\n        businesses will come to understand the principles that have driven the success of one of the most important innovators of our time.', '1647820715.jpg', 0),
('B2101017', 'The Pull of the Stars', '0316499013', 'CAT20011', 'AUTH0008', 'PUB20016', 'BLANG002', 2020, 'In an Ireland doubly ravaged by war and disease, Nurse Julia Power works at an understaffed hospital in the city center,\r\n        where expectant mothers who have come down with the terrible new Flu are quarantined together. Into Julias regimented world step two outsiders -- Doctor Kathleen Lynn,\r\n        a rumoured Rebel on the run from the police , and a young volunteer helper, Bridie Sweeney.\r\n\r\n        In the darkness and intensity of this tiny ward, over three days, these women change each others lives in unexpected ways. They lose patients to this baffling pandemic,\r\n        but they also shepherd new life into a fearful world. With tireless tenderness and humanity, carers and mothers alike somehow do their impossible work.\r\n        \r\n        In The Pull of the Stars, Emma Donoghue once again finds the light in the darkness in this new classic of hope and survival against all odds.', '0316499013.jpg', 0),
('B2101018', 'Hafalan Shalat Delisa', '9793210605', 'CAT20008', 'AUTH0016', 'PUB20007', 'BLANG001', 2005, 'Delisa anak perempuan yang bermata hijau, bening dan umurnya baru mencecah lima tahun. Dia hidup dalam keluarganya yang sebegitu,\r\n        dia cuba menghafal bacaan dalam solat dengan bantuan ibu dan kakaknya.\r\n\r\n        Namun Tuhan lebih tahu apa yang lebih baik untuk hamba-Nya. Tsunami datang melumatka senyuman pada wajah Delisa.\r\n        Tsunami mengambil segala-galanya, keluarga juga kaki kecilnya. Yang tersisa, hanya dia dan ayahnya,\r\n        dan dalam keadaan sebegitu apakah Delisa mampu tetap tersenyum seperti dahulu dan menyudahkan hafalannya?', '9793210605.jpg', 0),
('B2101019', 'Api Sejarah 2', '9786028458269', 'CAT20011', 'AUTH0005', 'PUB20008', 'BLANG001', 2010, 'Api Sejarah 2 merupakan jilid ke-2 dari buku bestseller Api sejarah yang mengungkap semua fakta yang tersembunyi dan disembungikan tentang mahakrya Ulama dan Santri dalam menegakkan NKRI.\r\n\r\n        Buku yang sungguh berani ini, pernah dinyatakan hilang dan terancam tidak jadi terbit ketika draft naskahnya \"dicuri\" oleh \"peminjam tanbpa permisi\" saar seminar Api Sejarah di Gedung Juang45, Pemerintah Kotamadya Sukabumi.\r\n        \r\n        Melalui buku Api Sejarah ini, Ahmad Mansur Suryanegara membongkar upaya deislamisasi penulisan sejarah Indonesia yang sudah berlangsung lama, sekaligus menuntaskan rasa kepenasaran Anda akan kebenaran sejarah bangsa Indonesia.\r\n        \r\n        \"...berisi bukti keaslian riwayat sejarah dan tokoh-tokoh pahlawan nasional sejak zaman periode Jepang hingga zaman kemerdekaan, yang selama ini disinyalir banyak dipolitisir untuk kepentingan pihak tertentu.\"\r\n        Republika\r\n        \r\n        \"..buku ini mengajak kita untuk bersedia mengkoreksi dan meletakkan fakta-fakta yang belum terungkap secara proporsional.\"\r\n        Seputar Indonesia\r\n        \r\n        \"..kehadiran buku ini dapat menjadi pencerahan bagi masyarakat bahwa Islam berperan penting dalam sejarah kemerdekaan dan pergerakan nasional Indonesia\"\r\n        www.eramuslim.com\r\n        \r\n        \"Sepak terjangnya dalam mengamati sejarah perjuangan umat Islam di Indonesia menemukan satu kesimpulan: bahwasanya ulama dan santri, salah satu golongan Muslim yang aktif memperjuangkan kemerdekaan Indonesia, memang benar-benar terlupakan dari sejarah.\"', '9786028458269.jpg', 0),
('B2101020', 'Muhammad Al-Fatih 1453', '9786029716412', 'CAT20011', 'AUTH0009', 'PUB20010', 'BLANG001', 2011, '\"Ada cara yang menyenangkan untuk mengubah kepribadian Anda agar menjadi selevel para ksatria Islam yang terpisah zaman dan waktu, bacalah sejarah\"\r\n\r\n        Ini adalah kisah ketika dunia hanya mengenal dua wilayah, Barat dan Timur. Ini adalah persaingan antara dua negara; Imperium Romawi dan Khilafah Islam. Ini adalah cerita saat dunia terpolarisasi menjadi dua bagian; Kristen dan Islam. Ini adalah epik antara dua kekuasaan; Byzantium dan Utsmani.\r\n        \r\n        Pada suatu masa ketika dunia hanya terbagi menjadi dua bagian, sudah menjadi kewajaran bagi Barat untuk menaklukkan Timur. Namun ada satu pemuda yang membalik semuanya dan menaklukkan sebagian besar Barat.\r\n        \r\n        Pemuda yang mengukir namanya dalam sejarah emas dunia,dengan prestasi dan pencapaian yang tidak pernah ada pada masanya ataupun sebelumnya, prestasi yang jauh melebihi masanya.\r\n        \r\n        Ini adalah salah satu pertempuran paling penting dalam sejarah Islam dan sejarah dunia. Pertempuran yang sangat berpengaruh pada relasi Kristen dan Islam. Serta panglima terbaik yang telah diramalkan oleh Rasulullah saw.', '9786029716412.jpg', 0),
('B2101021', 'Rembulan Tenggelam Di Wajahmu', '9793858133', 'CAT20002', 'AUTH0016', 'PUB20007', 'BLANG001', 2009, 'Tutup mata kita. Tutup pikiran kita dari carut- marut kehidupan. Mari berpikir takjim sejenak. Bayangkan saat ini ada satu malaikat bersayap indah datang kepada kita, lantas lembut berkata: Aku memberikan kau kesempatan hebat. Lima kesempatan untuk bertanya tentang rahasia kehidupan, dan aku akan menjawabnya langsung sekarang. Lima Pertanyaan. Lima jawaban. Apakah pertanyaan pertamamu?\r\n        Maka apakah kita akan bertanya: Apakah cinta itu? Apakah hidup ini adil? Apakah kaya adalah segalanya? Apakah kita memilki pilihan dalam hidup? Apakah makna kehilangan?\r\n        Ray (tokoh utama dalam kisah ini), ternyata memiliki kecamuk pertanyaan sendiri. Lima pertanyaan sebelum akhirnya dia mengerti makna hidup dan kehidupannya.\r\n        Siapkan energi Anda untuk memasuki dunia Fantasi Tere-Liye tentang perjalanan hidup. Di sini hanya ada satu rumus: semua urusan adalah sederhana. Maka mulailah membaca dengan menghela nafas lega ', '9793858133.jpg', 0),
('B2101022', 'Ayah', '9786022911029', 'CAT20008', 'AUTH0003', 'PUB20001', 'BLANG001', 2015, 'Betapa Sabari menyayangi Zorro. Ingin dia memeluknya sepanjang waktu. Dia terpesona melihat makhluk kecil yang sangat indah dan seluruh kebaikan yang terpancar\r\n        darinya. Diciuminya anak itu dari kepala sampai ke jari-jemari kakinya yang mungil. Kalau malam Sabari susah susah tidur lantaran membayangkan bermacam rencana\r\n        yang akan dia lalui dengan anaknya jika besar nanti. Dia ingin mengajaknya melihat pawai 17 Agustus, mengunjungi pasar malam, membelikannya mainan,\r\n        menggandengnya ke masjid, mengajarinya berpuasa dan mengaji, dan memboncengnya naik sepeda saban sore ke taman kota.', '9786022911029.jpg', 0),
('B2101023', 'Jakarta Sebelum Pagi', '9786023758449', 'CAT20005', 'AUTH0018', 'PUB20004', 'BLANG001', 2016, '“Jam tiga dini hari, sweter, dan jalanan yang gelap dan sepi .... Ada peta, petunjuk; dan Jakarta menjadi tempat yang belum pernah kami datangi sebelumnya.”\r\n\r\n        Mawar, hyacinth biru, dan melati. Dibawa balon perak, tiga bunga ini diantar setiap hari ke balkon apartemen Emina. Tanpa pengirim, tanpa pesan; hanya kemungkinan adanya stalker mencurigakan yang tahu alamat tempat tinggalnya.\r\n        \r\n        Ketika—tanpa rasa takut—Emina mencoba menelusuri jejak sang stalker, pencariannya mengantarkan dirinya kepada gadis kecil misterius di toko bunga, kamar apartemen sebelah tanpa suara, dan setumpuk surat cinta berisi kisah yang terlewat di hadapan bangunan-bangunan tua Kota Jakarta.', '9786023758449.jpg', 0),
('B2101024', 'Gadis Kretek', '9789792281415', 'CAT20006', 'AUTH0014', 'PUB20003', 'BLANG001', 2012, 'Pak Raja sekarat. Dalam menanti ajal, ia memanggil satu nama perempuan yang bukan istrinya; Jeng Yah. Tiga anaknya, pewaris Kretek Djagad Raja, dimakan gundah. Sang Ibu pun terbakar cemburu terlebih karena permintaan terakhir suaminya ingin bertemu Jeng Yah. Maka berpacu dengan malaikat maut, Lebas, Karim, dan Tegar, pergi ke pelosok Jawa untuk mencari Jeng Yah, sebelum ajal menjemput sang Ayah.\r\n\r\n        Perjalanan itu bagai napak tilas bisnis dan rahasia keluarga. Lebas, Karim dan Tegar bertemu dengan buruh bathil (pelinting) tua dan menguak asal-usul Kretek Djagad Raja hingga menjadi kretek nomor 1 di Indonesia. Lebih dari itu, ketiganya juga mengetahui kisah cinta ayah mereka dengan Jeng Yah, yang ternyata adalah pemilik Kretek Gadis, kretek lokal Kota M yang terkenal pada zamannya.\r\n        \r\n        Apakah Lebas, Karim dan Tegar akhirnya berhasil menemukan Jeng Yah?\r\n        \r\n        Gadis Kretek tidak sekadar bercerita tentang cinta dan pencarian jati diri para tokohnya. Dengan latar Kota M, Kudus, Jakarta, dari periode penjajahan Belanda hingga kemerdekaan, Gadis Kretek akan membawa pembaca berkenalan dengan perkembangan industri kretek di Indonesia. Kaya akan wangi tembakau. Sarat dengan aroma cinta.', '9789792281415.jpg', 0),
('B2101025', 'Belajar HTML', '198712385729356923', 'CAT21002', 'AUTH0019', 'PUB21001', 'BLANG001', 2021, 'Belajar HTML dari NOL', '198712385729356923.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `kategori_id` char(8) NOT NULL,
  `kategori_nama` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`kategori_id`, `kategori_nama`) VALUES
('CAT20001', 'Fiksi Ilmiah'),
('CAT20002', 'Fiksi Inspirasi'),
('CAT20003', 'Fiksi Petualang'),
('CAT20004', 'Fiksi Religi'),
('CAT20005', 'Fiksi Roman'),
('CAT20006', 'Fiksi Sejarah'),
('CAT20007', 'Fiksi Sastra'),
('CAT20008', 'Fiksi'),
('CAT20009', 'Bisnis'),
('CAT20010', 'Pendidikan'),
('CAT20011', 'Sejarah'),
('CAT20012', 'Non Fiksi'),
('CAT21001', 'Horor'),
('CAT21002', 'Komputer');

-- --------------------------------------------------------

--
-- Table structure for table `tb_paket`
--

CREATE TABLE `tb_paket` (
  `paket_id` char(4) NOT NULL,
  `paket_nama` varchar(16) NOT NULL,
  `paket_durasi` int(2) NOT NULL,
  `paket_harga` int(6) NOT NULL,
  `paket_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_paket`
--

INSERT INTO `tb_paket` (`paket_id`, `paket_nama`, `paket_durasi`, `paket_harga`, `paket_status`) VALUES
('PK01', 'SILVER', 3, 5000, 1),
('PK02', 'GOLD', 5, 7000, 1),
('PK03', 'DIAMOND', 7, 10000, 1),
('PK04', 'TAHUNBARU', 14, 15000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_penerbit`
--

CREATE TABLE `tb_penerbit` (
  `penerbit_id` char(8) NOT NULL,
  `penerbit_nama` varchar(32) NOT NULL,
  `penerbit_kota` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_penerbit`
--

INSERT INTO `tb_penerbit` (`penerbit_id`, `penerbit_nama`, `penerbit_kota`) VALUES
('PUB20001', 'Bentang Pustaka', 'Yogyakarta'),
('PUB20002', 'GagasMedia', 'Depok'),
('PUB20003', 'Gramedia Pustaka Utama', 'Jakarta'),
('PUB20004', 'Grasindo', 'Jakarta'),
('PUB20005', 'Hastra Mitra', 'Jakarta'),
('PUB20006', 'INSISTPress', 'Yogyakarta'),
('PUB20007', 'Republik', 'Jakarta'),
('PUB20008', 'Salamadani', 'Bandung'),
('PUB20009', 'Truedee Books', 'Bandung'),
('PUB20010', 'Khilafah Press', 'Bogor'),
('PUB20011', 'Lentera Dipantara', 'Jakarta'),
('PUB20012', 'Pastel Books', 'Bandung'),
('PUB20013', 'Back Bay Books', 'New York'),
('PUB20014', 'Harvard Business', 'New York'),
('PUB20015', 'Viking', 'New York'),
('PUB20016', 'Little, Brown and Company', 'Boston'),
('PUB21001', 'Nyilih Pustaka', 'Jakarta');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengarang`
--

CREATE TABLE `tb_pengarang` (
  `pengarang_id` char(8) NOT NULL,
  `pengarang_nama` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pengarang`
--

INSERT INTO `tb_pengarang` (`pengarang_id`, `pengarang_nama`) VALUES
('AUTH0001', 'Adam M. Grant'),
('AUTH0002', 'Adhitya Mulya'),
('AUTH0003', 'Andrea Hirata'),
('AUTH0004', 'Ahmad Fuadi'),
('AUTH0005', 'Ahmad Mansur Suryanegara'),
('AUTH0006', 'Donny Dhirgantoro'),
('AUTH0007', 'Dee Lestari'),
('AUTH0008', 'Emma Donoghue'),
('AUTH0009', 'Felix Y. Siauw'),
('AUTH0010', 'Ika Natassa'),
('AUTH0011', 'Malcolm Gladwell'),
('AUTH0012', 'Pramoedya Ananta Toer'),
('AUTH0013', 'Pidi Baiq'),
('AUTH0014', 'Ratih Kumala'),
('AUTH0015', 'Roem Topatimasang'),
('AUTH0016', 'Tere Liye'),
('AUTH0017', 'Walter Isaacson'),
('AUTH0018', 'Ziggy Zezsyazeoviennazabrizkie'),
('AUTH0019', 'Aksal Syah Falah');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penyewa`
--

CREATE TABLE `tb_penyewa` (
  `penyewa_id` char(8) NOT NULL,
  `penyewa_firstname` varchar(16) NOT NULL,
  `penyewa_lastname` varchar(32) NOT NULL,
  `penyewa_email` varchar(64) NOT NULL,
  `penyewa_password` varchar(256) NOT NULL,
  `penyewa_ktp` varchar(256) NOT NULL,
  `penyewa_telepon` char(13) NOT NULL,
  `penyewa_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_penyewa`
--

INSERT INTO `tb_penyewa` (`penyewa_id`, `penyewa_firstname`, `penyewa_lastname`, `penyewa_email`, `penyewa_password`, `penyewa_ktp`, `penyewa_telepon`, `penyewa_status`) VALUES
('C2101001', 'Aksal', 'Syah', 'aksal.sf@gmail.com', '$2y$10$6F24jJ9BRl.jkGUA9MhenuVBXqD8WP5aIiAGSfbdm6oRUQVVVmfoK', 'C2101001.jpg', '0928350298529', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `transaksi_id` char(8) NOT NULL,
  `penyewa_id` char(8) NOT NULL,
  `buku_id` char(8) NOT NULL,
  `paket_id` char(8) NOT NULL,
  `transaksi_status` int(1) NOT NULL,
  `transaksi_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`transaksi_id`, `penyewa_id`, `buku_id`, `paket_id`, `transaksi_status`, `transaksi_timestamp`) VALUES
('T2101001', 'C2101001', 'B2101016', 'PK02', 2, '2021-01-05 01:58:28'),
('T2101002', 'C2101001', 'B2101002', 'PK02', 2, '2021-01-05 02:24:52'),
('T2101003', 'C2101001', 'B2101004', 'PK02', 0, '2021-01-05 04:54:22'),
('T2101004', 'C2101001', 'B2101006', 'PK02', 0, '2021-01-05 06:12:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tb_akses`
--
ALTER TABLE `tb_akses`
  ADD PRIMARY KEY (`akses_id`),
  ADD KEY `akses_penyewa_id` (`penyewa_id`,`buku_id`,`transaksi_id`),
  ADD KEY `akses_buku_id` (`buku_id`),
  ADD KEY `akses_transaksi_id` (`transaksi_id`);

--
-- Indexes for table `tb_bahasa`
--
ALTER TABLE `tb_bahasa`
  ADD PRIMARY KEY (`bahasa_id`);

--
-- Indexes for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`buku_id`),
  ADD KEY `buku_kategori_id` (`kategori_id`,`pengarang_id`,`penerbit_id`,`bahasa_id`),
  ADD KEY `buku_bahasa_id` (`bahasa_id`),
  ADD KEY `buku_penerbit_id` (`penerbit_id`),
  ADD KEY `buku_pengarang_id` (`pengarang_id`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `tb_paket`
--
ALTER TABLE `tb_paket`
  ADD PRIMARY KEY (`paket_id`);

--
-- Indexes for table `tb_penerbit`
--
ALTER TABLE `tb_penerbit`
  ADD PRIMARY KEY (`penerbit_id`);

--
-- Indexes for table `tb_pengarang`
--
ALTER TABLE `tb_pengarang`
  ADD PRIMARY KEY (`pengarang_id`);

--
-- Indexes for table `tb_penyewa`
--
ALTER TABLE `tb_penyewa`
  ADD PRIMARY KEY (`penyewa_id`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`transaksi_id`),
  ADD KEY `transaksi_penyewa_id` (`penyewa_id`,`buku_id`,`paket_id`),
  ADD KEY `transaksi_buku_id` (`buku_id`),
  ADD KEY `transaksi_paket_id` (`paket_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_akses`
--
ALTER TABLE `tb_akses`
  ADD CONSTRAINT `tb_akses_ibfk_1` FOREIGN KEY (`buku_id`) REFERENCES `tb_buku` (`buku_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_akses_ibfk_2` FOREIGN KEY (`penyewa_id`) REFERENCES `tb_penyewa` (`penyewa_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_akses_ibfk_3` FOREIGN KEY (`transaksi_id`) REFERENCES `tb_transaksi` (`transaksi_id`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD CONSTRAINT `tb_buku_ibfk_1` FOREIGN KEY (`bahasa_id`) REFERENCES `tb_bahasa` (`bahasa_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_buku_ibfk_2` FOREIGN KEY (`kategori_id`) REFERENCES `tb_kategori` (`kategori_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_buku_ibfk_3` FOREIGN KEY (`penerbit_id`) REFERENCES `tb_penerbit` (`penerbit_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_buku_ibfk_4` FOREIGN KEY (`pengarang_id`) REFERENCES `tb_pengarang` (`pengarang_id`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `tb_transaksi_ibfk_1` FOREIGN KEY (`buku_id`) REFERENCES `tb_buku` (`buku_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_transaksi_ibfk_2` FOREIGN KEY (`paket_id`) REFERENCES `tb_paket` (`paket_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_transaksi_ibfk_3` FOREIGN KEY (`penyewa_id`) REFERENCES `tb_penyewa` (`penyewa_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
