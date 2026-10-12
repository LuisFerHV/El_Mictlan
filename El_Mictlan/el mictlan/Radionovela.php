<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Radionovela de terror | El Mictlán</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<?php include "header.php"; ?>

<section class="page-hero ofrenda-hero">
    <div class="papel-picado" aria-hidden="true">
        <?php for ($i = 0; $i < 14; $i++): ?><span></span><?php endfor; ?>
    </div>
    <p>EL MICTLÁN · RELATOS</p>
    <h1>Radionovela de terror</h1>
    <span>Una leyenda para escuchar con la luz apagada y un café en la mano.</span>
</section>

<section class="radio section">
    <div class="radio-aparato">
        <div class="radio-rejilla" aria-hidden="true">
            <?php for ($i = 0; $i < 7; $i++): ?><span></span><?php endfor; ?>
        </div>

        <div class="radio-info">
            <h2 id="radioTitulo">Los Caminos del Diablo en Neza</h2>
            <p class="radio-capitulo">Duración aprox. 6 min</p>
        </div>

        <audio id="radioAudio" preload="metadata" src="imn/radionovela.mp3"></audio>

        <div class="radio-controles">
            <button type="button" id="radioPlay" class="radio-play" aria-label="Reproducir">▶</button>

            <div class="radio-progreso">
                <span id="radioActual">0:00</span>
                <input type="range" id="radioBarra" value="0" min="0" max="100" step="0.1">
                <span id="radioDuracion">0:00</span>
            </div>

            <div class="radio-volumen">
                <span>🔊</span>
                <input type="range" id="radioVolumen" min="0" max="1" step="0.01" value="1">
            </div>
        </div>
    </div>

    <div class="radio-sinopsis">
        <h2>De qué trata</h2>
        <p>
            En una aparente calle tranquila del municipio de Nezahualcóyotl se esconde una aterradora leyenda urbana. 
            Lo que comenzó con ruidos inexplicables a altas horas de la madrugada terminó en una experiencia espeluznante: 
            la aparición de una siniestra figura vestida de negro arrastrando pesadas cadenas y los restos de sus víctimas por las escaleras.  
             Vecinos y familiares confirman la presencia de estos fenómenos, revelando la oscura verdad detrás de los llamados "caminos del diablo", 
             senderos paranormales de los que parece imposible escapar.
        </p>
        <p class="radio-creditos">Relato original de El Mictlán</p>
    </div>
</section>

<?php include "footer.php"; ?>
<script src="script.js"></script>
</body>
</html>