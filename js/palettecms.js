var debug=false;var output=new Object();$("#Login").click(function(){login()});$("#createproject").click(function(){createproject()});$("#install").click(function(){install()});$("#createfile").click(function(){createfile()});function randomStr(a){var a=a||9;s="",r="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";for(var b=0;b<a;b++){s+=r.charAt(Math.floor(Math.random()*r.length))}return s}function rmproject(a){if(!confirm("Are You Sure to Delete")){return false}var a={project:a,action:"rmproject"};$.ajax({url:"projects/remove",type:"POST",data:a,success:function(c,d,b){if(debug){console.log(c);console.log(d)}else{location.reload()}},error:function(b,d,c){if(debug){console.log(data);console.log(d)}else{location.reload()}}})}function backup(b){var a={project:b,action:"backup"};$.ajax({url:"projects/backup",type:"POST",data:a,success:function(d,e,c){if(debug){console.log(d);console.log(e)}else{location.reload()}},error:function(c,e,d){if(debug){console.log(data);console.log(e)}else{location.reload()}}})}function download_zip(b){var a={project:b,action:"backup"};$.ajax({url:"projects/downloadzip",type:"POST",data:a,success:function(d,e,c){if(debug){console.log(d);console.log(e)}location.href="downloads?zip="+d},error:function(c,e,d){if(debug){console.log(data);console.log(e)}}})}function restore_backup(a){var b={backup:a,action:"restore_backup"};$.ajax({url:"backup/restore_backup",type:"POST",data:b,success:function(d,e,c){if(debug){console.log(d);console.log(e)}else{location.reload()}},error:function(c,e,d){if(debug){console.log(data);console.log(e)}else{location.reload()}}})}function delete_backup(b){var a={backup:b,action:"delete_backup"};$.ajax({url:"backup/delete_backup",type:"POST",data:a,success:function(d,e,c){if(debug){console.log(d);console.log(e)}else{location.reload()}},error:function(c,e,d){if(debug){console.log(data);console.log(e)}else{location.reload()}}})}function createfile(){var a=$("#file").val();var h=$("#title").val();var c=$("#robots").val();var i=$("#description").val();var b=$("#keywords").val();var f=$("#icon").val();var e=$("#directory").val();var d=$("#baseurl").val();var g={file:a,title:h,robots:c,description:i,keywords:b,icon:f,action:"createfile",directory:e,baseurl:d};$.ajax({url:"projects/createfile",type:"POST",data:g,success:function(k,l,j){if(debug){console.log(k);console.log(l)}else{location.reload()}},error:function(j,l,k){if(debug){console.log(data);console.log(l)}else{location.reload()}}})}function install(){var a=$("#admin").val();var b=$("#password").val();var c=$("#repassword").val();if(b!==c){echo.alert("Password Doesn't Match");return false}if(b===""||c===""||a===""){echo.alert("Fill All Field");return false}if(b.length<4){echo.alert("Password Should be 4 or More Than 4 Character Long");return false}var d={admin:a,password:b,repassword:c,action:"install"};$.ajax({url:"install.php",type:"POST",data:d,success:function(f,g,e){if(debug){console.log(f);console.log(g)}else{location.href="login"}},error:function(e,g,f){if(debug){console.log(data);console.log(g)}else{location.href="login"}}})}function dialogbox(b){var a={};$.ajax({url:b,type:"POST",data:a,success:function(d,e,c){if(debug){console.log(d);console.log(e)}else{$("#dialog-shadow").css("display","block");$("#dialog-body").html(d)}},error:function(c,e,d){if(debug){console.log(data);console.log(e)}else{$("#dialog-shadow").css("display","block");$("#dialog-body").html("<span class='red'>Error Occured</span>")}}})}function createproject(){var f=$("#project").val();var e=$("#title").val();var d=$("#robots").val();var c=$("#description").val();var a=$("#keywords").val();var b=$("#icon").val();var g={newproject:f,title:e,robots:d,description:c,keywords:a,icon:b,action:"createproject"};$.ajax({url:"projects/createproject",type:"POST",data:g,success:function(i,j,h){if(debug){console.log(i);console.log(j)}else{location.href="login"}},error:function(h,j,i){if(debug){console.log(data);console.log(j)}else{location.href="login"}}})}function login(){var c=$("#user_login").val();var b=$("#user_password").val();var a={user_login:c,user_password:b,action:"login"};$.ajax({url:"login/getLogin",type:"POST",data:a,success:function(e,f,d){if(!debug){console.log(e);console.log(f);location.reload()}},error:function(d,f,e){if(!debug){console.log(data);console.log(f)}}})}console.info(cons());function cons(){cons="///////////////////////////////////////////////////\n";cons+="Palatte CMS is a PHP Based Site Builder.\n";cons+="Developed By : Ganesh Kandu\n";cons+="Contact Mail : kanduganesh@gmail.com\n";cons+="///////////////////////////////////////////////////\n";cons+="                     .:/++/:.                     \n";cons+="                ./yddyo+//oymNs.          .dy`    \n";cons+="             -omdo-          -hN/        :NMMN/   \n";cons+="          `+dd+`     `/os/`    oM/      oMMMMMMs  \n";cons+="        `oNy-       /Ns:/sN:    dN     yNsMMMMMMs \n";cons+="       oNs.        .Mo   `Ms    +M-   oM//MMMMMMM`\n";cons+="     -mh.          .Ny:/smy`    sM.   MM.oMMMMMMN`\n";cons+="    oN/    ./+/`    `+oo/`     :My    yMNNMMMMMm- \n";cons+="   ym.    /MMMMN.             /Ms      -oNmdmd:   \n";cons+="  sm`     hMMMMM-            +M/         m: oh    \n";cons+=" :M-      .dMMm+            -M+          N- /d    \n";cons+=" dy         ``              .Nho:        M+:ym    \n";cons+=".M:    `+yyo`                 ./sdy-     MMMMN    \n";cons+="/M`   `mMMMMh                     :dy    MMMMN    \n";cons+="/M`   :MMMMM+                      `m+   mMMMM    \n";cons+=".M:    :syo-                       `N+   dMMMM    \n";cons+=" sd`          `sdh+               :my    hMMMM    \n";cons+="  hh`        `mMMMMs            :hm/     sMMMM    \n";cons+="   om/        mMMMm-         -smy:       /MMMM    \n";cons+="    .yd+`      -:.       ./ydy/`         `MMMd    \n";cons+="      `/yhs+:.`  `.-:+shhs/.              dMMo    \n";cons+="          .:+osyyyyso/-                   /MN`    \n";cons+="                                           y-     \n";cons+="                                                  \n";return cons}var echo=new Object();var ok_id="palette_popup_ok";echo.alert=(function(a){$("#palette_popup").css("display","block");$("#palette_popup_head").css("display","none");$("#palette_popup_Body").html(a)});$("#palette_popup_cancel").click(function(){$("#palette_popup").css("display","none")});$("#palette_popup_ok").click(function(){var a=palette_popup_values();$("#palette_popup").css("display","none")});function palette_popup_values(){var a=0;while($("#palette_popup_input_"+a).length){output[a]=$("#palette_popup_input_"+a).val();a++}return output};