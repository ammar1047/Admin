<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f5f7fa;
    }
    .sidebar {
      width: 250px;
      background-color: #27B3C6;
      color: white;
      position: fixed;
      height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }
    .sidebar .nav-link {
      color: white;
    }
    .sidebar .nav-link:hover {
      background-color: #1e9eb4;
      border-radius: 5px;
    }
    .main-content {
      margin-left: 250px;
      padding: 30px;
    }
    .card-box {
      background: #ffffff;
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
      margin-bottom: 20px;
    }
  </style>
</head>
<body>

  <div class="sidebar p-4">
    <div>
      <h4 class="fw-semibold mb-4">Dashboard Admin</h4>
      <nav class="nav flex-column">
        <a class="nav-link" href="#">🏠 Dashboard</a>

        <button class="nav-link text-start" data-bs-toggle="collapse" data-bs-target="#suratMenu" aria-expanded="false">
          ✉️ Surat
        </button>
        <div class="collapse ps-3" id="suratMenu">
        <a href="#" class="nav-link">Edit Surat</a>
          <a href="#" class="nav-link">Daftar Histori Surat</a>
        </div>

        <a class="nav-link" href="#">📄 Pengajuan Surat</a>
      </nav>
    </div>

    <div class="pt-3 border-top border-white">
      <a href="#" class="nav-link">Profile</a>
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-link nav-link p-0">Logout</button>
      </form>
    </div>
  </div>

  <!-- Ganti bagian ini di dalam <div class="main-content"> -->
<div class="main-content">
  <!-- Section Card Atas -->
  <div class="bg-info p-4 rounded text-white mb-4">
    <div class="row g-4">
      <!-- Card 1 -->
      <div class="col-md-4">
        <div class="bg-white text-dark rounded shadow-sm p-3 position-relative">
          <div class="position-absolute top-0 end-0 m-2 bg-light rounded-circle p-2">
            <i class="bi bi-people-fill text-primary"></i>
          </div>
          <div class="small text-muted">Karyawan</div>
          <div class="h3 fw-bold">216</div>
          <div class="small text-muted">Active</div>
        </div>
      </div>
      <!-- Card 2 -->
      <div class="col-md-4">
        <div class="bg-white text-dark rounded shadow-sm p-3 position-relative">
          <div class="position-absolute top-0 end-0 m-2 bg-light rounded-circle p-2">
            <i class="bi bi-envelope-paper-fill text-primary"></i>
          </div>
          <div class="small text-muted">Pengajuan Surat</div>
          <div class="h3 fw-bold">57</div>
          <div class="small text-muted">Semua jenis</div>
        </div>
      </div>
      <!-- Card 3 -->
      <div class="col-md-4">
        <div class="bg-white text-dark rounded shadow-sm p-3 position-relative">
          <div class="position-absolute top-0 end-0 m-2 bg-light rounded-circle p-2">
            <i class="bi bi-hash text-primary"></i>
          </div>
          <div class="small text-muted">No Surat</div>
          <div class="h3 fw-bold">44</div>
          <div class="small text-muted">Terpakai</div>
        </div>
      </div>
    </div>
  </div>

  <!-- Section Chart -->
  <div class="row">
    <div class="col-md-6">
      <div class="card-box">
        <div class="fw-semibold mb-2">OVERALL STATISTIC</div>
        <canvas id="barChart"></canvas>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card-box">
        <div class="d-flex justify-content-between align-items-center mb-2">
          <div class="fw-semibold">Pengajuan Surat</div>
          <select class="form-select w-auto">
            <option>Month</option>
          </select>
        </div>
        <canvas id="lineChart"></canvas>
      </div>
    </div>
  </div>
</div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    const ctx1 = document.getElementById('barChart');
    new Chart(ctx1, {
      type: 'bar',
      data: {
        labels: ['Sept 1-6', 'Sept 7-12', 'Sept 13-18', 'Sept 19-24', 'Sept 25-30'],
        datasets: [
          { label: 'Pengajuan Surat', data: [30, 35, 40, 45, 25], backgroundColor: '#29b6f6' },
          { label: 'No Surat', data: [10, 15, 20, 15, 10], backgroundColor: '#4dd0e1' },
          { label: 'Karyawan', data: [40, 38, 42, 50, 30], backgroundColor: '#0288d1' }
        ]
      }
    });

    const ctx2 = document.getElementById('lineChart');
    new Chart(ctx2, {
      type: 'line',
      data: {
        labels: ['1', '2', '3', '4', '5', '6', '7'],
        datasets: [
          { label: 'Cuti Karyawan', data: [10, 20, 15, 25, 30, 28, 24], borderColor: '#e91e63', fill: false },
          { label: 'Pengajuan Karyawan', data: [30, 40, 35, 50, 60, 55, 48], borderColor: '#03a9f4', fill: false },
          { label: 'Surat Rekomendasi', data: [5, 10, 8, 15, 20, 18, 14], borderColor: '#8bc34a', fill: false },
          { label: 'Keterangan Karyawan', data: [12, 18, 14, 20, 24, 22, 19], borderColor: '#ff9800', fill: false }
        ]
      }
    });
  </script>
</body>
</html>
