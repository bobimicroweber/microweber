<script>
    $(document).ready(function () {
        $('body .main > main').addClass('page-settings');
    });
</script>


<?php
$show_inner = false;
$show_inner_trigger = false;

if (isset($_GET['group']) and $_GET['group']) {
    $group = $_GET['group'];

    if ($group == 'general') {
        $show_inner = 'shop/payments/currency';
    } elseif ($group == 'coupons') {
        $show_inner = 'shop/coupons/admin';
    } elseif ($group == 'taxes') {
        $show_inner = 'shop/taxes/admin';
    } elseif ($group == 'payments') {
        $show_inner = 'shop/payments/admin';
    } elseif ($group == 'invoices') {
        $show_inner = 'shop/orders/settings/invoice_settings';
    } elseif ($group == 'shipping') {
        $show_inner = 'shop/shipping/admin';
    } elseif ($group == 'mail') {
        $show_inner = 'shop/orders/settings/setup_emails_on_order';
    } elseif ($group == 'other') {
        $show_inner = 'shop/orders/settings/other';
    } else {
        $show_inner = 'trigger';
        $show_inner_trigger = $group;
    }
}
?>

<?php event_trigger('mw.admin.shop.settings', $params); ?>

<?php if ($show_inner): ?>
    <?php if ($show_inner != 'trigger'): ?>
        <module type="<?php print $show_inner ?>"/>
    <?php else: ?>
        <?php event_trigger('mw.admin.shop.settings.' . $show_inner_trigger, $params); ?>
    <?php endif; ?>

    <?php return; ?>
<?php endif ?>

<div class="card bg-none style-1 mb-0">
    <div class="card-header px-0">
        <h5><i class="mdi mdi-shopping text-primary mr-3"></i> <strong><?php _e("Shop settings"); ?></strong></h5>
        <div>

        </div>
    </div>

    <div class="card-body pt-3 px-0">
        <div class="card style-1 mb-3">
            <div class="card-body pt-3 px-5">
                <div class="row select-settings">
                    <div class="col-12 col-sm-6 col-lg-4">
                        <a href="?group=general" class="d-flex my-3">
                            <div class="icon-holder"><i class="mdi mdi-cart-outline mdi-20px"></i></div>
                            <div class="info-holder">
                                <span class="text-primary font-weight-bold">General</span><br/>
                                <small class="text-muted">Basic store settings</small>
                            </div>
                        </a>
                    </div>

                    <?php event_trigger('mw.admin.shop.settings.menu', $params); ?>

                    <div class="col-12 col-sm-6 col-lg-4">
                        <a href="?group=invoices" class="d-flex my-3">
                            <div class="icon-holder"><i class="mdi mdi-cash-register mdi-20px"></i></div>
                            <div class="info-holder">
                                <span class="text-primary font-weight-bold"><?php _e('Invoices'); ?></span><br/>
                                <small class="text-muted">Invoice lists and accounting</small>
                            </div>
                        </a>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-4">
                        <a href="?group=mail" class="d-flex my-3">
                            <div class="icon-holder"><i class="mdi mdi-email-edit-outline mdi-20px"></i></div>
                            <div class="info-holder">
                                <span class="text-primary font-weight-bold">Auto respond mail</span><br/>
                                <small class="text-muted">Email and message settings</small>
                            </div>
                        </a>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-4">
                        <a href="?group=other" class="d-flex my-3">
                            <div class="icon-holder"><i class="mdi mdi-cog mdi-20px"></i></div>
                            <div class="info-holder">
                                <span class="text-primary font-weight-bold"><?php _e('Other settings'); ?></span><br/>
                                <small class="text-muted">Other settings</small>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>