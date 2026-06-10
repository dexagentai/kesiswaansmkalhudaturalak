<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <div class="text-center mb-4">
        <h2 class="fw-bold text-success">Menu Administrasi</h2>
        <p class="text-muted">Dokumen administrasi sekolah yang siap diunduh.</p>
        <hr>
    </div>

    <table class="table table-bordered table-hover">
        <thead class="table-success text-center">
            <tr>
                <th>Nama Dokumen</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $dokumen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($file['nama']); ?></td>
                    <td class="text-center">
                        <a href="<?php echo e(asset($file['path'])); ?>" class="btn btn-success btn-sm" download>
                            <i class="bi bi-download me-1"></i>Unduh
                        </a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <footer class="text-center text-muted mt-5">
        <small>© <?php echo e(date('Y')); ?> SMK AL HUDA TURALAK — Administrasi Sekolah</small>
    </footer>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\absensi-web\resources\views/administrasi/index.blade.php ENDPATH**/ ?>