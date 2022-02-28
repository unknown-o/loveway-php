<?php
if ($templateMode) {
    include('./includes/header.php');
}
?>
<br /><br />
<div class="mdui-card mdui-hoverable" style="border-radius: 16px">
    <div class="mdui-card-media">
        <img style="max-height: 1000px" src="https://img.llilii.cn/compression/vocaloid/kagamine/78688114_p0.png" />
    </div>
    <div class="mdui-card-primary">
        <div class="mdui-card-primary-title"><?php echo getInfo('more') ?></div>
        <div class="mdui-card-primary-subtitle">哇！终于等到你来看这个页面！</div>
    </div>
    <div class="mdui-card-content">
        <?php echo getInfo('more_content') ?>
    </div>
</div>
<br /><br />