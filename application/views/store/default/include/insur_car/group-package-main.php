<script id="package-insur-car-main" type="text/html">
    {{#mainPackageBenefits}}
    <div class="text mb-2">QUYỀN LỢI CƠ BẢN (LUÔN ĐƯỢC ÁP DỤNG)</div>

    <div class="package-main">
        {{#benefits}}
        <div class="package" >
            <div class="form-check form-check-button">
                <input class="form-check-input main-benefit" type="checkbox" value="{{benefitCode}}" id="{{benefitCode}}" disabled checked>
                <label class="form-check-label" for="{{benefitCode}}">
                    <h4 class="text">{{name}}</h4>
                    <div class="text">{{insuranceAmountPerObjectDisplay}} ₫/người/vụ</div>
                </label>
            </div>
        </div>
        {{/benefits}}
       
    </div>
    {{/mainPackageBenefits}}
</script>