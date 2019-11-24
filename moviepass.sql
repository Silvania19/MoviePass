    create database MoviePass;
    #drop database MoviePass;
    use MoviePass;

    create table genres(
    idGenre int,
    name varchar(20),
    primary key(idGenre)
    );

    create table movies(
    idMovie int ,
    title varchar(60),
    originalTitle varchar(60),
    originalLenguage varchar(60),
    overview varchar(60),
    posterPath varchar(60),
    releaseDate date,
    idGenres int,
    backdropPath varchar(60),
    popularity int,
    voteCount int,
    foreign key(idGenres) references genres(idGenre),
    primary key(idMovie)
    );

    create table users(
    idUser int auto_increment,
    name varchar(15),
    lastName varchar(15),
    password varchar(15),
    dni int,
    email varchar(40) unique,
    primary key(idUser)
    );

    alter table users add column idRol int;

    create table cines(
    idCine int auto_increment,
    name varchar(15),
    idUserAdministrator int,
    address varchar(20),
    email varchar(30) unique,
    primary key(idCine),
    foreign key(idUserAdministrator) references users(idUser)
    );

    alter table cines change address address varchar(100);

    create table projections(
    idProjection int auto_increment,
    date date,
    hour time,
    idMovie int,
    idCine int,
    primary key(idProjection),
    foreign key(idCine) references cines(idCine)
    );

    insert into projections(date,hour,idMovie,idCine,idCinema) value("2019/11/28", "16:00", 423204, 2, 19);

   create table purchases(
    idPurchase int auto_increment,
    discount float, 
    amount float,
    quantityTickets int, 
    idProjection int,
    time date,
    idUser int,
    primary key(idPurchase),
    foreign key (idProjection) references projections (idProjection)
    );
  
   
    alter table projections add column idCinema int;
    alter table projections add  foreign key (idCinema) references cinemas (idCinema) ;
    alter table projections add column duration time;
  
    create table tickets(
    idTicket int auto_increment,
    numberTicket int,
    qr int,
    idProjection int, 
    price int,
    idUser int,
    primary key(idTicket),
    foreign key(idProjection) references projections(idProjection),
    foreign key(idUser) references users(idUser)
    );


    create table cinemas(
    idCinema int auto_increment,
    idCine int,
    numberCinema int,
    capacity int,
    primary key(idCinema),
    foreign key(idCine) references cines(idCine)
    );

    alter table cinemas add column price float;
    alter table cinemas change numberCinema nameCinema varchar(20);

    create table pays(
    idPay int auto_increment,
    wayToPay varchar(20),
    idPurchase int,
    fecha datetime,
    numberAcount int,
    primary key(idPay),
    foreign key(idPurchase) references purchases(idPurchase)
    );

    insert into users(name, lastName, password , dni,email, idRol) value("silvania", "ortega" , "magia", 95123457, "sil@ortega",2);
    insert into users(name, lastName, password , dni,email, idRol) value("rodrigo", "rodriguez" , "rodri", 95183967, "rodri@rodri", 1);

    insert into cines( name, idUserAdministrator, address) value("Ablassador", 1,  "Mar del plata rivadavia 2345");
    insert into cines( name, idUserAdministrator, address) value("Gallegos", 1, " Mar del plata gascon 3445");
    insert into cines( name, idUserAdministrator, address) value("Aldrey", 1, "mar del plata la rawson 2344");

    insert into cinemas(idCine,  nameCinema, capacity, price) value(1, 'sala 1',40, 100);
    insert into cinemas(idCine,  nameCinema, capacity, price) value(1, 'sala 2',20, 150);
    insert into cinemas(idCine, nameCinema,capacity,price) value(2,'sala 1', 50, 75);
    insert into cinemas(idCine, nameCinema,capacity,price) value(2,'sala 2', 20, 120);
    insert into cinemas(idCine, nameCinema,capacity,price) value(3,'sala 1', 20, 150);
    insert into cinemas(idCine, nameCinema,capacity,price) value(3,'sala 2', 25, 150);
    
   

