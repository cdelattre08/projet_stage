function choixPersonne(chaine)
{
    var a = document.getElementById("Urgent");
    var b = document.getElementById("Moyen");
    
    if (chaine == 'cacher1')
    {
        // Contraction du code commenté ci dessous
        a.style.display = "block";
        b.style.display = "none";
      
    }
    else
    {
        a.style.display = "none";
        b.style.display = "block";
    }
}