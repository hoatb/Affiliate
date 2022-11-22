<script id="package-insur-car-sub-people" type="text/html">
    <hr/>
    <div class="text mb-2">BẢO HIỂM CHO LÁI,PHỤ XE & NGƯỜI TRÊN XE</div>
    {{#subPackageBenefits}}
    <div class="box-insurance-product mb-3" data-code="{{config.elementaryProductCodes}}">
        <div class="package-main">
            <div class="package">
                <div class="form-check form-check-button">
                    <input class="form-check-input sub-benefit person_in-car-benefit-choose" type="checkbox" name="{{code}}" value="{{id}}" id="{{id}}">
                    <label class="form-check-label" for="{{id}}">
                        
                        <h4 class="mb-2">{{name}}</h4>
        
                    </label>
                </div>
            </div>
        </div>
    </div>
    {{/subPackageBenefits}}
</script>