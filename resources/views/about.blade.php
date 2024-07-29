
<!DOCTYPE html>
<html>

<head>
  @include('home.css')
  <style>
p{
    font-size: 18px;
    margin-left: 30px;
}
h1,h2,h3
{
    margin-left: 20px;
}
</style>
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
    <!-- end header section -->
  </div>
  <!-- end hero area -->

  <body>
    <div style="font-family: Arial, sans-serif; padding: 20px; background-color: #f9f9f9;">
        <h1>About</h1>
        <p>Welkom op mijn League of Legends webwinkel. Ik heb dit onderwerp gekozen omdat ik het leuk vind om te maken en dit is ook een game dat ik al meer dan 10 jaar speel.<br>
        Probeer de website te verkennen door elk punt te lezen en de functies uit te proberen voordat je doorgaat naar het volgende punt.</p> <br>
        <p>Deze project werd gemaakt in Laravelx11</p>

        <h2>Uitleg over mijn project:</h2>
        <br>
        
        <h3>1. Homepagina / Productwinkel:</h3>
        <p>Op de homepagina zie je een lijst met enkele producten die beschikbaar zijn in de winkel.<br>
        Gebruikers kunnen deze producten kopen, en admins kunnen nieuwe items maken of bestaande items bewerken.<br>
        Je kunt op de "home" knop of op "User view" voor admins in de navigatiebalk/sidebar klikken om naar deze pagina te gaan.</p>

        <h3>2. Profielpagina:</h3>
        <p>Dit is een eenvoudige profielpagina waar de gebruikersnaam, geboortedatum en bio worden weergegeven.<br>
        Deze informatie is bewerkbaar.<br>
        Om je profiel te wijzigen, klik je op "profile" in het dropdownmenu waar je naam verschijnt wanneer je bent ingelogd.</p>

        <h3>3. Inventaris:</h3>
        <p>Wanneer je een product koopt, wordt je saldo bijgewerkt en gaat het product automatisch naar je inventaris,<br>
        waar je een overzicht hebt van al je producten. Je kan naar uw inventory gaan door op inventory te klikken in de navigatiebalk.</p>

        <h3>4. FAQ:</h3>
        <p>Gebruikers kunnen veelgestelde vragen lezen, die zijn onderverdeeld in categorieën.<br>
        Admins kunnen categorieën en vragen met antwoorden verwijderen, bewerken of toevoegen.</p>

        <h3>5. Contact:</h3>
        <p>Admins: hebben een "Contactpaneel" in hun sidebar om je contactberichten te beantwoorden.<br>
        Gebruikers: kunnen hun oude contacten zien door op "contact us" in de navigatiebalk of de slider te klikken.<br>
        Hier zie je alle beantwoordde en onbeantwoordde vragen die jij hebt gevraagt. Een admin kan vragen beantwoorden.<br>
        Gebruikers: kunnen vragen stellen en de status en/of antwoorden op hun gestelde vragen bekijken. Probeer het uit met een user@gmail.com account (password).</p>

        <h3>6. Gebruikerslijst:</h3>
        <p>Admins hebben ook toegang tot een gebruikerslijst die te vinden is in de zijbalk van het admin dashboard door op "All Users" te klikken.<br>
        Hier zien ze alle gebruikersinformatie en kunnen ze iemand promoten tot admin of hun adminsrol verwijderen.</p>

        <h3>Afbeeldingen:</h3>
        <p>Alle afbeeldingen komen van League Wiki behalve de gebruikersafbeeldingen.</p>

        <h3>HTML:</h3>
        <p>Sommige HTML is gedownload en je kunt deze vinden in de public folder. <br>
            Deze zijn gegeven in de youtube playlist in de references
        </p>
    </div>



  <br><br>
  <h3>References:</h3>


<p> https://www.youtube.com/watch?v=kR4fhanxOf4&list=PLm8sgxwSZofdmlPxaDB7fRLv_NVe2uFKl&index=1 Looked most videos of the playlist. <br>
https://laravel.com/docs/11.x<br>
https://stackoverflow.com/questions/60445320/how-to-make-button-visible-once-to-admin-type-user-in-laravel<br>
</p>

  <!-- info section -->

  @include('home.footer')

  <!-- end info section -->


  <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <script src="{{asset('js/custom.js')}}"></script>

</body>






