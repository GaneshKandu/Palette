function randomStr(a){var a=a||9;s="",r="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";for(var b=0;b<a;b++)s+=r.charAt(Math.floor(Math.random()*r.length));return s}function rmproject(a){if(!confirm("Are You Sure to Delete"))return!1;var a={project:a,action:"rmproject"};$.ajax({url:"projects/remove",type:"POST",data:a,success:function(a,b,c){debug?(console.log(a),console.log(b)):location.reload()},error:function(a,b,c){debug?(console.log(data),console.log(b)):location.reload()}})}function createfile(){var a=$("#file").val(),b=$("#title").val(),c=$("#robots").val(),d=$("#description").val(),e=$("#keywords").val(),f=$("#icon").val(),g=$("#directory").val(),h=$("#baseurl").val(),i={file:a,title:b,robots:c,description:d,keywords:e,icon:f,action:"createfile",directory:g,baseurl:h};$.ajax({url:"projects/createfile",type:"POST",data:i,success:function(a,b,c){debug?(console.log(a),console.log(b)):location.reload()},error:function(a,b,c){debug?(console.log(data),console.log(b)):location.reload()}})}function install(){var a=$("#admin").val(),b=$("#password").val(),c=$("#repassword").val();if(b!==c)return echo.alert("Password Doesn't Match"),!1;if(""===b||""===c||""===a)return echo.alert("Fill All Field"),!1;if(b.length<4)return echo.alert("Password Should be 4 or More Than 4 Character Long"),!1;var d={admin:a,password:b,repassword:c,action:"install"};$.ajax({url:"install.php",type:"POST",data:d,success:function(a,b,c){debug?(console.log(a),console.log(b)):location.reload()},error:function(a,b,c){debug?(console.log(data),console.log(b)):location.reload()}})}function dialogbox(a){var b={};$.ajax({url:a,type:"POST",data:b,success:function(a,b,c){debug?(console.log(a),console.log(b)):($("#dialog-shadow").css("display","block"),$("#dialog-body").html(a))},error:function(a,b,c){debug?(console.log(data),console.log(b)):($("#dialog-shadow").css("display","block"),$("#dialog-body").html("<span class='red'>Error Occured</span>"))}})}function createproject(){var a=$("#project").val(),b=$("#title").val(),c=$("#robots").val(),d=$("#description").val(),e=$("#keywords").val(),f=$("#icon").val(),g={newproject:a,title:b,robots:c,description:d,keywords:e,icon:f,action:"createproject"};$.ajax({url:"projects/createproject",type:"POST",data:g,success:function(a,b,c){debug?(console.log(a),console.log(b)):location.reload()},error:function(a,b,c){debug?(console.log(data),console.log(b)):location.reload()}})}function login(){var a=$("#user_login").val(),b=$("#user_password").val(),c={user_login:a,user_password:b,action:"login"};$.ajax({url:"login/getLogin",type:"POST",data:c,success:function(a,b,c){debug||(console.log(a),console.log(b),location.reload())},error:function(a,b,c){debug||(console.log(data),console.log(b))}})}function cons(){return cons="///////////////////////////////////////////////////\n",cons+="Palatte CMS is a PHP Based Content Management System.\n",cons+="Developed By : Ganesh Kandu\n",cons+="Contact Mail : kanduganesh@gmail.com\n",cons+="///////////////////////////////////////////////////\n",cons+="                     .:/++/:.                     \n",cons+="                ./yddyo+//oymNs.          .dy`    \n",cons+="             -omdo-          -hN/        :NMMN/   \n",cons+="          `+dd+`     `/os/`    oM/      oMMMMMMs  \n",cons+="        `oNy-       /Ns:/sN:    dN     yNsMMMMMMs \n",cons+="       oNs.        .Mo   `Ms    +M-   oM//MMMMMMM`\n",cons+="     -mh.          .Ny:/smy`    sM.   MM.oMMMMMMN`\n",cons+="    oN/    ./+/`    `+oo/`     :My    yMNNMMMMMm- \n",cons+="   ym.    /MMMMN.             /Ms      -oNmdmd:   \n",cons+="  sm`     hMMMMM-            +M/         m: oh    \n",cons+=" :M-      .dMMm+            -M+          N- /d    \n",cons+=" dy         ``              .Nho:        M+:ym    \n",cons+=".M:    `+yyo`                 ./sdy-     MMMMN    \n",cons+="/M`   `mMMMMh                     :dy    MMMMN    \n",cons+="/M`   :MMMMM+                      `m+   mMMMM    \n",cons+=".M:    :syo-                       `N+   dMMMM    \n",cons+=" sd`          `sdh+               :my    hMMMM    \n",cons+="  hh`        `mMMMMs            :hm/     sMMMM    \n",cons+="   om/        mMMMm-         -smy:       /MMMM    \n",cons+="    .yd+`      -:.       ./ydy/`         `MMMd    \n",cons+="      `/yhs+:.`  `.-:+shhs/.              dMMo    \n",cons+="          .:+osyyyyso/-                   /MN`    \n",cons+="                                           y-     \n",cons+="                                                  \n"}function palette_popup_values(){for(var a=0;$("#palette_popup_input_"+a).length;)output[a]=$("#palette_popup_input_"+a).val(),a++;return output}var debug=!1,output=new Object;$("#Login").click(function(){login()}),$("#createproject").click(function(){createproject()}),$("#install").click(function(){install()}),$("#createfile").click(function(){createfile()}),console.info(cons());var echo=new Object,ok_id="palette_popup_ok";echo.alert=function(a){$("#palette_popup").css("display","block"),$("#palette_popup_head").css("display","none"),$("#palette_popup_Body").html(a)},$("#palette_popup_cancel").click(function(){$("#palette_popup").css("display","none")}),$("#palette_popup_ok").click(function(){palette_popup_values();$("#palette_popup").css("display","none")});