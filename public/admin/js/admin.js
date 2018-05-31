var Script = function () {

    // jQuery('.sidebar .item.vertical > a').click(function () {
    //     var ver = jQuery(this).next();
    //     if (ver.is(":visible")) {
    //         jQuery(this).parent().removeClass("open");
    //         ver.slideUp(200);
    //     } else {
    //         jQuery(this).parent().addClass("open");
    //         ver.slideDown(200);
    //     }
    // });


	$(function() {

	   //var  cur= $.cookie('cur',{path:'/'});
	   var cur=localStorage.getItem("cur");
	    if( cur!=undefined && cur!=''&& cur!="javascript:;")
        {
           // $('.sidebar a').eq(cur).addClass('active');
            $('.sidebar a').each(function (i) {

                if( $(this).attr("href")==cur)
                {
                    $('.sidebar a').eq(i).addClass('active');
                    var offset=($('.sidebar a').eq(i).offset());
                    if( offset !=undefined)
                    {
                        $('.sidebar').animate({scrollTop: offset.top-60}, 500);
                    }
                }


            });



        }
        $('.sidebar').on("click",'a',function () {

           _this=$(this).get(0);
           url=$(this).attr("href");
            $('.sidebar a').each(function (i) {

                if( this==_this)
                {

                   // $.cookie("cur",i,{path:'/'});

                   localStorage.setItem("cur",url);
                }
            });

            //return false;
        })

        $('.home').on("click",'a',function () {

            _this=$(this).get(0);
            url=$(this).attr("href");
            $('.home a').each(function (i) {

                if( this==_this)
                {

                    // $.cookie("cur",i,{path:'/'});

                    localStorage.setItem("cur",url);
                }
            });

            //return false;
        })

         $('#logout').on("click",function () {
             localStorage.removeItem("cur");
         });

        function responsiveView() {
            var wSize = $(window).width();
            if (wSize <= 768) {
                $('.main').addClass('sidebar-close');
                $('.sidebar .sidebar-menu').hide();
            }

            if (wSize > 768) {
                $('.main').removeClass('sidebar-close');
                $('.sidebar .sidebar-menu').show();
            }
        }
        $(window).on('load', responsiveView);
        $(window).on('resize', responsiveView);
    });

    $('.sidebar-toggle').click(function () {
        if ($('.sidebar .sidebar-menu').is(":visible") === true) {
            $('.main-content').css({
                'margin-left': '0px'
            });
            $('.sidebar').css({
                'margin-left': '-180px'
            });
            $('.sidebar .sidebar-menu').hide();
            $(".main").addClass("sidebar-closed");
        } else {
            $('.main-content').css({
                'margin-left': '180px'
            });
            $('.sidebar .sidebar-menu').show();
            $('.sidebar').css({
                'margin-left': '0'
            });
            $(".main").removeClass("sidebar-closed");
        }
    });

}();


function nbalert(msg,tit) {
    if(tit==undefined || tit=='')
    {
       tit='系统提示';
    }

    bootbox.alert({
        title: tit,
        message: msg
    });

}
function nbconfirm(msg,tit,callback) {
    if(tit==undefined || tit=='')
    {
        tit='系统提示';
    }
    $arg=arguments.length
    bootbox.confirm({
        title: tit,
        message: msg,
        buttons: {
            confirm: {
                label: '确认',
                className: 'btn-success'
            },
            cancel: {
                label: '取消',
                className: 'btn-danger'
            }
        },
        callback: function (result) {

            //执行回调函数
            if ($arg== 3 && result && typeof callback === "function") {
                callback();
            }

        }
    });

}

function go_to(url)
    {
        window.location.href=url;
        return false;
    }

function erroralert(errorobj){
    if(errorobj.status==422){
        var msg='';
        $.each(errorobj.responseJSON, function(index, value) {
            msg+=value;
        });
        nbalert(msg);

    }else{
        nbalert('网络错误');
    }

}

function del(callback){
    nbconfirm("删除后无法恢复，请确认",'',callback)
}
//
// loading=function () {
//    return bootbox.dialog({
//         message: '<i class="icon icon-spin icon-3x icon-spinner  " style="color: #fff; "></i>',
//        //className:'loading',
//         closeButton: false
//     });
// }
//显示加载
function show_loading()
{
    layer.load(0, {shade: true,
        shade: 0.6,})
}
//关半加载
function hide_loading() {
    layer.closeAll();
}

$.extend({
    getUrlVars: function(){
        var vars = [], hash;
        var hashes = ''
        if(window.location.href.indexOf('#')>0)
        {
            hashes =window.location.href.slice(window.location.href.indexOf('?') + 1,window.location.href.indexOf('#')  ).split('&');
        }
        else
        {
            hashes =window.location.href.slice(window.location.href.indexOf('?') + 1 ).split('&');
        }

        for(var i = 0; i < hashes.length; i++)
        {
            hash = hashes[i].split('=');
            vars.push(hash[0]);
            vars[hash[0]] = hash[1];
        }
        return vars;
    },
    getUrlVar: function(name){
        return $.getUrlVars()[name];
    }
});
var lea = {
    msg: function(msg) {
        var _msg = '';
        if (typeof msg === 'object') {
            $.each(msg, function(i, val) {
                _msg += '<li style="text-align:left;list-syle-type:square">' + val + '</li>';
            });
        } else {
            _msg = msg;
        }
        return _msg;
    }
};

/**
 * 异步获取表单
 * 异步提交表单
 * 表单验证
 */
$(document).on('click', '.ajax-form', function(event) {
    event.preventDefault();
    var self = $(this);
    if (self.attr('disabled')) return false;
    var url = self.attr('href') || self.data('url');
    if (!url) return;
    $.get(url, function(html) {
        if (typeof html === 'object') {
            layer.msg(html.msg);
            return false;
        }

        layer.open({
            type: 1,
            title: self.attr('title'),
            content: html,
            scrollbar: true,
            maxWidth:'90%',
            btn: ['确定', '取消'],
            yes: function(index, layero) {
                if ($(layero).find('.layui-layer-btn0').attr('disabled')) {
                    return false;
                }

                var _form = $(layero).find('form');
                $(_form).trigger("submit");

                if($(".Validform_wrong").size()!=0)
                {
                    return false;
                }

                $(layero).find('.layui-layer-btn0').attr('disabled', 'disabled');

                $.ajax({
                    url: _form.attr('action') || '',
                    type: 'POST',
                    dataType: 'json',
                    data: _form.serialize(),
                })
                    .done(function(res) {
                        if (res.status == 1) {
                            layer.msg(lea.msg(res.msg), { time: 1200 }, function() {
                                layer.close(index);
                                window.location.reload();
                            });
                        } else {

                            var str = lea.msg(res.msg) || '服务器异常';
                            layer.msg(str);
                            $(layero).find('.layui-layer-btn0').removeAttr('disabled')
                        }
                    })
                    .fail(function(jqXHR, textStatus, errorThrown) {
                        $(layero).find('.layui-layer-btn0').removeAttr('disabled')
                    });
            },
            btn2: function(index) {
                layer.close(index);
            },
            success: function() {
               // form.render();
                $(".form-horizontal").Validform({
                    tiptype:3,
                });

                $(".form-horizontal").on("submit",function(){
                    return false;
                });

            }
        }, 'html');
    });
    return false;
});

/**
 * 异步url请求
 * 用户简单操作，如删除
 */
$(document).on('click', '.ajax-get', function(event) {
    event.preventDefault();
    var self = $(this);
    var url = self.attr('href') || self.data('url');
    var title = self.attr('title') || '执行该操作';
    if (!url) return false;

    if (self.attr('confirm')) {
        layer.confirm('您确定要 <span style="color:#f56954">' + title + '</span> 吗？', function(index) {
            $.get(url, function(res) {
                layer.msg(lea.msg(res.msg));
                window.location.reload();
            });
        });

    } else {
        $.get(url, function(res) {
            var message = self.attr('msg') || 1;
            if (res.status == 0 ) {
                layer.msg(lea.msg(res.msg));
                window.location.reload();
            }


        });
    }
    return false;
})

//ajax-show
$(document).on('click', '.ajax-show', function(event) {
    event.preventDefault();
    var self = $(this);
    var url = self.attr('href') || self.data('url');
    var title = self.attr('data-title') || self.attr('title') || false;
    $.get(url, function(data) {
        if (typeof data.status !== 'undefined' && data.status == 0) {
            layer.msg(data.msg);
            return false;
        }
        layer.open({
            type: 1,
            title: title,
            shade: 0.8,
            area: ['75%', '85%'],
            //id: 'ajax-show',
            moveType: 1,
            offset: '20px',
            scrollbar: true,
            content: data,
            success: function(layero, index) {
               // form.render();
            }
        });
    });
    return false;
});


