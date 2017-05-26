/*-----------------------------------------------------------------------------------
    Author Name: Helfi Pangestu
    Role       : JS
    Instaggram : https://www.instagram.com/helfipangestu/
    Facebook   : https://www.facebook.com/hellfip
    Web        : helfipangestu12.blogspot.co.id
    
------------------------------------------------------------------------------
*/

$(function () {
	var file = $('input[name=file]');
	var namePic = $('input[name=namePic]').val();
	var id = $('input[name=id]').val();
	var picSebelum = $('input[name=picSebelum]').val();
	var pricePic = $('input[name=pricePic]').val();
	var uploadURI = $('#form-upload').attr('action');//$('#form-upload').attr('action');

	$('#btnSave').on('click', function(event) {

		var fileToUpload = file[0].files[0];
		// make sure there is file to upload
		if (fileToUpload != "undefined") {
			// provide the form data
			// that would be sent to sever through ajax
			var formData = new FormData();
			formData.append("id", $("#id").val());
			formData.append("file", fileToUpload);
			formData.append("namePic", $("#namePic").val());
			formData.append("picSebelum", $("#picSebelum").val());
			formData.append("pricePic", $("#pricePic").val());			
			// now upload the file using $.ajax
			$.ajax({
				url: uploadURI,
				type: 'post',
				data: formData,
				processData: false,
				contentType: false,
				success: function() {
					$('#modal_form').modal('hide');
                    location.reload();// for reload a page
				}
			});
		}else{
			var formData = new FormData();
			formData.append("id", $("#id").val());
			formData.append("file", fileToUpload);
			formData.append("namePic", $("#namePic").val());
			formData.append("picSebelum", $("#picSebelum").val());
			formData.append("pricePic", $("#pricePic").val());
			// now upload the file using $.ajax
			$.ajax({
				url: uploadURI,
				type: 'post',
				data: formData,
				processData: false,
				contentType: false,
				success: function() {
					$('#modal_form').modal('hide');
                    location.reload();// for reload a page
				}
			});
		}	
	});
});