<?php $__env->startSection('content'); ?>
<h2>Tambah Data Siswa</h2>
<form action="/siswa" method="POST">
    <?php echo csrf_field(); ?>
    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>NISN</label>
        <input type="text" name="nisn" class="form-control">
    </div>
    <div class="mb-3">
        <label>Jenis Kelamin</label>
        <select name="jk" class="form-control" required>
            <option value="L">Laki-laki</option>
            <option value="P">Perempuan</option>
        </select>
    </div>
    <div class="mb-3">
        <label>Kelas/Jurusan</label>
        <select name="kelas_jurusan" class="form-control" required>
            <option value="">-- Pilih Kelas/Jurusan --</option>
            <option value="X TKJ">X TKJ</option>
            <option value="XI TKJ">XI TKJ</option>
            <option value="XII TKJ">XII TKJ</option>
            <option value="X TKRO">X TKRO</option>
            <option value="XI TKRO">XI TKRO</option>
            <option value="XII TKRO">XII TKRO</option>
            <option value="X LPS">X LPS</option>
            <option value="XI LPS">XI LPS</option>
            <option value="XII LPS">XII LPS</option>
            <option value="X MPLB">X MPLB</option>
            <option value="XI MPLB">XI MPLB</option>
            <option value="XII MPLB">XII MPLB</option>
            <option value="X TF">X TF</option>
            <option value="XI TF">XI TF</option>
            <option value="XII TF">XII TF</option>
            <option value="X DKV">X DKV</option>
            <option value="XI DKV">XI DKV</option>
            <option value="XII DKV">XII DKV</option>
        </select>
    </div>
    <div class="mb-3">
        <label>Alamat</label>
        <input type="text" name="alamat" class="form-control">
    </div>
    <div class="mb-3">
        <label>Tempat Lahir</label>
        <input type="text" name="tempat_lahir" class="form-control">
    </div>
    <div class="mb-3">
        <label>Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\absensi-web\resources\views/siswa/create.blade.php ENDPATH**/ ?>