<script id="package-insur-health-main-view" type="text/html">
    {{#mainPackageBenefits}}
    <div class="package" data-package="{{code}}" style="display: none">
        <div class="label">
           Gói  {{name}}
        </div>
        <div class="value">{{maxInsuranceAmountDisplay}} <u>đ</u>/người/vụ</div>
    </div>
    {{/mainPackageBenefits}}
</script>