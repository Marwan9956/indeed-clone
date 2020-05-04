<?php 
$email = $this->session->userdata('email');
?>
<!-- Error Msg -->
<?php $this->load->view('inc/layout/message');?>


<section class="main-col register-box">
	<form method='post' action="<?php echo base_url('profile/change_password'); ?>" >
		<div class="input-group">
			<label for="email">Email: </label>
			<input type="email" name="email" value="<?php echo $email;?>" id="email" />
		</div>
		<div class="input-group">
			<label for="password">Password: </label>
			<input type="password" name="password" value="" id="password" placeholder="if You don't want to change your password leave it blank"/>
		</div>
		<div class="input-group">
			<label for="con-password">Confirm password: </label>
			<input type="password" name="con-password" value="" id="con-password" />
		</div>
		
		<input type="submit" value="submit" class="btn btn-primary" />
	</form>
</section>