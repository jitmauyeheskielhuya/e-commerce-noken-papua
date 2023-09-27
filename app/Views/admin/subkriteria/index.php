<?= $this->extend('template/home'); ?>

<?= $this->Section('page-content'); ?>
<div class="page-wrapper">
  <div class="content container-fluid">
    <h4 class="text-emerald-400 pb-3">Halaman Data Subkriteria</h4>
    <div class="row pt-4 pb-4 rounded-md bg-slate-200">
      <div class="col">
        <p class="text-lg font-bold pt-3">Tabel Data Subkriteria</p>
        <a href="<?= base_url('subkriteria/tambah') ?>" class="px-2 py-2 rounded-md hover:bg-emerald-400 bg-emerald-300 shadow-md text-slate-900 hover:text-slate-900 font-bold focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 flex mb-3 w-28 h-10">Tambah Data</a>

        <?php
        if (!empty(session()->getFlashdata('success'))) { ?>
          <div class="col-3 alert alert-success">
            <?= session()->getFlashdata('success'); ?>
          </div>
        <?php } ?>

        <table class="w-full border border-slate-900 text-center datatable table table-stripped">
          <thead>
            <tr class="bg-emerald-200">
              <th class="py-2 px-4 border-b">No</th>
              <th class="py-2 px-4 border-b">Nama Kriteria</th>
              <th class="py-2 px-4 border-b">Range</th>
              <th class="py-2 px-4 border-b">Nilai</th>
              <th class="py-2 px-4 border-b">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1;
            foreach ($subkriteria as $sk => $value) { ?>
              <tr class="bg-emerald-100">
                <td class="py-3 px-4 border-b"><?= $no++; ?></td>
                <td class="py-3 px-4 border-b"><?= $value['nama_kriteria']; ?></td>
                <td class="py-3 px-4 border-b">
                  <?php
                   echo $value['range_depan_subkriteria'];
                  if($value['range_belakang_subkriteria'] != null && $value['range_depan_subkriteria'] != '>' && $value['range_depan_subkriteria'] != '<' && $value['range_depan_subkriteria'] !== ''  )
                  {
                    echo '-';
                  };
                  echo $value['range_belakang_subkriteria'];
                  ?>
                </td>
                <td class="py-3 px-4 border-b"><?= $value['nilai_subkriteria'] ?></td>
                <td class="py-3 px-4 border-b">
                  <!-- <a href="" class="bg-emerald-600 hover:bg-emerald-500 rounded p-2 text-white"><i class="fa fa-eye"></i></a> -->
                  <a href="<?= base_url('subkriteria/edit/' . $value['id_subkriteria']) ?>" class="bg-blue-600 hover:bg-blue-500 rounded p-2 text-white"><i class="fa fa-pen"></i></a>
                  <a href="<?= base_url('subkriteria/delete_subkriteria/' . $value['id_subkriteria']) ?>" class="bg-red-600 hover:bg-red-500 rounded p-2 text-white" onclick="return confirm('Apakah Ingin Hapus Data..?')"><i class="fa fa-trash"></i></a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <footer class="bg-slate-400 mt-96 rounded-t-md">
    <p class="text-emerald-600">Copyright © <?= date('Y'); ?> Yeheskiel Jitmau</p>
  </footer>
</div>
<?= $this->endSection(); ?>