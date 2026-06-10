<?php $__env->startSection('content'); ?>
<div class="no-print">
    <h2>Absensi Siswa</h2>
    <form action="/absensi" method="GET" class="mb-3 d-flex gap-2">
        <select name="kelas" class="form-control">
            <option value="">-- Pilih Kelas --</option>
            <?php $__currentLoopData = $kelasList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($k); ?>" <?php echo e($kelas == $k ? 'selected' : ''); ?>><?php echo e($k); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>

        <select name="jurusan" class="form-control">
            <option value="">-- Pilih Jurusan --</option>
            <?php $__currentLoopData = $jurusanList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $j): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($j); ?>" <?php echo e($jurusan == $j ? 'selected' : ''); ?>><?php echo e($j); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>

        <button type="submit" class="btn btn-primary">Tampilkan</button>
    </form>
</div>

<?php if($kelas && $jurusan): ?>
<div style="text-align:center; margin-bottom:10px;">
    <h3>YAYASAN AL HUDA TURALAK</h3>
    <h4>SEKOLAH MENENGAH KEJURUAN (SMK) AL HUDA TURALAK</h4>
    <p>Status Terakreditasi A<br>
    Jl. Raya Turalak No. 43 Turalak – Telp. (0265) 431043</p>
    <hr>
    <h4>DAFTAR HADIR PESERTA DIDIK</h4>
</div>

<table style="width:100%; margin-bottom:10px;">
    <tr>
        <td>Nama Guru :</td>
        <td>__________________________</td>
    </tr>
    <tr>
        <td>Mata Pelajaran :</td>
        <td>__________________________</td>
    </tr>
    <tr>
        <td>Kelas/Jurusan :</td>
        <td><?php echo e($kelas); ?> <?php echo e($jurusan); ?></td>
    </tr>
</table>

<table class="table table-bordered" style="font-size:13px;">
    <thead>
        <tr>
            <th>No</th>
            <th>NIS</th>
            <th>Nama Peserta Didik</th>
            <?php for($i = 1; $i <= 31; $i++): ?>
                <th><?php echo e($i); ?></th>
            <?php endfor; ?>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $siswa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($index + 1); ?></td>
                <td><?php echo e($item->nisn); ?></td>
                <td><?php echo e($item->nama); ?></td>
                <?php for($i = 1; $i <= 31; $i++): ?>
                    <td></td>
                <?php endfor; ?>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>

<div style="margin-top:30px;">
    <table style="width:100%;">
        <tr>
            <td style="text-align:center;">
                Mengetahui,<br>
                Waka Kurikulum<br><br><br>
                ________________________
            </td>
            <td style="text-align:center;">
                Garut, __________ 2026<br>
                Guru Mapel<br><br><br>
                ________________________
            </td>
        </tr>
    </table>
</div>


<div class="no-print mt-3">
    <a href="<?php echo e(route('absensi.export', ['kelas' => $kelas, 'jurusan' => $jurusan])); ?>" class="btn btn-success">
        Unduh Absensi (Excel)
    </a>
</div>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\absensi-web\resources\views/absensi/index.blade.php ENDPATH**/ ?>