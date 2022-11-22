<script id="control-textarea" type="text/html">
  <div class="form-group-attribute form-group">
      <label class="label-attribute label-group-radio">{{label}} 
         {{#required}}
            <span  class="red">*</span>
         {{/required}}
      </label>
      <textarea name="" id="" rows="3" data-fee="{{stepID}}" data-fid="f_{{attributeCode}}" data-type="{{type}}" placeholder="{{label}}" data-label="{{label}}"></textarea>
   </div>
</script>