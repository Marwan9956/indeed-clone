<?php 
$name      = $this->input->post('name')      ? $this->input->post('name') : '';
$email     = $this->input->post('email')     ? $this->input->post('email')     : '';
$website   = $this->input->post('website')   ? $this->input->post('website')   : '';
$phoneNum  = $this->input->post('phoneNum')  ? $this->input->post('phoneNum')  : '';
$emp_count = $this->input->post('emp_count') ? $this->input->post('emp_count') : '4';

?>
<section class="main-col register-box">
	<h2>Register Company:</h2>
	<?php $this->load->view('inc/layout/message');?>
	<?php echo form_open_multipart('register/company');?>
		<div class="input-group">
			<label for="name">Comapny name: </label>
			<input type="text" name="name"  id="name"  value="<?php echo $name;?>"/>
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
			<input type="email" name="email" id="email" value="<?php echo $email;?>" />
		</div>
		
		<div class="input-group">
			<label for="website" >Website: </label>
			<input type="url" name="website" id="website"
		       placeholder="https://example.com"
		       pattern="https://.*" size="30"
		       value="<?php echo $website;?>"
		       required>
		</div>
		
		<div class="input-group">
			<label for="phoneNum">Phone number: </label>
			<input type="text" id="phoneNum" name="phoneNum"  value="<?php echo $phoneNum;?>" />
		</div>
		
		<div class="input-group">
			<label for="emp_count">Employee Count</label>
			<input type="number" name="emp_count" id="emp_count"   min="4"  value ="<?php echo $emp_count;?>"/>
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
		
		<?php if(industries()):?>
		<div class="input-group">
			<label> Industry </label>
			<select name="industry">
				<option value="">Select Industry</option>
				<?php foreach (industries() as $industry):?>
				<option value="<?php echo $industry->id;?>"><?php echo $industry->name;?></option>
				<?php endforeach;?>
			</select>
		</div>
		<?php endif;?>
		
		
		
		
		
		
		<div class="input-group">
			<label>Description</label>
			<textarea rows="" cols="" name="description"></textarea>
		</div>
		
		<div class="input-file-group">
			<label for="logo">
				<i class="fa fa-image"></i> Upload Logo
			</label>
			<span class="file-format">JPG or PNG only</span>
			<input id="logo" type="file" name="logo"/>
		</div>
		
		<input type="submit" value="Submit" class="btn btn-primary btn-lg" />
	<?php echo form_close();?>
</section>