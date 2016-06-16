create table agency (
    id varchar(4) not null,
    name varchar(100) not null,
	seq int,
    primary key (id)
) Engine=InnoDB;

create table discipline (
    id int unsigned not null auto_increment,
    name varchar(100) not null,
    category_name varchar(100) not null,
    value double,
    sheet int,
    agency_id varchar(4) not null,
    primary key(id)
) Engine=InnoDB;

create table sub_discipline (
    id int unsigned not null auto_increment,
    name varchar(100) not null,
    percent double,
    discipline_id int unsigned not null,
    primary key(id)
) Engine=InnoDB;

alter table discipline add constraint fk_discipline foreign key (agency_id) references agency(id);

alter table sub_discipline add constraint fk_sub_discipline foreign key (discipline_id) references discipline(id);

create table log (
  id int unsigned not null auto_increment,
  `datetime` datetime,
  filename varchar(100),
  status varchar(100),
  agency_id varchar(4) not null,
  primary key(id)
) ENGINE=InnoDB;

create table answer (
  id int unsigned not null auto_increment,
  `datetime` datetime,
  qno int unsigned,
  answer varchar(100),
  optional varchar(100),
  agency_id varchar(4) not null,
  PRIMARY KEY (id)
) ENGINE=InnoDB;

alter table log add constraint fk_log foreign key (agency_id) references agency(id);
alter table answer add constraint fk_answer foreign key (agency_id) references agency(id);

create table category_config (
  id int unsigned not null auto_increment,
  name varchar(100),
  int seq,
  primary key(id)
) ENGINE=InnoDB;

create table discipline_config (
  id int unsigned not null auto_increment,
  name varchar(100),
  int seq,
  primary key(id)
) ENGINE=InnoDB;




