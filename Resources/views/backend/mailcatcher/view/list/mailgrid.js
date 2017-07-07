Ext.define('Shopware.apps.Mailcatcher.view.list.Mailgrid', {
    extend: 'Ext.grid.Panel',

    initComponent: function () {
        var me = this;

        me.store = Ext.create('Shopware.apps.Mailcatcher.store.Mails');

        if (me.showId) {
            me.store.on('load', function () {
                me.store.each(function (record) {
                    if (parseInt(record.get('id')) === parseInt(me.showId)) {
                        me.onClickMail(record);
                    }
                })
            });
        }

        me.columns = [
            {
                text: 'Send-Date',
                dataIndex: 'created',
                flex: 1,
                renderer: function (value, metaData, record) {
                    if (value === Ext.undefined) {
                        return value;
                    }

                    return Ext.util.Format.date(value) + ' ' + Ext.util.Format.date(value, timeFormat);
                }
            },
            {
                text: 'To',
                dataIndex: 'receiverAddress',
                flex: 1
            },
            {
                text: 'Subject',
                dataIndex: 'subject',
                flex: 1.5
            },
            Ext.create('Ext.grid.column.Action', {
                width: 30,
                items: [
                    {
                        iconCls: 'sprite-minus-circle-frame',
                        tooltip: 'Delete',
                        handler: function (view, rowIndex, colIndex, item) {
                            var store = view.getStore(),
                                record = store.getAt(rowIndex);
                            store.remove(record);
                            record.destroy();
                        }
                    }
                ]
            })
        ];

        me.pagingbar = me.getPagingBar();
        me.dockedItems = [me.pagingbar];

        me.callParent(arguments);

        me.on('select', function (grid, record) {
            me.onClickMail(record);
        })
    },

    onClickMail: function (record) {
        var me = this;
        var container = me.up('window').down('[itemId="mail-container"]');
        container.removeAll();

        container.add(Ext.create('Shopware.apps.Mailcatcher.view.list.Preview', {
            record: record
        }));
    },


    getPagingBar: function () {
        var me = this;

        return Ext.create('Ext.toolbar.Paging', {
            store: me.store,
            dock: 'bottom',
            displayInfo: true
        });

    },
});