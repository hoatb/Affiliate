<script id="control-radio" type="text/html">
    <div class="form-group-attribute group-radio group-atc_{{attributeCode}}">
      <label class="label-attribute label-group-radio">{{label}}
         {{#required}}
            <span  class="red">*</span>
         {{/required}}
      </label>
      <div class="row w-100">
         {{#entityValue}}
         <div class="col-12 col-md-6">
            <div class="item-radio">
               <div class="custom-control custom-radio">
                  <input type="radio" class="custom-control-input form-control-config" data-type="{{type}}" data-fee="{{stepID}}" id="{{attributeCode}}-{{index}}"  data-fid="f_{{attributeCode}}" name="{{attributeCode}}" value="{{value}}" data-label="{{label}}" data-name="{{name}}" {{#isPreSelected}} checked="checked" {{/isPreSelected}}>
                  <label class="custom-control-label" for="{{attributeCode}}-{{index}}">{{name}}</label>
               </div>
            </div>
         </div>
        
         {{/entityValue}}
      </div>
   </div>
  
</script>
