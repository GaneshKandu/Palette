<h1 class="text-light"><?=$tpl['project']['project']; ?><span class="mif-palette place-right"></span></h1>
<hr class="thin bg-grayLighter"/>
<div class="input-control text full-size">
	<input type="text" id="file" placeholder="New File" />
	<input type="hidden" id="directory" value="<?=$tpl['project']['path']; ?>" />
</div><button class="button primary" id="createfile" ><span class="mif-plus"></span> Create...</button>
<script>
	document.getElementById("file").addEventListener('keydown', function(e) {
		if(e.keyCode == 13){
			createfile();
		}
	});
</script>
<hr class="thin bg-grayLighter"/>
<form action="<?=URL.'/';?>upload" class="dropzone">
	<input type="hidden" name="path" value="<?=$tpl['project']['path']; ?>" />
</form> 
<hr class="thin bg-grayLighter"/>
<table class="dataTable border bordered" data-auto-width="false">
<tbody>

<?php

$tpl['project']['relatpath'] = str_replace(DS,DS.DS,$tpl['project']['relatpath']);

if(isset($tpl['project']['folders'])){
	foreach($tpl['project']['folders'] as $folder){
		?><tr>
		<td><span class="mif-folder"></span></td>
		<td><?=$folder; ?></td>
		<td><a href="<?=$tpl['project']['url'].'/'.$folder; ?>"><?=$folder; ?></a></td>
        <td><a href="javascript:void(0)" onclick="rmproject('<?=$tpl['project']['relatpath'].DS.DS.$folder; ?>')" ><span class="mif-bin"></span></a></td>
		</tr><?php		
	}
}
if(isset($tpl['project']['files'])){
	foreach($tpl['project']['files'] as $files){
		$arr = explode('.',$files);
		$ext = end($arr);	
		$imgext = array("jpeg", "png", "gif", "bmp","jpg");
		if($ext == 'html'){
			?>
			<tr>
			<td><span class="mif-file-text"></span></td>
			<td><?=$files; ?></td>
			<td><a href="<?=$tpl['project']['editurl'].'/'.$files; ?>">edit</a></td>
			<td><a href="javascript:void(0)" onclick="rmproject('<?=$tpl['project']['relatpath'].DS.DS.$files; ?>')" ><span class="mif-bin"></span></a></td>
			</tr>
			<?php	
		}elseif(in_array($ext,$imgext)){
			?>
			<tr>
			<td><span class="mif-file-text"></span></td>
			<td><?=$files; ?></td>
			<td><img src="<?=$tpl['url'].'thumbs/'.md5_file($tpl['project']['path'].$files).".cache.jpeg"; ?>" width="100px" /></td>
			<td><a href="javascript:void(0)" onclick="rmproject('<?=$tpl['project']['relatpath'].DS.DS.$files; ?>')" ><span class="mif-bin"></span></a></td>
			</tr>
			<?php	
		}
	}
}
?>
</tbody>
</table>
<script src="js/dropzone.js"></script> 