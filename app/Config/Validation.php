<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;
use Myth\Auth\Authentication\Passwords\ValidationRules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ValidationRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

  // --------------------------------------------------------------------
  // Rules
  // --------------------------------------------------------------------
  // Validasi data Produk
  public $produk = [
    'harga_noken' => 'required|max_length[50]',
    'ukuran_noken' => 'required|max_length[50]',
    'motif_noken' => 'required|max_length[50]',
    'jenis_noken' => 'required|max_length[50]',
    // 'nama_pengrajin' => 'required|max_length[50]',
    'lokasi_penjualan' => 'required|max_length[50]',
    'gambar_noken' => 'uploaded[gambar_noken]|mime_in[gambar_noken,image/jpg,image/jpeg,image/png,image/gif]|max_size[gambar_noken,50000]',
    'tgl_daftar' => 'required',
  ];

  public $produk_errors = [
    'harga_noken' => [
      'required' => 'wajib di isi tidak boleh kosong',
    ],
    'ukuran_noken' => [
      'required' => 'wajib di isi',
    ],
    'motif_noken' => [
      'required' => 'wajib di isi',
    ],
    'jenis_noken' => [
      'required' => 'wajib di isi',
    ],
    'nama_pengrajin' => [
      'required' => 'wajib di isi',
    ],
    'lokasi_penjualan' => [
      'required' => 'wajib di isi',
    ],
    'gambar_noken' => [
      'uploaded' => 'wajib di isi',
    ],
  ];
}
