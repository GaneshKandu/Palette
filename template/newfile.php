<h1 class="text-light">New Page<span class="mif-palette place-right"></span></h1>
<hr class="thin bg-grayLighter"/>
<div class="input-control text full-size">
	<table style="width:100%"  id="tbl_createfile" >
	<tr><td>File Name</td></tr>
	<tr><td><input type="text" id="file" placeholder="index" value="index" /></td></tr>
	<tr><td>Title</td></tr>
	<tr><td><input type="text" id="title" placeholder="Palette" value="Palette" /></td></tr>
	<tr><td>Robots</td></tr>
	<tr><td><input type="text" id="robots" placeholder="" value="NOINDEX, NOFOLLOW" /></td></tr>
	<tr><td>Description</td></tr>
	<tr><td><input type="text" id="description" placeholder="" /></td></tr>
	<tr><td>Keywords</td></tr>
	<tr><td><input type="text" id="keywords" placeholder="" /></td></tr>
	<tr><td>Icon</td></tr>
	<tr><td><input type="text" id="icon" placeholder="favicon.ico" value="favicon.ico" /></td></tr>
	<tr><td>
<button class="button primary" id="createfile" style="position:unset" ><span class="mif-plus"></span> Create...</button>
</td></tr>
	</table>
	<input type="hidden" id="directory" value="<?=$tpl['project']['path']; ?>" />
	<input type="hidden" id="baseurl" value="<?php echo (count(explode(DS,$tpl['project']['relatpath']))-1); ?>" />
</div>
<script>
	document.getElementById("file").addEventListener('keydown', function(e) {
		if(e.keyCode == 13){
			createfile();
		}
	});
</script>
