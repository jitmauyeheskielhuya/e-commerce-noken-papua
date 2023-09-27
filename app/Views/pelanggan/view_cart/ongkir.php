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

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>



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

<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SET_YOUR_CLIENT_KEY_HERE"></script>
</head>

<body>

  <!-- header start -->

  <!-- header end -->





  <!-- produk section start -->
  <section id="home" class="pt-20 pb-16 bg-slate-100 dark:bg-slate-800">
    <div class="container">
      <div class="row">
        <div class="w-1/2  p-6 bg-emerald-100 rounded-md shadow-md mb-4 mt-5">
          <h2 class="text-2xl font-bold mb-6">Form Pengiriman Paket</h2>
          <form method="post" action="<?= site_url('ongkir/cekongkir'); ?>">
            <div class="mb-4 form-group">
              <label for="asal" class="block font-medium mb-2">Pilih Asal Kota</label>
              <select id="asal" name="asal" class="w-full px-4 py-2 rounded-md border-gray-300 focus:outline-none focus:border-blue-500 form-control autosearch">
                <option value="">Pilih Asal Kota</option>
                <?php if ($kota) : ?>
                  <?php foreach ($kota->rajaongkir->results as $kt) : ?>
                    <option value="<?= $kt->city_id; ?>"><?= $kt->city_name; ?></option>
                  <?php endforeach; ?>
                <?php endif; ?>
                <!-- Tambahkan opsi kota lainnya di sini -->
              </select>
            </div>
            <div class="mb-4 form-group">
              <label for="tujuan" class="block font-medium mb-2">Pilih Tujuan Kota</label>
              <select id="tujuan" name="tujuan" class="w-full px-4 py-2 rounded-md border-gray-300 focus:outline-none focus:border-blue-500 form-control autosearch">
                <option value="">Pilih Tujuan Kota</option>
                <?php if ($kota) : ?>
                  <?php foreach ($kota->rajaongkir->results as $kt) : ?>
                    <option value="<?= $kt->city_id; ?>"><?= $kt->city_name; ?></option>
                  <?php endforeach; ?>
                <?php endif; ?>
                <!-- Tambahkan opsi kota lainnya di sini -->
              </select>
            </div>
            <div class="mb-4 form-group">
              <label for="berat" class="block font-medium mb-2">Berat Paket (kg)</label>
              <input type="number" id="berat" name="berat" class="w-full px-4 py-2 rounded-md border-gray-300 focus:outline-none focus:border-blue-500" min="0">
            </div>
            <div class="mb-4 form-group">
              <label for="kurir" class="block font-medium mb-2">Jenis Kurir</label>
              <select id="kurir" name="kurir" class="w-full px-4 py-2 rounded-md border-gray-300 focus:outline-none focus:border-blue-500">
                <option value="">Pilih Jenis Kurir</option>
                <option value="jne">JNE</option>
                <option value="tiki">TIKI</option>
                <option value="pos">POS Indonesia</option>
                <!-- Tambahkan opsi kurir lainnya di sini -->
              </select>
            </div>
            <div class="bg-emerald-500 hover:bg-emerald-400 px-2 py-2 rounded-md shadow-md mt-3 font-semibold w-20">
              <button type="submit" class="">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>


    </div>
  </section>
  <!-- portfolio section end -->



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