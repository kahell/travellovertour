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
                    </li>
                    <li>
                        <a href="mailbox.html"><i class="fa fa-envelope"></i> <span class="nav-label">Mailbox </span><span class="label label-warning pull-right">16/24</span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="mailbox.html">Inbox</a></li>
                            <li><a href="mail_detail.html">Email view</a></li>
                            <li><a href="mail_compose.html">Compose email</a></li>
                            <li><a href="email_template.html">Email templates</a></li>
                        </ul>
                    </li>
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
                        <div class="ibox-title">
                            <h5>Transaksi</h5>
                            <div class="ibox-tools">
                                <a href="" class="btn btn-primary btn-xs">Create new project</a>
                            </div>
                        </div>
                        <div class="ibox float-e-margins">
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
                                            <th data-hide="phone,tablet" class="footable-sortable" style="display: none;">Date modified<span class="footable-sort-indicator"></span></th>
                                            <th data-hide="phone" class="footable-visible footable-sortable">Status<span class="footable-sort-indicator"></span></th>
                                            <th class="text-right footable-visible footable-sortable footable-sorted footable-last-column">Action<span class="footable-sort-indicator"></span></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="footable-even" style="display: table-row;">
                                            <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>
                                                324
                                            </td>
                                            <td class="footable-visible">
                                                Customer example
                                            </td>
                                            <td class="footable-visible">
                                                $320.00
                                            </td>
                                            <td class="footable-visible">
                                                12/04/2015
                                            </td>
                                            <td class="" style="display: none;">
                                                21/07/2015
                                            </td>
                                            <td class="footable-visible">
                                                <span class="label label-warning">Expired</span>
                                            </td>
                                            <td class="text-right footable-visible footable-last-column">
                                                <div class="btn-group">
                                                    <button class="btn-white btn btn-xs">View</button>
                                                    <button class="btn-white btn btn-xs">Edit</button>
                                                    <button class="btn-white btn btn-xs">Delete</button>
                                                </div>
                                            </td>
                                        </tr>
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
        function deletePost(id_post){
            $.confirm({
                title: 'Delete Post?',
                content: 'Apakah kamu yakin menghapus post?',
                type: 'red',
                typeAnimated: true,
                buttons: {
                    deleteUser: {
                        text: 'Delete',
                        btnClass: 'btn-red',
                        action: function () {
                            var formData = new FormData();
                            formData.append("id_post", id_post);
                            console.log(id_post);
                            $.ajax({
                                url: "<?php echo site_url("Pasca_blogs/deletePost")?>",
                                type: 'post',
                                data: formData,
                                processData: false,
                                contentType: false,
                                success: function(data) {
                                    console.log(data);
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
                                    console.log(data.responseText);
                                    console.log(data);
                                }
                            });
                        }
                    },
                    cancel: function () {
                        $.alert('Menghapus post di batalkan');
                    }
                }
            });   
        }
    </script>
</body>
</html>
