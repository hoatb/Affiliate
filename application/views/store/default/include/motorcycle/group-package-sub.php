<script id="package-insur-sub" type="text/html">
    <div class="text mb-2">QUYỀN LỢI MỞ RỘNG (TUỲ CHỌN THÊM)</div>
    <div class="text mb-2">Giá X đ/người ngồi (X = STBH * 0,1%)</div>
    {{#subPackageBenefits}}

    
    <div class="box-insurance-product mb-3" data-code="{{config.elementaryProductCodes}}">
        
        <div class="package-main">
            {{#benefits}}
            <div class="text mb-2">{{name}}</div>
            <div class="package">
                <div class="form-check form-check-button">
                    <input class="form-check-input sub-benefit" type="checkbox" value="{{benefitCode}}" id="{{benefitCode}}">
                    <label class="form-check-label" for="{{benefitCode}}">
                        <div><strong>Phí: 20,000 đ/năm</strong></div>
                        <div class="text">Số tiền bảo hiểm: {{insuranceAmountPerObjectDisplay}} ₫/vụ</div>
                    </label>
                </div>
            </div>
            {{/benefits}}
        </div>
    </div>
    

    {{/subPackageBenefits}}
</script>