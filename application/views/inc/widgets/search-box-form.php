<form method="GET" action="<?php echo base_url('jobs/search')?>">
	<div class="input">
		<label> What </label>
		<input type="text" placeholder="Job title , keywords , or company" name="q">
	</div>
	<div class="input">
		<label> Where </label>
		<input type="text" id="searchCountries" placeholder="Country" name="country">
	</div>
	
	<input type="submit"  value="Find Jobs" class="btn btn-primary btn-find" />
</form>