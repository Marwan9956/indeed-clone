
<?php if(isset($user)):?>
<?php 
//$user->email
$profile_img =  empty($user->profile_img) ?  base_url('assets/img/user_profile_default.jpg') : base_url('upload/user_profile/'.$user->profile_img);
?>
<script src='<?php echo base_url('assets/js/user_profile.js')?>'> </script>
<link rel="stylesheet" href="<?php echo base_url('assets/css/profile.css');?>">
<section class='employee-profile'>
	<header>
		<img alt="" src="<?php echo $profile_img;?>">
		<h2><?php echo ucfirst($user->first_name) . ' '; ?> <?php echo ucfirst($user->last_name); ?></h2>
		
		
		<!-- IF There is company -->
		<?php if($user_Company):?>
			<div class="profile_text_col_two">
				<p class="main-txt">Work At :  </p> 
				<p class="small-txt"><?php echo $user_Company;; ?> </p>
			</div>
			<div class="profile_text_col_two">
				<p class="main-txt">Employment Status: </p>
				<p class="small-txt"><?php echo $user->current_status_name; ?></p>
			</div>
		<?php endif;?>
		<div class="profile_text_col_two">
			<p class="main-txt">From: </p>
			<p class="small-txt"><?php echo $user->country_name; ?> </p>
		</div>
		<a class="btn btn-signin btn-profile" href="mailto:<?php echo $user->email; ?>">Email Me</a>
	</header>
	
	<!-- Error MESSAGES  -->
	<?php $this->load->view('inc/layout/message');?>
	
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
	
	<?php if(!empty($user->resume_url)):?>
	<div class="widget">
		<h2>Resume:</h2>
		<a href="<?php echo base_url('upload/user_resume/' . $user->resume_url);?>"class= "btn btn-signin">Resume Link </a>
	</div>
	<?php endif;?>
	
	<div class="widget">
		<h2>Change Login Information:</h2>
		<a href="<?php echo base_url('profile/change_password');?>"class= "btn btn-signin">Change   </a>
	</div>
	
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