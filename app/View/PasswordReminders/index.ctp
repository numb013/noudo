<div class="users form">
<?php echo $this->Form->create('PasswordReminders', array('type' => 'post', 'url' => 'index')); ?>
    <fieldset>
<br>
    <legend><?php echo __('Add User'); ?></legend>
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <?php
            if (!empty($error)) {
                echo '<p>メールアドレスが不正です</p>';
            }
        ?>
      <tr>
        <th>メールアドレス</th>
        <td>
          <?php echo $this->Form->input('email', array('label' => false, 'div' => false)); ?>
        </td>
      </tr>
      </table>
    </fieldset>
<?php echo $this->Form->end(__('送信')); ?>
</div>
