/*************************************************************
-----------------SEMPLE THEME ADMIN-PAGE----------------------	
	
**************************************************************/


$(document).ready(function(){
		var mediaUploader;
		$("#theme-logo-id").click(function(e){
			e.preventDefault();
			if(mediaUploader){
				mediaUploader.open();
				return;
			}
			mediaUploader = wp.media.frames.file_frame = wp.media({
				title:'Select Theme Logo',
				button:{
					text:'Select Logo'
				},
				multiple:false
				});
			mediaUploader.on('select',function(){
				attachment = mediaUploader.state().get('selection').first().toJSON();
				$('#logo_id').val(attachment.url);
				$('#header-image-src').attr('src',attachment.url);
				
			});
			
			mediaUploader.open();
		});
		
		var mediaUploader2;
		$("#footer-image-id").click(function(e){
			e.preventDefault();
			if(mediaUploader2){
				mediaUploader2.open();
				return;
			}
			mediaUploader2 = wp.media.frames.file_frame = wp.media({
				title:'Select Footer Image',
				button:{
					text:'Select Image'
				},
				multiple:false
				});
			mediaUploader2.on('select',function(){
				attachment2 = mediaUploader2.state().get('selection').first().toJSON();
				$('#image_id').val(attachment2.url);
				$('#footer-image-src').attr('src',attachment2.url);
			});
			
			
			mediaUploader2.open();
		});
		
		
	});
	
	
	
	
	
	