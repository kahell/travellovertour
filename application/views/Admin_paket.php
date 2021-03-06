<!DOCTYPE html>
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
                    <li class="active">
                        <a href="<?php echo site_url('Pasca_paket');?>"><i class="fa fa-diamond"></i> <span class="nav-label">Paket Wisata</span></a>
                    </li>
                    <li>
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
                                <h5>Paket</h5>
                                <div class="ibox-tools">
                                    <a href="<?php echo site_url('Pasca_paket/add_paket');?>" class="btn btn-primary btn-xs">Create new pakets</a>
                                </div>
                            </div>
                            <div class="ibox-content table-responsive">
                                <table id="table_id" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Type</th>
                                            <th>Nama Paket</th>
                                            <th>Lokasi Paket</th>
                                            <th>Harga</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody style="text-align: left;">
                                        <?php 
                                        $count = 1;
                                        foreach($paket->result() as $row){?>
                                        <tr>
                                           <td><?php echo $count++;?></td>
                                           <td><?php
                                            if ($row->typeTrip_paket == 'open') {
                                                echo "<label class='label label-primary'>Open Trip</label>";
                                            }else{
                                                echo "<label class='label label-success'>Private Trip</label>";
                                            }
                                            ?>
                                        </td>
                                        <td><?php echo $row->nama_paket;?></td>
                                        <td><?php echo $row->lokasi_paket;?></td>
                                        <td>Rp. <?php 
                                            if(!empty($row->harga_paket)){
                                                echo number_format((double)$row->harga_paket);
                                            }?></td>
                                        <td>
                                            <div class="btn-group">
                                                <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle">Action <span class="caret"></span></button>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <?php
                                                        echo "<a href='http://localhost/travellovertour/Pasca_paket/edit_paket/$row->id_paket' class='btn' type='button'> <i class='glyphicon glyphicon-pencil'></i> Edit</a>";
                                                        ?>
                                                    </li>
                                                    <li><a href="#" class='btn' onclick="delete_paket(<?php echo $row->id_paket?>)"><i class='glyphicon glyphicon-remove'> </i> Delete</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- End Of Row-->
            </div>
            <!-- End of Box-->
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
          "searching": true,
          "ordering": true,
          "info": false,
          "autoWidth": true
      });
    });

    function delete_paket($id_paket){
        $.confirm({
            title: 'Delete Paket?',
            content: 'Apakah kamu yakin menghapus paket?',
            type: 'red',
            typeAnimated: true,
            buttons: {
                deleteUser: {
                    text: 'Delete',
                    btnClass: 'btn-red',
                    action: function () {
                        var formData = new FormData();
                        formData.append("id_paket", $id_paket);
                        $.ajax({
                            url: "<?php echo site_url("Pasca_paket/delete_paket")?>",
                            type: 'post',
                            data: formData,
                            processData: false,
                            contentType: false,
                            success: function() {
                                $.alert({
                                    title: 'SUKSES!',
                                    content: 'Data berhasil di hapus.',
                                    type: 'green',
                                    typeAnimated: true,
                                    buttons: {
                                        ok: {
                                            text: 'OK',
                                            btnClass: 'btn-green',
                                            action: function () {
                                                location.reload();
                                            }
                                        }
                                    }
                                });
                            },
                            error: function (jqXHR, textStatus, errorThrown)
                            {
                                //console.log(data.responseText);
                                console.log(data);
                            }
                        });
                    }
                },
                cancel: function () {
                    $.alert('Menghapus paket di batalkan');
                }
            }
        });   
    }
</script>
</body>
</html>
