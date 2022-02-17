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
  id int not null AUTO_INCREMENT,
  descricao varchar(300) not null,
  usuario varchar(20) not null,
  primary key(id, usuario),
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
  central int not null
  descricao varchar(200) NOT NULL,
  valor float NOT NULL,
  dt_hr datetime NOT NULL,
  primary key(id),
  foreign key(tipo_sensor) REFERENCES tipo_sensor(id),
  foreign key(central) REFERENCES central(id)
);

CREATE TABLE sensor_temp (
  id int NOT NULL AUTO_INCREMENT,
  tipo_sensor int NOT NULL,
  central int not null
  descricao varchar(200) NOT NULL,
  valor float NOT NULL,
  dt_hr datetime NOT NULL,
  primary key(id),
  foreign key(tipo_sensor) REFERENCES tipo_sensor(id),
  foreign key(central) REFERENCES central(id)
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
  ('produtor')

insert into usuarios(nome, usuario, senha, grupo) values
('Teste01', 'teste01', SHA1('teste01'), 1),
('Teste02', 'teste02', SHA1('teste02'), 2);


insert into central(descricao, usuario) values
('Central da Fazenda Rio Vermelho', 'teste02');

INSERT INTO tipo_sensor (id, tipo, icon, color) VALUES
(1, 'umidade', 'fas fa-tint fa-2x', 'success'),
(2, 'pluviometrico', 'fas fa-cloud-rain fa-2x', 'primary'),
(3, 'temperatura ', 'fas fa-temperature-low fa-2x', 'danger'),
(4, 'ar', 'fas fa-wind  fa-2x', 'secondary');


insert into sensor_temp(tipo_sensor, central, descricao, valor, dt_hr) values
(1,1,'Sensor de Umidade 01', 2000, NOW())



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
