CREATE TABLE acionamento (
  id int NOT NULL,
  tipo_sensor int NOT NULL,
  sensor int NOT NULL,
  qnt_acionamento bigint NOT NULL
);


CREATE TABLE tipo_sensor (
  id int NOT NULL,
  tipo varchar(100) NOT NULL,
  icon varchar(200) NOT NULL,
  color varchar(200) NOT NULL
);


CREATE TABLE sensor (
  id int NOT NULL,
  tipo_sensor int NOT NULL,
  descricao varchar(200) NOT NULL,
  valor float NOT NULL,
  dt_hr datetime NOT NULL
);

CREATE TABLE sensor_temp (
  id int NOT NULL,
  tipo_sensor int NOT NULL,
  descricao varchar(200) NOT NULL,
  valor float NOT NULL,
  dt_hr datetime NOT NULL
);

ALTER TABLE acionamento
  ADD PRIMARY KEY (id),
  ADD KEY tipo_sensor (tipo_sensor),
  ADD KEY sensor (sensor);

ALTER TABLE sensor
  ADD PRIMARY KEY (id),
  ADD KEY tipo_sensor (tipo_sensor);

ALTER TABLE sensor_temp
  ADD PRIMARY KEY (id),
  ADD KEY tipo_sensor (tipo_sensor);

ALTER TABLE tipo_sensor
  ADD PRIMARY KEY (id);

ALTER TABLE acionamento
  MODIFY id int NOT NULL AUTO_INCREMENT;

ALTER TABLE sensor
  MODIFY id int NOT NULL AUTO_INCREMENT;

ALTER TABLE sensor_temp
  MODIFY id int NOT NULL AUTO_INCREMENT;


ALTER TABLE tipo_sensor
  MODIFY id int NOT NULL AUTO_INCREMENT;


ALTER TABLE acionamento
  ADD CONSTRAINT acionamento_ibfk_1 FOREIGN KEY (tipo_sensor) REFERENCES tipo_sensor (id),
  ADD CONSTRAINT acionamento_ibfk_2 FOREIGN KEY (sensor) REFERENCES sensor_temp (id);

--
-- Limitadores para a tabela sensor
--
ALTER TABLE sensor
  ADD CONSTRAINT sensor_ibfk_1 FOREIGN KEY (tipo_sensor) REFERENCES tipo_sensor (id);

--
-- Limitadores para a tabela sensor_temp
--
ALTER TABLE sensor_temp
  ADD CONSTRAINT sensor_temp_ibfk_1 FOREIGN KEY (tipo_sensor) REFERENCES tipo_sensor (id);
COMMIT;



INSERT INTO tipo_sensor (id, tipo, icon, color) VALUES
(1, 'umidade', 'fas fa-tint fa-2x', 'success'),
(2, 'pluviometrico', 'fas fa-cloud-rain fa-2x', 'primary'),
(5, 'temperatura ', 'fas fa-temperature-low fa-2x', 'danger');



INSERT INTO sensor (id, tipo_sensor, descricao, valor, dt_hr) VALUES
(1, 1, 'SensorUmidade', 30, '2020-01-01 15:10:23'),
(2, 2, 'Sensor Chuva 01', 34, '2022-02-06 15:32:57'),
(3, 5, 'Sensor Temperatura 01', 32, '2022-02-09 18:26:53'),
(4, 5, 'Sensor Temperatura 02', 23, '2022-02-09 18:27:34'),
(5, 2, 'Sensor Chuva 01', 200, '2022-02-09 18:27:51'),
(6, 1, 'Sensor de Umidade', 45, '2022-09-02 06:41:54'),
(7, 1, 'Sensor de Umidade 02', 34.2, '2022-09-02 06:43:13');
