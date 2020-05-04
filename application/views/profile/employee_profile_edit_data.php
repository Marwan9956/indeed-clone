<section class="main-col register-box">
	<h2>Upload data:</h2>
	<?php echo form_open_multipart('profile/updateUser/data');?>
		<div class="input-file-group">
			<label for="file-upload" >
				<i class="fa fa-cloud-upload"></i> Upload resume
			</label>
			<span class="file-format">PDF only</span>
			<input id="file-upload" type="file" name="resume"/>
		</div>
		
		<div class="input-file-group">
			<label for="profile_img">
				<i class="fa fa-image"></i> Profile image
			</label>
			<span class="file-format">JPG or PNG only</span>
			<input id="profile_img" type="file" name="profile_img"/>
		</div>
	<input id="Update_userprofile_data" type="submit" value="Update" class="btn btn-primary btn-lg" />
	<?php echo form_close();?>
</section>