<html>
<?php $this->load->view('layouts/header_admin');?>
<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"><span>
                            <img alt="image" class="img-circle" src="<?php echo base_url(); ?>assets/images/admin/fotoAdmin.png" />
                        </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $namaAdmin ?></strong>
                            </span> <span class="text-muted text-xs block">Admin</span> </span> </a>
                        </div>
                        <div class="logo-element">
                            Admin
                        </div>
                    </li>
                    <li>
                        <a href="<?php echo site_url('Pasca_admin');?>"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span></a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('Pasca_paket');?>"><i class="fa fa-diamond"></i> <span class="nav-label">Paket Wisata</span></a>
                    </li>
                    <li class="active">
                        <a href="<?php echo site_url('Pasca_gallery');?>"><i class="fa fa-picture-o"></i> <span class="nav-label">Gallery</span></a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('Pasca_blogs');?>"><i class="fa fa-rocket"></i> <span class="nav-label">Blogs</span></a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('Pasca_transaksi');?>"><i class="fa fa-line-chart"></i> <span class="nav-label">Transaksi</span></a>
                    </li><!--
                    <li>
                        <a href="mailbox.html"><i class="fa fa-envelope"></i> <span class="nav-label">Mailbox </span><span class="label label-warning pull-right">16/24</span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="mailbox.html">Inbox</a></li>
                            <li><a href="mail_detail.html">Email view</a></li>
                            <li><a href="mail_compose.html">Compose email</a></li>
                            <li><a href="email_template.html">Email templates</a></li>
                        </ul>
                    </li>-->
                </ul>
            </div>
        </nav>
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
                        <li class="dropdown">
                            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                <i class="fa fa-bell"></i>  <span class="label label-primary">8</span>
                            </a>
                            <ul class="dropdown-menu dropdown-alerts">
                                <li>
                                    <a href="mailbox.html">
                                        <div>
                                            <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                            <span class="pull-right text-muted small">4 minutes ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="profile.html">
                                        <div>
                                            <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                            <span class="pull-right text-muted small">12 minutes ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="grid_options.html">
                                        <div>
                                            <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                            <span class="pull-right text-muted small">4 minutes ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <div class="text-center link-block">
                                        <a href="notifications.html">
                                            <strong>See All Alerts</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </li>
                            </ul>
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
                                <h5>Gallery</h5>
                                <div class="ibox-tools">
                                    <a href="#" id="btnAdd_gallery" data-toggle="modal" data-target="#myModal" class="btn btn-primary btnAdd_gallery btn-xs">Create new gallery</a>
                                </div>
                            </div>
                            <div class="ibox-content table-responsive">
                                <table id="table_id" class="table">
                                    
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Title</th>
                                            <th>Pict</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (!empty($gallery->result())) {
                                            $count = 1;
                                            foreach ($gallery->result() as $row) {?>
                                            <tr>
                                                <td><?php echo $count++;?></td>
                                                <td><?php echo $row->title_gallery;?></td>
                                                <td><img style="display: inline; height: 30px; width: 30px;" class='responsive-img' alt='<?php echo base_url(); echo $row->pict_gallery; ?>' src="<?php echo base_url($row->pict_gallery);?>">        
                                                </td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle">Action <span class="caret"></span></button>
                                                        <ul class="dropdown-menu">
                                                            <li><a href="#" onclick="deleteGallery(<?php echo $row->id_gallery;?>)">Delete</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- End Of Row-->
            </div>
            <!-- End of Box -->
            <!-- Box -->
           <!-- <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            <h2>Gallery</h2>
                            <p>Share <strong>anything</strong> into your sites</p>
                            <div class="lightBoxGallery">
                                <?php
                                if (empty($gallery->result())) {
                                    echo "Oops.. Anda belum memiliki foto di galerry";
                                }else{
                                    foreach ($gallery->result() as $row) {?>
                                    <a href="<?php echo base_url();?><?php echo $row->pict_gallery;?>" title="<?php echo $row->title_gallery;?>" data-gallery=""><img style="height: 100px; width: 100px;" src="<?php echo base_url();?><?php echo $row->pict_gallery;?>"></a>
                                    <?php
                                }
                            }
                            ?>
                            
                            <div id="blueimp-gallery" class="blueimp-gallery">
                                <div class="slides"></div>
                                <h3 class="title"></h3>
                                <a class="prev">‹</a>
                                <a class="next">›</a>
                                <a class="close">×</a>
                                <a class="play-pause"></a>
                                <ol class="indicator"></ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          
        </div> -->
        <!-- End of Box -->
    </div>
    <div class="footer">
        <div class="pull-right">
            Travellover <strong>Indonesia</strong> 2017.
        </div>
        <div>
            <strong>Copyright</strong> Travellover &copy; 2017
        </div>
    </div>
</div>
</div>


<?php $this->load->view('layouts/javascript_admin');?>

<script>
    $(document).ready(function () {
        $('#table_id').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": false,
          "autoWidth": true
      });

        //Save Data
        $('#addButton').click(function(event){
            var formData = new FormData();
            var inputFile = document.querySelector('#pict_gallery');
            formData.append('title_gallery', $("#title_gallery").val());
            formData.append('file', inputFile.files[0]);
            $url = "<?php echo site_url("Pasca_gallery/upload_data")?>";
            $.ajax({
                url: $url,
                type: 'post',
                data: formData,
                processData: false,
                contentType: false,
                success: function(data,response) {
                    swal({
                        title: "Sukses!",
                        text: "Foto berhasil di tambahkan",
                        type: "success" },
                        function (isConfirm) {
                            $('#title_gallery').val('');
                            $('#pict_gallery').val('');
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

    function deleteGallery($id_gallery){
        swal({
            title: "Are you sure?",
            text: "Menghapus gambar ini?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#1c84c6",
            confirmButtonText: "Ya, hapus foto ini",
            cancelButtonText: "Cancel",
            closeOnConfirm: false,
            closeOnCancel: false },
            function (isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: "<?php echo site_url('Pasca_gallery/delete_foto/') ?>/" + $id_gallery,
                        type: "POST",
                        dataType: "JSON",
                        success: function (data)
                        {
                            setTimeout(function(){
                                location.reload();
                            },1500);
                            swal("Sukses!", "Foto berhasil dihapus", "success");
                        },
                        error: function (jqXHR, textStatus, errorThrown)
                        {
                            alert('Error get data from ajax');
                        }
                    });
                } else {
                    swal("Cancelled", "Menghapus foto dibatalkan", "error");
                }
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
                    <label id="ltitle_gallery">Title</label>
                    <input type="text" id="title_gallery" name="title_gallery" class="form-control" placeholder="Masukan Nama Foto" value="">
                    <div class="hr-line-dashed"></div>
                    <label id="lpict_gallery">Foto</label>
                    <input type="file" id="pict_gallery" name="pict_gallery" class="form-control">
                    <div class="hr-line-dashed"></div>
                </div>
            </div>
            <div class="modal-footer" >
                <a href="#" id="delete" data-dismiss="modal" style="display: none" class="btn btn-flat btn-warning">Delete</a>
                <a href="#" id="saveChange" data-dismiss="modal" style="display: none" class="btn btn-flat btn-primary">Update</a>
                <a href="#" id="addButton" data-dismiss="modal" class="btn btn-flat btn-primary">Tambah</a>
                <a href="#" id="cancelButton" data-dismiss="modal" class="btn btn-flat btn-default">Cancel</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
