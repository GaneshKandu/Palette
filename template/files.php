<h1 class="text-light"><?=$tpl['project']['project']; ?><span class="mif-palette place-right"></span></h1>
<hr class="thin bg-grayLighter"/>
<a href="<?=URL.'/';?>projects/newfile/<?php echo str_replace(DS,'/',$tpl['project']['relatpath']) ?>" ><button class="button primary" ><span class="mif-plus"></span><?php echo $tpl['lang']['cnp']; ?></button></a>
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
			<td><a href="<?=$tpl['project']['editurl'].'/'.$files; ?>"><?php echo $tpl['lang']['edit']; ?></a></td>
			<td><a href="javascript:void(0)" onclick="rmproject('<?=$tpl['project']['relatpath'].DS.DS.$files; ?>')" ><span class="mif-bin"></span></a></td>
			</tr>
			<?php	
		}elseif(in_array($ext,$imgext)){
			?>
			<tr>
			<td><span class="mif-file-text"></span></td>
			<td><?=$files; ?></td>
			<td><img src="<?=$tpl['url'].'thumbs/'.md5_file($tpl['project']['path'].$files).".cache.jpeg"; ?>" width="48px" /></td>
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