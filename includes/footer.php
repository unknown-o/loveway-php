</div>
<script src="https://cdn.jsdelivr.net/npm/mdui@1.0.1/dist/js/mdui.min.js"></script>
<script>
    $(document).pjax('a', '#pjax-container',{'timeout':false})
    $("#isLoading").hide()
    var inst = new mdui.Drawer('#main-drawer');
    $(document).on('pjax:send', function() {
        if (isMobile()) {
            inst.close();
        }
        $("#isLoading").show()

    })
    $(document).on('pjax:complete', function() {
        setTimeout(function() {
            $("#isLoading").hide()
        }, 2000);
    })

    function isMobile() {
        var userAgentInfo = navigator.userAgent;
        var mobileAgents = ["Android", "iPhone", "SymbianOS", "Windows Phone", "iPad", "iPod"];
        var mobile_flag = false;
        for (var v = 0; v < mobileAgents.length; v++) {
            if (userAgentInfo.indexOf(mobileAgents[v]) > 0) {
                mobile_flag = true;
                break;
            }
        }
        var screen_width = window.screen.width;
        var screen_height = window.screen.height;
        if (screen_width < 500 && screen_height < 800) {
            mobile_flag = true;
        }
        return mobile_flag;
    }

    function getNowURL(){
        return window.location.protocol+'//'+window.location.host
    }

    $(function() {
        var clipboard = new ClipboardJS('.copy');
        clipboard.on('success', function(e) {
            mdui.snackbar({
                message: '复制表白卡片地址成功！',
                position: 'right-top'
            });
        });
        clipboard.on('error', function(e) {
            mdui.snackbar({
                message: '复制表白卡片地址失败！请尝试手动复制！',
                position: 'right-top'
            });
        });
    });
</script>