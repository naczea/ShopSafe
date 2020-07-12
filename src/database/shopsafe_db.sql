CREATE DATABASE IF NOT EXISTS shopsafe_db


CREATE TABLE IF NOT EXISTS users(
	id_user INT(10) NOT NULL COMMENT 'Cedula PK',
	name_user VARCHAR(30) NOT NULL,
	last_user VARCHAR(30) NOT NULL,
	mail_user VARCHAR(30) NOT NULL,
	phone_user INT(10) NOT NULL,
	pass_user VARCHAR(100) NOT NULL,
	state_user BOOLEAN DEFAULT NULL,
	PRIMARY KEY (id_user)
) 


CREATE TABLE IF NOT EXISTS store(
	id_store BIGINT(13) NOT NULL COMMENT 'RUC/cedula',
	name_store VARCHAR(20) NOT NULL,
	type_store INT(1) NOT NULL COMMENT '1-market/2-hair/3-restaurant',
	adress_store VARCHAR(100),
	description_store VARCHAR(100),
	logo_store BLOB,
	shop_store BOOLEAN COMMENT 'Apta para turnos',
	turn_store BOOLEAN COMMENT 'Apta para compras', 
	PRIMARY KEY (id_store)
)


CREATE TABLE IF NOT EXISTS turn(
	id_turn INT(10) NOT NULL,
	id_user INT(10) NOT NULL, 
	id_shop INT(10) NOT NULL,
	date_turn
	time_turn
	state_turn BOOLEAN, 
	wait_turn INT(2),
	PRIMARY KEY (id_turn)
	FOREIGN KEY (id_user, id_shop)
)