<script type="text/javascript">
jQuery(document).ready(function(){
    jQuery('#blanck_fields').hide();
    
    jQuery('#add_field').click(function(){
        
        jQuery('#area_fields').after('<div class="group-new">'+jQuery('#blanck_fields').html()+'</div>');
        return false;
    });
    jQuery('fieldset').delegate('.remove-rows', 'click',function(){
        jQuery(this).parents('.group-new').remove();
        return false;
    });
    
    jQuery('#alias').keyup(function(e){
            jQuery('#alias_yes').hide();
            jQuery('#alias_no').hide();
            
            var obj = jQuery(this);
            jQuery.post('<?=site_url('dictionaries/check_alias')?>',{name:obj.val()},function(data){
                if(data == 1)
                {
                    jQuery('#div_alias').removeClass('error');
                    jQuery('#div_alias').addClass('success');
                    
                }else
                {
                    jQuery('#div_alias').removeClass('success');
                    jQuery('#div_alias').addClass('error');                
                } 
            });
            
        });
});
</script>
<div id="messages">
    <?php $this->codextemplates->loadInlineView('templates/'.$this->template.'/codex_messages');?>
</div>
<form action="<?=site_url('dictionaries/build')?>" method="post" class="form-horizontal">
<fieldset>
      <legend>New Dictionaries</legend>
    <div class="control-group">
        <label class="control-label" for="title">Short Desc</label>
        <div class="controls">
            <input type="text" value="" name="title" id="title" /> 
        </div>
    </div>
    <div class="control-group"  id="div_alias">
        <label class="control-label" for="alias">Alias</label>
        <div class="controls">
            <input type="text" name="alias" value="" id="alias" /> 
            
            <img src="<?=base_url()?>codex/images/no.jpg" id="alias_no" style="display:none;width: 20px;" class="alias_img">
            <img src="<?=base_url()?>codex/images/yes.jpg" id="alias_yes" style="display:none;width: 20px;" class="alias_img">
            <span class="help-inline">It should only contain letters and numbers</span>
        </div>
    </div>
    
</fieldset>
<fieldset>
    <legend>Values</legend>
    
    <div id="blanck_fields">
        <div class="control-group">
            <label class="control-label" for="value">Value</label>
            <div class="controls">
                <input type="text" name="value[]" value="" id="" /> 
            </div>
        </div>
        <div class="form-actions">
            <a class="btn btn-danger remove-rows" href="#"><i class="icon-trash icon-white"></i>Delete</a>
        </div>
    </div>
    <div id="area_fields" style="padding-top:20px">
        
        <div class="control-group">
            <label class="control-label" for="value">Value</label>
            <div class="controls">
                <input type="text" name="value[]" value="" id="" /> 
            </div>
        </div>
        
    </div>
<div class="form-actions" style="background:none"> <button  id="add_field" class="btn btn-success" href="#"><i class="icon-plus icon-white"></i> Add value</button>   </div>    
</fieldset>
<div class="form-actions">
    <button type="submit" name="codex_installer_submit" class="btn btn-primary">Create dictionary</button>    
</div>
</form>
