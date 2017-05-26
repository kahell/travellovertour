<!-- Mainly scripts -->
        <!--<script src="<?php echo base_url(); ?>assets/js/jquery-2.1.1.js"></script>-->
        <script src="<?php echo base_url(); ?>assets/js/jquery-3.1.0.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

        <!-- Flot -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/flot/jquery.flot.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/flot/jquery.flot.spline.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/flot/jquery.flot.resize.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/flot/jquery.flot.pie.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/flot/jquery.flot.symbol.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/flot/jquery.flot.time.js"></script>

        <!-- Peity -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/peity/jquery.peity.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/demo/peity-demo.js"></script>

        <!-- Data Table -->
        <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js') ?>"></script>

        <!-- Custom and plugin javascript -->
        <script src="<?php echo base_url(); ?>assets/js/inspinia.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/pace/pace.min.js"></script>

        <!-- jQuery UI -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/jquery-ui/jquery-ui.min.js"></script>






      <!-- page services-->
      <section class="page-section cws_prlx_section pb-100 bg-gray-60" id="cws_prlx_section_993030094111"><img src="<?php echo base_url();?>pic/parallax-5.jpg" alt="" class="cws_prlx_layer" id="cws_prlx_layer_639447629024" style="transform: translate(-50%, 0px);">
        <div class="container">
          <div class="row">
            <div class="col-md-8">
              <h2 class="title-section alt"><span>Our</span> Services</h2>
              <div class="cws_divider mb-25 mt-5"></div>
              <p class="color-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec a vestibulum leo. Mauris rhoncus libero at sagittis tincidunt. Quisque convallis semper aliquet. </p>
            </div>
          </div>
          <div class="row">
            <!-- ! service item-->
            <div class="col-md-4 col-sm-6 mb-40">
              <div class="service-item icon-center color-icon border"><i class="flaticon-suntour-hotel cws-icon type-1 color-2"></i>
                <h3>Info &amp; Guides</h3>
                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec a vestibulum leo. Mauris rhoncus libero at sagittis tincidunt. Quisque convallis semper aliquet.</p>
              </div>
            </div>
            <!-- ! service item-->
            <!-- ! service item-->
            <div class="col-md-4 col-sm-6">
              <div class="service-item icon-center color-icon border"><i class="flaticon-suntour-car cws-icon type-1 color-2"></i>
                <h3>Sewa Mobil</h3>
                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec a vestibulum leo. Mauris rhoncus libero at sagittis tincidunt. Quisque convallis semper aliquet.</p>
              </div>
            </div>
            <!-- ! service item-->
            <!-- ! service item-->
            <div class="col-md-4 col-sm-6">
              <div class="service-item icon-center color-icon border"><i class="flaticon-suntour-fireworks cws-icon type-1 color-2"></i>
                <h3>Paket Tour</h3>
                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec a vestibulum leo. Mauris rhoncus libero at sagittis tincidunt. Quisque convallis semper aliquet.</p>
              </div>
            </div>
            <!-- ! service item-->
          </div>
        </div>
      </section>
      <!-- ! page services-->

      <div class="recom-item">
                <div class="recom-media"><a href="#">
                    <div class="pic"><img src="<?php echo base_url();?>assets/pic/recomended/1.jpg" data-at2x="<?php echo base_url();?>assets/pic/recomended/1@2x.jpg" alt></div></a>
                  <div class="location"><i class="flaticon-suntour-map"></i> Malang, Indonesia</div>
                </div>
                <!-- Recomended Content-->
                <div class="recom-item-body"><a href="#">
                    <h6 class="blog-title">Hotel UB</h6></a>
                  <div class="stars stars-4"></div>
                  <div class="recom-price"><span class="font-4">Rp. 150 K</span> per night</div>
                  <p class="mb-30">Fasilitas sangat lengkap.</p><a href="#" class="recom-button">Read more</a><a href="#" class="cws-button small alt">Book now</a>
                  <div class="action font-2">20%</div>
                </div>
                <!-- Recomended Image-->
              </div>

<html>
<head>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/uploadify/jquery.uploadify.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/js/plugins/uploadify/uploadify.css">
    <script type="text/javascript">
        $( document ).ready(function() {
        refresh_files();
        $('.delete_file_link').live('click', function(e) {
            e.preventDefault();
            if (confirm('Are you sure you want to delete this file?'))
            {
                var link = $(this);
                $.ajax({
                    url         : './upload/delete_file/' + link.data('file_id'),
                    dataType    : 'json',
                    success     : function (data)
                    {
                        files = $('#files');
                        if (data.status === "success")
                        {
                            link.parents('li').fadeOut('fast', function() {
                                $(this).remove();
                                if (files.find('li').length == 0)
                                {
                                    files.html('<p>No Files Uploaded</p>');
                                }
                            });
                        }
                        else
                        {
                            alert(data.msg);
                        }
                    }
                });
            }
        });
        $('#userfile').uploadify({
                'swf'         : 'assets/js/plugins/uploadify/uploadify.swf',
                'uploader'    : 'assets/js/plugins/uploadify/uploadify.php',
                'folder'      : 'assets/images/slider/',
                'canceling'   : 'assets/js/plugins/uploadify/uploadify-cancel.png',
                'auto' : true,
                'multi' : true
            });
        
        $(function() { 
             

            $('#upload_file').on('submit',(function(e) {
                e.preventDefault();
                $.ajaxFileUpload({
                    url             :'./upload/upload_file/', 
                    secureuri       :false,
                    fileElementId   :'userfile',
                    dataType        : 'json',
                    data            : {'title' : $('#title').val(),
                    },
                    success : function (data, status)
                    {
                        if(data.status != 'error')
                        {
                            $('#files').html('<p>Reloading files...</p>');
                            refresh_files();
                            $('#title').val('');
                        }
                        alert(data.msg);
                    }
                });
                return false;
            }));
        });

        function refresh_files()
        {
            $.get('./assets/images/slider/')
            .success(function (data){
                $('#files').html(data);
            });
        };

        });
        

    </script>
    <!-- CSS -->
    <style type="text/css">
        h1, h2 { font-family: Arial, sans-serif; font-size: 25px; }
        h2 { font-size: 20px; }
         
        label { font-family: Verdana, sans-serif; font-size: 12px; display: block; }
        input { padding: 3px 5px; width: 250px; margin: 0 0 10px; }
        input[type="file"] { padding-left: 0; }
        input[type="submit"] { width: auto; }
         
        #files { font-family: Verdana, sans-serif; font-size: 11px; }
        #files strong { font-size: 13px; }
        #files a { float: right; margin: 0 0 5px 10px; }
        #files ul { list-style: none; padding-left: 0; }
        #files li { width: 280px; font-size: 12px; padding: 5px 0; border-bottom: 1px solid #CCC; }

    </style>
</head>
<body>
    <h1>Upload File</h1>
    <form method="post" action="" id="upload_file" enctype="multipart/form-data" >
        <label for="title">Title</label>
        <input type="text" name="title" id="title" value="" />
 
        <label for="userfile">File</label>
        <input type="file" name="userfile" id="userfile" size="20" />
 
        <input type="submit" name="submit" id="submit" class="submit" />
    </form>
    <h2>Files</h2>
    <div id="files"></div>
</body>
</html>













    //FOTO
    $inputPicSebelum = $this->input->post("picSebelum");
    $inputFotoSesudah = $_FILES['picSesudah']['name'];
    $inputPricePic = $this->input->post("pricePic");
    //die(var_dump($inputFotoSesudah));
    //FOTO
    $foto = "";
    $foto_sebelum = explode('/', $inputPicSebelum);
    $temp = "";
    $config['upload_path']= './assets/images/slider/';
    $config['allowed_types']= 'jpeg|jpg|png';
    $config['max_size']= 1000;
    $config['max_width']= 1024;
    $config['max_height']= 768;
    $config['overwrite']= TRUE;

    if(!empty($_FILES['picSesudah']["name"])){
        if ($foto_sebelum[4] == $_FILES["picSesudah"]["name"]) {
        $foto_sebelum = "assets/images/slider/".$foto_sebelum[4];
        $foto = str_replace(' ', '-', $foto_sebelum);
        }else{
        $foto_sebelum = "assets/images/slider/".$_FILES["picSesudah"]["name"];
        $foto = str_replace(' ', '-', $foto_sebelum);
        $temp = $_FILES["picSesudah"]["tmp_name"];
        $type = $_FILES["picSesudah"]["type"];
        }
    }else{
        $foto = "assets/images/slider/".$foto_sebelum[4];
    }

    $this->load->library('upload', $config);
    $this->upload->initialize($config);

    //MAKE FOLDER
    if (!file_exists('./assets/images/slider/')) {
        mkdir('./assets/images/slider/', 0777, true);
    }
    //Mindahin FOto ke folder
    if (!empty($_FILES['picSesudah']["name"] && $foto_sebelum[4] != $_FILES["picSesudah"]["name"])) {
        move_uploaded_file($temp,"./$foto");
    }

    //END OF FOTO

    $data = array(
        'namePic' => $this->input->post('namePic'),
        'pic' => $foto,
        'pricePic' => $this->input->post('pricePic'),
    );
    $this->admin->slider_update(array('id' => $this->input->post('id')), $data);
    echo json_encode(array("status" => TRUE));


    <!--- 
if (!empty($_FILES))
        {
            //POST
            $nama = $this->input->post('namePic');
            $picSebelum = $this->input->post('picSebelum');
            $pricePic = $this->input->post('pricePic');
            $file1 = $_FILES['file']['name'];

            $foto = "";
            $foto1 = explode('/', $picSebelum);
            $temp = "";

            $config['upload_path'] = "./assets/images/slider";
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']= 1000;
            $config['max_width']= 1024;
            $config['max_height']= 768;
            $config['overwrite']= TRUE;

            if(!empty($_FILES['file']["name"])){
                if ($foto1[4] == $_FILES["file"]["name"]) {
                    $foto1 = "assets/images/slider/".$foto1[4];
                    $foto = str_replace(' ', '-', $foto1);
                }else{
                    $foto1 = "assets/images/slider/".$_FILES["file"]["name"];
                    $foto = str_replace(' ', '-', $foto1);
                    $temp = $_FILES["file"]["tmp_name"];
                    $type = $_FILES["file"]["type"];
                }
            }else{
                $foto = "assets/images/slider/".$foto1[4];
            }

            $this->load->library('upload', $config);

            if ($this->upload->do_upload("file")) {
                //echo "alert()";
            }else{
                //MAKE FOLDER
                if (!file_exists('./assets/images/slider/')) {
                    mkdir('./assets/images/slider/', 0777, true);
                }
                //Mindah foto ke folder
                if (!empty($_FILES['file']["name"] && $foto1[4] != $_FILES["file"]["name"])) {
                    move_uploaded_file($temp,"./assets/images/slider/$foto");
                }
                $data = array(
                    'namePic' => $nama,
                    'pricePic' => $pricePic,
                    'pic' => "assets/images/slider/".$foto,
                );
                $this->Admin_model->slider_update(array('id' => $this->input->post('id')), $data);
                
            }           
        }
        echo json_encode(array("status" => TRUE));









    -->