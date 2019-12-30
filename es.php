<?php
include "login/connect.php";
$query = mysql_query("SELECT DISTINCT unit from tb_mobil");
  $query2 =mysql_query("SELECT DISTINCT year(`tgl_penjualan`) as tahun FROM `tb_penjualan`"); 
?>
<table width="70%" height="80%"  border="0">
                      <form name="postform" align="center" method="post" action="pros.php">
                     
                              <tr>
                            <td>Tahun Permalan</td>
                            <td ><b>::::</b></td>
                            <td><select class="form-control" required name="tahun">
                              <option value="0" selected="selected">-Tahun Peramalan-</option>
                              <?php 
                              while($tahun = mysql_fetch_array($query2)){
                              echo "<option>$tahun[tahun]</option>";
                              }
                              ?>                            
                              </select>
                                </td>
                            </tr>
                              <tr>
                            <td>Tipe Mobil</td>
                            <td ><b>::::</b></td>
                            <td><select class="form-control" required name="idmobil">
                              <option value="0" selected="selected">-Jenis Mobil-</option>
                              <?php 
                              while($mob = mysql_fetch_array($query)){
                              echo "<option>$mob[unit]</option>";
                              }
                              ?>                            
                              </select>
                                </td>
                            </tr>
                             
                              <tr>
                            <td>Bulan Semester</td>
                            <td ><b>::::</b></td>
                            <td>
                                <select class="form-control" required name="semester">
                              <option selected="selected">-Bulan-</option>  
                              <option value="0" >Seluruh Tahun</option> 
                              <option value="1" >-Januari-Maret-</option>  
                              <option value="2" >-April-Juni-</option>  
                              <option value="3" >-Juli-September-</option>
                              <option value="4" >-September-Desember-</option>                 
                                </td>
                            </tr>
                                                  
  <td colspan="3"><div align="center">
  
                          <button onClick="return confirm('Apakah Anda Yakin Mereset semua data yang sudah di ketik?')" type="reset" class="btn btn-primary">Reset</button>
                          <button type="submit" class="btn btn-success">Submit</button>
                            </div></td>
                            </tr>
                            
                          </form>
                        </table>