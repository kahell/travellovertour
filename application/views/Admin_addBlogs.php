<!DOCTYPE html>
<html>
<?php $this->load->view('layouts/header_admin');?>
<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <span>
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
                        <li class="active">
                            <a href="<?php echo site_url('Pasca_blogs');?>"><i class="fa fa-rocket"></i> <span class="nav-label">Blogs</span></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-line-chart"></i> <span class="nav-label">Transaksi</span></a>
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
                    <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
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
                    <h2>Tambah Paket</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="<?php echo site_url('Pasca_admin');?>">Home</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('Pasca_blogs');?>">Blogs</a>
                        </li>
                        <li class="active">
                            <strong>Tambah Post</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
            <!-- Wrapper -->
            <div class="wrapper wrapper-content">
                <!-- Row -->
                <div class="row">
                    <input type="hidden" name="id_post" id="id_post" value="<?php echo $blogs;?>">
                    <!-- Col -->                
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-content">
                                <div class="form-horizontal">
                                    <div class="form-group">
                                        <label class="col-sm-2" control-label>Judul</label>
                                        <div class="col-sm-10">
                                            <input placeholder="Masukan judul" id="title_post" type="text" name="title_post" class="form-control">
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2" control-label>Tags</label>
                                        <div class="col-sm-10">
                                            <input placeholder="Masukan tags" id="tags_post" type="text" name="tags_post" class="form-control">
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2" control-label>Categories</label>
                                        <div class="col-sm-10">
                                            <input placeholder="Masukan Kategori" id="categories_post" type="text" name="categories_post" class="form-control">
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2" control-label>Pict thumbnail</label>
                                        <div class="col-sm-10">
                                            <input id="pictThumb_blogs" name="pictThumb_blogs" type="file"  class="form-control">
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <div class="col-sm-2 ">
                                            <label control-label>Content</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <div id="summernote" class="click2edit wrapper p-md"></div>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <div class="col-sm-2 col-sm-offset-2">
                                            <a style="width: 100%" href="#" type="submit" name="btnSave" id="btnSave"  onclick="save1()" class="btnSave btn btn-primary">Submit</a>
                                        </div>
                                        <div class="col-sm-2  ">
                                            <a style="width: 100%" href="<?php echo site_url('Pasca_paket');?>" type="button" class="btn btn-danger">Cancel</a> 
                                        </div>
                                    </div>
                                </div>
                            </div>                        
                        </div>
                    </div>
                    <!-- End Of Col-->
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
        $(document).ready(function (){
         $('#summernote').summernote({
                    height: 300, // set editor height
                    minHeight: null, // set minimum height of editor
                    maxHeight: null, // set maximum height of editor
                    callbacks: {
                        onImageUpload: function(files) {
                         sendFile(files[0]);
                     }
                 }
             });
     });

        function save1(){
            var inputFile = document.querySelector('#pictThumb_blogs');
            var formData = new FormData();
            formData.append('id_post', $("#id_post").val());
            formData.append('tags_post', $("#tags_post").val());
            formData.append("categories_post", $("#categories_post").val());
            formData.append('file2', '');
            formData.append('file', inputFile.files[0]);
            formData.append("body_post", $('.click2edit').summernote('code'));
        //End of Foto
        $.ajax({
            url: "<?php echo site_url("Pasca_blogs/upload_data")?>",
            type: 'post',
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
                $.alert({
                    title: 'SUKSES!',
                    content: 'Data berhasil di tambahkan.',
                    type: 'green',
                    typeAnimated: true,
                    buttons: {
                        ok: {
                            ext: 'OK',
                            btnClass: 'btn-green',
                            action: function () {
                                location.href = "<?php echo site_url('Pasca_paket');?>"
                            }
                        }
                    }
                });
            }
        });
    }
</script>
</body>
</html>
