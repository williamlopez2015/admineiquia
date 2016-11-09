/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     28/10/2016 2:32:14 p. m.                     */
/*==============================================================*/


drop table if exists ACUERDOADMINISTRAT;

drop table if exists ASIGNACIONACADEMIC;

drop table if exists ASISTENCIA;

drop table if exists CICLO;

drop table if exists DEPARTAMENTO;

drop table if exists EMPLEADO;

drop table if exists EXPEDIENTEACADEMIC;

drop table if exists EXPEDIENTEADMINIST;

drop table if exists EXPERIENCIALABORAL;

drop table if exists PERFILPUESTO;

drop table if exists PERMISO;

drop table if exists PUESTO;

drop table if exists TIEMPOADICIONAL;

/*==============================================================*/
/* Table: ACUERDOADMINISTRAT                                    */
/*==============================================================*/
create table ACUERDOADMINISTRAT
(
   IDACUERDO            varchar(10) not null,
   IDEXPEDIENTE         varchar(6) not null,
   MOTIVOACUERDO        varchar(50) not null,
   DESCRIPCIONACUERDO   varchar(250) not null,
   ESTADOACUERDO        varchar(10) not null,
   FECHAACUERDO         varchar(14) not null,
   ARCHIVOACUERDO       varchar(250) not null,
   primary key (IDACUERDO)
);

/*==============================================================*/
/* Table: ASIGNACIONACADEMIC                                    */
/*==============================================================*/
create table ASIGNACIONACADEMIC
(
   IDASIGNACIONACAD     int(6) not null auto_increment,
   IDEXPEDIENTEACADEM   varchar(6) not null,
   IDCICLO              int not null,
   ANO                  varchar(10),
   CODASIGNATURA        varchar(6),
   NOMBREASIGNATURA     varchar(50),
   GTEORIO              int,
   GDISCUSION           int,
   GLABORATORIO         int,
   TIEMPOTOTAL          int,
   RESPONSABILIDADADMIN varchar(50),
   primary key (IDASIGNACIONACAD)
);

/*==============================================================*/
/* Table: ASISTENCIA                                            */
/*==============================================================*/
create table ASISTENCIA
(
   IDASISTENCIA         int(6) not null auto_increment,
   IDEXPEDIENTE         varchar(6) not null,
   HORAENTRADA          time not null,
   HORASALIDA           time not null,
   FECHAASISTENCIA      date not null,
   OBSERVACIONES        varchar(250),
   primary key (IDASISTENCIA)
);

/*==============================================================*/
/* Table: CICLO                                                 */
/*==============================================================*/
create table CICLO
(
   IDCICLO              int not null auto_increment,
   NOMBRECICLO          char(10) not null,
   primary key (IDCICLO)
);

/*==============================================================*/
/* Table: DEPARTAMENTO                                          */
/*==============================================================*/
create table DEPARTAMENTO
(
   IDDEPARTAMENTO       int not null auto_increment,
   NOMBREDEPARTAMENTO   varchar(50) not null,
   DESCRIPCIONDEPARTA   varchar(250) not null,
   primary key (IDDEPARTAMENTO)
);

/*==============================================================*/
/* Table: EMPLEADO                                              */
/*==============================================================*/
create table EMPLEADO
(
   IDEMPLEADO           int(6) not null auto_increment,
   FOTO                 varchar(250),
   PRIMERNOMBRE         varchar(30) not null,
   SEGUNDONOMBRE        varchar(30),
   PRIMERAPELLIDO       varchar(30) not null,
   SEGUNDOAPELLIDO      varchar(30) not null,
   DUI                  varchar(10) not null,
   NIT                  varchar(20) not null,
   ISSS                 varchar(10) not null,
   AFP                  varchar(12) not null,
   ESTADO               int not null,
   SEXO                 varchar(1) not null,
   primary key (IDEMPLEADO)
);

/*==============================================================*/
/* Table: EXPEDIENTEACADEMIC                                    */
/*==============================================================*/
create table EXPEDIENTEACADEMIC
(
   IDEXPEDIENTEACADEM   varchar(6) not null,
   IDEMPLEADO           int not null,
   FECHAAPERTURAEXPACAD varchar(12) not null,
   NOMBREINSTITUCION    varchar(50),
   ANOTITULACION        varchar(12),
   TITULOOBTENIDO       varchar(50),
   TITULOESTUDIO        varchar(50),
   DIRECCIONINSTITUCION varchar(50),
   DESCRIPCIONACADEMICA varchar(250),
   primary key (IDEXPEDIENTEACADEM)
);

/*==============================================================*/
/* Table: EXPEDIENTEADMINIST                                    */
/*==============================================================*/
create table EXPEDIENTEADMINIST
(
   IDEXPEDIENTE         varchar(6) not null,
   IDEMPLEADO           int not null,
   IDPUESTO             int not null,
   FECHAAPERTURA        varchar(20) not null,
   CODIGOCONTRATO       varchar(20) not null,
   TIEMPOINTEGRAL       bool not null,
   DESCRIPCIONADMIN     varchar(250),
   primary key (IDEXPEDIENTE)
);

/*==============================================================*/
/* Table: EXPERIENCIALABORAL                                    */
/*==============================================================*/
create table EXPERIENCIALABORAL
(
   IDEXPLABACADEMICA    int(6) not null auto_increment,
   IDEXPEDIENTEACADEM   varchar(6) not null,
   DESCRIPCIONEXPLAB    varchar(250) not null,
   NOMBREINSTITUCIONEXPLABACAD varchar(50) not null,
   FECHAINICIOEXPLABACAD varchar(12) not null,
   FECHAFINALIZACIONEXPLABACAD varchar(12) not null,
   primary key (IDEXPLABACADEMICA)
);

/*==============================================================*/
/* Table: PERFILPUESTO                                          */
/*==============================================================*/
create table PERFILPUESTO
(
   IDPERFILPUESTO       int not null auto_increment,
   PROFESION            varchar(250) not null,
   REPORTA              varchar(100) not null,
   SUSTITUTO            varchar(150) not null,
   RELACIONES           varchar(150) not null,
   RESPONSABILIDADES    longtext not null,
   SUSTITUYE            varchar(50) not null,
   primary key (IDPERFILPUESTO)
);

/*==============================================================*/
/* Table: PERMISO                                               */
/*==============================================================*/
create table PERMISO
(
   IDPERMISO            int(6) not null auto_increment,
   IDEXPEDIENTE         varchar(6) not null,
   FECHAPERMISO         date,
   MOTIVOPERMISO        varchar(50),
   DESCRIPCIONPERMISO   varchar(250),
   ESTADOPERMISO        varchar(10),
   TIEMPOSOLICITADO     varchar(10),
   GOCESUELDO           varchar(10),
   primary key (IDPERMISO)
);

/*==============================================================*/
/* Table: PUESTO                                                */
/*==============================================================*/
create table PUESTO
(
   IDPUESTO             int not null auto_increment,
   IDDEPARTAMENTO       int not null,
   IDPERFILPUESTO       int not null,
   NOMBREPUESTO         varchar(50) not null,
   DESCRIPCIONPUESTO    varchar(250) not null,
   SALARIOPUESTO        float not null,
   primary key (IDPUESTO)
);

/*==============================================================*/
/* Table: TIEMPOADICIONAL                                       */
/*==============================================================*/
create table TIEMPOADICIONAL
(
   IDTIEMPO             int not null auto_increment,
   IDEXPEDIENTE         varchar(6) not null,
   IDCICLO              int not null,
   FECHAINICIO          varchar(12) not null,
   FECHAFIN             varchar(12) not null,
   DESCRIPCION          varchar(250) not null,
   primary key (IDTIEMPO)
);

alter table ACUERDOADMINISTRAT add constraint FK_FK_EXPEDIENTEACAD_ACUERDADMIN foreign key (IDEXPEDIENTE)
      references EXPEDIENTEADMINIST (IDEXPEDIENTE) on delete restrict on update restrict;

alter table ASIGNACIONACADEMIC add constraint FK_FK_CICLO_ASIGNACIONACAD foreign key (IDCICLO)
      references CICLO (IDCICLO) on delete restrict on update restrict;

alter table ASIGNACIONACADEMIC add constraint FK_FK_EXPEDIENTEACAD_ASIGNACAD foreign key (IDEXPEDIENTEACADEM)
      references EXPEDIENTEACADEMIC (IDEXPEDIENTEACADEM) on delete restrict on update restrict;

alter table ASISTENCIA add constraint FK_FK_EXPEDIENTEADMIN_ASISTENCIA foreign key (IDEXPEDIENTE)
      references EXPEDIENTEADMINIST (IDEXPEDIENTE) on delete restrict on update restrict;

alter table EXPEDIENTEACADEMIC add constraint FK_FK_EMPLEADO_EXPEDIENTEACAD foreign key (IDEMPLEADO)
      references EMPLEADO (IDEMPLEADO) on delete restrict on update restrict;

alter table EXPEDIENTEADMINIST add constraint FK_FK_EMPLEADO_EXPEDIENTEADMIN foreign key (IDEMPLEADO)
      references EMPLEADO (IDEMPLEADO) on delete restrict on update restrict;

alter table EXPEDIENTEADMINIST add constraint FK_FK_PUESTO_EXPEDIENTEADMIN foreign key (IDPUESTO)
      references PUESTO (IDPUESTO) on delete restrict on update restrict;

alter table EXPERIENCIALABORAL add constraint FK_FK_EXPEDIENTEACAD_EPXLABACAD foreign key (IDEXPEDIENTEACADEM)
      references EXPEDIENTEACADEMIC (IDEXPEDIENTEACADEM) on delete restrict on update restrict;

alter table PERMISO add constraint FK_FK_EXPEDIENTEADMIN_PERMISO foreign key (IDEXPEDIENTE)
      references EXPEDIENTEADMINIST (IDEXPEDIENTE) on delete restrict on update restrict;

alter table PUESTO add constraint FK_FK_DEPARTAMENTO_PUESTO foreign key (IDDEPARTAMENTO)
      references DEPARTAMENTO (IDDEPARTAMENTO) on delete restrict on update restrict;

alter table PUESTO add constraint FK_FK_PERFILPUESTO_PUESTO foreign key (IDPERFILPUESTO)
      references PERFILPUESTO (IDPERFILPUESTO) on delete restrict on update restrict;

alter table TIEMPOADICIONAL add constraint FK_FK_CICLO_TIEMPOADICIONAL foreign key (IDCICLO)
      references CICLO (IDCICLO) on delete restrict on update restrict;

alter table TIEMPOADICIONAL add constraint FK_FK_EXPEDIENTEADMIN_TIEMPOADICIONAL foreign key (IDEXPEDIENTE)
      references EXPEDIENTEADMINIST (IDEXPEDIENTE) on delete restrict on update restrict;

