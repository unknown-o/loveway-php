<br /><br />
<div class="mdui-card mdui-hoverable" style="border-radius: 16px">
    <div class="mdui-card-primary">
        <div class="mdui-card-primary-title">立即表白</div>
        <div class="mdui-card-primary-subtitle">快向你喜欢的TA表白吧！</div>
    </div>
    <div class="mdui-divider"></div>
    <div class="mdui-card-content">
        <div class="mdui-textfield">
            <label class="mdui-textfield-label">你的QQ</label>
            <textarea id="qq" class="mdui-textfield-input" placeholder="2333333333"></textarea>
        </div>
        <div class="mdui-textfield">
            <label class="mdui-textfield-label">你的名字</label>
            <textarea id="name" class="mdui-textfield-input" placeholder="镜音连"></textarea>
        </div>
        <div class="mdui-textfield">
            <label class="mdui-textfield-label">TA的名字</label>
            <textarea id="taName" class="mdui-textfield-input" placeholder="镜音铃"></textarea>
        </div>
        <div class="mdui-textfield">
            <label class="mdui-textfield-label">表白配图（可选）</label>
            <textarea id="image" class="mdui-textfield-input" placeholder="https://kagamine.top/img.png"></textarea>
        </div>
        <div class="mdui-textfield">
            <label class="mdui-textfield-label">一句话介绍一下TA</label>
            <textarea id="introduceTA" class="mdui-textfield-input" placeholder="镜音铃是一个元气的二次元少女"></textarea>
        </div>
        <div class="mdui-textfield">
            <label class="mdui-textfield-label">你要对TA说的话</label>
            <textarea id="toTA" class="mdui-textfield-input" rows="4" placeholder="我喜欢你..."></textarea>
        </div>
    </div>

    <div class="mdui-card-actions">
        <button :disabled="isdisabledFn" class="mdui-btn mdui-color-theme-accent mdui-ripple mdui-float-right" onclick="submit()">
            发射！
        </button>
    </div>
    <script>
        function submit() {
            var contact = $("#qq").val();
            var name = $("#name").val();
            var taName = $("#taName").val();
            var image = $("#image").val();
            var introduceTA = $("#introduceTA").val();
            var toTA = $("#toTA").val();
            $.ajax({
                type: 'post',
                url: 'create',
                data: {
                    contact: contact,
                    name: name,
                    taName: taName,
                    image: image,
                    introduceTA: introduceTA,
                    toTA: toTA
                },
                dataType: 'text',
                success: function(data) {
                    if (data == 1) {
                        Swal.fire({
                            type: 'success',
                            title: '成功',
                            text: '工单提交完毕！请在工单列表查看，并耐心等待客服回复',
                        }).then((result) => {
                            if (result.value) {
                                window.location.reload();
                            }
                        })
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