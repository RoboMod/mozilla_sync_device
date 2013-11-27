$(document).ready(function(){
    // recovery key ajax
    $('#recoverkeyinput').click(function() {
        $.post(OC.filePath('mozilla_sync_device','ajax','setrecoverykey.php'), {},
            function(result){
                if(result) {
                    OC.Notification.show(t('admin', result.data.message));
                }
            });
    });
});