
<section class="main-col register-box">
	<h2>Register:</h2>
	<?php $this->load->view('inc/layout/message');?>
	<?php echo form_open_multipart('register/employee');?>
		<div class="input-group">
			<label for="firstName">First name: </label>
			<input type="text" name="firstName" value="" id="firstName" />
		</div>
		<div class="input-group">
			<label for="lastName">Last name: </label>
			<input type="text" name="lastName"  id="lastName"/>
		</div>
		<div class="input-group">
			<label for="username" >Username: </label>
			<input type="text" name="username" id="username"  />
		</div>
		<div class="input-group">
			<label for="password" >Password: </label>
			<input type="password" name="password" id="password"/>
		</div>
		<div class="input-group">
			<label for="conPassword">Confirm Password: </label>
			<input type="password" name="conPassword" id="conPassword" />
		</div>
		<div class="input-group">
			<label for="email" >Email: </label>
			<input type="email" name="email" id="email" />
		</div>
		<div class="input-group">
			<label> Country </label>
			<select name="country">
				<option value="">Select your country</option>
				<?php foreach (countries() as $country):?>
				<option value="<?php echo $country->code;?>"><?php echo $country->name;?></option>
				<?php endforeach;?>
			</select>
		</div>
		
		<?php if(companies()):?>
			<div class="input-group">
				<label> Comapny </label>
				<select name="company">
					<option value="">select a company</option>
					<?php foreach (companies() as $company):?>
					<option value="<?php echo $company->id;?>"><?php echo $company->name;?></option>
					<?php endforeach;?>
				</select>
			</div>
		<?php endif;?>
		
		<?php if(status()):?>
			<div class="input-group">
				<label> Current employement status </label>
				<select name="status">
					<?php foreach (status() as $status):?>
					<option value="<?php echo $status->id;?>"><?php echo $status->name;?></option>
					<?php endforeach;?>
				</select>
			</div>
		<?php endif;?>
		<div class="input-group">
			<label for="phoneNum">Phone number: </label>
			<input type="text" id="phoneNum" name="phoneNum"   />
		</div>
		
		<div class="input-file-group">
			<label for="file-upload" >
				<i class="fa fa-cloud-upload"></i> Upload resume
			</label>
			<span class="file-format">PDF only</span>
			<input id="file-upload" type="file" name="resume"/>
		</div>
		
		<div class="input-file-group">
			<label for="profile_img">
				<i class="fa fa-image"></i> Profile image
			</label>
			<span class="file-format">JPG or PNG only</span>
			<input id="profile_img" type="file" name="profile_img"/>
		</div>
		
		<input type="submit" value="Submit" class="btn btn-primary btn-lg" />
	<?php echo form_close();?>
</section>