<!-- Javascript handle UI for job post -->
<script src="<?php echo base_url('assets/js/jobpost.js');?>"></script>

<section class="twinty-margin">

	<h2>Job new Post:</h2>
	<?php $this->load->view('inc/layout/message');?>
	
	<form id="jobpost_from" method="post" action="<?php echo base_url("member/jobpost");?>" >
		<div class="input-group list">
			<label for="title">Title: </label>
			<input type="text" name="title" id="title" value="<?php echo set_value('title');?>"/>
		</div>
		
		<div class="input-group list">
			<label>required Skills</label>
			<input type="text" name="required_skills" value="<?php echo set_value('required_skills');?>"/>
			<button class="btn btn-signin" id="add_required_skill" >add</button>
		</div>
		
		<div class="input-group list">
			<label>nice to have Skills</label>
			<input type="text" name="nice_skills" value="<?php echo set_value('nice_skills');?>"/>
			<button class="btn btn-signin" id="add_nice_skill" >add</button>
		</div>
		
		
		<div class="input-group list">
			<label>Description</label>
			<textarea rows="" cols="" name="description"><?php echo set_value('description');?></textarea>
		</div>
		
		<input type="submit" value="Submit" class="btn btn-primary btn-left" />
	</form>
	
</section>