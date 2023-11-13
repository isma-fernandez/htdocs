-- RECORDAR QUITAR CAMPO ESTADO DE PRODUCTO

INSERT INTO categoria (id, nombre)
VALUES (1, 'Rock'),(2, 'Blues'),(3, 'Pop'),(4, 'Flamenco'),(5, 'Punk'),(6, 'Reggae'),(7, 'Jazz'),(8, 'Indie'),(9, 'Folk'),(10, 'Música clàssica'),(11, 'Hip-Hop'),(12, 'Electrònica'),(13, 'Rap');

INSERT INTO producte (titulo, artista, año_lanzamiento, precio, id_categoria, img)
VALUES ('Manual Para Los Fieles', 'Los Piratas', 2000, 25.99, 1, 'rock_1.jpg'),
('Vinilo Maiden Flight', 'Rainbird', 2000, 19.99, 1, 'rock_2.jpg'),
('Knockin On Heavens Door', 'Bob Dylan & Guns And Roses', 2000, 14.99, 1, 'rock_3.jpg'),
('Santa Claus Is Coming To Town', 'Bruce Springsteen', 2000, 14.99, 1, 'rock_4.jpg'),
('Rock & Roll Directo', 'Barricada', 2000, 29.99, 1, 'rock_5.jpg'),
('Play, Learn, Lose...', 'LandSlide', 2000, 11.99, 1, 'rock_6.jpg'),
('Cincuenta Años No Es Nada', 'Isthar', 2000, 13.99, 1, 'rock_7.jpg'),
('Heavy Horses', 'Jethro Tull', 2000, 27.99, 1, 'rock_8.jpg'),
('Songs From The Wood', 'Jethro Tull', 2000, 27.99, 1, 'rock_9.jpg'),
('El Sueño Eterno', 'Medina Azahara', 2000, 18.99, 1, 'rock_10.jpg'),
('Inside', 'Urban Sax', 2000, 29.99, 1, 'rock_11.jpg'),
('Atom Heart Mother Japan 1971', 'Pink Floyd', 2000, 20.99, 1, 'rock_12.jpg'),
('Hard To Imagine The Neighbourhood', 'Neighbourhood', 2000, 42.99, 1, 'rock_13.jpg'),
('Scorched', 'Overkill', 2000, 38.99, 1, 'rock_14.jpg'),
('True Confessions', 'Bananarama', 2000, 27.99, 2, 'blues_1.jpg'),
('The Greatest Hits Collection', 'Bananarama', 2000, 11.99, 2, 'blues_2.jpg'),
('The Complete Singles', 'B.B King', 2000, 26.99, 2, 'blues_3.jpg'),
('The Thrill of The Blues', 'B.B King', 2000, 14.99, 2, 'blues_4.jpg'),
('The Queen Of Soul', 'Aretha Franklin', 2000, 14.99, 2, 'blues_5.jpg'),
('Singles 1960-62', 'Aretha Franklin', 2000, 19.99, 2, 'blues_6.jpg'),
('Midnight To Midnight', 'Psychedelic Furs', 2000, 19.99, 3, 'pop_1.jpg'),
('Coplas En La Lumbre', 'Fatima Ru', 2000, 13.99, 4, 'flamenco_1.jpg'),
('Unholy Deification', 'Incantation', 2000, 29.99, 5, 'funk_1.jpg'),
('Conquering Lion', 'Bob Marley & The Wailers', 2000, 24.99, 6, 'reggae_1.jpg'),
('Free Me', 'J.P. Bimeni', 2000, 13.99, 7, 'jazz_1.jpg'),
('El Miedo y El Paraiso', 'Mikel Izal', 2000, 29.99, 8, 'indie_1.jpg'),
('Another Budokan 1978', 'Bob Dylan', 2000, 32.99, 9, 'folk_1.jpg'),
('Queen of Baroque', 'Cecilia Bartoli', 2000, 21.99, 10, 'classic_1.jpg'),
('HNDRXX', 'Future', 2000, 26.99, 11, 'hip_1.jpg'),
('Oxymore Reworks', 'Jean Michel Jarre', 2000, 18.99, 12, 'elec_1.jpg'),
('Back To Rockport', 'Kidd Keo', 2000, 12.99, 13, 'rap_1.jpg');
