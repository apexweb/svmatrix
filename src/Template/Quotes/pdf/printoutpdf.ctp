<?php
$role = $quote->role;
$mfrole = $quote->mfrole;

$flatCustomPrice = false;
$customQuotedAmount = 0;

if ($quote->override_final_price) {
    $flatCustomPrice = true;
    $customQuotedAmount = $quote->custom_quoted_amount;
}

?>


<div class="card-box printout">

    <?php if ($quote->user->avatar): ?>
        <div class="text-center" style="margin-bottom: 5px;">
            <?= $quote->user->printout ?>
        </div>
    <?php endif; ?>



</div>

<div class="card-box printout">
    <div class="customer-info">
        <span><strong style="font-size: 12px !important;">Customer Name:</strong></span>
            <span id="customer-name">
            <?= h($quote->customer_name) ?>
        </span>
        <span style="display: inline-block; width: 25%;"></span>

        <span><strong>Date:</strong></span>
        <span id="order-date">
            <?= h($quote->created->format('d/m/Y')) ?>
        </span>

        <span style="display: inline-block; width: 25%;"></span>
        <strong>Order No. &nbsp; &nbsp;
            <?= h($quote->qId) ?>
        </strong>

        <br><br>

        <span><strong>Mobile:</strong></span>
        <span id="mobile">
            <?= h($quote->mobile) ?>
        </span>

        <span style="display: inline-block; width: 5%;"></span>

        <span><strong>Phone:</strong></span>
        <span id="phone">
            <?= h($quote->phone) ?>
        </span>

        <br><br>


        <span><strong>Email:</strong></span>
        <span id="email">
            <?= h($quote->email) ?>
        </span>

        <br><br>

        <span><strong>Address:</strong></span>
        <span id="street">
            <?= h($quote->street) ?>
        </span>

        <span style="display: inline-block; width: 5%;"></span>

        <span><strong>Suburb:</strong></span>
        <span id="suburb">
            <?= h($quote->suburb) ?>
        </span>

        <span style="display: inline-block; width: 5%;"></span>

        <span><strong>State:</strong></span>
        <span id="state">
            <?= h($quote->state) ?>
        </span>

        <span style="display: inline-block; width: 5%;"></span>

        <span><strong>Postcode:</strong></span>
        <span id="postcode">
            <?= h($quote->postcode) ?>
        </span>
        <br>

    </div>


</div>

<div class="card-box printout">
    <table class="table table-responsive table-bordered quote-printout small-padding">
        <tr>
            <th class="text-center" width="5" class="width-50">NO</th>
            <th class="text-center" width="5" class="width-30">Qty</th>
            <th class="text-center" width="10" class="width-75">Product</th>
            <th class="text-center" width="10" class="width-75">Mesh Option</th>
            <th class="text-center" width="10" class="width-75">Fixture</th>
            <th class="text-center" width="15" class="width-150">Config</th>
            <th class="text-center" width="25" class="width-250">Location</th>
            <th class="text-center" width="5" class="width-50">Hght mm</th>
            <th class="text-center" width="5" class="width-50">Wdth mm</th>
            <th class="text-center" width="5">Lock Type</th>
            <th class="text-center" width="5">Amount Incl GST</th>
        </tr>

        <?php foreach ($quote['products'] as $product): ?>
            <?php if ($product->product_qty > 0): ?>
                <tr>
                    <td class="text-center"><?= h($product->product_item_number) ?></td>
                    <td class="text-center"><?= h($product->product_qty) ?></td>
                    <td class="text-center"><?= h($product->product_sec_dig_perf_fibr) ?></td>
                    <td class="text-center"><?= h($product->product_316_ss_gal_pet) ?></td>
                    <?php if ($product->product_window_or_door == 'Window'): ?>
                        <td class="text-center">Win</td>
                    <?php elseif ($product->product_window_or_door == 'Door'): ?>
                        <td class="text-center"><?= h($product->product_window_or_door) ?></td>
                    <?php else: ?>
                        <td></td>
                    <?php endif; ?>
                    <td class="text-center"><?= h($product->product_configuration) ?></td>
                    <td class="text-center"><?= h($product->product_location_in_building) ?></td>
                    <td class="text-center"><?= h($product->product_height) ?></td>
                    <td class="text-center"><?= h($product->product_width) ?></td>
                    <td class="text-center">
                        <?php
                        if ($product->product_lock_type == 'Triple Lock') {
                            echo 'Triple';
                        } else {
                            echo $product->product_lock_type;
                        }
                        ?>
                    </td>
                    <td>
                        <?php if (!$flatCustomPrice): ?>
                            <span>$</span><?= h($product->product_cost) ?>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endif; ?>
        <?php endforeach; ?>
        <?php
        $midrail_total_cost = 0;
        foreach ($quote['midrails'] as $midrail) {
            $midrail_total_cost += $midrail->midrail_cost;
        }
        ?>
        <?php if ($midrail_total_cost > 0): ?>
            <tr>
                <td colspan="2"></td>
                <td colspan="8" class="text-center"><strong>Midrails</strong></td>
                <td><span>$</span><?= $midrail_total_cost; ?></td>
            </tr>
        <?php endif; ?>
        <tr>
            <td></td>
            <td>Qty</td>
            <td colspan="8"><strong>Sections and Accessories Required</strong></td>
            <td></td>
        </tr>
        <!--   Addtional Per Meters:     -->
        <?php foreach ($quote['additionalpermeters'] as $additionalpermeter): ?>
            <?php if ($additionalpermeter->additional_per_meter > 0): ?>
                <tr>
                    <td></td>
                    <td><?= h($additionalpermeter->additional_per_meter) ?></td>
                    <td colspan="8"><?= h($additionalpermeter->additional_name) ?></td>
                    <td>
                        <?php if (!$flatCustomPrice): ?>
                            <span>$</span><?= h($additionalpermeter->additional_price); ?>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endif; ?>
        <?php endforeach; ?>

        <!--    Additional Per Lengths:    -->
        <?php foreach ($quote['additionalperlength'] as $additionalperlength): ?>

            <?php if ($additionalperlength->additional_per_length > 0): ?>
                <tr>
                    <td></td>
                    <td><?= h($additionalperlength->additional_per_length) ?></td>
                    <td colspan="8"><?= h($additionalperlength->additional_name) ?></td>
                    <td>
                        <?php if (!$flatCustomPrice): ?>
                            <span>$</span><?= h($additionalperlength->additional_price); ?>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endif; ?>
        <?php endforeach; ?>

        <!--    Accessories:   -->
        <?php foreach ($quote['accessories'] as $accessory): ?>
            <?php if ($accessory->accessory_each > 0): ?>
                <tr>
                    <td></td>
                    <td><?= h($accessory->accessory_each) ?></td>
                    <td colspan="8"><?= h($accessory->accessory_name) ?></td>
                    <td>
                        <?php if (!$flatCustomPrice): ?>
                            <span>$</span><?= h($accessory->accessory_price); ?>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endif; ?>
        <?php endforeach; ?>

        <!--    Custom Items:   -->
        <?php foreach ($quote['customitems'] as $customitem): ?>
            <?php if ($customitem->custom_qty > 0): ?>
                <tr>
                    <td></td>
                    <td><?= h($customitem->custom_qty) ?></td>
                    <td colspan="8"><?= h($customitem->custom_description) ?></td>
                    <td>
                        <?php if (!$flatCustomPrice): ?>
                            <span>$</span><?= h($customitem->custom_charged); ?>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endif; ?>
        <?php endforeach; ?>

        <tr>
            <td colspan="2"></td>
            <td colspan="6"></td>
            <td colspan="2">Screen Total incl. GST</td>
            <td>
                <?php if (!$flatCustomPrice): ?>
                    <span>$</span><?= h($quote->total_sell_price - $quote->installation_total_cost); ?>
                <?php endif; ?>
            </td>
        </tr>
        <?php if (isset($quote->discount_amount) && $quote->discount_amount > 0): ?>
            <tr>
                <td colspan="2"></td>
                <td colspan="6"></td>
                <td colspan="2">Discount Applied</td>
                <td><span>$</span><?= h($quote->discount_amount); ?></td>
            </tr>
        <?php endif; ?>

        <tr>
            <td colspan="2"></td>
            <td colspan="6" class="text-center"><strong>Colour</strong></td>
            <td colspan="2">Installation</td>
            <td>
                <?php if (!$flatCustomPrice): ?>
                    <span>$</span><?= h($quote->installation_total_cost); ?>
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td colspan="6" class="text-center quote-colors">

                <?php if ($quote->standard) {
                    echo '<p>' . h($quote->standard_color) . '</p>';
                }
                ?>
                <?php if ($quote->color1) {
                    echo '<p>' . h($quote->color1_color) . '</p>';
                }
                ?>
                <?php if ($quote->color2) {
                    echo '<p>' . h($quote->color2_color) . '</p>';
                }
                ?><?php if ($quote->color3) {
                    echo '<p>' . h($quote->color3_color) . '</p>';
                }
                ?><?php if ($quote->color4) {
                    echo '<p>' . h($quote->color4_color) . '</p>';
                }
                ?>
            </td>
            <td colspan="2" style="vertical-align: middle;"><strong>Final Amount</strong></td>
            <td style="vertical-align: middle;">
                <strong>
                    <?php
                    echo '$';
                    if ($flatCustomPrice) {
                        echo h(floor($customQuotedAmount));
                    } else {
                        echo h(floor($quote->total_sell_price));
                    }
                    ?>
                </strong>
            </td>
        </tr>
        <tr>
            <td colspan="2">TERMS:</td>
            <td colspan="6"></td>
            <td colspan="2">Deposit Amount</td>
            <td>

                <?php
                echo '$';
                if ($authUser['deposit_percent'] > 0) {
                    if ($flatCustomPrice) {
                        echo round($authUser['deposit_percent'] * $customQuotedAmount / 100, 2);
                    } else {
                        echo round($authUser['deposit_percent'] * $quote->total_sell_price / 100, 2);
                    }
                } else {
                    echo '0';
                }
                ?>
            </td>
        </tr>
        <tr>
            <td colspan="4">*Estimate is subject to check measure</td>
            <td colspan="3">*Installation includes any freight/delivery charges if applicable</td>
            <td colspan="2">Bank Details</td>
            <td>Bank</td>
            <td><?= h($authUser['bank_name']) ?></td>
        </tr>
        <tr>
            <td colspan="4">*This estimate is valid for 30 days*</td>
            <td colspan="5"><strong>Please use the Order No as your payment reference</strong></td>
            <td>Account Name</td>
            <td><?= h($authUser['bank_account_name']) ?></td>
        </tr>
        <tr>
            <td colspan="9"></td>
            <td>BSB</td>
            <td><?= h($authUser['bsb']) ?></td>
        </tr>
        <tr>
            <td colspan="9"></td>
            <td>Acc No.</td>
            <td><?= h($authUser['bank_account_number']) ?></td>
        </tr>
        <tr>
            <td colspan="8">Please sign and return as authorisation that you would like to proceed with this Estimate,
                but please be aware in doing so that you have acknowledged this estimate and agree with the Terms and
                Conditions it in their entirety.
            </td>
            <td colspan="3"></td>
        </tr>
        <tr>
            <td style="padding: 40px 0;"></td>
            <th colspan="2">Customers Signature</th>
            <td></td>
            <td colspan="4" style="vertical-align: middle;">
                <hr/>
            </td>
            <td colspan="3" style="vertical-align: bottom;">
                <span style="margin-right: 30px;">Date:</span>
                <span style="margin-right: 30px;"> / </span>
                <span style="margin-right: 30px;"> / </span>
            </td>

        </tr>
        <tr>
            <td colspan="3"><strong>Notes to Customer:</strong></td>
            <td colspan="8"><?= h($quote->notes_customer); ?></td>
        </tr>
    </table>
</div>
