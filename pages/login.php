<?php
if ($templateMode) {
    include('./includes/header.php');
}
?>
<div class="mdui-container" style="max-width: 400px; ">
    <br><br>
    <div class="mdui-card">

        <div class="mdui-card-media">
            <div class="mdui-card-menu">
                <button onclick="javascript:history.go(-1);" class="mdui-color-theme-accent mdui-btn mdui-btn-icon mdui-text-color-white"><i class="mdui-icon material-icons">arrow_back</i></button>
            </div>
        </div>

        <div class="mdui-card-primary">
            <div class="mdui-card-primary-title">登录</div>
            <div class="mdui-card-primary-subtitle">此处为未知表白墙的后台，闲人免进！</div>
        </div>

        <div class="mdui-card-content">
            <div class="mdui-textfield">
                <input class="mdui-textfield-input" id='username' type="text" placeholder="用户名" />
            </div>
            <div class="mdui-textfield">
                <input class="mdui-textfield-input" id='password' type="password" placeholder="密码" />
            </div>
        </div>

        <div class="mdui-card-actions">
            <button onclick="submit();" style="border-radius: 8px" id='submitbtn' class="mdui-btn mdui-ripple mdui-btn-dense mdui-color-theme-accent mdui-float-right">立即登录</button>
        </div>

    </div>
</div>
<script>
    function submit() {
        $("#submitbtn").attr("disabled", true);
        setTimeout(function() {
            $("#submitbtn").attr("disabled", false);
        }, 200000);
        var username = $("#username").val();
        var password = $("#password").val();
        $.ajax({
            type: 'post',
            url: '/api/admin.php',
            data: {
                mode: "login",
                username: username,
                password: password
            },
            dataType: 'text',
            success: function(data) {
                console.log(data)
                data = JSON.parse(data);
                if (data.code == 1) {
                    mdui.snackbar({
                        message: '登录成功！',
                        position: 'right-top'
                    });
                    $.pjax.reload({
                        container: "#pjax-container"
                    })
                } else {
                    mdui.snackbar({
                        message: data.msg,
                        position: 'right-top'
                    });
                }
                $("#username").val("");
                $("#password").val("");
                $("#submitbtn").attr("disabled", false);
            },
            error: function(data) {
                $("#submitbtn").attr("disabled", false);
                var errors = data.responseJSON;
                $.each(errors.errors, function(key, value) {
                    mdui.snackbar({
                        message: "出现了一个未知错误",
                        position: 'right-top'
                    });
                });
            },
        });
    }
</script>