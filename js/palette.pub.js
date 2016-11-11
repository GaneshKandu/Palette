// Create Base64 Object
var Base64 = {
    _keyStr: "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",
    encode: function(e) {
        var t = "";
        var n, r, i, s, o, u, a;
        var f = 0;
        e = Base64._utf8_encode(e);
        while (f < e.length) {
            n = e.charCodeAt(f++);
            r = e.charCodeAt(f++);
            i = e.charCodeAt(f++);
            s = n >> 2;
            o = (n & 3) << 4 | r >> 4;
            u = (r & 15) << 2 | i >> 6;
            a = i & 63;
            if (isNaN(r)) {
                u = a = 64
            } else if (isNaN(i)) {
                a = 64
            }
            t = t + this._keyStr.charAt(s) + this._keyStr.charAt(o) + this._keyStr.charAt(u) + this._keyStr.charAt(a)
        }
        return t
    },
    decode: function(e) {
        var t = "";
        var n, r, i;
        var s, o, u, a;
        var f = 0;
        e = e.replace(/[^A-Za-z0-9+/=]/g, "");
        while (f < e.length) {
            s = this._keyStr.indexOf(e.charAt(f++));
            o = this._keyStr.indexOf(e.charAt(f++));
            u = this._keyStr.indexOf(e.charAt(f++));
            a = this._keyStr.indexOf(e.charAt(f++));
            n = s << 2 | o >> 4;
            r = (o & 15) << 4 | u >> 2;
            i = (u & 3) << 6 | a;
            t = t + String.fromCharCode(n);
            if (u != 64) {
                t = t + String.fromCharCode(r)
            }
            if (a != 64) {
                t = t + String.fromCharCode(i)
            }
        }
        t = Base64._utf8_decode(t);
        return t
    },
    _utf8_encode: function(e) {
        e = e.replace(/rn/g, "n");
        var t = "";
        for (var n = 0; n < e.length; n++) {
            var r = e.charCodeAt(n);
            if (r < 128) {
                t += String.fromCharCode(r)
            } else if (r > 127 && r < 2048) {
                t += String.fromCharCode(r >> 6 | 192);
                t += String.fromCharCode(r & 63 | 128)
            } else {
                t += String.fromCharCode(r >> 12 | 224);
                t += String.fromCharCode(r >> 6 & 63 | 128);
                t += String.fromCharCode(r & 63 | 128)
            }
        }
        return t
    },
    _utf8_decode: function(e) {
        var t = "";
        var n = 0;
        var r = c1 = c2 = 0;
        while (n < e.length) {
            r = e.charCodeAt(n);
            if (r < 128) {
                t += String.fromCharCode(r);
                n++
            } else if (r > 191 && r < 224) {
                c2 = e.charCodeAt(n + 1);
                t += String.fromCharCode((r & 31) << 6 | c2 & 63);
                n += 2
            } else {
                c2 = e.charCodeAt(n + 1);
                c3 = e.charCodeAt(n + 2);
                t += String.fromCharCode((r & 15) << 12 | (c2 & 63) << 6 | c3 & 63);
                n += 3
            }
        }
        return t
    }
}

function cons() {
    cons = "///////////////////////////////////////////////////\n";
    cons += "Palatte CMS is a PHP Based Content Management System.\n";
    cons += "Developed By : Ganesh Kandu\n";
    cons += "Contact Mail : kanduganesh@gmail.com\n";
    cons += "///////////////////////////////////////////////////\n";
    cons += "                     .:/++/:.                     \n";
    cons += "                ./yddyo+//oymNs.          .dy`    \n";
    cons += "             -omdo-          -hN/        :NMMN/   \n";
    cons += "          `+dd+`     `/os/`    oM/      oMMMMMMs  \n";
    cons += "        `oNy-       /Ns:/sN:    dN     yNsMMMMMMs \n";
    cons += "       oNs.        .Mo   `Ms    +M-   oM//MMMMMMM`\n";
    cons += "     -mh.          .Ny:/smy`    sM.   MM.oMMMMMMN`\n";
    cons += "    oN/    ./+/`    `+oo/`     :My    yMNNMMMMMm- \n";
    cons += "   ym.    /MMMMN.             /Ms      -oNmdmd:   \n";
    cons += "  sm`     hMMMMM-            +M/         m: oh    \n";
    cons += " :M-      .dMMm+            -M+          N- /d    \n";
    cons += " dy         ``              .Nho:        M+:ym    \n";
    cons += ".M:    `+yyo`                 ./sdy-     MMMMN    \n";
    cons += "/M`   `mMMMMh                     :dy    MMMMN    \n";
    cons += "/M`   :MMMMM+                      `m+   mMMMM    \n";
    cons += ".M:    :syo-                       `N+   dMMMM    \n";
    cons += " sd`          `sdh+               :my    hMMMM    \n";
    cons += "  hh`        `mMMMMs            :hm/     sMMMM    \n";
    cons += "   om/        mMMMm-         -smy:       /MMMM    \n";
    cons += "    .yd+`      -:.       ./ydy/`         `MMMd    \n";
    cons += "      `/yhs+:.`  `.-:+shhs/.              dMMo    \n";
    cons += "          .:+osyyyyso/-                   /MN`    \n";
    cons += "                                           y-     \n";
    cons += "                                                  \n";
    return cons;
}

console.info(cons());

$(document).ready(function() {
    var str = document.body.textContent;
    var caption = "UGFsZXR0ZSBTaXRlIEJ1aWxkZXI=";
    var mgs = "VGhpcyBTaXRlIGlzIGNyZWF0ZWQgVXNpbmcgUGFsZXR0ZSBTaXRlIEJ1aWxkZXI8YnIvPkxpbmsgOiA8YSBocmVmPSJodHRwczovL2dpdGh1Yi5jb20vR2FuZXNoS2FuZHUvUGFsZXR0ZSIgdGFyZ2V0PSJfQkxBTksiIHN0eWxlPSJjb2xvcjojZmZmZmZmIiA+aHR0cHM6Ly9naXRodWIuY29tL0dhbmVzaEthbmR1L1BhbGV0dGU8L2E+";
    //if(!str.includes(mgs)){
    $.Notify({
        caption: Base64.decode(caption),
        content: Base64.decode(mgs),
        keepOpen: true,
        type: 'info'
    });
    //}
});