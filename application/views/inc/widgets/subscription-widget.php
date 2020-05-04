<?php if(!isUserSubscribe()):?>
<div class="subscription-widget">
	<h6>Be the first to see new <?php echo $this->input->get('q');?> jobs</h6>
	
	<form method="post" action="<?php echo base_url('jobs/subscribe');?>">
		<input type="hidden" value="<?php echo $this->input->get('q');?>" name="searchJob">
		<input type="hidden" value="<?php echo $this->input->get('country');?>" name="country">
		<div class="input-group">
		<?php if(!$this->session->has_userdata('user_id')):?>
			<label>My email:</label>
			<input type="email" name="email"/>
		<?php endif;?>
		</div>
		
		<input type="submit" value="Subscribe" class="btn btn-subscribe" />
		<p class="subscribe-info-txt">
			By creating a job alert or receiving recommended jobs, you agree to our <a>Terms.</a> You can change your consent settings at any time by unsubscribing or as detailed in our terms .
		</p>
	</form>
</div>
<?php endif;?>