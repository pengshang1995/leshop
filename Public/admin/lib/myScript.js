/**
 * 自定义js
 */
/**
 * 提交表单并根据后台返回的ajaxmessage数据显示弹窗
 * @param formName
 */
function ajaxFormSubmit(formName) {
    var ajax_option = {
        success: function (data) {
            layer.msg(data.message, {
                icon: data.icon,
                time: 2000
            }, function () {
                if (data.icon == 1) {
                    parent.location.reload();
                }
            });
        }
    };
    $('#' + formName).ajaxSubmit(ajax_option);
}
/**
 * ajax提交刷新当前串口
 * @param formName
 */
function ajaxFormSubmitLocationReload(formName) {
    var ajax_option = {
        success: function (data) {
            layer.msg(data.message, {
                icon: data.icon,
                time: 2000
            }, function () {
                if (data.icon == 1) {
                    location.reload();
                }
            });
        }
    };
    $('#' + formName).ajaxSubmit(ajax_option);
}
/**
 * 弹出layer确认窗口删除操作
 * @param url
 */
function ajaxDelSubmit(url) {
    layer.open({
        content: '确认删除？',
        yes: function (index, layero) {
            $.ajax({
                type: "GET",
                url: url,
                success: function (data) {
                    layer.close(index);
                    layer.msg(data.message, {
                        icon: data.icon,
                        time: 2000
                    })
                }
            });
        },
        end:function () {
            setInterval(reLoad,2000);
        }
    });
}
/**
 * 弹出layer确认窗口删除操作
 * @param url
 */
function ajaxDelSubmitLocationReload(url) {
    layer.open({
        content: '确认删除？',
        yes: function (index, layero) {
            $.ajax({
                type: "GET",
                url: url,
                success: function (data) {
                    layer.close(index);
                    layer.msg(data.message, {
                        icon: data.icon,
                        time: 2000
                    })
                }
            });
        },
        end:function () {
            setInterval(locationReLoad,2000);
        }
    });
}
/**
 * 弹出layer确认窗口停用操作
 * @param url
 */
function ajaxStop(url) {
    layer.open({
        content: '确认停用？',
        yes: function (index, layero) {
            $.ajax({
                type: "GET",
                url: url,
                success: function (data) {
                    layer.close(index);
                    layer.msg(data.message, {
                        icon: data.icon,
                        time: 2000
                    })
                }
            });
        },
        end:function () {
            setInterval(locationReLoad,2000);
        }
    });
}/**
 * 弹出layer确认窗口启用操作
 * @param url
 */
function ajaxStart(url) {
    layer.open({
        content: '确认启用？',
        yes: function (index, layero) {
            $.ajax({
                type: "GET",
                url: url,
                success: function (data) {
                    layer.close(index);
                    layer.msg(data.message, {
                        icon: data.icon,
                        time: 2000
                    })
                }
            });
        },
        end:function () {
            setInterval(locationReLoad,2000);
        }
    });
}
/**
 * 重新加载
 */
function reLoad() {
    parent.location.reload()
}
/**
 * 重新加载
 */
function locationReLoad() {
    location.reload()
}