@echo off
REM Ejecuta este archivo DENTRO de la carpeta imn\ de tu proyecto
REM (copialo ahi, o cambia la linea "cd" de abajo por tu ruta real).
REM Hace doble clic -> renombra las 6 fotos que tenian espacios.

cd /d "%~dp0"

ren "arroz con leche.jpg" "arroz-con-leche.jpg"
ren "cafe con leche.jpeg" "cafe-con-leche.jpeg"
ren "cafe de olla.jpg" "cafe-de-olla.jpg"
ren "pan de elote.jpg" "pan-de-elote.jpg"
ren "pan de morido.jpg" "pan-de-morido.jpg"
ren "tamales normales.jpg" "tamales-normales.jpg"

echo.
echo Listo. Revisa arriba si alguna linea dio error
echo (significa que ese archivo ya no se llamaba asi, o ya estaba renombrado).
pause
