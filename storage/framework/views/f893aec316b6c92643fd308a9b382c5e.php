<?php $__env->startSection('content'); ?>
<h2>Koreksi Data Siswa</h2>
<form action="/siswa/<?php echo e($siswa->id); ?>/koreksi" method="POST">
    <?php echo csrf_field(); ?>
    <div class="mb-3">
        <label>Nama Siswa</label>
        <input type="text" value="<?php echo e($siswa->nama); ?>" class="form-control" readonly>
    </div>
    <div class="mb-3">
        <label>Komentar Koreksi</label>
        <textarea name="isi_komentar" class="form-control" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Kirim Koreksi</button>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\absensi-web\resources\views/siswa/koreksi.blade.php ENDPATH**/ ?>