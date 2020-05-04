<!-- Javascript handle UI for job post -->

<script src="<?php echo base_url('assets/js/jobpost.js');?>"></script>

<section class="twinty-margin">

	<h2>Edit Post:</h2>
	<?php $this->load->view('inc/layout/message');?>
	
	<form id="jobpost_from" method="post" action="<?php echo base_url("jobs/edit/" . $job->id);?>" >
		<div class="input-group list">
			<label for="title">Title: </label>
			<input type="text" name="title" value="<?php echo $job->title;?>" id="title" />
		</div>
		
		<div class="input-group list">
			<label>required Skills</label>
			<!-- start -->
			<?php 
			    $requiredSkills = trim($job->required_skills);
				$requiredSkills = explode('|' , $requiredSkills);
				$count = 0
			?>
			<input type="hidden" id="required_Counts" value="<?php echo count($requiredSkills);?>">
			
			<input type="text" name="required_skills" value="<?php echo $requiredSkills[0];?>" />
			<?php for($i = 1; $i < count($requiredSkills); $i++):?>
				<input type="text" name="required_skills<?php echo $i;?>" value="<?php echo $requiredSkills[$i];?>" />
			<?php endfor;?>
			<!-- End -->
			<button class="btn btn-signin" id="add_required_skill" >add</button>
		</div>
		
		<div class="input-group list">
			<label>nice to have Skills</label>
			<!-- start -->
			<?php 
				$niceSkills = trim($job->nice_to_have_skills);
				$niceSkills = explode('|' , $niceSkills);
			?>
			<input type="hidden" id="nice_skills_Counts" value="<?php echo count($niceSkills);?>">
			
			<input type="text" name="nice_skills" value="<?php echo $niceSkills[0];?>" />
			<?php for($i = 1; $i < count($niceSkills); $i++):?>
				<input type="text" name="nice_skills<?php echo $i;?>" value="<?php echo $niceSkills[$i];?>" />
			<?php endfor;?>
			
			<button class="btn btn-signin" id="add_nice_skill" >add</button>
		</div>
		
		
		<div class="input-group list">
			<label>Description</label>
			<textarea rows="" cols="" name="description">
				<?php echo $job->description;?>
			</textarea>
		</div>
		
		<input type="submit" value="Submit" class="btn btn-primary btn-left" />
	</form>
	
</section>