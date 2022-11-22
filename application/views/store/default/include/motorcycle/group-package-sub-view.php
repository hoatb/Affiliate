<script id="package-insur-sub-view" type="text/html">
    {{#subPackageBenefits}}
        {{#benefits}}
        <div class="package data-sub-package" data-code="{{benefitCode}}" style="display: none">
            <div class="label">
                {{name}}
            </div>
            <div class="value">{{insuranceAmountPerObjectDisplay}} <u>đ</u>/vụ</div>
        </div>
        {{/benefits}}
    {{/subPackageBenefits}}
</script>