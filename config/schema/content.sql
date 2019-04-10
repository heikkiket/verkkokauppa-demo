use verkkokauppa_testi;

INSERT INTO soitintyypit(id, soitintyyppi)
VALUES
(1, 'elektromekaaninen'),
(2, 'analoginen syntetisaattori'),
(3, 'akustinen'),
(4, 'digitaalinen syntetisaattori');

INSERT INTO tuotteet (nimi, tuotekoodi, valmistusvuosi, mitat, paino, hinta, kuvaus, soitintyyppi)
VALUES
('Hammond', 1, 1963, '50x100x150', 30, 6000.00, 'Upea urku', 1),
('Rhodes', 2, 1967, '50x100x150', 12, 4000.00, 'Kaunis piano', 1),
('Clavinet', 3, 1971, '50x100x150', 6, 3500.00, 'Kunnon funky!', 1),
('Moog', 4, 1971, '40x60x70', 5, 6500.00, 'Legendaarinen syntikka', 2),
('Arp 2600', 5, 1970, '55x120x157', 5.5, 4500.00, 'Kovat bassot!', 2 ),
('Yamaha DX7', 6, 1982, '150x30x15', 10, 3000.00, 'FM madness', 4 );

INSERT INTO kayttajat (id, nimi, toimitusosoite, email, puhelin, salasana, rooli)
VALUES
(1, 'Terttu Testaaja', 'Testikatu 123, Oulu', 'terttu.testaaja@esimerkki.fi', '050 123 4567', '$2y$10$1gbR.p1COtcTihfU9SL30eRX5t5JMYPsLLVcie5wJ0w3z.nFXBBOa', 'admin'), /* salasana */
(2, 'Pertti Kokeilija', 'Kokeilukatu 56, Kerava', 'pertti.kokeilija@esimerkki.fi', '044 876 5432', '$2y$10$kTA.hLAOlYMaPeS7d/Ovi.wRIBN8ZHeRSTgbQH7kya4v4Ee1YGbeG', 'customer'), /* asdasd */
(3, 'Emilia Empijä', 'Lempokatu 87, Lempäälä', 'emilia.epailija@esimerkki.fi', '040 233 4556', '$2y$10$.dwvP.vXBhG99L/wPE9XZeBlQauSxA8HpEEs75UaPGi8zKZ1SCFzK', 'customer'); /* kakkale */

INSERT INTO ostoskori (id, kayttaja_id)
VALUES
(1, 1),
(2, 2);

INSERT INTO ostoskorituotteet (id, tuotekoodi, ostoskori_id)
VALUES
(1, 3, 1),
(2, 1, 1),
(3, 2, 1),
(4, 2, 2),
(5, 2, 2),
(6, 2, 2);