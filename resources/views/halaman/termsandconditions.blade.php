@extends('layouts.app_out')

@section('content')

<main id="main" class="space">
    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-md-12 m-2">
                    <div class="row " data-aos="fade-up" data-aos-delay="400">
                        <div class="form-group">

                            <h5>SYARAT DAN KETENTUAN</h5>
                            <br>
                            <ol class="small">
                                <div class="form-group">
                                    <p class="font-weight-bold mt-3">Keamanan, Akun, Saldo Penghasilan, Password dan
                                        Saldo Refund</p>
                                </div>
                                <li>Pengguna dengan ini menyatakan bahwa pengguna adalah orang yang cakap dan mampu
                                    untuk mengikatkan dirinya dalam sebuah perjanjian yang sah menurut hukum.</li>
                                <li>Goporodisa tidak memungut biaya pendaftaran kepada Pengguna.</li>
                                <li>Pengguna memahami bahwa 1 (satu) nomor telepon hanya dapat digunakan untuk
                                    mendaftar 1 (satu) akun Pengguna Goporodisa, kecuali bagi Pengguna yang telah
                                    memiliki beberapa akun dengan 1 (satu) nomor telepon sebelumnya.</li>
                                <li>Pengguna yang telah mendaftar berhak bertindak sebagai:</li>
                                <ul>
                                    <li>Pembeli</li>
                                    <li>Penjual, dengan memanfaatkan layanan buka toko.</li>
                                </ul>
                                <li>Pengguna yang akan bertindak sebagai Penjual diwajibkan memilih pilihan
                                    menggunakan layanan buka toko. Setelah menggunakan layanan buka toko, Pengguna
                                    berhak melakukan pengaturan terhadap item-item yang akan diperdagangkan di
                                    etalase pribadi Pengguna.</li>
                                <li>Pengguna yang telah melakukan tindakan buka toko diharapkan mengunggah konten
                                    produk yang akan diperdagangkan dalam jangka waktu 90 (sembilan puluh) hari
                                    kalender setelah toko berhasil dibuka. Apabila dalam jangka waktu 90 (sembilan
                                    puluh) hari kalender Pengguna masih tidak mengunggah konten produk, maka
                                    Pengguna menyetujui dan memahami bahwa Goporodisa berhak untuk melakukan
                                    moderasi dan/atau penutupan toko tanpa pemberitahuan sebelumnya.</li>
                                <li>Goporodisa tanpa pemberitahuan terlebih dahulu kepada Pengguna, memiliki
                                    kewenangan untuk melakukan tindakan yang perlu atas setiap dugaan pelanggaran
                                    atau pelanggaran Syarat & ketentuan dan/atau hukum yang berlaku, yakni tindakan
                                    berupa memindahkan Barang ke gudang, penghapusan Barang, moderasi toko,
                                    penutupan toko, pembatalan listing, suspensi akun, dan/atau penghapusan akun
                                    pengguna.</li>
                                <li>Goporodisa memiliki kewenangan untuk menutup toko atau akun Pengguna baik
                                    sementara maupun permanen apabila didapati adanya tindakan kecurangan dalam
                                    bertransaksi, pelanggaran terhadap Syarat dan Ketentuan Goporodisa, termasuk
                                    namun tidak terbatas pada Kebijakan Penalti Pengguna menyetujui bahwa Go
                                    Porodisa berhak melakukan tindakan lain yang diperlukan terkait hal tersebut,
                                    termasuk namun tidak terbatas pada menolak pengajuan pembukaan toko yang baru
                                    apabila ditemukan kesamaan data.</li>
                                <li>Pengguna memahami dan menyetujui untuk tidak menggunakan, memodifikasi,
                                    membongkar, melakukan kegiatan penggandaan, menjual kembali dan/atau kegiatan
                                    mengeksploitasi lainnya pada sistem perangkat lunak atau perangkat keras,
                                    jaringan dan/atau data Situs/Aplikasi dengan teknologi otomatis atau manual
                                    tanpa adanya izin dari Goporodisa.</li>
                                <li>Pengguna menyetujui untuk tidak menggunakan dan/atau mengakses sistem Goporodisa
                                    secara langsung atau tidak langsung baik keseluruhan atau sebagian dengan virus,
                                    perangkat lunak, atau teknologi lainnya yang dapat mengakibatkan melemahkan,
                                    merusak,
                                    mengganggu atau menghambat, membatasi dan/atau mengambil alih fungsionalitas serta
                                    integritas dari sistem perangkat lunak atau perangkat keras, jaringan, dan/atau data
                                    pada Situs/Aplikasi Goporodisa.</li>
                                <li>Pengguna dilarang untuk menciptakan dan/atau menggunakan perangkat keras/lunak/fitur
                                    dan/atau alat lainnya, termasuk namun tidak terbatas pada emulator, robot, macro,
                                    crawler dan/atau perangkat otomatis yang bertujuan untuk mengakses atau menggunakan
                                    layanan pada sistem Goporodisa, seperti namun tidak terbatas pada : (i) manipulasi
                                    data
                                    Toko; (ii) membuat banyak akun; (iii) memanipulasi perangkat yang bertujuan untuk
                                    merugikan Goporodisa; (iv) kegiatan perambanan (crawling/scraping) atau penyalinan
                                    konten; (v) kegiatan otomatisasi dalam transaksi, jual beli, promosi,dan lain
                                    sebagainya; (vi) penambahan produk ke etalase; (vii) mengumpulkan (harvest) atau
                                    mencuri
                                    data pengguna; (viii) melakukan spamming, mengirimkan komunikasi elektronik dalam
                                    jumlah
                                    besar, mengirimkan surat berantai; dan/atau (ix) aktivitas lain yang secara wajar
                                    dapat
                                    dinilai sebagai tindakan manipulasi layanan dan sistem.</li>
                                <li>Goporodisa memiliki kewenangan untuk melakukan penyesuaian jumlah transaksi toko,
                                    penyesuaian jumlah reputasi, dan/atau melakukan proses moderasi/menutup akun
                                    Pengguna,
                                    jika diketahui atau diduga adanya kecurangan oleh Pengguna yang bertujuan
                                    memanipulasi
                                    data transaksi Pengguna demi meningkatkan reputasi toko (review dan atau jumlah
                                    transaksi). Contohnya adalah melakukan proses belanja ke toko sendiri dengan
                                    menggunakan
                                    akun pribadi atau akun pribadi lainnya.</li>
                                <li>Saldo Refund berasal dari pengembalian dana transaksi (refund) pembelian Barang,
                                    produk digital, dan/atau produk keuangan di Situs Goporodisa dan tidak bisa
                                    dilakukan
                                    penambahan secara sendiri (top up).</li>
                                <li>Saldo Refund dapat digunakan sebagai salah satu metode pembayaran atas transaksi
                                    pembelian Barang, produk digital, dan/atau produk investasi di Situs Goporodisa,
                                    dan
                                    dapat dilakukan penarikan dana (withdrawal) ke rekening bank yang terdaftar pada
                                    akun
                                    Pengguna.</li>
                                <li>Saldo Penghasilan hanya berasal dari hasil penjualan Barang, produk investasi,
                                    dan/atau komisi affiliate pada Situs Goporodisa dan tidak bisa dilakukan penambahan
                                    secara sendiri (top up).
                                    16. Saldo Penghasilan hanya dapat dilakukan penarikan dana (withdrawal) ke rekening
                                    bank
                                    yang terdaftar pada akun Pengguna, dan tidak dapat digunakan sebagai metode
                                    pembayaran
                                    atas transaksi pembelian Barang, produk digital, dan/atau produk investasi di Situs
                                    Go
                                    Porodisa, namun dapat digunakan untuk fitur-fitur berlangganan yang membantu
                                    Penjual,
                                    seperti TopAds atau promo cashback toko.</li>
                                <li>Goporodisa memiliki kewenangan untuk melakukan pembekuan Saldo Refund dan Saldo
                                    Penghasilan Pengguna apabila ditemukan / diduga adanya tindak kecurangan dalam
                                    bertransaksi dan/atau pelanggaran terhadap syarat dan ketentuan Goporodisa.
                                    18. Penjual dilarang melakukan duplikasi toko, duplikasi produk, atau
                                    tindakan-tindakan
                                    lain yang dapat diindikasikan sebagai usaha persaingan tidak sehat.</li>
                                <li>Pengguna memiliki hak untuk melakukan perubahan nama toko dan/atau domain toko
                                    sesuai dengan kebijakan yang ditentukan oleh Goporodisa. Pengguna harus memastikan
                                    bahwa perubahan pada nama toko dan/atau domain toko telah sesuai dengan yang
                                    diinginkan
                                    dan Pengguna bertanggung jawab secara pribadi atas perubahan nama toko dan/atau
                                    domain
                                    toko yang dilakukan oleh Pengguna. Pengguna menyetujui bahwa setiap perikatan dan
                                    tindakan hukum yang terjadi sebelum perubahan nama toko dan/atau domain toko tetap
                                    mengikat Pengguna.</li>
                                <li>Pengguna memiliki hak untuk melakukan perubahan pada nama akun sebanyak jumlah
                                    kesempatan yang disediakan dan Goporodisa berhak merubah jumlah kesempatan
                                    perubahan
                                    pada nama akun. Pengguna harus memastikan bahwa perubahan pada nama akun telah
                                    sesuai
                                    dengan yang diinginkan dan bertanggung jawab secara pribadi atas perubahan nama akun
                                    yang dilakukan oleh Pengguna. Pengguna menyetujui bahwa setiap perikatan yang
                                    terjadi
                                    sebelum perubahan nama tetap mengikat Pengguna.</li>
                                <li>Pengguna bertanggung jawab secara pribadi untuk menjaga kerahasiaan akun dan
                                    password untuk semua aktivitas yang terjadi dalam akun Pengguna.</li>
                                <li>Goporodisa tidak akan meminta username, password maupun kode SMS verifikasi atau
                                    kode OTP milik akun Pengguna untuk alasan apapun, oleh karena itu Goporodisa
                                    menghimbau
                                    Pengguna agar tidak memberikan data tersebut maupun data penting lainnya kepada
                                    pihak
                                    yang mengatasnamakan Goporodisa atau pihak lain yang tidak dapat dijamin
                                    keamanannya.
                                    23. Pengguna setuju untuk memastikan bahwa Pengguna keluar dari akun di akhir setiap
                                    sesi dan memberitahu Goporodisa jika ada penggunaan tanpa izin atas sandi atau akun
                                    Pengguna.</li>
                                <li>Pengguna dengan ini menyatakan bahwa Goporodisa tidak bertanggung jawab atas
                                    kerugian ataupun kendala yang timbul atas penyalahgunaan akun Pengguna yang
                                    diakibatkan
                                    oleh kelalaian Pengguna, termasuk namun tidak terbatas pada menyetujui dan/atau
                                    memberikan akses masuk akun yang dikirimkan oleh Goporodisa melalui pesan
                                    notifikasi
                                    kepada pihak lain melalui perangkat Pengguna, meminjamkan akun kepada pihak lain,
                                    mengakses link atau tautan yang diberikan oleh pihak lain, memberikan atau
                                    memperlihatkan kode verifikasi (OTP), password atau email kepada pihak lain, maupun
                                    kelalaian Pengguna lainnya yang mengakibatkan kerugian ataupun kendala pada akun
                                    Pengguna.</li>
                                <li>Pengguna memahami dan menyetujui bahwa untuk mempergunakan fasilitas keamanan one
                                    time password (OTP) maka penyedia jasa telekomunikasi terkait dapat sewaktu-waktu
                                    mengenakan biaya kepada Pengguna dengan nominal sebagai berikut (i) Rp 500 ditambah
                                    pajak 10% untuk Indosat, Tri, XL, Smartfren, dan Esia; (ii) Rp 200 ditambah pajak
                                    10%
                                    untuk Telkomsel.</li>
                                <li>Penjual dilarang mempromosikan toko dan/atau Barang secara langsung menggunakan
                                    fasilitas pesan pribadi, diskusi produk, ulasan produk yang dapat mengganggu
                                    kenyamanan
                                    Pengguna lain.</li>
                            </ol>

                            <ol class="small">
                                <div class="form-group">
                                    <p class="font-weight-bold mt-3" style>Transaksi Pembelian</p>
                                </div>
                                <li>Pembeli wajib bertransaksi melalui prosedur transaksi yang telah ditetapkan oleh Go
                                    Porodisa. Pembeli melakukan pembayaran dengan menggunakan metode pembayaran yang
                                    sebelumnya telah dipilih oleh Pembeli, dan kemudian Goporodisa akan meneruskan dana
                                    ke
                                    pihak Penjual apabila tahapan transaksi jual beli pada sistem Goporodisa telah
                                    selesai.</li>
                                <li>Saat melakukan pembelian Barang, Pembeli menyetujui bahwa:
                                    <ul>
                                        <li>Pembeli bertanggung jawab untuk membaca, memahami, dan menyetujui
                                            informasi/deskripsi
                                            keseluruhan Barang (termasuk didalamnya namun tidak terbatas pada warna,
                                            kualitas,
                                            fungsi, dan lainnya) sebelum membuat tawaran atau komitmen untuk membeli.
                                        </li>
                                        <li>Pembeli mengakui bahwa warna sebenarnya dari produk sebagaimana terlihat di
                                            Situs/Aplikasi Goporodisa tergantung pada monitor komputer dan layar
                                            handphone Pembeli.
                                            Goporodisa telah melakukan upaya terbaik untuk memastikan warna dalam
                                            foto-foto yang
                                            ditampilkan pada Situs/Aplikasi Goporodisa muncul seakurat mungkin, tetapi
                                            tidak dapat
                                            menjamin bahwa penampilan warna pada Situs dan aplikasi Goporodisa akan
                                            akurat.</li>
                                        <li>Pengguna masuk ke dalam kontrak yang mengikat secara hukum untuk membeli
                                            Barang
                                            ketika Pengguna membeli suatu barang.</li>
                                        <li>Goporodisa tidak mengalihkan kepemilikan secara hukum atas barang-barang
                                            dari
                                            Penjual kepada Pembeli.</li>
                                    </ul>
                                </li>
                                <li>Pembeli memahami dan menyetujui bahwa ketersediaan stok Barang merupakan tanggung
                                    jawab Penjual yang menawarkan Barang tersebut. Terkait ketersediaan stok Barang
                                    dapat
                                    berubah sewaktu-waktu, sehingga dalam keadaan stok Barang kosong, maka penjual akan
                                    menolak order, dan pembayaran atas barang yang bersangkutan dikembalikan kepada
                                    Pembeli.</li>
                                <li>Pembeli memahami sepenuhnya dan menyetujui bahwa segala transaksi yang dilakukan
                                    antara Pembeli dan Penjual selain melalui Rekening Resmi Goporodisa dan/atau tanpa
                                    sepengetahuan Goporodisa (melalui fasilitas/jaringan pribadi, pengiriman pesan,
                                    pengaturan transaksi khusus diluar situs Goporodisa atau upaya lainnya) adalah
                                    merupakan tanggung jawab pribadi dari Pembeli.</li>
                                <li>Goporodisa memiliki kewenangan sepenuhnya untuk menolak pembayaran tanpa
                                    pemberitahuan terlebih dahulu.</li>
                                <li>Pembeli menyetujui dan memahami bahwa dengan menggunakan Situs/Aplikasi Goporodisa
                                    pada saat Pembeli melakukan transaksi pembelian, Goporodisa akan meneruskan data
                                    informasi Pembeli kepada Penjual.</li>
                                <li>Pembeli yang menggunakan metode pembayaran transfer bank, nilai total pembayaran
                                    akan
                                    ditambahkan kode unik untuk mempermudah proses verifikasi. Jika pembayaran tersebut
                                    telah diverifikasi, maka kode unik akan dikembalikan ke Saldo Refund Pembeli secara
                                    real
                                    time.</li>
                                <li>Pembeli wajib melakukan pembayaran dengan metode pembayaran yang dipilih dengan
                                    nominal yang sesuai dengan jumlah tagihan beserta kode unik (apabila ada) yang
                                    tertera
                                    pada halaman pembayaran. Goporodisa tidak bertanggung jawab atas kerugian yang
                                    dialami Pembeli, apabila Pembeli melakukan pembayaran yang tidak sesuai dengan
                                    jumlah
                                    tagihan yang tertera pada halaman pembayaran.</li>
                                <li>Pembayaran oleh Pembeli wajib dilakukan segera (selambat-lambatnya dalam batas waktu
                                    1x24 jam) setelah Pembeli melakukan check-out. Jika dalam batas waktu tersebut
                                    pembayaran belum dilakukan oleh Pembeli, Goporodisa memiliki kewenangan untuk
                                    membatalkan transaksi tersebut. Pengguna tidak berhak mengajukan klaim atau tuntutan
                                    atas pembatalan transaksi tersebut.</li>
                                <li>Pembeli disarankan untuk memeriksa kembali jumlah nominal pembayaran dengan jumlah
                                    tagihan yang tertera pada halaman pembayaran. Khusus pembayaran melalui transfer
                                    bank
                                    (verifikasi manual), apabila terdapat kekurangan pembayaran pada jumlah tagihan yang
                                    seharusnya dibayarkan, Pembeli akan mendapatkan pemberitahuan melalui e-mail Pembeli
                                    yang terdaftar pada Situs/Aplikasi, guna melakukan pembayaran kembali ke rekening
                                    resmi
                                    Goporodisa, sesuai dengan selisih pembayaran yang tertera pada halaman pembayaran
                                    dan
                                    jumlah nominal yang telah dibayarkan, hingga batas waktu yang telah ditentukan
                                    sebelumnya.</li>
                                <li>Pembayaran dengan metode pembayaran transfer bank (verifikasi manual) sangat
                                    disarankan mengunggah bukti pembayaran pada Aplikasi Goporodisa untuk mempermudah
                                    proses verifikasi.</li>
                                <li>Pembeli memahami dan menyetujui bahwa masalah keterlambatan proses pembayaran dan
                                    biaya tambahan yang disebabkan oleh perbedaan bank yang Pembeli pergunakan dengan
                                    bank
                                    Rekening resmi Goporodisa adalah tanggung jawab Pembeli secara pribadi.
                                    13. Pengembalian dana dari Goporodisa kepada Pembeli hanya dapat dilakukan jika
                                    dalam
                                    keadaan-keadaan tertentu berikut ini:
                                    <ul>
                                        <li>Kelebihan pembayaran dari Pembeli atas harga Barang,</li>
                                        <li>Masalah pengiriman Barang telah teridentifikasi secara jelas dari Penjual
                                            yang
                                            mengakibatkan pesanan Barang tidak sampai,</li>
                                        <li>Penjual tidak bisa menyanggupi order karena kehabisan stok, perubahan ongkos
                                            kirim,
                                            maupun penyebab lainnya,</li>
                                        <li>Penjual sudah menyanggupi pengiriman order Barang, tetapi setelah batas
                                            waktu yang
                                            ditentukan ternyata Penjual tidak mengirimkan Barang hingga batas waktu yang
                                            telah
                                            ditentukan.</li>
                                        <li>Penyelesaian permasalahan melalui Pusat Resolusi berupa keputusan untuk
                                            pengembalian
                                            dana kepada Pembeli atau hasil keputusan dari pihak Goporodisa.</li>
                                    </ul>
                                </li>
                                <li>Apabila terjadi proses pengembalian dana, maka pengembalian akan dilakukan melalui
                                    Saldo Refund milik Pengguna yang akan bertambah sesuai dengan jumlah pengembalian
                                    dana.
                                    Jika Pengguna menggunakan pilihan metode pembayaran kartu kredit maka pengembalian
                                    dana
                                    akan merujuk pada ketentuan bagian L. Kartu Kredit.</li>
                                <li>Pembeli dilarang untuk membagi 1 (satu) transaksi pembelian Barang menjadi 2 (dua)
                                    transaksi atau lebih secara terpisah untuk membagi nilai pembayaran (split payment)
                                    dengan tujuan memanipulasi metode pembayaran dan/atau mendapatkan manfaat lebih yang
                                    melanggar Syarat dan Ketentuan, yang dilakukan dengan cara apa pun termasuk namun
                                    tidak
                                    terbatas dengan menghubungi Penjual untuk melakukan perubahan harga dan/atau membeli
                                    beberapa produk untuk membagi jumlah harga dari suatu produk yang diinginkan.</li>
                                <li>Pembeli memahami dan menyetujui untuk melepaskan Goporodisa dari tanggung jawab
                                    apabila terjadi kendala atas transaksi yang menggunakan metode split payment,
                                    termasuk
                                    namun tidak terbatas pada kendala transaksi, kendala pembayaran, kendala pengiriman,
                                    maupun kerusakan dan/atau kehilangan Barang baik sebagian maupun seluruhnya.</li>
                                <li>Goporodisa berwenang untuk melakukan tindakan-tindakan yang diperlukan apabila
                                    diketahui terdapat transaksi pembelian menggunakan metode split payment, termasuk
                                    namun
                                    tidak terbatas pada pembatalan transaksi dan/atau pembatalan promo atau cashback.
                                </li>
                                <li>Pembeli menyetujui untuk tidak memberitahukan atau menyerahkan bukti pembayaran
                                    dan/atau data pembayaran kepada pihak lain selain Goporodisa. Dalam hal terjadi
                                    kerugian akibat pemberitahuan atau penyerahan bukti pembayaran dan/atau data
                                    pembayaran
                                    oleh Pembeli kepada pihak lain, maka hal tersebut akan menjadi tanggung jawab
                                    Pembeli.</li>
                                <li>Pembeli wajib melakukan konfirmasi penerimaan Barang, setelah menerima kiriman
                                    Barang yang dibeli. Goporodisa memberikan batas waktu 2 (dua) hari setelah
                                    pengiriman
                                    berstatus "terkirim" pada sistem Goporodisa, untuk Pembeli melakukan konfirmasi
                                    penerimaan Barang. Jika dalam batas waktu tersebut tidak ada konfirmasi atau klaim
                                    dari
                                    pihak Pembeli, maka dengan demikian Pembeli menyatakan menyetujui dilakukannya
                                    konfirmasi penerimaan Barang secara otomatis oleh sistem Goporodisa.</li>
                                <li>Setelah adanya konfirmasi penerimaan Barang atau konfirmasi penerimaan Barang
                                    otomatis, maka dana pihak Pembeli yang dikirimkan ke Rekening resmi Goporodisa akan
                                    di
                                    lanjut kirimkan ke pihak Penjual (transaksi dianggap selesai).</li>
                                <li>Pembeli memahami dan menyetujui bahwa setiap klaim yang dilayangkan setelah adanya
                                    konfirmasi / konfirmasi otomatis penerimaan Barang adalah bukan menjadi tanggung
                                    jawab
                                    Goporodisa. Kerugian yang timbul setelah adanya konfirmasi/konfirmasi otomatis
                                    penerimaan Barang menjadi tanggung jawab Pembeli secara pribadi.</li>
                                <li>Pembeli memahami dan menyetujui bahwa setiap masalah pengiriman Barang yang
                                    disebabkan keterlambatan pembayaran adalah merupakan tanggung jawab dari Pembeli.
                                </li>
                                <li>Goporodisa berwenang mengambil keputusan atas permasalahan-permasalahan transaksi
                                    yang belum terselesaikan akibat tidak adanya kesepakatan penyelesaian, baik antara
                                    Penjual dan Pembeli, dengan melihat bukti-bukti yang ada. Keputusan Goporodisa
                                    adalah
                                    keputusan akhir yang tidak dapat diganggu gugat dan mengikat pihak Penjual dan
                                    Pembeli
                                    untuk mematuhinya.</li>
                            </ol>

                            <ol class="small">
                                <div class="form-group">
                                    <p class="font-weight-bold mt-3" style>Transaksi Penjualan</p>
                                </div>
                                <li>Penjual dilarang memanipulasi harga Barang dengan tujuan apapun.</li>
                                <li>Penjual dilarang melakukan penawaran / berdagang Barang terlarang sesuai dengan yang
                                    telah ditetapkan pada ketentuan Poin J. Jenis Barang.</li>
                                <li>Penjual wajib memberikan foto dan informasi produk dengan lengkap dan jelas sesuai
                                    dengan kondisi dan kualitas produk yang dijualnya. Apabila terdapat ketidaksesuaian
                                    antara foto dan informasi produk yang diunggah oleh Penjual dengan produk yang
                                    diterima
                                    oleh Pembeli, maka Goporodisa berhak membatalkan/menahan dana transaksi.</li>
                                <li>Dalam menggunakan Fasilitas "Judul Produk", "Foto Produk", "Catatan" dan "Deskripsi
                                    Produk", Penjual dilarang membuat peraturan bersifat klausula baku yang tidak
                                    memenuhi
                                    peraturan perundang-undangan yang berlaku di Indonesia, termasuk namun tidak
                                    terbatas
                                    pada (i) tidak menerima komplain, (ii) tidak menerima retur (penukaran barang),
                                    (iii)
                                    tidak menerima refund (pengembalian dana), (iv) barang tidak bergaransi, (v)
                                    pengalihan
                                    tanggung jawab (termasuk tidak terbatas pada penanggungan ongkos kirim), (vi)
                                    penyusutan
                                    nilai harga dan (vii) pengiriman barang acak secara sepihak. Jika terdapat
                                    pertentangan
                                    antara catatan toko dan/atau deskripsi produk dengan Syarat & Ketentuan Goporodisa,
                                    maka peraturan yang berlaku adalah Syarat & Ketentuan Goporodisa.</li>
                                <li>Penjual wajib memberikan balasan untuk menerima atau menolak pesanan Barang pihak
                                    Pembeli dalam batas waktu 2 hari terhitung sejak adanya notifikasi pesanan Barang
                                    dari
                                    Goporodisa. Jika dalam batas waktu tersebut tidak ada balasan dari Penjual maka
                                    secara
                                    otomatis pesanan akan dibatalkan.</li>
                                <li>Demi menjaga kenyamanan Pembeli dalam bertransaksi, Penjual memahami dan menyetujui
                                    bahwa Goporodisa berhak melakukan moderasi toko Penjual apabila Penjual melakukan
                                    penolakan, pembatalan dan/atau tidak merespon pesanan Barang milik Pembeli dengan
                                    dugaan
                                    untuk memanipulasi transaksi, pelanggaran atas Syarat dan Ketentuan, dan/atau
                                    kecurangan
                                    atau penyalahgunaan lainnya.</li>
                                <li>Penjual dilarang untuk menyediakan metode pembayaran terpisah (split payment)
                                    dan/atau membagi 1 (satu) transaksi pembelian Barang menjadi 2 (dua) transaksi yang
                                    berbeda dengan tujuan untuk memanipulasi metode pembayaran dan/atau mendapatkan
                                    manfaat
                                    lebih yang melanggar Syarat dan Ketentuan, yang dilakukan dengan cara apa pun
                                    termasuk
                                    namun tidak terbatas dengan menggunakan layanan "varian produk" atau menjual
                                    beberapa
                                    produk sehingga membagi jumlah harga atau transaksi dari suatu produk yang
                                    diinginkan.</li>
                                <li>Penjual memahami dan menyetujui untuk melepaskan Goporodisa dari tanggung jawab
                                    apabila terjadi kendala atas transaksi yang menggunakan metode split payment,
                                    termasuk
                                    namun tidak terbatas pada kendala transaksi, kendala pembayaran, kendala pengiriman,
                                    maupun kerusakan dan/atau kehilangan produk baik sebagian maupun seluruhnya.</li>
                                <li>Goporodisa berwenang untuk melakukan tindakan-tindakan yang diperlukan apabila
                                    diketahui terdapat transaksi penjualan menggunakan metode split payment, termasuk
                                    namun
                                    tidak terbatas pada pembatalan transaksi, penyesuaian reputasi toko, penghapusan
                                    produk,
                                    moderasi toko, dan/atau penutupan toko.</li>
                                <li>Penjual menyetujui dan memahami bahwa dengan menerima data informasi Pembeli yang
                                    terdapat dalam Situs/Aplikasi wajib menjaga kerahasiaan dan dilarang menyalahgunakan
                                    data informasi Pembeli dalam bentuk apapun. Goporodisa berhak, tanpa pemberitahuan
                                    sebelumnya, melakukan investigasi dan memberikan sanksi terhadap dugaan atau laporan
                                    penyalahgunaan data Pembeli.</li>
                                <li>Penjual diharapkan untuk memasukkan nomor resi pengiriman Barang atau AWB (air way
                                    bill) yang valid, yaitu:
                                    <ul>
                                        <li>Tanggal pembuatan resi pengiriman Barang tidak lebih dulu dari tanggal
                                            transaksi
                                            pembelian Barang.</li>
                                        <li>Nomor resi pengiriman Barang harus dapat dilacak atau ditemukan pada web
                                            situs
                                            pelacakan atau sistem jasa ekspedisi rekanan Goporodisa. dan/atau</li>
                                        <li>Merupakan resi pengiriman Barang yang memang diperuntukkan untuk pembeli
                                            yang akan
                                            menerima paket tersebut (detail pengiriman harus sama).</li>
                                    </ul>
                                </li>
                                <li>Penjual wajib memasukkan nomor resi pengiriman Barang yang valid dalam batas waktu 2
                                    x 24 jam (tidak termasuk hari Sabtu/Minggu/libur Nasional) terhitung sejak adanya
                                    notifikasi pesanan Barang dari Goporodisa.</li>
                                <li>Apabila Penjual memasukkan nomor resi pengiriman Barang yang invalid atau tidak
                                    dapat terlacak, Penjual wajib memasukkan nomor resi pengiriman Barang yang valid
                                    dalam
                                    batas waktu 1 x 24 jam (tidak termasuk hari Sabtu/Minggu/libur Nasional) terhitung
                                    sejak
                                    adanya notifikasi nomor resi invalid atau tidak terlacak yang diberikan oleh Go
                                    Porodisa
                                    kepada Penjual.</li>
                                <li>Jika dalam batas waktu tersebut dalam Syarat & Ketentuan Poin D. 8 dan D. 9 pihak
                                    Penjual tidak memasukkan nomor resi pengiriman Barang yang valid, maka secara
                                    otomatis
                                    pesanan dianggap dibatalkan. Jika Penjual tetap mengirimkan Barang setelah melebihi
                                    batas waktu pengiriman sebagaimana dijelaskan diatas, maka Penjual memahami bahwa
                                    transaksi akan tetap dibatalkan untuk kemudian Penjual dapat melakukan penarikan
                                    Barang
                                    pada kurir tempat Barang dikirimkan.</li>
                                <li>Penjual memahami dan menyetujui bahwa kurir pengiriman tidak dapat diubah oleh
                                    Penjual setelah Penjual melakukan konfirmasi pengiriman dan sepenuhnya menjadi
                                    tanggung
                                    jawab Penjual. Penjelasan lebih lengkap dapat dilihat di sini.</li>
                                <li>Goporodisa berwenang untuk membatalkan transaksi dan/atau menahan dana transaksi
                                    dalam hal: (i) nomor resi kurir pengiriman Barang yang diberikan oleh Penjual tidak
                                    sesuai dan/atau diduga tidak sesuai dengan transaksi yang terjadi di Situs Go
                                    Porodisa;
                                    (ii) Penjual mengirimkan Barang melalui jasa kurir/logistik selain dari yang
                                    disediakan
                                    dan terhubung dengan Situs Goporodisa; (iii) jika nama produk dan deskripsi produk
                                    tidak sesuai/tidak jelas dengan produk yang dikirim; (iv) jika ditemukan adanya
                                    manipulasi transaksi; dan/atau (v) mencantumkan nomor resi pengiriman Barang yang
                                    telah
                                    digunakan oleh Penjual lainnya (internal dropshipper)</li>
                                <li>Penjual memahami dan menyetujui bahwa seluruh Pajak sehubungan dengan transaksi
                                    Penjualan (namun tidak terbatas pada perubahan informasi toko dan/atau barang), akan
                                    dilaporkan dan diurus sendiri oleh masing-masing Penjual sesuai dengan ketentuan
                                    pajak
                                    yang berlaku di peraturan perundang-undangan di Indonesia.</li>
                                <li>Goporodisa berwenang mengambil keputusan atas permasalahan-permasalahan transaksi
                                    yang belum terselesaikan akibat tidak adanya kesepakatan penyelesaian, baik antara
                                    Penjual dan Pembeli, dengan melihat bukti-bukti yang ada. Keputusan Goporodisa
                                    adalah
                                    keputusan akhir yang tidak dapat diganggu gugat dan mengikat pihak Penjual dan
                                    Pembeli
                                    untuk mematuhinya.</li>
                                <li>Apabila disepakati oleh Penjual dan Pembeli, penggunaan jasa Logistik yang berbeda
                                    dari pilihan awal pembeli dapat dilakukan (dengan ketentuan bahwa tarif pengiriman
                                    tersebut adalah di bawah tarif pengiriman awal).</li>
                                <li>Goporodisa berwenang memotong kelebihan tarif pengiriman dari dana pembayaran
                                    pembeli dan mengembalikan selisih kelebihan tarif pengiriman kepada pembeli.</li>
                                <li>Penjual memahami sepenuhnya dan menyetujui bahwa invoice yang diterbitkan adalah
                                    atas nama Penjual.</li>
                                <li>Penamaan Barang dan informasi produk harus sesuai dengan kondisi Barang yang
                                    ditampilkan dan Pengguna tidak diperkenankan mencantumkan nama dan informasi yang
                                    tidak
                                    sesuai dengan kondisi Barang.</li>
                                <li>Goporodisa berhak tanpa pemberitahuan sebelumnya untuk melakukan penarikan subsidi
                                    (cashback), pembatalan benefit Rewards, penurunan konten dan/atau moderasi toko,
                                    apabila
                                    didapati pelanggaran sebagaimana diatur pada Point E.4 dan E.5.</li>
                                <li>Penjual wajib memisahkan tiap-tiap Barang yang memiliki ukuran dan harga yang
                                    berbeda.</li>
                                <li>Goporodisa memiliki kewenangan mengambil-alih sub-domain toko Penjual jika akun
                                    Penjual sudah tidak aktif lebih dari 9 bulan, dan/atau pemilik merek dagang resmi
                                    (sesuai dengan Daftar Umum Merek di Indonesia) dengan nama yang sama dengan
                                    sub-domain
                                    Penjual melakukan klaim terhadapnya dikarenakan mereka ingin menggunakan sub-domain
                                    tersebut.</li>
                                <li>Goporodisa memiliki kewenangan untuk mengubah nama dan/atau memakai nama Toko
                                    dan/atau domain Pengguna untuk kepentingan internal Goporodisa.</li>
                            </ol>

                            <ol class="small">
                                <div class="form-group">
                                    <p class="font-weight-bold mt-3" style>Harga</p>
                                </div>
                                <li>Harga Barang yang terdapat dalam situs Goporodisa adalah harga yang ditetapkan oleh
                                    Penjual. Penjual dilarang memanipulasi harga barang dengan cara apapun.</li>
                                <li>Penjual dilarang menetapkan harga yang tidak wajar pada Barang yang ditawarkan
                                    melalui Situs Goporodisa. Goporodisa berhak untuk melakukan tindakan berupa
                                    memindahkan
                                    Barang ke gudang, pemeriksaan, penundaan, atau penurunan konten serta tindakan
                                    lainnya
                                    berdasarkan penilaian sendiri dari Goporodisa atas dasar penetapan harga yang tidak
                                    wajar.</li>
                                <li>Pembeli memahami dan menyetujui bahwa kesalahan keterangan harga dan informasi
                                    lainnya yang disebabkan tidak terbaharuinya halaman situs Goporodisa dikarenakan
                                    browser/ISP yang dipakai Pembeli adalah tanggung jawab Pembeli.</li>
                                <li>Penjual memahami dan menyetujui bahwa kesalahan ketik yang menyebabkan keterangan
                                    harga atau informasi lain menjadi tidak benar/sesuai adalah tanggung jawab Penjual.
                                    Perlu diingat dalam hal ini, apabila terjadi kesalahan pengetikan keterangan harga
                                    Barang yang tidak disengaja, Penjual berhak menolak pesanan Barang yang dilakukan
                                    oleh
                                    pembeli.</li>
                                <li>Pengguna memahami dan menyetujui bahwa setiap masalah dan/atau perselisihan yang
                                    terjadi akibat ketidaksepahaman antara Penjual dan Pembeli tentang harga bukanlah
                                    merupakan tanggung jawab Goporodisa.</li>
                                <li>Dengan melakukan pemesanan melalui Goporodisa, Pengguna menyetujui untuk membayar
                                    total biaya yang harus dibayarkan sebagaimana tertera dalam halaman pembayaran, yang
                                    terdiri dari harga barang, ongkos kirim, dan biaya-biaya lain yang mungkin timbul
                                    dan
                                    akan diuraikan secara tegas dalam halaman pembayaran. Pengguna setuju untuk
                                    melakukan
                                    pembayaran melalui metode pembayaran yang telah dipilih sebelumnya oleh Pengguna.
                                </li>
                                <li>Batasan harga maksimal satuan untuk Barang yang dapat ditawarkan adalah Rp.
                                    100.000.000,-</li>
                                <li>Situs Goporodisa untuk saat ini hanya melayani transaksi jual beli Barang dalam mata
                                    uang Rupiah.</li>
                            </ol>

                            <ol class="small">
                                <div class="form-group">
                                    <p class="font-weight-bold mt-3" style>Tarif Pengiriman</p>
                                </div>
                                <li>Pembeli memahami dan mengerti bahwa Goporodisa telah melakukan usaha sebaik mungkin
                                    dalam memberikan informasi tarif pengiriman kepada Pembeli berdasarkan lokasi secara
                                    akurat, namun Goporodisa tidak dapat menjamin keakuratan data tersebut dengan yang
                                    ada
                                    pada cabang setempat.</li>
                                <li>Karena itu Goporodisa menyarankan kepada Penjual untuk mencatat terlebih dahulu
                                    tarif
                                    yang diberikan Goporodisa, agar dapat dibandingkan dengan tarif yang dibebankan di
                                    cabang setempat. Apabila mendapati perbedaan, mohon sekiranya untuk menginformasikan
                                    kepada kami melalui menu contact us dengan memberikan data harga yang didapat
                                    beserta
                                    kota asal dan tujuan, agar dapat kami telusuri lebih lanjut.</li>
                                <li>Pengguna memahami dan menyetujui bahwa selisih biaya pengiriman Barang adalah di
                                    luar
                                    tanggung jawab Goporodisa, dan oleh karena itu, adalah kebijakan Penjual sendiri
                                    untuk
                                    membatalkan atau tetap melakukan pengiriman Barang.</li>
                            </ol>

                            <ol class="small">
                                <div class="form-group">
                                    <p class="font-weight-bold mt-3" style>Konten</p>
                                </div>
                                <li>Dalam menggunakan setiap fitur dan/atau layanan Goporodisa, Pengguna dilarang untuk
                                    menggunggah atau mempergunakan kata-kata, komentar, gambar, video atau konten apapun
                                    yang mengandung unsur SARA, diskriminasi, merendahkan atau menyudutkan orang lain,
                                    vulgar, bersifat ancaman, beriklan atau melakukan promosi ke situs selain Situs
                                    Goporodisa, atau hal-hal lain yang dapat dianggap tidak sesuai dengan nilai dan
                                    norma
                                    sosial maupun berdasarkan kebijakan yang ditentukan sendiri oleh Goporodisa. Go
                                    Porodisa
                                    berhak melakukan tindakan yang diperlukan atas pelanggaran ketentuan ini, antara
                                    lain
                                    penghapusan konten, moderasi toko, pemblokiran akun, dan lain-lain. Ketentuan lebih
                                    lanjut mengenai kebijakan Pengguna dilarang mempergunakan foto/gambar Barang yang
                                    memiliki watermark yang menandakan hak kepemilikan orang lain.</li>
                                <li>Pengguna dengan ini memahami dan menyetujui bahwa penyalahgunaan foto/gambar yang di
                                    unggah oleh Pengguna adalah tanggung jawab Pengguna secara pribadi.</li>
                                <li>Penjual tidak diperkenankan untuk mempergunakan foto/gambar Barang atau logo toko
                                    sebagai media untuk beriklan atau melakukan promosi ke situs-situs lain diluar Situs
                                    Goporodisa, atau memberikan data kontak pribadi untuk melakukan transaksi secara
                                    langsung kepada pembeli / calon pembeli.</li>
                                <li>Penjual menjamin foto/gambar yang diunggah tidak termasuk konten yang dilarang
                                    berdasarkan Poin I. 1 atau melanggar hak milik pihak lain. Apabila didapati
                                    foto/gambar
                                    melanggar konten berdasarkan Poin I. 1 atau terdapat laporan pelanggaran hak milik
                                    pihak
                                    lain, maka Goporodisa berhak melakukan tindakan yang diperlukan atas pelanggaran
                                    ketentuan ini, termasuk namun tidak terbatas pada penghapusan konten dan/atau
                                    tindakan
                                    lainnya yang perlu dilakukan.</li>
                                <li>Ketika Pengguna mengunggah ke Situs Goporodisa dengan konten atau posting konten,
                                    Pengguna memberikan Goporodisa hak non-eksklusif, di seluruh dunia, secara
                                    terus-menerus, tidak dapat dibatalkan, bebas royalti, disublisensikan ( melalui
                                    beberapa
                                    tingkatan ) hak untuk melaksanakan setiap dan semua hak cipta, publisitas , merek
                                    dagang
                                    , hak basis data dan hak kekayaan intelektual yang Pengguna miliki dalam konten, di
                                    media manapun yang dikenal sekarang atau di masa depan. Selanjutnya , untuk
                                    sepenuhnya
                                    diizinkan oleh hukum yang berlaku , Anda mengesampingkan hak moral dan berjanji
                                    untuk
                                    tidak menuntut hak-hak tersebut terhadap Goporodisa.</li>
                                <li>Pengguna menjamin bahwa tidak melanggar hak kekayaan intelektual dalam mengunggah
                                    konten Pengguna kedalam situs Goporodisa. Setiap Pengguna dengan ini bertanggung
                                    jawab
                                    secara pribadi atas pelanggaran hak kekayaan intelektual dalam mengunggah konten di
                                    Situs Goporodisa.</li>
                                <li>Goporodisa menyediakan fitur "Diskusi Produk" untuk memudahkan pembeli berinteraksi
                                    dengan penjual, perihal Barang yang ditawarkan. Penjual tidak diperkenankan
                                    menggunakan
                                    fitur tersebut untuk tujuan dengan cara apa pun menaikkan harga Barang dagangannya,
                                    termasuk di dalamnya memberi komentar pertama kali atau memberi komentar selanjutnya
                                    /
                                    terus menerus secara berkala (flooding / spam).</li>
                                <li>Meskipun kami mencoba untuk menawarkan informasi yang dapat diandalkan, kami tidak
                                    bisa menjanjikan bahwa katalog akan selalu akurat dan terbarui, dan Pengguna setuju
                                    bahwa Pengguna tidak akan meminta Goporodisa bertanggung jawab atas ketimpangan
                                    dalam
                                    katalog. Katalog mungkin termasuk hak cipta, merek dagang atau hak milik lainnya.
                                </li>
                                <li>Konten atau materi yang akan ditampilkan atau ditayangkan pada Situs/Aplikasi Go
                                    Porodisa melalui Feed akan tunduk pada Ketentuan Situs, peraturan hukum, serta etika
                                    pariwara yang berlaku.</li>
                                <li>KOL, Pengguna atau pihak lainnya yang menggunakan fitur Feed bertanggungjawab penuh
                                    terhadap konten atau materi yang diunggah melalui fitur Feed.</li>
                                <li>Goporodisa berhak untuk sewaktu-waktu menurunkan konten atau materi yang terdapat
                                    pada Feed yang dianggap melanggar Syarat dan Ketentuan Situs, peraturan hukum yang
                                    berlaku, serta etika pariwara yang berlaku.</li>
                                <li>Penjualan produk yang mengandung tembakau dan/atau rokok elektrik hanya
                                    diperkenankan di jual kedalam 6 (enam) kategori tertentu, yaitu:
                                    <ul>
                                        <li>Kategori Produk Dewasa Lainnya;</li>
                                        <li>Kategori E-cigarettes;</li>
                                        <li>Kategori Liquid Vape;</li>
                                        <li>Kategori Paket Vaporizer;</li>
                                        <li>Kategori MOD; dan/atau</li>
                                        <li>Kategori Atomizer.</li>
                                    </ul>
                                </li>
                                <li>Goporodisa berhak untuk sewaktu-waktu tanpa pemberitahuan sebelumnya, untuk
                                    melakukan tindakan penurunan konten yang menjual produk rokok elektrik, perangkat
                                    rokok
                                    elektrik, cairan rokok elektrik, dan/atau produk yang mengandung tembakau di
                                    platform
                                    Android, termasuk namun tidak terbatas pada produk rokok tembakau, nikotin, liquid
                                    vape,
                                    mod, pod, heatstick, vaporizer dan/atau E-Cigarette.</li>
                                <li>Goporodisa berhak sewaktu-waktu tanpa pemberitahuan sebelumnya, untuk mengambil
                                    tindakan berupa penurunan reputasi toko atau moderasi toko, apabila Penjual diduga
                                    melakukan manipulasi konten sebagaimana diatur dalam poin I.14, termasuk namun tidak
                                    terbatas pada manipulasi penulisan nama produk, gambar produk, deskripsi produk
                                    dan/atau
                                    kegiatan lainnya yang bertujuan untuk mengelabuhi penjualan konten sebagaimana
                                    diatur
                                    dalam poin</li>
                            </ol>

                            <ol class="small">
                                <div class="form-group">
                                    <p class="font-weight-bold mt-3" style>Jenis Barang dan Jasa</p>
                                </div>
                                <li>Berikut ini adalah daftar jenis Barang dan Jasa yang dilarang dan/atau dibatasi
                                    untuk
                                    diperdagangkan oleh Penjual pada Situs Goporodisa:Segala jenis obat-obatan
                                    maupun
                                    zat-zat lain yang dilarang ataupun dibatasi peredarannya menurut ketentuan hukum
                                    yang
                                    berlaku, termasuk namun tidak terbatas pada ketentuan Undang-Undang Narkotika,
                                    Undang-Undang Psikotropika, dan Undang-Undang Kesehatan. Termasuk pula dalam
                                    ketentuan
                                    ini adalah obat keras, obat-obatan yang memerlukan resep dokter, obat bius dan
                                    sejenisnya, atau obat yang tidak memiliki izin edar dari Badan Pengawas Obat dan
                                    Makanan
                                    (BPOM).</li>
                                <li>Kosmetik dan makanan minuman yang membahayakan keselamatan penggunanya, ataupun
                                    yang
                                    tidak mempunyai izin edar dari Badan Pengawas Obat dan Makanan (BPOM).
                                    3. Bahan yang diklasifikasikan sebagai Bahan Berbahaya menurut Peraturan Menteri
                                    Perdagangan yang berlaku.</li>
                                <li>Jenis Produk tertentu yang wajib memiliki:
                                    <ul>
                                        <li>SNI;</li>
                                        <li>Petunjuk penggunaan dalam Bahasa Indonesia; atau</li>
                                        <li>Label dalam Bahasa Indonesia.</li>
                                    </ul>
                                </li>
                                <li>Sementara yang diperjualbelikan tidak mencantumkan hal-hal tersebut.</li>
                                <li>Barang-barang lain yang kepemilikannya ataupun peredarannya melanggar ketentuan
                                    hukum
                                    yang berlaku di Indonesia.</li>
                                <li>Barang yang merupakan hasil pelanggaran Hak Cipta, termasuk namun tidak terbatas
                                    dalam media berbentuk buku, CD/DVD/VCD, informasi dan/atau dokumen elektronik,
                                    serta
                                    media lain yang bertentangan dengan Undang-Undang Hak Cipta.</li>
                                <li>Barang dewasa yang bersifat seksual berupa obat perangsang, alat bantu seks yang
                                    mengandung konten pornografi, serta obat kuat dan obat-obatan dewasa, baik yang
                                    tidak
                                    memiliki izin edar BPOM maupun yang peredarannya dibatasi oleh ketentuan hukum
                                    yang
                                    berlaku.</li>
                                <li>Minuman beralkohol.</li>
                                <li>Iklan.</li>
                                <li>Segala bentuk tulisan yang dapat berpengaruh negatif terhadap pemakaian situs
                                    ini.</li>
                                <li>Pakaian dalam bekas.</li>
                                <li>Senjata api, senjata tajam, senapan angin, dan segala macam senjata.</li>
                                <li>Dokumen pemerintahan dan perjalanan.</li>
                                <li>Seragam pemerintahan.</li>
                                <li>Bagian/Organ manusia.</li>
                                <li>Mailing list dan informasi pribadi.</li>
                                <li>Barang-Barang yang melecehkan pihak/ras tertentu atau dapat merendahkan martabat
                                    orang lain.</li>
                                <li>Pestisida.</li>
                                <li>Atribut kepolisian.</li>
                                <li>Barang hasil tindak pencurian.</li>
                                <li>Pembuka kunci dan segala aksesori penunjang tindakan perampokan/pencurian.</li>
                                <li>Barang yang dapat dan atau mudah meledak, menyala atau terbakar sendiri.</li>
                                <li>Barang cetakan/rekaman yang isinya dapat mengganggu keamanan & ketertiban serta
                                    stabilitas nasional.</li>
                                <li>Hewan.</li>
                                <li>Uang tunai termasuk valuta asing kecuali Penjual memiliki dan dapat mencantumkan
                                    izin sebagai Penyelenggara Kegiatan Usaha Penukaran Valuta Asing Bukan Bank
                                    berdasarkan
                                    Peraturan Bank Indonesia No.18/20/PBI/2016 dan/atau peraturan lainnya yang
                                    terkait
                                    dengan penukaran valuta asing.</li>
                                <li>Materai.</li>
                                <li>Pengacak sinyal, penghilang sinyal, dan/atau alat-alat lain yang dapat
                                    mengganggu
                                    sinyal atau jaringan telekomunikasi</li>
                                <li>Perlengkapan dan peralatan judi.</li>
                                <li>Jimat-jimat, benda-benda yang diklaim berkekuatan gaib dan memberi ilmu
                                    kesaktian.</li>
                                <li>Barang dengan hak Distribusi Eksklusif yang hanya dapat diperdagangkan dengan
                                    sistem
                                    penjualan langsung oleh penjual resmi dan/atau Barang dengan sistem penjualan
                                    Multi
                                    Level Marketing.</li>
                                <li>Produk non fisik yang tidak dapat dikirimkan melalui jasa kurir, termasuk namun
                                    tidak terbatas pada produk pulsa/voucher (telepon, listrik, game, dan/atau
                                    credit
                                    digital), tiket pesawat dan/atau tiket kereta.</li>
                                <li> Tiket pertunjukan, termasuk namun tidak terbatas pada tiket konser, baik fisik
                                    maupun non fisik.</li>
                                <li>Dokumen-dokumen resmi seperti Sertifikat Toefl, Ijazah, Surat Dokter, Kwitansi,
                                    dan
                                    lain sebagainya</li>
                                <li>Segala jenis Barang lain yang bertentangan dengan peraturan pengiriman Barang
                                    Indonesia.</li>
                                <li>Barang-Barang lain yang melanggar ketentuan hukum yang berlaku di Indonesia.
                                </li>
                                <li>Segala jenis Jasa kecuali untuk penawaran yang berasal dari Goporodisa dan
                                    afiliasinya termasuk namun tidak terbatas pada jasa print, jasa kebersihan, jasa
                                    wedding
                                    dan parenting.</li>
                                <li>Segala jenis Barang yang isinya tidak pasti, bersifat acak dan/atau undian,
                                    termasuk
                                    namun tidak terbatas pada Produk Kotak Misteri. Ketentuan tersebut di kecualikan
                                    untuk
                                    Official Store dan Afiliasi Goporodisa .</li>
                            </ol>

                            <ol class="small">
                                <div class="form-group">
                                    <p class="font-weight-bold mt-3" style>Pengiriman Barang</p>
                                </div>
                                <li>Pengiriman Barang dalam sistem Goporodisa wajib menggunakan jasa perusahaan
                                    ekspedisi yang telah mendapatkan verifikasi rekanan Goporodisa yang dipilih oleh
                                    Pembeli. Apabila Penjual memasukkan resi di luar dari resi partner rekanan Go
                                    Porodisa
                                    (termasuk di dalamnya resi pengiriman dari kurir luar negeri), Goporodisa berhak
                                    untuk
                                    menolak resi tersebut; dimana hal ini dapat mengakibatkan dibatalkannya sebuah
                                    pesanan.</li>
                                <li>Setiap ketentuan berkenaan dengan proses pengiriman Barang adalah wewenang
                                    sepenuhnya
                                    penyedia jasa layanan pengiriman Barang.</li>
                                <li>Penjual wajib memenuhi ketentuan yang ditetapkan oleh jasa layanan pengiriman barang
                                    tersebut dan bertanggung jawab atas setiap Barang yang dikirimkan.</li>
                                <li>Pengguna memahami dan menyetujui bahwa setiap permasalahan yang terjadi pada saat
                                    proses pengiriman Barang oleh penyedia jasa layanan pengiriman Barang adalah
                                    merupakan
                                    tanggung jawab penyedia jasa layanan pengiriman.</li>
                                <li>Dalam hal diperlukan untuk dilakukan proses pengembalian barang, maka Pengguna, baik
                                    Penjual maupun Pembeli, diwajibkan untuk melakukan pengiriman barang langsung ke
                                    masing-masing Pembeli maupun Penjual. Goporodisa tidak menerima pengembalian atau
                                    pengiriman barang atas transaksi yang dilakukan oleh Pengguna dalam kondisi apapun.
                                </li>
                                <li>Dalam hal terjadi kendala dalam proses pengiriman berupa barang hilang, barang
                                    rusak,
                                    dan lain sebagainya, Pembeli dan Penjual dapat melaporkan ke pihak Goporodisa
                                    paling
                                    lambat 3x24 jam sejak waktu pengiriman untuk dilakukan proses investigasi.</li>
                                <li>Informasi lebih lengkap terkait penyedia jasa layanan pengiriman Barang beserta
                                    dengan ketentuan yang berlaku pada masing-masing penyedia jasa layanan pengiriman
                                    Barang
                                    dapat dibaca</li>
                            </ol>

                            <ol class="small">
                                <div class="form-group">
                                    <p class="font-weight-bold mt-3" style>Penarikan Dana</p>
                                </div>
                                <li>Penarikan dana sesama bank akan diproses dalam waktu 1x24 jam hari kerja, sedangkan
                                    penarikan dana antar bank akan diproses dalam waktu 2x24 jam hari kerja.</li>
                                <li>Untuk penarikan dana dengan tujuan nomor rekening di luar bank BCA, Mandiri, dan BNI
                                    apabila ada biaya tambahan yang dibebankan akan menjadi tanggungan dari Pengguna.
                                </li>
                                <li>Dalam hal ditemukan adanya dugaan pelanggaran terhadap Syarat dan Ketentuan Go
                                    Porodisa, kecurangan, manipulasi atau kejahatan, Pengguna memahami dan menyetujui
                                    bahwa
                                    Goporodisa berhak melakukan tindakan pemeriksaan, pembekuan, penundaan dan/atau
                                    pembatalan terhadap penarikan dana yang dilakukan oleh Pengguna.</li>
                                <li>Pemeriksaan, pembekuan atau penundaan penarikan dana sebagaimana dimaksud dalam Poin
                                </li>
                                <li>Dilakukan dalam jangka waktu selama yang diperlukan oleh pihak Goporodisa.</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Portfolio Section -->
    @endsection
