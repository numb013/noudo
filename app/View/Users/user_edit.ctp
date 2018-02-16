
        <div id="about">
            <div class="bg-color-sky-light">
                <div class="content-lg container">
                    <div class="row">

<div class="users form">
<?php echo $this->Form->create('User', array('type' => 'post', 'url' => 'user_edit')); ?>
    <fieldset>
<br>
    <legend><?php echo __('Add User'); ?></legend>
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
      <tr>
        <th>お名前</th>
      </tr>
      <tr>
        <td class='form_td'>
          <?php echo $this->Form->input('full_name', array('label' => false, 'div' => false, 'class' => 'form_edit')); ?>
        </td>
      </tr>
      <tr>
        <th>お名前カナ</th>
      </tr>
      <tr>
        <td class='form_td'>
          <?php echo $this->Form->input('full_name_kana', array('label' => false, 'div' => false, 'class' => 'form_edit')); ?>
        </td>
      </tr>


      <tr>
        <th>郵便番号</th>
      </tr>

      <tr>
        <td class='form_td'>
          <?php echo $this->Form->input('zip', array('name' => 'zip', 'label' => false, 'div' => false, 'onKeyUp' => "AjaxZip3.zip2addr(this,'','address1','address1')", 'class' => 'form_edit')); ?>
        </td>
      </tr>

      <tr>
        <th>住所1</th>
      </tr>
      <tr>
        <td class='form_td'>
          <?php echo $this->Form->input('address1', array('name' => 'address1', 'label' => false, 'div' => false, 'class' => 'form_edit')); ?>
        </td>
      </tr>

      <tr>
        <th>住所2</th>
      </tr>
      <tr>
        <td class='form_td'>
          <?php echo $this->Form->input('address2', array('label' => false, 'div' => false, 'class' => 'form_edit')); ?>
        </td>
      </tr>

      <tr>
        <th>電話番号</th>
      </tr>
      <tr>
        <td class='form_td'>
          <?php echo $this->Form->input('tel', array('label' => false, 'div' => false, 'class' => 'form_edit')); ?>
        </td>
      </tr>

      <tr>
        <th>メールアドレス（ID）</th>
      </tr>
      <tr>
        <td class='form_td'>
          <?php echo $this->Form->input('mail_address', array('label' => false, 'div' => false, 'class' => 'form_edit')); ?>
        </td>
      </tr>


      </table>
    <?php echo $this->Form->hidden('User.id', array('value' => $this->request->data['User']['id'])); ?>
    </fieldset>
<?php echo $this->Form->end(__('確認')); ?>
</div>

</div>
</div>
</div>
</div>
