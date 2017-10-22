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
                html: '<div style="margin: 15px">' + me.record.raw.bodyHtml + '</div>',
                disabled: me.record.raw.bodyHtml === null
            });
        }

        if (me.record.raw.bodyText !== null) {
            items.push({
                xtype: 'container',
                title: 'Text',
                padding: 10,
                height: '100%',
                html: '<div style="margin:15px"><pre>' + me.record.raw.bodyText + '</pre></div>',
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
    }
});
