function bieuthuc(iddangxet) {
    var str = iddangxet.value;
    var len=str.length;
    for(i=0;i<len;i++){
        if(kytuhoplebieuthuc(str.charAt(i))==false){
            iddangxet.value='';
            break;
        }
    }
}
function kytuhoplebieuthuc(kytu){
    switch(kytu){
        case '0':
        case '1':
        case '2':
        case '3':
        case '4':
        case '5':
        case '6':
        case '7':
        case '8':
        case '9':
        case '*':
        case ' ':
        case '/':
        case '+':
        case '-': 
        case '(': 
        case ')': 
        case '.': 
            return true;
        default :
                return false;
    }
}
function thaydoi(){
    var hang=document.getElementById('hang').value;
    var cot=document.getElementById('cot').value;
    if(hang>0&&cot>0){
        var matran='';
        for(var i=0;i<hang;i++){
            matran=matran+'<div class="row">';
            for(var j=0;j<cot;j++){
                matran = matran + '\
                                <div class="input-group" id="input-matran">\
                                <input type="text" \
                                class="form-control" \
                                placeholder="a['+i+']['+j+']= .." \
                                aria-describedby="basic-addon1"\
                                name ="a['+i+']['+j+']"\
                                id="a['+i+']['+j+']"\
                                >\n\
                                </div>';
            }
            matran=matran+'</div>';
        }
        matran=matran+'<hr>';
        document.getElementById('napmatran').innerHTML=matran;
        var width=(document.getElementById('input-matran').offsetWidth + 2)*cot ;
        document.getElementById('napmatran').style['width']=width +'px';
    }
}
function thay_doi(){
    var hang=document.getElementById('hang').value;
    var cot=document.getElementById('cot').value;
    if(hang>0&&cot>0){
        var matran='<hr>';
        for(var i=0;i<hang;i++){
            matran=matran+'<div class="row">';
            for(var j=0;j<cot;j++){
                matran = matran + '\
                                <div class="input-group" id="input-matran">\
                                <input type="text" \
                                class="form-control" \
                                placeholder="a['+i+']['+j+']" \
                                aria-describedby="basic-addon1"\
                                name ="a['+i+']['+j+']"\
                                id="a['+i+']['+j+']"\
                                >\n\
                                </div>';
            }
            matran=matran+'</div>';
        }
        matran=matran+'<hr>';
        document.getElementById('noi-dung-dau-vao-chen').innerHTML=matran;
        var width=(73 + 2)*cot ;
        document.getElementById('noi-dung-dau-vao-chen').style['width']=width +'px';
        document.getElementById('noi-dung-dau-vao-chen').style['margin-left']= 'auto';
        document.getElementById('noi-dung-dau-vao-chen').style['margin-right']= 'auto';
    }
}
function thaydoihe(){
    var hang=document.getElementById('so_n').value;
    var cot=document.getElementById('so_an').value;
    if(hang>0&&cot>0){
        var matran='';
        for(var i=0;i<hang;i++){
            matran=matran+'<div class="row">';
            for(var j=0;j<cot-1;j++){
                matran = matran + '\
                                <div class="input-group" id="input-he">\
                                <input type="text" \
                                class="form-control" \
                                placeholder="a['+i+']['+j+']" \
                                aria-describedby="basic-addon1"\
                                name ="a_he['+i+']['+j+']"\
                                id="a_he['+i+']['+j+']"\
                                ><span class="input-group-addon">$x_{'+j+'} + $</span> \n\
                                </div>';
            }
            matran = matran + '\
                                <div class="input-group" id="input-hecuoi">\
                                <input type="text" \
                                class="form-control" \
                                placeholder="a['+i+']['+j+']" \
                                aria-describedby="basic-addon1"\
                                name ="a_he['+i+']['+j+']"\
                                id="a_he['+i+']['+j+']"\
                                ><span class="input-group-addon">$x_{'+j+'}$</span> \n\
                                </div>';
            matran = matran + '\
                                 <div class="input-group daubang" id="daubang">\
                                 =  \
                                </div>';
            matran = matran + '\
                                 <div class="input-group" id="input-hecuoi">\
                                <input type="text" \
                                class="form-control" \
                                placeholder="b['+i+']" \
                                aria-describedby="basic-addon1"\
                                name ="b_he['+i+']"\
                                id="b_he['+i+']"\
                                >\n\
                                </div>';
            matran=matran+'</div>';
        }
        matran=matran+'<hr>';
        document.getElementById('naphe').innerHTML=matran;
        var width=(document.getElementById('input-he').offsetWidth + 2)*cot + 2*(document.getElementById('input-he').offsetWidth + 2);
        document.getElementById('naphe').style['width']=width +'px';
        document.getElementById('naphe').style['margin-left']= 'auto';
        document.getElementById('naphe').style['margin-right']= 'auto';
        MathJax.Hub.Queue(["Typeset", MathJax.Hub]);
    }
}
function thay_doi_he(){
    var hang=document.getElementById('so_m').value;
    var cot=document.getElementById('so_n').value;
    if(hang>0&&cot>0){
        var matran='<hr>';
        for(var i=0;i<hang;i++){
            matran=matran+'<div class="row">';
            for(var j=0;j<cot-1;j++){
                matran = matran + '\
                                <div class="input-group" id="input-he">\
                                <input type="text" \
                                class="form-control" \
                                placeholder="a['+i+']['+j+']" \
                                aria-describedby="basic-addon1"\
                                name ="a_he['+i+']['+j+']"\
                                id="a_he['+i+']['+j+']"\
                                ><span class="input-group-addon">$x_{'+j+'} + $</span> \n\
                                </div>';
            }
            matran = matran + '\
                                <div class="input-group" id="input-he">\
                                <input type="text" \
                                class="form-control" \
                                placeholder="a['+i+']['+j+']" \
                                aria-describedby="basic-addon1"\
                                name ="a_he['+i+']['+j+']"\
                                id="a_he['+i+']['+j+']"\
                                ><span class="input-group-addon">$x_{'+j+'} = $ </span> \n\
                                </div>';

            matran = matran + '\
                                 <div class="input-group" id="input-hecuoi">\
                                <input type="text" \
                                class="form-control" \
                                placeholder="b['+i+']" \
                                aria-describedby="basic-addon1"\
                                name ="b_he['+i+']"\
                                id="b_he['+i+']"\
                                >\n\
                                </div>';
            matran=matran+'</div>';
        }
        //matran=matran+'<hr>';
        document.getElementById('noi-dung-dau-vao-chen').innerHTML=matran;
        var width=(130 + 2)*cot +60 ;
        document.getElementById('noi-dung-dau-vao-chen').style['width']=width +'px';
        document.getElementById('noi-dung-dau-vao-chen').style['margin-left']= 'auto';
        document.getElementById('noi-dung-dau-vao-chen').style['margin-right']= 'auto';
        MathJax.Hub.Queue(["Typeset", MathJax.Hub]);
    }
}
function giai_he(loaigiai){
    //huongdan(loaigiai);
    var hang=document.getElementById('so_m').value;
    var cot=document.getElementById('so_n').value;
    if(hang>0&&cot>0){
        var matran='';
        for(var i=0;i<hang;i++){
            for(var j=0;j<cot;j++){
                matran = matran + '&matran['+i+']['+j+']=' 
                        + document.getElementById('a_he['+i+']['+j+']').value;
            }
        }
        var matranb='';
        for(var j=0;j<hang;j++){
            matranb = matranb + '&matranb['+j+'][0]=' 
                    + document.getElementById('b_he['+j+']').value;
        }
        
        var xmlhttp;
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
        } else { // code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function() {
            if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                var daura= xmlhttp.responseText;
                if(daura){//Cắt ra một đoạn từ cụm từ daura đến footer 
                    var start = daura.indexOf('daura');
                    var end = daura.indexOf('footer');
                    document.getElementById('noi-dung-dau-ra').innerHTML
                    = daura.substring(start+7,end-1);
                }else{
                    document.getElementById('noi-dung-dau-ra').innerHTML='loi roi';
                }
            }
            if(xmlhttp.status==500){
                alert('Lỗi máy chủ không thực thi được.');
            }
        }
       
        xmlhttp.open("GET","/matran/daura.html?loaigiai="
                +loaigiai+"&hang="+hang +"&cot=" + cot 
                + matran + matranb, false);
        xmlhttp.send();
    }
    MathJax.Hub.Queue(["Typeset", MathJax.Hub]);
}
function giai_matran(loaigiai){
    //huongdan(loaigiai);
    var hang=document.getElementById('hang').value;
    var cot=document.getElementById('cot').value;
    if(hang>0&&cot>0){
        var matran='';
        for(var i=0;i<hang;i++){
            for(var j=0;j<cot;j++){
                matran = matran + '&matran['+i+']['+j+']=' 
                        + document.getElementById('a['+i+']['+j+']').value;
            }
        }
        var xmlhttp;
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
        } else { // code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function() {
            if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                var daura= xmlhttp.responseText;
                if(daura){//Cắt ra một đoạn từ cụm từ daura đến footer 
                    var start = daura.indexOf('daura');
                    var end = daura.indexOf('footer');
                    document.getElementById('noi-dung-dau-ra').innerHTML
                    = daura.substring(start+7,end-1);
                }else{
                    document.getElementById('noi-dung-dau-ra').innerHTML='loi roi';
                }
            }
            if(xmlhttp.status==500){
                alert('Lỗi máy chủ không thực thi được.');
            }
        }
        var somu=0;
        if(document.getElementById('somu')){
            somu = document.getElementById('somu').value;
        }
        xmlhttp.open("GET","/matran/daura.html?loaigiai="
                +loaigiai+"&hang="+hang +"&cot=" + cot 
                +"&somu=" + somu + matran, false);
        xmlhttp.send();
    }
    MathJax.Hub.Queue(["Typeset", MathJax.Hub]);
}
if(document.getElementById('input-so_anso_n')&&document.getElementById('so_anso_n')){
    var width=(document.getElementById('input-so_anso_n').offsetWidth + 2)*3 ;
    document.getElementById('so_anso_n').style['width']=width +'px';
    document.getElementById('so_anso_n').style['margin-left']= 'auto';
    document.getElementById('so_anso_n').style['margin-right']= 'auto';
}
if(document.getElementById('input-matran')&&document.getElementById('hangcot')){
    var width=(document.getElementById('input-matran').offsetWidth + 2)*3 ;
    document.getElementById('hangcot').style['width']=width +'px';
}
function giai(loaigiai){
    huongdan(loaigiai);
    var hang=document.getElementById('hang').value;
    var cot=document.getElementById('cot').value;
    if(hang>0&&cot>0){
        var matran='';
        for(var i=0;i<hang;i++){
            for(var j=0;j<cot;j++){
                matran = matran + '&matran['+i+']['+j+']=' 
                        + document.getElementById('a['+i+']['+j+']').value;
            }
        }
        var xmlhttp;
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
        } else { // code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function() {
            if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                var daura= xmlhttp.responseText;
                if(daura){//Cắt ra một đoạn từ cụm từ daura đến footer 
                    var start = daura.indexOf('daura');
                    var end = daura.indexOf('footer');
                    document.getElementById('daura').innerHTML
                    = daura.substring(start+7,end-1);
                }else{
                    document.getElementById('daura').innerHTML='loi roi';
                }
            }
            if(xmlhttp.status==500){
                alert('Lỗi máy chủ không thực thi được.');
            }
        }
        var somu = document.getElementById('somu').value;
        xmlhttp.open("GET","/matran/daura.html?loaigiai="
                +loaigiai+"&hang="+hang +"&cot=" + cot 
                +"&somu=" + somu + matran, false);
        xmlhttp.send();
    }
    MathJax.Hub.Queue(["Typeset", MathJax.Hub]);
}
function giaihe(loaigiai){
    huongdan(loaigiai);
    var hang=document.getElementById('so_n').value;
    var cot=document.getElementById('so_an').value;
    if(hang>0&&cot>0){
        var matran='';
        for(var i=0;i<hang;i++){
            for(var j=0;j<cot;j++){
                matran = matran + '&matran['+i+']['+j+']=' 
                        + document.getElementById('a_he['+i+']['+j+']').value;
            }
        }
        var matranb='';
        for(var j=0;j<hang;j++){
            matranb = matranb + '&matranb['+j+'][0]=' 
                    + document.getElementById('b_he['+j+']').value;
        }
        
        var xmlhttp;
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
        } else { // code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function() {
            if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                var daura= xmlhttp.responseText;
                if(daura){//Cắt ra một đoạn từ cụm từ daura đến footer 
                    var start = daura.indexOf('daura');
                    var end = daura.indexOf('footer');
                    document.getElementById('daura').innerHTML
                    = daura.substring(start+7,end-1);
                }else{
                    document.getElementById('daura').innerHTML='loi roi';
                }
            }
            if(xmlhttp.status==500){
                alert('Lỗi máy chủ không thực thi được.');
            }
        }
       
        xmlhttp.open("GET","/matran/daura.html?loaigiai="
                +loaigiai+"&hang="+hang +"&cot=" + cot 
                + matran + matranb, false);
        xmlhttp.send();
    }
    MathJax.Hub.Queue(["Typeset", MathJax.Hub]);
}
function huongdan(loaigiai){
    var xmlhttp;
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    } else { // code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            var daura= xmlhttp.responseText;
            if(daura){//Cắt ra một đoạn từ cụm từ daura đến footer 
                var start = daura.indexOf('huongdan');
                var end = daura.indexOf('footer');
                document.getElementById('huongdan').innerHTML
                = daura.substring(start+10,end-1);
            }else{
                document.getElementById('huongdan').innerHTML='loi roi';
            }
        }
        if(xmlhttp.status==500){
            alert('Lỗi máy chủ không thực thi được.');
        }
    }
    xmlhttp.open("GET","/matran/huongdan.html?loaigiai="
            +loaigiai, false);
    xmlhttp.send();
}
function lythuyet(loaigiai){
    var xmlhttp;
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    } else { // code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            var daura= xmlhttp.responseText;
            if(daura){//Cắt ra một đoạn từ cụm từ daura đến footer 
                var start = daura.indexOf('huongdan');
                var end = daura.indexOf('footer');
                document.getElementById('lythuyet').innerHTML
                = daura.substring(start+10,end-1);
            }else{
                document.getElementById('lythuyet').innerHTML='loi roi';
            }
        }
        if(xmlhttp.status==500){
            alert('Lỗi máy chủ không thực thi được.');
        }
    }
    xmlhttp.open("GET","/matran/huongdan.html?loaigiai="
            +loaigiai, false);
    xmlhttp.send();
}
function thuattoan(loaigiai){
    var xmlhttp;
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    } else { // code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            var daura= xmlhttp.responseText;
            if(daura){//Cắt ra một đoạn từ cụm từ daura đến footer 
                var start = daura.indexOf('huongdan');
                var end = daura.indexOf('footer');
                document.getElementById('thuattoan').innerHTML
                = daura.substring(start+10,end-1);
            }else{
                document.getElementById('thuattoan').innerHTML='loi roi';
            }
        }
        if(xmlhttp.status==500){
            alert('Lỗi máy chủ không thực thi được.');
        }
    }
    xmlhttp.open("GET","/matran/huongdan.html?loaigiai="
            +loaigiai, false);
    xmlhttp.send();
}
if(document.getElementById('lienquandenmatran')
        &&document.getElementById('hephuongtrinh')){
    $("#lienquandenmatran").hide();
    $("#hephuongtrinh").hide();
}
function an(){
    //document.getElementById(loaigiai).style.visibility = "hidden";
    $("#lienquandenmatran").hide();
    $("#hephuongtrinh").show();
}
function hien(){
    //document.getElementById(loaigiai).style.visibility = "visible";
    $("#hephuongtrinh").hide();
    $("#lienquandenmatran").show();
}
function toanmanhinhdauvao(){
    $('body').css({
        'background-color': '#337ab7'
    });
    
    $('#dauvao').css({
        'background-color': 'white',
        position: 'fixed',
        top: 0,
        right: 0,
        left: 0,
        zIndex: 9002,
        'max-width':'95vw',
        'max-height':'90vh',
        padding:'0px 30px',
        'margin':'15px auto',
        'margin-top':'0px'
    });
}
function thoatmanhinhdauvao(){
    $('body').css({
        'background-color': 'transparent'
    });
    $('#dauvao').css({
        position:'static',
        'min-height':'90vh',
        'min-width': '40vw',
        'overflow': 'auto',
        margin:'0px',
        'background-color': 'transparent',
    });
}
function toanmanhinhdaura(){
    $('body').css({
        'background-color': '#337ab7'
    });
    
    $('#daura').css({
        'background-color': 'white',
        position: 'fixed',
        top: 0,
        right: 0,
        left: 0,
        zIndex: 9002,
        'max-width':'95vw',
        'max-height':'90vh',
        padding:'0px 30px',
        'margin':'15px auto',
        'margin-top':'0px'
    });
}
function thoatmanhinhdaura(){
    $('body').css({
        'background-color': 'transparent'
    });
    $('#daura').css({
        position:'static',
        'min-height':'90vh',
        'min-width': '40vw',
        'overflow': 'auto',
        margin:'0px',
        'background-color': 'transparent',
    });
}