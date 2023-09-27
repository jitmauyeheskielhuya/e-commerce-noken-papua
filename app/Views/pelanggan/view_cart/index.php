<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>E-Comerce Noken Papua</title>
<link rel="stylesheet" href="<?= base_url() ?>/css/app.css">
<link rel="shortcut icon" href="<?= base_url() ?>/template1/assets/img/k2.png">
<link href="<?= base_url('template2') ?>/dist/css/final.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">



<link rel="stylesheet" href="<?= base_url(); ?>/template1/assets/plugins/icons/flags/flags.css">

<link rel="stylesheet" href="<?= base_url(); ?>/template1/assets/plugins/fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="<?= base_url(); ?>/template1/assets/plugins/fontawesome/css/all.min.css">

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>



<script>
  $(document).ready(function() {
    $('.autosearch').select2();
  });
</script>




<script>
  if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia(
      '(prefers-color-scheme: dark)').matches)) {
    document.documentElement.classList.add('dark')
  } else {
    document.documentElement.classList.remove('dark')
  }
</script>

<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-xYaTXvSsCHIDFme4"></script>
</head>

<body>

  <!-- header start -->
  <header class="bg-transparent absolute top-0 left-0 w-full flex items-center z-10">
    <div class="container">
      <div class="flex items-center justify-between relative">
        <div class="px-4">
          <a href="#home" class="font-bold text-lg text-primary block py-6">E-Commerce Noken Papua</a>
        </div>
        <div class="flex items-center px-4">
          <button id="hamburger" name="hamburger" type="button" class="block absolute right-4 lg:hidden">
            <span class="hamburger-line transition duration-300 ease-in-out origin-top-left"></span>
            <span class="hamburger-line transition duration-300 ease-in-out"></span>
            <span class="hamburger-line transition duration-300 ease-in-out origin-bottom-left"></span>
          </button>
          <nav id="nav-menu" class="hidden absolute py-5 bg-white shadow-lg rounded-lg max-w-[220px] w-full right-4 top-16 lg:block
            lg:static lg:bg-transparent lg:max-w-full lg:shadow-none lg:rounded-none dark:bg-dark
            dark:shadow-slate-500 lg:dark:bg-transparent">
            <ul class="block lg:flex xl:flex">
              <li class="group">
                <a href="#home"></a>
                <a href="<?= base_url('/pelanggan') ?>" class="text-base text-dark py-2 mx-2 flex group-hover:text-emerald-400 dark:text-white"><i class="fa fa-home text-2xl mr-1"></i>Beranda</a>
              </li>
              <li class="group">
                <a href="#about" class="text-base text-dark py-2 mx-2 flex group-hover:text-emerald-400 dark:text-white"><i class="fa fa-search-plus text-2xl mr-1"></i>Info SMART</a>
              </li>
              <li class="group">
                <a href="#clients" class="text-base text-dark py-2 mx-2 flex group-hover:text-emerald-400 dark:text-white"><i class="fa fa-receipt text-2xl mr-1"></i>Bukti Pesanan</a>
              </li>
              <li class="group">
                <a href="#blog" class="text-base text-dark py-2 mx-2 flex group-hover:text-emerald-400 dark:text-white"><i class="fa fa-clipboard-check text-2xl mr-1"></i>Konfirmasi</a>
              </li>
              <li class="group">
                <a href="" class="text-base text-dark py-1 mx-2 flex group-hover:text-emerald-400 dark:text-white"><i class="fa fa-user mr-1 py-1 text-2xl"></i>
                  <?= user()->username ?></a>
              </li>
              <li class="group">
                <a href="<?= base_url('/logout'); ?>" class="text-base text-dark py-2 mx-2 flex group-hover:text-emerald-400 dark:text-white"><i class="fa fa-power-off text-2xl"></i>
                </a>
              </li>





              <?php
              $keranjang = $cart->contents();
              $jml_item = 0;
              foreach ($keranjang as $key => $value) {
                $jml_item = $jml_item + $value['qty'];
              }

              ?>

              <div class="relative flex justify-center items-center text-dark dark:text-white text-slate-900">
                <button class="relative flex justify-center items-center  rounded-sm group">
                  <i class="fa fa-cart-plus text-2xl -mt-5"><span class="badge badge-danger bg-red-500 flex rounded-full px-1 justify-center text-sm -mt-10 ml-5"><?= $jml_item ?></span></i>
                  <a href="<?= base_url('pelanggan/cart'); ?>" class="ml-1 hover:text-emerald-400">View Cart</a>
                  <div class="absolute w-96 h-96 hidden dark:text-slate-900 group-focus:block mt-48 -mb-80 bg-white rounded-md shadow-lg border border-gray-300">

                    <?php if (empty($keranjang)) { ?>
                      <a href="">
                        <p class="pb-20 h-20">Keranjang Belanja Kosong</p>
                      </a>
                    <?php } else { ?>
                      <?php foreach ($keranjang as $key => $value) { ?>
                        <div class="p-4">
                          <div class="flex items-center justify-between mb-2">
                            <div class="flex items-center">
                              <img class="w-10 h-10 rounded-full" src="<?= base_url('gambar_noken/' . $value['options']['gambar']) ?>" alt="Gambar Produk">
                              <span class="ml-2"><?= $value['name']; ?></span>
                            </div>
                            <span class="text-gray-600"><?= $value['qty'] ?>*<?= number_to_currency($value['price'], 'IDR') ?> = <?= number_to_currency($value['subtotal'], 'IDR') ?></span>
                          </div>
                        </div>
                      <?php } ?>
                      <a class="-mt-10 font-bold">Total: <?= number_to_currency($cart->total(), 'IDR'); ?></a>

                      <div class="flex justify-center mt-4">
                        <a href="#" class="bg-emerald-500 hover:bg-emerald-400 text-white py-2 px-4 rounded shadow-sm">Checkout</a>
                      </div>
                      <!-- Tombol checkout -->
                    <?php } ?>
                  </div>
                </button>
              </div>



              <li class="flex items-center pl-8 mt-3 lg:mt-0">
                <div class="flex">
                  <span class="mr-1 text-sm text-slate-500">light</span>
                  <input type="checkbox" class="hidden" id="dark-toggle">
                  <label for="dark-toggle">
                    <div class="flex h-5 w-9 cursor-pointer items-center rounded-full bg-slate-500 p-1">
                      <div class="toggle-sircle h-4 w-4 rounded-full bg-white transition duration-300 ease-in-out">
                      </div>
                    </div>
                  </label>
                  <span class="ml-1 text-sm text-slate-500">drak</span>
                </div>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- header end -->



  <form method="post" action="<?= site_url('pelanggan/cart'); ?>" target="_blank">

    <!-- produk section start -->
    <section id=" home" class="pt-20 pb-16 bg-slate-100 dark:bg-slate-800">
      <div class="container pb-96">
        <div class="w-full px-4 pt-4">
          <div class="container mx-auto py-8 bg-slate-200 rounded-md shadow-md mb-16">
            <div class="overflow-x-auto">

              <?php if (!empty(session()->getFlashdata('pesan'))) { ?>
                <div class=" alert alert-success bg-emerald-200 ml-96 w-80 rounded-md">
                  <?= session()->getFlashdata('pesan'); ?>
                </div>
              <?php } ?>

              <h2 class="mb-2 text-2xl font-bold text-emerald-400"><i class="fa fa-cart-plus text-slate-700 mr-2"></i>Keranjang Belanja</h2>
              <table class="w-full bg-white shadow-md rounded-md mb-4">
                <thead>
                  <tr class="bg-slate-300 text-emerald-600">
                    <th class="py-2 px-4 border-b border-gray-300 h-10">Jumlah Barang</th>
                    <th class="py-2 px-4 border-b border-gray-300 h-10">Gambar Barang</th>
                    <th class="py-2 px-4 border-b border-gray-300">Nama Barang</th>
                    <th class="py-2 px-4 border-b border-gray-300">Harga</th>
                    <th class="py-2 px-4 border-b border-gray-300">Total</th>
                    <th class="py-2 px-4 border-b border-gray-300">Aksi</th>
                  </tr>
                </thead>
                <tbody class="text-center bg-emerald-50">
                  <?php
                  $i = 1;
                  foreach ($cart->contents() as $key => $value) { ?>
                    <tr class="">
                      <td class="py-4 px-4 border-b border-slate-400"><input type="number" min="1" name="qty<?= $i++; ?>" class="form-control shadow-md rounded-md border border-slate-400 py-2 px-4 w-20" value="<?= $value['qty']; ?>"></td>
                      <td class="py-4 px-4 border-b border-slate-400">
                        <img class="w-10 h-10 rounded-full ml-16" src="<?= base_url('gambar_noken/' . $value['options']['gambar']) ?>" alt="Gambar Produk">
                      </td>
                      <td class="py-4 px-4 border-b border-slate-400">
                        Bahan <?= $value['name']; ?>
                        <br>
                        Motif <?= $value['options']['motif']; ?>
                        <br>
                        Ukuran <?= $value['options']['ukuran']; ?>
                      </td>
                      <td class="py-4 px-4 border-b border-slate-400"><?= number_to_currency($value['price'], 'IDR') ?></td>
                      <td class="py-4 px-4 border-b border-slate-400"><?php $hasil = (int) $value['price'] * (int) $value['qty'];
                                                                      echo  number_to_currency($hasil, 'IDR') ?></td>
                      <td class="py-4 px-4 border-b border-slate-400">
                        <a href="<?= base_url('pelanggan/delete/' . $value['rowid']); ?>" class="bg-red-600 hover:bg-red-500 rounded p-2 text-white" onclick="return confirm('Apakah Ingin Hapus Data..?')"><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>
                  <?php }
                  // var_dump($kota->rajaongkir->results[157]->city_name);
                  ?>
                </tbody>
              </table>
            </div>




            <div class="w-1/2  p-6 bg-emerald-100 rounded-md shadow-md mb-4 mt-5">
              <h2 class="text-2xl font-bold mb-6">Form Pengiriman Paket</h2>
              <div class="mb-4 form-group">
                <label for="provinsi" class="block font-medium mb-2">Provinsi</label>
                <select id="provinsi" name="nama_provinsi" class="w-full px-4 py-2 rounded-md border-gray-300 focus:outline-none focus:border-blue-500 form-control autosearch">
                </select>
              </div>
              <div class="mb-4 form-group">
                <label for="distrik" class="block font-medium mb-2">Kota/Kab</label>
                <select id="distrik" name="nama_distrik" class="w-full px-4 py-2 rounded-md border-gray-300 focus:outline-none focus:border-blue-500 form-control autosearch">
                </select>
              </div>
              <div class="mb-4 form-group">
                <label for="ekspedisi" class="block font-medium mb-2">Ekspedisi</label>
                <select id="ekspedisi" name="nama_ekspedisi" class="w-full px-4 py-2 rounded-md border-gray-300 focus:outline-none focus:border-blue-500 form-control autosearch">
                </select>
              </div>
              <div class="mb-4 form-group">
                <label for="paket" class="block font-medium mb-2">Paket</label>
                <select id="paket" name="nama_paket" class="w-full px-4 py-2 rounded-md border-gray-300 focus:outline-none focus:border-blue-500 form-control autosearch">
                </select>
              </div>
              <div class="row">

                <div class="col-md-3">
                  <div class="form-group pb-3">
                    <label for="">Berat</label>
                    <input type="text" class="p-3" name="total_berat" value="1200">
                  </div>
                  <div class="">
                    <input class="mb-3 p-3 " type="text" readonly name="provinsi">
                    <input class="mb-3 p-3 " type="text" readonly name="distrik">
                    <input class="mb-3 p-3 " type="text" readonly name="tipe">
                    <input class="mb-3 p-3 " type="text" readonly name="kodepos">
                    <input class="mb-3 p-3 " type="text" readonly name="ekspedisi">
                    <input class="mb-3 p-3 " type="text" readonly name="paket">
                    <input class="mb-3 p-3  number" readonly type="text" name="ongkir">
                    <input class="mb-3 p-3 " type="text" readonly name="estimasi">

                  </div>
                </div>
                <div class="">
                  <button type="submit"></button>
                </div>


                <!-- </form> -->
              </div>


              <?php if (isset($_POST['submit'])) : ?>
                <div class="container">
                  <div class="row">
                    <div class="col">
                      <h3>hasil</h3>
                      <strong>pengiriman dari: </strong>
                      <?= $hasil->rajaongkir->origin_details->city_name ?>
                      <?= $hasil->rajaongkir->origin_details->province ?>
                      <br>

                      <strong>Tujuan Ke: </strong>
                      <?= $hasil->rajaongkir->destination_details->city_name ?>
                      <?= $hasil->rajaongkir->destination_details->province ?>
                      <br>

                      <strong>Menggunakan Jasa Kurir: </strong>
                      <?= $hasil->rajaongkir->results[0]->name ?>
                      <br>

                      <strong>Berat Paket: </strong>
                      <?= ($hasil->rajaongkir->query->weight / 100) ?>Kg
                      <br>

                      <strong>Biaya Pengiriman: </strong><br>
                      <?php foreach ($hasil->rajaongkir->results[0]->costs as $biaya) : ?>
                        <?= $biaya->service ?>: Rp. <?= number_format($biaya->cost[0]->value) ?> (<?= $biaya->cost[0]->etd ?> hari) <br>
                      <?php endforeach; ?>
                      <br>
                    </div>
                  </div>
                </div>
              <?php endif; ?>







              <div class="flex flex-col items-start">

                <div id="total"></div>

                <input class="mb-3 p-3 " type="hidden" value="<?= $cart->total()  ?>" readonly id="harga" name="harga">
                <input class="mb-3 p-3 " type="hidden" readonly id="Totalharga" name="Totalharga">



              </div>
            </div>
          </div>
        </div>




    </section>
    <!-- portfolio section end -->
    <?= form_close(); ?>




    <!-- footer section start -->
    <footer class="bg-dark pt-24 pb-12 lg:mx-auto">
      <div class="container">
        <div class="flex flex-wrap">
          <div class="w-full px-4 mb-12 text-slate-300 font-medium md:w-1/3">
            <h2 class="font-bold text-4xl text-white">E-Commerce <P></P>Noken
              <p></p>Papua
            </h2>
            <h3 class="font-bold text-2xl mb-2">Hubungi Kami</h3>
            <p>jitmauyeheskiel@gmail.com</p>
            <p>Jl. Perumnas 2, Waena, SMA PGRI</p>
            <p>Jayapura</p>
          </div>
          <div class="w-full px-4 mb-12 md:w-1/3">
            <h3 class="font-semibold text-xl text-white mb-5">Kategori Content</h3>
            <ul class="text-slate-300">
              <li>
                <a href="#" class="inline-block text-base hover:text-primary mb-3">Produk Noken</a>
              </li>
            </ul>
          </div>
          <div class="w-full px-4 mb-12 md:w-1/3">
            <h3 class="font-semibold text-xl text-white mb-5">Tautan</h3>
            <ul class="text-slate-300">
              <li>
                <a href="#home" class="inline-block text-base hover:text-primary mb-3">Beranda</a>
              </li>
              <li>
                <a href="#about" class="inline-block text-base hover:text-primary mb-3">Info SMART</a>
              </li>
              <li>
                <a href="#portfolio" class="inline-block text-base hover:text-primary mb-3">Bukti Pembayaran</a>
              </li>
              <li>
                <a href="#clients" class="inline-block text-base hover:text-primary mb-3">Konfirmasi</a>
              </li>
              <li>
                <a href="#blog" class="inline-block text-base hover:text-primary mb-3">Akun Pelanggan</a>
              </li>
              <li>
                <a href="#contact" class="inline-block text-base hover:text-primary mb-3">Cart Produk</a>
              </li>
            </ul>
          </div>
        </div>

        <div class="w-full pt-10 border-t border-slate-700">
          <div class="flex items-center justify-center mb-3">
            <!-- youtube -->
            <a href="https://www.youtube.com/channel/UCdZZ_Ymk9fjYpoUOpfnQ1NQ" target="_blank" class="w-9 h-9 mr-3 rounded-full flex justify-center items-center border border-slate-300 text-slate-300 hover:border-primary hover:bg-primary hover:text-white">
              <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <title>YouTube</title>
                <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
              </svg>
            </a>

            <!-- instagram -->
            <a href="https://instagram.com/yeheskiel.jitmauu" target="_blank" class="w-9 h-9 mr-3 rounded-full flex justify-center items-center border border-slate-300 text-slate-300 hover:border-primary hover:bg-primary hover:text-white">
              <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <title>Instagram</title>
                <path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z" />
              </svg>
            </a>

            <!-- facebook -->
            <a href="https://facobook.com/yeheskiel jitmau" target="_blank" class="w-9 h-9 mr-3 rounded-full flex justify-center items-center border border-slate-300 text-slate-300 hover:border-primary hover:bg-primary hover:text-white">
              <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <title>Facebook</title>
                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
              </svg>
            </a>

            <!-- tik tok -->
            <a href="https://tiktok.com/@yeheskieljitmau" target="_blank" class="w-9 h-9 mr-3 rounded-full flex justify-center items-center border border-slate-300 text-slate-300 hover:border-primary hover:bg-primary hover:text-white">
              <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <title>TikTok</title>
                <path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z" />
              </svg>
            </a>

            <!-- linkedin -->
            <a href="https://tiktok.com/@yeheskieljitmau" target="_blank" class="w-9 h-9 mr-3 rounded-full flex justify-center items-center border border-slate-300 text-slate-300 hover:border-primary hover:bg-primary hover:text-white">
              <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <title>LinkedIn</title>
                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
              </svg>
            </a>


          </div>
          <p class="font-medium text-xs text-slate-500 text-center">Dibuat dengan ❤️
            oleh <a href="https://instagram.com/yeheskiel.jitmau" target="_blank" class="font-bold text-primary">Yeheskiel
              Jitmau</a>, Menggunakan
            <a href="https://tailwindcss.com" target="_blank" class="font-bold text-sky-500">Tailwind CSS</a>.
          </p>
        </div>
      </div>
    </footer>
    <!-- footer section end -->

    <!-- back to top start -->
    <a href="#home" class="fixed bottom-4 p-4 items-center justify-center right-4 z-[9999] h-14 w-14 rounded-full bg-primary hover:animate-pulse hidden" id="to-top">
      <span class="block h-5 w-5 border-t-2 border-l-2 rotate-45 mt-2"></span>
    </a>
    <!-- back to top end -->


    <script src="<?= base_url('template2') ?>/dist/js/script.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


</body>

</html>
<script src="<?= base_url('bootstrap') ?>/js/jquery.min.js"></script>
<script src="<?= base_url('bootstrap') ?>/js/bootstrap.min.js"></script>
<script>
  $(document).ready(function() {
    $.ajax({
      type: 'post',
      url: '/pelanggan/dataprov',
      success: function(hasil_prov) {
        $("select[name=nama_provinsi]").html(hasil_prov);
        // console.log(hasil);
      }
    });

    $("select[name=nama_provinsi]").on("change", function() {
      // ambil id_provinsi yang dipilih (dari atribut pribadi)
      var id_provinsi_terpilih = $("option:selected", this).attr("id_provinsi");
      // alert(id_provinsi_terpilih);
      $.ajax({
        type: 'post',
        url: '/pelanggan/datadistrik',
        data: 'id_provinsi=' + id_provinsi_terpilih,
        success: function(hasil_distrik) {
          // console.log(hasil_distrik);
          $("select[name=nama_distrik]").html(hasil_distrik);
        }
      });
    });

    $.ajax({
      type: 'post',
      url: '/pelanggan/dataekspedisi',
      success: function(hasil_ekspedisi) {
        // console.log(hasil_ekspedisi);
        $("select[name=nama_ekspedisi]").html(hasil_ekspedisi);
      }
    });
    $("select[name=nama_ekspedisi]").on("change", function() {
      // mendapatkan data ongkos kirim

      // mendapatkan ekspedisi yang dipilih
      var ekspedisi_terpilih = $("select[name=nama_ekspedisi").val();
      // alert(ekspedisi_terpilih);
      // mendapatkan id_distrik yang dipilih pengguna
      var distrik_terpilih = $("option:selected", "select[name=nama_distrik]").attr("id_distrik");
      // alert(distrik_terpilih);
      // mendapatkan total_berat dari inputan
      var total_berat = $("input[name=total_berat").val();
      $.ajax({
        type: 'post',
        url: '/pelanggan/datapaket',
        data: 'ekspedisi=' + ekspedisi_terpilih + '&distrik=' + distrik_terpilih + '&berat=' + total_berat,
        success: function(hasil_paket) {
          // console.log(hasil_paket);
          $("select[name=nama_paket]").html(hasil_paket);

          // letakan nama ekspedisi terpilih di input ekspedisi
          $("input[name=ekspedisi]").val(ekspedisi_terpilih);
        }
      })
    });

    $("select[name=nama_distrik]").on("change", function() {
      // ambil id_provinsi yang dipilih (dari atribut pribadi)
      var prov = $("option:selected", this).attr("nama_provinsi");
      var dist = $("option:selected", this).attr("nama_distrik");
      var tipe = $("option:selected", this).attr("tipe_distrik");
      var kodepos = $("option:selected", this).attr("kodepos");
      // alert(provinsi_terpilih);

      $("input[name=provinsi]").val(prov);
      $("input[name=distrik]").val(dist);
      $("input[name=tipe]").val(tipe);
      $("input[name=kodepos]").val(kodepos);
    });

    $("select[name=nama_paket]").on("change", function() {
      var paket = $("option:selected", this).attr("paket");
      var ongkir = $("option:selected", this).attr("ongkir");
      var etd = $("option:selected", this).attr("etd");
      var harga = $("#harga").val();

      var total1 = parseInt(ongkir) + parseInt(harga);
      var total2 = formatToCurrency(Number(total1));
      var ongkir2 = formatToCurrency(Number(ongkir));
      $("input[name=paket]").val(paket);
      $("input[name=ongkir]").val(ongkir2);
      $("input[name=estimasi]").val(etd);
      $("input[name=Totalharga]").val(total1);

      $("#total").html(`<p class="font-semibold bg-emerald-500 rounded-md shadow-md px-2 py-2">Subtotal ` +
        total2 +
        ` IDR
            </p>
            
            <div class="bg-emerald-500 hover:bg-emerald-400 px-2 py-2 rounded-md shadow-md mt-3 font-semibold">
              <button type="submit" id="pay-button" name="snap"><i class="fa fa-credit-card mr-2"></i>CekOut</button>
            </div>
            
            
            
            `);
    })
  });

  function formatToCurrency(amount) {
    return amount.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, "$&,");
  }
</script>