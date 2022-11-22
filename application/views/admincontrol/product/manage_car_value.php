<div class="card">
    <div class="card-header bg-blue-payment">
        <div class="card-title-white pull-left m-0"><?= __("admin.manage_car_value") ?></div>
    </div>

    <div class="card-body">
        <form class="form-horizontal" method="post" action="" enctype="multipart/form-data" id="car_value_form">
            <div class="d-flex align-items-end mb-2">
                <p class="font-weight-bold mb-0"><?= __("admin.upload_car_value_input") ?></p>

                <button class="btn btn-sm btn-secondary" id="download_template" type="button">
                    <?= __("admin.download_template") ?>
                    <i class="fas fa-download ml-2"></i>
                </button>
            </div>

            <div class="custom-file mb-3">
                <input type="file" class="custom-file-input" name="car_value_file" id="carvalueinput" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">

                <label class="custom-file-label" for="carvalueinput">
                    <?= __("admin.choose_file") ?>
                </label>
                <div class="invalid-feedback" id="carvalueinput_feedback"></div>
            </div>
            <button class="btn btn-primary m-0" id="form_submit_btn" type="submit">
                <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                <span><?= __("admin.submit") ?></span>
            </button>
        </form>
    </div>
</div>


<script>
    $("#carvalueinput").change(function(event) {
        event.preventDefault();
        const fileName = event.target.value;
        $("label[for=carvalueinput]").html(fileName.replace(/C:\\fakepath\\/i, ""));

        $("#carvalueinput").removeClass("is-invalid");
        $("#carvalueinput_feedback").html("");
    });

    $("#car_value_form").submit("submit", function(event) {
        event.preventDefault();
        if (!$("#carvalueinput")[0].files[0]) {
            $("#carvalueinput").addClass("is-invalid");
            $("#carvalueinput_feedback").html("Please select an input file!");
            return;
        }

        $("#carvalueinput").removeClass("is-invalid");
        $("#carvalueinput_feedback").html("");

        const formData = new FormData($("#car_value_form")[0]);

        Swal.fire({
            icon: "warning",
            title: "Upload Warning",
            text: "All of old car value data will be cleared and can not be restored",
            showCloseButton: true,
            showCancelButton: true,
            focusConfirm: false,
            confirmButtonText: "OK",
            cancelButtonText: "Cancel",
            customClass: {
                confirmButton: "btn btn-primary",
            }
        }).then((result) => {
            if (!result.value) {
                return;
            }

            $("#form_submit_btn").find("span[role=status]").removeClass("d-none");
            $("#form_submit_btn").prop("disabled", true);

            $.ajax({
                url: "<?= base_url("admincontrol/upload_car_value") ?>",
                type: "POST",
                dataType: "json",
                cache: false,
                contentType: false,
                processData: false,
                data: formData,
                error: function(error) {
                    $("#form_submit_btn").find("span[role=status]").addClass("d-none");
                    $("#form_submit_btn").prop("disabled", false);
                },
                success: function(result) {
                    $("#form_submit_btn").find("span[role=status]").addClass("d-none");
                    $("#form_submit_btn").prop("disabled", false);

                    if (result.code === 200) {
                        Swal.fire({
                            icon: "success",
                            title: "Up load file successfully",
                            confirmButtonText: "OK",
                            customClass: {
                                confirmButton: "btn btn-primary",
                            }
                        });
                        return;
                    }

                    if (result.code === 400 || result.code === 500) {
                        if (result.data.errors) {
                            Swal.fire({
                                icon: "error",
                                title: result.data.errors,
                                confirmButtonText: "OK",
                                customClass: {
                                    confirmButton: "btn btn-primary",
                                }
                            });
                            return;
                        }
                    }
                },
            })
            return false;
        });
    });

    $("#download_template").click(function() {
        window.open("<?= base_url("admincontrol/download_car_value_template") ?>", "blank")
    });
</script>