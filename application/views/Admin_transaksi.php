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
                    <li>
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
                                <h5>Transaksi</h5>
                                <!--<div class="ibox-tools">
                                    <a href="" class="btn btn-primary btn-xs">Create new project</a>
                                </div>-->
                            </div>
                            <div class="ibox-content table-responsive">
                                <input type="text" class="form-control input-sm m-b-xs" id="filter"
                                placeholder="Search in table">
                                <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15" data-filter=#filter>
                                    <thead>
                                        <tr>
                                            <th class="footable-visible footable-sortable footable-first-column">Order ID<span class="footable-sort-indicator"></span></th>
                                            <th data-hide="phone" class="footable-visible footable-sortable">Customer<span class="footable-sort-indicator"></span></th>
                                            <th data-hide="phone" class="footable-visible footable-sortable">Jumlah Tagihan<span class="footable-sort-indicator"></span></th>
                                            <th data-hide="phone" class="footable-visible footable-sortable">Tanggal Order<span class="footable-sort-indicator"></span></th>
                                            <th data-hide="phone" class="footable-visible footable-sortable">Tanggal Bayar<span class="footable-sort-indicator"></span></th>
                                            <th data-hide="phone,tablet" class="footable-sortable" style="display: none;">Catatan Pesan<span class="footable-sort-indicator"></span></th>
                                            <th data-hide="phone" class="footable-visible footable-sortable">Status<span class="footable-sort-indicator"></span></th>
                                            <th class="text-right footable-visible footable-sortable footable-sorted footable-last-column">Action<span class="footable-sort-indicator"></span></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (!empty($transaksi->result())) {
                                            foreach ($transaksi->result() as $row) {?>
                                            <tr class="footable-even" style="display: table-row;">
                                                <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>
                                                    <?php echo $row->id_transaksi;?>
                                                </td>
                                                <td class="footable-visible">
                                                    <?php echo $row->nama_pemesan?>
                                                </td>
                                                <td class="footable-visible">
                                                    Rp. <?php echo number_format($row->total_harga);?>
                                                </td>
                                                <td class="footable-visible">
                                                    <?php echo $row->time_order?>
                                                </td>
                                                <td class="footable-visible">
                                                    <?php echo $row->time_transaksi?>
                                                </td>
                                                <td class="" style="display: none;">
                                                    <?php echo $row->catatan_transaksi?>
                                                </td>
                                                <td class="footable-visible">
                                                    
                                                        <?php 
                                                        if ($row->status_transaksi == '1') {
                                                            echo "<span class='label label-success'>Lunas</span>";
                                                        }elseif($row->status_transaksi == '0'){
                                                            echo "<span class='label label-warning'>Pending</span>";
                                                        }
                                                        ?>
                                                    
                                                </td>
                                                <td class="text-right footable-visible footable-last-column">
                                                    <div class="btn-group">
                                                        <?php
                                                        echo "<a class='btn-white btn btn-xs' href='http://localhost/travellovertour/Pasca_transaksi/getView/$row->id_transaksi'>View</a>";
                                                        ?>
                                                        <!--
                                                        <button class="btn-white btn btn-xs" onclick="btnEdit(<?php echo $row->id_transaksi;?>)">Edit</button>-->
                                                        <!--<button class="btn-white btn btn-xs">Delete</button>-->
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="7" class="footable-visible">
                                            <ul class="pagination pull-right"><li class="footable-page-arrow"><a data-page="first" href="#first">«</a></li><li class="footable-page-arrow"><a data-page="prev" href="#prev">‹</a></li><li class="footable-page"><a data-page="0" href="#">1</a></li><li class="footable-page active"><a data-page="1" href="#">2</a></li><li class="footable-page"><a data-page="2" href="#">3</a></li><li class="footable-page-arrow"><a data-page="next" href="#next">›</a></li><li class="footable-page-arrow"><a data-page="last" href="#last">»</a></li></ul>
                                        </td>
                                    </tr>
                                </tfoot>
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
        $('.footable').footable({});
    });
</script>
</body>
</html>
