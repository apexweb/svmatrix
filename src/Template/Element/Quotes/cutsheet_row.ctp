<tr id="cutsheet-row-<?= $i ?>" class="cutsheets-rows">
    <?= $this->Form->hidden('cutsheets.' . $i . '.id'); ?>
    <td>
        <?= $this->Form->input('cutsheets.' . $i . '.qty', ['label' => false, 'class' => 'form-control input-sm']); ?>
    </td>

    <td>
        <?= $this->Form->input('cutsheets.' . $i . '.section', ['label' => false, 'class' => 'form-control input-sm']); ?>
    </td>

    <td>
        <?= $this->Form->input('cutsheets.' . $i . '.colour', ['label' => false, 'class' => 'form-control input-sm']); ?>
    </td>

    <td>
        <?= $this->Form->input('cutsheets.' . $i . '.cut_to_size', ['label' => false, 'class' => 'form-control input-sm']); ?>

    </td>
    <td>


        <?= $this->Form->input('cutsheets.' . $i . '.notes', ['label' => false, 'class' => 'form-control input-sm']); ?>

    </td>

    <td>
        <button type="button"
                class="delete-btn cutsheet-delete-btn"><i class="typcn typcn-delete"></i>
        </button>
    </td>

</tr>