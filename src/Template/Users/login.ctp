<div class="users form">
<?= $this->Flash->render('auth') ?>
<?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Please enter your username and password') ?></legend>
        <?= $this->Form->control('username') ?>
        <?= $this->Form->control('password') ?>
        <div style="width:30%;margin:auto;">
        <?= $this->Form->button([__('Login')],["class"=>"button"]); ?>
        </div>
    </fieldset>

<?= $this->Form->end() ?>
</div>