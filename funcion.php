<?php 
# funcion para formatear moneda
function monedas2($cantidad)
{
if(!is_numeric($cantidad) ) $cantidad = 0;
return "$ " . number_format($cantidad,2);
}
function monedas4($cantidad)
{
return "$ " . number_format($cantidad,2);
}
function decimales2($cantidad)
{
if(!is_numeric($cantidad) ) $cantidad = 0;
return  number_format($cantidad, 2, '.', ',');
}
function numeros2($cantidad)
{
if(!is_numeric($cantidad) ) $cantidad = 0;
return  number_format($cantidad, 2, '.', '');
}
function numeros6($cantidad)
{
if(!is_numeric($cantidad) ) $cantidad = 0;
return  number_format($cantidad, 6, '.', '');
}
function numeros4($cantidad)
{
if(!is_numeric($cantidad) ) $cantidad = 0;
return  number_format($cantidad, 4, '.', '');
}
function decimales($cantidad)
{
return  number_format($cantidad, 2, '.', ',');
}

function decimales4($cantidad)
{
return  number_format($cantidad, 4, '.', ',');
}

function decimalesf4($cantidad)
{
return  number_format($cantidad, 4, '.', '');
}

function porcentaje2($cantidad)
{
return sprintf("%.2f%%", $cantidad * 100);
}
?>