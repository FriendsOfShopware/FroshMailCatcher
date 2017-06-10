Ext.define('Shopware.apps.Mailcatcher.view.list.Window', {
    extend: 'Enlight.app.Window',
    title : 'Mailcatcher',
    layout: {
        type: 'hbox',
        pack: 'start',
        align: 'stretch'
    },
    width: 1200,

    initComponent: function () {
        var me = this;

        me.items = [
            Ext.create('Shopware.apps.Mailcatcher.view.list.Mailgrid', {
                flex: 1
            }),
            Ext.create('Ext.container.Container', {
                layout: 'fit',
                itemId: 'mail-container',
                flex: 2
            })
        ];

        me.callParent(arguments);
    }
});