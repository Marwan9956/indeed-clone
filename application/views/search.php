<?php 
$currentPageNumber = $this->input->get('start'); 
if(!empty($currentPageNumber)){
	$currentPageNumber = (intval($currentPageNumber) + 10 ) / 10; 
}else{
	$currentPageNumber = '1';
}
?>
<script src="<?php echo base_url('assets/js/ajax.js');?>"> </script>
<div class="row">
	<section class="search-box sm-search-box">
	<?php $this->load->view('inc/widgets/search-box-form');?>
	</section>
</div>
<div class="row-col-3">
	<div>
		<!--
		<div class="sort">
			<h5>Sort by:</h5>
			<a href="#">relevance </a>
			-
			<a href="#"> date</a>
		</div>
		<div class="cities">
			<h5>Sort by:</h5>
			<a href="#">New York </a>
			-
			<a href="#"> ...</a>
		</div>
		-->
	</div>
	<div class="col-main">
		<p>
			<a href="#"> Upload your resume</a> 
			- Let employers find you
		</p>
		<hr>
		<span><?php echo 'Page ' .  $currentPageNumber . ' of '  .  $lastPage; ?> </span>
		<span> Total jobs count <?php echo  $totalJobsCount . ' ';  ?>jobs </span>
		<?php if($jobs):?>
			<!-- Here is the loop -->
			<?php $this->load->view('inc/widgets/job-post-small-widget');?>
		<?php endif;?>
			<div>
				<?php echo $this->pagination->create_links(); ?>
			</div>
		<!-- loop -->
	</div>
	
	<div>
		<?php $this->load->view('inc/widgets/subscription-widget');?>
		
		
		<!--- here when user click on job post it display the full job details -->
		<div id="display-single-job"></div>
		
		
	</div>
</div>