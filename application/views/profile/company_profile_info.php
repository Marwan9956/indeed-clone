<section class="company-info">
	<h1><?php echo $company->name;?></h1>
	
	<h3>About us</h3>
	<p> <?php echo $company->description;?></p>
	
	<h3>Employees</h3>
	<p><?php echo $company->employee_count;?>  current employee</p>
	
	<h3>Industry</h3>
	<p><?php echo $company->industry_name;?></p>
	
	<h3>Email</h3>
	<a href="#"><?php echo $company->email;?> </a>
	
	<h3>Website</h3>
	<a href="<?php echo $company->website_url;?>"> <?php echo $company->name;?></a>
	
	
</section>