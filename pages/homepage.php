<?php
if ($templateMode) {
    include('./includes/header.php');
}
?>
<script>
    function RandomNumBoth(Min, Max) {
        var Range = Max - Min;
        var Rand = Math.random();
        var num = Min + Math.round(Rand * Range);
        return num;
    }

    function randomImage() {
        var img = event.srcElement;
        img.onerror = null;
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            switch (xhr.readyState) {
                case 4:
                    if ((xhr.status >= 200 && xhr.status < 300) || xhr.status == 304) {
                        imgURL = 'https://img.llilii.cn/kagamine/' + JSON.parse(xhr.responseText)['file_name'][RandomNumBoth(0, JSON.parse(xhr.responseText)['file_num'])];
                        img.src = imgURL;
                    }
                    break;
            }
        }
        xhr.open('get', 'https://static.llilii.cn/json/img_list.json');
        xhr.send(null);
    }

    function like(id) {
        mdui.dialog({
            title: '请输入图片中的验证码',
            content: '<center><div class="mdui-row"> <div class="mdui-col-xs-9"> <div class="mdui-textfield"> <input class="mdui-textfield-input" id="vCode" type="text" placeholder="请输入您的答案" /></div> </div> <div class="mdui-col-xs-3"> <img style="position: relative;top:15px" id="vcode" src="/api/vcode.php" /> </div> </div></center>',
            modal: true,
            buttons: [{
                    text: '取消'
                },
                {
                    text: '确认',
                    onClick: function(inst) {
                        requestApi("favorite", {
                            id: id,
                            vCode: $("#vCode").val(),
                            timestamp: this.timestamp = Date.parse(new Date()) / 1000
                        }, false, true, true, "")
                    }
                }
            ]
        });
    }
</script>
<?php

$flag = true;
try {
    $pdo = pdoConnect();
    $stmt = $pdo->prepare("select * from loveway_data ORDER BY time DESC");
    if ($stmt->execute()) {
        while ($row = $stmt->fetch()) {
            $flag = false;
?>
            <br /><br />
            <div class="mdui-card mdui-hoverable" style="border-radius: 16px">
                <div class="mdui-card-header">
                    <img class="mdui-card-header-avatar" src="https://q1.qlogo.cn/g?b=qq&s=640&nk=<?php echo $row['contact']; ?>" />
                    <div class="mdui-card-header-title"><?php echo $row['confessor']; ?></div>
                    <div class="mdui-card-header-subtitle"><?php echo $row['time']; ?></div>
                </div>
                <div class="mdui-card-media">
                    <?php
                    if (!empty($row['image'])) {
                    ?>
                        <div v-if="data.image != ''">
                            <img style="max-height: 2000px" onerror="randomImage()" src="<?php echo $row['image']; ?>" />
                        </div>
                    <?php
                    } else {
                    ?>
                        <div class="mdui-divider"></div>
                    <?php } ?>
                </div>
                <div class="mdui-card-primary">
                    <div class="mdui-card-primary-title">To <?php echo $row['to_who']; ?></div>
                    <div class="mdui-card-primary-subtitle">
                        <?php echo $row['introduction']; ?>
                    </div>
                </div>
                <div class="mdui-card-content">
                    <?php echo $row['content']; ?>
                </div>
                <div class="mdui-card-actions">
                    <a class="copy mdui-btn mdui-btn-icon mdui-float-right" style="color:#4F4F4F" href="javascript:void(0);" data-clipboard-text="
                    <?php
                    echo get_http_type() . $_SERVER['SERVER_NAME'];
                    if ($REWRITE) {
                        echo "/article/" . $row['id'];
                    } else {
                        echo '/?page=article&id=' . $row['id'];
                    }
                    ?>"><i class="mdui-icon material-icons">share</i></a>
                    </a>
                    <div id="comment-<?php echo $row['id'] ?>" class="mdui-float-right mdui-card-primary-subtitle">
                        <?php echo count(json_decode($row['comment'])) ?>
                    </div>
                    <a target="_blank" style="color:#4F4F4F" href="
                    <?php
                    if ($REWRITE) {
                        echo "/card/" . $row['id'];
                    } else {
                        echo '/?page=card&id=' . $row['id'];
                    }
                    ?>" class="mdui-btn mdui-btn-icon mdui-float-right">
                        <i class="mdui-icon material-icons">comment</i>
                    </a>
                    <div id="like-<?php echo $row['id'] ?>" class="mdui-float-right mdui-card-primary-subtitle">
                        <?php echo $row['favorite'] ?>
                    </div>
                    <button style="color:#4F4F4F" class="mdui-btn mdui-btn-icon mdui-float-right" onclick="like('<?php echo $row['id'] ?>')">
                        <i class="mdui-icon material-icons">favorite</i>
                    </button>
                </div>
            </div>

    <?php
        }
    } else {
        return 'database connection failed';
    }
} catch (Exception $e) {
    return 'database connection failed';
    //echo $e->getMessage();
}
if ($flag) {
    ?>
    <br /><br />
    <div class="mdui-card mdui-hoverable" style="border-radius: 16px">
        <div class="mdui-card-media">
            <img style="max-height: 2000px" onerror="randomImage()" src="" />
        </div>
        <div class="mdui-card-primary">
            <div class="mdui-card-primary-title">啊噢！</div>
            <div class="mdui-card-primary-subtitle">这里还没有任何表白呢！</div>
        </div>
        <div class="mdui-card-content">
            快点击“去表白”去向喜欢的人表白吧！<br><br>
        </div>
    </div>
<?php
}
?>