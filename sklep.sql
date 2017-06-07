
CREATE TABLE kategorie (
    kategoria_id serial primary key NOT NULL,
    kategoria text
);

CREATE TABLE towary (
    towar_id serial primary key NOT NULL,
    nazwa text,
    opis text,
    cena decimal(10,2),
    waga decimal(10,2),
    kategoria_id integer references kategorie
);


CREATE TABLE statusy (
    status_id serial primary key NOT NULL,
    status text NOT NULL
);

CREATE TABLE zamowienia (
    zamowienie_id serial primary key NOT NULL,
    status_id integer NOT NULL references statusy,
    email text,
	data timestamp,
	adres text
);

CREATE TABLE pozycje (
    towar_id integer NOT NULL references towary,
    zamowienie_id integer NOT NULL references zamowienia,
    sztuk integer DEFAULT 1 NOT NULL
);

ALTER TABLE ONLY pozycje
    ADD CONSTRAINT pozycje_pkey PRIMARY KEY (towar_id, zamowienie_id);


INSERT INTO kategorie (kategoria) VALUES ('części');
INSERT INTO kategorie (kategoria) VALUES ('odzież');
INSERT INTO kategorie (kategoria) VALUES ('literatura');
INSERT INTO kategorie (kategoria) VALUES ('inne');


INSERT INTO statusy (status) VALUES ('otwarte');
INSERT INTO statusy (status) VALUES ('zamknięte');


INSERT INTO towary (nazwa, opis, cena, waga, kategoria_id)
 VALUES ('rama ACCENT EL NIŃO', 'Rama MTB. Wykonana z obrabianego termicznie stopu aluminium 7005-T6. Górna i dolna rura ramy wykonane w procesie hydroformowania.', 469.00, 1850.00, 1);
INSERT INTO towary (nazwa, opis, cena, waga, kategoria_id)
 VALUES ('piasta SHIMANO DEORE HB-M530', 'Poprawiony system uszczelnienia. Pierścienie typu o-ring na przedniej piaście oraz tuleja z wewnętrznym smarowaniem w tylnej piaście. Łożyska kulkowe. Bieżnie łożysk są szlifowane w technologii CBN (sześcienny azotek boru), co zapewnia większą trwałość oraz bardzo płynne obracanie się. Opcje kolor', 28.80, 300.00, 1);
INSERT INTO towary (nazwa, opis, cena, waga, kategoria_id)
 VALUES ('rogi Tioga Power Studs 6', 'Rogi kierownicy wykonane z aluminium, doskonałe na dłuższe wycieczki rowerowe! ', 74.90, 420.00, 1);
INSERT INTO towary (nazwa, opis, cena, waga, kategoria_id)
VALUES ('rogi Tioga Rogi Power Studs 7', 'Rogi kierownicy wykonane z aluminium, doskonałe na dłuższe wycieczki rowerowe! ', 74.90, 430.00, 1);
INSERT INTO towary (nazwa, opis, cena, waga, kategoria_id) VALUES ('siodełko Allay Racing 1.1', 'Poszycie wykonane z oddychającej skóry, po bokach laminowana powłoka odporna na przetarcie.', 348.99, 250.00, 1);
INSERT INTO towary  (nazwa, opis, cena, waga, kategoria_id) VALUES ('siodełko Electra Sweethart', 'Stylowe siodło damskie amerykańskiej firmy ELECTRA to idealny gadżet do damskich rowerów miejskich, siodło gwarantuje wygode (b. szerokie, posiada mocne spreżyny) jak i niepowtarzalność damskiego roweru. To właśnie tego typu akcesoria sprawiają, że rowery przestają być szare i nijakie a świat wokół wydaje się kolorowy.', 158.00, 450.00, 1);
INSERT INTO towary  (nazwa, opis, cena, waga, kategoria_id) VALUES ('obręcz Alexrims Ace18 Srebrna', 'Srebna kapslowana obręcz z przeznaczeniem trekkingowym. Pod hamulce typu V-Brake. ', 59.00, 655.00, 1);
INSERT INTO towary  (nazwa, opis, cena, waga, kategoria_id) VALUES ('Reebok Opaski na ręce RE-20417', 'Profesjonalne OPASKI NA RęCE (para) renomowanej firmy Reebok Professional Idealna ochrona dla Twoich dłoni!!! Cechy: zrobione z bawełny ', 18.00, 200.00, 2);
INSERT INTO towary  (nazwa, opis, cena, waga, kategoria_id) VALUES ('Daniken Bandaż Bokserski Elastyczny 3,5m', 'Bandaż Bokserski elastyczny 3,5mBandaże bokserskie, elastyczne 3,5m ', 25.00, 200.00, 2);
INSERT INTO towary  (nazwa, opis, cena, waga, kategoria_id) VALUES ('DANIKEN Ochraniacz Piszczeli Extreme PU', 'Szczegółowy opis Ochraniacz Piszczeli Extreme PU Ochraniacze piszczeli (para), zapinane na gumy o szerokości 5 cm z rzepem. ', 59.00, 450.00, 2);
INSERT INTO towary  (nazwa, opis, cena, waga, kategoria_id) VALUES ('Mój powrót do życia. Nie tylko o kolarstwie', 'Armstrong Lance, Jenkins Sally. ISBN: 83-88931-30-X. Wydawca: Studio EMKA Klara Molnar/Kotarbińskiego/. Ilość stron: 312. Oprawa: twarda z obwolutą. Jest to opowieść o triumfie, tragedii, transformacji i transcendencji kolarza wszech czasów, Lance''a Armstronga, jego dzieciństwie, wczesnych sukcesach, walce z rakiem, leczeniu, powrocie do życia, małżeństwie i pierwszych chwilach ojcostwa. Zwycięstwo Lance''a Armstronga w kolarskim wyścigu Tour de France zastało okrzyknięte pamiętnym wydarzeniem w historii sportu ostatniego wieku. W 1996 roku Lance Armstrong założył fundację swojego imienia - organizację charytatywną, wspierającą wszelkie działania, których celem jest walka z chorobą nowotworową. ', 35.22, 150.00, 3);

