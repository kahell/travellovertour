<?php $this->load->view('layouts/footer_home');?>
<div id="scroll-top"><i class="fa fa-angle-up"></i></div>
<?php $this->load->view('layouts/javascript_home');?>
<script>
  $("body").on("click", ".pagination a", function() {
    var url = $(this).attr('href');
    $("#the-content").load(url);
    return false;
  });
</script>
</body>
</html>