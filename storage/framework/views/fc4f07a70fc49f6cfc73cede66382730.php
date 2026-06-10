<?php $__env->startSection('content'); ?>

<?php if(session('success')): ?>
    <div class="alert alert-success">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Data Siswa</h2>
    <div class="d-flex">
        <a href="/siswa/create" class="btn btn-primary me-2">Tambah Siswa</a>
        <a href="<?php echo e(route('siswa.export', ['filter' => $filter])); ?>" class="btn btn-success">Unduh Excel</a>
    </div>
</div>


<form method="GET" action="/siswa" class="mb-3 d-flex align-items-center">
    <label class="me-2"><strong>Filter:</strong></label>
    <select name="filter" class="form-select w-auto me-2" onchange="this.form.submit()">
        <option value="All" <?php echo e($filter == 'All' ? 'selected' : ''); ?>>Semua</option>
        <option value="Turalak" <?php echo e($filter == 'Turalak' ? 'selected' : ''); ?>>Turalak (TRK)</option>
        <option value="KelasJauh" <?php echo e($filter == 'KelasJauh' ? 'selected' : ''); ?>>Kelas Jauh (Non‑TRK)</option>
    </select>
</form>

<?php
    $grouped = $siswa->groupBy('kelas_jurusan');
?>

<?php $__currentLoopData = $grouped; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kelas => $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="card mb-4">
        <div class="card-header bg-info text-white">
            <strong><?php echo e($kelas); ?></strong>
        </div>
        <div class="card-body p-0">
            <table class="table table-bordered mb-0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NISN</th>
                        <th>JK</th>
                        <th>Alamat</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Pangkalan</th>
                        <th class="no-print">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td><?php echo e($item->nama); ?></td>
                            <td><?php echo e($item->nisn); ?></td>
                            <td><?php echo e($item->jk); ?></td>
                            <td><?php echo e($item->alamat); ?></td>
                            <td><?php echo e($item->tempat_lahir); ?></td>
                            <td><?php echo e($item->tanggal_lahir); ?></td>
                            <td><?php echo e($item->pangkalan); ?></td>
                            <td class="no-print">
                                <a href="/siswa/<?php echo e($item->id); ?>/koreksi" class="btn btn-warning btn-sm">Koreksi Data</a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\absensi-web\resources\views/siswa/index.blade.php ENDPATH**/ ?>