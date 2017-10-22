Ext.define('Shopware.apps.Mailcatcher', {
    extend: 'Enlight.app.SubApplication',

    name:'Shopware.apps.Mailcatcher',

    loadPath: '{url action=load}',
    bulkLoad: true,

    controllers: [ 'Main' ],

    views: [
        'list.Mailgrid',
        'list.Preview',
        'list.Window'
    ],

    models: [ 'Mails', 'Attachment' ],
    stores: [ 'Mails', 'Attachment' ],

    launch: function() {
        return this.getController('Main').mainWindow;
    }
});