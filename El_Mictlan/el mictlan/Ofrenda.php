<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ofrenda Virtual | El Mictlán</title>
<meta name="description" content="Ofrenda virtual de El Mictlán en honor al Día de Muertos.">
<link rel="icon" href="imn/favicon.png" type="image/png">
<link rel="stylesheet" href="style.css">
</head>
<body>
<?php include "header.php"; ?>

<section class="page-hero ofrenda-hero">
    <div class="papel-picado" aria-hidden="true">
        <?php for ($i = 0; $i < 14; $i++): ?><span></span><?php endfor; ?>
    </div>
    <p>EL MICTLÁN · COMUNIDAD</p>
    <h1>Ofrenda Virtual</h1>
    <span>Próximamente: una experiencia interactiva hecha en Processing.</span>
</section>

<section class="ofrenda section altar-section">

    <div id="ofrendaProcessing" class="ofrenda-processing-vacio">
        <p>🕯️ Esta sección está en construcción.<br>Próximamente, una ofrenda interactiva hecha en Processing.</p>
    </div>
</section>

<?php include "footer.php"; ?>
<script src="script.js"></script>
</body>
</html>