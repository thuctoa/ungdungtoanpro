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
if(document.getElementById('input-matran')){
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
function toanmanhinh(){
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
    });
}
function thoatmanhinh(){
    $('body').css({
        'background-color': 'white'
    });
    $('#daura').css({
        'position':'absolute',
        'min-height':'90vh',
        'min-width': '40vw',
        'overflow': 'auto',
        margin:'0px',
    });
}