<div class="crm-section editrow_volunteer-tag-section form-item" id="editrow-volunteer-tag">
<div class="content">{$form.volunteer_tag.html}&nbsp;{$form.volunteer_tag.label}</div>
<div class="clear"></div></div>

{literal}
<script type="text/javascript">
CRM.$(function($) {
  $('#editrow-phone-Primary-2').after($('#editrow-volunteer-tag'));
});
</script>
{/literal}