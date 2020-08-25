function choix1()
{
    //Ceci va te renvoyer la value de l'option sur laquelle tu as cliqué ce qui peut être utile pour la suite..
    var value_option=liste.options.value;
    //liste correpond au name de ma balise select 
    //======
     
    //Creation d'un élément
    var option=document.createElement('input');
    //Instanciation du type d'élément : text...
    option.type=("text");
    //Instanciation de la valeur de l'input text
    option.value=value_option;
     
    //On fixe ce champ input dans la div elements
    document.getElementById('elements').appendChild(option);
}

function choix2()
{
    //Ceci va te renvoyer la value de l'option sur laquelle tu as cliqué ce qui peut être utile pour la suite..
    var value_option=liste.options[liste.selectedIndex].value;
    //liste correpond au name de ma balise select 
    //======
     
    //Creation d'un élément
    var option=document.createElement('input');
    //Instanciation du type d'élément : text...
    option.type=("date");
    //Instanciation de la valeur de l'input text
    option.value=value_option;
     
    //On fixe ce champ input dans la div elements
    document.getElementById('yo').appendChild(option);
}

