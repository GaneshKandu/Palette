                    <h1 class="text-light"><?php echo $tpl['lang']['Projects']; ?><span class="mif-palette place-right"></span></h1>
                    <hr class="thin bg-grayLighter"/>
                    <a href="<?php echo  URL; ?>/projects/newproject"><button class="button primary" onclick="pushMessage('info')"><span class="mif-plus"></span><?php echo $tpl['lang']['cns']; ?></button></a>
                    <hr class="thin bg-grayLighter"/>
                    <table class="dataTable border bordered" data-auto-width="false">
                        <thead>
                        <tr>
                            <td class="sortable-column"><?php echo $tpl['lang']['Sites']; ?></td>
                            <td class="sortable-column"><?php echo $tpl['lang']['Open']; ?></td>
                            <td class="sortable-column"><?php echo $tpl['lang']['Preview']; ?></td>
                            <td class="sortable-column"><?php echo $tpl['lang']['Remove']; ?></td>
                            <td class="sortable-column"><?php echo $tpl['lang']['backup']; ?></td>
                            <td class="sortable-column"><?php echo $tpl['lang']['downloads']; ?></td>
                        </tr>
                        </thead>
                        <tbody>
						<?php foreach($tpl['projects'] as $project){ ?>
						<tr>
						<td>
						<?php echo $project; ?>
						</td>
						<td>
						<a href="<?php echo URL.'/projects/files/'.$project; ?>"><?php echo $project; ?></a>
						</td>
						<td>
						<a href="<?php echo URL.'/sites/'.$project;?>" target="_BLANK"><?php echo $project;?></a>
						</td>
						<td>
						<a href="javascript:void(0)" onclick="rmproject('<?php echo $project;?>')" ><span class="mif-bin"></span></a>
						</td>
						<td>
						<a href="javascript:void(0)" onclick="backup('<?php echo $project;?>')" ><span class="mif-file-zip"></span></a>
						</td>
						<td>
						<a href="javascript:void(0)" onclick="download_zip('<?php echo $project;?>')" ><span class="mif-download"></span></a>
						</td>
						</tr>
						<?php } ?>
                        </tbody>
                    </table>