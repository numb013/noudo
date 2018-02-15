<div class="row">
<div class="animate-box" style="padding:70px 0px 30px 0px;">
    <div class="container">

<?php if (empty($error)): ?>
        <?php if ($error == 1): ?>
        <div class="row">
            <div style="text-align:center">
                <p>無効なアドレスです。</p>
                <p><a href="/Users/login">ログイン画面</a></p>
            </div>
        </div>
      <?php elseif($error == 2): ?>
        <div class="row">
            <div style="text-align:center">
                <p>不正なアクセスです。</p>
                <p><a href="/Users/login">ログイン画面</a></p>
            </div>
        </div>
      <?php endif; ?>
<?php elseif(): ?>
        <div class="row">
            <div style="text-align:center">
                <h2>Thank You!</h2>
                <p>パスワード再設定が完了致しました。</p>
                <p><a href="/Users/login">ログイン画面</a></p>
            </div>
        </div>
<?php endif; ?>
    </div>
</div>
<?php echo $this->element('bottom'); ?>
