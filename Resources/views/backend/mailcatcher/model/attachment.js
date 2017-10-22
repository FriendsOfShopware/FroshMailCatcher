Ext.define('Shopware.apps.Mailcatcher.model.Attachment', {
    extend: 'Ext.data.Model',

    fields: [
        {
            name: 'id',
            type: 'integer'
        },
        {
            name: 'fileName',
            type: 'string'
        }
    ]
});