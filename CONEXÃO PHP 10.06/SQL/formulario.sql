CREATE DATABASE formulario;
USE formulario;

CREATE TABLE mensagem (
  id      int     (11)            NOT NULL AUTO_INCREMENT PRIMARY KEY ,
  name    varchar (255)           NOT NULL                            ,
  email   varchar (255)           NOT NULL                            ,
  number  char    (13)            NOT NULL                            ,
  subject varchar (120)           NOT NULL                            , 
  message text                    NOT NULL                            ,
  date    varchar (255)           NOT NULL                            ,
  time    varchar (255)           NOT NULL                            ,
  read    tinyint (1)             NOT NULL
);

CREATE TABLE usuario (
  id        int     (11)           NOT NULL AUTO_INCREMENT PRIMARY KEY ,
  username  varchar (25)           NOT NULL                            ,
  email     varchar (255)          NOT NULL                            ,
  password  char    (15)           NOT NULL                            ,
  gender    enum    ('h','m','nb') NOT NULL                            ,
  number    char    (13)           NOT NULL                            ,
  credits   double                 NOT NULL                            ,
  admin     tinyint (1)            NOT NULL
);

CREATE TABLE produto (
  id            int     (11)                                                NOT NULL AUTO_INCREMENT PRIMARY KEY ,
  name          varchar (120)                                               NOT NULL                            ,
  description   text                                                        NOT NULL                            ,
  price         double                                                      NOT NULL                            ,
  quantity      int     (4)                                                 NOT NULL                            ,
  sells         int                                                         NOT NULL                            ,
  brand         enum    ('FUNKO POP','FIGMA','DARK HORSE','TSUME ARTS')     NOT NULL                            ,
  material      enum    ('PVC'      ,'Vinil','ABS'       ,'Polystone')      NOT NULL                            ,
  articulation  tinyint (1)                                                 NOT NULL
);

-- tabela teste
CREATE TABLE tbimagem (
  id    int(11)   NOT NULL AUTO_INCREMENT PRIMARY KEY,
  data  longblob  NOT NULL
);


/*

  segure Alt para fazer multi seleção de linhas (quassim tá bom?)

*/