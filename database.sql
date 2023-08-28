# Eso viene de la diagrama de database
create table user(
    id int auto_increment not null,
    name varchar(150) not null,
    surname varchar(150) default('N/A'),
    email varchar(150) not null,
    password varchar(150) not null,
    fecha date not null,
    constraint pk_user primary key(id),
    constraint uq_email unique(email)
)ENGINE=InnoDB;

create table category(
    id int auto_increment not null,
    name varchar(150) not null,
    constraint uq_category unique(name),
    constraint pk_category primary key(id)
)ENGINE=InnoDB;

create table blog(
    id int auto_increment not null,
    user_id int not null,
    category_id int not null,
    title varchar(150) not null,
    description mediumtext,
    constraint pk_ticket primary key(id),
    constraint ticket_user foreign key(user_id) references users(id) on delete cascade,
    constraint ticket_category foreign key(category_id) references category(id) on delete cascade
)ENGINE=InnoDB;

create table ticket(
    id int auto_increment not null,
    user_id int not null,
    category_id int not null,
    title varchar(150) not null,
    description varchar(150) default('N/A'),
    constraint pk_ticket primary key(id),
    constraint ticket_user foreign key(user_id) references users(id),
    constraint ticket_category foreign key(category_id) references category(id) 
)ENGINE=InnoDB;