<div class="row">
	<section class="search-box sm-search-box">
	<?php $this->load->view('inc/widgets/search-box-form');?>
	</section>
</div>
<div class="row-col-3">
	<div>
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
	</div>
	<div class="col-main">
		<p>
			<a href="#"> Upload your resume</a> 
			- Let employers find you
		</p>
		<hr>
		<span> Page 1 of 10 </span>
		<span> Total jobs count 19,200 jobs </span>
		
		<!-- Here is the loop -->
		<?php $this->load->view('inc/widgets/job-post');?>
		
		<!-- loop -->
	</div>
	
	<div>
		<?php $this->load->view('inc/widgets/subscription-widget');?>
		
		<!--- here when user click on job post it display the full job details -->
		
		
	</div>
</div>