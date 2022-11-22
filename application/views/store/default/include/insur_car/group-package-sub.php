<script id="package-insur-car-sub" type="text/html">
    <div class="text mb-2">QUYỀN LỢI MỞ RỘNG (TUỲ CHỌN THÊM) <button class="btn btn-sm btn-primary" id="removeSubpackage" type="button">Xoá hết</button> </div>
    {{#subPackageBenefits}}
    <div class="box-insurance-product mb-3" data-code="{{config.elementaryProductCodes}}">
        <div class="package-main">
            <div class="text mb-2">{{name}}</div>
            <div class="package">
                <div class="form-check form-check-button form-check-radio-button">
                    <input class="form-check-input form-radio-subpackage sub-benefit" type="radio" name="{{config.elementaryProductCodes}}" value="{{id}}" id="{{id}}">
                    <label class="form-check-label" for="{{id}}">
                        
                        <h4 class="mb-2">Số tiền bảo hiểm tối đa đến: {{maxInsuranceAmountDisplay}} ₫/vụ</h4>
                        
                        {{#benefits}}
                            <div class="text"><i>{{name}} : {{insuranceAmountPerObjectDisplay}} ₫/vụ</i></div>
                        {{/benefits}}
                    </label>
                </div>
            </div>
        </div>
    </div>
    {{/subPackageBenefits}}
</script>