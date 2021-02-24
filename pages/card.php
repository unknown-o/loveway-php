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

    document.getElementById('pjax-container').style = 'max-width: 400px;';
</script>

<?php
try {
    $pdo = pdoConnect();
    $stmt = $pdo->prepare("select * from loveway_data where id = ?");
    $stmt->bindValue(1, $cardID);
    if ($stmt->execute()) {
        $rows = $stmt->fetchAll();
        $row = $rows[0];
?>
        <div class="mdui-card mdui-hoverable" style="border-radius: 16px;">
            <div class="mdui-card-header">
                <img class="mdui-card-header-avatar" src="https://q1.qlogo.cn/g?b=qq&s=640&nk=<?php echo $row['contact']; ?>" />
                <div class="mdui-card-header-title"><?php echo $row['confessor']; ?></div>
                <div class="mdui-card-header-subtitle"><?php echo $row['time']; ?></div>
            </div>
            <div class="mdui-card-media">
                <?php
                if (!empty($row['image'])) {
                ?>
                    <img style="max-height: 1000px" onerror="randomImage()" src="<?php echo $row['image']; ?>" />
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
                <a class="copy mdui-btn mdui-btn-icon mdui-float-right" href="javascript:void(0);" data-clipboard-text="
                            <?php
                            echo get_http_type() . $_SERVER['SERVER_NAME'];
                            if ($REWRITE) {
                                echo "/card/" . $row['id'];
                            } else {
                                echo '/?page=card&id=' . $row['id'];
                            }
                            ?>
                            "><i class="mdui-icon material-icons">share</i></a>
                </a>
            </div>
        </div>

<?php
    } else {
        return 'database connection failed';
    }
} catch (Exception $e) {
    return 'database connection failed';
}
?>

<div id="background">
    <div class="bg-image" style="background: url('//img.llilii.cn/kagamine/p3/32639516_p2.jpg') no-repeat center center; display: block;"></div>
</div>
<script>
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