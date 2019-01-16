Ext.define('Shopware.apps.Mailcatcher.view.list.Preview', {
    extend: 'Ext.container.Container',
    autoScroll: true,

    initComponent: function () {
        var me = this,
            items = [];

        if (me.record.raw.bodyHtml !== null) {
            items.push({
                xtype: 'container',
                title: 'Html',
                padding: 10,
                height: '100%',
                html: '<div style="margin: 15px">' + me.disableJavascript(me.record.raw.bodyHtml) + '</div>',
                disabled: me.record.raw.bodyHtml === null
            });
        }

        if (me.record.raw.bodyText !== null) {
            items.push({
                xtype: 'container',
                title: 'Text',
                padding: 10,
                height: '100%',
                html: '<div style="margin:15px"><pre>' + me.escapeHtml(me.record.raw.bodyText) + '</pre></div>',
                disabled: me.record.raw.bodyText === null
            });
        }

        items.push(Ext.create('Shopware.apps.Mailcatcher.view.list.Attachment', {
            mailId: me.record.raw.id
        }));

        me.items = {
            xtype: 'tabpanel',
            items: items
        };

        me.callParent(arguments);
    },
    
    //See https://stackoverflow.com/questions/1787322/htmlspecialchars-equivalent-in-javascript
    escapeHtml: function(text) {
        var map = {
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            '"': '&quot;',
            "'": '&#039;'
        };

        return text.replace(/[&<>"']/g, function(m) { return map[m]; });
    },

    disableJavascript: function (html) {
        return "<iframe src=\"data:text/html;base64," + btoa(html) + "\" height=\"100%\" width=\"100%\" sandbox></iframe>";
    }
});
