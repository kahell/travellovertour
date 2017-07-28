<!DOCTYPE html>
<html>
<?php $this->load->view('layouts/header_admin');?>
<body>
    <div id="wrapper">
        <?php $this->load->view('layouts/navbar_admin');?>
        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <span class="m-r-sm text-muted welcome-message">Welcome <?php echo $namaAdmin ?>.</span>
                        </li>
                        <li>
                            <a href="<?php echo site_url("Pasca/logout"); ?>">
                                <i class="fa fa-sign-out"></i> Log out
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="wrapper wrapper-content">
                <!-- Box -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Slider</h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content table-responsive">
                                <table id="table_id" class="table">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama</th>
                                            <th>Gambar</th>
                                            <th>Harga</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- onclick="delete_slider(<?php echo $row->id;?>)"-->
                                        <?php $count = 1;?>
                                        <?php 
                                        if (empty($slider)) {
                                            echo "";
                                        }else{
                                            foreach($slider->result() as $row){?>
                                            <tr>
                                               <td><?php echo $count++;?></td>
                                               <td><?php echo $row->nama_paket;?></td>
                                               <td><img style="display: inline; height: 30px; width: 30px;" class='responsive-img' alt='<?php echo base_url();
                                                echo $row->pict_paket; ?>' src="<?php echo base_url($row->pict_paket);?>"></td>
                                                <td>Rp. <?php echo number_format($row->harga_paket);?></td>
                                                <td>
                                                    <?php
                                                //echo $sumSlider;
                                                    if ($sumSlider >= 5) {
                                                        if ($row->slider_paket == 1) {
                                                            echo "<button class='btn btn-success btn-sm' onclick='sliderOff($row->id_paket)'>On</button>";
                                                        }else{
                                                            echo "<button class='btn btn-danger btn-sm' onclick='sliderFalse($row->id_paket)'>Off</button>";
                                                        }
                                                    }else{
                                                        if ($row->slider_paket == 1) {
                                                            echo "<button class='btn btn-success btn-sm' onclick='sliderOff($row->id_paket)'>On</button>";
                                                        }else{
                                                            echo "<button class='btn btn-danger btn-sm' onclick='sliderOn($row->id_paket)'>Off</button>";
                                                        }
                                                    }                                                
                                                    ?>
                                                </td>
                                            </tr>
                                            <?php }
                                        }?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- End Of Row-->
                </div>
                <!-- End of Box-->
                <!-- Box -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Popular Post</h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content table-responsive">
                                <table id="table2_id" class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Gambar</th>
                                            <th>Harga</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- onclick="delete_slider(<?php echo $row->id;?>)"-->
                                        <?php 
                                        $count = 1;
                                        if (empty($slider)) {
                                            echo "";
                                        }else{
                                            foreach($slider->result() as $row){?>
                                            <tr>
                                                <td><?php echo $count++;?></td>
                                                <td><?php echo $row->nama_paket;?></td>
                                                <td><img style="display: inline; height: 30px; width: 30px;" class='responsive-img' alt='<?php echo base_url();
                                                    echo $row->pict_paket; ?>' src="<?php echo base_url($row->pict_paket);?>"></td>
                                                    <td>Rp. <?php echo number_format($row->harga_paket);?></td>
                                                    <td>
                                                        <?php
                                                        if ($sumPopularPost >= 8) {
                                                            if ($row->popular_paket == 1) {
                                                                echo "<button class='btn btn-success btn-sm' onclick='popularOff($row->id_paket)'>On</button>";
                                                            }else{
                                                                echo "<button class='btn btn-danger btn-sm' onclick='popularFalse($row->id_paket)'>Off</button>";
                                                            }
                                                        }else{
                                                            if ($row->popular_paket == 1) {
                                                                echo "<button class='btn btn-success btn-sm' onclick='popularOff($row->id_paket)'>On</button>";
                                                            }else{
                                                                echo "<button class='btn btn-danger btn-sm' onclick='popularOn($row->id_paket)'>Off</button>";
                                                            }
                                                        }                                                
                                                        ?>
                                                    </td>
                                                </tr>
                                                <?php }
                                            }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- End Of Row-->
                    </div>
                    <!-- End Of Box-->
                    <!-- Box -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <h5>Testimonial</h5>
                                    <div class="ibox-tools">
                                        <a class="collapse-link">
                                            <i class="fa fa-chevron-up"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="ibox-content table-responsive">
                                    <table id="table3_id" class="table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Gambar</th>
                                                <th>Deskripsi</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $count = 1;
                                            if (empty($testimonial)) {?>
                                            <tr>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                            </tr>
                                            <?php
                                        }else{
                                            foreach($testimonial->result() as $row){?>
                                            <tr>
                                                <td><?php echo $count++;?></td>
                                                <td><?php echo $row->name_testi;?></td>
                                                <td><img style="display: inline; height: 30px; width: 30px;" class='responsive-img' alt='<?php echo base_url();
                                                    echo $row->pict_testi; ?>' src="<?php echo base_url($row->pict_testi);?>"></td>
                                                    <td><?php echo $row->desc_testi;?></td>
                                                    <td>
                                                        <a id="btnEdit_testi" data-toggle="modal" data-target="#myModal" class="btn btn-info btnEdit_testi" href="#" ><i class="fa fa-edit"></i>
                                                            <input type="hidden" name="id_testi" id="id_testi" value="<?php echo $row->id_testi?>">
                                                            <input type="hidden" name="name_testi" id="name_testi" value="<?php echo $row->name_testi?>">
                                                            <input type="hidden" name="pict_testi" id="pict_testi" value="<?php echo $row->pict_testi?>">
                                                            <input type="hidden" name="desc_testi" id="desc_testi" value="<?php echo $row->desc_testi?>">
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php 
                                            }
                                        }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- End Of Row-->
                </div>
                <!-- End Of Box-->
            </div>
            <?php $this->load->view('layouts/footer_admin');?>
        </div>
    </div>

    <?php $this->load->view('layouts/javascript_admin');?>
    
    <script>
        $(document).ready(function () {
            $('#table_id').DataTable({
              "paging": true,
              "lengthChange": true,
              "searching": false,
              "ordering": true,
              "info": false,
              "autoWidth": true
          });
            $('#table2_id').DataTable({
              "paging": true,
              "lengthChange": true,
              "searching": false,
              "ordering": true,
              "info": false,
              "autoWidth": true
          });
            $('#table3_id').DataTable({
              "paging": false,
              "lengthChange": true,
              "searching": false,
              "ordering": false,
              "info": false,
              "autoWidth": true
          });

            //Testimonial
            $('.btnEdit_testi').each(function(){
                $(this).click(function(event){
                    var id_testi = $(this).find('#id_testi').val();
                    var name_testi = $(this).find('#name_testi').val();
                    var pict_testi = $(this).find('#pict_testi').val();
                    var desc_testi = $(this).find('#desc_testi').val();
                    $('#title').text('Edit Testimonial');
                    $('#modalId_testi').val(id_testi);
                    $('#nama_testi').val(name_testi);
                    $('#mpictCadangan_testi').val(pict_testi);
                    $('#mdesc_testi').val(desc_testi);
                    $('#delete').hide('400');
                    $('#saveChange').show('400');
                    $('#addButton').hide('400');
                    //Input Testi
                    $('#lnama_testi').show('400');
                    $('#nama_testi').show('400');
                    $('#mpict_testi').show('400');
                    $('#mdesc_testi').show('400');
                });
            });

            //Save Data
            $('#saveChange').click(function(event){
                var formData = new FormData();
                var inputFile = document.querySelector('#mpict_testi');
                formData.append('id_testi', $("#modalId_testi").val());
                formData.append('name_testi', $("#nama_testi").val());
                formData.append('file2', $("#mpictCadangan_testi").val());
                formData.append('file', inputFile.files[0]);
                formData.append('desc_testi', $("#mdesc_testi").val());
                $url = "<?php echo site_url("Pasca_admin/update_Testimonial")?>";
                $.ajax({
                    url: $url,
                    type: 'post',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data,response) {
                        swal({
                            title: "Sukses!",
                            text: "Berhasil mengubah testimonial",
                            type: "success" },
                            function (isConfirm) {
                                $('#modalId_testi').val('');
                                $('#nama_testi').val('');
                                $('#mpictCadangan_testi').val('');
                                $('#mdesc_testi').val('');
                                setTimeout(function(){
                                    location.reload();
                                },500);
                            });
                    },
                    error: function(data){
                        console.log(data.responseText);
                    }
                });
            });
        });

        function sliderOn($id_paket){
            swal({
                title: "Are you sure?",
                text: "Jadikan paket ini sebagai slider home?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#1c84c6",
                confirmButtonText: "Ya",
                cancelButtonText: "Cancel",
                closeOnConfirm: false,
                closeOnCancel: false },
                function (isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                            url: "<?php echo site_url('Pasca_admin/sliderOn/') ?>/" + $id_paket,
                            type: "POST",
                            dataType: "JSON",
                            success: function (data)
                            {
                                setTimeout(function(){
                                    location.reload();
                                },1500);
                                swal("Sukses!", "Paket telah menjadi slider home.", "success");
                            },
                            error: function (jqXHR, textStatus, errorThrown)
                            {
                                alert('Error get data from ajax');
                            }
                        });
                    } else {
                        swal("Cancelled", "Paket dibatalkan menjadi slider home", "error");
                    }
                });
        }

        function sliderOff($id_paket){
            swal({
                title: "Are you sure?",
                text: "Menghilangkan status slider di home?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#1c84c6",
                confirmButtonText: "Ya",
                cancelButtonText: "Cancel",
                closeOnConfirm: false,
                closeOnCancel: false },
                function (isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                            url: "<?php echo site_url('Pasca_admin/sliderOff/') ?>/" + $id_paket,
                            type: "POST",
                            dataType: "JSON",
                            success: function (data)
                            {
                                setTimeout(function(){
                                    location.reload();
                                },1500);
                                swal("Sukses!", "Paket telah menjadi di off kan dari slider home.", "success");
                            },
                            error: function (jqXHR, textStatus, errorThrown)
                            {
                                alert('Error get data from ajax');
                            }
                        });
                    } else {
                        swal("Cancelled", "Paket dibatalkan off dari slider home", "error");
                    }
                });
        }

        function sliderFalse($id_paket){
            swal({
                title: "Error. Slider aktif lebih dari 5",
                text: "Silahkan off kan slider terlebih dahulu.",
                type: "warning",
            });
        }

        //Popular Paket
        function popularOn($id_paket){
            swal({
                title: "Are you sure?",
                text: "Jadikan paket ini sebagai popular paket home?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#1c84c6",
                confirmButtonText: "Ya",
                cancelButtonText: "Cancel",
                closeOnConfirm: false,
                closeOnCancel: false },
                function (isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                            url: "<?php echo site_url('Pasca_admin/popularOn/') ?>/" + $id_paket,
                            type: "POST",
                            dataType: "JSON",
                            success: function (data)
                            {
                                setTimeout(function(){
                                    location.reload();
                                },1500);
                                swal("Sukses!", "Paket telah menjadi popular paket home.", "success");
                            },
                            error: function (jqXHR, textStatus, errorThrown)
                            {
                                alert('Error get data from ajax');
                            }
                        });
                    } else {
                        swal("Cancelled", "Paket dibatalkan menjadi popular paket home", "error");
                    }
                });
        }

        function popularOff($id_paket){
            swal({
                title: "Are you sure?",
                text: "Menghilangkan status popular paket di home?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#1c84c6",
                confirmButtonText: "Ya",
                cancelButtonText: "Cancel",
                closeOnConfirm: false,
                closeOnCancel: false },
                function (isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                            url: "<?php echo site_url('Pasca_admin/popularOff/') ?>/" + $id_paket,
                            type: "POST",
                            dataType: "JSON",
                            success: function (data)
                            {
                                setTimeout(function(){
                                    location.reload();
                                },1500);
                                swal("Sukses!", "Paket telah menjadi di off kan dari popular paket home.", "success");
                            },
                            error: function (jqXHR, textStatus, errorThrown)
                            {
                                alert('Error get data from ajax');
                            }
                        });
                    } else {
                        swal("Cancelled", "Paket dibatalkan off dari popular paket home", "error");
                    }
                });
        }

        function popularFalse($id_paket){
            swal({
                title: "Error. Popular paket aktif lebih dari 8",
                text: "Silahkan off kan popular paket terlebih dahulu.",
                type: "warning",
            });
        }
    </script>
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" id="title">Tittle</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <!-- Testi -->
                        <label id="lnama_testi">Nama</label>
                        <input type="text" id="nama_testi" name="nama_testi" class="form-control" placeholder="Masukan Nama" value="">
                        <label id="lpict_testi">Foto</label>
                        <input type="file" id="mpict_testi" name="mpict_testi" class="form-control">
                        <input type="hidden" id="mpictCadangan_testi" name="mpictCadangan_testi" class="form-control" value="">
                        <label id="ldesc_testi">Deskripsi</label>
                        <input type="text" id="mdesc_testi" name="mdesc_testi" class="form-control" placeholder="Masukan deskripsi" value="">

                        <!-- Input Hidden-->
                        <input type="hidden" id="modalId_testi" class="form-control" value="">   
                    </div>
                </div>
                <div class="modal-footer" >
                    <a href="#" id="delete" data-dismiss="modal" style="display: none" class="btn btn-flat btn-warning">Delete</a>
                    <a href="#" id="saveChange" data-dismiss="modal" style="display: none" class="btn btn-flat btn-primary">Update</a>
                    <a href="#" id="addButton" data-dismiss="modal" style="display: none" class="btn btn-flat btn-primary">Tambah</a>
                    <a href="#" id="cancelButton" data-dismiss="modal" class="btn btn-flat btn-default">Cancel</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
