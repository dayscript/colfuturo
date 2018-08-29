<?php if(isset($data)): ?>
	<div class="nombres-apellidos"><?php echo $data[1].' '.$data[2];?></div>
	<div class="porcent-wrapper">
		<div class="profile-complete"style="width:<?php echo $data[0];?>%"></div>
	</div>
	<div class="text-porcent"><?php echo $data[0] ?>%</div>
<?php endif;?>