create table Endereco(
	Id int auto_increment,
	CEP varchar(9),
	TipoLog varchar(7),
	Logradouro ,
	Numero varchar(4),
	Comp,
	Bairro varchar(100),
	Cidade varchar(100),
	Estado varchar(100),
	primary key(id)
);

create table Funcionario(
	CPF varchar(11),
	Nome varchar(100),
	DataNasc date,
	Sexo char(1),
	EstCivil varchar(15),
	Cargo varchar(50)
	Especialidade varchar(50)
	Rg varchar(13),
	Endereco int,
	primary key(CPF),
	foreign key(Endereco) references Endereco(Id)
	ON DELETE NO ACTION
	ON UPDATE NO ACTION
);

create table Paciente(
	Id int auto_increment,
	Nome varchar(50),
	Telefone varchar(10),
	primary key(Id)
);

create table Agenda(
	IdAgendamento int auto_increment,
	Data date,
	Hora int,
	IdFuncionario varchar(11),
	IdPaciente int,
	foreign key(IdFuncionario) references Funcionario(CPF),
	foreign key(IdPaciente) references Paciente(Id)
);

create table Contato(
	Id int auto_increment,
	Nome varchar(50),
	Email varchar(50),
	Motivo varchar(50),
	Mensagem varchar(150),
	primary key(Id)
);

create table Usuario(
	Id int auto_increment,
	Login varchar(50),
	Senha varchar(50),
	primary key(Id)
);