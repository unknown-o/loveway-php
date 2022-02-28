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
            <button onclick="submit()" style="border-radius: 8px" id='login-BTN' class="mdui-btn mdui-ripple mdui-btn-dense mdui-color-theme-accent mdui-float-right">立即登录</button>
        </div>

    </div>
</div>
<script>
    function submit() {
        imageVerification(function(answer) {
            login(answer)
        })
    }

    function login(vcode) {
        var timestamp = this.timestamp = Date.parse(new Date()) / 1000;
        requestApi("login", {
            username: $("#username").val(),
            password: $("#password").val(),
            vcode: vcode,
            timestamp: timestamp
        }, function() {
            $("#username").val("")
            $("#password").val("")
        }, true, true, "login-BTN")
    }
</script>