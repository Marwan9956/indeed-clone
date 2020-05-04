<!--Site Navigation Links -->
<nav class="nav-main">
	<div ><img class="logo" src="<?php echo base_url('assets/img/indeedLogo.jpg')?>" /></div>
	<div class="left-nav">
		<a href="<?php echo base_url();?>">Find jobs</a>
	</div>
	<div class="right-nav">
		<?php if($this->session->has_userdata('user_type')):?>
			<?php if($this->session->user_type == 'company'):?>
				<a href="<?php echo base_url('member/jobpost');?>">
					Employers / Post Job
				</a>
				<a href="<?php echo base_url('profile/company/') . $this->session->userdata('user_id');?>"> 
					Profile 
				</a>
			<?php else:?>
				<a href="<?php echo base_url('profile/updateUser/data');?>">
					Update your resume
				</a>
				
				<a href="<?php echo base_url('profile/user/') . $this->session->userdata('user_id');?>"> 
					Profile 
				</a>
				
				<a href="<?php echo base_url('profile/editUser/');?>"> 
					Edit Profile 
				</a>
			<?php endif;?>
			
		<?php endif;?>
		
		
		<?php if(! $this->session->has_userdata('user_id')):?>
			<a href="<?php echo base_url('register');?>">
				Sign up
			</a>
			<a href="<?php echo base_url('member/login');?>">
				Sign in
			</a>
			<?php else:?>
			<a href="<?php echo base_url('member/logout');?>">
				Sign out
			</a>
		<?php endif;?>
	</div>
</nav>
	
	
