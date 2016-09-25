<h1 class="text-light"><?php echo $tpl['lang']['cnp']; ?><span class="mif-palette place-right"></span></h1>
<hr class="thin bg-grayLighter"/>
<div class="input-control text full-size">
	<table style="width:100%"  id="tbl_createfile" >
	<tr><td><?php echo $tpl['lang']['File_Name']; ?></td></tr>
	<tr><td><input type="text" id="file" placeholder="index" value="index" /></td></tr>
	<tr><td><?php echo $tpl['lang']['Title']; ?></td></tr>
	<tr><td><input type="text" id="title" placeholder="Palette" value="Palette" /></td></tr>
	<tr><td>Robots</td></tr>
	<tr><td><input type="text" id="robots" placeholder="" value="NOINDEX, NOFOLLOW" /></td></tr>
	<tr><td><?php echo $tpl['lang']['Description']; ?></td></tr>
	<tr><td><input type="text" id="description" placeholder="" /></td></tr>
	<tr><td><?php echo $tpl['lang']['Keywords']; ?></td></tr>
	<tr><td><input type="text" id="keywords" placeholder="" /></td></tr>
	<tr><td><?php echo $tpl['lang']['Icon']; ?></td></tr>
	<tr><td><input type="text" id="icon" placeholder="favicon.ico" value="favicon.ico" /></td></tr>
	<tr><td>
<button class="button primary" id="createfile" style="position:unset" ><span class="mif-plus"></span> <?php echo $tpl['lang']['Create']; ?>...</button>
</td></tr>
	</table>
	<input type="hidden" id="directory" value="<?php echo $tpl['project']['path']; ?>" />
	<input type="hidden" id="baseurl" value="<?php echo (count(explode(DS,$tpl['project']['relatpath']))-1); ?>" />
</div>
<script>
	document.getElementById("file").addEventListener('keydown', function(e) {
		if(e.keyCode == 13){
			createfile();
		}
	});
</script>
