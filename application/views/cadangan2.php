<form action="<?php echo site_url('Paket/konfirmasi');?>" method="post" enctype="multipart/form-data">
                      <h4 style="color: #383838;font-size: 21px;">Berapa Orang?</h4>
                      <p>Masukkan jumlah orang yang ikut dalam perjalanan ini</p>
                      <table class="shop_table cart">
                        <thead>
                          <tr>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Total</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr class="cart_item">
                            <td>
                              <span class="amount" style="padding-left: 20px;">Rp. <?php 
                                   //$row->harga_paket;
                              $harga = number_format($row->harga_paket, 0, ',', '.');
                              echo $harga;
                              ?>
                              <input class="form-control" type="hidden" name="id_paket" id="id_paket" value="<?php foreach ($paket->result() as $row) {echo $row->id_paket;}?>">
                              <input class="form-control" id="harga_paket" name="harga_paket" type="hidden" value="<?php echo $row->harga_paket?>"> 
                            </span>
                          </td>
                          <td>
                            <div class="quantity buttons_added">
                              <input type="number" onkeyup="sum();" id="jumlah_orang" name="jumlah_orang" step="1" min="0" value="1" title="Qty" class="input-text qty text">
                            </div>
                          </td>
                          <td>
                            <span class="amount">Rp.<input style="margin-left: -3px;border: none;" type="text" name="total" id="total" value="<?php echo number_format($row->harga_paket, 0, ',', '.');?>" disabled>
                              <input type="hidden" name="total_harga" id="total_harga" value="<?php echo $row->harga_paket;?>">
                            </span>
                          </td>
                        </tr>
                        <tr>
                          <td colspan="3" class="actions">
                            <input type="submit" name="proceed" value="Pesan" class="cws-button">
                            <!--<a href="#" onclick="proceed()" type="submit" id="proceed" name="proceed" class="cws-button">Pesan</a>-->
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </form>