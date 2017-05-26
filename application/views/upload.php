<!DOCTYPE html>
<html>
<head>
    <title>My Uploadify Implementation</title>
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    
</head>
<body>
    <div class="container">

        <form method="post" id="upload_form" enctype="multipart/form">
            <input type="file" name="image_file" id="image_file" />
            <br>
            <input type="submit" name="upload" value="upload" class="btn">
        </form>
    
        <div id="uploaded_image"></div>
    </div>  
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function(){
            $('#upload_form').on('submit', function(e){
                e.preventDefault();
                if($('#image_file').val() == ''){
                    alert("Please select the file");
                }else
                {
                    $.ajax({
                        url:"<?php echo base_url();?>Pasca_admin/ajax_upload",
                        method:"POST",
                        data:new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success:function(data){
                            $('#uploaded_image').html(data);
                        }
                    });
                }
            })
        });
    </script>
</body>
</html>