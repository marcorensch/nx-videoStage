<style type="text/css">
<?php echo '#stage_' . $pl['data']['id']; ?> {
	background:			<?php echo $pl['additions']['stagecolor']; ?>;
	margin-bottom:		80px;
}
<?php echo '#player_'.$pl['data']['id']; ?>{
	 padding-bottom: <?php echo $pl['configuration']['ratio']?>;				/* Use 75% for 4:3 videos || or 56.23% for 16:9 videos */
}
<?php
	if($pl['configuration']['effect'] == 'dropshadow'){
		echo '#player_'.$pl['data']['id'].'::before {
				bottom: 			-80px;
				
			}';
	};
?>
<?php echo 'video#' . $pl['data']['id']; ?> {

	border: 		<?php echo $pl['configuration']['borderwidth'] . ' solid ' . $pl['configuration']['bordercolor']; ?>;
	border-radius: 	<?php echo $pl['configuration']['radius']; ?>;
	overflow:		hidden;
	}
</style>
