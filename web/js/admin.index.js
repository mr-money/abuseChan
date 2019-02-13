$(function() {
    var tabCounter = 0;
    var $tab = $('#admin-doc-tab');
    var $nav = $tab.find('.am-tabs-nav');
    var $bd = $tab.find('.am-tabs-bd');

    function addTab() {
        var nav = '<li><span class="am-icon-close"></span>' +
            '<a href="javascript: void(0)">标签 ' + tabCounter + '</a></li>';
        var content = '<div class="am-tab-panel">动态插入的标签内容' + tabCounter + '</div>';

        $nav.append(nav);
        $bd.append(content);
        tabCounter++;
        $tab.tabs('refresh');
    }

    // 动态添加标签页
    $('.js-append-tab').on('click', function() {
        addTab();
    });

    // 移除标签页
    $nav.on('click', '.am-icon-close', function() {
        var $item = $(this).closest('li');
        var index = $nav.children('li').index($item);

        $item.remove();
        $bd.find('.am-tab-panel').eq(index).remove();

        $tab.tabs('open', index > 0 ? index - 1 : index + 1);
        $tab.tabs('refresh');
    });
});