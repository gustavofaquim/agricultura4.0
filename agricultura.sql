CREATE database agricultura;
use agricultura;

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
  descricao varchar(200) NOT NULL,
  valor float NOT NULL,
  dt_hr datetime NOT NULL,
  primary key(id),
  foreign key(tipo_sensor) REFERENCES tipo_sensor(id)
);

CREATE TABLE sensor_temp (
  id int NOT NULL AUTO_INCREMENT,
  tipo_sensor int NOT NULL,
  descricao varchar(200) NOT NULL,
  valor float NOT NULL,
  dt_hr datetime NOT NULL,
  primary key(id),
  foreign key(tipo_sensor) REFERENCES tipo_sensor(id)
);

CREATE TABLE acionamento(
  id int NOT NULL AUTO_INCREMENT,
  tipo_sensor int NOT NULL,
  sensor int NOT NULL,
  qnt_acionamento bigint NOT NULL,
  primary key(id),
  foreign key(tipo_sensor) REFERENCES tipo_sensor(id),
  foreign key(sensor) REFERENCES sensor_temp (id)
);

INSERT INTO tipo_sensor (id, tipo, icon, color) VALUES
(1, 'umidade', 'fas fa-tint fa-2x', 'success'),
(2, 'pluviometrico', 'fas fa-cloud-rain fa-2x', 'primary'),
(3, 'temperatura ', 'fas fa-temperature-low fa-2x', 'danger'),
(4, 'ar', 'fas fa-wind  fa-2x', 'secondary');



/*INSERT INTO sensor (id, tipo_sensor, descricao, valor, dt_hr) VALUES
(1, 1, 'SensorUmidade', 30, '2020-01-01 15:10:23'),
(2, 2, 'Sensor Chuva 01', 34, '2022-02-06 15:32:57'),
(3, 5, 'Sensor Temperatura 01', 32, '2022-02-09 18:26:53'),
(4, 5, 'Sensor Temperatura 02', 23, '2022-02-09 18:27:34'),
(5, 2, 'Sensor Chuva 01', 200, '2022-02-09 18:27:51'),
(6, 1, 'Sensor de Umidade', 45, '2022-09-02 06:41:54'),
(7, 1, 'Sensor de Umidade 02', 34.2, '2022-09-02 06:43:13');*/



-- Evento
CREATE EVENT media_sensores
    ON SCHEDULE
      EVERY 20 SECOND
    DO
      INSERT INTO sensor_temp (tipo_sensor, descricao, valor, dt_hr) -- insere os registros
        (SELECT s.tipo_sensor, t.tipo, avg(s.valor) as 'media', NOW() FROM sensor s
        INNER JOIN tipo_sensor t ON t.id = s.tipo_sensor
        group by tipo_sensor order by tipo_sensor);
      TRUNCATE TABLE sensor; -- apaga os dados da tabela
      ALTER TABLE sensor AUTO_INCREMENT = 1   -- reseta o indice da tabela
