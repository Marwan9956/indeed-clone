<div class="job-post-single-widget">
	<?php print_r($job_id); ?>
	<h3></h3>
	<h4><?php //echo $jobs[$job_id]->Company_Name;?></h4>
	<h4><?php //echo $jobs[$job_id]->country_name;?></h4>
	
	<ul>
		<li><?php// echo $jobs[$job_id]->required_skills;?> </li>
		<li>requirment 1 </li>
		<li>requirment 1 </li>
		<li>requirment 1 </li>
	</ul>
	
	<ul>
		<li><?php //echo $jobs[$job_id]->nice_to_have_skills;?> </li>
		<li>requirment 1 </li>
		<li>requirment 1 </li>
		<li>requirment 1 </li>
	</ul>
	
	<div class="job-post-footer">
		<p><?php //echo $jobs[$job_id]->create_date;?> 30+ days ago .</p>
		<!-- JAVASCRIPT -->
		<form method ="get" action ="<?php// echo base_url('/jobs') . $job->id ; ?>" >
			<a href="#">Save job .</a>
			<a href="#">more ...</a>
		</form>
	</div>
</div>
