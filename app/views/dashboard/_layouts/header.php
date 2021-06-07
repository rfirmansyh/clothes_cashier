<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | <?= $data['title'] ?></title>

    <link rel="stylesheet" href="<?= BASE_URL; ?>/public/vendors/bootstrap4/bootstrap.min.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>/public/css/app.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container-dashboard">
        <?php $this->view('dashboard/_layouts/sidebar') ?>
        <main class="content-wrapper">
        <?php $this->view('dashboard/_layouts/navbar') ?>
            <section class="content">
            <div class="container">
            <?php Flasher::flash(); ?>
            </div>