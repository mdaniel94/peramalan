<div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><i class="fa fa-user"></i> <span>Peramalan Penjualan</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile">
              <div class="profile_pic">
              
              <?php
              if(empty($gambar)){
				  ?>
                  
			  		<img src="images/user.png" alt="..." class="img-circle profile_img">
			  <?php }
			  else{ ?>
                <img src="images/<?php echo "$gambar";?>.jpg" alt="..." class="img-circle profile_img">
                <?php } ?>
              </div>
<?php
if($bagian =="administrasi"):
?>
              <div class="profile_info">
                <span>Welcome Bapak</span><br>
                <span><?php echo "$nama"; ?></span>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Anda Masuk Sebagai Administrasi</h3>
                <ul class="nav side-menu">
                  <li><a href="index.php"><i class="fa fa-home"></i> Home </a>
                  </li>
                  <li><a><i class="fa fa-users"></i> Tabel User <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="admininput_user.php">Data User</a></li>
                      <li><a href="admintabel_user.php">Tabel User</a></li>
                    </ul>
                  </li>
                  
                  <li><a><i class="fa fa-car"></i> Data Mobil <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="gudangtabel_mobil.php">Tabel Data Mobil </a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-users"></i> Pelanggan & Pemesanan Mobil <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="admininput_pemesanan.php">Input data pelanggan & Pemesanan</a></li>
                      <li><a href="admintabel_pemesanan.php">Tabel Data Pelanggan & Pemesanan</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-money"></i>Penjualan <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="admintabelkonfirmasi_penjualan.php">Input Penjualan</a></li>
                      <li><a href="admintabel_penjualan.php">Tabel Penjualan</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-car"></i> Peramalan <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="admininput_peramalan.php">Input Peramalan </a></li>
                      <li><a href="admintabel_peramalan.php">Input Peramalan </a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-file-text"></i>Laporan <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="tabellaporanperamalan.php">Laporan Peramalan</a></li>
                      <li><a href="tabellaporansuplie.php">Laporan Suplie</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
<?php
elseif($bagian =="gudang"):
?>
              <div class="profile_info">
                <span>Welcome Bapak</span><br>
                <span><?php echo "$nama"; ?></span>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Anda Masuk Sebagai Gudang</h3>
                <ul class="nav side-menu">
                  <li><a href="index.php"><i class="fa fa-home"></i> Home </a>
                  </li>
                  <li><a><i class="fa fa-car"></i> Data Pegawai <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="gudanginput_mobil.php">Input Data Mobil</a></li>
                      <li><a href="gudangtabel_mobil.php">Tabel Data Mobil</a></li>
                    </ul>
                  </li>
                
                </ul>
              </div>
            </div>
          </div>
        </div>
<?php
elseif($bagian =="kecab"):
?>
              <div class="profile_info">
                <span>Welcome Bapak</span><br>
                <span><?php echo "$nama"; ?></span>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Anda Masuk Sebagai Kepala Cabang</h3>
                <ul class="nav side-menu">
                  <li><a href="index.php"><i class="fa fa-home"></i> Home </a>
                  </li>
                  <li><a><i class="fa fa-file-text"></i>Laporan <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="tabellaporanpenjualan.php">Laporan Penjualan</a></li>
                      <li><a href="tabellaporansuplie.php">Laporan Suplie</a></li>
                      <li><a href="tabellaporanperamalan.php">Laporan Peramalan</a></li>
                      
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
<?php
endif;
?>