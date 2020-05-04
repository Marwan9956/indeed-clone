<!-- Post job widget in the home page  -->
<?php if($this->session->has_userdata('user_type')):?>
	<?php if($this->session->userdata('user_type') === 'company'):?>
		<section class="post-job-widget">
			<h2>For Employers Your next hire is here</h2>
			<br>
			
			<a href="<?php echo base_url('member/jobpost');?>" class="btn btn-primary">Post  job</a>
		</section>
	<?php endif;?>
<?php endif;?>