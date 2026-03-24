<h2>New Contact Message</h2>

<p><strong>Name:</strong> <?= e($name) ?></p>
<p><strong>Email:</strong> <?= e($email) ?></p>

<p>
<strong>Message:</strong><br>
<?= nl2br(e($message)) ?>
</p>