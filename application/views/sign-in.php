<section class="sign-in-section">
	
	<section class="sign-in-widget">
		<div class="logo"><img class="logo" src="<?php echo base_url('assets/img/indeedLogo.jpg')?>" /></div>
		<?php $this->load->view("inc/layout/message");?>
		<form action="<?php echo base_url("member/login");?>" method="post">
			<h3>Sign In</h3>
			<hr>
			
			<div class="input-group">
				<label for="userType"> Sign in As  </label>
				<select name="userType" id="userType">
					<option value="employee">Employee </option>
					<option value="company"> Company  </option>
				</select>
			</div>
			
			<div class="input-group">
				<label for="email">Email Address </label>
				<input type="email" name="email" value="" id="email">
			</div>
			
			<div class="input-group">
				<label for="password" >Password</label>
				<input type="password" name="password" value="" id="password">
			</div>
			
			<div class="checkbox-group">
				<input type="checkbox" name="keep-sign-me" value="" id="keep-sign-me">
				<label for="keep-sign-me"> Keep me Signed in on this device</label>
			</div>
			
			<input type="submit" value="Sign in" name="sign-in" class="btn btn-signin btn-signin-primary" />
			
			<hr>
			<div class="center-text"><p>or</p></div>
			<hr>
			<a href="#" class="btn btn-signin Not_implement"  > Sign in with Google   </a>
			<a href="#" class="btn btn-signin Not_implement"  > Sign in with Facebook </a>
		</form>
	</section>
</section>