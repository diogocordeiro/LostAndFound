# dados para login
-- mysql -h z37udk8g6jiaqcbx.cbetxkdyhwsb.us-east-1.rds.amazonaws.com -u mfq6jgrmyzj9p0lx -pmqg8ln28l4fgjbrh n6tab27cmhizxmgg < schema.sql

CREATE TABLE usuarios (
  id int(11) NOT NULL AUTO_INCREMENT,
  nome varchar(20) DEFAULT NULL,
  sobrenome varchar(30) DEFAULT NULL,
  email varchar(40) NOT NULL,
  senha varchar(32) NOT NULL,
  dNascimento date NOT NULL,
  situacao int(1) NOT NULL,
  PRIMARY KEY ( id )
);


