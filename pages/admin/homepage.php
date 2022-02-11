<?php
if ($templateMode) {
    include('./includes/header.php');
}
?>
<button id="submitbtn" style="color:#4F4F4F; border-radius: 8px" class="mdui-btn mdui-btn-icon mdui-float-right" onclick="logout()">
    <i class="mdui-icon material-icons">exit_to_app</i>
</button>
<div class="mdui-typo">
    <h1 class="doc-chapter-title doc-chapter-title-first mdui-text-color-theme">管理页面</h1>
</div>
<br /><br />
<?php
if ($ADMIN_PASS == "kagamine1234") {
?>
    <div class="mdui-card mdui-hoverable" style="border-radius: 16px">
        <div class="mdui-card-media">
            <img style="max-height: 2000px" onerror="randomImage()" src="" />
        </div>
        <div class="mdui-card-primary">
            <div class="mdui-card-primary-title">抱歉！</div>
            <div class="mdui-card-primary-subtitle">出于安全原因，管理页面被屏蔽！</div>
        </div>
        <div class="mdui-card-content">
            请修改根目录中config.php的值$ADMIN_PASS后再次访问本页！<br><br>
        </div>
    </div>
<?php
} else {
?>
    <div class="mdui-table-fluid" style="border-radius: 16px">
        <table class="mdui-table">
            <thead>
                <tr>
                    <th>功能</th>
                    <th>描述</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>基础设置</td>
                    <td>可以设置本站标题或其他信息</td>
                    <td><a class="mdui-btn mdui-color-theme-accent mdui-ripple" style="border-radius: 8px" href="<?php if ($REWRITE) echo "/admin/general";
                                                                                                                    else echo "/?page=admin&id=general"; ?>">去设置</a></td>
                </tr>
                <tr>
                    <td>表白管理</td>
                    <td>可以删除本站表白信息</td>
                    <td><a class="mdui-btn mdui-color-theme-accent mdui-ripple" style="border-radius: 8px" href="<?php if ($REWRITE) echo "/admin/confession";
                                                                                                                    else echo "/?page=admin&id=confession"; ?>">去管理</a></td>
                </tr>
            </tbody>
        </table>
    </div>
<?php
}
?>
<script>
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

    function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + "; " + expires;
    }
</script>