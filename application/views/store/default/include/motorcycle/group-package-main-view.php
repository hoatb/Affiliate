<script id="package-insur-main-view" type="text/html">
    {{#mainPackageBenefits}}
    {{#benefits}}
    <div class="package">
        <div class="label">
            {{name}}
        </div>
        <div class="value">{{insuranceAmountPerObjectDisplay}} <u>đ</u>/người/vụ</div>
    </div>
    {{/benefits}}
    {{/mainPackageBenefits}}
</script>