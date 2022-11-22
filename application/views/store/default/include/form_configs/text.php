<script id="control-text" type="text/html">
   <div class="form-group-attribute form-group group-atc_{{attributeCode}}" >
      <label class="label-attribute label-group-text">{{label}} 
         {{#required}}
            <span class="red">*</span>
         {{/required}}
      </label>
      <input type="{{defaultRegexType}}" data-type="{{type}}" maxlength="{{maxLength}}" minlength="{{minLength}}" id="{{attributeCode}}" data-fee="{{stepID}}" data-fid="f_{{attributeCode}}" name="{{attributeCode}}" data-label="{{label}}" class="form-control form-control-config" placeholder="{{label}}">
   </div>
</script>