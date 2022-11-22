<script id="js-content-policy" type="text/html">
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
                <b>{{salesProductName}}</b>
            </div>
        </div>
        <div class='row mb-2'>
            <div class='col-sm-12 col-md-4 col-lg-3 col-xl-2'>
                Số ấn chỉ:
            </div>
            <div class='col-sm-12 col-md-8 col-lg-9 col-xl-10'>
                <b>{{certificationNumber}}</b>
            </div>
        </div>
        <div class='row mb-2'>
            <div class='col-sm-12 col-md-4 col-lg-3 col-xl-2'>
                Chủ hợp đồng bảo hiểm:
            </div>
            <div class='col-sm-12 col-md-8 col-lg-9 col-xl-10'>
                <b>{{name}}</b>
            </div>
        </div>
        <div class='row mb-2'>
            <div class='col-sm-12 col-md-4 col-lg-3 col-xl-2'>
                Thời gian hiệu lực:
            </div>
            <div class='col-sm-12 col-md-8 col-lg-9 col-xl-10'>
                <b>{{effectiveDate}} - {{expireDate}}</b>
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
            <a href="{{ePolicyFileUrl}}" download class="btn btn-primary">
                <i class="fa fa-download mr-2" aria-hidden="true"></i>
                Ấn chỉ điện tử
            </a>
        </div>
    </div>
</script>