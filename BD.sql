

CREATE TABLE mvc_usuarios (id int primary key auto_increment, 
username varchar(20) unique not null, 
password varchar(255) unique not null, 
fechaHoraDeRegistro datetime not null,
fechaUltimaSesion date,
horaUltimaSesion time
);




