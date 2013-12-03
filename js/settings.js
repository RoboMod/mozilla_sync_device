$(document).ready(function(){
    // recovery key ajax
    $('#set_recovery_key').click(function() {
        $.post(OC.filePath('mozilla_sync_device','ajax','setrecoverykey.php'), 
			{ recovery_key: $('#recovery_key').val() },
            function(result){
                if(result) {
                    OC.Notification.show(result.data.message);
                }
            });
    });
});