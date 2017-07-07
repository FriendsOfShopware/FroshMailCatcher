//{block name="backend/index/application" append}
    if(typeof(Notification) !== "undefined") {
        var catcherOptions = {
            lastMail: '{url controller=Mailcatcher action=lastMail}',
            getNewMails: '{url controller=Mailcatcher action=getNewMails}',
            currentMail: 0
        };

        Notification.requestPermission();

        Ext.Ajax.request({
            url: catcherOptions.lastMail,
            success: function(response){
                var obj = JSON.parse(response.responseText);
                catcherOptions.currentMail = obj.id;

                setInterval(function () {
                    Ext.Ajax.request({
                        url: catcherOptions.getNewMails,
                        params: {
                            id: catcherOptions.currentMail
                        },
                        success: function (response) {
                            var mailResponse = JSON.parse(response.responseText);

                            mailResponse.mails.forEach(function (mail) {
                                var title = "New mail to " + mail.receiverAddress;
                                var options = {
                                    body: mail.subject,
                                    tag: "MailCatcher"
                                };
                                var notification = new Notification(title, options);
                                notification.addEventListener('click', function() {
                                    Shopware.app.Application.addSubApplication({
                                        name: 'Shopware.apps.Mailcatcher',
                                        params: {
                                            id: mail.id
                                        }
                                    });
                                    window.focus();
                                    notification.close();
                                });

                                catcherOptions.currentMail = mail.id;
                            });
                        }
                    });

                }, 30000);
            }
        });
    }
//{/block}