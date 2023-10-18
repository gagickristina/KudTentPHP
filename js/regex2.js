function provera(){



    var test1=/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{5,}$/;
    var tekst1= document.registracija.nLozinka.value;
    var rez1= tekst1.match(test1);
    if(rez1 == null)
    {
        alert("Lozinka mora imati minimum 5 karaktera i jedan broj.")
    }
    var tekst2= document.registracija.nPonLozinka.value;

    if(tekst1 != tekst2)
    {
        alert("Niste lepo ponovili lozinku.")
    }

}