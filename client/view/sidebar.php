 <!-- Sidebar -->
 <ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">Administrasi</h6>
            <a onclick="tampil_jorong()" class="dropdown-item" href="#">Jorong</a>
            <a onclick="tampil_nagari()" class="dropdown-item" href="#">Nagari</a>
            <a class="dropdown-item" onclick="tampil_hutan()" href="#">Hutan</a>
            <a class="dropdown-item" onclick="tampil_bangunan()" href="#">Bangunan</a>
            <a class="dropdown-item" onclick="tampil_jalan()" href="#">Jalan</a>
            <a class="dropdown-item" onclick="tampil_sawah()" href="#">Sawah</a>
           
            <a class="dropdown-item" onclick="tampil_sungai()" href="#">Sungai</a>
            <div class="dropdown-divider"></div>
            <h6 class="dropdown-header">Bangunan:</h6>
            <a class="dropdown-item" onclick="tampil_rumah_kg()" href="#">Rumah Berisi</a>
            <a class="dropdown-item" onclick="tampil_rumah_kosong_kg()"href="#">Rumah Kosong</a>
            <a class="dropdown-item" onclick="tampil_bukan_rumah_kg()" href="#">Bukan Rumah</a>
            <a class="dropdown-item" onclick="tampil_allrumah()" href="#">Semua Bangunan</a>
            <a class="dropdown-item" onclick="tampil_industri()" href="#">Bangunan Industri</a>
            

             <div class="dropdown-divider"></div>
            <h6 class="dropdown-header">Ekonomi:</h6>
            <a class="dropdown-item" onclick='tabungan()' href="#">Tabungan</a>
            <a class="dropdown-item" onclick='asuransi()' href="#">Asuransi</a>

            
           
            
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
        </li>
      </ul>
