$(document).ready(function () {
    //Toggle fullscreen
    $("#dau-vao-fullscreen").click(function (e) {
        
        e.preventDefault();
        var $this = $(this);
        
        if ($this.children('i').hasClass('glyphicon-resize-full'))
        {
            $('#dau-vao').css('height', '90vh');
            $this.children('i').removeClass('glyphicon-resize-full');
            $this.children('i').addClass('glyphicon-resize-small');
           // $this.children('i').attr('title', 'Tắt chế độ toàn màn hình của đề bài');
        }
        else if ($this.children('i').hasClass('glyphicon-resize-small'))
        {
            $('#dau-vao').css('height', '50vh');
            $this.children('i').removeClass('glyphicon-resize-small');
            $this.children('i').addClass('glyphicon-resize-full');
            //$this.children('i').attr('title', 'Bật chế độ toàn màn hình của đề bài');
        }
        $(this).closest('.panel').toggleClass('panel-fullscreen');
    });
    $("#dau-ra-fullscreen").click(function (e) {
        e.preventDefault();
        
        var $this = $(this);
    
        if ($this.children('i').hasClass('glyphicon-resize-full'))
        {
            $('#dau-ra').css('height', '90vh');
            $this.children('i').removeClass('glyphicon-resize-full');
            $this.children('i').addClass('glyphicon-resize-small');
           // $this.children('i').attr('title', 'Tắt chế độ toàn màn hình của lời giải');
        }
        else if ($this.children('i').hasClass('glyphicon-resize-small'))
        {
            $('#dau-ra').css('height', '50vh');
            $this.children('i').removeClass('glyphicon-resize-small');
            $this.children('i').addClass('glyphicon-resize-full');
            //$this.children('i').attr('title', 'Bật chế độ toàn màn hình của lời giải');
        }
        $(this).closest('.panel').toggleClass('panel-fullscreen');
    });
    $("#thuat-toan-fullscreen").click(function (e) {
        e.preventDefault();
        
        var $this = $(this);
    
        if ($this.children('i').hasClass('glyphicon-resize-full'))
        {
            $('#thuat-toan').css('height', '90vh');
            $this.children('i').removeClass('glyphicon-resize-full');
            $this.children('i').addClass('glyphicon-resize-small');
           // $this.children('i').attr('title', 'Tắt chế độ toàn màn hình của thuật toán');
        }
        else if ($this.children('i').hasClass('glyphicon-resize-small'))
        {
            $('#thuat-toan').css('height', '55vh');
            $this.children('i').removeClass('glyphicon-resize-small');
            $this.children('i').addClass('glyphicon-resize-full');
            //$this.children('i').attr('title', 'Bật chế độ toàn màn hình của thuật toán');
        }
        $(this).closest('.panel').toggleClass('panel-fullscreen');
    });
    $("#ly-thuyet-fullscreen").click(function (e) {
        e.preventDefault();
        
        var $this = $(this);
    
        if ($this.children('i').hasClass('glyphicon-resize-full'))
        {
            $('#ly-thuyet').css('height', '90vh');
            $this.children('i').removeClass('glyphicon-resize-full');
            $this.children('i').addClass('glyphicon-resize-small');
            //$this.children('i').attr('title', 'Tắt chế độ toàn màn hình của lý thuyết');
            
        }
        else if ($this.children('i').hasClass('glyphicon-resize-small'))
        {
            $('#ly-thuyet').css('height', '55vh');
            $this.children('i').removeClass('glyphicon-resize-small');
            $this.children('i').addClass('glyphicon-resize-full');
            //$this.children('i').attr('title', 'Bật chế độ toàn màn hình của lý thuyết');
        }
        $(this).closest('.panel').toggleClass('panel-fullscreen');
    });
    // Ẩn hết tất cả các thẻ ban đầu
    for(var i=0;i<4;i++){
            chonloaian(i);
    }
});
function chonloaigiai(so){
    
    for(var i=0;i<5;i++){
        if(i!=so){
            chonloaian(i);
        }
        
    }
    chonloaian(100);
    chonloaihien(so);
}
function chonloaian(so){
    var divs = document.getElementsByClassName('chon-loai-'+so);
    for(var j=0;j<divs.length;j++) {
        divs[j].style.visibility="hidden";
        divs[j].style.display = "none";
    }
}
function chonloaihien(so){
    var divs = document.getElementsByClassName('chon-loai-'+so);
    for(var j=0;j<divs.length;j++) {
        divs[j].style.visibility="visible";
        divs[j].style.display = "block";
    }
}