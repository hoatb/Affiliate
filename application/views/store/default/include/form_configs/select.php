<script id="control-select" type="text/html">
   <div class="form-group-attribute form-group group-atc_{{attributeCode}}">
      <label class="label-attribute label-group-radio">{{label}} 
         {{#required}}
            <span  class="red">*</span>
         {{/required}}
      </label>
     
      <select  class="custom-select form-control-config" data-type="{{type}}" data-fee="{{stepID}}"  data-fid="f_{{attributeCode}}" data-fee="{{stepID}}" data-label="{{label}}" name="{{attributeCode}}">
        
         <option selected>Lựa chọn</option>
         {{#entityValue}} 
         <option value="{{value}}" {{#isPreSelected}} checked="checked" {{/isPreSelected}}>{{name}}</option>
         {{/entityValue}}

      </select>
      
   </div>
</script>