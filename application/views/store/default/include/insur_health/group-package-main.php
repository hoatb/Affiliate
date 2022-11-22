<script id="package-insur-health-main" type="text/html">
    <div class="text mb-2">CHỌN QUYỀN LỢI BẢO HIỂM</div>
    <div class="form-group">
        <select  data-placeholder="Chọn quyền lợi bảo hiểm" class="chosen-select form-control select-main-package" name="I_Main_Package" id="I_Main_Package" tabindex="1">
            <option value=""></option>
            {{#mainPackageBenefits}}
            <option value="{{code}}">Gói {{code}} - Quyền lợi đến {{maxInsuranceAmountDisplay}} đ</option>
            {{/mainPackageBenefits}}
        </select>
    </div>
</script>