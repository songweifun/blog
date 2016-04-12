$(function(){

//关闭开启
    $('.table .isoff').click(function(){
        var url=$(this).attr('url');
        var status=$(this).attr('status');
        var self=this;
        //alert(url);
        //alert(status);

        $.ajax({

            url:url+'/status/'+status,
            dataType:'json',
            success:function(result){
                if(result.status==1){
                    $(self)[0].innerHTML='关闭';
                    $(self).parent().siblings('.status')[0].innerHTML='开启';
                    $(self).attr('status',"0");
                    alert('开启成功');

                }else{
                    $(self)[0].innerHTML='开启';
                    $(self).parent().siblings('.status')[0].innerHTML='关闭';
                    $(self).attr('status',"1");
                    alert('关闭成功');
                }
            }
        })


    })







})