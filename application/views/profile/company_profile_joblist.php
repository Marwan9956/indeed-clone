<table>
  <tr>
    <th>ID</th>
    <th>Title</th>
    <th>Data</th>
    <th>Candidate</th>
    <?php if($canEdit):?>
    <th>view</th>
    <th>delete<th>
    <?php endif;?>
  </tr>
  <?php foreach ($joblist as $jobSingle):?>
  <tr>
    <td><?php echo $jobSingle->id;?></td>
    <td><?php echo $jobSingle->title;?></td>
    <td><?php echo date('d - m - Y' , strtotime($jobSingle->create_date));?></td>
    <td><?php echo $jobSingle->candidate_count_indeed;?></td>
    <!-- IF USER IS THE COMPANY CREATED THE JOB -->
    <?php if($canEdit):?>
    	<td><a href="<?php echo base_url('jobs/edit/' . $jobSingle->id);?>" >Edit</a></td>
    	<td><a class="danger-link" href="<?php echo base_url('jobs/delete/' . $jobSingle->id);?>" >Delete</a></td>
    <?php endif;?>
    <!-- END IF -->
  </tr>
  <?php endforeach;?>
</table>
<div class="table-pagination">
<?php echo $this->pagination->create_links();?>
</div>

