                    <h1 class="text-light"><?php echo $tpl['lang']['Projects']; ?><span class="mif-palette place-right"></span></h1>
                    <hr class="thin bg-grayLighter"/>
                    <a href="<?= URL; ?>/projects/newproject"><button class="button primary" onclick="pushMessage('info')"><span class="mif-plus"></span><?php echo $tpl['lang']['cns']; ?></button></a>
                    <hr class="thin bg-grayLighter"/>
                    <table class="dataTable border bordered" data-auto-width="false">
                        <thead>
                        <tr>
                            <td class="sortable-column"><?php echo $tpl['lang']['Sites']; ?></td>
                            <td class="sortable-column"><?php echo $tpl['lang']['Open']; ?></td>
                            <td class="sortable-column"><?php echo $tpl['lang']['Preview']; ?></td>
                            <td class="sortable-column"><?php echo $tpl['lang']['Remove']; ?></td>
                        </tr>
                        </thead>
                        <tbody>
						<?php foreach($tpl['projects'] as $project){ ?>
						<tr>
						<td>
						<?=$project; ?>
						</td>
						<td>
						<a href="<?=URL.'/projects/files/'.$project; ?>"><?=$project; ?></a>
						</td>
						<td>
						<a href="<?=URL.'/sites/'.$project;?>" target="_BLANK"><?=$project;?></a>
						</td>
						<td>
						<a href="javascript:void(0)" onclick="rmproject('<?=$project;?>')" ><span class="mif-bin"></span></a>
						</td>
						</tr>
						<?php } ?>
                        </tbody>
                    </table>