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
            <textarea id="qq" class="mdui-textfield-input" placeholder="未知表白墙"></textarea>
        </div>
        <div class="mdui-textfield">
            <label class="mdui-textfield-label">SEO关键词</label>
            <textarea id="name" class="mdui-textfield-input" placeholder="未知表白墙,表白墙"></textarea>
        </div>
        <div class="mdui-textfield">
            <label class="mdui-textfield-label">SEO简介</label>
            <textarea id="taName" class="mdui-textfield-input" placeholder="一条咸鱼使用MDUI开发的一款表白墙（不会告诉你开发动力是双子，23333）"></textarea>
        </div>
        <div class="mdui-textfield">
            <label class="mdui-textfield-label">网站音频</label>
            <textarea id="image" class="mdui-textfield-input" placeholder="https://static.llilii.cn/music/OYBO1IgowMLqw1wv.mp3"></textarea>
        </div>
        <div class="mdui-textfield">
            <label class="mdui-textfield-label">自定义页面标题（本站右侧应用栏的第三个列表）</label>
            <textarea id="introduceTA" class="mdui-textfield-input" placeholder="更多功能"></textarea>
        </div>
        <div class="mdui-textfield">
            <label class="mdui-textfield-label">自定义页面（请使用html格式、本站右侧应用栏的第三个列表）</label>
            <textarea id="toTA" class="mdui-textfield-input" rows="4" placeholder="其实....开发这个表白墙的初衷...<br>其实是主要是为了让更多人知道镜音双子，233<br>（你应该发现了整个表白墙的图片都是镜音连和镜音铃的，且这些图片都没有更换的设置，2333，要你手动改代码<br>虽然现在镜音双子基本上活成了小透明，连B站某些V家爱好者自己办的节目，都一首双子的歌都没有（虽然其他一些不知名虚拟歌姬好像也没有的也没有），5555555，只有双子和初音、GUMI的绘师作品集<br>另外吐槽一下B站，把VTB和虚拟歌姬混为一谈，有些VTB还自称“虚拟歌姬”，真的是...无语了，真的想回到那个有一首初音或其他虚拟歌姬的歌就能全站沸腾的局面了<br>现在甚至希望B站不要破圈，不要引入那些乱七八糟的流量明星进来（虽然叔叔我呀，最讨厌不能赚钱的东西了）<br>"></textarea>
        </div>
        <div class="mdui-textfield">
            <label class="mdui-textfield-label">关于本站页面（请使用html格式）</label>
            <textarea id="toTA" class="mdui-textfield-input" rows="4" placeholder="欢迎来到由吴先森开发的表白墙！<br />本站使用MDUI开发<br /><br />另外...说一下本表白墙的服务条款吧...<br />1.发言请遵守当地法律法规和学校规章制度，吴先森的表白墙保留对于发布不良信息和人身攻击的自然人追究法律责任的权利。<br />2.如发现有消息对个人生活产生困扰或想要获取告白者的联系方式，请联系网站管理员。<br />3.让我当大号电灯泡和吃点狗粮吧，23333333333"></textarea>
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
            $("#submitbtn").attr("disabled", true);
            var contact = $("#qq").val();
            var name = $("#name").val();
            var taName = $("#taName").val();
            var image = $("#image").val();
            var introduceTA = $("#introduceTA").val();
            var toTA = $("#toTA").val();
            var timestamp = this.timestamp = Date.parse(new Date()) / 1000;
            var key = $.md5(
                'Kagamine Yes!' +
                contact +
                name +
                taName +
                image +
                introduceTA +
                toTA +
                timestamp)
            $.ajax({
                type: 'post',
                url: '/api/submit.php',
                data: {
                    key: key,
                    timestamp: timestamp,
                    contact: contact,
                    name: name,
                    taName: taName,
                    image: image,
                    introduceTA: introduceTA,
                    toTA: toTA
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