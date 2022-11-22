<section class="profile-page">
    <div class="container">
        <div class="profile-page-wrapper">
            <div class="profile-sidebar">
                <div class="d-inline-block mb-3">
                    <?php 
						$avatar = ($client['avatar'] != '') ? base_url('assets/images/users/'.$client['avatar']) : base_url('assets/store/default/img/avatar-default.png') ; 
					?>
                    <img id="img-sub" src="<?= $avatar ?>" alt="<?= __('store.profile') ?>" class="img-profile-sub">
                    <div class="d-inline-block pl-2" style="vertical-align: middle;">
                        <p class="text-left mb-0"><?= __('store.profile') ?></p>
                        <strong class="text-left"><?php echo $userDetails['firstname']?>
                            <?php echo $userDetails['lastname']?></strong>
                    </div>
                </div>
                <ul class="list-unstyled">
                    <li><a class="active" href="<?= $base_url ?>profile"><i class="bi bi-person-fill"></i> <?= __('store.profile') ?></a></li>
                    <li><a href="<?= $base_url ?>order"><i class="bi bi-gift-fill"></i> <?= __('store.order') ?></a></li>
                    <li><a href="<?= $base_url ?>logout"><i class="bi bi-box-arrow-left"></i> <?= __('store.logout') ?></a></li>
                </ul>
            </div>

            <div class="profile-main">
                <h2 class="title"><?= __('store.profile') ?></h2>
                <div class="row">
                    <div class="col-xl-8 col-lg-12 info">
                        <form action="<?php echo base_url('store/profile') ?>" class="form-horizontal" method="post"
                            id="profile-frm" enctype="multipart/form-data">
                            <h2><?= __('store.personal_details') ?></h2>
                            <div class="row">
                                <div class="col-xl-4 col-lg-12">
                                    <div class="form-group img-form-group">
                                        <?php 
                                            $avatar = ($client['avatar'] != '') ? base_url('assets/images/users/'.$client['avatar']) : base_url('assets/store/default/img/avatar-default.png') ; 
                                        ?>
                                        <img id="blah" src="<?= $avatar ?>" alt="<?= __('store.profile') ?>"
                                            class="img-profile-main">
                                        <div class="fileUpload btn text-dark text-left w-100">
                                            <span><i class="far fa-image"></i></span>
                                            <input id="uploadBtn" name="avatar" class="upload" type="file"
                                                style="display:none;">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-8 col-lg-12">
                                    <div class="row">
                                        <div class="col-xl-6 col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label><?= __('store.first_name') ?><span class="red">*</span></label>
                                                <input placeholder="<?= __('store.enter_your_first_name') ?>"
                                                    name="firstname" value="<?php echo $userDetails['firstname']; ?>"
                                                    class="form-control" type="text">
                                                <?php if(isset($this->session->flashdata('error')['firstname'])) { ?>
                                                <div class="text-danger">
                                                    <?php echo $this->session->flashdata('error')['firstname'] ?>
                                                </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label><?= __('store.last_name') ?><span class="red">*</span></label>
                                                <input placeholder="<?= __('store.enter_your_last_name') ?>"
                                                    name="lastname" class="form-control"
                                                    value="<?php echo $userDetails['lastname']; ?>" type="text">
                                                <?php if(isset($this->session->flashdata('error')['lastname'])) { ?>
                                                <div class="text-danger">
                                                    <?php echo $this->session->flashdata('error')['lastname'] ?>
                                                </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label><?= __('store.email_address') ?><span
                                                        class="red">*</span></label>
                                                <input placeholder=<?= __('store.enter_your_email_address') ?>
                                                    name="email" id="email" class="form-control"
                                                    value="<?php echo $userDetails['email']; ?>" type="email">
                                                <?php if(isset($this->session->flashdata('error')['email'])) { ?>
                                                <div class="text-danger">
                                                    <?php echo $this->session->flashdata('error')['email']?>
                                                </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label><?= __('store.phone_number') ?><span class="red">*</span></label>
                                                <link rel="stylesheet"
                                                    href="<?= base_url('assets/plugins/tel/css/intlTelInput.css?v='.av()) ?>">
                                                <script src="<?= base_url('assets/plugins/tel/js/intlTelInput.js') ?>">
                                                </script>
                                                <input type="hidden" name='PhoneNumberInput' id="phonenumber-input"
                                                    value="" class="form-control" placeholder="Nhập số điện thoại">

                                                <input onkeypress="return isNumberKey(event);" id="PhoneNumber"
                                                    class="form-control" type="text" name="PhoneNumber"
                                                    value="<?php echo $userDetails['phone']; ?>">
                                                <script type="text/javascript">
                                                var tel_input = intlTelInput(document.querySelector("#PhoneNumber"), {
                                                    initialCountry: "vn",
                                                    utilsScript: "<?= base_url('/assets/plugins/tel/js/utils.js?1562189064761') ?>",
                                                    separateDialCode: true,
                                                    geoIpLookup: function(success, failure) {
                                                        $.get("https://ipinfo.io", function() {}, "jsonp")
                                                            .always(
                                                                function(resp) {
                                                                    var countryCode = (resp && resp
                                                                            .country) ?
                                                                        resp
                                                                        .country : "";
                                                                    success(countryCode);
                                                                    setTimeout(function() {
                                                                        ;
                                                                    }, 100);
                                                                });
                                                    },
                                                });

                                                $(document).ready(function() {
                                                    console.log('<?= $userDetails['phone']; ?>');
                                                    tel_input.setNumber('<?= $userDetails['phone']; ?>');
                                                });

                                                function isNumberKey(evt) {
                                                    var charCode = (evt.which) ? evt.which : event.keyCode;
                                                    if (charCode != 46 && charCode != 45 && charCode > 31 &&
                                                        (charCode < 48 || charCode > 57))
                                                        return false;

                                                    return true;
                                                }
                                                </script>
                                                <?php if(isset($this->session->flashdata('error')['PhoneNumber'])) { ?>
                                                <div class="text-danger">
                                                    <?php echo $this->session->flashdata('error')['PhoneNumber'] ?>
                                                </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="control-label"><?= __('store.address') ?></label>
                                                <textarea class="form-control" placeholder=<?= __('store.address') ?>
                                                    name="twaddress"><?= isset($userDetails) ? $userDetails['twaddress'] : '' ?></textarea>
                                                <?php if($errors && isset($errors['twaddress'])) { ?>
                                                <div class="text-danger"><?php echo $errors['twaddress'] ?></div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <button id="update-profile" type="submit" class="btn btn-primary"><?= __('store.update_profile') ?></button>
                                </div>
                            </div>
                           
                        </form>
                    </div>
                    <div class="col-xl-4 col-lg-12">
                        <h2><?= __('store.password') ?></h2>
                        <div class="d-flex justify-content-between">
                            <div>
                                <i class="fa fa-lock mr-2"></i><?= __('store.change_password') ?>
                            </div>
                            <div>
                                <a class="btn btn-custom"
                                    href="<?= $base_url ?>change_password"><?= __('user.update') ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<script type="text/javascript">
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            jQuery('#blah').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$(document).on('click', '.fileUpload span', function() {
    $('#uploadBtn').trigger('click');
});

document.getElementById("uploadBtn").onchange = function() {
    readURL(this);
};

$('#update-profile').on('click', function() {
    $("#profile-frm").submit();
});

$("#profile-frm").submit(function() {
    var errorMap = ['<?= __('store.invalid_number') ?>', '<?= __('store.invalid_country_code') ?>',
        '<?= __('store.too_short') ?>', '<?= __('store.too_long') ?>', '<?= __('store.invalid_number') ?>'
    ];
    is_valid = false;
    var errorInnerHTML = '';
    if ($("#PhoneNumber").val().trim()) {
        if (tel_input.isValidNumber()) {
            is_valid = true;
            $("#phonenumber-input").val("+" + tel_input.getSelectedCountryData().dialCode + ' ' + $(
                "#PhoneNumber").val().trim());
        } else {
            var errorCode = tel_input.getValidationError();
            errorInnerHTML = errorMap[errorCode];
        }
    } else {
        errorInnerHTML = '<?= __('store.mobile_number_is_required') ?>';
    }
    $("#PhoneNumber").parents(".form-group").removeClass("has-error");
    $("#profile-frm .text-danger").remove();

    if (!is_valid) {
        $("#PhoneNumber").parents(".form-group").addClass("has-error");
        $(".iti").after("<span class='text-danger'>" + errorInnerHTML + "</span>");
        return false;
    }
});
</script>
