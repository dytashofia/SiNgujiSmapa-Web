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
                    <div class="sb-sidenav-menu-heading">Menu Admin</div>
                        <a  class="nav-link collapsed" data-toggle="collapse" href="#sub-item-1">
                            Master <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"></span>
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <ul class="children collapse" id="sub-item-1">
                            <li>
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?= base_url('admin/Admin/tampilSiswa'); ?>">Siswa</a>
                                </nav>
                            </li>
                            <li>
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?= base_url('jurusan'); ?>">Guru</a>
                                </nav>
                            </li>
                            <li>
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?= base_url(''); ?>">Jurusan</a>
                                </nav>
                            </li>
                        </ul>
                   

                    <div class="sb-sidenav-menu-heading"></div>
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Menu Guru
                        <div class="sb-sidenav-collapse-arrow"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="<?= base_url('login/login/'); ?>">Login</a>
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