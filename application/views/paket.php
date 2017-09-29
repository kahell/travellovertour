        <div id="the-content">
        <div class="row" >
          <?php
            if (!empty($query)) {
              foreach ($query->result() as $row) {
          ?>
            <div class="col-lg-3 col-md-4 col-sm-6">
            <!-- portfolio item-->
            <div class="portfolio-item alt text-center">
              <!-- media-->
              <div class="pic">
                <input type="hidden" name="<?php echo $row->id_paket;?>" id="<?php echo $row->id_paket;?>" value="<?php echo $row->id_paket;?>">
                <?php
                  echo "<a href='http://localhost/travellovertour/Paket/pesan/$row->id_paket'>";
                ?>
                  <img style="max-height: 310px; max-width: 370px;" src="<?php foreach ($foto->result() as $row2){if ($row2->id_paket == $row->id_paket){echo base_url();echo $row2->foto_paket; break;}}?>" data-at2x="<?php foreach ($foto->result() as $row2){if ($row2->id_paket == $row->id_paket){ echo base_url();echo $row2->foto_paket; break;}}?>" alt>
                </a>
                <div class="hover-effect"></div>
                <!-- item content-->
                <?php
                  echo "<a href='http://localhost/travellovertour/Paket/pesan/$row->id_paket'>";
                ?>
                  <h3 class="portfolio-title"><?php echo $row->nama_paket;?></h3>
                  <div class="item-content"> 
                    <p>IDR <?php echo number_format($row->harga_paket, 0, ',', '.');?></p>
                  </div>
                </a>
                <div class="links">
                  <a href="<?php foreach ($foto->result() as $row2){if ($row2->id_paket == $row->id_paket){echo base_url();echo $row2->foto_paket; break;}}?>" class="fancy"><i class="fa fa-expand"></i>
                  </a>
                </div>
              </div>
            </div>
            <!-- ! portfolio item-->
          </div>
          <?php
              }
            }
          ?>
        </div>
        <!-- pagination-->
        <div class="row mt-20">
          <nav class="text-center">
            <?php echo $pagination_links; ?>
          </nav>
        </div>
        <!-- ! pagination-->
        </div>
        <!-- ! Contain the-content -->
        </div>
        <!-- ! Contain Page-->
    </div>
    <!-- ! page -->
    