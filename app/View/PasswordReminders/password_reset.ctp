<div class="users form">
<?php echo $this->Form->create('PasswordReminders', array('type' => 'post', 'url' => 'password_reset')); ?>
    <fieldset>
<br>
    <legend><?php echo __('Add User'); ?></legend>
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <?php
            if (!empty($error)) {
                echo '<p>パスワードとパスワード確認が一致しません</p>';
            }
        ?>
      <tr>
        <th>パスワード</th>
        <td>
          <?php echo $this->Form->input('password', array('label' => false, 'div' => false)); ?>
        </td>
      </tr>
      <tr>
        <th>パスワード確認</th>
        <td>
          <?php echo $this->Form->input('password1', array('label' => false, 'div' => false, 'type' => 'password')); ?>
        </td>
      </tr>
      </table>
    <?php echo $this->Form->hidden('User.id', array('value' => $user_id)); ?>
    <?php echo $this->Form->hidden('passwordReminder.id', array('value' => $passwordReminder_id)); ?>
    </fieldset>
<?php echo $this->Form->end(__('確認')); ?>
</div>
