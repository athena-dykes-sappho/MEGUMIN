CREATE DATABASE formulario;
USE bd_foda;

CREATE TABLE mensagem (
  id      int     (11)            NOT NULL AUTO_INCREMENT PRIMARY KEY ,
  name    varchar (255)           NOT NULL                            ,
  email   varchar (255)           NOT NULL                            ,
  message text                    NOT NULL                            ,
  date    varchar (255)           NOT NULL                            ,
  time    varchar (255)           NOT NULL                            ,
  gender  enum    ('h','m','nb')  NOT NULL                            ,
  number  char    (13)            NOT NULL
);

CREATE TABLE usuario (
  id        int     (11)         NOT NULL AUTO_INCREMENT PRIMARY KEY ,
  username  varchar (25)         NOT NULL                            ,
  email     varchar (255)        NOT NULL                            ,
  password  char    (15)         NOT NULL
);

CREATE TABLE produto (
  id            int     (11)                                                NOT NULL AUTO_INCREMENT PRIMARY KEY ,
  name          varchar (255)                                               NOT NULL                            ,
  desc          text                                                        NOT NULL                            ,
  price         float                                                       NOT NULL                            ,
  quantity      int                                                         NOT NULL                            ,
  brand         enum    ('FUNKO POP', 'FIGMA', 'DARK HORSE', 'TSUME ARTS')  NOT NULL                            ,
  material      enum    ('PVC', 'Vinil', 'Polystone')                       NOT NULL                            ,
  articulation  tinyint (1)                                                 NOT NULL
);

/*

  segure Alt para fazer multi seleção de linhas (quassim tá bom?)

*/