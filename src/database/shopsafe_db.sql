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


CREATE TABLE IF NOT EXISTS shop(
	id_shop INT(10) NOT NULL COMMENT 'RUC/ID',
	name_shop VARCHAR(20) NOT NULL,
	type_shop INT(1) NOT NULL,
	adress_shop VARCHAR(100),
	shop_shop BOOLEAN,
	turn_shop BOOLEAN,
	time1_shop 
	time2_shop
	PRIMARY KEY (id_shop)
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