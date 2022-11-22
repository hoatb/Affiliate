<script id="package-insur-health-sub" type="text/html">
    <div class="text mb-2">QUYỀN LỢI MỞ RỘNG (TUỲ CHỌN THÊM) </div>
    {{#subPackageBenefits}}

    
    <div class="box-insurance-product mb-3" data-code="{{config.elementaryProductCodes}}">
        
        <div class="package-main">
            <div class="text mb-2">{{name}}</div>
            {{#benefits}}
             <div class="package">
                <div class="form-check form-check-button">
                    <input class="form-check-input sub-benefit" type="checkbox" value="{{benefitCode}}" id="{{benefitCode}}">
                    <label class="form-check-label" for="{{benefitCode}}">
                        <div class="text">Số tiền bảo hiểm tối đa đến: {{maxInsuranceAmountDisplay}} ₫/vụ</div>
                    </label>
                </div>
            </div>
            {{/benefits}}
        </div>
    </div>
    

    {{/subPackageBenefits}}
</script>