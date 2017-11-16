<h1><small><?= __('Settings') ?></small></h1>
<?php 
$product_fields = $fields['products'];
$additional_per_meter_fields = $fields['additional_section']['additional_section_per_meter'];
$additional_per_length_fields = $fields['additional_section']['additional_section_per_length'];
$accessories_fields = $fields['additional_section']['accessories'];
?>
<?= $this->Form->create($settings, ['class' => 'form-horizontal field-settings', 'enctype' => 'multipart/form-data']) ?>
<?php 
    if(isset($settings->data) && $settings->data != ''){
       $selected_fields = unserialize(base64_decode($settings->data));
    }
?>
    <div class="panel-group">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" href="#collapseOne-1" aria-expanded="false" class="collapsed">
                        PRODUCTS
                    </a>
                </h4>
            </div>
            <div id="collapseOne-1" class="panel-collapse collapse">
                <div class="panel-body">

                    <fieldset>
                        <div class="form-group">
                            <?php foreach($product_fields as $name => $label){?>
                                <div class="col-sm-12">
                                    <div class="checkbox checkbox-primary">
                                        <?php
                                          $checked = (isset($selected_fields['settings']['products'][$name]) && $selected_fields['settings']['products'][$name] == 1) ? "checked":"";
                                        ?>
                                        <?= $this->Form->input("settings[products][$name]", ['type' => 'checkbox', 'label' => $label,$checked,
                                                'templates' => ['nestingLabel' => '{{hidden}}{{input}}<label{{attrs}}>{{text}}</label>']])
                                    ?>

                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" href="#collapseOne-2" aria-expanded="false" class="collapsed">
                        ADDITIONAL SECTIONS/ACCESSORIES
                    </a>
                </h4>
            </div>
            <div id="collapseOne-2" class="panel-collapse collapse">
                <div class="panel-body">

                    <fieldset>
                        <div class="form-group">                      
                            <div class="col-sm-4">
                                <h3>Per Meter</h3>
                                <?php foreach($additional_per_meter_fields as $name => $label){?>
                                    <div class="checkbox checkbox-primary">
                                        <?php
                                          $checked = (isset($selected_fields['settings']['additional_per_meter'][$name]) &&  $selected_fields['settings']['additional_per_meter'][$name] == 1) ? "checked":"";
                                        ?>
                                        <?= $this->Form->input("settings[additional_per_meter][$name]", ['type' => 'checkbox', 'label' => $label, $checked, 
                                                'templates' => ['nestingLabel' => '{{hidden}}{{input}}<label{{attrs}}>{{text}}</label>']])
                                    ?>

                                    </div>
                                <?php } ?>
                            </div>
                            <div class="col-sm-4">
                                <h3>Per Length</h3>
                                <?php foreach($additional_per_length_fields as $name => $label){?>
                                    <div class="checkbox checkbox-primary">
                                        <?php
                                          $checked = (isset($selected_fields['settings']['additional_per_length'][$name] ) &&  $selected_fields['settings']['additional_per_length'][$name] == 1) ? "checked":"";
                                        ?>
                                        <?= $this->Form->input("settings[additional_per_length][$name]", ['type' => 'checkbox', 'label' => $label, $checked, 
                                                'templates' => ['nestingLabel' => '{{hidden}}{{input}}<label{{attrs}}>{{text}}</label>']])
                                    ?>

                                    </div>
                                <?php } ?>
                            </div>
                            <div class="col-sm-4">
                                <h3>Accessories</h3>
                                <?php foreach($accessories_fields as $name => $label){?>
                                    <div class="checkbox checkbox-primary">
                                        <?php
                                          $checked = (isset($selected_fields['settings']['accessories'][$name]) &&  $selected_fields['settings']['accessories'][$name] == 1) ? "checked":"";
                                        ?>
                                    <?= $this->Form->input("settings[accessories][$name]", ['type' => 'checkbox', 'label' => $label, $checked, 
                                                'templates' => ['nestingLabel' => '{{hidden}}{{input}}<label{{attrs}}>{{text}}</label>']])
                                    ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
    <?= $this->Form->Button('Save', ['class' => 'btn btn-primary waves-effect save-settings-btn btn-sm', 'type' => 'submit']) ?>
<?= $this->Form->end() ?>
