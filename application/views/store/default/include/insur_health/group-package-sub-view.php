<script id="package-insur-health-sub-view" type="text/html">
    {{#subPackageBenefits}}
        {{#benefits}}
        <div class="package data-sub-package" data-productcode="{{config.elementaryProductCodes}}" data-code="{{benefitCode}}" style="display: none">
            <div class="label">
                {{name}}
            </div>
            <div class="value">{{maxInsuranceAmountDisplay}} <u>đ</u>/vụ</div>
        </div>
        {{/benefits}}
    {{/subPackageBenefits}}
</script>