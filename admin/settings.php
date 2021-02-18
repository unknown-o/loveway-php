<?php
include('../config.php');
include('../includes/function.php');
include('../includes/header.php');
?>
<br /><br />
<div class="mdui-card mdui-hoverable" style="border-radius: 16px">
    <div class="mdui-card-primary">
        <div class="mdui-card-primary-title">表白墙设置</div>
        <div class="mdui-card-primary-subtitle">此处可以设置您的表白墙！</div>
    </div>
    <div class="mdui-divider"></div>
    <div class="mdui-card-content">
        <div class="mdui-textfield">
            <label class="mdui-textfield-label">表白墙标题</label>
            <textarea id="title" class="mdui-textfield-input" placeholder="<?php echo getInfo('title') ?>"></textarea>
        </div>
        <div class="mdui-textfield">
            <label class="mdui-textfield-label">SEO关键词</label>
            <textarea id="keywords" class="mdui-textfield-input" placeholder="<?php echo getInfo('keywords') ?>"></textarea>
        </div>
        <div class="mdui-textfield">
            <label class="mdui-textfield-label">SEO简介</label>
            <textarea id="description" class="mdui-textfield-input" placeholder="<?php echo getInfo('description') ?>"></textarea>
        </div>
        <div class="mdui-textfield">
            <label class="mdui-textfield-label">网站音频</label>
            <textarea id="audio" class="mdui-textfield-input" placeholder="<?php echo getInfo('audio') ?>"></textarea>
        </div>
        <div class="mdui-textfield">
            <label class="mdui-textfield-label">自定义页面标题（本站右侧应用栏的第三个列表）</label>
            <textarea id="more" class="mdui-textfield-input" placeholder="<?php echo getInfo('more') ?>"></textarea>
        </div>
        <div class="mdui-textfield">
            <label class="mdui-textfield-label">自定义页面（请使用html格式、本站右侧应用栏的第三个列表）</label>
            <textarea id="more_content" class="mdui-textfield-input" rows="4" placeholder="<?php echo getInfo('more_content') ?>"></textarea>
        </div>
        <div class="mdui-textfield">
            <label class="mdui-textfield-label">关于本站页面（请使用html格式）</label>
            <textarea id="about_content" class="mdui-textfield-input" rows="4" placeholder="<?php echo getInfo('about_content') ?>"></textarea>
        </div>
        <br>
        <div class="mdui-card-primary-subtitle">如果要修改表白墙表白内容，请直接去数据库修改，真的懒得写管理、删除表白内容了（老咸鱼了）</div>
        <div class="mdui-card-primary-subtitle">用户群：608265912（注意，这不是我建立的群。这是我借别人的用户群。所以...有些时候可能不能解决您提出的问题，如果是配置问题，可以在此群提问，如果是程序bug等问题，建议通过我的邮箱与我联系！）；我的邮箱：i@mr-wu.top(推荐使用邮箱与我联系)</div>
    </div>

    <div class="mdui-card-actions">
        <button id="submitbtn" class="mdui-btn mdui-color-theme-accent mdui-ripple mdui-float-right" onclick="submit()">
            发射！
        </button>
    </div>
    <script>
        function submit() {
            configArr = ['title', 'keywords', 'description', 'audio', 'more', 'more_content', 'about_content'];
            for (let i = 0; i < configArr.length; i++) {

                if ($("#" + configArr[i]).val() != "") {
                    value=$("#" + configArr[i]).val();
                    request(configArr[i],value);
            }
        }

        }

        function request(name,value) {
            $("#submitbtn").attr("disabled", true);
            $.ajax({
                type: 'post',
                url: '/api/admin.php',
                data: {
                    name: name,
                    value: value
                },
                dataType: 'text',
                success: function(data) {
                    console.log(data)
                    data = JSON.parse(data);
                    if (data.code == 1) {
                        mdui.snackbar({
                            message: '提交成功！',
                            position: 'right-top'
                        });
                        $("#qq").val("");
                        $("#name").val("");
                        $("#taName").val("");
                        $("#image").val("");
                        $("#introduceTA").val("");
                        $("#toTA").val("");
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
                        Swal.fire({
                            type: 'error',
                            title: '错误',
                            text: value,
                        })
                    });
                },
            });
        }
    </script>
</div>
<br /><br />
<?php
include('../includes/footer.php');
?>