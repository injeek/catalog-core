<?php echo $this->rteConfig; ?>
 
<form action="<?php echo $this->action; ?>" method="post" enctype="<?php echo $this->enctype; ?>">
<div class="formbody">
<input type="hidden" name="FORM_SUBMIT" value="<?php echo $this->formId; ?>" />
<table cellspacing="0" cellpadding="0" summary="Table holds form input fields">
<?php echo $this->field; ?>
  <tr class="<?php echo $this->rowLast; ?>">
    <td class="col_0 col_first">&nbsp;</td>
    <td class="col_1 col_last">
      <div class="submit_container">
<input type="submit" name="save" id="save" class="tl_submit" accesskey="s" value="<?php echo specialchars($GLOBALS['TL_LANG']['MSC']['save']); ?>" />
<input type="submit" name="saveNclose" id="saveNclose" class="tl_submit" accesskey="c" value="<?php echo specialchars($GLOBALS['TL_LANG']['MSC']['saveNclose']); ?>" />
<input type="submit" name="saveNcreate" id="saveNcreate" class="tl_submit" accesskey="n" value="<?php echo specialchars($GLOBALS['TL_LANG']['MSC']['saveNcreate']); ?>" />
      </div>
    </td>
  </tr>
</table>
</div>
</form>