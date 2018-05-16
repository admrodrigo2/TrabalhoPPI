create table Funcionario(
	cpf varchar(11),
	nome varchar(100),
	dataNasc date,
	sexo char(1),
	estCivil varchar(15),
	cargo varchar(50),
	especialidade varchar(50),
	rg varchar(13),
	primary key(cpf)
);

create table Endereco(
	id int auto_increment,
	cep varchar(9),
	tipoLog varchar(7),
	logradouro varchar(50),
	numero varchar(4),
	comp varchar(30),
	bairro varchar(100),
	cidade varchar(100),
	estado varchar(100),
	funcionario varchar(11),
	primary key(id),
	foreign key(funcionario) references Funcionario(cpf)
);

create table Paciente(
	id int auto_increment,
	nome varchar(50),
	telefone varchar(10),
	primary key(id)
);

create table Agenda(
	idAgendamento int auto_increment,
	`data` date,
	hora int,
	idFuncionario varchar(11),
	idPaciente int,
    primary key(idAgendamento),
	foreign key(idFuncionario) references Funcionario(cpf),
	foreign key(idPaciente) references Paciente(id)
);

create table Contato(
	id int auto_increment,
	nome varchar(50),
	email varchar(50),
	motivo varchar(50),
	mensagem varchar(150),
	primary key(id)
);

create table Usuario(
	id int auto_increment,
	login varchar(50),
	senha varchar(50),
	primary key(id)
);
