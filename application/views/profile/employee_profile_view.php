
<?php if(isset($user)):?>
<script src=''> </script>
<link rel="stylesheet" href="<?php echo base_url('assets/css/profile.css');?>">
<section class='employee-profile'>
	<header>
		<img alt="" src="<?php echo base_url('upload/user_profile/img.jpg')?>">
		<p><?php echo $user->first_name . ' '; ?> <?php echo $user->last_name; ?></p>
		<p class="small-txt"> <?php echo $user->current_status_name; ?></p>
		<p class="small-txt"> <?php echo $user->country_name; ?> </p>
		<!-- IF There is company -->
		<?php if($user_Company):?>
			<p class="small-txt"> <?php echo $user_Company;; ?> </p>
		<?php endif;?>
		<p class="small-txt"> <?php echo $user->email; ?></p>
	</header>
	<!-- Education -->
	<section class="widget">
		<h3>Education</h3>
		<!-- Loop -->
		<div>
			<p>Sikkim manipal university</p>
			<p class="small-txt"></p>
			<p><span>From</span> - <span>To</span></p>
		</div>
		<!-- Loop End -->	
		<!-- IF USER ADD EDIT PROFILE -->	
		<?php if($this->session->userdata('user_type') == 'employee' ):?>
			<?php if($this->session->userdata('user_id') == $user->id):?>	
				<button class="btn btn-signin">Add Education</button>
				<button class="btn btn-signin">Save</button>
			<?php endif;?>
		<?php endif;?>
	</section>
	<!-- Experience -->
	<section class="widget">
		<h3>Experience</h3>
		
		<!-- Loop -->
		<div>
			<p>Job Title</p>
			<p class="small-txt">Comapny Name</p>
			<p><span>From</span> - <span>To</span></p>
		</div>
		<!-- Loop End -->	
		<!-- IF USER ADD EDIT PROFILE -->
		<?php if($this->session->userdata('user_type') == 'employee' ):?>
			<?php if($this->session->userdata('user_id') == $user->id):?>		
				<button class="btn btn-signin">Add Education</button>
				<button class="btn btn-signin" >Save</button>
			<?php endif;?>
		<?php endif;?>
	</section>
	
	
</section>
<?php else:?>

<section class="widget">
		<div class="alert alert-warning">
			<h3><?php echo $error;?></h3>
		</div>
		<a href="<?php echo base_url();?>" class="btn btn-primary">
			Back
		</a>
</section>
	
<?php endif;?>