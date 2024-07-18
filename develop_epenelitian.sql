-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2021 at 04:44 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `develop_epenelitian`
--

-- --------------------------------------------------------

--
-- Table structure for table `author_submits`
--

CREATE TABLE `author_submits` (
  `id` int(10) UNSIGNED NOT NULL,
  `submission_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_orcid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `affiliation` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `interest` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bahasa`
--

CREATE TABLE `bahasa` (
  `id_bahasa` int(11) NOT NULL,
  `inggris` text NOT NULL,
  `indonesia` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bahasa`
--

INSERT INTO `bahasa` (`id_bahasa`, `inggris`, `indonesia`) VALUES
(1, '<p><strong>E-Penelitian</strong> is an open access, peer-reviewed journal that supports all topics in Biology, Pathology, Pharmacology, Biochemistry, Histology and Biomedicine in the aspect of molecular and cellular.</p>\r\n\r\n<p><strong>E-Penelitian</strong>&nbsp;is dedicated to publishing review and research articles.&nbsp;</p>\r\n\r\n<p>All of <strong>E-Penelitian </strong>materials are free to be copied and redistributed in any medium or format. However, appropriate credit should be given. The material may not be used for commercial purposes.</p>', '<p><strong>E-Penelitian </strong>adalah akses terbuka, jurnal penelaahan&nbsp;yang mendukung semua topik dalam Biologi, Patologi, Farmakologi, Biokimia, Histologi dan Biomedis dalam aspek molekuler dan seluler.</p>\r\n\r\n<p><strong>E-Penelitian&nbsp;</strong>didedikasikan untuk menerbitkan ulasan dan artikel penelitian.&nbsp;</p>\r\n\r\n<p>Semua materi <strong>E-Penelitian</strong> bebas untuk disalin dan didistribusikan kembali dalam media atau format apa pun. Namun, kredit yang tepat harus diberikan. Materi tidak boleh digunakan untuk tujuan komersial.&nbsp;</p>'),
(2, '<p>Announcement</p>', 'Pengumuman'),
(3, 'Call for Papers', 'Panggilan untuk Makalah'),
(4, '<p><strong>E-Penelitian </strong>invites you to submit papers, covering any aspect of biomedical sciences. All submitted papers must not be previously published and not under consideration for publication elsewhere.More detail information regarding online submission can be found in the author guidelines</p>', '<p><strong>E-Penelitian</strong> mengundang Anda untuk menyerahkan makalah, yang mencakup segala aspek ilmu biomedis. Semua makalah yang dikirim tidak boleh dipublikasikan sebelumnya dan tidak dalam pertimbangan untuk dipublikasikan di tempat lain.Informasi lebih detail mengenai pengiriman online dapat ditemukan di pedoman penulis</p>'),
(5, 'Latest Journal', 'Jurnal terbaru'),
(6, 'Archives', 'Arsip'),
(7, '<p>Vol 1 (January - June)</p>', '<p>Vol 1 (Januari - Juni)</p>'),
(8, '<p>Vol 2 (July - December)</p>', '<p>Vol 2 (Juli - Desember)</p>'),
(9, 'Article in Press is an article which has been reviewed and accepted but has not been copyedited and formatted. Thus, it has not yet appeared in a regular issue of the journal. Each article persists as Article in Press only until the article is published in the final version. Copyediting may lead to minor differences between the Article in Press version and the final version. Articles in Press are citable, although the final published article is preferred for citation, if available.\r\n', 'Artikel dalam Pers adalah artikel yang telah ditinjau dan diterima tetapi belum disalin dan diformat. Dengan demikian, itu belum muncul dalam edisi reguler jurnal. Setiap artikel tetap sebagai Artikel di Pers hanya sampai artikel ini diterbitkan dalam versi final. Penyalinan dapat menyebabkan perbedaan kecil antara Artikel dalam versi Pers dan versi final. Artikel-artikel di media cetak dapat diterima, meskipun artikel yang diterbitkan terakhir lebih disukai untuk kutipan, jika tersedia.\r\n'),
(10, '<h3><strong>Search tips :</strong></h3>', '<h3><strong>Tips pencarian :</strong></h3>'),
(11, 'Search terms are case-insensitive', 'Istilah pencarian tidak peka huruf besar-kecil'),
(12, 'Common words are ignored', 'Kata-kata umum diabaikan'),
(13, 'By default only articles containing all terms in the query are returned.', 'Secara default, hanya artikel yang berisi semua istilah dalam kueri yang dikembalikan.'),
(14, 'Combine multiple words with OR to find articles containing either term; e.g., education OR research', 'Gabungkan beberapa kata dengan ATAU untuk menemukan artikel yang mengandung istilah mana pun; mis., pendidikan ATAU penelitian '),
(15, 'Search for an exact phrase by putting it in quotes; e.g., \"open access publishing', 'Cari frasa yang tepat dengan memasukkannya dalam tanda kutip; mis., \"penerbitan akses terbuka\"'),
(16, '<p>Before upload your submissions file, please check your plagiarism.visit the following link </br>\r\n', 'Sebelum mengunggah file kiriman Anda, silakan periksa plagiarisme Anda. kunjungi tautan berikut ini'),
(17, '<p>Encountering difficulties? Contact Admin for assistance.</p>', '<p>Mengalami kesulitan? Hubungi Admin untuk bantuan.</p>'),
(18, 'Submission Checklist', 'Daftar Periksa Pengajuan\r\n'),
(20, '<p>The submission file is in&nbsp;Microsoft Word (DOC) or Portable Document Format&nbsp;(PDF)&nbsp;document file format. Formatted as standard A4 page setup.</p>', '<p>File pengiriman dalam format file dokumen Microsoft Word atau Portable Document Format (PDF). Diformat sebagai pengaturan halaman A4 standar.</p>'),
(21, 'Where available, URLs for the references have been provided.\r\n', 'Jika tersedia, URL untuk referensi telah disediakan.\r\n'),
(22, 'The text should be double-spaced with the 1-inch margin on the left and right sides. Use 12-point Times New Roman font\r\n', 'Teks harus spasi ganda dengan margin 1 inci di sisi kiri dan kanan. Gunakan font Times New Roman 12 poin\r\n'),
(23, 'The text adheres to the stylistic and bibliographic requirements outlined in the Author Guidelines, which is found in About the Journal.\r\n', 'Teks tersebut mematuhi persyaratan gaya dan bibliografi yang diuraikan dalam Pedoman Penulis, yang ditemukan dalam About the Journal.\r\n'),
(24, '<p>Running title provided (more than 8 words).</p>', '<p>Judul disediakan (boleh lebih dari 8 kata).</p>'),
(25, 'Proof of permission was obtained to reproduce illustrations, tables, etc. from other publication\r\n', 'Bukti izin diperoleh untuk mereproduksi ilustrasi, tabel, dll. Dari publikasi lain\r\n'),
(26, 'Complete information about author/s (first, middle, lastname), author/s\'s affiliation, and email address of the corresponding author.\r\n', 'Informasi lengkap tentang penulis (pertama, tengah, nama belakang), afiliasi penulis, dan alamat email penulis yang bersangkutan.\r\n'),
(27, 'All pages are numbered at bottom right.', 'Semua halaman diberi nomor di kanan bawah.\r\n'),
(28, 'Copyright Notice', 'Pemberitahuan Hak Cipta\r\n'),
(29, '<p>I hereby certify that:</p>', '<p>Saya dengan ini menyatakan itu:</p>'),
(30, 'I have been granted authorization by my co-author/s to enter into these arrangements.\r\n', 'Saya telah diberi otorisasi oleh rekan penulis saya untuk masuk ke dalam pengaturan ini.'),
(31, 'I hereby declare, on behalf of myself and my co-author/s, that:', 'Saya dengan ini menyatakan, atas nama saya dan rekan penulis saya, bahwa:\r\n'),
(32, '<p>The manuscript submitted is an original work and has neither been published in any other peer-reviewed journal nor is under consideration for publication by any other journal. More so, the work has been carried out in the author/s&rsquo; lab and the manuscript does not contravene any existing copyright or any other third party rights.</p>', '<p>Naskah yang dikirimkan adalah karya asli dan belum pernah diterbitkan dalam jurnal peer-review lain atau sedang dipertimbangkan untuk diterbitkan oleh jurnal lain. Lebih dari itu, pekerjaan telah dilakukan di laboratorium penulis dan naskah tidak melanggar hak cipta yang ada atau hak pihak ketiga lainnya.</p>'),
(33, '<p>I am/we are the sole author/s of the manuscript and maintain the authority to enter into this agreement and the granting of rights to the publisher: E-Penelitian, does not infringe any clause of this agreement.</p>', '<p>Saya adalah / kami satu-satunya penulis naskah dan mempertahankan otoritas untuk masuk ke dalam perjanjian ini dan pemberian hak kepada penerbit: E-Penelitian, tidak melanggar klausa apapun dari perjanjian ini.</p>'),
(34, 'The manuscript contains no such material that may be unlawful, defamatory, or which would, if published, in any way whatsoever, violate the terms and conditions as laid down in the agreement.', 'Naskah tidak mengandung materi yang mungkin melanggar hukum, memfitnah, atau yang jika, dengan cara apa pun, melanggar syarat dan ketentuan sebagaimana tercantum dalam perjanjian.\r\n'),
(35, 'I/we have taken due care that the scientific knowledge and all other statements contained in the manuscript conform to true facts and authentic formulae and will not, if followed precisely, be detrimental to the user.', 'Saya / kami telah berhati-hati bahwa pengetahuan ilmiah dan semua pernyataan lain yang terkandung dalam naskah sesuai dengan fakta dan formula otentik dan tidak akan, jika diikuti dengan tepat, akan merugikan pengguna.'),
(36, 'I/we permit the adaptation, preparation of derivative works, oral presentation or distribution, along with the commercial application of the work.', 'Saya / kami mengizinkan adaptasi, persiapan karya turunan, presentasi atau distribusi lisan, bersama dengan aplikasi komersial karya tersebut.\r\n'),
(37, 'No responsibility is assumed by Molecular and Cellular Biomedical Sciences (MCBS) and CBPI, its staff or members of the editorial boards for any injury and/or damage to persons or property as a matter of products liability, negligence or otherwise, or from any use or operation of any methods, products instruction, advertisements or ideas contained in a publication by MCBS.', 'Tidak ada tanggung jawab yang ditanggung oleh Ilmu Biomedis Molekuler dan Seluler (MCBS) dan CBPI, stafnya atau anggota dewan editorial untuk setiap cedera dan / atau kerusakan pada orang atau properti karena masalah pertanggungjawaban produk, kelalaian atau sebaliknya, atau dari penggunaan apa pun atau pengoperasian metode, instruksi produk, iklan atau ide apa pun yang terkandung dalam publikasi oleh MCBS.\r\n'),
(38, 'Copyright', 'Hak Cipta'),
(39, '<p>Authors are allowed to keep the copyright without any restriction. Submission of a manuscript to the respective journals implies that all author/s have read and agreed to the content of the Covering Letter or the Terms and Conditions. It is a condition of publication that manuscripts submitted to this journal have not been published and will not be simultaneously submitted or published elsewhere. Plagiarism is strictly forbidden, and by submitting the manuscript for publication the author/s agree that the publishers have the legal right to take appropriate action against the author/s, if plagiarism or fabricated information is discovered. Once submitted to the journal, the author/s will not withdraw their manuscript at any stage prior to publication.</p>', '<p> Penulis diizinkan untuk menjaga hak cipta tanpa batasan apa pun. Penyerahan naskah ke jurnal masing-masing menyiratkan bahwa semua penulis telah membaca dan menyetujui isi Surat Pengantar atau Syarat dan Ketentuan. Ini adalah kondisi publikasi bahwa naskah yang diserahkan ke jurnal ini belum diterbitkan dan tidak akan secara bersamaan diserahkan atau diterbitkan di tempat lain. Plagiarisme dilarang keras, dan dengan menyerahkan naskah untuk publikasi, penulis setuju bahwa penerbit memiliki hak hukum untuk mengambil tindakan yang pantas terhadap penulis, jika ditemukan plagiarisme atau informasi palsu. Setelah dikirimkan ke jurnal, penulis tidak akan menarik naskah mereka pada tahap apa pun sebelum dipublikasikan. </p>\r\n'),
(40, 'The authors agree to the terms of this Copyright Notice, which will apply to this submission if and when it is published by this journal (comments to the editor can be added below).', 'Penulis menyetujui ketentuan Pemberitahuan Hak Cipta ini, yang akan berlaku untuk pengajuan ini jika dan ketika dipublikasikan oleh jurnal ini (komentar untuk editor dapat ditambahkan di bawah).\r\n'),
(41, 'Journal\'s Privacy Statement', 'Pernyataan Privasi Jurnal\r\n'),
(42, '<p>The names and email addressesJournal\'s Privacy Statement entered in this journal site will be used exclusively for the stated purposes of this journal and will not be made available for any other purpose or to any other party. </p>', '<p> Nama dan alamat email Pernyataan Privasi Jurnal yang dimasukkan di situs jurnal ini akan digunakan secara eksklusif untuk tujuan jurnal ini dan tidak akan tersedia untuk tujuan lain atau pihak lain. </p>\r\n'),
(43, 'Comments for the Editor', 'Komentar untuk Editor'),
(44, 'To upload a manuscript to this journal, complete the following steps.', 'Untuk mengunggah naskah ke jurnal ini, selesaikan langkah-langkah berikut.'),
(45, 'On this page, click Browse (or Choose File) file on the hard drive of your computer.<b>(Format file only in DOC or DOCX).</b>', 'Pada halaman ini, klik Browse (atau Choose File)untuk mencari file di hard drive komputer Anda.<b>(File hanya dalam format Doc atau Docx).</b>'),
(46, 'Locate the file you wish to submit and highlight it', 'Temukan file yang ingin Anda kirim dan sorot\r\n'),
(47, 'Click Open on the Choose File window, which places the name of the file on this page.', 'Klik Buka di jendela Choose File, yang menempatkan nama file di halaman ini.'),
(48, 'Click Upload on this page, which uploads the file from the computer to the journal\'s web site and renames it following the journal\'s conventions.', 'Klik Unggah pada halaman ini, yang mengunggah file dari komputer ke situs web jurnal dan menamainya menurut konvensi jurnal.\r\n'),
(49, 'Once the submission is uploaded, click Save and Continue at the bottom of this page.', 'Setelah pengiriman diunggah, klik Simpan dan Lanjutkan di bagian bawah halaman ini.'),
(50, '<p>This optional step allows Supplementary Files to be added to a submission. The files, which can be in any format, might include (a) research instruments, (b) data sets, which comply with the terms of the study\'s research ethics review, (c) sources that otherwise would be unavailable to readers, (d) figures and tables that cannot be integrated into the text itself, or other materials that add to the contribution of the work.</p>', '<p> Langkah opsional ini memungkinkan File Tambahan untuk ditambahkan ke kiriman.                                                            File-file, yang dapat dalam format apa pun, mungkin termasuk          (a) instrumen penelitian,                                             (b) set data, yang sesuai dengan ketentuan tinjauan etika penelitian penelitian,                                                           (c) sumber yang jika tidak akan tersedia untuk pembaca,               (d) angka dan tabel yang tidak dapat diintegrasikan ke dalam teks itu sendiri, atau bahan lain yang menambah kontribusi karya. </p>'),
(51, '<p>Overview</p>', '<p>Peninjauan</p>'),
(52, 'Standard operational procedures (SOP)', 'Standar Operasional Prosedur (SOP)'),
(53, 'Editorial Team', 'Tim Editor'),
(54, 'POLICIES', 'KEBIJAKAN'),
(55, 'standard operational procedures(SOP)', 'standard operational procedures(SOP)'),
(56, 'Contact and More Information', 'Kontak dan Informasi Lebih Lanjut'),
(57, 'Peer Review Process', 'Proses Tinjauan Rekan'),
(58, 'Publication Frequency', 'Frekuensi Publikasi'),
(59, 'Open Access Policy', 'Kebijakan Akses secara Terbuka'),
(60, 'Archiving', 'Pengarsipan'),
(61, 'Plagiarism Screening Policy', 'Kebijakan Penyaringan Plagiarisme'),
(62, 'Content Licensing', 'Lisensi Konten '),
(63, 'Conflict of Interest Policy', 'Kebijakan Konflik Kepentingan'),
(64, 'Protection of Human Subject and Animal in Research Policy', 'Perlindungan Subjek Manusia dan Hewan dalam Kebijakan Penelitian '),
(65, 'Informed Consent Policy', 'Kebijakan Persetujuan yang Diinformasikan '),
(66, 'Role of Journal Editor', 'Peran Editor Jurnal'),
(67, 'Correction and Retraction Policy', ' Kebijakan Koreksi dan Retraksi '),
(68, 'Further Information, Complaint, or Advertising Offers', ' Informasi Lebih Lanjut, Keluhan, atau Penawaran Iklan '),
(69, 'Author Guidelines', 'Pedoman Penulis'),
(70, 'Submission Preparation Checklist', 'Daftar Periksa Persiapan Submission'),
(71, 'Copyright Notice', 'Pemberitahuan Hak Cipta'),
(72, 'Privacy Statement', 'Pernyataan Privasi'),
(73, 'Journal History', 'Sejarah Jurnal'),
(74, 'Site Map', 'Peta Situs'),
(75, 'About this Publishing System', 'Tentang Sistem Penerbitan'),
(76, 'Review Article\n<p>Review Article should consist of no more than 10,000 words, not including the words in abstract, references, table, figure, and figure legend. The manuscript should have no more than six figures and/or tables in total and no more than 200 references.</p>\n\nResearch Article\n<p>Research Article should consist of no more than 3,500 words, not including the words in abstract, references, table, figure, and figure legend. The manuscript should have no more than six figures and/or tables in total and no more than 40 references.</p>', '<p> Artikel Review harus terdiri dari tidak lebih dari 10.000 kata, tidak termasuk kata-kata dalam abstrak, referensi, tabel, gambar, dan legenda gambar. Naskah harus memiliki tidak lebih dari enam angka dan / atau tabel secara total dan tidak lebih dari 200 referensi.</p>                                                                                                       \n<p>Artikel Penelitian harus terdiri dari tidak lebih dari 3.500 kata, tidak termasuk kata-kata dalam abstrak, referensi, tabel, gambar, dan legenda gambar. Naskah harus memiliki tidak lebih dari enam angka dan / atau tabel total dan tidak lebih dari 40 referensi.</p>'),
(77, '<p>All manuscripts submitted to E-Penelitian&nbsp;will be selected and double-blind peer-reviewed by 2 or more reviewers when necessary, to present valuable and authentic findings. All details will also be reviewed, including appropriate title; content reflecting abstract; concise writing; clear purpose, study method and figures and/or tables; and summary supported by content. The reviewing process will take 2-3 months depends on the sufficiency of the information provided.</p>\r\n\r\n<p>Peer-reviewers were selected based on their specialties that fit the topic. Additional reviewer/s can also be pointed when necessary. The author can suggest reviewer/s that not having publication together within five years and should not be member/s of the same research institution.</p>', '<p>Semua manuskrip yang diserahkan ke E-Penelitian akan dipilih dan ditinjau secara ganda oleh 2 pengulas atau lebih jika diperlukan, untuk menyajikan temuan yang berharga dan otentik. Semua detail juga akan ditinjau, termasuk judul yang sesuai; konten yang mencerminkan abstrak; penulisan singkat; tujuan yang jelas, metode studi dan angka dan / atau tabel; dan ringkasan yang didukung oleh konten. Proses peninjauan akan memakan waktu 2-3 bulan tergantung pada kecukupan informasi yang diberikan.</p>\r\n\r\n<p>Penelaah dipilih berdasarkan spesialisasi mereka yang sesuai dengan topik. Peninjau tambahan juga dapat ditunjuk jika perlu. Penulis dapat menyarankan peninjau yang tidak memiliki publikasi bersama dalam waktu lima tahun dan tidak boleh menjadi anggota dari lembaga penelitian yang sama.</p>'),
(78, '<p>E-Penelitian is published biannually (in january - june and july-December).</p>', '<p>E-Penelitian diterbitkan dua kali setahun (pada bulan Januari - Juni dan Juli-Desember).</p>'),
(79, '<p>This journal provides immediate open access to its content on the principle that making research freely available to the public supports a greater global exchange of knowledge.</p>\r\n', '<p> Jurnal ini menyediakan akses terbuka langsung ke kontennya dengan prinsip bahwa membuat penelitian tersedia secara bebas untuk publik mendukung pertukaran pengetahuan global yang lebih besar. </p>\r\n'),
(80, '<p>This journal utilizes the LOCKSS system to create a distributed archiving system among participating libraries and permits those libraries to create permanent archives of the journal for purposes of preservation and restoration.</p>\r\n', '<p> Jurnal ini menggunakan sistem LOCKSS untuk membuat sistem pengarsipan terdistribusi di antara perpustakaan yang berpartisipasi dan mengizinkan perpustakaan tersebut untuk membuat arsip jurnal permanen untuk tujuan pelestarian dan pemulihan. </p>\r\n'),
(81, '<p>All manuscripts submitted to Molecular and Cellular Biomedical Sciences will be screened for plagiarism by using Turnitin and/or Crossref Similarity Check.</p>\r\n', '<p> Semua manuskrip yang dikirim ke Ilmu Biomedis Molekuler dan Seluler akan diskrining untuk penjiplakan dengan menggunakan Turnitin dan / atau Crossref Similarity Check. </p>'),
(82, '<p>All materials are free to be copied and redistributed in any medium or format. However, appropriate credit should be given. The material may not be used for commercial purposes. This content licensing is in accordance with a CC license: CC-BY-NC.</p>\r\n', '<p> Semua materi bebas untuk disalin dan didistribusikan kembali dalam media atau format apa pun. Namun, kredit yang tepat harus diberikan. Materi tidak boleh digunakan untuk tujuan komersial. Lisensi konten ini sesuai dengan lisensi CC: CC-BY-NC. </p>'),
(83, '<b><p>Author’s Conflict of Interest </p></b>\n<p>At the point of submission, Molecular and CellularBiomedical Sciences requires that each author reveals any personal and/or financial interests or connections, direct or indirect, or other situations that might raise the question of bias in work reported or the conclusions, implications, or opinions stated. When considering whether you should declare a conflicting interest or connection, please consider the conflict of interest test: Is there any arrangement that would embarrass you or any of your co-authors if it was to emerge after publication and you had not declared it? </p>\n<p>Corresponding authors are responsible for confirming whether they or their co-authors have any conflicts of interest to declare and to provide details of these. The statement includes any information regarding whether the manuscript is under consideration for other publication, or whether you have any patents that relevant to the manuscript. If the manuscript is published, any conflict of interest information will be written in the Conflict of Interest statement.</p>', '<b> <p> Konflik Kepentingan Penulis </p> </b><p> Pada saat penyerahan, Ilmu Molekul dan Seluler Biomedis mensyaratkan bahwa setiap penulis mengungkapkan kepentingan atau koneksi pribadi dan / atau keuangan, langsung atau tidak langsung, atau situasi lain yang mungkin menimbulkan pertanyaan tentang bias dalam pekerjaan yang dilaporkan atau kesimpulan, implikasi , atau pendapat lain. Ketika mempertimbangkan apakah Anda harus menyatakan minat atau koneksi yang bertentangan, harap pertimbangkan tes konflik kepentingan: Apakah ada pengaturan yang akan mempermalukan Anda atau rekan penulis Anda jika muncul setelah publikasi dan Anda belum menyatakannya? </p>\n<p> Penulis yang sesuai bertanggung jawab untuk mengonfirmasi apakah mereka atau penulis bersama mereka memiliki konflik kepentingan untuk dideklarasikan dan untuk memberikan perinciannya. Pernyataan itu mencakup informasi apa pun mengenai apakah naskah tersebut sedang dipertimbangkan untuk publikasi lain, atau apakah Anda memiliki paten apa pun yang relevan dengan naskah itu. Jika naskah diterbitkan, informasi konflik kepentingan apa pun akan ditulis dalam pernyataan Konflik Kepentingan. </p>'),
(84, '<b><p>Author’s Acknowledgement</p></b>\r\n<p> Authors whose manuscripts are submitted for publication must declare all relevant sources of funding in support of the preparation of a manuscript. Molecular and Cellular Biomedical Sciences requires full disclosure of financial support as to whether it is from government agencies, the pharmaceutical or any other industry, or any other source. Authors are required to specify sources of funding for the study and to indicate whether or not the manuscript was reviewed by the sponsor before submission. This information should be included in the Acknowledgements section of the manuscript.</p>\r\n<p>In addition to disclosure of direct financial support to the authors or their laboratories and prior sponsor-review of the paper, corresponding authors will be asked to disclose all relevant consultancies since the views expressed in the contribution could be influenced by the opinions they have expressed privately as consultants. This information should also be included in the Acknowledgments section of the manuscript.</p>', '<b> <p> Pengakuan Penulis </p> </b>\r\n<p> Penulis yang naskahnya diserahkan untuk publikasi harus menyatakan semua sumber pendanaan yang relevan untuk mendukung persiapan naskah. Ilmu Biomedis Molekuler dan Seluler memerlukan pengungkapan penuh dukungan keuangan, apakah itu dari lembaga pemerintah, farmasi atau industri lain, atau sumber lain. Penulis diwajibkan untuk menentukan sumber pendanaan untuk penelitian dan untuk menunjukkan apakah atau tidak naskah itu ditinjau oleh sponsor sebelum diserahkan. Informasi ini harus dimasukkan dalam bagian Ucapan Terima Kasih dari naskah. </p>\r\n<p> Selain pengungkapan dukungan keuangan langsung kepada penulis atau laboratorium mereka dan peninjauan ulang sponsor sebelumnya dari makalah, penulis yang sesuai akan diminta untuk mengungkapkan semua konsultasi yang relevan karena pandangan yang diungkapkan dalam kontribusi dapat dipengaruhi oleh pendapat mereka. telah menyatakan secara pribadi sebagai konsultan. Informasi ini juga harus dimasukkan dalam bagian Ucapan Terima Kasih dari naskah. </p>'),
(85, '<b><p>Reviewer’s Conflict of Interest</p></b><p>Reviewers must disclose to editors any conflicts of interest that could bias their opinions of the manuscript and should recuse themselves from reviewing specific manuscripts if the potential for bias exists. As in the case of authors, silence on the part of reviewers concerning potential conflicts may mean either that such conflicts exist that they have failed to disclose, or that conflicts do not exist. Reviewers must not use information of the manuscript they are reviewing before it is being published, furthering their interests. </p>', '<b> <p> Konflik Kepentingan Peninjau </p> </b><p> Peninjau harus mengungkapkan kepada editor konflik kepentingan apa pun yang dapat membiaskan pendapat mereka terhadap naskah dan harus mengundurkan diri dari peninjauan naskah tertentu jika ada potensi bias. Seperti dalam kasus penulis, keheningan di pihak pengulas mengenai potensi konflik dapat berarti bahwa konflik tersebut ada yang gagal diungkapkan, atau bahwa konflik tidak ada. Peninjau tidak boleh menggunakan informasi dari manuskrip yang mereka tinjau sebelum dipublikasikan, memajukan minat mereka. </p>'),
(86, ' <p>When reporting experiments on human subjects, authors should indicate whether the procedures followed were in accordance with the ethical standards of the responsible committee on human experimentation (institutional and national) and with the World Medical Association Declaration of Helsinki. If doubt exists whether the research was conducted in accordance with the said declaration, the authors must explain the rationale for their approach, and demonstrate that the institutional review body explicitly approved the doubtful aspects of the study.</p>\r\n<p>When reporting experiments on animals, authors should be asked to indicate whether the institutional and national guide for the care and use of laboratory animals was followed. Further guidance on animal research ethics is available from the International Association of Veterinary Editors’ Consensus Author Guidelines on Animal Ethics and Welfare. </p>', '<p> Saat melaporkan eksperimen pada subjek manusia, penulis harus menunjukkan apakah prosedur yang diikuti sesuai dengan standar etika dari komite yang bertanggung jawab pada eksperimen manusia (kelembagaan dan nasional) dan dengan Deklarasi Asosiasi Medis Dunia Helsinki. Jika ada keraguan apakah penelitian dilakukan sesuai dengan pernyataan tersebut, penulis harus menjelaskan alasan pendekatan mereka, dan menunjukkan bahwa lembaga peninjau kelembagaan secara eksplisit menyetujui aspek-aspek penelitian yang diragukan. </p>\r\n<p> Saat melaporkan percobaan pada hewan, penulis harus diminta untuk menunjukkan apakah panduan institusional dan nasional untuk perawatan dan penggunaan hewan laboratorium diikuti. Panduan lebih lanjut tentang etika penelitian hewan tersedia dari Asosiasi Penulis Internasional Konsensus Editor Veteriner tentang Pedoman Etika dan Kesejahteraan Hewan. </p>'),
(87, '<p>Patients have a right to privacy that should not be violated without informed consent. Identifying information, including names, initials, or hospital numbers, should not be published in written descriptions, photographs, or pedigrees unless the information is essential for scientific purposes and the patient (or parent or guardian) gives written informed consent for publication. Authors should disclose to these patients whether any potentially identifiable material might be available via the internet as well as in print after publication. Nonessential identifying details should be omitted.</p>\r\n<p>Molecular and Cellular Biomedical Sciences decides that patient confidentiality is better guarded by having the authors archive the consent, and instead providing us with a written statement in the manuscript attesting that they have received and archived written patient consent. When informed consent has been obtained, it should be indicated later in the published article.</p>', '<p> Pasien memiliki hak privasi yang tidak boleh dilanggar tanpa persetujuan tertulis. Mengidentifikasi informasi, termasuk nama, inisial, atau nomor rumah sakit, tidak boleh dipublikasikan dalam deskripsi tertulis, foto, atau silsilah kecuali informasi tersebut penting untuk tujuan ilmiah dan pasien (atau orang tua atau wali) memberikan persetujuan tertulis untuk publikasi. Penulis harus mengungkapkan kepada pasien ini apakah ada materi yang dapat diidentifikasi yang mungkin tersedia melalui internet dan juga di media cetak setelah publikasi. Detail pengidentifikasian yang tidak penting harus dihilangkan. </p> <p> Ilmu Biomedis Molekuler dan Seluler memutuskan bahwa kerahasiaan pasien lebih dijaga dengan membuat penulis mengarsipkan persetujuan, dan sebaliknya memberikan kepada kami pernyataan tertulis dalam naskah yang menyatakan bahwa mereka telah menerima dan persetujuan tertulis pasien yang diarsipkan. Ketika persetujuan berdasarkan informasi telah diperoleh, itu harus ditunjukkan kemudian dalam artikel yang diterbitkan. </p>'),
(88, '<p>Editors of Molecular and Cellular Biomedical Sciences have responsibilities toward the authors who provide the content of the journals, the peer reviewers who comment on the suitability of manuscripts for publication, also toward the journal&rsquo;s readers and the scientific community. Editors are responsible for monitoring and ensuring the fairness, timeliness, thoroughness, and civility of the peer-review and other editorial processes.</p>\r\n\r\n<p>Peer review by external reviewers with the proper expertise is the most common method to ensure manuscript quality. However, our editors may sometimes reject manuscripts without external peer review to make the best use of their resources. Reasons for this practice are usually that the manuscript is outside the scope of Molecular and Cellular Biomedical Sciences, does not meet our quality standards or lacks originality or novel information.</p>\r\n\r\n<p><strong>Editor Responsibilities toward Authors</strong></p>', '<p>Editor Ilmu Biomedis Molekuler dan Seluler memiliki tanggung jawab terhadap penulis yang menyediakan konten jurnal, penelaah yang mengomentari kesesuaian naskah untuk publikasi, juga terhadap pembaca jurnal dan komunitas ilmiah. Editor bertanggung jawab untuk memantau dan memastikan keadilan, ketepatan waktu, ketelitian, dan kesopanan dari penelaah&nbsp;dan proses editorial lainnya.</p>\r\n\r\n<p>Tinjauan rekan oleh pengulas eksternal dengan keahlian yang tepat adalah metode yang paling umum untuk memastikan kualitas naskah. Namun, editor kami terkadang menolak naskah tanpa penelaah&nbsp;eksternal untuk memanfaatkan sumber daya mereka sebaik mungkin. Alasan untuk praktik ini biasanya karena manuskrip berada di luar ruang lingkup Ilmu Biomedis Molekuler dan Seluler, tidak memenuhi standar kualitas kami atau tidak memiliki orisinalitas atau informasi baru.</p>\r\n\r\n<p><strong>Tanggung Jawab Editor terhadap Penulis </strong></p>\r\n\r\n<p>pembaca</p>'),
(89, 'Providing guidelines to authors for preparing and submitting manuscripts', 'Memberikan pedoman kepada penulis untuk mempersiapkan dan mengirimkan naskah '),
(90, 'Providing a clear statement of the Journal’s policies on authorship criteria', 'Memberikan pernyataan yang jelas tentang kebijakan Journal tentang kriteria kepengarangan '),
(91, 'Treating all authors with fairness, courtesy, objectivity, honesty, and transparency', 'Memperlakukan semua penulis dengan adil, sopan santun, objektif, jujur, dan transparan'),
(92, '<p>Editor Responsibilities toward Reviewers</p>', 'Tanggung Jawab Editor terhadap Peninjau '),
(93, 'Assigning papers for review appropriate to each reviewer’s area of interest and expertise', ' Menetapkan makalah untuk peninjauan yang sesuai dengan bidang minat dan keahlian masing-masing peninjau'),
(94, 'Establishing a process for reviewers to ensure that they treat the manuscript as a confidential document and complete the review promptly', ' Membuat proses untuk pengulas untuk memastikan bahwa mereka memperlakukan naskah sebagai dokumen rahasia dan menyelesaikan ulasan segera '),
(95, 'Informing reviewers that they are not allowed to make any use of the work described in the manuscript or to take advantage of the knowledge they gained by reviewing it before publication', ' Memberitahu pengulas bahwa mereka tidak diizinkan menggunakan karya apa pun yang dijelaskan dalam naskah atau memanfaatkan pengetahuan yang mereka peroleh dengan meninjaunya sebelum dipublikasikan'),
(96, '  <b><p>Editor Responsibilities toward Readers and the Scientific Community</p></b>', '  <b><p>Editor Responsibilities toward Readers and the Scientific Community</p></b>'),
(97, 'Evaluating all manuscripts considered for publication to make certain that each provides the evidence readers need to evaluate the authors’ conclusions and that authors’ conclusions reflect the evidence provided in the manuscript', 'Mengevaluasi semua naskah yang dipertimbangkan untuk publikasi untuk memastikan bahwa masing-masing memberikan bukti yang diperlukan pembaca untuk mengevaluasi kesimpulan penulis dan bahwa kesimpulan penulis mencerminkan bukti yang diberikan dalam naskah'),
(98, 'Providing literature references and author contact information so interested readers may pursue further discourse', 'Menyediakan referensi literatur dan informasi kontak penulis sehingga pembaca yang tertarik dapat melanjutkan ceramah lebih lanjut '),
(99, 'Requiring the corresponding author to review and accept responsibility for the content of the final draft of each paper', 'Memerlukan penulis yang sesuai untuk meninjau dan menerima tanggung jawab atas isi draf akhir masing-masing makalah '),
(100, 'Correction and Retraction Policy', 'Kebijakan Koreksi dan Retraksi'),
(101, 'Permanency of Content', 'Ketetapan Konten'),
(102, 'All articles published in Molecular and Cellular Biomedical Sciences receive a DOI and are permanently published. In order to maintain the integrity and the completeness of the scholarly record, we will apply the following policies when published content needs to be corrected. These policies take into account current best practice in the scholarly publishing and library communities: <', 'Semua artikel yang diterbitkan dalam Ilmu Biomedis Molekuler dan Seluler menerima DOI dan diterbitkan secara permanen. Untuk menjaga integritas dan kelengkapan catatan ilmiah, kami akan menerapkan kebijakan berikut ini ketika konten yang diterbitkan perlu diperbaiki. Kebijakan-kebijakan ini memperhitungkan praktik terbaik saat ini dalam komunitas penerbitan dan perpustakaan yang terpelajar:'),
(103, '<b><p>1. Correction to an Article </p></b>\r\n', '<b><p> 1. Koreksi ke Artikel </p> </b>'),
(104, '<b><p>2. Retraction to an Article</p></b>', '<b> <p> 2. Retraksi ke Artikel </p> </b>'),
(105, 'Further Information, Complaint, or Advertising Offers', 'Informasi Lebih Lanjut, Keluhan, atau Penawaran Iklan'),
(106, 'If you have any question, complaint, or advertising offers for Molecular and Cellular Biomedical Sciences, please contact us at:', 'Jika Anda memiliki pertanyaan, keluhan, atau penawaran iklan untuk Ilmu Biomedis Molekuler dan Seluler, silakan hubungi kami di: '),
(107, '<p>Already have a Username/Password for Molecular and Cellular Biomedical Sciences?</p>\r\n', '<p> Sudah memiliki Nama Pengguna / Kata Sandi untuk Ilmu Biomedis Molekuler dan Seluler? </p>\r\n'),
(108, '<p>Registration and login are required to submit items online and to check the status of current submissions.</p>\r\n', '<p> Registrasi dan login diperlukan untuk mengirimkan barang secara online dan untuk memeriksa status pengiriman saat ini. </p>\r\n'),
(109, '<b><p>1. GENERAL TERMS</p></b>\n<b><p>2. HOW TO SUBMIT</p></b>\n<b><p>3. EQUIREMENTS OF EACH MANUSCRIPT TYPE</p></b>\n<b><p>4. ABSTRACT</p></b>\n<b><p>5. REFERENCES</p></b>\n<b><p>6. UNIT OF MEASUREMENT</p></b>\n<b><p>7. MANUSCRIPT TEMPLATE</p></b>', '<b> <p> 1. KETENTUAN UMUM </p> </b>\r\n<b> <p> 2. CARA MENGIRIMKAN </p> </b>\r\n<b> <p> 3. PERSYARATAN SETIAP JENIS MANUSCRIPT </p> </b>\r\n<b> <p> 4. ABSTRAK </p> </b>\r\n<b> <p> 5. REFERENSI </p> </b>\r\n<b> <p> 6. UNIT PENGUKURAN </p> </b>\r\n<b> <p> 7. TEMPLATE MANUSCRIPT </p> </b>'),
(110, '<p>As part of the submission process, authors are required to check off their submission\'s compliance with all of the following items, and submissions may be returned to authors that do not adhere to these guidelines.</p>\r\n', '<p> Sebagai bagian dari proses pengiriman, penulis diwajibkan untuk memeriksa kepatuhan pengiriman mereka dengan semua item berikut, dan pengiriman dapat dikembalikan ke penulis yang tidak mematuhi pedoman ini. </p>'),
(111, '<p>Authors are allowed to keep the copyright without any restriction. Submission of a manuscript to the respective journals implies that all author/s have read and agreed to the content of the Covering Letter or the Terms and Conditions. It is a condition of publication that manuscripts submitted to this journal have not been published and will not be simultaneously submitted or published elsewhere. Plagiarism is strictly forbidden, and by submitting the manuscript for publication the author/s agree that the publishers have the legal right to take appropriate action against the author/s, if plagiarism or fabricated information is discovered. Once submitted to the journal, the author/s will not withdraw their manuscript at any stage prior to publication.</p>', '<p>Penulis diizinkan untuk menjaga hak cipta tanpa batasan apa pun. Penyerahan naskah ke jurnal masing-masing menyiratkan bahwa semua penulis telah membaca dan menyetujui isi Surat Pengantar atau Syarat dan Ketentuan. Ini adalah kondisi publikasi bahwa naskah yang diserahkan ke jurnal ini belum diterbitkan dan tidak akan secara bersamaan diserahkan atau diterbitkan di tempat lain. Plagiarisme dilarang keras, dan dengan menyerahkan naskah untuk publikasi, penulis setuju bahwa penerbit memiliki hak hukum untuk mengambil tindakan yang pantas terhadap penulis, jika ditemukan plagiarisme atau informasi palsu. Setelah diserahkan ke jurnal, penulis tidak akan menarik naskah mereka pada tahap apa pun sebelum dipublikasikan.</p>'),
(112, '<p>The names and email addresses entered in this E-Penelitian site will be used exclusively for the stated purposes of this journal and will not be made available for any other purpose or to any other party.</p>', '<p>Nama dan alamat email yang dimasukkan di situs E-Penelitian ini akan digunakan secara eksklusif untuk tujuan jurnal ini dan tidak akan tersedia untuk tujuan lain atau untuk pihak lain.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `doc_hasil`
--

CREATE TABLE `doc_hasil` (
  `id_doc_hasil` int(11) NOT NULL,
  `permohonan_id` int(11) NOT NULL,
  `nama_file` varchar(255) NOT NULL,
  `jenis_hasil_id` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doc_hasil`
--

INSERT INTO `doc_hasil` (`id_doc_hasil`, `permohonan_id`, `nama_file`, `jenis_hasil_id`, `created_at`, `updated_at`) VALUES
(1, 1, '1595322886File_pendukung_1.pdf', 1, NULL, NULL),
(2, 1, '1595322886File_pendukung_2.pdf', 2, NULL, NULL),
(3, 1, '1595322886File_pendukung_3.pdf', 3, NULL, NULL),
(4, 1, '1595322886File_pendukung_4.pdf', 4, NULL, NULL),
(5, 1, '1595322886File_pendukung_5.pdf', 5, NULL, NULL),
(6, 1, '1595322886File_pendukung_6.pdf', 6, NULL, NULL),
(7, 4, '1618904577File_pendukung_1.pdf', 1, NULL, NULL),
(8, 4, '1618904577File_pendukung_2.pdf', 2, NULL, NULL),
(9, 4, '1618904577File_pendukung_3.pdf', 3, NULL, NULL),
(10, 4, '1618904577File_pendukung_4.pdf', 4, NULL, NULL),
(11, 4, '1618904577File_pendukung_5.pdf', 5, NULL, NULL),
(12, 4, '1618904577File_pendukung_6.pdf', 6, NULL, NULL),
(13, 16, '1625135188File_pendukung_1.pdf', 1, NULL, NULL),
(14, 16, '1625135188File_pendukung_2.pdf', 2, NULL, NULL),
(15, 16, '1625135188File_pendukung_3.pdf', 3, NULL, NULL),
(16, 16, '1625135188File_pendukung_4.pdf', 4, NULL, NULL),
(17, 16, '1625135188File_pendukung_5.pdf', 5, NULL, NULL),
(18, 16, '1625135188File_pendukung_6.pdf', 6, NULL, NULL),
(19, 15, '1625193679File_pendukung_1.pdf', 1, NULL, NULL),
(20, 15, '1625193679File_pendukung_2.pdf', 2, NULL, NULL),
(21, 15, '1625193679File_pendukung_3.pdf', 3, NULL, NULL),
(22, 15, '1625193679File_pendukung_4.pdf', 4, NULL, NULL),
(23, 15, '1625193679File_pendukung_5.pdf', 5, NULL, NULL),
(24, 15, '1625193679File_pendukung_6.pdf', 6, NULL, NULL),
(25, 14, '1625194758File_pendukung_1.pdf', 1, NULL, NULL),
(26, 14, '1625194758File_pendukung_2.pdf', 2, NULL, NULL),
(27, 14, '1625194759File_pendukung_3.pdf', 3, NULL, NULL),
(28, 14, '1625194759File_pendukung_4.pdf', 4, NULL, NULL),
(29, 14, '1625194759File_pendukung_5.pdf', 5, NULL, NULL),
(30, 14, '1625194759File_pendukung_6.pdf', 6, NULL, NULL),
(31, 18, '1625195350File_pendukung_1.pdf', 1, NULL, NULL),
(32, 18, '1625195350File_pendukung_2.pdf', 2, NULL, NULL),
(33, 18, '1625195350File_pendukung_3.pdf', 3, NULL, NULL),
(34, 18, '1625195350File_pendukung_4.pdf', 4, NULL, NULL),
(35, 18, '1625195350File_pendukung_5.pdf', 5, NULL, NULL),
(36, 18, '1625195350File_pendukung_6.pdf', 6, NULL, NULL),
(37, 25, '1625214837File_pendukung_1.pdf', 1, NULL, NULL),
(38, 25, '1625214837File_pendukung_2.pdf', 2, NULL, NULL),
(39, 25, '1625214837File_pendukung_3.pdf', 3, NULL, NULL),
(40, 25, '1625214837File_pendukung_4.pdf', 4, NULL, NULL),
(41, 25, '1625214837File_pendukung_5.pdf', 5, NULL, NULL),
(42, 25, '1625214837File_pendukung_6.pdf', 6, NULL, NULL),
(43, 26, '1625215015File_pendukung_1.pdf', 1, NULL, NULL),
(44, 26, '1625215015File_pendukung_2.pdf', 2, NULL, NULL),
(45, 26, '1625215015File_pendukung_3.pdf', 3, NULL, NULL),
(46, 26, '1625215015File_pendukung_4.pdf', 4, NULL, NULL),
(47, 26, '1625215016File_pendukung_5.pdf', 5, NULL, NULL),
(48, 26, '1625215016File_pendukung_6.pdf', 6, NULL, NULL),
(49, 33, '1625470154File_pendukung_1.pdf', 1, NULL, NULL),
(50, 33, '1625470154File_pendukung_2.pdf', 2, NULL, NULL),
(51, 33, '1625470154File_pendukung_3.pdf', 3, NULL, NULL),
(52, 33, '1625470154File_pendukung_4.pdf', 4, NULL, NULL),
(53, 33, '1625470154File_pendukung_5.pdf', 5, NULL, NULL),
(54, 33, '1625470154File_pendukung_6.pdf', 6, NULL, NULL),
(55, 36, '1625622510File_pendukung_1.pdf', 1, NULL, NULL),
(56, 36, '1625622510File_pendukung_2.pdf', 2, NULL, NULL),
(57, 36, '1625622510File_pendukung_3.pdf', 3, NULL, NULL),
(58, 36, '1625622510File_pendukung_4.pdf', 4, NULL, NULL),
(59, 36, '1625622510File_pendukung_5.pdf', 5, NULL, NULL),
(60, 36, '1625622510File_pendukung_6.pdf', 6, NULL, NULL),
(61, 28, '1625628919File_pendukung_1.pdf', 1, NULL, NULL),
(62, 28, '1625628919File_pendukung_2.pdf', 2, NULL, NULL),
(63, 28, '1625628919File_pendukung_3.pdf', 3, NULL, NULL),
(64, 28, '1625628919File_pendukung_4.pdf', 4, NULL, NULL),
(65, 28, '1625628919File_pendukung_5.pdf', 5, NULL, NULL),
(66, 28, '1625628919File_pendukung_6.pdf', 6, NULL, NULL),
(67, 37, '1625643399File_pendukung_1.pdf', 1, NULL, NULL),
(68, 37, '1625643399File_pendukung_2.pdf', 2, NULL, NULL),
(69, 37, '1625643399File_pendukung_3.pdf', 3, NULL, NULL),
(70, 37, '1625643399File_pendukung_4.pdf', 4, NULL, NULL),
(71, 37, '1625643399File_pendukung_5.pdf', 5, NULL, NULL),
(72, 37, '1625643399File_pendukung_6.pdf', 6, NULL, NULL),
(73, 38, '1625713546File_pendukung_1.pdf', 1, NULL, NULL),
(74, 38, '1625713546File_pendukung_2.pdf', 2, NULL, NULL),
(75, 38, '1625713546File_pendukung_3.pdf', 3, NULL, NULL),
(76, 38, '1625713546File_pendukung_4.pdf', 4, NULL, NULL),
(77, 38, '1625713546File_pendukung_5.pdf', 5, NULL, NULL),
(78, 38, '1625713546File_pendukung_6.pdf', 6, NULL, NULL),
(79, 42, '1625720118File_pendukung_1.pdf', 1, NULL, NULL),
(80, 42, '1625720118File_pendukung_2.pdf', 2, NULL, NULL),
(81, 42, '1625720118File_pendukung_3.pdf', 3, NULL, NULL),
(82, 42, '1625720118File_pendukung_4.pdf', 4, NULL, NULL),
(83, 42, '1625720119File_pendukung_5.pdf', 5, NULL, NULL),
(84, 42, '1625720119File_pendukung_6.pdf', 6, NULL, NULL),
(85, 44, '1626064318File_pendukung_1.pdf', 1, NULL, NULL),
(86, 44, '1626064318File_pendukung_2.pdf', 2, NULL, NULL),
(87, 44, '1626064318File_pendukung_3.pdf', 3, NULL, NULL),
(88, 44, '1626064318File_pendukung_4.pdf', 4, NULL, NULL),
(89, 44, '1626064318File_pendukung_5.pdf', 5, NULL, NULL),
(90, 44, '1626064318File_pendukung_6.pdf', 6, NULL, NULL),
(91, 46, '1626071782File_pendukung_1.pdf', 1, NULL, NULL),
(92, 46, '1626071783File_pendukung_2.pdf', 2, NULL, NULL),
(93, 46, '1626071783File_pendukung_3.pdf', 3, NULL, NULL),
(94, 46, '1626071783File_pendukung_4.pdf', 4, NULL, NULL),
(95, 46, '1626071783File_pendukung_5.pdf', 5, NULL, NULL),
(96, 46, '1626071783File_pendukung_6.pdf', 6, NULL, NULL),
(97, 48, '1626078621File_pendukung_1.pdf', 1, NULL, NULL),
(98, 48, '1626078621File_pendukung_2.pdf', 2, NULL, NULL),
(99, 48, '1626078621File_pendukung_3.pdf', 3, NULL, NULL),
(100, 48, '1626078621File_pendukung_4.pdf', 4, NULL, NULL),
(101, 48, '1626078621File_pendukung_5.pdf', 5, NULL, NULL),
(102, 48, '1626078621File_pendukung_6.pdf', 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doc_pendukung`
--

CREATE TABLE `doc_pendukung` (
  `id_file` int(10) UNSIGNED NOT NULL,
  `permohonan_id` int(10) UNSIGNED NOT NULL,
  `jenis_file` int(10) UNSIGNED NOT NULL,
  `no_surat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_pj` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jabatan_pj` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_surat` date DEFAULT NULL,
  `nama_file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doc_status` enum('Pending','Terima','Tolak') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `catatan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acc_admin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_acc_admin` date DEFAULT NULL,
  `acc_kasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_acc_kasi` date DEFAULT NULL,
  `acc_kabid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_acc_kabid` date DEFAULT NULL,
  `acc_kadin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_acc_kadin` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doc_pendukung`
--

INSERT INTO `doc_pendukung` (`id_file`, `permohonan_id`, `jenis_file`, `no_surat`, `nama_pj`, `jabatan_pj`, `tanggal_surat`, `nama_file`, `doc_status`, `catatan`, `acc_admin`, `tgl_acc_admin`, `acc_kasi`, `tgl_acc_kasi`, `acc_kabid`, `tgl_acc_kabid`, `acc_kadin`, `tgl_acc_kadin`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL, NULL, NULL, '1595322573File_pendukung_1.pdf', 'Terima', '-', 'Terima', '2020-07-21', 'Terima', '2020-07-21', 'Menunggu', NULL, 'Menunggu', NULL, '2020-07-21 08:18:05', '2020-07-21 09:12:01'),
(2, 4, 1, NULL, NULL, NULL, NULL, '1618903267File_pendukung_1.pdf', 'Terima', '-', 'Terima', '2021-04-20', 'Terima', '2021-04-20', 'Menunggu', NULL, 'Menunggu', NULL, '2021-04-20 07:21:07', '2021-04-20 07:30:43'),
(3, 5, 1, NULL, NULL, NULL, NULL, '1618906609File_pendukung_1.pdf', 'Terima', '-', 'Terima', '2021-04-20', 'Menunggu', NULL, 'Menunggu', NULL, 'Menunggu', NULL, '2021-04-20 08:16:49', '2021-04-20 08:20:52'),
(4, 6, 1, NULL, NULL, NULL, NULL, '1621567175File_pendukung_1.pdf', 'Terima', '-', 'Terima', '2021-05-21', 'Menunggu', NULL, 'Menunggu', NULL, 'Menunggu', NULL, '2021-05-21 03:19:35', '2021-05-21 03:33:38'),
(5, 7, 1, NULL, NULL, NULL, NULL, '1621569988File_pendukung_1.pdf', 'Terima', '-', 'Terima', '2021-05-21', 'Menunggu', NULL, 'Menunggu', NULL, 'Menunggu', NULL, '2021-05-21 04:06:28', '2021-05-21 04:08:10'),
(6, 8, 1, NULL, NULL, NULL, NULL, '1624613304File_pendukung_1.pdf', 'Terima', '-', 'Terima', '2021-06-28', 'Menunggu', NULL, 'Menunggu', NULL, 'Menunggu', NULL, '2021-06-25 09:28:24', '2021-06-28 03:42:48');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_penelitian`
--

CREATE TABLE `hasil_penelitian` (
  `id_hasil_penelitian` int(11) NOT NULL,
  `abstrak` text NOT NULL,
  `permohonan_id` int(11) NOT NULL,
  `tgl_submit` date NOT NULL,
  `catatan` text DEFAULT NULL,
  `status_hasil` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hasil_penelitian`
--

INSERT INTO `hasil_penelitian` (`id_hasil_penelitian`, `abstrak`, `permohonan_id`, `tgl_submit`, `catatan`, `status_hasil`) VALUES
(1, '<p>coba abstrak</p>', 1, '2020-07-21', '-', 'Publish'),
(2, 'sudah', 4, '2021-04-20', '-', 'Publish'),
(3, '', 16, '2021-07-01', '-', 'Publish'),
(4, 'Test', 15, '2021-07-02', '-', 'Publish'),
(5, 'Publish', 14, '2021-07-02', '-', 'Publish'),
(6, 'aaa', 18, '2021-07-02', '-', 'Publish'),
(7, '', 25, '2021-07-02', '-', 'Publish'),
(8, '', 26, '2021-07-02', '-', 'Publish'),
(9, 'sekian', 33, '2021-07-05', '-', 'Publish'),
(10, '', 36, '2021-07-07', '-', 'Publish'),
(11, 'Penelitian merupakan rangkaian pengamatan saling berkaitan, berakumulasi dan menciptakan teori-teori yang mampu menjelaskan suatu masalah.', 28, '2021-07-07', '-', 'Publish'),
(12, 'Penelitian ini mengenai sumber daya kesehatan yang berfokus pada seksi kefarmasian.', 37, '2021-07-07', '-', 'Publish'),
(13, 'Tes Abstrak', 38, '2021-07-08', '-', 'Publish'),
(14, 'Sangat Abstrak', 42, '2021-07-08', '-', 'Publish'),
(15, 'Sangat Abstrak', 44, '2021-07-12', '-', 'Publish'),
(16, 'Sangat Abstrak', 46, '2021-07-12', '-', 'Publish'),
(17, 'Abstrak Tolak', 48, '2021-07-12', '-', 'Publish');

-- --------------------------------------------------------

--
-- Table structure for table `identitas`
--

CREATE TABLE `identitas` (
  `id_identitas` int(11) NOT NULL,
  `nama_web` text NOT NULL,
  `alamat` text DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telepon` varchar(100) DEFAULT NULL,
  `fax` varchar(100) DEFAULT NULL,
  `contact` text NOT NULL,
  `announcement` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `identitas`
--

INSERT INTO `identitas` (`id_identitas`, `nama_web`, `alamat`, `email`, `telepon`, `fax`, `contact`, `announcement`) VALUES
(1, 'E-Penelitian', 'Dinas Kesehatan Kabupaten SIdoarjo.\r\nJl. Mayjend Sungkono 46 Sidoarjo\r\nKode Pos. 61219', 'Email : dinkes@sidoarjokab.go.id', '031.8941051, 031.8968736', '031.8947911', '<h3><img alt=\"\" src=\"https://upload.wikimedia.org/wikipedia/commons/c/c6/Coat_of_Arms_of_Sidoarjo_Regency.png\" style=\"border-style:solid; border-width:0px; float:left; height:90px; margin:50px; width:100px\" /><strong>Pemerintah Kabupaten Sidoarjo</strong></h3>\r\n\r\n<h1><strong>Dinas Kesehatan</strong></h1>\r\n\r\n<p><strong>Jln. Mayor Jendral Sungkono No. 46 Sidoarjo</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<hr />\r\n<p><strong>&nbsp;&nbsp;</strong></p>\r\n\r\n<p><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Email&nbsp; &nbsp; &nbsp; &nbsp; :&nbsp;<a href=\"mailto:dinkes@sidoarjokab.go.id\" target=\"_blank\">dinkes@sidoarjokab.go.id</a></strong><br />\r\n<strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Telepon&nbsp; &nbsp; : 031.8941051, 031.8968736</strong><br />\r\n<strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Fax&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: 031.8947911</strong></p>\r\n\r\n<p>&nbsp;</p>', '<p>E-Penelitian invites you to submit papers, covering any aspect of biomedical sciences. All submitted papers must not be previously published and not under consideration for publication elsewhere. Papers may come from any country but must be written in English and written in Indonesia language. Papers may be submitted as research article or review article.</p>\n\n<p>More detail information regarding online submission can be found in the author guidelines</p>\n\n<p>E-Penelitian mengundang Anda untuk menyerahkan makalah, yang mencakup segala aspek ilmu biomedis. Semua makalah yang dikirim tidak boleh dipublikasikan sebelumnya dan tidak dalam pertimbangan untuk dipublikasikan di tempat lain. Makalah dapat berasal dari negara mana pun tetapi harus ditulis dalam bahasa Inggris dan ditulis dalam bahasa Indonesia. Makalah dapat dikirimkan sebagai artikel penelitian atau artikel ulasan.</p>\n\n<p>Informasi lebih detail mengenai pengiriman online dapat ditemukan di pedoman penulis</p>');

-- --------------------------------------------------------

--
-- Table structure for table `item_permohonan`
--

CREATE TABLE `item_permohonan` (
  `id_item_permohonan` bigint(50) NOT NULL,
  `permohonan_id` bigint(20) NOT NULL,
  `upload_proposal_penelitian` varchar(255) DEFAULT NULL,
  `upload_surat_pengantar` varchar(255) DEFAULT NULL,
  `upload_surat_rekomendasi` varchar(255) DEFAULT NULL,
  `upload_surat_pernyataan` varchar(255) DEFAULT NULL,
  `upload_surat_kesediaan` varchar(255) DEFAULT NULL,
  `upload_surat_izin` varchar(255) DEFAULT NULL,
  `doc_status` varchar(255) NOT NULL,
  `catatan` varchar(255) DEFAULT NULL,
  `acc_admin` varchar(255) NOT NULL,
  `tgl_acc_admin` date DEFAULT NULL,
  `acc_kasi` varchar(255) NOT NULL,
  `tgl_acc_kasi` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item_permohonan`
--

INSERT INTO `item_permohonan` (`id_item_permohonan`, `permohonan_id`, `upload_proposal_penelitian`, `upload_surat_pengantar`, `upload_surat_rekomendasi`, `upload_surat_pernyataan`, `upload_surat_kesediaan`, `upload_surat_izin`, `doc_status`, `catatan`, `acc_admin`, `tgl_acc_admin`, `acc_kasi`, `tgl_acc_kasi`, `created_at`, `updated_at`) VALUES
(3, 13, '7760dbe01533f1a1625022485.pdf', '7760dbe01533f701625022485.pdf', '7760dbe01533f991625022485.pdf', '7760dbe01533fcb1625022485.pdf', '7760dbe015340131625022485.pdf', NULL, 'Tolak', 'Proposal Penelitian Perlu Diperbaiki Lagi', 'Tolak', '2021-06-30', 'Menunggu', NULL, '2021-06-30 04:04:01', '2021-06-30 04:20:15'),
(4, 14, '7760dc06e6be0901625032422.pdf', '7760dc06e6be0c41625032422.pdf', '7760dc06e6be0e81625032422.pdf', '7760dc06e6be1091625032422.pdf', '7760dc06e6be12a1625032422.pdf', '160de7f21bfc131625194273.pdf', 'Terima', '-', 'Terima', '2021-06-30', 'Terima', '2021-07-02', '2021-06-30 04:47:35', '2021-07-02 02:51:13'),
(5, 15, '7760dc0b2e09c7e1625033518.pdf', '7760dc0b2e09cae1625033518.pdf', '7760dc0b2e09ccd1625033518.pdf', '7760dc0b2e09ceb1625033518.pdf', '7760dc0b2e09d071625033518.pdf', '160dd93c3d723b1625134019.pdf', 'Terima', 'Bwagus', 'Terima', '2021-06-30', 'Terima', '2021-07-01', '2021-06-30 06:08:39', '2021-07-01 10:06:59'),
(6, 16, '7760dc1fbf9c11f1625038783.pdf', '7760dc1fbf9c1501625038783.pdf', '7760dc1fbf9c1701625038783.pdf', '7760dc1fbf9c18e1625038783.pdf', '7760dc1fbf9c1ab1625038783.pdf', '160dd8c21f2d2b1625132065.pdf', 'Terima', 'Sudah Betul', 'Terima', '2021-06-30', 'Terima', '2021-07-01', '2021-06-30 07:39:43', '2021-07-01 09:34:25'),
(7, 18, '7760de8236b2be51625195062.pdf', '7760de8236b2c161625195062.pdf', '7760de8236b2c401625195062.pdf', '7760de8236b2c611625195062.pdf', '7760de8236b2c801625195062.pdf', '160de82ed33e9f1625195245.pdf', 'Terima', '-', 'Terima', '2021-07-02', 'Terima', '2021-07-02', '2021-07-02 03:04:22', '2021-07-02 03:07:25'),
(8, 19, '7760de83f95321b1625195513.pdf', '7760de83f9532351625195513.pdf', '7760de83f9532431625195513.pdf', '7760de83f9532511625195513.pdf', '7760de83f95325f1625195513.pdf', '160de847c6ea271625195644.pdf', 'Terima', '-', 'Terima', '2021-07-02', 'Terima', '2021-07-02', '2021-07-02 03:11:53', '2021-07-02 03:14:04'),
(9, 20, '7760de8a33943301625197107.pdf', '7760de8a33943631625197107.pdf', '7760de8a33943861625197107.pdf', '7760de8a33943a81625197107.pdf', '7760de8a33943c91625197107.pdf', NULL, 'Terima', '-', 'Terima', '2021-07-02', 'Menunggu', NULL, '2021-07-02 03:38:27', '2021-07-02 03:40:37'),
(10, 21, '7760de8bd8529581625197528.pdf', '7760de8bd85298a1625197528.pdf', '7760de8bd8529ad1625197528.pdf', '7760de8bd8529cf1625197528.pdf', '7760de8bd8529f11625197528.pdf', NULL, 'Terima', '-', 'Terima', '2021-07-02', 'Menunggu', NULL, '2021-07-02 03:45:28', '2021-07-02 03:45:44'),
(11, 22, '7760de8c410fff41625197633.pdf', '7760de8c41100221625197633.pdf', '7760de8c41100421625197633.pdf', '7760de8c41100611625197633.pdf', '7760de8c41100801625197633.pdf', NULL, 'Terima', '-', 'Terima', '2021-07-02', 'Menunggu', NULL, '2021-07-02 03:47:13', '2021-07-02 03:47:22'),
(12, 24, NULL, NULL, NULL, NULL, NULL, NULL, 'Terima', NULL, 'Terima', '2021-07-02', 'Terima', '2021-07-02', '2021-07-02 08:28:32', '2021-07-02 08:28:32'),
(13, 25, NULL, NULL, NULL, NULL, NULL, NULL, 'Terima', '-', 'Terima', '2021-07-02', 'Terima', '2021-07-02', '2021-07-02 08:29:35', '2021-07-02 08:29:35'),
(14, 26, NULL, NULL, NULL, NULL, NULL, NULL, 'Terima', '-', 'Terima', '2021-07-02', 'Terima', '2021-07-02', '2021-07-02 08:36:01', '2021-07-02 08:36:01'),
(15, 27, NULL, NULL, NULL, NULL, NULL, NULL, 'Terima', '-', 'Terima', '2021-07-02', 'Terima', '2021-07-02', '2021-07-02 08:37:19', '2021-07-02 08:37:19'),
(16, 28, NULL, NULL, NULL, NULL, NULL, NULL, 'Terima', '-', 'Terima', '2021-07-02', 'Terima', '2021-07-02', '2021-07-02 08:42:14', '2021-07-02 08:42:14'),
(17, 29, NULL, NULL, NULL, NULL, NULL, NULL, 'Terima', '-', 'Terima', '2021-07-02', 'Terima', '2021-07-02', '2021-07-02 09:10:25', '2021-07-02 09:10:25'),
(18, 30, NULL, NULL, NULL, NULL, NULL, NULL, 'Terima', '-', 'Terima', '2021-07-02', 'Terima', '2021-07-02', '2021-07-02 09:39:12', '2021-07-02 09:39:12'),
(19, 31, NULL, NULL, NULL, NULL, NULL, NULL, 'Terima', '-', 'Terima', '2021-07-02', 'Terima', '2021-07-02', '2021-07-02 09:44:04', '2021-07-02 09:44:04'),
(20, 32, NULL, NULL, NULL, NULL, NULL, NULL, 'Terima', '-', 'Terima', '2021-07-02', 'Terima', '2021-07-02', '2021-07-02 09:45:42', '2021-07-02 09:45:42'),
(21, 33, NULL, NULL, NULL, NULL, NULL, NULL, 'Terima', '-', 'Terima', '2021-07-05', 'Terima', '2021-07-05', '2021-07-05 07:27:08', '2021-07-05 07:27:08'),
(22, 34, '8060e2b9454149c1625471301.pdf', '8060e2b945414d71625471301.pdf', '8060e2b945415051625471301.pdf', '8060e2b945415311625471301.pdf', '8060e2b9454155b1625471301.pdf', '160e2ba455ba0e1625471557.pdf', 'Terima', '-', 'Terima', '2021-07-05', 'Terima', '2021-07-05', '2021-07-05 07:48:21', '2021-07-05 07:52:37'),
(23, 35, '8060e2c0fdeac7a1625473277.pdf', '8060e2c0fdeac9b1625473277.pdf', '8060e2c0fdeacb11625473277.pdf', '8060e2c0fdeacc61625473277.pdf', '8060e2c0fdeacda1625473277.pdf', '160e2c187a05351625473415.pdf', 'Terima', '-', 'Terima', '2021-07-05', 'Terima', '2021-07-05', '2021-07-05 08:14:14', '2021-07-05 08:23:35'),
(24, 36, NULL, NULL, NULL, NULL, NULL, NULL, 'Terima', '-', 'Terima', '2021-07-06', 'Terima', '2021-07-06', '2021-07-06 05:07:32', '2021-07-06 05:07:32'),
(25, 37, '8560e557303434d1625642800.pdf', '8560e557303438b1625642800.pdf', '8560e55730343b51625642800.pdf', '8560e55730343de1625642800.pdf', '8560e55730344081625642800.pdf', '160e55835259441625643061.pdf', 'Terima', '-', 'Terima', '2021-07-07', 'Terima', '2021-07-07', '2021-07-07 07:26:40', '2021-07-07 07:31:01'),
(26, 38, NULL, NULL, NULL, NULL, NULL, NULL, 'Terima', '-', 'Terima', '2021-07-08', 'Terima', '2021-07-08', '2021-07-08 03:03:24', '2021-07-08 03:03:24'),
(27, 39, '8760e6704c181e01625714764.pdf', '8760e6704c1821e1625714764.pdf', '8760e6704c1824b1625714764.pdf', '8760e6704c182761625714764.pdf', '8760e6704c182a11625714764.pdf', NULL, 'Terima', '-', 'Terima', '2021-07-08', 'Menunggu', NULL, '2021-07-08 03:26:04', '2021-07-08 03:36:43'),
(28, 40, NULL, NULL, NULL, NULL, NULL, NULL, 'Terima', '-', 'Terima', '2021-07-08', 'Terima', '2021-07-08', '2021-07-08 04:00:58', '2021-07-08 04:00:58'),
(29, 41, NULL, NULL, NULL, NULL, NULL, NULL, 'Terima', '-', 'Terima', '2021-07-08', 'Terima', '2021-07-08', '2021-07-08 04:43:40', '2021-07-08 04:43:40'),
(30, 42, '9060e68427cad511625719847.pdf', '9060e68427cad831625719847.pdf', '9060e68427cada41625719847.pdf', '9060e68427cadc31625719847.pdf', '9060e68427cade21625719847.pdf', '160e684db6089b1625720027.pdf', 'Terima', '-', 'Terima', '2021-07-08', 'Terima', '2021-07-08', '2021-07-08 04:50:47', '2021-07-08 04:53:47'),
(31, 43, '9160e6baf21c57a1625733874.pdf', '9160e6baf21c5b31625733874.pdf', '9160e6baf21c5df1625733874.pdf', '9160e6baf21c60a1625733874.pdf', '9160e6baf21c6341625733874.pdf', '160e6bba9d2df21625734057.pdf', 'Terima', '-', 'Terima', '2021-07-08', 'Terima', '2021-07-08', '2021-07-08 08:25:18', '2021-07-08 08:47:37'),
(32, 44, '9260ebc404bac2f1626063876.pdf', '9260ebc404bac4a1626063876.pdf', '9260ebc404bac591626063876.pdf', '9260ebc404bac681626063876.pdf', '9260ebc404bac771626063876.pdf', '160ebc5139cca81626064147.pdf', 'Terima', '-', 'Terima', '2021-07-12', 'Terima', '2021-07-12', '2021-07-12 04:24:36', '2021-07-12 04:29:07'),
(33, 45, '9260ebde79385e01626070649.pdf', '9260ebde79386121626070649.pdf', '9260ebde79386321626070649.pdf', '9260ebde79386511626070649.pdf', '9260ebde793866f1626070649.pdf', NULL, 'Terima', '-', 'Terima', '2021-07-12', 'Menunggu', NULL, '2021-07-12 06:17:29', '2021-07-12 06:17:54'),
(34, 46, '9260ebdf4725ac61626070855.pdf', '9260ebdf4725af51626070855.pdf', '9260ebdf4725b151626070855.pdf', '9260ebdf4725b341626070855.pdf', '9260ebdf4725b521626070855.pdf', '160ebe2ab328c91626071723.pdf', 'Terima', '-', 'Terima', '2021-07-12', 'Terima', '2021-07-12', '2021-07-12 06:20:55', '2021-07-12 06:35:23'),
(35, 47, NULL, NULL, NULL, NULL, NULL, NULL, 'Terima', '-', 'Terima', '2021-07-12', 'Terima', '2021-07-12', '2021-07-12 07:27:49', '2021-07-12 07:27:49'),
(36, 48, '9260ebfbe3be8141626078179.pdf', '9260ebfbe3be8351626078179.pdf', '9260ebfbe3be84a1626078179.pdf', '9260ebfbe3be85d1626078179.pdf', '9260ebfbe3be8701626078179.pdf', '160ebfc5f542da1626078303.pdf', 'Terima', '-', 'Terima', '2021-07-12', 'Terima', '2021-07-12', '2021-07-12 08:14:17', '2021-07-12 08:25:03'),
(37, 49, '9260ec06908f3021626080912.pdf', '9260ec06908f3311626080912.pdf', '9260ec06908f3511626080912.pdf', '9260ec06908f36f1626080912.pdf', '9260ec06908f38d1626080912.pdf', NULL, 'Tolak', '-', 'Tolak', '2021-07-12', 'Menunggu', NULL, '2021-07-12 09:08:32', '2021-07-12 09:09:27'),
(38, 50, '9160ec16d64b9b71626085078.pdf', '9160ec16d64b9d81626085078.pdf', '9160ec16d64b9ed1626085078.pdf', '9160ec16d64ba011626085078.pdf', '9160ec16d64ba161626085078.pdf', NULL, 'Tolak', '-', 'Tolak', '2021-07-12', 'Menunggu', NULL, '2021-07-12 10:17:58', '2021-07-12 10:18:52'),
(40, 52, NULL, NULL, NULL, NULL, NULL, NULL, 'Terima', '-', 'Terima', '2021-07-14', 'Terima', '2021-07-14', '2021-07-14 08:59:02', '2021-07-14 08:59:02'),
(41, 53, NULL, NULL, NULL, NULL, NULL, NULL, 'Terima', '-', 'Terima', '2021-07-14', 'Terima', '2021-07-14', '2021-07-14 09:29:15', '2021-07-14 09:29:15'),
(42, 54, '9160eeb16fd1dec1626255727.pdf', '9160eeb16fd1e1f1626255727.pdf', '9160eeb16fd1e411626255727.pdf', '9160eeb16fd1e611626255727.pdf', '9160eeb16fd1e811626255727.pdf', NULL, 'Menunggu', NULL, 'Menunggu', NULL, 'Menunggu', NULL, '2021-07-14 09:42:07', '2021-07-14 09:42:07'),
(43, 55, NULL, NULL, NULL, NULL, NULL, NULL, 'Terima', '-', 'Terima', '2021-07-14', 'Terima', '2021-07-14', '2021-07-14 10:03:03', '2021-07-14 10:03:03'),
(44, 56, NULL, NULL, NULL, NULL, NULL, NULL, 'Terima', '-', 'Terima', '2021-07-14', 'Terima', '2021-07-14', '2021-07-14 10:14:56', '2021-07-14 10:14:56'),
(45, 57, NULL, NULL, NULL, NULL, NULL, NULL, 'Terima', '-', 'Terima', '2021-07-14', 'Terima', '2021-07-14', '2021-07-14 10:20:44', '2021-07-14 10:20:44');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_file_pendukung`
--

CREATE TABLE `jenis_file_pendukung` (
  `id_jenis_file` int(10) UNSIGNED NOT NULL,
  `nama_jenis` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_form` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_file_pendukung`
--

INSERT INTO `jenis_file_pendukung` (`id_jenis_file`, `nama_jenis`, `nama_form`, `created_at`, `updated_at`) VALUES
(1, 'proposal', 'Proposal Penelitian', '2020-07-01 04:41:32', '2020-07-01 04:41:32');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_hasil`
--

CREATE TABLE `jenis_hasil` (
  `id_jenis_hasil` int(11) NOT NULL,
  `nama_jenis` varchar(255) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_hasil`
--

INSERT INTO `jenis_hasil` (`id_jenis_hasil`, `nama_jenis`, `created_at`, `updated_at`) VALUES
(1, 'Abstrak', NULL, NULL),
(2, 'Bab 1', NULL, NULL),
(3, 'Bab 2', NULL, NULL),
(4, 'Bab 3', NULL, NULL),
(5, 'Bab 4', NULL, NULL),
(6, 'Bab 5', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_penelitian`
--

CREATE TABLE `jenis_penelitian` (
  `id_jenis_penelitian` int(10) UNSIGNED NOT NULL,
  `nama_jenis` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parrent_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_penelitian`
--

INSERT INTO `jenis_penelitian` (`id_jenis_penelitian`, `nama_jenis`, `keterangan`, `parrent_id`, `created_at`, `updated_at`) VALUES
(1, 'Surat Ijin Penelitian Eksternal', 'Surat ijin penelitian untuk UPT Dinkes Kab Sda untuk 26 puskesmas; 1 gfk dan 1 labkesda;', 1, '2020-04-16 03:35:32', '2020-06-30 06:04:27'),
(2, 'Surat Ijin Penelitian Internal', 'Nota Dinas Ijin Penelitian untuk 4 bidang dan 1 sekretariat', 1, '2020-06-30 05:56:02', '2020-06-30 06:00:40');

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id_laporan` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `judul_laporan` varchar(255) DEFAULT NULL,
  `abstrak` text DEFAULT NULL,
  `file_laporan` varchar(255) DEFAULT NULL,
  `tgl_upload` date DEFAULT NULL,
  `setuju` int(11) DEFAULT 0 COMMENT '0=belum;1=setuju'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id_laporan`, `users_id`, `judul_laporan`, `abstrak`, `file_laporan`, `tgl_upload`, `setuju`) VALUES
(6, 1, 'Judul', '<p>Hello World</p>', 'laporan-20190723043101.pdf', '2019-07-23', 0);

-- --------------------------------------------------------

--
-- Table structure for table `lembar_konfirmasi`
--

CREATE TABLE `lembar_konfirmasi` (
  `id_lembar` tinyint(11) NOT NULL,
  `form_konfirmasi` text NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `lembar_konfirmasi`
--

INSERT INTO `lembar_konfirmasi` (`id_lembar`, `form_konfirmasi`, `keterangan`) VALUES
(1, '<table style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img src=\"[[logo-dinkes]]\" style=\"width:125px\" /></td>\r\n			<td>\r\n			<p>PEMERINTAH KABUPATEN SIDOARJO<br />\r\n			<strong>DINAS KESEHATAN</strong><br />\r\n			Jl. Mayjen Sungkono No. 46 Sidoarjo<br />\r\n			Telp. (031) 894 1051, 896 8736 Fax. (031) 894 7911</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><img src=\"[[watermark]]\" style=\"height:80%; width:90%\" /></p>\r\n\r\n<p><strong>SURAT IZIN PRAKTIK DOKTER</strong><br />\r\n<strong>NOMOR : </strong><strong>551.4.1/[[nomor-surat]]/IP.DUV/VII/[[bulan-terbit]]/438.5.2/[[tahun-terbit]]</strong></p>\r\n\r\n<p>Berdasarkan Peraturan Menteri Kesehatan Republik Indonesia Nomor : 2052 / MENKES / PER / X / 2011&nbsp;tentang Izin dan Pelaksanaan Praktik Kedokteran,&nbsp;yang bertanda tangan dibawah ini, Kepala Dinas Kesehatan Kabupaten Sidoarjo memberikan Izin Praktik pada :</p>\r\n\r\n<p><strong>[[nama-lengkap-dan-gelar]]</strong></p>\r\n\r\n<table style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"width:35%\">Tempat / Tgl. Lahir</td>\r\n			<td>: <strong>[[tempat-lahir]], [[tanggal-lahir]]</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top\">Alamat</td>\r\n			<td>: <strong>[[alamat-jalan-rt-rw]], [[desa]], [[kecamatan]], [[kabupaten]]</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Untuk Praktik</td>\r\n			<td>:<strong> [[nama-tempat-praktik]]</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top\">Alamat Tempat Praktik</td>\r\n			<td>: <strong>[[alamat-tempat-praktik]]</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>No. STR</td>\r\n			<td>: <strong>[[nomor-str]]</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>STR Berlaku Sampai dengan</td>\r\n			<td>: <strong>[[tanggal-berlaku-str]]</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Nomor Rekomendasi OP</td>\r\n			<td>: <strong>[[nomor-op]]</strong></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<table style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"width:20%\">&nbsp;</td>\r\n			<td style=\"width:30%\"><img src=\"[[photo]]\" style=\"height:180px; margin-top:20px; width:130px\" /> <img src=\"[[stempel-dinkes]]\" style=\"margin-left:0px; margin-top:80px; width:120px\" /> <img src=\"[[paraf-kadinkes]]\" style=\"margin-left:-70px; margin-top:90px; width:200px\" /> <img src=\"[[paraf-kabid]]\" style=\"width:25px\" /> <img src=\"[[paraf-kasi]]\" style=\"width:15px\" /></td>\r\n			<td style=\"width:50%\">\r\n			<p>Dikeluarkan di : <strong>Sidoarjo</strong><br />\r\n			Pada tanggal : <strong>[[tanggal-terbit]]</strong><br />\r\n			<strong>KEPALA DINAS KESEHATAN<br />\r\n			KABUPATEN SIDOARJO</strong><br />\r\n			<br />\r\n			<br />\r\n			&nbsp;</p>\r\n\r\n			<p><br />\r\n			<strong>drg.SYAF SATRIAWARMAN, Sp.Pros.<br />\r\n			Pembina Tingkat I<br />\r\n			NIP. 19630718 199103 1 004 </strong></p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<table style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"width:50%\">Tembusan :<br />\r\n			1. Menteri Kesehatan.<br />\r\n			2. Ketua Konsil Kedokteran Indonsia<br />\r\n			3. Kepala Dinas Kesehatan Provinsi<br />\r\n			4. Organisasi Profesi.</td>\r\n			<td style=\"text-align:right; width:50%\"><img src=\"[[qrcode]]\" style=\"height:80px; width:80px\" /><br />\r\n			*Sesuai dengan ketentuan yang berlaku, Dinas kesehatan kabupaten sidoarjo sehingga tidak diperlukan tanda tangan basah pada faktur SIP ini.</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 'lembar konfirmasi');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(255) NOT NULL,
  `name_menu` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `name_menu`, `url`) VALUES
(1, 'Beranda', 'Home', '/'),
(2, 'Peninjauan', 'Overview', '/about'),
(3, 'Masuk', 'Login', '/login'),
(4, 'Daftar', 'Register', '/registrasi'),
(5, 'Rilis', 'Publish', '/current'),
(6, 'Arsip', 'Archive', '/archive'),
(7, 'Pengumuman', 'Announcement', '/announcement'),
(8, 'Article In Press', 'Article In Press', '/article'),
(9, 'Beranda User', 'User Home', '/userhome'),
(10, 'Cari', 'Search', '/search');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(112, '2019_09_05_075515_create_file_supplemens_table', 1),
(136, '2019_09_03_102708_refresh', 2),
(312, '2019_08_19_070650_create_profiles_table', 3),
(313, '2019_08_20_033207_create_users_table', 3),
(314, '2019_09_02_025929_create_submissions_table', 3),
(315, '2019_09_02_030001_create_supplementaries_table', 3),
(316, '2019_09_02_030046_create_author_submits_table', 3),
(317, '2019_09_11_075504_create_reviewers_table', 3),
(318, '2019_11_23_145157_create_jenis_penelitian_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permohonan`
--

CREATE TABLE `permohonan` (
  `id_permohonan` int(10) UNSIGNED NOT NULL,
  `judul_penelitian` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_penelitian_id` int(10) UNSIGNED DEFAULT NULL,
  `tgl_pengajuan` date NOT NULL,
  `tgl_awal` date DEFAULT NULL,
  `tgl_akhir` date DEFAULT NULL,
  `users_id` int(10) UNSIGNED NOT NULL,
  `status` enum('Pending','Terima Admin','Tolak','terima','Menunggu Admin','Menunggu Kasi','Menunggu Kabid','Menunggu Kadin','Menunggu Pkm') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surat_ijin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estimasi_waktu` date DEFAULT NULL,
  `tgl_ambil` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permohonan`
--

INSERT INTO `permohonan` (`id_permohonan`, `judul_penelitian`, `jenis_penelitian_id`, `tgl_pengajuan`, `tgl_awal`, `tgl_akhir`, `users_id`, `status`, `surat_ijin`, `estimasi_waktu`, `tgl_ambil`, `created_at`, `updated_at`) VALUES
(1, 'Test Lagi', 1, '2020-07-21', '2020-07-22', '2020-08-09', 54, 'terima', NULL, '2020-08-04', '2020-07-22', '2020-07-21 07:57:53', '2020-07-21 09:12:52'),
(2, 'tes untuk tempat', 2, '2020-07-29', '2020-07-29', '2020-12-31', 54, 'Pending', NULL, NULL, NULL, '2020-07-29 09:45:29', '2020-07-29 09:45:29'),
(3, 'tes coba', 1, '2020-07-29', '2020-07-29', '2020-07-31', 54, 'Pending', NULL, NULL, NULL, '2020-07-29 09:46:02', '2020-07-29 09:46:02'),
(4, 'lorem ipsum', 1, '2021-04-20', '2021-05-01', '2021-06-30', 56, 'terima', NULL, '2021-05-04', '2021-04-21', '2021-04-20 07:20:23', '2021-04-20 07:30:47'),
(5, 'Penelitian 1', 1, '2021-04-20', '2021-04-25', '2021-12-24', 57, 'Menunggu Admin', NULL, NULL, NULL, '2021-04-20 08:15:57', '2021-04-20 08:16:49'),
(6, 'Sit', 1, '2021-05-21', '2021-04-29', '2021-09-04', 58, 'Menunggu Admin', NULL, NULL, NULL, '2021-05-21 03:19:04', '2021-05-21 03:19:35'),
(7, 'penelitian oleh rosam', 1, '2021-05-21', '2021-05-21', '2021-09-30', 58, 'Menunggu Admin', NULL, NULL, NULL, '2021-05-21 04:06:13', '2021-05-21 04:06:28'),
(8, 'aaa', 1, '2021-06-25', '2021-06-26', '2021-07-31', 59, 'Menunggu Admin', NULL, NULL, NULL, '2021-06-25 07:41:15', '2021-06-28 03:40:27'),
(14, 'Testing Lagi Penelitian', 1, '2021-06-30', '2021-06-01', '2021-06-16', 77, 'terima', NULL, '2021-07-14', '2021-07-02', '2021-06-30 04:47:35', '2021-07-02 02:49:36'),
(15, 'Tes Lagi Penelitian', 2, '2021-06-30', '2021-06-02', '2021-06-05', 77, 'terima', NULL, '2021-07-14', '2021-07-02', '2021-06-30 06:08:38', '2021-07-01 10:02:30'),
(16, 'Penelitian Coba Coba', 1, '2021-06-30', '2021-06-01', '2021-06-30', 77, 'terima', NULL, '2021-07-14', '2021-07-02', '2021-06-30 07:39:43', '2021-07-01 07:57:14'),
(17, 'aaa', 1, '2021-07-02', '2021-07-02', '2021-07-24', 77, 'Menunggu Admin', NULL, NULL, NULL, '2021-07-02 03:02:11', '2021-07-02 03:02:11'),
(18, 'aaa', 1, '2021-07-02', '2021-07-02', '2021-07-17', 77, 'terima', NULL, '2021-07-16', '2021-07-03', '2021-07-02 03:04:22', '2021-07-02 03:06:27'),
(19, 'aaa', 1, '2021-07-02', '2021-07-02', '2021-07-16', 77, 'terima', NULL, '2021-07-16', '2021-07-03', '2021-07-02 03:11:53', '2021-07-02 03:13:16'),
(20, 'Internal Coba', 2, '2021-07-02', '2021-07-01', '2021-07-24', 77, 'Menunggu Kasi', NULL, '2021-07-16', '2021-07-03', '2021-07-02 03:38:27', '2021-07-02 03:41:11'),
(21, 'Coba lagi', 2, '2021-07-02', '2021-07-01', '2021-07-17', 77, 'Menunggu Kasi', NULL, '2021-07-16', NULL, '2021-07-02 03:45:28', '2021-07-02 03:45:44'),
(22, 'Penelitian Mojokerto', 2, '2021-07-02', '2021-07-01', '2021-07-16', 77, 'Menunggu Kasi', NULL, '2021-07-16', '2021-07-03', '2021-07-02 03:47:13', '2021-07-02 03:47:22'),
(23, 'aass', NULL, '2021-07-02', '0000-00-00', NULL, 60, 'terima', NULL, '2021-07-02', '2021-07-02', '2021-07-02 08:27:41', '2021-07-02 08:27:41'),
(24, 'aaas', NULL, '2021-07-02', NULL, NULL, 60, 'terima', NULL, '2021-07-02', '2021-07-02', '2021-07-02 08:28:32', '2021-07-02 08:28:32'),
(25, 'ssss', NULL, '2021-07-02', NULL, NULL, 60, 'terima', NULL, '2021-07-02', '2021-07-02', '2021-07-02 08:29:35', '2021-07-02 08:29:35'),
(26, 'awww', NULL, '2021-07-02', NULL, NULL, 60, 'terima', NULL, '2021-07-02', '2021-07-02', '2021-07-02 08:36:00', '2021-07-02 08:36:00'),
(27, 'asss', NULL, '2021-07-02', NULL, NULL, 60, 'terima', NULL, '2021-07-02', '2021-07-02', '2021-07-02 08:37:19', '2021-07-02 08:37:19'),
(28, 'Penelitian Pengunjung Puskesmas', NULL, '2021-07-02', '2021-07-02', '2021-07-02', 60, 'terima', NULL, '2021-07-02', '2021-07-02', '2021-07-02 08:42:14', '2021-07-02 08:42:14'),
(29, 'testing', NULL, '2021-07-02', '2021-07-02', '2021-07-02', 78, 'terima', NULL, '2021-07-02', '2021-07-02', '2021-07-02 09:10:25', '2021-07-02 09:10:25'),
(30, 'hei', NULL, '2021-07-02', '2021-07-02', '2021-07-02', 78, 'terima', NULL, '2021-07-02', '2021-07-02', '2021-07-02 09:39:12', '2021-07-02 09:39:12'),
(31, 'sebuah', NULL, '2021-07-02', '2021-06-01', '2021-06-01', 78, 'terima', NULL, '2021-07-02', '2021-07-02', '2021-07-02 09:44:04', '2021-07-02 09:44:04'),
(32, 'jadi', NULL, '2021-07-02', '2021-06-01', '2021-07-01', 78, 'terima', NULL, '2021-07-02', '2021-07-02', '2021-07-02 09:45:42', '2021-07-02 09:45:42'),
(33, 'sebuah judul', NULL, '2021-07-05', '2021-05-01', '2021-07-01', 78, 'terima', NULL, '2021-07-05', '2021-07-05', '2021-07-05 07:27:08', '2021-07-05 07:27:08'),
(34, 'judulnya', 1, '2021-07-05', '2021-06-01', '2021-07-01', 80, 'terima', NULL, '2021-07-19', '2021-07-06', '2021-07-05 07:48:21', '2021-07-05 07:51:02'),
(35, 'test', 1, '2021-07-05', '2021-03-02', '2021-07-02', 80, 'terima', NULL, '2021-07-19', '2021-07-06', '2021-07-05 08:14:13', '2021-07-05 08:22:54'),
(36, 'Penelitian Informatika Kesehatan', NULL, '2021-07-06', '2021-03-01', '2021-06-30', 81, 'terima', NULL, '2021-07-06', '2021-07-06', '2021-07-06 05:07:32', '2021-07-06 05:07:32'),
(37, 'Penelitian Sumber Daya', 2, '2021-07-07', '2021-07-01', '2021-08-31', 85, 'terima', NULL, '2021-07-21', '2021-07-08', '2021-07-07 07:26:40', '2021-07-07 07:29:33'),
(38, 'Tes Judul', NULL, '2021-07-08', '2021-07-01', '2021-07-08', 89, 'terima', NULL, '2021-07-08', '2021-07-08', '2021-07-08 03:03:24', '2021-07-08 03:03:24'),
(39, 'Penelitian Puskesmas Tarik', 1, '2021-07-08', '2021-05-01', '2021-07-01', 87, 'Menunggu Admin', NULL, NULL, '2021-07-09', '2021-07-08 03:26:04', '2021-07-08 03:36:43'),
(40, 'Penelitian Puskesmas Sidoarjo', NULL, '2021-07-08', '2021-06-01', '2021-07-01', 60, 'terima', NULL, '2021-07-08', '2021-07-08', '2021-07-08 04:00:58', '2021-07-08 04:00:58'),
(41, 'Penelitian di Puskesmas', NULL, '2021-07-08', '2021-05-01', '2021-07-01', 60, 'terima', NULL, '2021-07-08', '2021-07-08', '2021-07-08 04:43:40', '2021-07-08 04:43:40'),
(42, 'Tes Penelitian', 1, '2021-07-08', '2021-07-01', '2021-07-08', 90, 'terima', NULL, '2021-07-22', '2021-07-09', '2021-07-08 04:50:47', '2021-07-08 04:53:24'),
(43, 'testes', 1, '2021-07-08', '2021-05-01', '2021-07-01', 91, 'terima', NULL, '2021-07-22', '2021-07-09', '2021-07-08 08:25:18', '2021-07-08 08:46:18'),
(44, 'Penilitian Testing', 1, '2021-07-12', '2021-07-01', '2021-07-15', 92, 'terima', NULL, '2021-07-26', '2021-07-13', '2021-07-12 04:24:36', '2021-07-12 04:28:39'),
(45, 'Judul Penelitian Testing 1', 1, '2021-07-12', '2021-07-01', '2021-07-12', 92, 'Menunggu Admin', NULL, NULL, '2021-07-13', '2021-07-12 06:17:29', '2021-07-12 06:17:54'),
(46, 'Testing Ges', 1, '2021-07-12', '2021-07-01', '2021-07-12', 92, 'terima', NULL, '2021-07-26', '2021-07-13', '2021-07-12 06:20:55', '2021-07-12 06:31:53'),
(47, 'testing', NULL, '2021-07-12', '2021-05-05', '2021-07-05', 60, 'terima', NULL, '2021-07-12', '2021-07-12', '2021-07-12 07:27:49', '2021-07-12 07:27:49'),
(48, 'Testing Tolak', 1, '2021-07-12', '2021-07-01', '2021-07-12', 92, 'terima', NULL, '2021-07-26', '2021-07-13', '2021-07-12 08:14:17', '2021-07-12 08:24:15'),
(52, 'testes', NULL, '2021-07-14', '2021-06-01', '2021-07-01', 60, 'terima', NULL, '2021-07-14', '2021-07-14', '2021-07-14 08:59:02', '2021-07-14 08:59:02'),
(53, 'tess', NULL, '2021-07-14', '2021-06-01', '2021-07-01', 60, 'terima', NULL, '2021-07-14', '2021-07-14', '2021-07-14 09:29:15', '2021-07-14 09:29:15'),
(54, 'testes', 1, '2021-07-14', '2021-06-01', '2021-07-01', 91, 'Menunggu Admin', NULL, NULL, NULL, '2021-07-14 09:42:07', '2021-07-14 09:42:07'),
(55, 'Tes', NULL, '2021-07-14', '2021-07-01', '2021-07-14', 60, 'terima', NULL, '2021-07-14', '2021-07-14', '2021-07-14 10:03:03', '2021-07-14 10:03:03'),
(56, 'aaaa', NULL, '2021-07-14', '2021-07-01', '2021-07-08', 60, 'terima', NULL, '2021-07-14', '2021-07-14', '2021-07-14 10:14:56', '2021-07-14 10:14:56'),
(57, 'aaa', NULL, '2021-07-14', '2021-07-01', '2021-07-08', 60, 'terima', NULL, '2021-07-14', '2021-07-14', '2021-07-14 10:20:44', '2021-07-14 10:20:44');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_id` int(10) UNSIGNED NOT NULL,
  `salutation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `initials` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikan_terakhir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `affiliation` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `signature` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_orcid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mailing_ads` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirm_reg` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `identify` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_instansi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_kerja` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_identitas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `username`, `password`, `users_id`, `salutation`, `first_name`, `middle_name`, `last_name`, `category`, `initials`, `gender`, `pendidikan_terakhir`, `affiliation`, `signature`, `email`, `id_orcid`, `url`, `phone`, `fax`, `mailing_ads`, `country`, `bio`, `confirm_reg`, `identify`, `image`, `unit_instansi`, `unit_kerja`, `no_identitas`, `created_at`, `updated_at`) VALUES
(2, 'nur', '$2y$10$Sy4cuPmxUOYoEjnNDHFO8.Cgc4G45duo0b0PQdEzVuX1lJXJsYmG2', 4, NULL, 'Nur', 'Fitriani', 'Dwi Putri', 'mhs', NULL, 'female', 'S1 Teknik Informatika', NULL, NULL, 'nurfitrianidp27@gmail.com', NULL, NULL, '083850113997', NULL, '<p>Mojokerto</p>', 'ID', NULL, 'email', NULL, NULL, 'Universitas', NULL, '150411100058', '2020-06-30 04:43:08', '2020-07-20 04:22:48'),
(3, 'nfdp', '$2y$10$ZqcvejSHDUUCMIf3FfSXVO0AWaEeleXxrxAsfHjfu5BHZe7QTovR.', 54, NULL, 'Nur', 'Fitriani', 'D.P', 'pns', NULL, 'female', 'S1 Teknik Informasi', NULL, NULL, '27dziyaur@gmail.com', NULL, NULL, '08385013999', NULL, '<p>Meri ByPass Mojokerto</p>', 'ID', NULL, 'email', NULL, NULL, 'CV. NATUSI', 'Sistem Analis', '150411100058', '2020-07-15 07:17:50', '2020-07-20 07:50:49'),
(4, 'sisi_amalia', '$2y$10$RsivQzZQmtuSx.a0HfEgZu7oZ.XznK4Eew8hi/5M3ttt6ZFRn1xAm', 55, NULL, 'sisi', 'amalia', 'sari', 'mhs', NULL, 'female', 'S1 Fakultas Kesehatan Masyarakat', NULL, NULL, 'sdkdinkes.sidoarjo@gmail.com', NULL, NULL, '8121706884', NULL, '<p>Jl. Mayjen Sungkono No. 46 Sidoarjo</p>', 'ID', NULL, 'email', NULL, NULL, 'Universitas Airlangga Surabaya', NULL, '100411212', '2020-07-29 01:42:43', '2020-07-29 01:42:43'),
(5, 'yana', '$2y$10$axsvemkpzgKCQjA.wLhulegf4hsrIAj7i24oQeBtbQY0x.TRwo5.2', 56, '', 'ayana', 'sarah', 'senja', 'mhs', '', 'female', 'S1 TIK', NULL, NULL, 'rjannah085@gmail.com', NULL, NULL, '085648182003', NULL, 'jalan aja dulu', 'ID', '', 'email', '', NULL, 'brawijaya', NULL, '123456789', '2021-04-20 07:16:36', '2021-04-20 07:16:36'),
(6, 'intanfr', '$2y$10$u2mKHnf3/ji.QsEmfz4d3.Y1em3qKddPtMDw781vBXZ5/Gvtz3CQS', 57, '', 'intan', 'fitri', 'Rachma', 'mhs', '', 'female', 'S1 Kedokteran', NULL, NULL, 'intanfitrir1@gmail.com', NULL, NULL, '085853734010', NULL, 'Jl Soeharto, Surabaya', 'ID', '', 'email', '', NULL, 'Unair', NULL, '212', '2021-04-20 08:12:44', '2021-04-20 08:12:44'),
(7, 'wahyurosamdev', '$2y$10$reDluf7YcnTJmhTMkpnxluXavxwBOuaG7UhQmhBoVjRu0tIOjKF8q', 58, '', 'wahyu', 'rosam', 'hidayat', 'mhs', '', 'male', 'S1 SI', NULL, NULL, 'wahyurosamemail@gmail.com', NULL, NULL, '0881036419106', NULL, 'Mojokerto', 'ID', '', 'email', '', NULL, 'unesa', NULL, '12345', '2021-05-21 03:17:20', '2021-05-21 03:17:20'),
(8, 'Kharisma Adelia', '$2y$10$zGDCGo3wsbsmuWWecUvD8uxaGC1Yqvbt9FrbG36L9ap.Bdg7gHQLK', 59, '', 'kharisma', 'adelia', 'sari', 'mhs', '', 'female', 'D3 Sistem Informasi', NULL, NULL, 'adeliarisma73@gmail.com', NULL, NULL, '085880326499', NULL, 'Jetis Mojokerto', 'ID', '', 'email', '', NULL, 'ub', NULL, '173140914111041', '2021-05-21 03:42:57', '2021-05-21 03:42:57'),
(9, 'risma', '$2y$10$OA/3.OrUMKP24i/eNTTQVuFVbQFTHJVOLw6FKj30EkCUsSfQDhKxW', 60, NULL, 'Risma', 'Adelia', 'S', 'pns', NULL, 'male', 'S1 Sistem Informasi', NULL, NULL, 'kharismadelia11@gmail.com', NULL, NULL, '085880326499', NULL, '<p>mlirip, mojokerto</p>', 'ID', NULL, 'email', NULL, NULL, 'dinas pendidikan', 'pendidikan', '0123456', '2021-06-24 08:05:11', '2021-06-25 07:06:01'),
(10, 'testing1', '$2y$10$Q.jVO4bCdq2pHL8RqVniqOFIi4ZKgc7xt.CZyEYiVYtLIkdPqMF9m', 61, '', 'Testing', 'Sa', 'Tu', 'mhs', '', 'male', 'D1 TI', NULL, NULL, 'testing@gmail.com', NULL, NULL, '088881920123', NULL, 'Jalan Testing', 'ID', '', 'email', '', NULL, 'Tes', NULL, '197218979', '2021-06-28 09:14:34', '2021-06-28 09:14:34'),
(11, 'testing1', '$2y$10$Dzbm2YhSQ6SiORvFoiTPruu50FB9oklU1ndH9tPpY0FMO1CA7OD/G', 62, '', 'Testing', 'Sa', 'Tu', 'mhs', '', 'male', 'D1 TI', NULL, NULL, 'tes@gmail.com', NULL, NULL, '08882717261', NULL, 'eted', 'ID', '', 'email', '', NULL, 'Tes', NULL, '1232', '2021-06-28 09:17:13', '2021-06-28 09:17:13'),
(12, 'teslagi', '$2y$10$zmUzHqPARZSmOJoAlApQHe.cRvZAybyfYMWMWw2QBD1NN1z7ZQYpO', 63, '', 'Tes', 'La', 'Gi', 'mhs', '', 'male', 'D1 TI', NULL, NULL, 'tessa@gmail.com', NULL, NULL, '088827681689', NULL, 'tes', 'ID', '', 'email', '', NULL, 'Tes', NULL, '18972971', '2021-06-28 10:04:09', '2021-06-28 10:04:09'),
(26, 'khafidilhams', '$2y$10$Nt.sOn77Hz3ERgk2b6wADOlLGMLuI0/6.D334y5cYlRcCb46PMDw.', 77, '', 'Khafid', 'Ilham', 'Tes', 'mhs', '', 'male', 'D1 TI', NULL, NULL, 'khafidilham@gmail.com', NULL, NULL, '08179287121', NULL, 'Tes', 'ID', '', 'email', '', NULL, 'Tes', NULL, '97298121', '2021-06-29 03:01:30', '2021-06-29 03:01:30'),
(27, 'testing', '$2y$10$E5wNx7wnlTHFm.YMyDt0fur8SMcw6sjS6siCJ5hrfax0ILwUHbvO2', 78, '', 'tes', 'ting', 'ya', 'pns', '', 'male', 'D2 Sistem Informasi', NULL, NULL, 'cv.natusi@gmail.com', NULL, NULL, '085730476967', NULL, 'mjk', 'ID', '', 'email', '', NULL, 'dinas olahraga', 'umum', '123456789', '2021-07-02 09:09:44', '2021-07-02 09:09:44'),
(29, 'kharisma', '$2y$10$QJdfLQL644Ofo1Eu756D.OeedFzVCkgWBYsllb8CP/eIsOsf0lZkC', 80, NULL, 'khar', 'risma', 'a', 'pns', NULL, 'female', 'D1 Sistem Informasi', NULL, NULL, 'adeliarismaaa73@gmail.com', NULL, NULL, '087702580587', NULL, '<p>mjk</p>', 'ID', NULL, 'email', NULL, NULL, 'dinas pendidikan', 'pendidikan', '123456789', '2021-07-05 07:37:59', '2021-07-05 08:59:16'),
(30, 'nayana', '$2y$10$2eeSuQHuumcm.QDALgb1keYRB5VpfPLBBo5Us6k8r/gKagCHhMB1a', 81, '', 'Na', '', 'Yana', 'pns', '', 'male', 'S1 Teknik Informatika Kesehatan', NULL, NULL, 'rjannahyuta@outlook.com', NULL, NULL, '085730476967', NULL, 'Porong Sidoarjo', 'ID', '', 'email', '', NULL, 'Dinas Kesehatan Sidoarjo', 'Bidang Sumber Daya Kesehatan - Seksi Sumber Daya Manusia Kesehatan', '123456789098765432', '2021-07-06 05:03:48', '2021-07-06 05:03:48'),
(32, 'risma', '$2y$10$yG55BAhSS6AemJBQ0ZQQC.xAmpxQq2P2cVxXu7Ah0KQ.PObE56Uw6', 83, '', 'kharisma', '', 'a', 'pns', '', 'female', 'D3 Sistem Informasi', NULL, NULL, 'adeliarisma73@gmail.com', NULL, NULL, '087702580587', NULL, 'mjk', 'AF', '', 'email', '', NULL, 'dinas pendidikan', 'pendidikan', '1234567891234567899', '2021-07-06 09:51:41', '2021-07-06 09:51:41'),
(33, 'nayuta', '$2y$10$s8mN5NR8lMlq38Xq0BaP0uffEZvNaQxD3b82WsqNhjaE35PZmKJci', 84, '', 'Na', '-', 'Yuta', 'mhs', '', 'male', 'S2 Science and Public Affairs', NULL, NULL, 'yanaselalusukseamin@gmail.com', NULL, NULL, '085730476967', NULL, 'Sidoarjo', 'ID', '', 'email', '', NULL, 'Stanford University', NULL, '170911123481', '2021-07-07 02:02:24', '2021-07-07 02:02:24'),
(34, 'adelia', '$2y$10$q8pFWX6bKYpGP6ClkO7gQu6XyNMqycmFq6iy9f4mIAH2t9qlPG2La', 85, '', 'kharisma', 'adelia', 'sari', 'mhs', '', 'female', 'D3 Sistem Informasi', NULL, NULL, 'kharismadelia11@gmail.com', NULL, NULL, '087702580587', NULL, 'blitar', 'ID', '', 'email', '', NULL, 'ub', NULL, '173140914111041', '2021-07-07 07:21:35', '2021-07-07 07:21:35'),
(35, 'adel', '$2y$10$krLLpBN9XCZzODsDUJGFyOAK7Rxi2qXGoSGbfpiArN0D0/sxUQIJu', 86, '', 'Kharisma', 'Adelia', 'Sari', 'mhs', '', 'female', 'S1 Teknik Informatika', NULL, NULL, 'adeliarisma73@gmail.com', NULL, NULL, '087702580587', NULL, 'mojokerto', 'ID', '', 'email', '', NULL, 'UM', NULL, '20170628', '2021-07-07 09:16:52', '2021-07-07 09:16:52'),
(36, 'adel', '$2y$10$ITalfxJlYLIzxHm3NPm5IutXryWEd7JY0FS84t0C4GVd.PgizI/3C', 87, '', 'Kharisma', 'Adelia', 'Sari', 'mhs', '', 'female', 'S1 Teknik Informatika', NULL, NULL, 'adeliarisma73@gmail.com', NULL, NULL, '087702580587', NULL, 'mojokerto', 'ID', '', 'email', '', NULL, 'UM', NULL, '20170628', '2021-07-07 09:20:24', '2021-07-07 09:20:24'),
(37, 'khafidilhamss', '$2y$10$B9PiZVeTctlA8ZjlkXoPhenLGoWCVKXU8IfPNOuxsSENZlYb2Pfxe', 88, '', 'Khafid', 'Il', 'Ham', 'pns', '', 'male', 'D1 TI', NULL, NULL, 'khafidilhamss@gmail.com', NULL, NULL, '081792619629', NULL, 'Tes alamat', 'ID', '', 'email', '', NULL, 'Tes', 'Tes Unit', '082917892121', '2021-07-08 02:01:21', '2021-07-08 02:01:21'),
(38, 'khafidilhamddd', '$2y$10$jlhLCSHpdtY6u1/xVzhKj.UCtLXRGZtbECNKNZtqihOyCD4H.bERy', 89, '', 'Khafid', 'Il', 'Ham', 'pns', '', 'male', 'D1 TI', NULL, NULL, 'khafidilhamddd@gmail.com', NULL, NULL, '081792619634', NULL, 'Tes alamat', 'ID', '', 'email', '', NULL, 'Tes', 'Tes Unit', '082917892121', '2021-07-08 02:04:26', '2021-07-08 02:04:26'),
(39, 'khafid', '$2y$10$hFcefGbzE8EB5iM5p2EUk.OItx0Spke..7CichoKeY2/f9GU9o33i', 90, '', 'Khafid', 'Il', 'Ham', 'mhs', '', 'male', 'S1 TI', NULL, NULL, 'khafidilhamm@gmail.com', NULL, NULL, '085748143715', NULL, 'tes', 'ID', '', 'email', '', NULL, 'Tes', NULL, '082917892121', '2021-07-08 04:49:31', '2021-07-08 04:49:31'),
(40, 'kharisma', '$2y$10$DAlcNUh1bf/Y1Y3ysYJb9.VWDYPz.RfgpXvCrb8XFhf7K6ly7emcK', 91, '', 'kha', 'ris', 'ma', 'mhs', '', 'female', 'D3 Sistem Informasi', NULL, NULL, 'kharismadelia11@gmail.com', NULL, NULL, '087702580587', NULL, 'mjk', 'ID', '', 'email', '', NULL, 'UM', NULL, '123456789', '2021-07-08 07:32:58', '2021-07-08 07:32:58'),
(41, 'khafidilham', '$2y$10$iv5fl77ji.x./4Jr9Qod6Oa6M7KN4vb1owt7p3xWWwzGGDKwJYYPq', 92, '', 'Kha', 'Fid', 'Ilham', 'mhs', '', 'male', 'S1 TI', NULL, NULL, 'khafidilham@gmail.com', NULL, NULL, '085850025130', NULL, 'Testing', 'ID', '', 'email', '', NULL, 'Univ Testing', NULL, '129892891', '2021-07-12 04:22:27', '2021-07-12 04:22:27');

-- --------------------------------------------------------

--
-- Table structure for table `reviewers`
--

CREATE TABLE `reviewers` (
  `id` int(10) UNSIGNED NOT NULL,
  `submission_id` int(10) UNSIGNED NOT NULL,
  `users_id` int(10) UNSIGNED NOT NULL,
  `file_sub` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `submissions`
--

CREATE TABLE `submissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `users_id` int(10) UNSIGNED NOT NULL,
  `comments` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `permohonan_id` int(10) UNSIGNED NOT NULL,
  `file_submission` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `original_filename` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `abstract` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agencies` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `references` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supplementaries`
--

CREATE TABLE `supplementaries` (
  `id` int(10) UNSIGNED NOT NULL,
  `submission_id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `creator` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publisher` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agencies` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tempat_penelitian`
--

CREATE TABLE `tempat_penelitian` (
  `id_tempat_penelitian` int(11) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `nama_tempat` varchar(255) NOT NULL,
  `parrent_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tempat_penelitian`
--

INSERT INTO `tempat_penelitian` (`id_tempat_penelitian`, `kategori`, `nama_tempat`, `parrent_id`, `created_at`, `updated_at`) VALUES
(1, 'Internal', 'Sekretariat - Sub Bagian TU dan Kepegawaian', 1, '2020-06-30 04:55:57', '2020-06-30 04:55:57'),
(2, 'Internal', 'Sekretariat - Sub Bagian Perencanaan dan Pelaporan', 1, '2020-06-30 04:57:17', '2020-06-30 04:57:17'),
(3, 'Internal', 'Sekretariat - Sub Bagian Keuangan', 1, '2020-06-30 04:58:05', '2020-06-30 04:58:05'),
(4, 'Internal', 'Bidang Sumber Daya Kesehatan - Seksi Sumber Daya Manusia Kesehatan', 1, '2020-06-30 04:59:11', '2020-06-30 04:59:11'),
(5, 'Internal', 'Bidang Sumber Daya Kesehatan - Seksi Alat Kesehatan', 1, '2020-06-30 04:59:47', '2020-06-30 04:59:47'),
(6, 'Internal', 'Bidang Sumber Daya Kesehatan - Seksi Kefarmasian', 1, '2020-06-30 05:00:25', '2020-06-30 05:00:25'),
(7, 'Internal', 'Bidang Kesehatan Masyarakat - Seksi Kesehatan Kerja, Kesehatan Lingkungan dan Olahraga', 1, '2020-06-30 05:01:14', '2020-06-30 05:01:14'),
(8, 'Internal', 'Bidang Kesehatan Masyarakat - Seksi Kesehatan Keluarga dan Gizi', 1, '2020-06-30 05:01:58', '2020-06-30 05:01:58'),
(9, 'Internal', 'Bidang Kesehatan Masyarakat - Seksi Pemberdayaan Kesehatan Masyrakat dan Promosi Kesehatan', 1, '2020-06-30 05:02:40', '2020-06-30 05:02:40'),
(10, 'Internal', 'Bidang Pelayanan Kesehatan - Seksi Pelayanan Kesehatan Primer', 1, '2020-06-30 05:03:16', '2020-06-30 05:03:16'),
(11, 'Internal', 'Bidang Pelayanan Kesehatan - Seksi Pelayanan Kesehatan Rujukan', 1, '2020-06-30 05:04:06', '2020-06-30 05:04:06'),
(12, 'Internal', 'Bidang Pelayanan Kesehatan - Seksi Pelayanan Kesehatan Tradisional', 1, '2020-06-30 05:04:53', '2020-06-30 05:04:53'),
(13, 'Internal', 'Bidang P2P - Seksi P2P Penyakit Menular', 1, '2020-06-30 05:05:24', '2020-06-30 05:05:24'),
(14, 'Internal', 'Bidang P2P - Seksi P2P Penyakit Tidak Menular dan Kesehatan Jiwa', 1, '2020-06-30 05:06:09', '2020-06-30 05:06:09'),
(15, 'Internal', 'Bidang P2P - Seksi Surveilans dan Imunisasi', 1, '2020-06-30 05:06:38', '2020-06-30 05:06:38'),
(16, 'External', 'Puskesmas Sidoarjo', 1, '2020-06-30 05:07:44', '2020-06-30 05:07:44'),
(17, 'External', 'Puskesmas Urangagung', 1, '2020-06-30 05:07:57', '2020-06-30 05:07:57'),
(18, 'External', 'Puskesmas Sekardangan', 1, '2020-06-30 05:08:10', '2020-06-30 05:08:10'),
(19, 'External', 'Puskesmas Buduran', 1, '2020-06-30 05:08:24', '2020-06-30 05:08:24'),
(20, 'External', 'Puskesmas Gedangan', 1, '2020-06-30 05:08:38', '2020-06-30 05:08:38'),
(21, 'External', 'Puskesmas Ganting', 1, '2020-06-30 05:08:50', '2020-06-30 05:08:50'),
(22, 'External', 'Puskesmas Sedati', 1, '2020-06-30 05:09:03', '2020-06-30 05:09:03'),
(23, 'External', 'Puskesmas Taman', 1, '2020-06-30 05:09:16', '2020-06-30 05:09:16'),
(24, 'External', 'Puskesmas Trosobo', 1, '2020-06-30 05:09:30', '2020-06-30 05:09:30'),
(25, 'External', 'Puskesmas Tarik', 1, '2020-06-30 05:09:43', '2020-06-30 05:09:43'),
(26, 'External', 'Puskesmas Balongbendo', 1, '2020-06-30 05:10:01', '2020-06-30 05:10:01'),
(27, 'External', 'Puskesmas Wonoayu', 1, '2020-06-30 05:10:17', '2020-06-30 05:10:17'),
(28, 'External', 'Puskesmas Sukodono', 1, '2020-06-30 05:10:28', '2020-06-30 05:10:28'),
(29, 'External', 'Puskesmas Prambon', 1, '2020-06-30 05:10:40', '2020-06-30 05:10:40'),
(30, 'External', 'Puskesmas Tulangan', 1, '2020-06-30 05:11:01', '2020-06-30 05:11:01'),
(31, 'External', 'Puskesmas Kepadangan', 1, '2020-06-30 05:11:16', '2020-06-30 05:11:16'),
(32, 'External', 'Puskesmas Tanggulangin', 1, '2020-06-30 05:11:34', '2020-06-30 05:11:34'),
(33, 'External', 'Puskesmas Candi', 1, '2020-06-30 05:11:46', '2020-06-30 05:11:46'),
(34, 'External', 'Puskesmas Kedungsolo', 1, '2020-06-30 05:11:59', '2020-06-30 05:11:59'),
(35, 'External', 'Puskesmas Porong', 1, '2020-06-30 05:12:13', '2020-06-30 05:12:13'),
(36, 'External', 'Puskesmas Jabon', 1, '2020-06-30 05:12:26', '2020-06-30 05:12:26'),
(37, 'External', 'Puskesmas Krian', 1, '2020-06-30 05:12:40', '2020-06-30 05:12:40'),
(38, 'External', 'Puskesmas Barengkrajan', 1, '2020-06-30 05:12:57', '2020-06-30 05:12:57'),
(39, 'External', 'Puskesmas Krembung', 1, '2020-06-30 05:13:07', '2020-06-30 05:13:07'),
(40, 'External', 'Puskesmas Waru', 1, '2020-06-30 05:13:24', '2020-06-30 05:13:24'),
(41, 'External', 'Puskesmas Medaeng', 1, '2020-06-30 05:13:35', '2020-06-30 05:13:35'),
(42, 'External', 'UPTD Laboratorium Kesehatan Daerah', 1, '2020-06-30 05:14:02', '2020-06-30 05:14:02'),
(43, 'External', 'UPTD Instalasi Farmasi Kabupaten', 1, '2020-06-30 05:14:17', '2020-06-30 05:14:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_penelitian_id` int(11) DEFAULT NULL,
  `is_banned` int(11) DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `level`, `tempat_penelitian_id`, `is_banned`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'dinkessidoarjo46@gmail.com', '$2y$10$RvXEOXNLUqfdIR2OdHBVY.NDTsCB2wgQHHFQ7b8RP0V5egAaArrdW', '1', 0, 0, 'DVKeyMGYwoMA8DPfIZmM6akj2YdIHtoqEcHtPjrEGB1vJY08DGNOHpA1Gg34', NULL, NULL),
(2, 'kasi', 'kasi@gmail.com', '$2y$10$.Z9FFo.FgmYJmVwwhbT7Ee9roMsZwF5wh4zj16/u4gvbt4WKWPI7O', '2', 0, 0, 'm3LjbAx0wocLrRlvi5BLh6OAf71RxvGg9Rc3PkDeroWsrJfyJ0gQpfoWYmT7', NULL, NULL),
(4, 'nur', 'nurfitrianidp27@gmail.com', '$2y$10$oAVwo2zV7iZJYr.VkCAKVey6hqRGxsHHC4GNCc51qbVaMV8c2R2.e', '3', 0, 0, 'xbt1Uq479Y1bU8CGCEShqum8KX35o1JuXGgrXkuvQZuOLLlEpuceT0j5WNda', NULL, NULL),
(5, 'subbag_tu', 'subbag_tu@gmail.com', '$2y$10$OKVQUjhENqfJzIskGCJqmOd28b/vOUI/PTAeAAcO549RRRiGeDGtC', '6', 1, 0, 'wikW5wmDu3AEET0VJlszM8JR6xKxLXlEKyUH8X2ILBetc0WJDtylKxdWhLEl', NULL, NULL),
(6, 'subbag_perencanaan', 'subbag_perencanaan@gmail.com', '$2y$10$/x/B22lR6CnkuAu4C8oBAuIkTbnmWxTCIVo.bK4AT63A0A4VSE4Ai', '6', 2, 0, 'JHxwKcRKZZqHTb5AG5xZ9mRBG177RIC4daivxsvuMDYbhrbZaW6CLSPlxDjp', NULL, NULL),
(7, 'subbag_keuangan', 'subbag_keuangan@gmail.com', '$2y$10$ojSQZ4mVsHvqq//qG2ElFuT9Yq2orhOrugPREa0jXReSyjgg8XjM2', '6', 3, 0, NULL, NULL, NULL),
(8, 'sdk_sdm', 'sdk_sdm@gmail.com', '$2y$10$ngblmDc2TI44mZzai/z76.0iOgc6cwQ12ZtWEom.GbrGbgb6SXRiS', '6', 4, 0, NULL, NULL, NULL),
(9, 'sdk_alkes', 'sdk_alkes@gmail.com', '$2y$10$nS5m0H32qha7D5h0mnKDletFNYejDBLbEjnMkKRnAo8Zt845F4nHa', '6', 5, 0, NULL, NULL, NULL),
(10, 'sdk_farmasi', 'sdk_farmasi@gmail.com', '$2y$10$HyhP.76HUD5V6bn1hUBrPuloL5X3xe5M0sW410kWiSWp3XUSwYDUG', '6', 6, 0, 'voQ7WTphVGk2nmNJdnsIgO6F4Zew6aynX7QkQGQQMZJQ9ZB01SUM4nnwIeRj', NULL, NULL),
(11, 'kesmas_kesling', 'kesmas_kesling@gmail.com', '$2y$10$B6naiYX.CWDrm.SdDi3C7uI8vS6IT46nHA39uaxh4/8YSnuMEHmIO', '6', 7, 0, NULL, NULL, NULL),
(12, 'kesmas_kesgagizi', 'kesmas_kesgagizi@gmail.com', '$2y$10$cw3uRm48ge1GtjFmuQ7X0urClXEW.6CKF24zBzPnbmPvvmalrF.Li', '6', 8, 0, '3pEdGnqSASkYxVdUz7rO4kM5Hb8HIhj2NRY2LDqO2qfSROxEPx1VoPieautI', NULL, NULL),
(13, 'kesmas_promkes', 'kesmas_promkes@gmail.com', '$2y$10$y/8MffT28wqpSYfnkWE/ieU5l.A7I1eyKgY5IOqp76i0cYp13VEfO', '6', 9, 0, NULL, NULL, NULL),
(14, 'yankes_primer', 'yankes_primer@gmail.com', '$2y$10$A4/bWg64pgOAAYRXlrH9neim6p.Uey6dY6EhoLkFnYxQ/d8cemkZi', '6', 10, 0, NULL, NULL, NULL),
(15, 'yankes_rujukan', 'yankes_rujukan@gmail.com', '$2y$10$hfCuK4t.WPseQ8/zX7Jjsu6pn6bPRBjn7oAVkHo0DSkAPh7tVl53K', '6', 11, 0, NULL, NULL, NULL),
(16, 'yankes_tradisional', 'yankes_tradisional@gmail.com', '$2y$10$afjuhPKOyLfk.mn5fUWwpONPZ4AuTHfqfFN9zJ.FZun4EY2jfkK7C', '6', 12, 0, NULL, NULL, NULL),
(17, 'p2p_menular', 'p2p_menular@gmail.com', '$2y$10$ZEOMnAXHpPU/9kGkcCMAgumjNPY3fdGpGbC7jySKkAuNKMd6FaRV6', '6', 13, 0, NULL, NULL, NULL),
(18, 'p2p_tidakmenular', 'p2p_tidakmenular@gmail.com', '$2y$10$Y5w6uGzvA/07a./y6Tu1J.2btm5roUD2nS6G/8b0WmTnVzACGQcnW', '6', 14, 0, NULL, NULL, NULL),
(19, 'p2p_imunisasi', 'p2p_imunisasi@gmail.com', '$2y$10$JIIwPJ5mZvORuYeuc.mTj.SKnAxBjMFnJCoarj5lz9QGWn5FtF4/.', '6', 15, 0, NULL, NULL, NULL),
(20, 'pkm_sidoarjo', 'pkm_sidoarjo@gmail.com', '$2y$10$LGxKO0dLfMKfuHzVWaUPFuXdcpBCzHVxY83S9StimHea15kIJChJ.', '6', 16, 0, 'V1CXThirjcx3pzc5Ogs01i3Un76MOyV4BmtaVvbE6nxCWkGk4y9QyBCXXYbc', NULL, NULL),
(21, 'pkm_urangagung', 'pkm_urangagung@gmail.com', '$2y$10$5MkJ9TjxrAUrGCygNv6NX.ZQpRDRaOUTozT3l/U.1pLPdWeN4Pf1C', '6', 17, 0, 'eZaYER6ndy0YqRIdKEnPBdl0CaCmaYe9fIAUoKZEFLdV6tu5FS93nsmC6bxs', NULL, NULL),
(22, 'pkm_sekardangan', 'pkm_sekardangan@gmail.com', '$2y$10$3b3igW4oPwkAbb5ouDnQWuxMbdGlhPkJfIVqmEDn0Mbgx74V/A1xi', '6', 18, 0, NULL, NULL, NULL),
(23, 'pkm_buduran', 'pkm_buduran@gmail.com', '$2y$10$rd8vjXEvG2yUYowyRoEbAOAlWmA6J1zkzFuTnvub4bAAHbCjkIRTq', '6', 19, 0, '5RGBgHxWC9dI03vpTz2hZSWqqxmNrOBd00P0cb0ftRcqI9IGLxwp0KkKHCPK', NULL, NULL),
(24, 'pkm_gedangan', 'pkm_gedangan@gmail.com', '$2y$10$1HtB/StmwTM26J72dJlPrOEimczsXhzyvIB51h7GNU0uy.qTKKKa6', '6', 20, 0, '8QxrLWjFJE4ewdDvIOhfrOFqNUCEgYblfjuEUrK3EJ1BQ2U2du88ZjzFKpbA', NULL, NULL),
(25, 'pkm_ganting', 'pkm_ganting@gmail.com', '$2y$10$ZE5Y2wx9OVywbUSh4kEw0OFGCvSFAlKmMNSSB87zpNfPUXXF0n6vm', '6', 21, 0, NULL, NULL, NULL),
(26, 'pkm_sedati', 'pkm_sedati@gmail.com', '$2y$10$GceX3had6h3.YGoTC3405O2XeBRnOi.wQO75S3XuFv5VvRaPltBDm', '6', 22, 0, NULL, NULL, NULL),
(27, 'pkm_taman', 'pkm_taman@gmail.com', '$2y$10$qvgqg2JOFLCQEWHDdZeD5egRqB/k5BBevYvcMkBlmuXrEfafdWROu', '6', 23, 0, NULL, NULL, NULL),
(28, 'pkm_trosobo', 'pkm_trosobo@gmail.com', '$2y$10$4fa/ftIWk7JyVlJLuWQXU.tWnTpAzXrstYRsTFLOnuDmY6HrVyysi', '6', 24, 0, '9LxdDz8CRpgJCBcos4YD5glP2utbh9HGff5O6kHTxbYT6lebHKtTvFlfnX1l', NULL, NULL),
(29, 'pkm_tarik', 'pkm_tarik@gmail.com', '$2y$10$9uCmA9YCBzi7/RXIJ97ideajY/5sUKTNyAhkeV6OsyaZ7empWjtKu', '6', 25, 0, 'fKaBJSc1uvPqKH9bcHcepmTBrjdNGESs0YHWcTaqRSwYfDPkJlZCkNKfu0Uk', NULL, NULL),
(30, 'pkm_balongbendo', 'pkm_balongbendo@gmail.com', '$2y$10$JUOy9acSX6TA4hqDRQJPber9Kcr7vVwKWwixymruVPWATTCPKtBse', '6', 26, 0, NULL, NULL, NULL),
(31, 'pkm_wonoayu', 'pkm_wonoayu@gmail.com', '$2y$10$0LNkeMyj1Bewv9h7yNL/9Os26ozavENqK33.nMmqOXKF094Nimaxe', '6', 27, 0, NULL, NULL, NULL),
(32, 'pkm_sukodono', 'pkm_sukodono@gmail.com', '$2y$10$8bPksEm.zkhkHgjybx/Pb.S0h3MhedsnLRUyr8ZzHxqRGnmKL0kLy', '6', 28, 0, NULL, NULL, NULL),
(33, 'pkm_prambon', 'pkm_prambon@gmail.com', '$2y$10$RmSXrv7PSNb1sg7zM5S9o.Qj0w7glwWfvHd7gFWi1QeaY0u6gKkda', '6', 29, 0, NULL, NULL, NULL),
(34, 'pkm_tulangan', 'pkm_tulangan@gmail.com', '$2y$10$qN7CP7cBhys4O1lAcFyJ2.mME.sv.9vMLFf/BI0WQyg1qHUJCL4NO', '6', 30, 0, NULL, NULL, NULL),
(35, 'pkm_kepadangan', 'pkm_kepadangan@gmail.com', '$2y$10$a8TmsQSOHka8UmhXKsaodOcatnxrIdqcDl7FIu0EVMsKsC3.fASCy', '6', 31, 0, NULL, NULL, NULL),
(36, 'pkm_tanggulangin', 'pkm_tanggulangin@gmail.com', '$2y$10$oybGdhrCLZnG6kVM6C5ZgORpgNOcoucdyu4yuU//S/H6bF2NCewue', '6', 32, 0, NULL, NULL, NULL),
(37, 'pkm_candi', 'pkm_candi@gmail.com', '$2y$10$IuU1tZGDZ/PwihwoYrlvTeaPSI70KFbSkan4wXE.ApUpHi6icgm.K', '6', 33, 0, 'vLLvn5M7sEzedqN0oNPFd2Yp7QvpJsIyovbLknwOk5jqMXJrfHdRUQosv7h6', NULL, NULL),
(38, 'pkm_kedungsolo', 'pkm_kedungsolo@gmail.com', '$2y$10$ZD/Emjiom.eMAbUJazF6buLASj4/nlV1hlGrJUtmDBLRazk1M0sfG', '6', 34, 0, 'QvWjArixDqJZSM0GAfBmICZUR47IYWh07lN6Tem1SXjYbgXV4iu2crzbkAMe', NULL, NULL),
(39, 'pkm_porong', 'pkm_porong@gmail.com', '$2y$10$0zdP1IceGzDFzeUYPV9dJ.zOrHk6pq7zt9hIuIe99O11RHgPccQRe', '6', 35, 0, NULL, NULL, NULL),
(40, 'pkm_jabon', 'pkm_jabon@gmail.com', '$2y$10$7BEW5IWsgAiXYu.PUB14/uN3dH510HFm.Foj5pjiNcpZR3sftk2Sm', '6', 36, 0, NULL, NULL, NULL),
(41, 'pkm_krian', 'pkm_krian@gmail.com', '$2y$10$MX9/htZNRienHZFj3.rkcuhxEHkAE5Wu4qh1k924wIS9n1RkaES/u', '6', 37, 0, 'ql3ilag91p9hob2RjWJufaCBnTuJBpGc7R7glqIzvwkuDmnzpFvSdbx2aVcW', NULL, NULL),
(42, 'pkm_barengkrajan', 'pkm_barengkrajan@gmail.com', '$2y$10$Nq.Uq/T6ubp/.qtzwaUYjubswGd6XCEiwcMk4rM6r.NnLLS5jfER2', '6', 38, 0, 'v1iiJiZzT9e62vOYuAzWFAq0wZvIWSuX5eMDcMNFLbwpvBvHvHflVjr9tnwM', NULL, NULL),
(43, 'pkm_krembung', 'pkm_krembung@gmail.com', '$2y$10$yfYIaUFkdvGZepfSZ2c2juR21n2zWJ9VnZaUAVhsFVuBjycfEStF2', '6', 39, 0, NULL, NULL, NULL),
(44, 'pkm_waru', 'pkm_waru@gmail.com', '$2y$10$7vo4lV51fNIWI84bhnuXX.e/eohrWJ1poGPGCq/bTtDLeeGaSJRDi', '6', 40, 0, NULL, NULL, NULL),
(45, 'pkm_medaeng', 'pkm_medaeng@gmail.com', '$2y$10$.tS7ko1pDKFIDlbeHwDsBepC0UjupiHcp359zeSqtQ1NguDCSFSVS', '6', 41, 0, NULL, NULL, NULL),
(46, 'uptd_laboratorium', 'uptd_laboratorium@gmail.com', '$2y$10$jL0OLhQWQKKFZBheTaUx5uMieW0WqszT5sdKL9jxRwNqMZhxixbLW', '6', 42, 0, NULL, NULL, NULL),
(47, 'uptd_farmasi', 'uptd_farmasi@gmail.com', '$2y$10$.o11.bh4HhfTPVWlL70.5ujtOJX0SVHTfH7IvPmgZmXw5qjPX.uGu', '6', 43, 0, 'BJlyCgJPGRXJqs2WZSqSu8rYibCX9rj3mcLD8F9rZobmIbpHSzONosVgAH9K', NULL, NULL),
(54, 'nfdp', '27dziyaur@gmail.com', '$2y$10$0AoWWmZNQvHe85CT9J8FeuXSEe1O19nGt301hRZWZ2Z5ghlowcdqi', '3', NULL, NULL, 'nIFeIAhZWlrbybgGIwYieqLKYUyJp7MXdNJFR8xCLAi2x2Y8voYASZ7KukRK', '2020-07-15 07:17:50', '2020-07-20 07:50:49'),
(55, 'sisi_amalia', 'sdkdinkes.sidoarjo@gmail.com', '$2y$10$zP.n5oDD3/SpkZER4SnBGOcyqmMD7PZyGuvQzEK6KSdm3SitCWIdu', '3', NULL, NULL, NULL, '2020-07-29 01:42:42', '2020-07-29 01:42:42'),
(56, 'yana', 'rjannah085@gmail.com', '$2y$10$NKilceweJSyXjX0kx.Sm1OpWTA4N/9vfcDSKtBWYyLrITt6SpjNRW', '3', NULL, NULL, 'lbgv6smBnopDrCzeTfBdV0TRXkddqUJ1fkU7dlSiTIjUHSCVZue4HrAses75', '2021-04-20 07:16:36', '2021-04-20 07:16:36'),
(57, 'intanfr', 'intanfitrir1@gmail.com', '$2y$10$ce67DHZnW7Y7cHzSmJ8WaOnFhArOtsQnacTTH6lUOzd9fl4PZZ6l6', '3', NULL, NULL, NULL, '2021-04-20 08:12:43', '2021-04-20 08:12:43'),
(58, 'wahyurosamdev', 'wahyurosamemail@gmail.com', '$2y$10$UpDm7ecYJBVt5AEiF76zu.m0DIo/64gMpPcJXaILJtZX.1hGkwd6y', '3', NULL, NULL, 'KT3SbgrReLJ1mMnsmnGgTZOLVj6iuY9DN5YE7blEXpAHyG6CeXD9egQh7lx3', '2021-05-21 03:17:20', '2021-05-21 03:17:20'),
(59, 'Kharisma Adelia', 'adeliarismaa73@gmail.com', '$2y$10$oH/Vd46rkGdT/ysUF/Fa5.g1gdWDDdmw8g4jyhruD/MI5q4v2dyNS', '3', NULL, NULL, 'a11g2KONrUdpnmOs4hPxs5vTMX1eEaRROsHO2LuaNRZv5jv3QCBOt6uJbe0i', '2021-05-21 03:42:57', '2021-05-21 03:42:57'),
(60, 'risma', 'kharismadeliaa11@gmail.com', '$2y$10$EZM6T57O0vBSIMYs//sU8epBvPKsjDo0mN.JnsuFC1GijLW341Xk6', '3', NULL, NULL, 'ehteRcq5gnKvdewnrsObY3y7pPpst5YnMGoqDae0yNE25XGIjtxZLPmTxIe1', '2021-06-24 08:05:11', '2021-06-24 08:05:11'),
(61, 'testing1', 'testing@gmail.com', '$2y$10$oMjq3X2YLUaBsCbAaBoghON6wmm/VKYn3doDjeifjxmJ5SklmP5wy', '3', NULL, NULL, 'UHkvL4YFPxHT1aYFgQheww4QmcaErG7yaOU18iYhmgAx7nWWk6V9DbbpcezG', '2021-06-28 09:14:34', '2021-06-28 09:14:34'),
(62, 'testing1', 'tes@gmail.com', '$2y$10$ANgDuVpil.cO6Y/kzyD3YeheW5zLRNTWxxcmumq43HdWEmvRjryUm', '3', NULL, NULL, NULL, '2021-06-28 09:17:13', '2021-06-28 09:17:13'),
(63, 'teslagi', 'tessa@gmail.com', '$2y$10$n.SD180cMOCgy0NyKxyzROwiMoXFAfOdrWxYK.eDI9kXcnfePqA7O', '3', NULL, NULL, NULL, '2021-06-28 10:04:09', '2021-06-28 10:04:09'),
(77, 'khafidilhams', 'khafidilhams@gmail.com', '$2y$10$xTaCfzjMo8tf.lGDUvpnYue3IpBgvL2LEDZsy0SjMpPVmvn3.KEpe', '3', NULL, NULL, 'vnu6oG9MBjRRHuNxUrsBwcodQFvD0sk8ed2o3w4JVlM4oohF9Xae4NfFPmOO', '2021-06-29 03:01:30', '2021-06-29 03:01:30'),
(78, 'testing', 'cv.natusi@gmail.com', '$2y$10$GXJer2nHzyLU0SSgaoAu5O9Jg3iLWz2C0jZZDg4DOfRC9L1G5M752', '3', NULL, NULL, '88WNXTs0DoNDyax6JiAl2w1IYTZEkpalg1Crvv12qYRbcokJqnYHTwTlZb93', '2021-07-02 09:09:44', '2021-07-02 09:09:44'),
(80, 'kharisma', 'adeliarismaaa73@gmail.com', '$2y$10$uB2egyyEzIRvuwr8mqbxzuZjthMmFbyH3UFdhnlMf3KGoREoogpQK', '3', NULL, NULL, 'lntekJmb9HDVGMXgErtylknwNmstkrhiQQPF8lv4C5ySj8PV0DGi6I8mapYV', '2021-07-05 07:37:59', '2021-07-05 07:37:59'),
(81, 'nayana', 'rjannahyuta@outlook.com', '$2y$10$M6SJ7wRR.X4UqJEktiAKS..myF.MqRQbxbclfeM9sDDZ.9NviBaCC', '3', NULL, NULL, NULL, '2021-07-06 05:03:48', '2021-07-06 05:03:48'),
(85, 'adelia', 'kharismadelia1111@gmail.com', '$2y$10$KH44Woi5tqvu.FWl/kz4de4g62Gg7rNjbuojeO7E2ALf.600fiKWC', '3', NULL, NULL, '9QlJFxWY6NNPG0GcdRb2Po8aXtGqb1I5Xr0aNh1HEb0qnlIA0s3DEiYCn4vS', '2021-07-07 07:21:35', '2021-07-07 07:21:35'),
(87, 'adel', 'adeliarismaas73@gmail.com', '$2y$10$RKHS9lZdExUyuZSFjgTPMOGrKUpcTE7wtO9NRWIkBrNx8iV35D0UC', '3', NULL, NULL, 'RzwSAhM5YJ3btuTX4dpbjgaRrW7GLdgF53ORayYwSchWHGTov0v41tU10ZxA', '2021-07-07 09:20:24', '2021-07-07 09:20:24'),
(88, 'khafidilhamss', 'khafidilhamss@gmail.com', '$2y$10$hxe98uPb6to/LhL3dMdTx.RIvd8pr3EdgkOoNCoEkJjB4Xkfi6d0m', '3', NULL, NULL, 'mDGbjPYiOFficFdohT0OYVg2TahYu2XgzRmgLWEXfQrhmvO2GSh0curjlKJo', '2021-07-08 02:01:21', '2021-07-08 02:01:21'),
(89, 'khafidilhamddd', 'khafidilhamddd@gmail.com', '$2y$10$657T.g9c3CAezWgb03k7fOcYED4e/5bNNCkWA5cHYjn4plwwbStx.', '3', NULL, NULL, 'coAU6FbwUEHD8g5N68X6wgfiT11TMRxlwAI3Tb6W96eEKzovVoxa2ijPYzzA', '2021-07-08 02:04:26', '2021-07-08 02:04:26'),
(90, 'khafid', 'khafidilhamm@gmail.com', '$2y$10$KXI4AEo5ylpNTrPiM4iLx.uPImHTvgIw4AaF1LHOIQ6oHu8JIen8q', '3', NULL, NULL, 'TNZ5MPuIFvyXbabx2TQkXuehoKFPvGnLu7cBlQBjtVUv3aTyu92UFsvfDS3O', '2021-07-08 04:49:31', '2021-07-08 04:49:31'),
(91, 'kharismaa', 'kharismadelia11@gmail.com', '$2y$10$7GGA1HrN.y2zo79NeVC0/eBYpEwh6d7Esk8WVesx0zNu/uAfl/7DO', '3', NULL, NULL, '1UQKBnmPoxnUWEVRGHbGgqGXEmcOdVgtIPkWqXuf35h5TYQPceyyrOvwyEKR', '2021-07-08 07:32:58', '2021-07-08 07:32:58'),
(92, 'khafidilham', 'khafidilham@gmail.com', '$2y$10$jEPqCr.jd1eF9ggoMQmp0eYTmGr8TDJ.qnZCOxsF7g1FP/0tLl5yi', '3', NULL, NULL, 'fUHtn5GxOeqjHs2Y5gR7No2WT9DKuwUayMsuuePT3EgthN7P30oytMxYJrTN', '2021-07-12 04:22:27', '2021-07-12 04:22:27');

-- --------------------------------------------------------

--
-- Table structure for table `verifikasi_tempat_penelitian`
--

CREATE TABLE `verifikasi_tempat_penelitian` (
  `id_verifikasi_tp` int(11) NOT NULL,
  `permohonan_id` int(11) NOT NULL,
  `tempat_penelitian_id` int(11) NOT NULL,
  `nama_tempat_penelitian` varchar(225) NOT NULL,
  `status_verifikasi` enum('Terima','Tolak','Menunggu') DEFAULT NULL,
  `catatan` varchar(225) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `verifikasi_tempat_penelitian`
--

INSERT INTO `verifikasi_tempat_penelitian` (`id_verifikasi_tp`, `permohonan_id`, `tempat_penelitian_id`, `nama_tempat_penelitian`, `status_verifikasi`, `catatan`, `user_id`) VALUES
(1, 1, 16, 'Puskesmas Sidoarjo', 'Terima', '-', 54),
(2, 1, 20, 'Puskesmas Gedangan', 'Terima', '-', 54),
(3, 2, 1, 'Sekretariat - Sub Bagian TU dan Kepegawaian', 'Menunggu', NULL, 54),
(4, 3, 16, 'Puskesmas Sidoarjo', 'Menunggu', NULL, 54),
(5, 4, 16, 'Puskesmas Sidoarjo', 'Terima', '-', 56),
(6, 4, 17, 'Puskesmas Urangagung', 'Terima', '-', 56),
(7, 5, 16, 'Puskesmas Sidoarjo', 'Terima', '-', 57),
(8, 6, 17, 'Puskesmas Urangagung', 'Terima', '-', 58),
(9, 7, 16, 'Puskesmas Sidoarjo', 'Terima', '-', 58),
(10, 7, 17, 'Puskesmas Urangagung', 'Terima', '-', 58),
(11, 8, 17, 'Puskesmas Urangagung', 'Terima', '-', 59),
(12, 11, 1, 'Sekretariat - Sub Bagian TU dan Kepegawaian', 'Menunggu', NULL, 77),
(13, 12, 9, 'Bidang Kesehatan Masyarakat - Seksi Pemberdayaan Kesehatan Masyrakat dan Promosi Kesehatan', 'Menunggu', NULL, 77),
(14, 13, 42, 'UPTD Laboratorium Kesehatan Daerah', 'Menunggu', NULL, 77),
(15, 14, 17, 'Puskesmas Urangagung', 'Menunggu', NULL, 77),
(16, 15, 1, 'Sekretariat - Sub Bagian TU dan Kepegawaian', 'Menunggu', NULL, 77),
(17, 16, 27, 'Puskesmas Wonoayu', 'Menunggu', NULL, 77),
(18, 18, 16, 'Puskesmas Sidoarjo', 'Menunggu', NULL, 77),
(19, 19, 16, 'Puskesmas Sidoarjo', 'Menunggu', NULL, 77),
(20, 20, 1, 'Sekretariat - Sub Bagian TU dan Kepegawaian', 'Menunggu', NULL, 77),
(21, 21, 1, 'Sekretariat - Sub Bagian TU dan Kepegawaian', 'Menunggu', NULL, 77),
(22, 22, 1, 'Sekretariat - Sub Bagian TU dan Kepegawaian', 'Menunggu', NULL, 77),
(23, 24, 1, 'Sekretariat - Sub Bagian TU dan Kepegawaian', NULL, NULL, 60),
(24, 25, 2, 'Sekretariat - Sub Bagian Perencanaan dan Pelaporan', NULL, NULL, 60),
(25, 26, 3, 'Sekretariat - Sub Bagian Keuangan', NULL, NULL, 60),
(26, 27, 4, 'Bidang Sumber Daya Kesehatan - Seksi Sumber Daya Manusia Kesehatan', NULL, NULL, 60),
(27, 28, 7, 'Bidang Kesehatan Masyarakat - Seksi Kesehatan Kerja, Kesehatan Lingkungan dan Olahraga', NULL, NULL, 60),
(28, 29, 8, 'Bidang Kesehatan Masyarakat - Seksi Kesehatan Keluarga dan Gizi', NULL, NULL, 78),
(29, 30, 1, 'Sekretariat - Sub Bagian TU dan Kepegawaian', NULL, NULL, 78),
(30, 31, 7, 'Bidang Kesehatan Masyarakat - Seksi Kesehatan Kerja, Kesehatan Lingkungan dan Olahraga', NULL, NULL, 78),
(31, 32, 10, 'Bidang Pelayanan Kesehatan - Seksi Pelayanan Kesehatan Primer', NULL, NULL, 78),
(32, 33, 2, 'Sekretariat - Sub Bagian Perencanaan dan Pelaporan', NULL, NULL, 78),
(33, 34, 25, 'Puskesmas Tarik', 'Menunggu', NULL, 80),
(34, 35, 21, 'Puskesmas Ganting', 'Menunggu', NULL, 80),
(35, 36, 8, 'Bidang Kesehatan Masyarakat - Seksi Kesehatan Keluarga dan Gizi', NULL, NULL, 81),
(36, 37, 6, 'Bidang Sumber Daya Kesehatan - Seksi Kefarmasian', 'Menunggu', NULL, 85),
(37, 38, 1, 'Sekretariat - Sub Bagian TU dan Kepegawaian', NULL, NULL, 89),
(38, 39, 25, 'Puskesmas Tarik', 'Menunggu', NULL, 87),
(39, 40, 10, 'Bidang Pelayanan Kesehatan - Seksi Pelayanan Kesehatan Primer', NULL, NULL, 60),
(40, 41, 4, 'Bidang Sumber Daya Kesehatan - Seksi Sumber Daya Manusia Kesehatan', NULL, NULL, 60),
(41, 41, 5, 'Bidang Sumber Daya Kesehatan - Seksi Alat Kesehatan', NULL, NULL, 60),
(42, 42, 42, 'UPTD Laboratorium Kesehatan Daerah', 'Menunggu', NULL, 90),
(43, 43, 16, 'Puskesmas Sidoarjo', 'Menunggu', NULL, 91),
(44, 43, 25, 'Puskesmas Tarik', 'Menunggu', NULL, 91),
(45, 44, 21, 'Puskesmas Ganting', 'Menunggu', NULL, 92),
(46, 45, 27, 'Puskesmas Wonoayu', 'Menunggu', NULL, 92),
(47, 46, 40, 'Puskesmas Waru', 'Menunggu', NULL, 92),
(48, 47, 7, 'Bidang Kesehatan Masyarakat - Seksi Kesehatan Kerja, Kesehatan Lingkungan dan Olahraga', NULL, NULL, 60),
(49, 48, 16, 'Puskesmas Sidoarjo', 'Menunggu', NULL, 92),
(50, 49, 24, 'Puskesmas Trosobo', 'Menunggu', NULL, 92),
(51, 50, 17, 'Puskesmas Urangagung', 'Menunggu', NULL, 91),
(52, 51, 17, 'Puskesmas Urangagung', 'Menunggu', NULL, 91),
(53, 54, 18, 'Puskesmas Sekardangan', 'Menunggu', NULL, 91),
(54, 57, 1, 'Sekretariat - Sub Bagian TU dan Kepegawaian', NULL, NULL, 60),
(55, 57, 18, 'Puskesmas Sekardangan', NULL, NULL, 60);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author_submits`
--
ALTER TABLE `author_submits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bahasa`
--
ALTER TABLE `bahasa`
  ADD PRIMARY KEY (`id_bahasa`);

--
-- Indexes for table `doc_hasil`
--
ALTER TABLE `doc_hasil`
  ADD PRIMARY KEY (`id_doc_hasil`);

--
-- Indexes for table `doc_pendukung`
--
ALTER TABLE `doc_pendukung`
  ADD PRIMARY KEY (`id_file`);

--
-- Indexes for table `hasil_penelitian`
--
ALTER TABLE `hasil_penelitian`
  ADD PRIMARY KEY (`id_hasil_penelitian`);

--
-- Indexes for table `identitas`
--
ALTER TABLE `identitas`
  ADD PRIMARY KEY (`id_identitas`);

--
-- Indexes for table `item_permohonan`
--
ALTER TABLE `item_permohonan`
  ADD PRIMARY KEY (`id_item_permohonan`);

--
-- Indexes for table `jenis_file_pendukung`
--
ALTER TABLE `jenis_file_pendukung`
  ADD PRIMARY KEY (`id_jenis_file`);

--
-- Indexes for table `jenis_hasil`
--
ALTER TABLE `jenis_hasil`
  ADD PRIMARY KEY (`id_jenis_hasil`);

--
-- Indexes for table `jenis_penelitian`
--
ALTER TABLE `jenis_penelitian`
  ADD PRIMARY KEY (`id_jenis_penelitian`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indexes for table `lembar_konfirmasi`
--
ALTER TABLE `lembar_konfirmasi`
  ADD PRIMARY KEY (`id_lembar`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permohonan`
--
ALTER TABLE `permohonan`
  ADD PRIMARY KEY (`id_permohonan`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviewers`
--
ALTER TABLE `reviewers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submissions`
--
ALTER TABLE `submissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplementaries`
--
ALTER TABLE `supplementaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tempat_penelitian`
--
ALTER TABLE `tempat_penelitian`
  ADD PRIMARY KEY (`id_tempat_penelitian`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `verifikasi_tempat_penelitian`
--
ALTER TABLE `verifikasi_tempat_penelitian`
  ADD PRIMARY KEY (`id_verifikasi_tp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author_submits`
--
ALTER TABLE `author_submits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bahasa`
--
ALTER TABLE `bahasa`
  MODIFY `id_bahasa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `doc_hasil`
--
ALTER TABLE `doc_hasil`
  MODIFY `id_doc_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `doc_pendukung`
--
ALTER TABLE `doc_pendukung`
  MODIFY `id_file` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hasil_penelitian`
--
ALTER TABLE `hasil_penelitian`
  MODIFY `id_hasil_penelitian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `identitas`
--
ALTER TABLE `identitas`
  MODIFY `id_identitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `item_permohonan`
--
ALTER TABLE `item_permohonan`
  MODIFY `id_item_permohonan` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `jenis_file_pendukung`
--
ALTER TABLE `jenis_file_pendukung`
  MODIFY `id_jenis_file` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jenis_hasil`
--
ALTER TABLE `jenis_hasil`
  MODIFY `id_jenis_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jenis_penelitian`
--
ALTER TABLE `jenis_penelitian`
  MODIFY `id_jenis_penelitian` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lembar_konfirmasi`
--
ALTER TABLE `lembar_konfirmasi`
  MODIFY `id_lembar` tinyint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=319;

--
-- AUTO_INCREMENT for table `permohonan`
--
ALTER TABLE `permohonan`
  MODIFY `id_permohonan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `reviewers`
--
ALTER TABLE `reviewers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `submissions`
--
ALTER TABLE `submissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplementaries`
--
ALTER TABLE `supplementaries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tempat_penelitian`
--
ALTER TABLE `tempat_penelitian`
  MODIFY `id_tempat_penelitian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `verifikasi_tempat_penelitian`
--
ALTER TABLE `verifikasi_tempat_penelitian`
  MODIFY `id_verifikasi_tp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
