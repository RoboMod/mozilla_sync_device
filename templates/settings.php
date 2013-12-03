<fieldset class="personalblock">
	<legend><?php p($l->t('Mozilla Sync Device')); ?></legend>
	<em>For security reasons you can't see the recovery key. You can just delete the old and set a new one.</em>
    <table class="nostyle">
      <tr>
        <td><input type="password" id="recovery_key" value=""/></td>
		<td><input type="button" id="set_recovery_key" value="<?php p($l->t("Set recovery key")); ?>" /></td>
      </tr>
    </table>
</fieldset>
