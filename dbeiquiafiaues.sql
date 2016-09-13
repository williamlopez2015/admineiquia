/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     21/8/2016 9:16:55 p. m.                      */
/*==============================================================*/


drop table if exists ACCESO;

drop table if exists ACUERDOADMINISTRAT;

drop table if exists ASIGNACIONACADEMIC;

drop table if exists ASISTENCIA;

drop table if exists DEPARTAMENTO;

drop table if exists DETALLEEXPACAD;

drop table if exists DETALLEEXPADMIN;

drop table if exists EMPLEADO;

drop table if exists EXPEDIENTEACADEMIC;

drop table if exists EXPEDIENTEADMINIST;

drop table if exists EXPERIENCIALABORAL;

drop table if exists PERMISO;

drop table if exists PUESTO;

drop table if exists USER;

/*==============================================================*/
/* Table: ACCESO                                                */
/*==============================================================*/
create table ACCESO
(
   IDACCESO             int(6) not null auto_increment,
   NOMBREACCESO         varchar(50) not null,
   primary key (IDACCESO)
);

/*==============================================================*/
/* Table: ACUERDOADMINISTRAT                                    */
/*==============================================================*/
create table ACUERDOADMINISTRAT
(
   IDACUERDO            varchar(10) not null,
   MOTIVOACUERDO        varchar(50) not null,
   DESCRIPCIONACUERDO   varchar(1024) not null,
   ESTADOACUERDO        varchar(10) not null,
   FECHAACUERDO         date not null,
   primary key (IDACUERDO)
);

/*==============================================================*/
/* Table: ASIGNACIONACADEMIC                                    */
/*==============================================================*/
create table ASIGNACIONACADEMIC
(
   IDASIGNACIONACAD     int(6) not null auto_increment,
   CICLO                int,
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
   HORAENTRADA          time not null,
   HORASALIDA           time not null,
   FECHAASISTENCIA      date not null,
   OBSERVACIONES        varchar(250),
   primary key (IDASISTENCIA)
);

/*==============================================================*/
/* Table: DEPARTAMENTO                                          */
/*==============================================================*/
create table DEPARTAMENTO
(
   IDDEPARTAMENTO       varchar(5) not null,
   NOMBREDEPARTAMENTO   varchar(50) not null,
   DESCRIPCIONDEPARTA   varchar(250) not null,
   primary key (IDDEPARTAMENTO)
);

/*==============================================================*/
/* Table: DETALLEEXPACAD                                        */
/*==============================================================*/
create table DETALLEEXPACAD
(
   IDDETALLEEXPACAD     varchar(6) not null,
   IDEXPLABACADEMICA    int,
   IDASIGNACIONACAD     int,
   IDEXPEDIENTEACADEM   varchar(6),
   DESCRIPCIONDETALLEACAD varchar(255),
   primary key (IDDETALLEEXPACAD)
);

/*==============================================================*/
/* Table: DETALLEEXPADMIN                                       */
/*==============================================================*/
create table DETALLEEXPADMIN
(
   IDDETALLEADMIN       int not null,
   IDEXPEDIENTE         varchar(6),
   IDPUESTO             int,
   IDPERMISO            int,
   IDACUERDO            varchar(10),
   IDASISTENCIA         int,
   DESCRIPCIONDETALLE   varchar(0),
   primary key (IDDETALLEADMIN)
);

/*==============================================================*/
/* Table: EMPLEADO                                              */
/*==============================================================*/
create table EMPLEADO
(
   IDEMPLEADO           int(6) not null auto_increment,
   PRIMERNOMBRE         varchar(30) not null,
   SEGUNDONOMBRE        varchar(30),
   PRIMERAPELLIDO       varchar(30) not null,
   SEGUNDOAPELLIDO      varchar(30),
   DUI                  varchar(10) not null,
   NIT                  varchar(20) not null,
   ISSS                 varchar(10) not null,
   AFP                  varchar(12) not null,
   FOTO                 varchar(250),
   ESTADO               int,
   primary key (IDEMPLEADO)
);

/*==============================================================*/
/* Table: EXPEDIENTEACADEMIC                                    */
/*==============================================================*/
create table EXPEDIENTEACADEMIC
(
   IDEXPEDIENTEACADEM   varchar(6) not null,
   IDEMPLEADO           int,
   FECHAAPERTURAEXPACAD date,
   NOMBREINSTITUCION    varchar(50),
   ANOTITULACION        date,
   TITULOOBTENIDO       varchar(50),
   TITULOESTUDIO        varchar(50),
   DIRECCIONINSTITUCION varchar(50),
   primary key (IDEXPEDIENTEACADEM)
);

/*==============================================================*/
/* Table: EXPEDIENTEADMINIST                                    */
/*==============================================================*/
create table EXPEDIENTEADMINIST
(
   IDEXPEDIENTE         varchar(6) not null,
   IDEMPLEADO           int,
   FECHAAPERTURA        varchar(20) not null,
   CODIGOCONTRATO       varchar(20) not null,
   TIEMPOADICIONAL      varchar(20),
   TIEMPOINTEGRAL       varchar(20),
   primary key (IDEXPEDIENTE)
);

/*==============================================================*/
/* Table: EXPERIENCIALABORAL                                    */
/*==============================================================*/
create table EXPERIENCIALABORAL
(
   IDEXPLABACADEMICA    int(6) not null auto_increment,
   DESCRIPCIONEXPLAB    varchar(250),
   NOMBREINTITUCIONEXPLABACAD varchar(50),
   FECHAINICIOEXPLABACAD date,
   FECHAFINALIZACIONEXPLABACAD date,
   primary key (IDEXPLABACADEMICA)
);

/*==============================================================*/
/* Table: PERMISO                                               */
/*==============================================================*/
create table PERMISO
(
   IDPERMISO            int(6) not null auto_increment,
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
   IDPUESTO             int not null,
   IDDEPARTAMENTO       varchar(5),
   NOMBREPUESTO         varchar(50) not null,
   DESCRIPCIONPUESTO    varchar(250) not null,
   SALARIOPUESTO        float not null,
   primary key (IDPUESTO)
);

/*==============================================================*/
/* Table: USER                                                  */
/*==============================================================*/
create table USER
(
   IDUSUARIO            varchar(50) not null,
   IDACCESO             int,
   PASSWORD             varchar(180) not null,
   NICKNAME             varchar(50) not null,
   primary key (IDUSUARIO)
);

alter table DETALLEEXPACAD add constraint FK_TIENE_ASIGNADO foreign key (IDASIGNACIONACAD)
      references ASIGNACIONACADEMIC (IDASIGNACIONACAD) on delete restrict on update restrict;

alter table DETALLEEXPACAD add constraint FK_TIENE_SU foreign key (IDEXPEDIENTEACADEM)
      references EXPEDIENTEACADEMIC (IDEXPEDIENTEACADEM) on delete restrict on update restrict;

alter table DETALLEEXPACAD add constraint FK_TIENE_UNA foreign key (IDEXPLABACADEMICA)
      references EXPERIENCIALABORAL (IDEXPLABACADEMICA) on delete restrict on update restrict;

alter table DETALLEEXPADMIN add constraint FK_REGISTRA foreign key (IDPERMISO)
      references PERMISO (IDPERMISO) on delete restrict on update restrict;

alter table DETALLEEXPADMIN add constraint FK_SE_ASIGNA foreign key (IDACUERDO)
      references ACUERDOADMINISTRAT (IDACUERDO) on delete restrict on update restrict;

alter table DETALLEEXPADMIN add constraint FK_TIENE foreign key (IDASISTENCIA)
      references ASISTENCIA (IDASISTENCIA) on delete restrict on update restrict;

alter table DETALLEEXPADMIN add constraint FK_TIENEASIGNADO foreign key (IDPUESTO)
      references PUESTO (IDPUESTO) on delete restrict on update restrict;

alter table DETALLEEXPADMIN add constraint FK_TIENE_SU foreign key (IDEXPEDIENTE)
      references EXPEDIENTEADMINIST (IDEXPEDIENTE) on delete restrict on update restrict;

alter table EXPEDIENTEACADEMIC add constraint FK_TIENE foreign key (IDEMPLEADO)
      references EMPLEADO (IDEMPLEADO) on delete restrict on update restrict;

alter table EXPEDIENTEADMINIST add constraint FK_POSEE foreign key (IDEMPLEADO)
      references EMPLEADO (IDEMPLEADO) on delete restrict on update restrict;

alter table PUESTO add constraint FK_SE_ENCUENTRA foreign key (IDDEPARTAMENTO)
      references DEPARTAMENTO (IDDEPARTAMENTO) on delete restrict on update restrict;

alter table USER add constraint FK_POSEE foreign key (IDACCESO)
      references ACCESO (IDACCESO) on delete restrict on update restrict;

