<tr id="additional-l-row-<?= $i ?>">
    <?= $this->Form->hidden('additionalperlength.' . $i . '.id'); ?>
    <td>
        <?= $this->Form->input('additionalperlength.' . $i . '.additional_item_number', ['label' => false, 'class' => 'form-control additional-per-length product-item-no']); ?>
    </td>

    <td>

        <?= $this->Form->input('additionalperlength.' . $i . '.additional_per_length', ['label' => false, 'class' => 'form-control additional-per-length additional-length']); ?>

    </td>
    <td>

        <?= $this->Form->input(
            'additionalperlength.' . $i . '.additional_name',
            [
                'type' => 'select',
                'multiple' => false,
                'options' => $additional_per_length,
                'empty' => true,
                'label' => false,
                'class' => 'form-control additional-per-length additional-name'
            ]
        ); ?>

    </td>
    <td>

        <?= $this->Form->input('additionalperlength.' . $i . '.additional_price',
            ['label' => false, 'class' => 'form-control additional-total-price span-input', 'readonly' => 'readonly']); ?>

    </td>

    <td>
        <button style="visibility: hidden;" type="button"
                class="delete-btn addtional-l-delete"><i class="typcn typcn-delete"></i>
        </button>
    </td>


</tr>