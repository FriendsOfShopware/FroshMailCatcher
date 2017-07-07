Ext.define('Shopware.apps.Mailcatcher.store.Mails', {
    extend:'Ext.data.Store',
    model: 'Shopware.apps.Mailcatcher.model.Mails',

    autoLoad: true,
    remoteSort: true,
    remoteFilter: true,

    sorters: [{
        property: 'created',
        direction: 'DESC'
    }],

    proxy:{
        type:'ajax',

        url: '{url controller=Mailcatcher action=list}',

        reader:{
            type:'json',
            root:'data',
            totalProperty:'total'
        }
    }
});