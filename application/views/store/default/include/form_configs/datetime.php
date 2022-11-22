<script id="control-datetime" type="text/html">
   <div class="form-group-attribute form-group form-group-{{attributeCode}}">
      <label class="label-attribute label-group-radio">{{label}} 
         {{#required}}
            <span  class="red">*</span>
         {{/required}}
      </label>
      <input type="text" id="{{attributeCode}}" data-fee="{{stepID}}" data-type="{{type}}" data-fid="f_{{attributeCode}}" name="{{attributeCode}}" data-label="{{label}}" class="form-control form-control-config" placeholder="{{label}}">
   </div>
</script>