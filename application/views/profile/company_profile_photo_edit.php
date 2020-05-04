 <section class="main-col register-box">
 	<?php echo form_open_multipart(base_url('profile/edit_Profile_photo/' . $company->id));?>
	<div class="input-file-group">
		<label for="logo">
			<i class="fa fa-image"></i> Upload Logo
		</label>
		<span class="file-format">JPG or PNG only</span>
		<input id="logo" type="file" name="logo"/>
	</div>
	<input type="submit" name="submit" value="Upload" class="btn btn-signin btn-row"/>
	<a href="<?php echo base_url('profile/company/' . $company->id)?>" class="btn btn-signin btn-row" >Back </a>
	<?php echo form_close();?>
</section>