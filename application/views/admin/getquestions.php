<option value="">--Select--</option>
<?php foreach ($questions as $value) { ?>
  <option value="<?php echo  $value['question'] ?>"><?php echo  $value['question'] ?></option>
   
<?php } ?>