 function provera(){



    var test2=/^([A-Z])\w+/g;
    var tekst2= document.registracija.nIme.value;
    var rez2= tekst2.match(test2);
    if(rez2 == null)
    {
        alert("Morate uneti ime velikim slovom.")
    }

    var test3=/^([A-Z])\w+/g;
    var tekst3= document.registracija.nPrezime.value;
    var rez3= tekst3.match(test3);
    if(rez3 == null)
    {
        alert("Morate uneti prezime velikim slovom.")
    }

    var test1=/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g;
    var tekst1= document.registracija.nEmail.value;
    alert(tekst1);
    var rez1= tekst1.match(test1);
    if(rez1 != null)
    {
        alert("Ako ne uspete da se ulogujete takav mejl vec postoji.")
    }

    var test4=/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{5,}$/;
    var tekst4= document.registracija.nLozinka.value;
    var rez4= tekst4.match(test4);
    if(rez4 == null)
    {
        alert("Lozinka mora imati minimum 5 karaktera i jedan broj.")
    }
    var tekst5= document.registracija.nPonLozinka.value;

    if(tekst4 != tekst5)
    {
        alert("Niste lepo ponovili lozinku.")
    }

    





}