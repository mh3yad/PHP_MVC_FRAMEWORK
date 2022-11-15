<?php
/**
 * @var string $name;
 */
$app = \app\core\Application::$app;
?>
<h1>Home page</h1>
<?php if(!$app->isGuest()): ?>

<h1>Welcome <?= $name  ?></h1>
<?php endif;?>