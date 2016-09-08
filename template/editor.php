<?php 

/*
///////////////////////////////////////////////////
Palatte is a PHP Based Site Builder
Developed By : Ganesh Kandu
Contact Mail : kanduganesh@gmail.com
///////////////////////////////////////////////////
*/

class tpl{ function __construct($tpl){ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<base href="<?php echo $tpl['project']['siteurl'].'/'; ?>" />
<title><?= $tpl['title'] ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="icon" href="<?php echo URL.'/'; ?>favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" href="<?php echo URL.'/'; ?>css/palette.css" /> 
    <link href="<?php echo URL.'/'; ?>css/metro.css" rel="stylesheet" />
    <link href="<?php echo URL.'/'; ?>css/metro-icon.css" rel="stylesheet" />
    <script src="<?php echo URL.'/'; ?>js/jquery.min.js"></script>
    <script src="<?php echo URL.'/'; ?>js/metro.js"></script>
	<script src="<?php echo URL.'/'; ?>js/jscolor.js"></script>
</head>
<body>
<ul class="v-menu" id="palatte_contex" ></ul>
<div class="resizable ui-resizable" style="cursor: text; height: 248px; width: 346px; position: absolute; top: 46.5px; left: 567px; display: none;" contenteditable="false">
	<div class="ui-resizable-handle ui-resizable-nw"></div>
	<div class="ui-resizable-handle ui-resizable-ne"></div>
	<div class="ui-resizable-handle ui-resizable-sw"></div>
	<div class="ui-resizable-handle ui-resizable-se"></div>
	<div class="ui-resizable-handle ui-resizable-n"></div>
	<div class="ui-resizable-handle ui-resizable-s"></div>
	<div class="ui-resizable-handle ui-resizable-e"></div>
	<div class="ui-resizable-handle ui-resizable-w"></div>
</div>
	<div id="palette_popup" data-noselect="true" >
		<div id="palette_popup_head">Heading</div>
		<div id="palette_popup_Body"></div>
		<div id="palette_popup_Buttons">
			<button class="button" id="palette_popup_ok" ><?php echo $tpl['lang']['ok']; ?></button>
			<button class="button" id="palette_popup_cancel" ><?php echo $tpl['lang']['Cancel']; ?></button>
		</div>
	</div>
<div id="tool-box">
	<div id="pallate_title" ><span><b><?php echo $tpl['lang']['tb']; ?> ( Palette )</b></span></div>
	<div id="tools">
	<div class="toolbar">
		<div class="tool-menu" >
			<div class="toolbar-section">
				<button class="button" onclick="palette('b');"><a href="javascript:void(0);"><b>B</b></a></button>
				<button class="button" onclick="palette('u');"><a href="javascript:void(0);"><u>U </u></a></button>
				<button class="button" onclick="palette('i');"><a href="javascript:void(0);"><i>I</i></a></button>
				<button class="button" onclick="palette('del');"><a href="javascript:void(0);"><del>S</del></a></button>
			</div>
			<div class="toolbar-section">
				<button class="button" onclick="palette('hr','none');"><a href="javascript:void(0);"><span class="mif-page-break"></span></a></button>
				<button class="button" onclick="palette('br','none');"><a href="javascript:void(0);"><span class="mif-keyboard-return"></span></a></button>
			</div>
			<div class="toolbar-section">
				<button class="button" onclick="palette('p align=\'left\'','p');"><a href="javascript:void(0);" ><span class="mif-paragraph-left"></span></a></button>
				<button class="button" onclick="palette('p align=\'center\'','p');"><a href="javascript:void(0);"><span class="mif-paragraph-center"></span></a></button>
				<button class="button" onclick="palette('p align=\'right\'','p');"><a href="javascript:void(0);"><span class="mif-paragraph-right"></span></a></button>
				<button class="button" onclick="palette('p align=\'justify\'','p');"><a href="javascript:void(0);"><span class="mif-paragraph-justify"></span></a></button>
			</div>
			<div class="toolbar-section">
				<div class="dropdown-button">
					<button class="button dropdown-toggle"><span class="mif-insert-template"></span></button>
					<ul class="split-content d-menu" data-role="dropdown">
						<li>
							<table id="our_table" >
							  <tr>
								<td style="background-color:#ff5c33;" box="1" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
								<td style="background-color:#ff4d94;" box="2" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
								<td style="background-color:#6666ff;" box="3" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
								<td style="background-color:#00ffff;" box="4" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
								<td style="background-color:#ccffcc;" box="5" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
								<td style="background-color:#33ff88;" box="6" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>   
								<td style="background-color:#ff5c88;" box="7" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
								<td style="background-color:#ff4d88;" box="8" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
								<td style="background-color:#666688;" box="9" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
								<td style="background-color:#00ff88;" box="10" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
								<td style="background-color:#ccff88;" box="11" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
								<td style="background-color:#33ff33;" box="12" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>    
							  </tr>
							  <tr>
								  <td colspan="12">
										<button class="button" onclick="addrow();"><?php echo $tpl['lang']['ar']; ?></button>
								  </td>
							  </tr>
							</table>							
						</li>
					</ul>
				</div>
			</div>
			<div class="toolbar-section">
				<button class="button" onclick="palatte_add_image_url();"><a href="javascript:void(0);"><span class="mif-image"></span></a></button>
				<button class="button" onclick="display_images();"><a href="javascript:void(0);"><span class="mif-images"></span></a></button>
				<button class="button" onclick="palatte_add_anchor();"><a href="javascript:void(0);"><span class="mif-link"></span></a></button>
				<button class="button" onclick="palatte_add_table();"><a href="javascript:void(0);"><span class="mif-table"></span></a></button>
			</div>
			<div class="toolbar-section">
				<div class="dropdown-button">
					<button class="button dropdown-toggle">Headings</button>
					<ul class="split-content d-menu" data-role="dropdown">
						<li><a href="javascript:void(0);" onclick="palette('h1');" >Heading 1</a></li>
						<li><a href="javascript:void(0);" onclick="palette('h2');" >Heading 2</a></li>
						<li><a href="javascript:void(0);" onclick="palette('h3');" >Heading 3</a></li>
						<li><a href="javascript:void(0);" onclick="palette('h4');" >Heading 4</a></li>
						<li><a href="javascript:void(0);" onclick="palette('h5');" >Heading 5</a></li>
						<li><a href="javascript:void(0);" onclick="palette('h6');" >Heading 6</a></li>
					</ul>
				</div>
			</div>
			<div class="toolbar-section">
				<div class="dropdown-button">
					<button class="button dropdown-toggle">Formatting</button>
					<ul class="split-content d-menu" data-role="dropdown">
						<li><a href="javascript:void(0);" onclick="palette('address');" >Address</a></li>
						<li><a href="javascript:void(0);" onclick="palette('bdi');" ><bdi>Bi-Directional</bdi></a></li>
						<li><a href="javascript:void(0);" onclick="palette('cite');" ><cite>Cite</cite></a></li>
						<li><a href="javascript:void(0);" onclick="palette('code');" ><code>Code</code></a></li>
						<li><a href="javascript:void(0);" onclick="palette('dfn');" ><dfn>definition</dfn></a></li>
						<li><a href="javascript:void(0);" onclick="palette('em');" ><em>Emphasized</em></a></li>
						<li><a href="javascript:void(0);" onclick="palette('kbd');" ><kbd>Keyboard input</kbd></a></li>
						<li><a href="javascript:void(0);" onclick="palette('mark');" ><mark>highlight</mark></a></li>
						<li><a href="javascript:void(0);" onclick="palette('pre');" ><pre>preformatted</pre></a></li>
						<li><a href="javascript:void(0);" onclick="palette('q');" ><q>quotation</q></a></li>
						<li><a href="javascript:void(0);" onclick="palette('strong');" ><strong>strong</strong></a></li>
						<li><a href="javascript:void(0);" onclick="palette('sub');" >X<sub>2</sub></a></li>
						<li><a href="javascript:void(0);" onclick="palette('sup');" >X<sup>2</sup></a></li>
						<li><a href="javascript:void(0);" onclick="palette('var');" ><var>Variable</var></a></li>
					</ul>
				</div>
			</div>
			<div class="toolbar-section">
				<input class="jscolor" id="jscolor" value="ab2567" />
				<button class="button" onclick="palette_color();"><a href="javascript:void(0);"><span class="mif-palette"></span></a></button>
			</div>
			<div class="toolbar-section">
				<button class="button" onclick="palette_youtube()"><a href="javascript:void(0);"><span class="mif-embed2"></span></a></button>
			</div>
			<div class="toolbar-section">
				<button class="button" onclick="palette_save('<?php 
				if(isset($tpl['project'])){
					echo base64_encode(serialize($tpl['project']))."','".URL; 
				}
				?>');"><a href="javascript:void(0);"><span class="mif-floppy-disk"></span></a></button>
			</div>
			<div class="toolbar-section">
				<a href="<?php echo $tpl['project']['url']; ?>" target="_blank" ><button class="button"><?php echo $tpl['lang']['Preview']; ?></button></a>
			</div>
			<div class="toolbar-section">
				<a href="<?php echo $tpl['project']['dashurl']; ?>" ><button class="button"><?php echo $tpl['lang']['Dashboard']; ?></button></a>
			</div>
			<div class="toolbar-section">
				<div class="dropdown-button">
					<button class="button dropdown-toggle">Border</button>
					<ul class="split-content d-menu" data-role="dropdown">
						<li>
							<label class="input-control radio small-check">
								<input type="radio" name="radio_palette_border" id="radio_palette_border" value="solid" checked>
								<span class="check"></span>
								<span class="caption">solid</span>
							</label>
						</li>
						<li>
							<label class="input-control radio small-check">
								<input type="radio" name="radio_palette_border" id="radio_palette_border" value="dotted" >
								<span class="check"></span>
								<span class="caption">dotted</span>
							</label>
						</li>
						<li>
							<label class="input-control radio small-check">
								<input type="radio" name="radio_palette_border" id="radio_palette_border" value="dashed" >
								<span class="check"></span>
								<span class="caption">dashed</span>
							</label>
						</li>
						<li>
							<label class="input-control radio small-check">
								<input type="radio" name="radio_palette_border" id="radio_palette_border" value="double" >
								<span class="check"></span>
								<span class="caption">double</span>
							</label>
						</li>
						<li>
							<label class="input-control radio small-check">
								<input type="radio" name="radio_palette_border" id="radio_palette_border" value="groove" >
								<span class="check"></span>
								<span class="caption">groove</span>
							</label>
						</li>
						<li>
							<label class="input-control radio small-check">
								<input type="radio" name="radio_palette_border" id="radio_palette_border" value="ridge" >
								<span class="check"></span>
								<span class="caption">ridge</span>
							</label>
						</li>
						<li>
							<label class="input-control radio small-check">
								<input type="radio" name="radio_palette_border" id="radio_palette_border" value="inset" >
								<span class="check"></span>
								<span class="caption">inset</span>
							</label>
						</li>
						<li>
							<label class="input-control radio small-check">
								<input type="radio" name="radio_palette_border" id="radio_palette_border" value="outset" >
								<span class="check"></span>
								<span class="caption">outset</span>
							</label>
						</li>
						<li>
							<label class="input-control radio small-check">
								<input type="radio" name="radio_palette_border" id="radio_palette_border" value="none" >
								<span class="check"></span>
								<span class="caption">none</span>
							</label>
						</li>
					</ul>
				</div>
			</div>
			<div class="toolbar-section" id="palatte_Slider"> 
				<div class="slider" data-on-change="dropValueToInput" data-role="slider" data-max-value="50" data-min-value="0"></div>
				<div class="input-control text">
					<input id="slider_input" value="1">
				</div>
			</div>
		</div>
		<hr class="thin"/>
		<span id="powerby" style="color: #000;line-height: 25px;margin-left:5px;" ><?php echo $tpl['lang']['Developed_By']; ?>  <a href="mailto:kanduganesh@gmail.com" >Ganesh Kandu</a></span>
	</div>
	<table style="display:none">
<tr>
	<td><input type="radio" id="1_1"  name="1" value="1" checked></td>
	<td><input type="radio" id="1_2"  name="2" value="1"></td>
	<td><input type="radio" id="1_3"  name="3" value="1"></td>
	<td><input type="radio" id="1_4"  name="4" value="1"></td>
	<td><input type="radio" id="1_5"  name="5" value="1"></td>
	<td><input type="radio" id="1_6"  name="6" value="1"></td>
	<td><input type="radio" id="1_7"  name="7" value="1"></td>
	<td><input type="radio" id="1_8"  name="8" value="1"></td>
	<td><input type="radio" id="1_9"  name="9" value="1"></td>
	<td><input type="radio" id="1_10"  name="10" value="1"></td>
	<td><input type="radio" id="1_11"  name="11" value="1"></td>
	<td><input type="radio" id="1_12"  name="12" value="1"></td>
</tr>
<tr>
	<td><input type="radio" id="2_1"  name="1" value="2"></td>
	<td><input type="radio" id="2_2"  name="2" value="2" checked></td>
	<td><input type="radio" id="2_3"  name="3" value="2"></td>
	<td><input type="radio" id="2_4"  name="4" value="2"></td>
	<td><input type="radio" id="2_5"  name="5" value="2"></td>
	<td><input type="radio" id="2_6"  name="6" value="2"></td>
	<td><input type="radio" id="2_7"  name="7" value="2"></td>
	<td><input type="radio" id="2_8"  name="8" value="2"></td>
	<td><input type="radio" id="2_9"  name="9" value="2"></td>
	<td><input type="radio" id="2_10"  name="10" value="2"></td>
	<td><input type="radio" id="2_11"  name="11" value="2"></td>
	<td><input type="radio" id="2_12"  name="12" value="2"></td>
</tr>
<tr>
	<td><input type="radio" id="3_1"  name="1" value="3"></td>
	<td><input type="radio" id="3_2"  name="2" value="3"></td>
	<td><input type="radio" id="3_3"  name="3" value="3" checked></td>
	<td><input type="radio" id="3_4"  name="4" value="3"></td>
	<td><input type="radio" id="3_5"  name="5" value="3"></td>
	<td><input type="radio" id="3_6"  name="6" value="3"></td>
	<td><input type="radio" id="3_7"  name="7" value="3"></td>
	<td><input type="radio" id="3_8"  name="8" value="3"></td>
	<td><input type="radio" id="3_9"  name="9" value="3"></td>
	<td><input type="radio" id="3_10"  name="10" value="3"></td>
	<td><input type="radio" id="3_11"  name="11" value="3"></td>
	<td><input type="radio" id="3_12"  name="12" value="3"></td>
</tr>
<tr>
	<td><input type="radio" id="4_1"  name="1" value="4"></td>
	<td><input type="radio" id="4_2"  name="2" value="4"></td>
	<td><input type="radio" id="4_3"  name="3" value="4"></td>
	<td><input type="radio" id="4_4"  name="4" value="4" checked></td>
	<td><input type="radio" id="4_5"  name="5" value="4"></td>
	<td><input type="radio" id="4_6"  name="6" value="4"></td>
	<td><input type="radio" id="4_7"  name="7" value="4"></td>
	<td><input type="radio" id="4_8"  name="8" value="4"></td>
	<td><input type="radio" id="4_9"  name="9" value="4"></td>
	<td><input type="radio" id="4_10"  name="10" value="4"></td>
	<td><input type="radio" id="4_11"  name="11" value="4"></td>
	<td><input type="radio" id="4_12"  name="12" value="4"></td>
</tr>
<tr>
	<td><input type="radio" id="5_1"  name="1" value="5"></td>
	<td><input type="radio" id="5_2"  name="2" value="5"></td>
	<td><input type="radio" id="5_3"  name="3" value="5"></td>
	<td><input type="radio" id="5_4"  name="4" value="5"></td>
	<td><input type="radio" id="5_5"  name="5" value="5" checked></td>
	<td><input type="radio" id="5_6"  name="6" value="5"></td>
	<td><input type="radio" id="5_7"  name="7" value="5"></td>
	<td><input type="radio" id="5_8"  name="8" value="5"></td>
	<td><input type="radio" id="5_9"  name="9" value="5"></td>
	<td><input type="radio" id="5_10"  name="10" value="5"></td>
	<td><input type="radio" id="5_11"  name="11" value="5"></td>
	<td><input type="radio" id="5_12"  name="12" value="5"></td>
</tr>
<tr>
	<td><input type="radio" id="6_1"  name="1" value="6"></td>
	<td><input type="radio" id="6_2"  name="2" value="6"></td>
	<td><input type="radio" id="6_3"  name="3" value="6"></td>
	<td><input type="radio" id="6_4"  name="4" value="6"></td>
	<td><input type="radio" id="6_5"  name="5" value="6"></td>
	<td><input type="radio" id="6_6"  name="6" value="6" checked></td>
	<td><input type="radio" id="6_7"  name="7" value="6"></td>
	<td><input type="radio" id="6_8"  name="8" value="6"></td>
	<td><input type="radio" id="6_9"  name="9" value="6"></td>
	<td><input type="radio" id="6_10"  name="10" value="6"></td>
	<td><input type="radio" id="6_11"  name="11" value="6"></td>
	<td><input type="radio" id="6_12"  name="12" value="6"></td>
</tr>
<tr>
	<td><input type="radio" id="7_1"  name="1" value="7"></td>
	<td><input type="radio" id="7_2"  name="2" value="7"></td>
	<td><input type="radio" id="7_3"  name="3" value="7"></td>
	<td><input type="radio" id="7_4"  name="4" value="7"></td>
	<td><input type="radio" id="7_5"  name="5" value="7"></td>
	<td><input type="radio" id="7_6"  name="6" value="7"></td>
	<td><input type="radio" id="7_7"  name="7" value="7" checked></td>
	<td><input type="radio" id="7_8"  name="8" value="7"></td>
	<td><input type="radio" id="7_9"  name="9" value="7"></td>
	<td><input type="radio" id="7_10"  name="10" value="7"></td>
	<td><input type="radio" id="7_11"  name="11" value="7"></td>
	<td><input type="radio" id="7_12"  name="12" value="7"></td>
</tr>
<tr>
	<td><input type="radio" id="8_1"  name="1" value="8"></td>
	<td><input type="radio" id="8_2"  name="2" value="8"></td>
	<td><input type="radio" id="8_3"  name="3" value="8"></td>
	<td><input type="radio" id="8_4"  name="4" value="8"></td>
	<td><input type="radio" id="8_5"  name="5" value="8"></td>
	<td><input type="radio" id="8_6"  name="6" value="8"></td>
	<td><input type="radio" id="8_7"  name="7" value="8"></td>
	<td><input type="radio" id="8_8"  name="8" value="8" checked></td>
	<td><input type="radio" id="8_9"  name="9" value="8"></td>
	<td><input type="radio" id="8_10"  name="10" value="8"></td>
	<td><input type="radio" id="8_11"  name="11" value="8"></td>
	<td><input type="radio" id="8_12"  name="12" value="8"></td>
</tr>
<tr>
	<td><input type="radio" id="9_1"  name="1" value="9"></td>
	<td><input type="radio" id="9_2"  name="2" value="9"></td>
	<td><input type="radio" id="9_3"  name="3" value="9"></td>
	<td><input type="radio" id="9_4"  name="4" value="9"></td>
	<td><input type="radio" id="9_5"  name="5" value="9"></td>
	<td><input type="radio" id="9_6"  name="6" value="9"></td>
	<td><input type="radio" id="9_7"  name="7" value="9"></td>
	<td><input type="radio" id="9_8"  name="8" value="9"></td>
	<td><input type="radio" id="9_9"  name="9" value="9" checked></td>
	<td><input type="radio" id="9_10"  name="10" value="9"></td>
	<td><input type="radio" id="9_11"  name="11" value="9"></td>
	<td><input type="radio" id="9_12"  name="12" value="9"></td>
</tr>
<tr>
	<td><input type="radio" id="10_1"  name="1" value="10"></td>
	<td><input type="radio" id="10_2"  name="2" value="10"></td>
	<td><input type="radio" id="10_3"  name="3" value="10"></td>
	<td><input type="radio" id="10_4"  name="4" value="10"></td>
	<td><input type="radio" id="10_5"  name="5" value="10"></td>
	<td><input type="radio" id="10_6"  name="6" value="10"></td>
	<td><input type="radio" id="10_7"  name="7" value="10"></td>
	<td><input type="radio" id="10_8"  name="8" value="10"></td>
	<td><input type="radio" id="10_9"  name="9" value="10"></td>
	<td><input type="radio" id="10_10"  name="10" value="10" checked></td>
	<td><input type="radio" id="10_11"  name="11" value="10"></td>
	<td><input type="radio" id="10_12"  name="12" value="10"></td>
</tr>
<tr>
	<td><input type="radio" id="11_1"  name="1" value="11"></td>
	<td><input type="radio" id="11_2"  name="2" value="11"></td>
	<td><input type="radio" id="11_3"  name="3" value="11"></td>
	<td><input type="radio" id="11_4"  name="4" value="11"></td>
	<td><input type="radio" id="11_5"  name="5" value="11"></td>
	<td><input type="radio" id="11_6"  name="6" value="11"></td>
	<td><input type="radio" id="11_7"  name="7" value="11"></td>
	<td><input type="radio" id="11_8"  name="8" value="11"></td>
	<td><input type="radio" id="11_9"  name="9" value="11"></td>
	<td><input type="radio" id="11_10"  name="10" value="11"></td>
	<td><input type="radio" id="11_11"  name="11" value="11" checked></td>
	<td><input type="radio" id="11_12"  name="12" value="11"></td>
</tr>
<tr>
	<td><input type="radio" id="12_1"  name="1" value="12"></td>
	<td><input type="radio" id="12_2"  name="2" value="12"></td>
	<td><input type="radio" id="12_3"  name="3" value="12"></td>
	<td><input type="radio" id="12_4"  name="4" value="12"></td>
	<td><input type="radio" id="12_5"  name="5" value="12"></td>
	<td><input type="radio" id="12_6"  name="6" value="12"></td>
	<td><input type="radio" id="12_7"  name="7" value="12"></td>
	<td><input type="radio" id="12_8"  name="8" value="12"></td>
	<td><input type="radio" id="12_9"  name="9" value="12"></td>
	<td><input type="radio" id="12_10"  name="10" value="12"></td>
	<td><input type="radio" id="12_11"  name="11" value="12"></td>
	<td><input type="radio" id="12_12"  name="12" value="12" checked></td>
</tr>
</table>
</div>
	<div id="img_exp" >
		<?php 
			$thumbs = project_images($tpl['project']['sitepath'],strlen($tpl['project']['sitepath'].DS));
			$path = $tpl['project']['sitepath'].DS;
			foreach($thumbs as $md5 => $file){
				if(!file_exists('thumbs'.DS.md5_file($path.$file).'.cache.jpeg')){
					image_snap($path.$file,$tpl);
				}
			}
			foreach($thumbs as $md5 => $file){
				$file = str_replace(DS,'//',$file);
				echo "<div class=\"image\" ><a href=\"javascript:void(0)\" onclick=\"setImage('".$file."');\" ><img src=\"".$tpl['url']."thumbs/".$md5.".cache.jpeg\" /></a></div>\n";
			}
		?>
	</div>
</div>
<div id="cont" contenteditable><?php 
echo get_body_content($tpl['project']['path']);
?></div>
</div>
<script src="<?php echo URL.'/'; ?>js/jquery-ui.js"></script>
<script src="<?php echo URL.'/'; ?>js/palette.js"></script>
<script src="<?php echo URL.'/'; ?>js/palettecms.js"></script>
<script>
/*
var msgs = new Object();
msgs.head = "My Heading";
msgs.inputs = [
	"what is your name",
	"what is your fathers name"
];
echo.prompt(msgs).click(function(){
	var output = palette_popup_values();
	alert(output[0]+" "+output[1]);
});

msgs.head = "My Heading";
msgs.inputs = [
	"what is your name",
	"what is your fathers name"
];
echo.prompt(msgs).click(function(){
	var output = palette_popup_values();
	alert(output[0]+" "+output[1]);
});

*/
</script>
</body>
</html>
<?php } } ?>