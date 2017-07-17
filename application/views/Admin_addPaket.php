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
                        <a href="<?php echo site_url('Pasca_paket');?>">Paket</a>
                    </li>
                    <li class="active">
                        <strong>Tambah Paket</strong>
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
                <!-- Col -->
                <div class="col-lg-12">
                    <input type="hidden" name="id_paket" id="id_paket" value="<?php foreach ($paket->result() as $row) {echo $row->id_paket;};?>">
                    <div class="ibox float-e-margins">                            
                        <div class="ibox-title">
                            <h5>Keterangan Paket</h5>
                        </div>
                        <div class="ibox-content">
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-sm-2 " control-label>Judul</label>
                                    <div class="col-sm-10">
                                        <input placeholder="Masukan nama tempat wisata" id="nama_paket" type="text" name="nama_paket" class="form-control">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 " control-label>Tipe Trip</label>
                                    <div class="col-sm-10">
                                        <select class='form-control m-b' id='typeTrip_paket' name='typeTrip_paket'>
                                            <option selected value='1'>Open</option>
                                            <option value='2'>Private</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 " control-label>Pict thumbnail</label>
                                    <div class="col-sm-10">
                                        <input id="pictThumb_paket" name="pictThumb_paket" type="file"  class="form-control">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 " control-label>Location</label>
                                    <div class="col-sm-10">
                                        <input placeholder="ex: Malang, Jawa Timur" id="lokasi_paket" name="lokasi_paket" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 " control-label>Harga</label>
                                    <div class="col-sm-10">
                                        <div class="input-group m-b"><span class="input-group-addon">Rp.</span><input placeholder="Ex: 500000" id="harga_paket" name="harga_paket" type="text" class="form-control"></div>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 " control-label>Deskripsi</label>
                                    <div class="col-sm-10">
                                        <div class="input-group m-b">
                                            <textarea placeholder="Deskripsikan tempat wisata tersebut" rows="8" cols="500" id="deskripsi_paket" name="deskripsi_paket" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 " control-label>Foto Destinasi <br><br>Note: click field and please klik button upload foto to upload file</label>
                                    <div class="col-sm-10">
                                        <div id="my-awesome-dropzone" class="dropzone" action="#">
                                            <div class="dropzone-previews"></div>
                                            <button type="submit" class="btn btn-primary pull-right">Upload foto</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-2 ">
                                        <label control-label">Itenary</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <div id="summernote" class="click2edit wrapper p-md"></div>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-2 ">
                                        <label control-label">Syarat dan Ketentuan</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <div id="summernote2" class="click2edit2 wrapper p-md"></div>
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

       $('#summernote2').summernote({
                    height: 300, // set editor height
                    minHeight: null, // set minimum height of editor
                    maxHeight: null, // set maximum height of editor
                    callbacks: {
                        onImageUpload: function(files) {
                           sendFile2(files[0]);
                       }
                   }
               });

       $('#table_id').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": false,
            "ordering": true,
            "info": false,
            "autoWidth": true
        });
    $('div.dz-default.dz-message > span').show(); // Show message span
    $('div.dz-default.dz-message').css({'opacity':1, 'background-image': 'none'});
});
    Dropzone.options.myAwesomeDropzone = {
        url: "<?php echo site_url("Pasca_paket/upload")?>", // Set the url
        autoProcessQueue: false,
        uploadMultiple: true,
        parallelUploads: 100,
        addRemoveLinks: true,
        maxFiles: 100,
        dictDefaultMessage: " ",
        // Dropzone settings
        init: function() {
            var myDropzone = this;
            this.element.querySelector("button[type=submit]").addEventListener("click", function(e) {
                e.preventDefault();
                e.stopPropagation();
                myDropzone.processQueue();
            });
            this.on("sendingmultiple", function(file, xhr, formData) {
                formData.append('id_paket', $("#id_paket").val());
            });
            this.on("successmultiple", function(files, response) {
                });
            this.on("errormultiple", function(files, response) {
                });
            },
            removedfile: function(file) {
                var name = file.name;
                $.ajax({
                    type: "post",
                    url: "<?php echo site_url("Pasca_paket/remove") ?>",
                    data: { file: name },
                    dataType: 'html'
                });
                // remove the thumbnail
                var previewElement;
                return (previewElement = file.previewElement) != null ? (previewElement.parentNode.removeChild(file.previewElement)) : (void 0);
            }
    }

    function save1(){
        function toAngka(rp){return parseInt(rp.replace(/,.*|\D/g,''),10)}
        var angka = toAngka($("#harga_paket").val());
        var inputFile = document.querySelector('#pictThumb_paket');
        var formData = new FormData();
        formData.append('id_paket', $("#id_paket").val());
        formData.append('typeTrip_paket', $("#typeTrip_paket").val());
        formData.append("nama_paket", $("#nama_paket").val());
        formData.append('file2', '');
        formData.append('file', inputFile.files[0]);
        formData.append("lokasi_paket", $("#lokasi_paket").val());
        formData.append("harga_paket", angka);
        formData.append("deskripsi_paket", $("#deskripsi_paket").val());
        formData.append("syarat", $('.click2edit2').summernote('code'));
        formData.append("itenary", $('.click2edit').summernote('code'));
                //End of Foto
                $.ajax({
                    url: "<?php echo site_url("Pasca_paket/upload_data")?>",
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
                                    text: 'OK',
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

            function sendFile(file){
                data = new FormData();
                data.append("file", file);
                data.append("id_paket", $("#id_paket").val());
                $.ajax({
                    data: data,
                    type: "POST",
                    url: "<?php echo site_url("Pasca_paket/upload_supernote")?>",
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(url) {
                        var imgNode = document.createElement("IMG");
                        imgNode.setAttribute("src", url);
                        $('#summernote').summernote('insertNode', imgNode);
                    },
                    error: function(data) {
                        console.log(data.responseText);
                    }
                });
            }

            function sendFile2(file){
                data = new FormData();
                data.append("file", file);
                data.append("id_paket", $("#id_paket").val());
                $.ajax({
                    data: data,
                    type: "POST",
                    url: "<?php echo site_url("Pasca_paket/upload_supernote")?>",
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(url) {
                        var imgNode = document.createElement("IMG");
                        imgNode.setAttribute("src", url);
                        $('#summernote2').summernote('insertNode', imgNode);
                    },
                    error: function(data) {
                        console.log(data.responseText);
                    }
                });
            }

        </script>
    </body>
    </html>
