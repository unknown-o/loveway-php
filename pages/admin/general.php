<?php
if ($templateMode) {
    include('./includes/header.php');
}
?>
<br /><br />
<div class="mdui-card mdui-hoverable" style="border-radius: 16px">
    <div class="mdui-card-media">
        <div class="mdui-card-menu">
            <a target="_blank" style="color:#4F4F4F" href="
                    <?php
                    if ($REWRITE) {
                        echo "/admin";
                    } else {
                        echo '/?page=admin';
                    }
                    ?>" class="mdui-btn mdui-btn-icon mdui-float-right">
                <i class="mdui-icon material-icons">arrow_back</i>
            </a>
        </div>
    </div>
    <div class="mdui-card-primary">
        <div class="mdui-card-primary-title">表白墙设置</div>
        <div class="mdui-card-primary-subtitle">此处可以设置您的表白墙！</div>
    </div>
    <div class="mdui-divider"></div>
    <div class="mdui-card-content">
        <div class="mdui-textfield">
            <label class="mdui-textfield-label">表白墙标题</label>
            <textarea id="title" class="mdui-textfield-input" placeholder="<?php echo getInfo('title') ?>"><?php echo getInfo('title') ?></textarea>
        </div>
        <div class="mdui-textfield">
            <label class="mdui-textfield-label">SEO关键词</label>
            <textarea id="keywords" class="mdui-textfield-input" placeholder="<?php echo getInfo('keywords') ?>"><?php echo getInfo('keywords') ?></textarea>
        </div>
        <div class="mdui-textfield">
            <label class="mdui-textfield-label">SEO简介</label>
            <textarea id="description" class="mdui-textfield-input" placeholder="<?php echo getInfo('description') ?>"><?php echo getInfo('description') ?></textarea>
        </div>
        <div class="mdui-textfield">
            <label class="mdui-textfield-label">网站音频</label>
            <textarea id="audio" class="mdui-textfield-input" placeholder="<?php echo getInfo('audio') ?>"><?php echo getInfo('audio') ?></textarea>
        </div>
        <div class="mdui-textfield">
            <label class="mdui-textfield-label">自定义页面标题（本站右侧应用栏的第三个列表）</label>
            <textarea id="more" class="mdui-textfield-input" placeholder="<?php echo getInfo('more') ?>"><?php echo getInfo('more') ?></textarea>
        </div>
        <div class="mdui-textfield">
            <label class="mdui-textfield-label">自定义页面（请使用html格式、本站右侧应用栏的第三个列表）</label>
            <textarea id="more_content" class="mdui-textfield-input" rows="4" placeholder="<?php echo htmlspecialchars(getInfo('more_content')) ?>"><?php echo getInfo('more_content') ?></textarea>
        </div>
        <div class="mdui-textfield">
            <label class="mdui-textfield-label">关于本站页面（请使用html格式）</label>
            <textarea id="about_content" class="mdui-textfield-input" rows="4" placeholder="<?php echo htmlspecialchars(getInfo('about_content')) ?>"><?php echo getInfo('about_content') ?></textarea>
        </div>
    </div>

    <div class="mdui-card-actions">
        <button id="submit-btn" style="border-radius: 8px" class="mdui-btn mdui-color-theme-accent mdui-ripple mdui-float-right" onclick="submit()">
            保存数据
        </button>
        <button id="help-btn" style="border-radius: 8px" class="mdui-btn mdui-color-theme-accent mdui-ripple mdui-float-right" onclick="getHelp()">
            使用帮助
        </button>
    </div>
    <script>
        function setCookie(cname, cvalue, exdays) {
            var d = new Date();
            d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
            var expires = "expires=" + d.toUTCString();
            document.cookie = cname + "=" + cvalue + "; " + expires;
        }

        function submit() {
            configArr = ['title', 'keywords', 'description', 'audio', 'more', 'more_content', 'about_content'];
            for (let i = 0; i < configArr.length; i++) {
                if ($("#" + configArr[i]).val() != $("#" + configArr[i]).attr('placeholder')) {
                    value = $("#" + configArr[i]).val();
                    requestApi("update_config", {
                        name: configArr[i],
                        value: value
                    }, false, true, false, "submit-btn")
                }
            }
        }

        function getHelp() {
            mdui.snackbar({
                message: "正在加载帮助信息中...",
                position: 'right-top'
            });
            $.get("https://static.llilii.cn/json/loveway_help.json", function(data, status) {
                mdui.snackbar({
                    message: "加载成功！",
                    position: 'right-top'
                });
                mdui.dialog({
                    title: data.title,
                    content: data.content,
                });
            });
        }

        function request(name, value) {
            $("#submitbtn").attr("disabled", true);
            $.ajax({
                type: 'post',
                url: '/api/admin.php',
                data: {
                    mode: "updateConfig",
                    name: name,
                    value: value
                },
                dataType: 'text',
                success: function(data) {
                    console.log(data)
                    data = JSON.parse(data);
                    if (data.code == 1) {
                        mdui.snackbar({
                            message: "数据更新成功！",
                            position: 'right-top'
                        });
                    } else {
                        mdui.snackbar({
                            message: data.msg,
                            position: 'right-top'
                        });
                    }
                    $("#submitbtn").attr("disabled", false);
                },
                error: function(data) {
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
</div>
<br /><br />
