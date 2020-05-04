<?php if($this->session->userdata('company_type') == 'true'  && $this->session->userdata('user_id') == $company->id):?>



<section class="main-col register-box">
	<h2>Edit Profile:</h2>
	
	
	<form method='post' action="<?php echo base_url('profile/edit_Profile/') . $company->id; ?>" >
		<div class="input-group">
			<label for="name">Comapny name: </label>
			<input type="text" name="name" value="<?php echo $company->name;?>" id="name" />
		</div>
		
		
		<div class="input-group">
			<label for="email" >Email: </label>
			<input type="email" name="email" id="email" value="<?php echo $company->email;?>" />
		</div>
		
		<div class="input-group">
			<label for="website" >Website: </label>
			<input type="url" name="website" id="website"
		       placeholder="https://example.com"
		       pattern="https://.*" size="30"
		       required
		       value="<?php echo $company->website_url;?>">
		</div>
		
		<div class="input-group">
			<label for="phoneNum">Phone number: </label>
			<input type="text" id="phoneNum" name="phoneNum"  value="<?php echo $company->phone_number;?>" />
		</div>
		
		<div class="input-group">
			<label for="emp_count">Employee Count</label>
			<input type="number" name="emp_count" id="emp_count"   min="4"  value ="<?php echo $company->employee_count;?>"/>
		</div>
		
		<div class="input-group">
			<label> Country </label>
			<select name="country">
				<?php foreach (countries() as $country):?>
				<option value="<?php echo $country->code;?>"  <?php if($country->code == $company->country_code){echo 'selected';}?>><?php echo $country->name;?></option>
				<?php endforeach;?>
			</select>
		</div>
		
		<?php if(industries()):?>
		<div class="input-group">
			<label> Industry </label>
			<select name="industry">
				<?php foreach (industries() as $industry):?>
				<option value="<?php echo $industry->id;?>"  <?php if($industry->id == $company->industry_id) echo 'selected';?>><?php echo $industry->name;?></option>
				<?php endforeach;?>
			</select>
		</div>
		<?php endif;?>
		
		
		
		
		
		
		<div class="input-group">
			<label>Description</label>
			<textarea rows="" cols="" name="description"><?php echo $company->description;?></textarea>
		</div>
		
		
		
		<input type="submit" value="Save" class="btn btn-primary btn-lg" />
	</form>
	
</section>
<?php else:?>
<?php redirect(base_url('profile/company/') . $company->id);?>
<?php endif;?>
