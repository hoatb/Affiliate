<script id="control-date" type="text/html">
   <div class="form-group-attribute  form-group">
      <label class="label-attribute label-group-radio">{{label}} 
         {{#required}}
            <span  class="red">*</span>
         {{/required}}
      </label>
      <div class="form-control-date">
         <input type="text" class="form-control form-control-date" data-fee="{{stepID}}" data-type="{{type}}" data-fid="f_{{attributeCode}}" placeholder="{{label}}" data-label="{{label}}">
         <span class="biicon bi bi-calendar3"></span>
      </div>
   </div>
</script>