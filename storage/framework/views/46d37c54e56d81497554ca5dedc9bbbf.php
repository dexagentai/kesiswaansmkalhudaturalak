<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    
    <div class="text-center mb-4">
        <h2 class="fw-bold text-success">Dashboard Kesiswaan</h2>
        <p class="text-muted">Sistem Data & Absensi SMK AL HUDA TURALAK</p>
        <hr>
    </div>

    
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card shadow-sm border-0" style="background-color:#f1f8e9;">
                <div class="card-body text-center">
                    <h6 class="text-secondary">Total Siswa</h6>
                    <h3 class="fw-bold text-success"><?php echo e($totalSiswa); ?></h3>
                    <i class="bi bi-people-fill text-success fs-3"></i>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0" style="background-color:#f1f8e9;">
                <div class="card-body text-center">
                    <h6 class="text-secondary">Siswa TRK</h6>
                    <h3 class="fw-bold text-success"><?php echo e($totalTRK); ?></h3>
                    <i class="bi bi-person-fill text-success fs-3"></i>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0" style="background-color:#f1f8e9;">
                <div class="card-body text-center">
                    <h6 class="text-secondary">Jurusan</h6>
                    <h3 class="fw-bold text-success">6</h3>
                    <i class="bi bi-building text-success fs-3"></i>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0" style="background-color:#f1f8e9;">
                <div class="card-body text-center">
                    <h6 class="text-secondary">Total Kelas</h6>
                    <h3 class="fw-bold text-success">19</h3>
                    <i class="bi bi-journal-bookmark text-success fs-3"></i>
                </div>
            </div>
        </div>
    </div>

    
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">
            <h5 class="fw-bold text-success mb-3">Grafik Jumlah Siswa per Jurusan</h5>
            <canvas id="chartJurusan"></canvas>
        </div>
    </div>

<div class="card shadow-sm border-0 mb-4">
    <div class="card-body">
        <h5 class="fw-bold text-success mb-3">Daftar Jurusan & Kelas (Siswa Turalak)</h5>
        <p class="text-muted">Data berikut hanya menampilkan jumlah siswa dengan pangkalan TRK (Turalak).</p>

        <?php
            $jurusanList = ['LPS','MPLB','DKV','TKJ','TKRO','TF'];
        ?>

        <table class="table table-bordered text-center">
            <thead class="table-success">
                <tr>
                    <th>Jurusan</th>
                    <th>Kelas X</th>
                    <th>Kelas XI</th>
                    <th>Kelas XII</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $jurusanList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jurusan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $xCount = \App\Models\Siswa::where('pangkalan','TRK')->where('kelas_jurusan','X '.$jurusan)->count();
                        $xiCount = \App\Models\Siswa::where('pangkalan','TRK')->where('kelas_jurusan','XI '.$jurusan)->count();
                        $xiiCount = \App\Models\Siswa::where('pangkalan','TRK')->where('kelas_jurusan','XII '.$jurusan)->count();
                    ?>
                    <tr>
                        <td><?php echo e($jurusan); ?></td>
                        <td><?php echo e($xCount); ?></td>
                        <td><?php echo e($xiCount); ?></td>
                        <td><?php echo e($xiiCount); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>

    
    <footer class="text-center text-muted mt-4">
        <small>© 2026 SMK AL HUDA TURALAK — Sistem Kesiswaan Terintegrasi</small>
    </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('chartJurusan');
new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?php echo json_encode($kelasList->pluck('kelas_jurusan'), 15, 512) ?>,
        datasets: [{
            label: 'Jumlah Siswa',
            data: <?php echo json_encode($kelasList->map(fn($k) => \App\Models\Siswa::where('kelas_jurusan', $k->kelas_jurusan)->count()), 512) ?>,
            backgroundColor: '#43a047'
        }]
    },
    options: {
        plugins: { legend: { display: false } },
        scales: { y: { beginAtZero: true } }
    }
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\absensi-web\resources\views/dashboard/index.blade.php ENDPATH**/ ?>