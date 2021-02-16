<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>吴先森的小站</title>
    <link rel="stylesheet" href="//static.llilii.cn/css/other/background.css" />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/mdui@1.0.0/dist/css/mdui.min.css" />
    <style>
        a {
            color: white;
            text-decoration: none;
        }
    </style>
    <audio src="<?php echo getInfo('audio') ?>" autoplay>
        您的浏览器不支持 audio 标签。
    </audio>
</head>
<div class="mdui-container" style="max-width: 400px; ">
    <br><br><br><br>

    <body>
        <?php
        try {
            $pdo = pdoConnect();
            $stmt = $pdo->prepare("select * from loveway_data where id = ?");
            $stmt->bindValue(1, $_GET['id']);
            if ($stmt->execute()) {
                $rows = $stmt->fetchAll();
                $row = $rows[0];
        ?>
                <br /><br />
                <div class="mdui-card mdui-hoverable" style="border-radius: 16px">
                    <!-- 卡片头部，包含头像、标题、副标题 -->
                    <div class="mdui-card-header">
                        <img class="mdui-card-header-avatar" src="https://q1.qlogo.cn/g?b=qq&s=640&nk=<?php echo $row['contact']; ?>" />
                        <div class="mdui-card-header-title"><?php echo $row['confessor']; ?></div>
                        <div class="mdui-card-header-subtitle"><?php echo $row['time']; ?></div>
                    </div>

                    <!-- 卡片的媒体内容，可以包含图片、视频等媒体内容，以及标题、副标题 -->
                    <div class="mdui-card-media">
                        <?php
                        if (!empty($row['image'])) {
                        ?>
                            <img style="max-height: 1000px" onerror="randomImage(data.image)" src="<?php echo $row['image']; ?>" />
                        <?php
                        } else {
                        ?>
                            <div class="mdui-divider"></div>
                        <?php } ?>
                    </div>



                    <!-- 卡片的标题和副标题 -->
                    <div class="mdui-card-primary">
                        <div class="mdui-card-primary-title">To <?php echo $row['to_who']; ?></div>
                        <div class="mdui-card-primary-subtitle">
                            <?php echo $row['introduction']; ?>
                        </div>
                    </div>

                    <!-- 卡片的内容 -->
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
            //echo $e->getMessage();
        }
        ?>
</div>

<div id="background">
    <div class="bg-image" style="background: url('//img.llilii.cn/kagamine/p3/32639516_p2.jpg') no-repeat center center; display: block;"></div>
</div>
<script src="//cdn.jsdelivr.net/npm/mdui@1.0.0/dist/js/mdui.min.js"></script>
<script src="https://static.llilii.cn/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://static.llilii.cn/libs/clipboard/clipboard.min.js"></script>
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
</body>

</html>