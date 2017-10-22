Ext.define('Shopware.apps.Mailcatcher.store.Attachment', {
    extend:'Ext.data.Store',
    model: 'Shopware.apps.Mailcatcher.model.Attachment',

    autoLoad: true,
    remoteSort: true,
    remoteFilter: true,

    proxy:{
        type:'ajax',

        url: '{url controller=Mailcatcher action=getAttachments}',

        reader:{
            type:'json',
            root:'data',
            totalProperty:'total'
        }
    }
});