<pre>
<?php $backs = backups(); ?>
</pre>
<table class="dataTable border bordered" data-auto-width="false">
	<thead>
	<tr>
		<td class="sortable-column"><?php echo $tpl["lang"]["backup"]." ".$tpl['lang']['File_Name']; ?></td>
		<td class="sortable-column"><?php echo $tpl['lang']['mtime']; ?></td>
		<td class="sortable-column"><?php echo $tpl['lang']['size']; ?></td>
		<td class="sortable-column"><?php echo $tpl['lang']['restore']; ?></td>
		<td class="sortable-column"><?php echo $tpl['lang']['Remove']; ?></td>
	</tr>
	</thead>
	<tbody>
	<?php foreach($backs as $back){ ?>
	<tr>
		<td><?php echo $back['files']; ?></td>
		<td><?php echo $back['mtime']; ?></td>
		<td><?php echo $back['size']; ?></td>
		<td><a href="javascript:void(0)" <?php echo $back['restore']; ?>><span class="mif-history"></span></a></td>
		<td><a href="javascript:void(0)" <?php echo $back['delete']; ?>><span class="mif-bin"></span></a></td>
	</tr>
	<?php } ?>
	</tbody>
</table>