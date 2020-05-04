<section class="main-col register-box">
	<h2>Edit Profile information:</h2>
	<?php $this->load->view('inc/layout/message');?>
	<form method="post" action="<?php echo base_url('profile/editUser');?>">
		<div class="input-group">
			<label for="firstName">First name: </label>
			<input type="text" name="firstName" value="<?php echo $user->first_name;?>" id="firstName" />
		</div>
		<div class="input-group">
			<label for="lastName">Last name: </label>
			<input type="text" name="lastName"  id="lastName" value="<?php echo $user->last_name;?>"/>
		</div>
		<div class="input-group">
			<label for="username" >Username: </label>
			<input type="text" name="username" id="username" value="<?php echo $user->username;?>" />
		</div>
		
		
		<div class="input-group">
			<label> Country </label>
			<select name="country">
				<?php foreach (countries() as $country):?>
				<option value="<?php echo $country->code;?>" <?php echo $country->code == $user->country_code ?   'selected' : '';?>><?php echo $country->name;?></option>
				<?php endforeach;?>
			</select>
		</div>
		
		<?php if(companies()):?>
			<div class="input-group">
				<label> Comapny </label>
				<select name="company">
					<option></option>
					<?php foreach (companies() as $company):?>
					<option value="<?php echo $company->id;?>" <?php echo $company->id == $user->company_id ?   'selected' : '';?>><?php echo $company->name;?></option>
					<?php endforeach;?>
				</select>
			</div>
		<?php endif;?>
		
		<?php if(status()):?>
			<div class="input-group">
				<label> Current employement status </label>
				<select name="status">
					<option></option>
					<?php foreach (status() as $status):?>
					<option value="<?php echo $status->id;?>"  <?php echo $status->id == $user->current_status_id ?   'selected' : '';?> ><?php echo $status->name;?></option>
					<?php endforeach;?>
				</select>
			</div>
		<?php endif;?>
		<div class="input-group">
			<label for="phoneNum">Phone number: </label>
			<input type="text" id="phoneNum" name="phoneNum"  value="<?php echo $user->phone_number;?>" />
		</div>
		
		
		
		<input type="submit" value="Update" class="btn btn-primary btn-lg" />
	</form>
</section>