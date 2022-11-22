<script id="control-address" type="text/html">
   <div class="form-group form-group-attribute">
      <label class="label-attribute label-group-radio">{{label}} 
         {{#required}}
            <span  class="red">*</span>
         {{/required}}
      </label>
      <input type="text" id="{{attributeCode}}" data-fee="{{stepID}}" data-label="{{label}}" data-type="{{type}}"  data-fid="f_{{attributeCode}}" name="{{attributeCode}}"  {{#required}}required{{/required}}  class="form-control form-control-config" placeholder="{{label}}">
   </div>
</script>