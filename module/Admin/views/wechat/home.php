<?php echo $this->render('../common/_layout') ?>

<?php $this->beginBody(); ?>
<div class="container-fluid am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-9">
            <div class="page-header-heading"><span class="am-icon-home page-header-heading-icon"></span> 首页
                <small>Abuse Chan Home Page</small>
            </div>
            <p class="page-header-description">骂骂酱 一个能和你对骂的公众号</p>
        </div>
        <div class="am-u-lg-3 tpl-index-settings-button">
            <button type="button" class="page-header-button"><span class="am-icon-paint-brush"></span> 设置
            </button>
        </div>
    </div>

</div>

<div class="row-content am-cf">
    <div class="row  am-cf">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-4">
            <div class="widget am-cf">
                <div class="widget-head am-cf">
                    <div class="widget-title am-fl">月度财务收支计划</div>
                    <div class="widget-function am-fr">
                        <a href="javascript:;" class="am-icon-cog"></a>
                    </div>
                </div>
                <div class="widget-body am-fr">
                    <div class="am-fl">
                        <div class="widget-fluctuation-period-text">
                            ￥61746.45
                            <button class="widget-fluctuation-tpl-btn">
                                <i class="am-icon-calendar"></i>
                                更多月份
                            </button>
                        </div>
                    </div>
                    <div class="am-fr am-cf">
                        <div class="widget-fluctuation-description-amount text-success" am-cf>
                            +￥30420.56

                        </div>
                        <div class="widget-fluctuation-description-text am-text-right">
                            8月份收入
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="am-u-sm-12 am-u-md-6 am-u-lg-4">
            <div class="widget widget-primary am-cf">
                <div class="widget-statistic-header">
                    本季度利润
                </div>
                <div class="widget-statistic-body">
                    <div class="widget-statistic-value">
                        ￥27,294
                    </div>
                    <div class="widget-statistic-description">
                        本季度比去年多收入 <strong>2593元</strong> 人民币
                    </div>
                    <span class="widget-statistic-icon am-icon-credit-card-alt"></span>
                </div>
            </div>
        </div>
        <div class="am-u-sm-12 am-u-md-6 am-u-lg-4">
            <div class="widget widget-purple am-cf">
                <div class="widget-statistic-header">
                    本季度利润
                </div>
                <div class="widget-statistic-body">
                    <div class="widget-statistic-value">
                        ￥27,294
                    </div>
                    <div class="widget-statistic-description">
                        本季度比去年多收入 <strong>2593元</strong> 人民币
                    </div>
                    <span class="widget-statistic-icon am-icon-support"></span>
                </div>
            </div>
        </div>
    </div>

    <div class="row am-cf">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-4 widget-margin-bottom-lg">
            <div class="widget am-cf widget-body-lg">
                <div class="widget-head am-cf">
                    <div class="widget-title am-fl" id="serverTime">服务器已运行</div>
                    <div class="widget-function am-fr">
                        <a href="javascript:void(0);" onclick="getServerInfo(this)" class="am-icon-refresh am-icon-spin"></a>
                    </div>
                </div>
                <div class="widget-body widget-body-md am-fr">
                    <div class="am-progress-title">
                        <span id="CPU">CPU </span>
                        <span class="am-fr am-progress-title-more" id="CPUPer">0% / 100%</span>
                    </div>
                    <div class="am-progress">
                        <div class="am-progress-bar am-progress-bar-danger" id="CPUStyle"
                             style="width: 1%"></div>
                    </div>

                    <div class="am-progress-title">
                        <span id="disk">硬盘 0%</span>
                        <span class="am-fr am-progress-title-more" id="diskPer">已用:0
                            G/0G 可用:0G</span>
                    </div>
                    <div class="am-progress">
                        <div class="am-progress-bar  am-progress-bar-warning" id="diskStyle"
                             style="width: 1%"></div>
                    </div>

                    <div class="am-progress-title">
                        <span id="memory">内存 0%</span>
                        <span class="am-fr am-progress-title-more"
                              id="memoryPer">0
                            M / 0M</span>
                    </div>
                    <div class="am-progress">
                        <div class="am-progress-bar" id="memoryStyle" style="width: 1%"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="am-u-sm-12 am-u-md-12 am-u-lg-8 widget-margin-bottom-lg">

            <div class="widget am-cf widget-body-lg">

                <div class="widget-body  am-fr">
                    <div class="am-scrollable-horizontal ">
                        <table width="100%" class="am-table am-table-compact am-text-nowrap tpl-table-black "
                               id="example-r">
                            <thead>
                            <tr>
                                <th>文章标题</th>
                                <th>作者</th>
                                <th>时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="gradeX">
                                <td>新加坡大数据初创公司 Latize 获 150 万美元风险融资</td>
                                <td>张鹏飞</td>
                                <td>2016-09-26</td>
                                <td>
                                    <div class="tpl-table-black-operation">
                                        <a href="javascript:;">
                                            <i class="am-icon-pencil"></i> 编辑
                                        </a>
                                        <a href="javascript:;" class="tpl-table-black-operation-del">
                                            <i class="am-icon-trash"></i> 删除
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr class="even gradeC">
                                <td>自拍的“政治角色”：观众背对希拉里自拍合影表示“支持”</td>
                                <td>天纵之人</td>
                                <td>2016-09-26</td>
                                <td>
                                    <div class="tpl-table-black-operation">
                                        <a href="javascript:;">
                                            <i class="am-icon-pencil"></i> 编辑
                                        </a>
                                        <a href="javascript:;" class="tpl-table-black-operation-del">
                                            <i class="am-icon-trash"></i> 删除
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr class="gradeX">
                                <td>关于创新管理，我想和你当面聊聊。</td>
                                <td>王宽师</td>
                                <td>2016-09-26</td>
                                <td>
                                    <div class="tpl-table-black-operation">
                                        <a href="javascript:;">
                                            <i class="am-icon-pencil"></i> 编辑
                                        </a>
                                        <a href="javascript:;" class="tpl-table-black-operation-del">
                                            <i class="am-icon-trash"></i> 删除
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr class="even gradeC">
                                <td>究竟是趋势带动投资，还是投资引领趋势？</td>
                                <td>着迷</td>
                                <td>2016-09-26</td>
                                <td>
                                    <div class="tpl-table-black-operation">
                                        <a href="javascript:;">
                                            <i class="am-icon-pencil"></i> 编辑
                                        </a>
                                        <a href="javascript:;" class="tpl-table-black-operation-del">
                                            <i class="am-icon-trash"></i> 删除
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr class="even gradeC">
                                <td>Docker领域再添一员，网易云发布“蜂巢”，加入云计算之争</td>
                                <td>醉里挑灯看键</td>
                                <td>2016-09-26</td>
                                <td>
                                    <div class="tpl-table-black-operation">
                                        <a href="javascript:;">
                                            <i class="am-icon-pencil"></i> 编辑
                                        </a>
                                        <a href="javascript:;" class="tpl-table-black-operation-del">
                                            <i class="am-icon-trash"></i> 删除
                                        </a>
                                    </div>
                                </td>
                            </tr>


                            <!-- more data -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?php $this->endBody() ?>

<script>
    $(function () {
        //进入页面第一次获取服务器信息
        $.ajax({
            url: "<?= \yii\helpers\Url::to(array('get-cpu-ajax')) ?>",
            type: "POST",
            data: {},
            timeout: 30000,
            dataType: "json",
            success: function (data) {
                if (data.status == 1000) {
                    $("#memory").text('内存 ' + data.data.memory.percent + '%');
                    $("#memoryPer").text(data.data.memory.usedphymem + 'M / ' + data.data.memory.totalphymem + 'M');
                    $("#memoryStyle").css('width', data.data.memory.percent + '%');

                    $("#disk").text('硬盘 ' + data.data.disk.percent + '%');
                    $("#diskPer").text('已用:' + data.data.disk.diskUsed + 'G/' + data.data.disk.diskSum + 'G 可用:' + data.data.disk.diskFree + 'G');
                    $("#diskStyle").css('width', data.data.disk.percent + '%');

                    $("#CPUPer").text(data.data.CPU + '%');
                    $("#CPUStyle").css('width', data.data.CPU + '%');

                    $("#serverTime").text('服务器已运行' + data.data.time.formatTime);
                }

                $("#serverTime").next().children("a").removeClass('am-icon-spin');
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                myAlert('暂时获取不到服务器信息了呢');
                $("#serverTime").next().children("a").removeClass('am-icon-spin');
            }
        });

    })
    
    function getServerInfo(obj) {
        //爱的魔力转圈圈
        $(obj).addClass('am-icon-spin');

        $.ajax({
            url: "<?= \yii\helpers\Url::to(array('get-cpu-ajax')) ?>",
            type: "POST",
            data: {},
            timeout: 30000,
            dataType: "json",
            success: function (data) {
                if (data.status == 1000) {
                    $("#memory").text('内存 ' + data.data.memory.percent + '%');
                    $("#memoryPer").text(data.data.memory.usedphymem + 'M / ' + data.data.memory.totalphymem + 'M');
                    $("#memoryStyle").css('width', data.data.memory.percent + '%');

                    $("#disk").text('硬盘 ' + data.data.disk.percent + '%');
                    $("#diskPer").text('已用:' + data.data.disk.diskUsed + 'G/' + data.data.disk.diskSum + 'G 可用:' + data.data.disk.diskFree + 'G');
                    $("#diskStyle").css('width', data.data.disk.percent + '%');

                    $("#CPUPer").text(data.data.CPU + '%');
                    $("#CPUStyle").css('width', data.data.CPU + '%');

                    $("#serverTime").text('服务器已运行' + data.data.time.formatTime);
                }else {
                    myAlert('暂时获取不到服务器信息了呢');
                }

                $("#serverTime").next().children("a").removeClass('am-icon-spin'); //停止转圈圈
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                myAlert('暂时获取不到服务器信息了呢');
                $("#serverTime").next().children("a").removeClass('am-icon-spin'); //停止转圈圈
            }
        });
    }
</script>

<?php $this->endPage() ?>

