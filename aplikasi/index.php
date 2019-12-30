<?php
if(!isset($_SESSION)) {
     session_start();}
   include "../login/connect.php";
if(isset($_SESSION['username'])){
  include("session.php");?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Home | Menu Utama</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <?php include("menu.php");?>
            <!-- /sidebar menu -->

        <!-- top navigation -->
        <?php include("topmenu.php");?>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Home Peramalan <small>Selamat Datang Anda masuk sebagai <?php echo $bagian; ?> </small></h3>
                
              </div>
              <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Line Graph</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div id="echart_line" style="height:450px;"></div>

                  </div>
                </div>
              </div>
            </div>
              
            </div>
            
            
            
            </div>
            <div class="clearfix"></div>
          </div>
        </div>

        <!-- /page content -->

        <!-- footer content -->
        <?php include("footer.php");?>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
    
  <!-- ECharts -->
    <script src="vendors/echarts/dist/echarts.min.js"></script>
    <script src="vendors/echarts/map/js/world.js"></script>
    
    <script>

      var theme = {
          color: [
              '#26B99A', '#34495E', '#BDC3C7', '#3498DB',
              '#9B59B6', '#8abb6f', '#759c6a', '#bfd3b7'
          ],

          title: {
              itemGap: 8,
              textStyle: {
                  fontWeight: 'normal',
                  color: '#408829'
              }
          },

          dataRange: {
              color: ['#1f610a', '#97b58d']
          },

          toolbox: {
              color: ['#408829', '#408829', '#408829', '#408829']
          },

          tooltip: {
              backgroundColor: 'rgba(0,0,0,0.5)',
              axisPointer: {
                  type: 'line',
                  lineStyle: {
                      color: '#408829',
                      type: 'dashed'
                  },
                  crossStyle: {
                      color: '#408829'
                  },
                  shadowStyle: {
                      color: 'rgba(200,200,200,0.3)'
                  }
              }
          },

          dataZoom: {
              dataBackgroundColor: '#eee',
              fillerColor: 'rgba(64,136,41,0.2)',
              handleColor: '#408829'
          },
          grid: {
              borderWidth: 0
          },

          categoryAxis: {
              axisLine: {
                  lineStyle: {
                      color: '#408829'
                  }
              },
              splitLine: {
                  lineStyle: {
                      color: ['#eee']
                  }
              }
          },

          valueAxis: {
              axisLine: {
                  lineStyle: {
                      color: '#408829'
                  }
              },
              splitArea: {
                  show: true,
                  areaStyle: {
                      color: ['rgba(250,250,250,0.1)', 'rgba(200,200,200,0.1)']
                  }
              },
              splitLine: {
                  lineStyle: {
                      color: ['#eee']
                  }
              }
          },
          force: {
              itemStyle: {
                  normal: {
                      linkStyle: {
                          strokeColor: '#408829'
                      }
                  }
              }
          },
          chord: {
              padding: 4,
              itemStyle: {
                  normal: {
                      lineStyle: {
                          width: 1,
                          color: 'rgba(128, 128, 128, 0.5)'
                      },
                      chordStyle: {
                          lineStyle: {
                              width: 1,
                              color: 'rgba(128, 128, 128, 0.5)'
                          }
                      }
                  },
                  emphasis: {
                      lineStyle: {
                          width: 1,
                          color: 'rgba(128, 128, 128, 0.5)'
                      },
                      chordStyle: {
                          lineStyle: {
                              width: 1,
                              color: 'rgba(128, 128, 128, 0.5)'
                          }
                      }
                  }
              }
          },
          gauge: {
              startAngle: 225,
              endAngle: -45,
              axisLine: {
                  show: true,
                  lineStyle: {
                      color: [[0.2, '#86b379'], [0.8, '#68a54a'], [1, '#408829']],
                      width: 8
                  }
              },
              axisTick: {
                  splitNumber: 10,
                  length: 12,
                  lineStyle: {
                      color: 'auto'
                  }
              },
              axisLabel: {
                  textStyle: {
                      color: 'auto'
                  }
              },
              splitLine: {
                  length: 18,
                  lineStyle: {
                      color: 'auto'
                  }
              },
              pointer: {
                  length: '90%',
                  color: 'auto'
              },
              title: {
                  textStyle: {
                      color: '#333'
                  }
              },
              detail: {
                  textStyle: {
                      color: 'auto'
                  }
              }
          },
          textStyle: {
              fontFamily: 'Arial, Verdana, sans-serif'
          }
      };

      var echartLine = echarts.init(document.getElementById('echart_line'), theme);

      echartLine.setOption({
        title: {
          text: 'Graph Perbandingan Peramalan',
          subtext: 'Subtitle'
        },
        tooltip: {
          trigger: 'axis'
        },
        legend: {
          x: 220,
          y: 40,
          data: ['Data Aktual', 'Data Peramalan']
        },
        toolbox: {
          show: true,
          feature: {
            magicType: {
              show: true,
              title: {
                line: 'Line',
                bar: 'Bar',
                stack: 'Stack',
                tiled: 'Tiled'
              },
              type: ['line', 'bar', 'stack', 'tiled']
            },
            restore: {
              show: true,
              title: "Restore"
            },
            saveAsImage: {
              show: true,
              title: "Save Image"
            }
          }
        },
        calculable: true,
        xAxis: [{
          type: 'category',
          boundaryGap: false,
          
            
          data: [<?php
          $hasil=mysql_query("SELECT DISTINCT tahun,semester FROM tb_peramalan ORDER BY `tb_peramalan`.`tahun` ASC");
            while ($baris = mysql_fetch_array($hasil)){
              echo "'$baris[tahun] $baris[semester]',";
            }
              ?>]
         
        }],
        yAxis: [{
          type: 'value'
        }],
        series: [{
          name: 'Data Aktual',
          type: 'line',
          smooth: true,
          itemStyle: {
            normal: {
              areaStyle: {
                type: 'default'
              }
            }
          },
          data: [<?php
          for ($y=2014; $y <= 2017;  $y++) { 
            $TA= mysql_fetch_array(mysql_query(" SELECT Count( DISTINCT id_penjualan) as hitung FROM `tb_penjualan` inner JOIN tb_mobil USING(id_mobil)where year(tgl_penjualan)='$y' AND month(tgl_penjualan)='1'"));  
            $TA1 =($TA['hitung']);
            $TB= mysql_fetch_array(mysql_query("SELECT Count( DISTINCT id_penjualan) as hitung FROM `tb_penjualan` inner JOIN tb_mobil USING(id_mobil)where year(tgl_penjualan)='$y' AND month(tgl_penjualan)='2' "));
            $TB1 =($TB['hitung']);
            $TC= mysql_fetch_array(mysql_query("SELECT Count( DISTINCT id_penjualan) as hitung FROM `tb_penjualan` inner JOIN tb_mobil USING(id_mobil)where year(tgl_penjualan)='$y' AND month(tgl_penjualan)='3' ")); 
            $TC1 =($TC['hitung']);
            $rs=$TA1+$TB1+$TC1;

            $RA= mysql_fetch_array(mysql_query(" SELECT Count( DISTINCT id_penjualan) as hitung FROM `tb_penjualan` inner JOIN tb_mobil USING(id_mobil)where year(tgl_penjualan)='$y' AND month(tgl_penjualan)='4'"));  
            $RA1 =($RA['hitung']);
            $RB= mysql_fetch_array(mysql_query("SELECT Count( DISTINCT id_penjualan) as hitung FROM `tb_penjualan` inner JOIN tb_mobil USING(id_mobil)where year(tgl_penjualan)='$y' AND month(tgl_penjualan)='5' "));
            $RB1 =($RB['hitung']);
            $RC= mysql_fetch_array(mysql_query("SELECT Count( DISTINCT id_penjualan) as hitung FROM `tb_penjualan` inner JOIN tb_mobil USING(id_mobil)where year(tgl_penjualan)='$y' AND month(tgl_penjualan)='6' ")); 
            $RC1 =($RC['hitung']);
            $rs2=$RA1+$RB1+$RC1;

            $EA= mysql_fetch_array(mysql_query(" SELECT Count( DISTINCT id_penjualan) as hitung FROM `tb_penjualan` inner JOIN tb_mobil USING(id_mobil)where year(tgl_penjualan)='$y' AND month(tgl_penjualan)='7'"));  
            $EA1 =($EA['hitung']);
            $EB= mysql_fetch_array(mysql_query("SELECT Count( DISTINCT id_penjualan) as hitung FROM `tb_penjualan` inner JOIN tb_mobil USING(id_mobil)where year(tgl_penjualan)='$y' AND month(tgl_penjualan)='8' "));
            $EB1 =($EB['hitung']);
            $EC= mysql_fetch_array(mysql_query("SELECT Count( DISTINCT id_penjualan) as hitung FROM `tb_penjualan` inner JOIN tb_mobil USING(id_mobil)where year(tgl_penjualan)='$y' AND month(tgl_penjualan)='9' ")); 
            $EC1 =($EC['hitung']);
            $rs3=$EA1+$EB1+$EC1;

            $WA= mysql_fetch_array(mysql_query(" SELECT Count( DISTINCT id_penjualan) as hitung FROM `tb_penjualan` inner JOIN tb_mobil USING(id_mobil)where year(tgl_penjualan)='$y' AND month(tgl_penjualan)='10'"));  
            $WA1 =($WA['hitung']);
            $WB= mysql_fetch_array(mysql_query("SELECT Count( DISTINCT id_penjualan) as hitung FROM `tb_penjualan` inner JOIN tb_mobil USING(id_mobil)where year(tgl_penjualan)='$y' AND month(tgl_penjualan)='11' "));
            $WB1 =($WB['hitung']);
            $WC= mysql_fetch_array(mysql_query("SELECT Count( DISTINCT id_penjualan) as hitung FROM `tb_penjualan` inner JOIN tb_mobil USING(id_mobil)where year(tgl_penjualan)='$y' AND month(tgl_penjualan)='12' ")); 
            $WC1 =($WC['hitung']);
            $rs4=$WA1+$WB1+$WC1;


          
          echo "$rs,$rs2,$rs3,$rs4,";
        }
    ?>]
        }, {
          name: 'Data Peramalan',
          type: 'line',
          smooth: true,
          itemStyle: {
            normal: {
              areaStyle: {
                type: 'default'
              }
            }
          },
          data: [<?php
          $gh=mysql_query("SELECT semester, tahun, SUM(hasil) AS jumlah FROM tb_peramalan GROUP BY semester,tahun ORDER BY `tb_peramalan`.`tahun` ASC");
            while ($urut = mysql_fetch_array($gh)){
              echo "'$urut[jumlah]',";
            }
              ?>]
        },]
      });
    </script>

    <?php 
    echo "$y";
 }
 ?>  

  </body>
</html>