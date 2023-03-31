<?php echo $this->extend('templatesFiles/templates') ?>

<?php echo $this->section('title') ?>
Nota
<?php echo $this->endSection() ?>

<?php echo $this->section('navbar') ?>
<?php echo $this->endSection() ?>

<?php echo $this->section('content') ?>


<?php foreach ($blog as $nota) : ?>
    <h1><?= $nota['title'] ?></h1>
    <p><?= html_entity_decode($nota['entry']) ?></p>
<?php endforeach; ?>


<?php echo $this->endSection() ?>

<?php echo $this->section('footer') ?>
<?php echo $this->endSection() ?>