Pseudocode för yatzyspelet.

Initziera variabler i sessionen på sidan innan som behövs, för att spara värden, sparade tärningar, poäng osv. 

Skapa funktion Rulla_tärningar. (
    Skapa två stycken if satser som räknar ut när man har kastat tre slag och den andra räknar ut när man har spelat alla rundor av spelet och det är slut.

    Skapa ett objekt av klassen Dicehand som tar antal yatzyslag som parameter.
    Sedan rulla tärningarna med hjälp av klassens funkition roll.
    Få värderna med hjälp av metoden values och spara dem i sessionen.

    Anropa funktionen visa_sparade(med värdet på de sparade tärningarna)
    Anropa funktionen visa_information(med värdet på tärningarna som paramteter)

    Lägger till 1 till variablen yatzyrundor i session för att få rulla max 3 gånger varje runda.
  )

Skapa funktionen visa_information, (tar som parameter värdena av tärningarna) (
    Med värdena på tärningarna presentera grafisk tärning som motsvarar vilket värde.
    Skapa en länk eller formulär som man kan klicka på för att kunna spara tärningarna.

  )

Skapa funktionen spara_tärningar (
    Tar värdet ifrån formuläret ifrån funktionen med hjälp av post för att spara det i sessionen som en array.
    Minska på antal yatzyslag, för att få en mindre tärning att kasta.
    Ta bort det värdet på den sparade tärningen i sessions arrayen för värdena.

    Anropa funktionen visa_information(med värdet på tärningarna som paramteter)
    Anropa funktionen visa_sparade(med värdet på de sparade tärningarna)
  )

Skapa funktion visa_sparade (
  Visar grafiskt vilka tärningar som har blivit sparade i sessionen
  )

Skapa funktionen spela_rundor (
    Anropas ifrån funktionen rulla_tärningar när en runda tar slut.
    Räkna ut poängen på de sparade tärningarna, med hjälp av funktionen array_count_values för att bara räkna med tärningarna av själva yatzyspelets (1-6) olika rundor. Lägger till detta till en variabel totalpoeng i sessionen.

    Plussa på variabeln i sessionen som håller reda på vilken runda det är.

    Html rubriker för att skriva ut poäng för rundan och totalpoäng.
    Reset alla variabler i sessionen förutom totalpoäng och varaibeln som håller reda på vilken runda det är.
    Möjligtvis behövs något formulär eller liknande för att komma tillbaka till start sidan.

  )

Skapafunktion färdig_spelat (
  Anropas ifrån rulla tärningar när alla rundor har spelats.
    I html rubirker skriver ut att spelet är slut och visa upp poäng.
    Återställa alla variabler så att spelet kan starta igen.
  )
