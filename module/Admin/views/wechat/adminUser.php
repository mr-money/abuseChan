<?php
echo $this->render('../common/_layout');

\app\assets\AppAsset::addJs($this,Yii::$app->request->baseUrl."/js/jquery.Jcrop.js");
\app\assets\AppAsset::addJs($this,Yii::$app->request->baseUrl."/js/script.js");

\app\assets\AppAsset::addCss($this,Yii::$app->request->baseUrl."/css/jquery.Jcrop.css");

?>

<?php $this->beginBody(); ?>
<div class="container-fluid am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-9">
            <div class="page-header-heading"><span class="am-icon-user page-header-heading-icon"></span> 账号设置
                <small>Admin Account Settings</small>
            </div>
            <p class="page-header-description">骂骂酱 一个能和你对骂的公众号</p>
        </div>
        <div class="am-u-lg-2 tpl-index-settings-button">
            <button type="button" class="page-header-button am-radius" onclick="refreshIframe()"><span
                        class="am-icon-refresh"></span>
            </button>
        </div>
    </div>

</div>
<div class="row-content am-cf">
    <div class="row am-cf">

        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <!--                <div class="widget-head am-cf">
                                    <div class="widget-title am-fl">边框表单</div>
                                    <div class="widget-function am-fr">
                                        <a href="javascript:;" class="am-icon-cog"></a>
                                    </div>
                                </div>-->
                <div class="widget-body am-fr">

                    <form class="am-form tpl-form-border-form tpl-form-border-br" id="form">
                        <div class="am-form-group">
                            <label for="nickname" class="am-u-sm-3 am-form-label">昵称 <span
                                        class="tpl-form-line-small-title">nickname</span></label>
                            <div class="am-u-sm-9">
                                <input type="text" class="tpl-form-input" id="nickname" name="nickname" placeholder="请输入昵称"
                                       value="<?= $admin['nickname'] ?>">
                                <!--                                <small>请填写标题文字10-20字左右。</small>-->
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="telphone" class="am-u-sm-3 am-form-label">手机号 <span
                                        class="tpl-form-line-small-title">telphone</span></label>
                            <div class="am-u-sm-9">
                                <input type="text" class="tpl-form-input" id="telphone" name="telphone" placeholder="请输入手机号"
                                       value="<?= $admin['telphone'] ?>">
                                <!--<small>请填写标题文字10-20字左右。</small>-->
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="user-weibo" class="am-u-sm-3 am-form-label">头像 <span
                                        class="tpl-form-line-small-title">Images</span></label>
                            <div class="am-u-sm-9">
                                <div class="am-form-group am-form-file">
                                    <div class="tpl-form-file-img">
                                        <img src="<?= $admin['avatar'] ?>" alt="" id="avatarView">
                                    </div>
                                    <button type="button" class="am-btn am-btn-warning am-btn-sm">
                                        <i class="am-icon-cloud-upload"></i> 上传头像
                                    </button>
                                    <input id="avatar" type="file" multiple="" name="avatar" onchange="fileSelectHandler('avatar','avatarView')">
                                    <p class="error"><small>此头像仅能上传一次,如需修改,请刷新页面。如不想修改,你们特么来打我啊</small></p>

                                    <input type="hidden" id="x1" name="x1"autocomplete="off" />
                                    <input type="hidden" id="y1" name="y1" autocomplete="off"/>
                                    <input type="hidden" id="x2" name="x2"autocomplete="off" />
                                    <input type="hidden" id="y2" name="y2"autocomplete="off" />
                                </div>

                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="realname" class="am-u-sm-3 am-form-label">真实姓名 <span
                                        class="tpl-form-line-small-title">telphone</span></label>
                            <div class="am-u-sm-9">
                                <input type="text" class="tpl-form-input" id="realname" name="realname" placeholder="请输入真实姓名"
                                       value="<?= $admin['realname'] ?>">
                                <!--<small>请填写标题文字10-20字左右。</small>-->
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="realname" class="am-u-sm-3 am-form-label">密码 <span
                                        class="tpl-form-line-small-title">password</span></label>
                            <div class="am-u-sm-9">
                                <button type="button" class="am-btn am-btn-danger am-radius am-btn-block am-btn-sm" style="width: 12%">修改密码</button>
                                <small>点击修改密码。</small>
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="backup" class="am-u-sm-3 am-form-label">用户详情</label>
                            <div class="am-u-sm-9">
                                <textarea class="" rows="10" id="backup" name="backup" placeholder="请输入内容"></textarea>
                            </div>
                        </div>

                        <div class="am-form-group">
                            <div class="am-u-sm-9 am-u-sm-push-3">
                                <button type="button" class="am-btn am-btn-primary tpl-btn-bg-color-success" id="submit">提交
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->endBody() ?>

<script>
    $("#submit").click(function () {
        var form = new FormData($("#form")[0]); //实例化form表单
        form.append('avatar', $("#avatar")[0]); //添加文件

        $.ajax({
            url: "<?= yii\helpers\Url::to(['save-admin-ajax']) ?>",
            type: "POST",
            data: form,
            dataType: "json",
            processData:false,
            contentType:false,
            success: function (data) {
                console.log(data);
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
            }
        });
    })
</script>

<?php $this->endPage() ?>

