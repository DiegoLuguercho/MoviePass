create database moviePass;
use moviePass;

create table generos( id_genero int not null auto_increment,
                      nombre varchar(50),
                      constraint pk_generos primary key (id_genero));

create table peliculas( id_pelicula int not null auto_increment,
                        titulo varchar(50),
                        duracion varchar (10),
                        resenia varchar(1000),
                        imagen varchar(100),
                        id_genero int not null,
                        constraint pk_peliculas primary key (id_pelicula),
                        constraint fk_genero_peliculas foreign key (id_genero) references generos(id_genero));

create table cines( id_cine int not null auto_increment,
                    nombre varchar(50),
                    cantidadSalas int not null,
                    direccion varchar(50),
                    constraint pk_cines primary key (id_cine));
                         
create table salas(id_sala int not null auto_increment,
                   id_cine int not null,
                   nombre varchar(50),
                   capacidad int not null,
                   constraint pk_sala primary key (id_sala),
                   constraint fk_sala_cine foreign key (id_cine) references cines(id_cine));

                       
create table funciones( id_funcion int not null auto_increment,
                        dia date,
						hora time,
                        lenguaje varchar(50),
                        id_pelicula int not null,
                        id_cine int not null,
                        id_sala int not null,
                        precio int not null,
                        constraint pk_funciones primary key (id_funcion),
                        constraint fk_funcion_pelicula foreign key (id_pelicula) references peliculas(id_pelicula),
                        constraint fk_funcion_cine foreign key (id_cine) references cines(id_cine),
                        constraint fk_funcion_sale foreign key (id_sala) references salas(id_sala));

create table users( id_user int not null AUTO_INCREMENT,
                    nombre varchar(50),
                    apellido varchar(50),
                    email varchar(50),
                    dni int not null,
                    pass varchar(25),
                    role varchar(15),
                    constraint pk_users primary key (id_user));

create table entradas( id_entrada int not null AUTO_INCREMENT,
                       id_funcion int not null,
                       codigo_qr varchar(50),
                       constraint pk_entradas primary key (id_entrada),
                       constraint fk_entrada_funcion foreign key (id_funcion) references funciones(id_funcion));

create table tarjetasCredito( id_tarjetaCredito int not null AUTO_INCREMENT,
                              nombre varchar(50),
                              numero int not null,
                              mes int not null,
                              año int not null,
                              digitos int not null,
                              constraint pk_tarjetasCredito primary key (id_tarjetaCredito)
                              );
                      

insert into users(nombre, apellido, email, dni, pass, role) values 
("Administrador", "Administrator", "admin@admin.com", 99999999, "admin", "admin"),
("Juan", "Perez", "juanperez@gmail.com", 12345678, "123456", ""),
("Pedro", "Lopez", "pedrolopez@gmail.com", 87654321, "123456", ""),
("Juana", "Gomez", "juanagomez@gmail.com", 13579246, "123456", ""),
("Florencia", "Diaz", "flordiaz@gmail.com", 97531864, "123456", ""),
("Diego", "Luguercho", "diegoluguercho18@gmail.com", 39590951, "123456", "");

insert into generos(nombre) values
("Drama"),
("Fantasia"),
("Suspenso"),
("Terror"),
("Comedia"),
("Aventura");

insert into peliculas(titulo, duracion, resenia, imagen, id_genero) VALUES
("Joker", "2h 2m", "Arthur Fleck es un hombre ignorado por la sociedad, cuya motivación en la vida es hacer reír. Pero una serie de trágicos acontecimientos le llevarán a ver el mundo de otra forma. Película basada en Joker, el popular personaje de DC Comics y archivillano de Batman, pero que en este film toma un cariz más realista y oscuro.", "imagen.jpg", 1),
("Terminator: destino oculto", "2h 14m", "Sarah Connor une todas sus fuerzas con una mujer cyborg para proteger a una joven de un extremadamente poderoso y nuevo Terminator.", "imagen2.jpg",2),
("Maléfica: dueña del mal", "1h 58m", "Secuela de Maléfica que cuenta la vida de Maléfica y Aurora, así como las alianzas que formarán para sobrevivir a las amenazas del mágico mundo en el que habitan.", "imagen3.jpg",2),
("One Piece: Stampede", "1h 41m", "Sé testigo de una batalla campal entre piratas, marines, los Siete Señores de la Guerra y el Ejército Revolucionario con motivo del Festival de los Piratas.", "imagen4.jpg", 2),
("Doctor Sueño", "2h 31m", "Seguimos a Danny Torrace, traumatizado y con problemas de ira y alcoholismo. Estos problemas reflejan los de su propio padre, que cuando tiene sus habilidades psíquicas de vuelta, contacta con una niña, Abra Stone, a la que debe de rescatar de un grupo de viajeros que se alimentan de niños.","imagen5.jpg", 3),
("The King", "2h 20m", "Hal, un príncipe caprichoso y sin interés por ejercer su derecho al trono de Inglaterra, ha abandonado las responsabilidades reales para vivir en libertad entre la plebe. Sin embargo, ante la muerte de su tirano padre, Hal se ve obligado a retomar la vida de la que quería huir para ser el nuevo rey: Enrique V. Después de su coronación, el joven monarca tendrá que aprender a lidiar con las intrigas palaciegas, una guerra y los lazos que le unen a su antigua vida.","imagen6.jpg", 1),
("A 47 metros 2: el terror emerge", "1h 29m", "La película sigue a un grupo de chicas en busca de aventuras en la costa de Recife. Con la esperanza de salir del rutinario sendero turístico, las chicas escuchan algo acerca de unas ruinas submarinas ocultas, pero descubren que bajo las olas turquesas, su Atlantis secreta no está completamente deshabitada.","imagen7.jpg", 4),
("Chicos buenos", "1h 30m", "Con la esperanza de aprender a besar, Max, de 12 años, decide usar el dron de su padre para espiar a las chicas, pero accidentalmente lo extravía. Para localizarlo de nuevo, Max y otros dos amigos se ausentan de clase y toman una serie de decisiones erróneas, metiéndose en más y más líos.","imagen8.jpg", 5),
("Frozen 2", "2h", "La reina Elsa, su hermana Anna, Kristoff, Olaf y Sven se embarcan en un nuevo viaje al interior del bosque para descubrir la verdad sobre un antiguo misterio de su reino.","imagen9.jpg", 2),
("Geminis", "1h 25m", "Henry Brogan es un asesino a sueldo que decide retirarse porque se ha hecho viejo. Pero esto no le va a resultar tan fácil, pues tendrá que enfrentarse a un clon suyo, mucho más joven.","imagen10.jpg", 3),
("It Capítulo 2", "2h 50m", "En el misterioso pueblo de Derry, un malvado payaso llamado Pennywise vuelve 27 años después para atormentar a los ya adultos miembros del Club de los Perdedores, que ahora están más alejados unos de otros.","imagen11.jpg", 4),
("Zombieland: Mata y remata", "1h 39m", "Los cazadores de zombis viajan desde la Casa Blanca hasta el corazón de los Estados Unidos, donde tendrán que defenderse de nuevas clases de muertos vivientes que han evolucionado. Mientras intentan salvar el mundo, los miembros de la pandilla también tendrán que aprender a convivir.","imagen12.jpg", 5),
("Dora y la ciudad perdida", "1h 42m", "Dora se pone al frente de un equipo formado por su amigo peludo Botas; Diego, un misterioso habitante de la jungla; y un desorganizado grupo de adolescentes en una aventura en la que deberán salvar a los padres de Dora y resolver el misterio oculto tras una ciudad perdida de oro.","imagen13.jpg", 6),
("Midway: batalla en el Pacífico", "2h 18m", "Los soldados y pilotos estadounidenses cambiaron el curso de la Segunda Guerra Mundial durante la Batalla de Midway en junio de 1942. Las fuerzas navales japonesas y estadounidenses lucharon durante cuatro días.","imagen14.jpg", 1),
("John Wick: Parabellum", "2h 10m", "John Wick regresa de nuevo pero con una recompensa sobre su cabeza que persigue unos mercenarios. Tras asesinar a uno de los miembros de su gremio, Wick es expulsado y se convierte en el foco de atención de todos los sicarios de la organización.","imagen15.jpg", 3);


insert into cines(nombre, cantidadSalas, direccion) values 
("Cine Paseo Aldrey", 3, "Sarmiento 2685" ),
("Cine Del Paseo", 3, "D. Pueyrredon 3058 "),
("Cine Ambassador", 4, "Cordoba 1673"),
("Cine Cinema", 2, "Rivadavia 3050 - Los Gallegos Shopping");

insert into salas(id_cine, nombre, capacidad) values 
(1, "Sala Atmos", 120),
(1, "Sala B", 100),
(1, "Sala C", 100),
(2, "Sala A", 90),
(2, "Sala B", 90),
(2, "Sala C", 90),
(3, "Sala 1", 100),
(3, "Sala 2", 90),
(3, "Sala 3", 90),
(3, "Sala 4", 90),
(4, "Sala A", 110),
(4, "Sala B", 110);

insert into funciones(dia, hora, lenguaje, id_pelicula, id_cine, id_sala, precio) values 
('2019-11-20', "22:30", "Ingles - Subtitulado", 1, 1, 1, 400), 
('2019-11-21', "22:15", "Ingles - Subtitulado", 1, 2, 5, 300), 
('2019-11-20', "22:45", "Ingles - Subtitulado", 2, 3, 7, 250),
('2019-11-21', "23:00", "Ingles - Subtitulado", 2, 4, 12, 300),
('2019-11-22', "19:30", "Latino", 3, 1, 1, 400), 
('2019-11-23', "19:15", "Latino", 3, 2, 5, 300), 
('2019-11-22', "19:45", "Latino", 4, 3, 7, 250),
('2019-11-23', "19:00", "Latino", 4, 4, 12, 300),
('2019-11-24', "22:30", "Ingles - Subtitulado", 5, 1, 1, 400), 
('2019-11-25', "22:15", "Ingles - Subtitulado", 5, 2, 5, 300),
('2019-11-24', "22:45", "Ingles - Subtitulado", 6, 3, 7, 250),
('2019-11-25', "23:00", "Ingles - Subtitulado", 6, 4, 12, 300),
('2019-11-26', "19:30", "Latino", 7, 1, 1, 400), 
('2019-11-27', "19:15", "Latino", 7, 2, 5, 300), 
('2019-11-26', "19:45", "Latino", 8, 3, 7, 250),
('2019-11-27', "19:00", "Latino", 8, 4, 12, 300),
('2019-11-28', "22:30", "Ingles - Subtitulado", 9, 1, 1, 400), 
('2019-11-29', "22:15", "Ingles - Subtitulado", 9, 2, 5, 300),
('2019-11-28', "22:45", "Ingles - Subtitulado", 10, 3, 7, 250),
('2019-11-29', "23:00", "Ingles - Subtitulado", 10, 4, 12, 300),
('2019-11-30', "19:30", "Latino", 11, 1, 1, 400), 
('2019-12-01', "19:15", "Latino", 11, 2, 5, 300), 
('2019-11-30', "19:45", "Latino", 12, 3, 7, 250),
('2019-12-01', "19:00", "Latino", 12, 4, 12, 300),
('2019-12-02', "22:30", "Ingles - Subtitulado", 13, 1, 1, 400), 
('2019-12-03', "22:15", "Ingles - Subtitulado", 13, 2, 5, 300),
('2019-12-02', "22:45", "Ingles - Subtitulado", 14, 3, 7, 250),
('2019-12-03', "23:00", "Ingles - Subtitulado", 14, 4, 12, 300),
('2019-12-04', "19:45", "Latino", 15, 3, 7, 250),
('2019-12-05', "19:00", "Latino", 15, 4, 12, 300); 


