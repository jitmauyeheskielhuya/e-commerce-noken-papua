<?php

namespace App\Controllers;

use \CodeIgniter\Controller;
use \App\Models\ProdukModel;
use App\Controllers\BaseController;
use App\Models\PembelianModel;
use App\Models\PemesananModel;
use App\Models\UsersModel;
use \App\Models\KriteriaModel;
use App\Models\ProdukKriteriaModel;


class Pengrajin extends BaseController
{
  protected $ProdukModal;
  protected $pembelianModel;
  protected $pemesananModel;
  protected $userModel;
  protected $produkKriteriaModel;
  protected $KriteriaModel;
  
  public function __construct()
  {
    helper('form');
    $this->ProdukModal = new ProdukModel();
    $this->pembelianModel = new PembelianModel();
    $this->pemesananModel = new PemesananModel();
    $this->userModel = new UsersModel();
    $this->produkKriteriaModel = new ProdukKriteriaModel();
    $this->KriteriaModel = new KriteriaModel();
  }

  
  public function index()
  {
    return view('pengrajin/home_pengrajin');
  }

  public function produk()
  {
    $data = [
      'produk' => $this->ProdukModal->get_produk(),
    ];
    return view('pengrajin/produk/index', $data);
  }

  public function tambah_produk()
  {
    return view('pengrajin/produk/tambah');
  }

  public function save()
  {
    $validation = \Config\Services::validation();
    // mengambil file upload
    $image = $this->request->getFile('gambar_noken');
    // rendom file
    $name = $image->getRandomName();

    $data = [
      'harga_noken' => $this->request->getPost('harga_noken'),
      'ukuran_noken' => $this->request->getPost('ukuran_noken'),
      'motif_noken' => $this->request->getPost('motif_noken'),
      'jenis_noken' => $this->request->getPost('jenis_noken'),
      'berat_noken' => $this->request->getPost('berat_noken'),
      'id_pengrajin' => user()->id,
      'lokasi_penjualan' => $this->request->getPost('lokasi_penjualan'),
      'gambar_noken' => $name,
      'tgl_daftar' => $this->request->getPost('tgl_daftar'),
    ];

    if ($validation->run($data, 'produk') == false) {
      session()->setFlashdata('inputs', $this->request->getPost());
      session()->setFlashdata('errors', $validation->getErrors());
      return redirect()->to(base_url('produk/tambah'));
    } else {
      $image->move(ROOTPATH . 'public/gambar_noken', $name);
      $this->ProdukModal->tambah_produk($data);
      session()->setFlashdata('success', 'Data Berhasil Ditambahkan');
      return redirect()->to(base_url('produk'));
    }
  }

  public function edit_produk($id_produk)
  {
    $data = [
      'produk' => $this->ProdukModal->edit_produk($id_produk),
    ];
    return view('pengrajin/produk/edit', $data);
  }

  public function update_produk($id_produk)
  {
    $validation = \Config\Services::validation();


    $data = [
      'harga_noken' => $this->request->getPost('harga_noken'),
      'ukuran_noken' => $this->request->getPost('ukuran_noken'),
      'motif_noken' => $this->request->getPost('motif_noken'),
      'jenis_noken' => $this->request->getPost('jenis_noken'),
      // 'nama_pengrajin' => $this->request->getPost('nama_pengrajin'),
      'lokasi_penjualan' => $this->request->getPost('lokasi_penjualan'),
      // 'gambar_noken' => $this->request->getPost('gambar_noken'),
      'tgl_daftar' => $this->request->getPost('tgl_daftar'),
    ];

    // mengambil file upload
    $image = $this->request->getFile('gambar_noken');
    // rendom file
    if ($image->getName() != '') {
      $name = $image->getRandomName();
      $image->move(ROOTPATH . 'public/gambar_noken', $name);
      $data['gambar_noken'] = $name;
    }

    $this->ProdukModal->update_produk($data, $id_produk);
    session()->setFlashdata('success', 'Data Berhasil Diupdate !!!');
    return redirect()->to(base_url('produk'));
  }



  public function detail_produk()
  {
    return view('pengrajin/detail_produk/index');
  }


  public function pemesanan_produk()
  {
    $data['pemesanan'] = $this->pemesananModel->getAll();

    return view('pengrajin/pemesanan_produk/index', $data);
  }

  public function perkembangan_ikm()
  {
    return view('pengrajin/perkembangan_ikm/index');
  }

  public function delete_produk($id_produk)
  {
    $this->ProdukModal->delete_produk($id_produk);
    session()->setFlashdata('success', 'Data Berhasil Dihapus !!!');
    return redirect()->to(base_url('produk'));
  }





  // Kriteria
  public function kriteria_produk($id_produk)
  {
    $data = [
      'kriteria_produk' => $this->produkKriteriaModel->get_kriteria_produk($id_produk),
      'produk' => $this->ProdukModal->edit_produk($id_produk),
    ];
    return view('pengrajin/kriteria_produk/index', $data);


  }

  public function tambah_kriteria_produk($id_produk)
  {
    $data = [
      'kriteria' => $this->KriteriaModel->get_kriteria(),
      'id_produk' => $id_produk
    ];
    return view('pengrajin/kriteria_produk/tambah', $data); 
  }

  public function save_kriteria_produk()
  {
   
    $id = $this->request->getPost('id_produk');
    $data = [
      'id_kriteria' => $this->request->getPost('id_kriteria'),
      'range_depan_kp' => $this->request->getPost('range_depan_kp'),
      'range_belakang_kp' => $this->request->getPost('range_belakang_kp'),
      'satuan_kp' => $this->request->getPost('satuan_kp'),
      'id_produk' => $this->request->getPost('id_produk'),
    ];
    $this->produkKriteriaModel->tambah_kriteria_produk($data);
    session()->setFlashdata('success', 'Data Berhasil Ditambahkan');
    return redirect()->to(base_url('produk/kriteria_produk/'.$id));
  }


  public function edit_kriteria_produk($id_kriteria_produk)
  {
    $data = [
      'kriteria' => $this->KriteriaModel->get_kriteria(),
      'id_kriteria_produk' => $id_kriteria_produk,
      'kriteria_produk' => $this->produkKriteriaModel->edit_kriteria_produk($id_kriteria_produk),
    ];
    return view('pengrajin/kriteria_produk/edit', $data); 
  }

  public function update_kriteria_produk()
  {
  
    $data = [
      'id_kriteria' => $this->request->getPost('id_kriteria'),
      'range_depan_kp' => $this->request->getPost('range_depan_kp'),
      'range_belakang_kp' => $this->request->getPost('range_belakang_kp'),
      'satuan_kp' => $this->request->getPost('satuan_kp'),
    ];

    $id_kriteria_produk = $this->request->getPost('id_kriteria_produk_');
    $id_produk = $this->request->getPost('id_produk');

    $this->produkKriteriaModel->update_produk_kriteria($data, $id_kriteria_produk);
    session()->setFlashdata('success', 'Data Berhasil Diupdate !!!');
    return redirect()->to(base_url('produk/kriteria_produk/'.$id_produk));
  }
  
  public function delete_kriteria_produk($id_kriteria_produk)
  {
    $data = $this->produkKriteriaModel->edit_kriteria_produk($id_kriteria_produk);
    $id_produk = $data['id_produk'];
    $this->produkKriteriaModel->delete_kriteria_produk($id_kriteria_produk);
    session()->setFlashdata('success', 'Data Berhasil Dihapus !!!');
    return redirect()->to(base_url('produk/kriteria_produk/'.$id_produk));
  }

  
}
