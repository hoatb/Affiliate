<section class="profile-page" style="minn-height: 650px">
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
                        <strong class="text-left"><?php echo $userDetails['firstname']?> <?php echo $userDetails['lastname']?></strong>
                    </div>
                </div>
                <ul class="list-unstyled">
                    <li><a href="<?= $base_url ?>profile"><i class="bi bi-person-fill"></i> <?= __('store.profile') ?></a></li>
                    <li><a href="<?= $base_url ?>order"><i class="bi bi-gift-fill"></i> <?= __('store.order') ?></a></li>
                    <li><a href="<?= $base_url ?>logout"><i class="bi bi-box-arrow-left"></i> <?= __('store.logout') ?></a></li>
                </ul>
            </div>

            <div class="profile-main">
                <h2 class="title">Đổi mật khẩu</h2>
                <form action="<?php echo base_url('store/change_password') ?>" class="form-horizontal" method="post"
                    id="change-password-frm" enctype="multipart/form-data">
                    <div class="row justify-content-center">
                        <div class="col-md-5">
                            <div class="">
                            <div class="form-group">
                                <label>Mật khẩu hiện tại</label>
                                <input class="form-control" id="current_password" name="current_password" type="password" 
                                    value="<?php echo set_value('current_password', $this->session->flashdata('current_password'));?>">
                                <?php if(isset($this->session->flashdata('error')['current_password'])) { ?>
                                <div class="text-danger">
                                    <?= $this->session->flashdata('error')['current_password'] ?>
                                </div>
                                <?php } ?>
                                <?php if($this->session->flashdata('err')) { ?>
                                <div class="text-danger">
                                    Mật khẩu hiện tại không đúng
                                </div>
                                <?php } ?>
                            </div>
                            <div class="form-group">
                                <label>Mật khẩu mới</label>
                                <input class="form-control" id="new_password" name="new_password" type="password" 
                                    value="<?php echo set_value('current_password', $this->session->flashdata('new_password'));?>">
                                <?php if(isset($this->session->flashdata('error')['new_password'])) { ?>
                                <div class="text-danger">
                                    <?= $this->session->flashdata('error')['new_password'] ?>
                                </div>
                                <?php } ?>
                            </div>
                            <div class="form-group">
                                <label>Nhập lại mật khẩu mới</label>
                                <input class="form-control" id="c_password" name="c_password" type="password"
                                    value="<?php echo set_value('current_password', $this->session->flashdata('c_password'));?>">
                                <?php if(isset($this->session->flashdata('error')['c_password'])) { ?>
                                <div class="text-danger">
                                    <?= $this->session->flashdata('error')['c_password'] ?>
                                </div>
                                <?php } ?>
                            </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="text-center">
                        <button id="cancel-update-password" type="button" class="mr-2 btn btn-default">Hủy</button>
                        <button id="update-password" type="submit" class="ml-2 btn btn-primary">Lưu thay đổi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
$('#cancel-update-password').on('click', function() {
    window.location.assign('profile');
});
</script>