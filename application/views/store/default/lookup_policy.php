<div class='container' style="min-height: 650px">
    <div class='card mb-3'>
        <div class='card-body p-5'>
            <h2 class='title text-center'>TRA CỨU HỢP ĐỒNG BẢO HIỂM</h2>
            <div class='custom-border-bot mb-5'></div>
            <div class="row justify-content-center">
                <div class="col-sm-12 col-md-10 col-lg-7">
                    <div class="form-search-policy">
                        <div class="form-group">
                            <input type="text" maxlength="100" id="lookup_code" data-fid="f_lookup_code"
                                name="lookup_code" class="form-control form-control-config"
                                placeholder="Nhập mã tra cứu" value="<?php echo $lookupcode; ?>">
                        </div>
                        <button class="btn btn-orange" id="searchPolicy" type="button" data-baseurl="<?= base_url() ?>">
                            <i class="fa fa-search" aria-hidden="true"></i>
                            <span class="content-btn">Kiểm tra</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="card" id="contentPolicy">
        <?php if(!empty($policy_detail)) { ?>
        <div class='card-body p-5'>
            <h2 class='title text-center'>
                KẾT QUẢ TRA CỨU HỢP ĐỒNG BẢO HIỂM
            </h2>
            <div class='custom-border-bot mb-5'></div>
            <div class='row mb-2'>
                <div class='col-sm-12 col-md-4 col-lg-3 col-xl-2'>
                    Loại hợp đồng:
                </div>
                <div class='col-sm-12 col-md-8 col-lg-9 col-xl-10'>
                    <b><?php echo $policy_detail->salesProductName ?></b>
                </div>
            </div>
            <div class='row mb-2'>
                <div class='col-sm-12 col-md-4 col-lg-3 col-xl-2'>
                    Số ấn chỉ:
                </div>
                <div class='col-sm-12 col-md-8 col-lg-9 col-xl-10'>
                    <b><?= $policy_detail->certificationNumber ?></b>
                </div>
            </div>
            <div class='row mb-2'>
                <div class='col-sm-12 col-md-4 col-lg-3 col-xl-2'>
                    Chủ hợp đồng bảo hiểm:
                </div>
                <div class='col-sm-12 col-md-8 col-lg-9 col-xl-10'>
                    <b><?= $policy_detail->owner->name ?></b>
                </div>
            </div>
            <div class='row mb-2'>
                <div class='col-sm-12 col-md-4 col-lg-3 col-xl-2'>
                    Thời gian hiệu lực:
                </div>
                <div class='col-sm-12 col-md-8 col-lg-9 col-xl-10'>
                    <b><?= date_format(date_create($policy_detail->effectiveDate),"d/m/Y");  ?> - <?= date_format(date_create($policy_detail->expireDate),"d/m/Y"); ?></b>
                </div>
            </div>
            <div class='row mb-2'>
                <div class='col-sm-12 col-md-4 col-lg-3 col-xl-2'>
                    Trạng thái
                </div>
                <div class='col-sm-12 col-md-8 col-lg-9 col-xl-10'>
                    <b>Hiệu lực</b>
                </div>
            </div>

            <div class='d-flex justify-content-end'>
                <a href="<?= $policy_detail->ePolicyFileUrl ?>" download class="btn btn-primary">
                    <i class="fa fa-download mr-2" aria-hidden="true"></i>
                    Ấn chỉ điện tử
                </a>
            </div>
        </div>
        <?php } else if(empty($policy_detail) && $notfound) { ?>
        <div class='card-body p-5'>
            <h2 class='title text-center'>
                Không tìm thấy thông tin hợp đồng bảo hiểm
            </h2>
        </div>
        <?php } ?>
    </div>

</div>

<?php include 'include/insur_content_policy.php';  ?>
<?php include 'include/insur_content_policy_empty.php';  ?>

<script type="text/javascript">
$(document).ready(function() {
    $(document).on('click', "#searchPolicy", function() {
        let base_url = $(this).data('baseurl');
        let lookup_code = $("[name='lookup_code']").val();
        window.location.href =base_url + "l/" + lookup_code;
        /* console.log();
        
        if (lookup_code != "" && lookup_code != null) {
            $this = $(this);
            $.ajax({
                url: base_url + 'v1/policies/' + lookup_code,
                type: 'GET',
                dataType: 'json',
                beforeSend: function() {
                    $('#contentPolicy').html('');
                    showLoading();
                },
                complete: function() {
                    hideLoading();
                },
                success: function(response) {
                    if (response.code == '200') {
                        let policyDetail = {
                            ...response.data,
                            dateOfBirth: response.data.owner.dateOfBirth,
                            email: response.data.owner.email,
                            identityNumber: response.data.owner.dentityNumber,
                            name: response.data.owner.name,
                            phoneNumber: response.data.owner.phoneNumber,
                        }
                        $('#contentPolicy').html(Mustache.render($('#js-content-policy').html(), policyDetail));
                    } else {
                        $('#contentPolicy').html(Mustache.render($('#js-content-policy-empty').html()));
                    }
                    hideLoading();
                },
            });
        } */
    });
});
</script>