Ext.define('Shopware.apps.Mailcatcher.view.list.Attachment', {
    extend: 'Ext.grid.Panel',
    title: 'Attachments',
    height: '100%',
    layout: 'fit',

    initComponent: function () {
        var me = this;

        me.store = Ext.create('Shopware.apps.Mailcatcher.store.Attachment');
        me.store.getProxy().extraParams.mailId = me.mailId;

        me.store.on('load', function () {
            me.setTitle('Attachments (' + me.store.count().toString() + ')');
        });

        me.columns = [
            {
                text: 'Name',
                dataIndex: 'fileName',
                flex: 1
            },
            Ext.create('Ext.grid.column.Action', {
                width: 30,
                items: [
                    {
                        iconCls: 'sprite-drive-download',
                        tooltip: 'Download',
                        handler: function (view, rowIndex, colIndex, item) {
                            var store = view.getStore(),
                                record = store.getAt(rowIndex);

                            window.open('{url action=downloadAttachment}?id=' + record.get('id'));
                        }
                    }
                ]
            })
        ];

        me.callParent(arguments);
    }
});