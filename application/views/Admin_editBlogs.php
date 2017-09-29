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
                    <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
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
               <!-- Judul -->
               <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Tambah Post</h2>
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
                    <?php
                    if (!empty($blogs->result())) {
                        foreach ($blogs->result() as $row) {?>
                        <input type="hidden" name="id_post" id="id_post" value="<?php echo $row->id_post;?>">
                        <!-- Col -->                
                        <div class="col-lg-12">
                            <div class="ibox float-e-margins">
                                <div class="ibox-content">
                                    <div class="form-horizontal">
                                        <div class="form-group">
                                            <label class="col-sm-2" control-label>Status</label>
                                            <div class="col-sm-10">
                                                <select class='form-control m-b' id='status_post' name='status_post'>
                                                    <?php
                                                    if ($row->status_post == 1) {
                                                        echo "<option selected value='1'>Publish</option>";
                                                        echo "<option value='0'>Draft</option>";
                                                    }else{
                                                        echo "<option value='1'>Publish</option>";
                                                        echo "<option selected value='0'>Draft</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2" control-label>Judul</label>
                                            <div class="col-sm-10">
                                                <input placeholder="Masukan judul" value="<?php echo $row->title_post;?>" id="title_post" type="text" name="title_post" class="form-control">
                                            </div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <label class="col-sm-2"  control-label>Tags</label>
                                            <div class="col-sm-10">
                                                <input data-role="tagsinput" placeholder="Masukan tags" value="<?php foreach ($tags->result() as $tag) {echo $tag->name; echo ",";}?>" id="tags_post" type="text" name="tags_post" class="form-control">
                                            </div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <label class="col-sm-2"  control-label>Categories</label>
                                            <div class="col-sm-10">
                                                <input data-role="tagsinput" placeholder="Masukan Kategori" value="<?php foreach ($category->result() as $category2) {echo $category2->name;echo ",";}?>" id="categories_post" type="text" name="categories_post" class="form-control">
                                            </div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <label class="col-sm-2" control-label>Pict thumbnail</label>
                                            <div class="col-sm-10">
                                                <input id="pictThumb_blogs" name="pictThumb_blogs" type="file"  class="form-control">
                                                <input id="file2" name="file2" type="hidden" value="<?php echo $row->pict_post;?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <label class="col-sm-2 ">Deskripsi</label>
                                            <div class="col-sm-10">
                                                <div class="input-group m-b">
                                                    <textarea rows="4" cols="200" id="deskripsi_post" name="deskripsi_post" class="form-control"><?php echo $row->deskripsi_post;?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <div class="col-sm-2 ">
                                                <label control-label>Content</label>
                                            </div>
                                            <div class="col-sm-10">
                                                <div id="summernote" class="click2edit wrapper p-md"><?php echo $row->body_post;?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <div class="col-sm-2 col-sm-offset-2">
                                                <a style="width: 100%" href="#" type="submit" name="btnSave" id="btnSave"  onclick="save1()" class="btnSave btn btn-primary">Save</a>
                                            </div>
                                            <div class="col-sm-2  ">
                                                <a style="width: 100%" href="<?php echo site_url('Pasca_blogs');?>" type="button" class="btn btn-danger">Cancel</a> 
                                            </div>
                                        </div>
                                    </div>
                                </div>                        
                            </div>
                        </div>
                        <!-- End Of Col-->
                        <?php
                    }
                }
                ?>
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

            //add  Categories
            $('#categories_post').on('beforeItemAdd', function(event) {
               var category = event.item;
               var formData = new FormData();

               formData.append('id_post', $("#id_post").val());
               formData.append('categories_post', category);
               console.log(category);
               // Do some processing here
               if (!event.options || !event.options.preventPost) {
                $.ajax({
                    url: "<?php echo site_url("Pasca_blogs/upload_categories")?>",
                    type: 'post',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        console.log(data);
                        $('#categories_post').tagsinput('add', category, {preventPost: true});
                    }
                });
            }
        });

           //remove Categories
           $('#categories_post').on('beforeItemRemove', function(event) {
            var category = event.item;
            var formData = new FormData();
            formData.append('id_post', $("#id_post").val());
            formData.append('categories_post', category);
            console.log(category);
            if (!event.options || !event.options.preventPost) {
              $.ajax({
                url: "<?php echo site_url("Pasca_blogs/remove_categories")?>",
                type: 'post',
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    console.log(data);
                    $('#categories_post').tagsinput('remove', category, {preventPost: true});
                }
            });
          }
      });

           //add Tags
           $('#tags_post').on('beforeItemAdd', function(event) {
               var tag = event.item;
               var formData = new FormData();
               formData.append('id_post', $("#id_post").val());
               formData.append('tags_post', tag);

               // Do some processing here
               if (!event.options || !event.options.preventPost) {
                $.ajax({
                    url: "<?php echo site_url("Pasca_blogs/upload_tags")?>",
                    type: 'post',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        $('#tags_post').tagsinput('add', tag, {preventPost: true});
                    }
                });
            }
        });

           //reomve Tags
           $('#tags_post').on('beforeItemRemove', function(event) {
            var tag = event.item;
            var formData = new FormData();
            formData.append('id_post', $("#id_post").val());
            formData.append('tags_post', tag);
            if (!event.options || !event.options.preventPost) {
              $.ajax({
                url: "<?php echo site_url("Pasca_blogs/remove_tags")?>",
                type: 'post',
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    $('#tags_post').tagsinput('remove', tag, {preventPost: true});
                }
            });
          }
      });
       });

    function save1(){
        var inputFile = document.querySelector('#pictThumb_blogs');
        var formData = new FormData();
        formData.append('id_post', $("#id_post").val());
        formData.append('title_post', $("#title_post").val());
        formData.append('status_post', $("#status_post").val());
        formData.append('deskripsi_post', $("#deskripsi_post").val());
        formData.append('file2', $("#file2").val() );
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
                var res = JSON.parse(data);
                var cek = res.cek;
                var cek2 = res.data;     
                if(cek == false){
                    $.alert({
                        title: 'ERROR',
                        content: cek2,
                        type: 'red',
                        typeAnimated: true,
                        buttons: {
                            ok: {
                                text: 'OK',
                                btnClass: 'btn-red'
                            }
                        }
                    });
                }else{
                 $.alert({
                    title: 'SUKSES!',
                    content: 'Data berhasil di ubah.',
                    type: 'green',
                    typeAnimated: true,
                    buttons: {
                        ok: {
                            text: 'OK',
                            btnClass: 'btn-green',
                            action: function () {
                                location.href = "<?php echo site_url('Pasca_blogs');?>"
                            }
                        }
                    }
                }); 
             }
         },
         error: function(response){
            console.log(response);
        }
    });
    }

    function sendFile(file){
        data = new FormData();
        data.append("file", file);
        data.append("id_post", $("#id_post").val());
        console.log(file);
        $.ajax({
            data: data,
            type: "POST",
            url: "<?php echo site_url("Pasca_blogs/upload_supernote")?>",
            cache: false,
            contentType: false,
            processData: false,
            success: function(url) {
                console.log(url);
                var imgNode = document.createElement("IMG");
                imgNode.setAttribute("src", url);
                $('#summernote').summernote('insertNode', imgNode);
            },
            error: function(data) {
                console.log(data.responseText);
            }
        });
    }
</script>
</body>
</html>
