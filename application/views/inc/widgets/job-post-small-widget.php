<?php $this->load->view('inc/layout/message');?>

<?php foreach ($jobs as $job):?>

<div id="<?php echo $job->id; ?>" class="job-post">
	<h3><?php echo $job->title;?></h3>
	<h4><?php echo $job->Company_Name;?></h4>
	<h4><?php echo $job->country_name;?></h4>
	
	<ul>
		<li><?php echo $job->required_skills;?> </li>
		<li>requirment 1 </li>
		<li>requirment 1 </li>
		<li>requirment 1 </li>
	</ul>
	
	<ul>
		<li><?php echo $job->nice_to_have_skills;?> </li>
		<li>requirment 1 </li>
		<li>requirment 1 </li>
		<li>requirment 1 </li>
	</ul>
	
	<div class="job-post-footer">
		<p><?php echo $job->create_date;?> 30+ days ago .</p>
		
		
		<a href="#">Save job .</a>
		<a href="#">more ...</a>
		
	</div>
</div>
<?php endforeach;?>