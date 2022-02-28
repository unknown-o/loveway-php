function requestApi(functionName, args, callback, showResults, refreshPageWhenSuccess, disableBtnId) {
    $(disableBtnId).attr("disabled", true);
    setTimeout(function() {
        $(disableBtnId).attr("disabled", false);
    }, 200000)
    $("#isLoading").show(100)
    $.ajax({
        type: 'post',
        url: '/api/' + functionName + '.php',
        data: args,
        dataType: 'json',
        success: function(rdata) {
            if (showResults) {
                mdui.snackbar({
                    message: rdata.msg,
                    position: 'right-top'
                })
            }
            if (refreshPageWhenSuccess & rdata.code == 1) {
                $.pjax.reload({
                    container: "#pjax-container"
                })
            }
            $("#isLoading").hide(100)
            $(disableBtnId).attr("disabled", false)
            if (callback) {
                callback(rdata)
            }
        },
        error: function(data) {
            $("#isLoading").hide(100)
            $(disableBtnId).attr("disabled", false)
            mdui.snackbar({
                message: "请求接口[" + functionName + "]时，出现了一个致命错误！",
                position: 'right-top'
            })
        }
    })
}

function randomNumBoth(Min, Max) {
    var Range = Max - Min;
    var Rand = Math.random();
    var num = Min + Math.round(Rand * Range);
    return num;
}

function randomImage(that) {
    var that = $(window.event.target)
    if (window.imglist == undefined) {
        $.get("https://img.llilii.cn/imglist/kagamine.json", function(rdata) {
            window.imglist = rdata
            window.base_url_origin = imglist['base_url']['origin']['public'][randomNumBoth(0, parseInt(imglist['base_url']['compression']['public'].length) - 1)]
            window.base_url_compression = imglist['base_url']['compression']['public'][randomNumBoth(0, parseInt(imglist['base_url']['compression']['public'].length) - 1)]

            image_id = randomNumBoth(0, parseInt(imglist['info']['count']) - 1)
            image_name = imglist['filename'][image_id]
            that.attr('src', base_url_compression + "/" + image_name)
            that.attr('origin-src', window.base_url_origin + "/" + image_name)
        })
    } else {
        image_id = randomNumBoth(0, parseInt(imglist['info']['count']) - 1)
        image_name = imglist['filename'][image_id]
        that.attr('src', base_url_compression + "/" + image_name)
        that.attr('origin-src', window.base_url_origin + "/" + image_name)
    }
    that.attr('onerror', null)
}

function imageVerification(callback) {
    mdui.dialog({
        title: '请输入图片中的验证码',
        content: '<center><div class="mdui-row"> <div class="mdui-col-xs-9"> <div class="mdui-textfield"> <input class="mdui-textfield-input" id="answer" type="text" placeholder="请输入您的答案" /></div> </div> <div class="mdui-col-xs-3"> <img style="position: relative;top:15px" id="vcode" src="/api/vcode.php" /> </div> </div></center>',
        modal: true,
        buttons: [{
                text: '取消'
            },
            {
                text: '确认',
                onClick: function(inst) {
                    callback($('#answer').val());
                }
            }
        ]
    });
}

function search() {
    mdui.prompt('支持从名字、表白内容中搜索', '搜索',
        function(value) {
            setTimeout(function() {
                $.pjax({
                    url: '/?search=' + value,
                    container: '#pjax-container'
                });
            }, 10)
        }
    )
}

function jumpPage() {
    mdui.prompt('你要跳转到第几页？', '快速翻页',
        function(value) {
            setTimeout(function() {
                $.pjax({
                    url: '?p=' + value,
                    container: '#pjax-container'
                });
            }, 10)
        }
    )
}

function logout() {
    setCookie('loveway_token', "kagamine yes!", -1);
    mdui.snackbar({
        message: "登出成功！",
        position: 'right-top'
    });
    $.pjax.reload({
        container: "#pjax-container"
    })
}