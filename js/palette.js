function palette(a){html=getHTMLOfSelection(),UpdateHTML("<"+a+">"+html+"</"+a+">")}function palette(a,b){html=getHTMLOfSelection(),UpdateHTML("none"!=b?"<"+a+">"+html+"</"+b+">":"<"+a+"/>")}function offset(a){for(grid='\t<div class="row cells'+a+'" >\n',i=1;i<=a;i++)grid+='\t\t<div class="cell">'+i+"</div>\n";grid+="\t</div>\n",UpdateHTML(grid)}function addrow(){var a=getgrid();grid='\n<div class="grid">\n',grid+='\t<div class="row cells12" >\n';for(var b=0;b<a.length;b++)grid+='\t\t<div class="cell colspan'+a[b]+' ">'+(b+1)+"</div>\n";grid+="\t</div>\n",grid+="</div>\n",UpdateHTML(grid)}function palette_save(a,b,c){html=document.getElementById("cont").innerHTML,$.post(b+"/projects/save",{html:html,project:a},function(a,b){"success"==a?$.Notify({type:"success",caption:"Info",content:"Saved Successfully"}):$.Notify({type:"warning",caption:"Warning",content:"Unsuccessfull"})})}function palette_color(){html=getHTMLOfSelection(),colorvalue=document.getElementById("jscolor").value,UpdateHTML('<span style="color:#'+colorvalue+';">'+html+"</span>")}function setForegroundColor(){html=getHTMLOfSelection(),colorvalue=document.getElementById("jscolor").value,UpdateHTML('<span style="background-color:#'+colorvalue+';">'+html+"</span>")}function palatte_add_image_url(){return html="",result=prompt("Enter Image URL: ",""),null==result||void(""===result?echo.alert("Not Enterd any URL"):(html+='<img src="'+result+'" style="width:200px;height:200px;" />',UpdateHTML(html)))}function display_images(){"none"==$("#img_exp").css("display")?$("#img_exp").css("display","block"):$("#img_exp").css("display","none")}function palatte_add_image(a){html="",html+='<img src="'+a+'" style="width:400px;height:400px;" />',$("#img_exp").css("display","none"),UpdateHTML(html)}function palatte_add_anchor(){return linkurl=prompt("Enter URL: ",""),display=prompt("URL Display: ",""),null==display||void(""===display?echo.alert("Not Enterd any Anchor"):UpdateHTML('<a href="'+linkurl+'" >'+display+"</a>"))}function _palatte_add_anchor(){var a=new Object;a.head="Add Anchor",a.inputs=["Enter URL","Enter Name to Display URL"],echo.prompt(a).click(function(){var a=palette_popup_values();__palatte_add_anchor(a[0],a[1])})}function __palatte_add_anchor(a,b){""===b?echo.alert("Not Enterd any Anchor"):UpdateHTML('<a href="'+a+'" >'+b+"</a>")}function palatte_add_table(){if(Column=prompt("Enter No of Column",""),Rows=prompt("Enter No of Rows",""),""===Rows||null===Rows)return echo.alert("Not Enterd any No of Rows"),!1;if(""===Column||null===Column)return echo.alert("Not Enterd any No of Column"),!1;for(table='<table style="width:400px;height:400px;" >',k=1,table+="<tr>",j=0;j<Column;j++)table+="<th>",table+=k++,table+="</th>";for(table+="</tr>",i=1;i<Rows;i++){for(table+="<tr>",j=0;j<Column;j++)table+="<td>",table+=k++,table+="</td>";table+="</tr>"}table+="</table>",UpdateHTML(table)}function palette_youtube(){return youtube_link=prompt("Enter HTML Code",""),""===youtube_link||null===youtube_link?(echo.alert("Not Enterd Any HTML Code"),!1):void UpdateHTML('<div class="video-container">'+youtube_link+"</div>")}function getSelectionText(){var a="";return window.getSelection&&(stext=window.getSelection(),oRange=stext.getRangeAt(0),oRect=oRange.getBoundingClientRect(),a=stext.toString()),a}function UpdateHTML(a){var b,a;if(window.getSelection&&window.getSelection().getRangeAt){b=window.getSelection().getRangeAt(0),b.deleteContents();var c=document.createElement("div");c.innerHTML=a;for(var e,d=document.createDocumentFragment();e=c.firstChild;)d.appendChild(e);b.insertNode(d)}else document.selection&&document.selection.createRange&&(b=document.selection.createRange(),b.pasteHTML(a))}function getHTMLOfSelection(){var a;if(document.selection&&document.selection.createRange)return a=document.selection.createRange(),a.htmlText;if(window.getSelection){var b=window.getSelection();if(b.rangeCount>0){a=b.getRangeAt(0);var c=a.cloneContents(),d=document.createElement("div");return d.appendChild(c),d.innerHTML}return""}return""}function _drag_init(a){selected=a,x_elem=x_pos-selected.offsetLeft,y_elem=y_pos-selected.offsetTop}function _move_elem(a){x_pos=document.all?window.event.clientX:a.pageX,y_pos=document.all?window.event.clientY:a.pageY,null!==selected&&(selected.style.left=x_pos-x_elem+"px",selected.style.top=y_pos-y_elem+"px")}function _destroy(){selected=null}function getgrid(){debug=!1;for(var a="",b=Array(),c=0,d=1;d<13;d++)for(var e=1;e<13;e++)a=$("#"+d+"_"+e+":checked").val(),void 0!=a&&(b[c++]=a);var f=Array();for(d=c=1,e=0,d=0;d<12;d++)b[d]==b[d+1]?c++:(f[e]=c,c=1,e++);return f}function cons(){return cons="///////////////////////////////////////////////////\n",cons+="Palatte CMS is a PHP Based Content Management System.\n",cons+="Developed By : Ganesh Kandu\n",cons+="Contact Mail : kanduganesh@gmail.com\n",cons+="///////////////////////////////////////////////////\n",cons+="                     .:/++/:.                     \n",cons+="                ./yddyo+//oymNs.          .dy`    \n",cons+="             -omdo-          -hN/        :NMMN/   \n",cons+="          `+dd+`     `/os/`    oM/      oMMMMMMs  \n",cons+="        `oNy-       /Ns:/sN:    dN     yNsMMMMMMs \n",cons+="       oNs.        .Mo   `Ms    +M-   oM//MMMMMMM`\n",cons+="     -mh.          .Ny:/smy`    sM.   MM.oMMMMMMN`\n",cons+="    oN/    ./+/`    `+oo/`     :My    yMNNMMMMMm- \n",cons+="   ym.    /MMMMN.             /Ms      -oNmdmd:   \n",cons+="  sm`     hMMMMM-            +M/         m: oh    \n",cons+=" :M-      .dMMm+            -M+          N- /d    \n",cons+=" dy         ``              .Nho:        M+:ym    \n",cons+=".M:    `+yyo`                 ./sdy-     MMMMN    \n",cons+="/M`   `mMMMMh                     :dy    MMMMN    \n",cons+="/M`   :MMMMM+                      `m+   mMMMM    \n",cons+=".M:    :syo-                       `N+   dMMMM    \n",cons+=" sd`          `sdh+               :my    hMMMM    \n",cons+="  hh`        `mMMMMs            :hm/     sMMMM    \n",cons+="   om/        mMMMm-         -smy:       /MMMM    \n",cons+="    .yd+`      -:.       ./ydy/`         `MMMd    \n",cons+="      `/yhs+:.`  `.-:+shhs/.              dMMo    \n",cons+="          .:+osyyyyso/-                   /MN`    \n",cons+="                                           y-     \n",cons+="                                                  \n"}function object_resize(a){return html="",html+='\n<div class="resizable" style="cursor: text;" contenteditable="false">\n\t',html+=a,html+='\n\t<div class="ui-resizable-handle ui-resizable-nw"></div>\n',html+='\t<div class="ui-resizable-handle ui-resizable-ne"></div>\n',html+='\t<div class="ui-resizable-handle ui-resizable-sw"></div>\n',html+='\t<div class="ui-resizable-handle ui-resizable-se"></div>\n',html+='\t<div class="ui-resizable-handle ui-resizable-n"></div>\n',html+='\t<div class="ui-resizable-handle ui-resizable-s"></div>\n',html+='\t<div class="ui-resizable-handle ui-resizable-e"></div>\n',html+='\t<div class="ui-resizable-handle ui-resizable-w"></div>\n',html+="</div>",html}function dropValueToInput(a,b){$("#slider_input").val(a)}function palatte_contex_close(){$("#palatte_contex").css("display","none")}function create_contex_menu(a,b,c,d){html="",html+='<li class="menu-title">'+a+"</li>";for(var e=0;e<b.length;e++)html+='<li><a href="javascript:void(0)" onclick="'+d[e]+';palatte_contex_close();" ><span class="'+b[e]+' icon"></span>'+c[e]+"</a></li>";return html+='<li><a href="javascript:void(0)" onclick="palatte_contex_close();" ><span class="mif-cross icon"></span>Close</a></li>',html}function setImage(a){void 0!=palette_global_var?("function"==typeof palette_global_var.css?palette_global_var.css("background-image",'url("'+a+'")'):palatte_add_image(a),palette_global_var=void 0):palatte_add_image(a),$("#img_exp").css("display","none")}function setBackground(){display_images()}function setBackgroundTD_URL(){palette_global_var=palette_global_var.find("td"),setBackground_URL()}function setBackgroundTH_URL(){palette_global_var=palette_global_var.find("th"),setBackground_URL()}function setBackground_URL(){result=prompt("Enter Background Image URL: ",""),""===result||null===result?echo.alert("Not Enterd any URL"):(result='url("'+result+'")',palette_global_var.css("background-image",result))}function setBackgroundColor(){colorvalue="#"+document.getElementById("jscolor").value,palette_global_var.css("background-color",colorvalue)}function setTextColor(){colorvalue="#"+document.getElementById("jscolor").value,palette_global_var.css("color",colorvalue)}function setBorder(){colorvalue="#"+document.getElementById("jscolor").value,border_type=$("input:radio[name=radio_palette_border]:checked").val(),palette_global_var.css("border-style",border_type),palette_global_var.css("border-color",colorvalue)}function setImageBorder(){colorvalue="#"+document.getElementById("jscolor").value,pixel=document.getElementById("slider_input").value,border_type=$("input:radio[name=radio_palette_border]:checked").val(),palette_global_var.css("border",pixel+"px "+border_type+" "+colorvalue)}function setTableBorder(){colorvalue="#"+document.getElementById("jscolor").value,pixel=document.getElementById("slider_input").value,border_type=$("input:radio[name=radio_palette_border]:checked").val(),palette_global_var.css("border",pixel+"px "+border_type+" "+colorvalue)}function setTableTextColor(){setTextColor()}function setThBorder(){palette_global_var=palette_global_var.find("th"),setTableBorder()}function setThBackgroundImage(){palette_global_var=palette_global_var.find("th"),setBackground()}function setThBackgroundColor(){palette_global_var=palette_global_var.find("th"),setBackgroundColor()}function setThTextColor(){palette_global_var=palette_global_var.find("th"),setTextColor()}function setTdBorder(){palette_global_var=palette_global_var.find("td"),setTableBorder()}function setTdBackgroundImage(){palette_global_var=palette_global_var.find("td"),setBackground()}function setTdBackgroundColor(){palette_global_var=palette_global_var.find("td"),setBackgroundColor()}function setTdTextColor(){palette_global_var=palette_global_var.find("td"),setTextColor()}function setFontSize(){html=getHTMLOfSelection(),pixel=document.getElementById("slider_input").value,UpdateHTML('<span style="font-size:'+pixel+'px;" >'+html+"</span>")}var Base64={_keyStr:"ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",encode:function(a){var c,d,e,f,g,h,i,b="",j=0;for(a=Base64._utf8_encode(a);j<a.length;)c=a.charCodeAt(j++),d=a.charCodeAt(j++),e=a.charCodeAt(j++),f=c>>2,g=(3&c)<<4|d>>4,h=(15&d)<<2|e>>6,i=63&e,isNaN(d)?h=i=64:isNaN(e)&&(i=64),b=b+this._keyStr.charAt(f)+this._keyStr.charAt(g)+this._keyStr.charAt(h)+this._keyStr.charAt(i);return b},decode:function(a){var c,d,e,f,g,h,i,b="",j=0;for(a=a.replace(/[^A-Za-z0-9+/=]/g,"");j<a.length;)f=this._keyStr.indexOf(a.charAt(j++)),g=this._keyStr.indexOf(a.charAt(j++)),h=this._keyStr.indexOf(a.charAt(j++)),i=this._keyStr.indexOf(a.charAt(j++)),c=f<<2|g>>4,d=(15&g)<<4|h>>2,e=(3&h)<<6|i,b+=String.fromCharCode(c),64!=h&&(b+=String.fromCharCode(d)),64!=i&&(b+=String.fromCharCode(e));return b=Base64._utf8_decode(b)},_utf8_encode:function(a){a=a.replace(/rn/g,"n");for(var b="",c=0;c<a.length;c++){var d=a.charCodeAt(c);d<128?b+=String.fromCharCode(d):d>127&&d<2048?(b+=String.fromCharCode(d>>6|192),b+=String.fromCharCode(63&d|128)):(b+=String.fromCharCode(d>>12|224),b+=String.fromCharCode(d>>6&63|128),b+=String.fromCharCode(63&d|128))}return b},_utf8_decode:function(a){for(var b="",c=0,d=c1=c2=0;c<a.length;)d=a.charCodeAt(c),d<128?(b+=String.fromCharCode(d),c++):d>191&&d<224?(c2=a.charCodeAt(c+1),b+=String.fromCharCode((31&d)<<6|63&c2),c+=2):(c2=a.charCodeAt(c+1),c3=a.charCodeAt(c+2),b+=String.fromCharCode((15&d)<<12|(63&c2)<<6|63&c3),c+=3);return b}};document.execCommand("enableObjectResizing",!1,!1),$(document).ready(function(){document.oncontextmenu=function(){return!1}});var debug=!1,image_1d9e7fa2ed9f534ca43575172ec5ef25=new Object,palette_global_var=new Object;console.info(cons());var selected=null,x_pos=0,y_pos=0,x_elem=0,y_elem=0;document.getElementById("tool-box").onmousedown=function(){return _drag_init(this),!1},document.onmousemove=_move_elem,document.onmouseup=_destroy,$(function(){var c,d,a=!1,e=["#ffffff","#ff5c33","#ff4d94","#6666ff","#00ffff","#ccffcc","#33ff88","#ff5c88","#ff4d88","#666688","#00ff88","#ccff88","#33ff33"];$("#our_table td").mousedown(function(){a=!0,c=$(this).attr("box"),d=c;var b=document.getElementById(c+"_"+d);return null!=b&&(b.checked=!0),$(this).css("background-color",e[c]),!1}).mouseover(function(){a&&(d=$(this).attr("box"),document.getElementById(c+"_"+d).checked=!0,$(this).css("background-color",e[c]))}),$(document).mouseup(function(){a=!1})}),$(".resizable").resizable({handles:{nw:".ui-resizable-nw",ne:".ui-resizable-ne",sw:".ui-resizable-sw",se:".ui-resizable-se",n:".ui-resizable-n",e:".ui-resizable-e",s:".ui-resizable-s",w:".ui-resizable-w"}}),$(".resizable").on("resize",function(a){var b=$(this).width(),c=$(this).height();$(this).find("table").css("width",b),$(this).find("table").css("height",c)}),$(".draggable").draggable().on("click",function(){$(this).is(".ui-draggable-dragging")||($(this).draggable("option","disabled",!0),$(this).prop("contenteditable","true"),$(this).css("cursor","text"))}).on("blur",function(){$(this).draggable("option","disabled",!1),$(this).prop("contenteditable","false"),$(this).css("cursor","move")}),$(document).on("dblclick","img",function(){var a=$(this).width(),b=$(this).height(),c=$(this).offset(),d=c.left,e=c.top;$(".resizable").css("display","block"),$(".resizable").css("width",a+5),$(".resizable").css("height",b+5),$(".resizable").css("left",d),$(".resizable").css("top",e),image_1d9e7fa2ed9f534ca43575172ec5ef25=$(this)}),$(document).on("dblclick","table",function(){var a=$(this).width(),b=$(this).height(),c=$(this).offset(),d=c.left,e=c.top;$(".resizable").css("display","block"),$(".resizable").css("width",a+5),$(".resizable").css("height",b+5),$(".resizable").css("left",d),$(".resizable").css("top",e),$(this).prop("contenteditable","true"),image_1d9e7fa2ed9f534ca43575172ec5ef25=$(this)}),$(".resizable").dblclick(function(){$(this).css("display","none"),$(this).prop("contenteditable","false")}),$(".resizable").on("resize",function(a){var b=$(this).width(),c=$(this).height();image_1d9e7fa2ed9f534ca43575172ec5ef25.css("width",b),image_1d9e7fa2ed9f534ca43575172ec5ef25.css("height",c);var d=image_1d9e7fa2ed9f534ca43575172ec5ef25.offset(),e=d.left,f=d.top;$(this).css("left",e),$(this).css("top",f)}),$(function(){$(document.body).bind("mouseup",function(a){var b;window.getSelection?b=window.getSelection():document.selection&&(b=document.selection.createRange())})}),$("#close_button").click(function(){$("#dialog-shadow").css("display","none")}),$(".grid").bind("mousedown",function(a){if(2==a.button){var b=$("#palatte_contex"),c=getSelectionText();if(palette_global_var=$(this),""!==c)var d="Selected Text Menu",e=["mif-palette","mif-palette",""],f=["Set Background Color","Set Foreground Color","Set Font Size"],g=["setForegroundColor()","palette_color()","setFontSize()"];else var d="Grid Menu",e=["mif-image","mif-image","mif-palette","mif-stack2"],f=["Set Background Image","Set Background Image URL","Set Background Color","Set Border"],g=["setBackground()","setBackground_URL()","setBackgroundColor()","setBorder()"];var h=create_contex_menu(d,e,f,g);return b.html(h),b.css("display","block"),b.css("top",a.pageY),b.css("left",a.pageX),!1}return!0}),$("img").bind("mousedown",function(a){if(2==a.button){var b=$("#palatte_contex");palette_global_var=$(this);var c="Image Menu",d=["mif-stack2"],e=["Set Border"],f=["setImageBorder()"],g=create_contex_menu(c,d,e,f);return b.html(g),b.css("display","block"),b.css("top",a.pageY),b.css("left",a.pageX),!1}return!0}),$("tbody").bind("mousedown",function(a){if(2==a.button){palette_global_var=$(this);var b=getSelectionText(),c=$("#palatte_contex");if(""==b)var d="Table Menu",e=["mif-stack2","mif-image","mif-image","mif-palette","mif-palette","mif-stack2","mif-image","mif-image","mif-palette","mif-palette","mif-stack2","mif-image","mif-image","mif-palette","mif-palette"],f=["Table Border","Table Background Image","Table Background Image URL","Table Background Color","Table Text Color","Heading Border","Heading Background Image","Heading Background Image URL","Heading Background Color","Heading Text Color","Body Border","Body Background Image","Body Background Image URL","Body Background Color","Body Text Color"],g=["setTableBorder()","setBackground()","setBackground_URL()","setBackgroundColor()","setTableTextColor()","setThBorder()","setThBackgroundImage()","setBackgroundTH_URL()","setThBackgroundColor()","setThTextColor()","setTdBorder()","setTdBackgroundImage()","setBackgroundTD_URL()","setTdBackgroundColor()","setTdTextColor()"];else var d="Selected Text Menu",e=["mif-palette","mif-palette",""],f=["Set Background Color","Set Foreground Color","Set Font Size"],g=["setForegroundColor()","palette_color()","setFontSize()"];var h=create_contex_menu(d,e,f,g);return c.html(h),c.css("display","block"),c.css("top",a.pageY),c.css("left",a.pageX),!1}return!0}),$("#palatte_contex").focusout(function(){$(this).css("display","none")}).mouseleave(function(){$(this).css("display","none")});