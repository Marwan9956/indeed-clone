<?php if(isset($company)):?>
<?php 
$logo_url =  empty($company->logo_url) ?  base_url('assets/img/company-logo-default.jpg') : base_url('upload/company_logo/'.$company->logo_url);
?>
<link rel="stylesheet" href="<?php echo base_url('assets/css/profile.css');?>">
<section class="company-page">
	<header>
		<div class="rectangle"></div>
		<div class="company-info-sm">
			<img class="com-prof-img"  src= "<?php echo $logo_url; ?>" />
			<div>
				<h3> <?php echo $company->name;?> </h3>
				<h4><?php echo $company->country_name;?></h4>
			</div>
		</div>
		<nav>
			<!-- Add company ID -->
			<div><a href="<?php echo base_url('/profile/company/') . $company->id;?>"> Profile </a></div>
			<div><a href="<?php echo base_url('/profile/company'). '?comId='. $company->id .'&joblist=true' ; ?>"> Jobs    </a></div>
			
			<!-- IF USER IS THE COMPANY ITSELF ONLY -->
			<?php if($this->session->userdata('company_type') == 'true'  && $this->session->userdata('user_id') == $company->id):?>
			<div><a href="<?php echo base_url('/profile/edit_Profile/'). $company->id; ?>" class=""> Edit Profile  </a></div>
			<div><a href="<?php echo base_url('/profile/edit_Profile_photo/'). $company->id; ?> "> Change Photo    </a></div>
			<?php endif;?>
			<!-- End  -->
			<div><a href="#" class="Not_implement"> Photos  </a></div>
		</nav>
	</header>
	
	<?php $this->load->view('inc/layout/message');?>
	
	<div >
		<!--  <a href="#" class="btn btn-signin btn-row">View Jobs</a>  -->
	</div>
	
	<!-- You Load View Here  -->
		<?php $this->load->view('profile/'. $view);?>
	<!-- END  -->

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