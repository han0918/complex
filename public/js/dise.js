$(function () {

    //touchslide
    TouchSlide({
        slideCell: "#focus",
        titCell: ".auto-Page ul", //开启自动分页 autoPage:true ，此时设置 titCell 为导航元素包裹层
        mainCell: ".main-cell ul",
        effect: "left",
        autoPlay: true,//自动播放
        autoPage: true //自动分页
        // switchLoad:"_src", //切换加载，真实图片路径为"_src"
    });

    function fixedBoxHeight(box, i) {
        i = i || 0;
        var tHeight = $(box).find('.bd')[0];
        if (!tHeight) {
            return;
        }
        var children = tHeight.children[i + 1].children;
        var len = children.length;
        var n = 0;
        var height = 0;
        var ele = null;

        for (n; n < len; n++) {
            ele = $(children[n]);
            height += parseInt(ele.height() + parseInt(ele.css('margin-top')) + parseInt(ele.css('margin-bottom')));
        }

        tHeight.parentNode.style.height = height + "px";
        if (i > 0) tHeight.parentNode.style.transition = "200ms";//添加动画效果
    }
//左循环切换
//     TouchSlide({
//         slideCell: "#leftTabBox",
//         effect: "leftLoop",
//         startFun: function (i) {
//             fixedBoxHeight('#leftTabBox', i);
//         }
//     });
    // TouchSlide({
    //     slideCell: "#leftTabBox1",
    //     effect: "leftLoop",
    //     startFun: function (i) {
    //         fixedBoxHeight('#leftTabBox1', i);
    //     }
    // });
    // TouchSlide({
    //     slideCell: "#leftTabBox2",
    //     effect: "leftLoop",
    //     startFun: function (i) {
    //         fixedBoxHeight('#leftTabBox2', i);
    //     }
    // });
    // TouchSlide({
    //     slideCell: "#leftTabBox3",
    //     effect: "leftLoop",
    //     startFun: function (i) {
    //         fixedBoxHeight('#leftTabBox3', i);
    //     }
    // });
    TouchSlide({
        slideCell: "#leftTabBox4",
        effect: "leftLoop",
        startFun: function (i) {
            fixedBoxHeight('#leftTabBox4', i);
        }
    });
    //
    TouchSlide({
        slideCell: "#leftTabBox5",
        effect: "leftLoop",
        startFun: function (i) {
            fixedBoxHeight('#leftTabBox5', i);
        }
    });
    TouchSlide({
        slideCell: "#leftTabBox6",
        effect: "leftLoop",
        startFun: function (i) {
            fixedBoxHeight('#leftTabBox6', i);
        }
    });
    TouchSlide({
        slideCell: "#leftTabBox7",
        effect: "leftLoop",
        startFun: function (i) {
            fixedBoxHeight('#leftTabBox7', i);
        }
    });
    // $("div.tempWrap").css("height", "auto !important");
    // fixedBoxHeight('#leftTabBox');
    // fixedBoxHeight('#leftTabBox1');
    // fixedBoxHeight('#leftTabBox2');
    // fixedBoxHeight('#leftTabBox3');
    fixedBoxHeight('#leftTabBox4');
    fixedBoxHeight('#leftTabBox5');
    fixedBoxHeight('#leftTabBox6');
    fixedBoxHeight('#leftTabBox7');


    //展开收起效果
    $('.nav-more').on('click',function(e){
        e.preventDefault();
        if($(this).find('span').html()=='更多'){
            $('.nav-index-dise,.nav-index').find('li').not('.nav-show-tab').css({
                display:"inline-block"
            })
            $(this).find('i').attr({
                class:"ico-nav-pack"
            })
            $(this).find('span').html('收起');
        }else{
            $('.nav-index-dise,.nav-index').find('li').not('.nav-show-tab').css({
                display:"none"
            })
            $(this).find('i').attr({
                class:"ico-nav-more"
            })
            $(this).find('span').html('更多');
        }
    })

    //布局转换
    var storage=window.localStorage;
    var paging = storage.getItem('paging-view') || 1;

    $('.lay-switch').find('button').on('click',function(){
        // storage.setItem()
        if($(this).index() == 1){
            $(this).addClass('btn-vertical--active').siblings().removeClass('btn-transv--active');

            storage.setItem('paging-view', 1);
        }else if($(this).index() == 2){
            $(this).addClass('btn-transv--active').siblings().removeClass('btn-vertical--active');
            storage.setItem('paging-view', 2);
        }
        $('.com-box').find('ul').eq($(this).index()-1).show().siblings().hide();
    });

    $('.lay-switch').find('button').eq(paging - 1).trigger('click');


    //显示隐藏
    // var timer = null;
    $('.part1,.part2,.part3').click( function () {
        // clearTimeout(timer);
        // $(this).parent().next().show();
        $(this).parent().next().toggle();
        // $('.title-hide').toggle();
    });
    // $('.part1,.part2,.part3').mouseout( function () {
    //     var _this = $(this);
    //     // timer = setTimeout(function(){
    //         _this.parent().next().hide();
    //     // },500)
    // });

    // 换一换
    $('[data-update-link]').on("click",function(evt){
        var ele=$(this);

        if(ele.attr("data-updating") == "on"){
            return;
        }

        var container=ele.parents("[data-update-block]").find("[data-update-con]");
        var api=ele.data("update-api")+"&t="+new Date().getTime();
        var $span = ele;

        $span.addClass('rotate');

        ele.attr('data-updating',"on");

        $.get(api, function(data) {
            ele.removeAttr('data-updating');
            var data=JSON.parse(data);

            var inner_html=template('changeit',data);
            container.html(inner_html);
            $span.removeClass('rotate');

        });

        $(document).unbind('ajaxError');
        $(document).on('ajaxError', function () {
            alert('error');
            ele.removeAttr('data-updating');
            $span.removeClass('rotate');
        });
    });

})