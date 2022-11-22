<script id="control-multipleselect" type="text/html">
   <div class="form-group form-group-attribute">
      <label class="label-attribute label-group-radio">{{label}} 
         {{#required}}
            <span  class="red">*</span>
         {{/required}}
      </label>
      <select class="custom-select form-control-config" data-fee="{{stepID}}" data-type="{{type}}" data-fid="f_{{attributeCode}}" name="{{attributeCode}}" data-label="{{label}}" multiple>
      <option selected>Lựa chọn</option>
         {{#entityValue}} 
         <option value="{{value}}" {{#isPreSelected}} checked="checked" {{/isPreSelected}}>{{name}}</option>
         {{/entityValue}}
      </select>
   </div>
</script>