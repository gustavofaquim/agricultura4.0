CREATE database agricultura;
use agricultura;


CREATE TABLE grupos(
  id int not null AUTO_INCREMENT,
  nome varchar(30) not null,
  primary key(id)
);

CREATE TABLE usuarios(
  id int not null AUTO_INCREMENT,
  nome varchar(150) not null,
  usuario varchar(20) not null,
  senha varchar(300) not null,
  grupo INT  NOT NULL,
  ativo BOOL NOT NULL DEFAULT '1',
  UNIQUE KEY usuario (usuario),
  foreign key (grupo) REFERENCES grupos(id),
  primary key(id)
);


CREATE TABLE central(
  cod varchar(300) not null,
  descricao varchar(300) not null,
  usuario varchar(20) not null,
  primary key(cod),
  foreign key(usuario) REFERENCES usuarios(usuario)
);


CREATE TABLE tipo_sensor (
  id int NOT NULL AUTO_INCREMENT,
  tipo varchar(100) NOT NULL,
  icon varchar(200) NOT NULL,
  color varchar(200) NOT NULL,
  primary key(id)
);

CREATE TABLE sensor (
  id int NOT NULL AUTO_INCREMENT,
  tipo_sensor int NOT NULL,
  central varchar(300) not null,
  descricao varchar(200) NOT NULL,
  primary key(id),
  foreign key(tipo_sensor) REFERENCES tipo_sensor(id),
  foreign key(central) REFERENCES central(cod)
);

CREATE TABLE valor_sensor(
  id int not null AUTO_INCREMENT,
  sensor int not null,
  valor float NOT NULL,
  dt_hr datetime NOT NULL,
  primary key(id),
  foreign key(sensor) REFERENCES sensor(id)
);

CREATE TABLE valor_sensor_temp(
  id int not null AUTO_INCREMENT,
  sensor int not null,
  valor float NOT NULL,
  dt_hr datetime NOT NULL,
  primary key(id),
  foreign key(sensor) REFERENCES sensor(id)
);



/*CREATE TABLE acionamento(
  id int NOT NULL AUTO_INCREMENT,
  tipo_sensor int NOT NULL,
  sensor int NOT NULL,
  qnt_acionamento bigint NOT NULL,
  primary key(id),
  foreign key(tipo_sensor) REFERENCES tipo_sensor(id),
  foreign key(sensor) REFERENCES sensor_temp (id)
);*/

insert into grupos(nome) values
  ('administrador'),
  ('produtor');

insert into usuarios(nome, usuario, senha, grupo) values
('Teste01', 'teste01', SHA1('teste01'), 1),
('Teste02', 'teste02', SHA1('teste02'), 2);


insert into central(cod,descricao, usuario) values
('203x898m92x8x93m','Fazenda Rio Vermelho', 'teste02'),
('fjdh8343847843m7','IF Goiano', 'teste02'),
('212uuy1uyuycxcct','IFG', 'teste01');

INSERT INTO tipo_sensor (id, tipo, icon, color) VALUES
(1, 'umidade', 'fas fa-tint', 'success'),
(2, 'pluviometrico', 'fas fa-cloud-rain', 'primary'),
(3, 'temperatura ', 'fas   fa-temperature-low', 'danger'),
(4, 'ar', 'fas fa-wind', 'info');


insert into sensor(tipo_sensor, central, descricao) values
(1,'203x898m92x8x93m','Sensor de Umidade 01'),
(3,'203x898m92x8x93m','Sensor de Temperatura'),
(1,'fjdh8343847843m7','Sensor de Umidade 01');

insert into valor_sensor_temp(sensor,valor,dt_hr) values
(1, 90, '2022-02-05 12:40:20'),
(1, 50, '2022-02-05 14:40:20'),
(1, 90, '2022-02-05 17:57:20'),
(1, 90, '2022-02-05 19:57:20'),
(1, 90, '2022-02-05 21:57:20'),
(2, 37, '2022-02-05 12:40:20'),
(2, 35, '2022-02-05 14:40:20'),
(2, 36, '2022-02-05 17:57:20'),
(2, 28, '2022-02-05 19:57:20'),
(2, 26, '2022-02-05 21:57:20'),
(3, 40, '2022-02-05 12:57:20');





-- Eventos
CREATE EVENT insere_media
    ON SCHEDULE
      EVERY 40 SECOND
    DO 
      INSERT INTO sensor (tipo_sensor, descricao, valor, dt_hr) -- insere os registros
        (SELECT s.tipo_sensor, t.tipo, avg(s.valor) as 'media', NOW() FROM sensor_temp s
        INNER JOIN tipo_sensor t ON t.id = s.tipo_sensor
        group by tipo_sensor order by tipo_sensor);


CREATE EVENT limpa_tabela
    ON SCHEDULE
      EVERY 41 SECOND
    DO 
	TRUNCATE TABLE sensor_temp; -- apaga os dados da tabela

CREATE EVENT reseta_indice
    ON SCHEDULE
      EVERY 42 SECOND
    DO 
ALTER TABLE sensor_temp AUTO_INCREMENT = 1;   -- reseta o indice da tabela
