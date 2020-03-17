
<?php if(isset($user)):?>
<script src='<?php echo base_url('assets/js/user_profile.js')?>'> </script>
<link rel="stylesheet" href="<?php echo base_url('assets/css/profile.css');?>">
<section class='employee-profile'>
	<header>
		<img alt="" src="<?php echo base_url('upload/user_profile/img.jpg')?>">
		<h2><?php echo $user->first_name . ' '; ?> <?php echo $user->last_name; ?></h2>
		<p class="small-txt"> <?php echo $user->current_status_name; ?></p>
		<p class="small-txt"> <?php echo $user->country_name; ?> </p>
		<!-- IF There is company -->
		<?php if($user_Company):?>
			<p class="small-txt"> <?php echo $user_Company;; ?> </p>
		<?php endif;?>
		<p class="small-txt"> <?php echo $user->email; ?></p>
	</header>
	<!-- Education -->
	<section id="Education-widget" class="widget">
		<h2>Education</h2>
		<!-- Loop -->
		<?php if(!empty($educations)):?>
			<?php foreach ($educations as $education):?>
				<div class='education'>
					<div class="flex">
						<p id="instituteName" ><?php echo $education->InsitituteName;?> </p>
						<div>
							<!-- IF USER ADD EDIT PROFILE -->	
							<?php if($this->session->userdata('user_type') == 'employee' ):?>
								<?php if($this->session->userdata('user_id') == $user->id):?>
								<a  class="delete_education closeEducation" > X </a>
								<?php endif;?>
							<?php endif;?>
						</div>
					</div>
					<p id="programTitle" ><span><?php echo $education->programTitle;?></span> </p>
					<p>
						<span id="fromDate"><?php echo $education->fromDate;?></span> 
						- 
						<span id="toDate"><?php echo $education->to;?></span>
					</p>
					
				</div>
			<?php endforeach;?>
		<?php endif;?>
		<!-- Loop End -->	
		<!-- IF USER ADD EDIT PROFILE -->	
		<?php if($this->session->userdata('user_type') == 'employee' ):?>
			<?php if($this->session->userdata('user_id') == $user->id):?>	
				<button id="add_education" class="btn btn-signin">Add Education</button>
				<button id="save_education" class="btn btn-signin">Save</button>
			<?php endif;?>
		<?php endif;?>
	</section>
	<!-- Experience -->
	<section id="Experience-widget" class="widget">
		<h2>Experience</h2>
		<?php if(!empty($experiences)):?>
		<pre><?php //print_r($educations);?></pre>
			<!-- Loop -->
			<?php foreach ($experiences as $experience):?>
				<div class='experience'>
					<div class="flex">
						<p id="companyName" ><?php echo $experience->companyName;?> </p>
						<div>
							<!-- IF USER ADD EDIT PROFILE -->	
							<?php if($this->session->userdata('user_type') == 'employee' ):?>
								<?php if($this->session->userdata('user_id') == $user->id):?>
								<a  class="delete_experience closeEducation" > X </a>
								<?php endif;?>
							<?php endif;?>
						</div>
					</div>
					<p id="jobRole" ><span><?php echo $experience->jobRole;?></span> </p>
					<p>
						<span id="fromDate"><?php echo $experience->fromDate;?></span> 
						- 
						<span id="toDate"><?php echo $experience->to;?></span>
					</p>
					
				</div>
			<?php endforeach;?>
		<?php endif;?>
		<!-- Loop End -->
		<!-- IF USER ADD EDIT PROFILE -->	
		<?php if($this->session->userdata('user_type') == 'employee' ):?>
			<?php if($this->session->userdata('user_id') == $user->id):?>	
				<button id="add_experience" class="btn btn-signin">Add Experience</button>
				<button id="save_experience" class="btn btn-signin">Save</button>
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