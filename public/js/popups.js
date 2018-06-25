var popups = {
    // 错误弹出层
    error: function(message) {
        layer.open({
            content:message,
            icon:2,
            title : '错误提示',
            anim:5,
            offset: ['280px']
        });
    },

    //成功弹出层
    success : function(message,url) {
        layer.open({
            content : message,
            icon : 1,
            yes : function(){
                location.href=url;
            },
            offset: ['280px'],
            anim:4
        });
    },

    // 确认弹出层
    confirm : function(message, url) {
        layer.open({
            content : message,
            icon:3,
            btn : ['是','否'],
            yes : function(){
                location.href=url;
            },
            offset: ['280px']
        });
    },

    //无需跳转到指定页面的确认弹出层
    isok : function(message) {
        layer.open({
            content : message,
            icon : 1,
            offset: ['280px'],
            anim:4
        });
    }
}

