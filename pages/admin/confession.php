<?php
if ($templateMode) {
    include('./includes/header.php');
}
?>
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

<div class="mdui-typo">
    <h1 class="doc-chapter-title doc-chapter-title-first mdui-text-color-theme">表白管理</h1>
</div>
<br /><br />
<div class="mdui-table-fluid" style="border-radius: 16px">
    <table class="mdui-table">
        <thead>
            <tr>
                <th>表白标识符</th>
                <th>被点赞的次数</th>
                <th>可用操作</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $flag = true;
            try {
                $pdo = pdoConnect();
                $stmt = $pdo->prepare("select * from loveway_data ORDER BY time ASC");
                if ($stmt->execute()) {
                    while ($row = $stmt->fetch()) {
                        $flag = false;
            ?>
                        <tr id="id-<?php echo $row['id'] ?>">
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['favorite'] ?></td>
                            <td>
                                <a id="delete-<?php echo $row['id'] ?>" mdui-tooltip="{content: '删除此表白'}" class="mdui-color-theme-accent mdui-btn mdui-btn-icon mdui-text-color-white" onclick="deleteF('<?php echo $row['id'] ?>')"><i class="mdui-icon material-icons">delete</i></a>
                            </td>
                        </tr>
            <?php
                    }
                } else {
                    return 'database connection failed';
                }
            } catch (Exception $e) {
                return 'database connection failed';
                //echo $e->getMessage();
            }
            ?>
        </tbody>
    </table>
</div>

<script>
    function deleteF(id) {
        requestApi("admin", {
            mode: "delete",
            id: id
        }, false, true, true, "")
    }

    function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + "; " + expires;
    }
</script>