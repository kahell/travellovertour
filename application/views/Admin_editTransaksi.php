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
                    <li >
                        <a href="<?php echo site_url('Pasca_paket');?>"><i class="fa fa-diamond"></i> <span class="nav-label">Paket Wisata</span></a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('Pasca_gallery');?>"><i class="fa fa-picture-o"></i> <span class="nav-label">Gallery</span></a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('Pasca_blogs');?>"><i class="fa fa-rocket"></i> <span class="nav-label">Blogs</span></a>
                    </li>
                    <li class="active">
                        <a href="<?php echo site_url('Pasca_transaksi');?>"><i class="fa fa-line-chart"></i> <span class="nav-label">Transaksi</span></a>
                    </li>
                    <!-- 
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
                <nav class="navbar navbar-static-top " role="navigation" style="margin-bottom: 0">
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
           <!-- Judul -->
           <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Transaksi</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?php echo site_url('Pasca_admin');?>">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('Pasca_transaksi');?>">Transaksi</a>
                    </li>
                    <li class="active">
                        <strong>Transaksi</strong>
                    </li>
                </ol>
            </div>
        </div>
        <!-- Wrapper -->
        <div class="wrapper wrapper-content">
            <!-- Row -->
            <div class="row">
                <!-- Col -->
                <div class="wrapper wrapper-content animated fadeInRight ecommerce">
                    <div class="row">

                        <div class="col-lg-12">

                            <div class="tabs-container">
                                <ul class="nav nav-tabs">
                                    <li class=""><a data-toggle="tab" href="#tab-1"> Pemesan</a></li>
                                    <li class=""><a data-toggle="tab" href="#tab-2"> Data Tamu</a></li>
                                </ul>
                                <div class="tab-content">

                                    <div id="tab-1" class="tab-pane">
                                        <div class="panel-body">
                                            <fieldset class="form-horizontal">
                                                <?php
                                                
                                                foreach ($transaksi->result() as $row) {
                                                    ?>
                                                    <div class="form-group"><label class="col-sm-2 control-label">ORDER ID:</label>
                                                        <div class="col-sm-10"><input type="text" disabled class="form-control" value="<?php echo $row->id_transaksi;?>" id="id_transaksi"></div>
                                                    </div>
                                                    <div class="form-group"><label class="col-sm-2 control-label">Nama:</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" placeholder='Masukan Nama' id="nama_pemesan" value="<?php echo $row->nama_pemesan;?>" onChange="save2('nama_pemesan')">
                                                        </div>
                                                    </div>
                                                    <div class="form-group"><label class="col-sm-2 control-label">Jenis Kelamin:</label>
                                                        <div class='col-sm-10'>
                                                            <select id="gender_pemesan" class="form-control" onChange="save2('gender_pemesan')">
                                                                <?php
                                                                if ($row->gender_pemesan == 'Pria') {
                                                                    echo "<option class='active' value='Pria'>Pria</option>";
                                                                    echo "<option class='' value='Wanita'>Wanita</option>";
                                                                }else{
                                                                    echo "<option class='' value='Pria'>Pria</option>";
                                                                    echo "<option class='active' value='Wanita'>Wanita</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group"><label class="col-sm-2 control-label">No Telpon:</label>
                                                        <div class="col-sm-10"><input type="text" class="form-control" placeholder="0838XXXXXX" value="<?php echo $row->telpon_pemesan;?>" id="telpon_pemesan" onChange="save2('telpon_pemesan')"></div>
                                                    </div>
                                                    <div class="form-group"><label class="col-sm-2 control-label">Email:</label>
                                                        <div class="col-sm-10"><input onChange="save2('email_pemesan')" type="text" class="form-control" placeholder="email@gmail.com" value="<?php echo $row->email_pemesan;?>" id="email_pemesan"></div>
                                                    </div>
                                                    <div class="form-group"><label class="col-sm-2 control-label">Total harga:</label>
                                                        <div class="col-sm-10">
                                                            <div class="input-group m-b">
                                                                <span class="input-group-addon">Rp.</span>
                                                                <input onChange="save2('total_harga')" type="text" class="form-control" placeholder="Rp. 100000" value="<?php echo number_format($row->total_harga);?>" id="total_harga">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group"><label class="col-sm-2 control-label">Cara Bayar:</label>
                                                        <div class="col-sm-10"><input onChange="save2('caraBayar')" type="text" class="form-control" disabled value="<?php echo $row->caraBayar;?>" id="caraBayar"></div>
                                                    </div>
                                                    <div class="form-group"><label class="col-sm-2 control-label">Status:</label>
                                                        <div class="col-sm-10">
                                                            <select id="status_transaksi" onChange="save2('status_transaksi')" class="form-control">
                                                                <?php
                                                                if ($row->status_transaksi == '1') {
                                                                    echo "<option class='active' value='1'>Lunas</option>";
                                                                    echo "<option class='' value='0'>Pending</option>";
                                                                }else{
                                                                    echo "<option class='' value='1'>Lunas</option>";
                                                                    echo "<option class='active' value='0'>Pending</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group"><label class="col-sm-2 control-label">Tanggal Transfer:</label>
                                                        <div class="col-sm-10"><input onChange="save2('time_transaksi')" type="date" class="form-control" placeholder="2017-01-19" value="<?php echo $row->time_transaksi;?>" id="time_transaksi"></div>
                                                    </div>
                                                    <div class="form-group"><label class="col-sm-2 control-label">Tanggal Order:</label>
                                                        <div class="col-sm-10"><input onChange="save2('time_order')" type="date" class="form-control" placeholder="2017-01-19" value="<?php echo $row->time_order;?>" id="time_order"></div>
                                                    </div>
                                                    <div class="form-group"><label class="col-sm-2 control-label">Request Pemesan:</label>
                                                        <div class="col-sm-10"><input onChange="save2('catatan_transaksi')" type="text" class="form-control" placeholder="Request transaksi" value="<?php echo $row->catatan_transaksi;?>" id="catatan_transaksi"></div>
                                                    </div>
                                                    <?php
                                                }
                                                ?>

                                            </fieldset>

                                        </div>
                                    </div>
                                    <div id="tab-2" class="tab-pane">
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table class="table table-stripped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                Nama
                                                            </th>
                                                            <th>
                                                                Gender
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        foreach ($dataTamu->result() as $row) {?>
                                                        <tr>
                                                            <td>
                                                                <?php echo $row->nama_tamu?>
                                                                <input  type="hidden" id="nama_tamu" value="<?php echo $row->nama_tamu;?>">
                                                            </td>
                                                            <td>
                                                                <select id="gender_dataTamu" onChange="save1('<?php echo $row->id_dataTamu;?>')" class="form-control">
                                                                    <?php
                                                                    if ($row->gender_tamu == 'Wanita') {
                                                                        echo "<option value='Wanita' class='active'>Wanita</option>";
                                                                        echo "<option value='Pria' class=''>Pria</option>";
                                                                    }else if($row->gender_tamu == 'Pria') {
                                                                        echo "<option value='Wanita' class=''>Wanita</option>";
                                                                        echo "<option value='Pria' class='active'>Pria</option>"; 
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <!-- End Of Row -->
                
            </div>
        </div>
        <!-- End Of Row-->
    </div>
    <!-- End Of Wrap-->
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
    function save2($atribut){
        var formData = new FormData();
        if ($atribut == 'nama_pemesan') {
            formData.append('data_save', $("#nama_pemesan").val());
        }else if($atribut == 'gender_pemesan'){
            formData.append('data_save', $("#gender_pemesan").val());
        }else if($atribut == 'telpon_pemesan'){
            formData.append('data_save', $("#telpon_pemesan").val());
        }else if($atribut == 'email_pemesan'){
            formData.append('data_save', $("#email_pemesan").val());
        }else if($atribut == 'total_harga'){
            formData.append('data_save', $("#total_harga").val());
        }else if($atribut == 'caraBayar'){
            formData.append('data_save', $("#caraBayar").val());
        }else if($atribut == 'status_transaksi'){
            formData.append('data_save', $("#status_transaksi").val());
        }else if($atribut == 'time_transaksi'){
            formData.append('data_save', $("#time_transaksi").val());
        }else if($atribut == 'time_order'){
            formData.append('data_save', $("#time_order").val());
        }else if($atribut == 'catatan_transaksi'){
            formData.append('data_save', $("#catatan_transaksi").val());
        }

        formData.append('atribut', $atribut);
        formData.append('id_transaksi', $("#id_transaksi").val());
        $.ajax({
            url: "<?php echo site_url("Pasca_transaksi/getSave")?>",
            type: 'post',
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
                console.log(data);
            }
        });
    }

    function save1($id_dataTamu){
        var formData = new FormData();
        formData.append('id_dataTamu', $id_dataTamu);
        formData.append('gender', $("#gender_dataTamu").val());
        console.log('Gender: ' + $("#gender_dataTamu").val());
        console.log("data Tamu : " + $id_dataTamu);
        $.ajax({
            url: "<?php echo site_url("Pasca_transaksi/getSaveDataTamu")?>",
            type: 'post',
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
                console.log("data=" + data);
            }
        });
    }
</script>
</body>
</html>
