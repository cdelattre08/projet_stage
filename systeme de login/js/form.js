function end_form()
{
var champ_obligatoire = [ 'type', 'cycle', 'priorite', 'probleme'];
var champ_plein = true;
for (var h=0; h<4; h++)
{
    valeur = document.getElementById(champ_obligatoire[h]).value;
    if( (valeur.length == 0) || (valeur == "") || (valeur == "NULL") )
    {
        champ_plein = false;
    }
}
 
if (champ_plein)
{
document.getElementById('submit').disabled = false;
 
}
else
{
document.getElementById('submit').disabled = true;
}
}