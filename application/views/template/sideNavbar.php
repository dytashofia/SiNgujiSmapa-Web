<!-- File ini berfungsi sebagai tampila Sidebar / Side Navbar / Bar bagian samping dalam semua tampilan halaman baik guru maupun admin -->
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Home</div>
                    <a class="nav-link" href="overview">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading"></div>
                        <a  class="nav-link collapsed" data-toggle="collapse" href="#sub-item-1">
                            Menu Admin <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"></span>
                            <div class="sb-sidenav-collapse-arrow"></i></div>
                        </a>
                        <ul class="children collapse" id="sub-item-1">
                            <li>
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?= base_url('login/loginadm'); ?>">Login</a>
                                </nav>
                            </li>
                        </ul>
                   

                    <div class="sb-sidenav-menu-heading">Menu Guru</div>
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Soal
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="<?= base_url('tampilPaket'); ?>">Paket Soal</a>
                        </nav>
                    </div>
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="<?= base_url('guru/setUjian/tampilDujian'); ?>">Set Ujian</a>
                        </nav>
                    </div>
                    
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                        Manajemen Nilai
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                     <div class="collapse" id="collapsePages" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="<?= base_url('nilai'); ?>">Data Nilai</a>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                <?php
                // Menguji apakah session memiliki data
                if (isset($_SESSION['nama_user'])) {
                    // Jika memiliki data maka tampilkan nama user
                    echo $_SESSION['nama_user'];
                } else {
                    // Jika tidak memiliki data maka jangan tampilkan apa apa
                }

                ?>
            </div>
        </nav>
    </div>