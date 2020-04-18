DROP DATABASE IF EXISTS Project;
CREATE DATABASE Project;
USE Project;

CREATE TABLE Admin (
    AdminUserId VARCHAR(45) PRIMARY KEY,
    FirstName VARCHAR(45) NOT NULL,
    LastName VARCHAR(45) NOT NULL,
    Email VARCHAR(45) NOT NULL,
    Phone VARCHAR(45) NOT NULL,
    CompanyName VARCHAR(45) NOT NULL
) Engine=InnoDB;

CREATE TABLE AdminAccount(
    AdminUserId VARCHAR(45) PRIMARY KEY,
    AdminPassword VARCHAR(400) NOT NULL ,
  

    FOREIGN KEY (AdminUserID) REFERENCES Admin(AdminUserId) ON DELETE CASCADE ON UPDATE CASCADE
) Engine=InnoDB;

CREATE TABLE Title (
    JobTitleId INT PRIMARY KEY AUTO_INCREMENT, 
    JobTitleName VARCHAR(45) NOT NULL,
    AdminUserId VARCHAR(45),
    FOREIGN KEY (AdminUserId) REFERENCES Admin(AdminUserId) ON DELETE CASCADE ON UPDATE CASCADE

) Engine=InnoDB;

CREATE TABLE Availability (
    DayId INT PRIMARY KEY NOT NULL,
    DateOfWork VARCHAR(45) NOT NULL  

) Engine=InnoDB;

CREATE TABLE Shift (
    ShiftTimeId INT PRIMARY KEY NOT NULL,
    ShiftOfWork VARCHAR(45) NOT NULL
) Engine=InnoDB;

CREATE TABLE Employee (
    EmployeeUserId VARCHAR(45) PRIMARY KEY,
    FirstName VARCHAR(45) NOT NULL,
    LastName VARCHAR(45) NOT NULL,
    Email VARCHAR(45) NOT NULL,
    Phone VARCHAR(45) NOT NULL,
    JobTitleId INT,
    AdminUserId VARCHAR(45),
    FOREIGN KEY (AdminUserId) REFERENCES Admin(AdminUserId) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (JobTitleId) REFERENCES Title(JobTitleId) ON DELETE SET NULL ON UPDATE CASCADE
) Engine=InnoDB;
CREATE TABLE EmployeeAccount(
    EmployeeUserId VARCHAR(45) PRIMARY KEY,
    EmployeePassword VARCHAR(400) NOT NULL,
  

    FOREIGN KEY (EmployeeUserId) REFERENCES Employee(EmployeeUserId) ON DELETE CASCADE ON UPDATE CASCADE
) Engine=InnoDB;

CREATE TABLE AssignedShift (
    AssignedShiftId INT PRIMARY KEY AUTO_INCREMENT,
    EmployeeUserId VARCHAR(45) NOT NULL,
    Date VARCHAR(45) NOT NULL,
    ShiftTimeId INT NOT NULL, 
    FOREIGN KEY (EmployeeUserId) REFERENCES Employee (EmployeeUserId) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (ShiftTimeId) REFERENCES Shift (ShiftTimeId) ON DELETE CASCADE ON UPDATE CASCADE
) Engine=InnoDB;


CREATE TABLE EmployeeAvailable (
    EmployeeUserId VARCHAR(45) NOT NULL,
    DayId INT NOT NULL,
    ShiftTimeId INT NOT NULL,
    JobTitleId INT, 
    PRIMARY KEY (EmployeeUserId, DayId, ShiftTimeId, JobtitleId),
    FOREIGN KEY (EmployeeUserId) REFERENCES Employee (EmployeeUserId) ON DELETE CASCADE ON UPDATE CASCADE, 
    FOREIGN KEY (DayId) REFERENCES Availability (DayId) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (ShiftTimeId) REFERENCES Shift (ShiftTimeId) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (JobTitleId) REFERENCES Title (JobTitleId) ON DELETE CASCADE ON UPDATE CASCADE
) Engine=InnoDB;


insert into Admin (AdminUserId, FirstName, LastName, Email, Phone,CompanyName) values ('mpadberry0', 'Merrick', 'Padberry', 'mpadberry0@jimdo.com', '885-492-5910','Super Store');
insert into Admin (AdminUserId, FirstName, LastName, Email, Phone,CompanyName) values ('pgwillim1', 'Philomena', 'Gwillim', 'pgwillim1@drupal.org', '143-263-3313','Super Store');
insert into Admin (AdminUserId, FirstName, LastName, Email, Phone,CompanyName) values ('tglavias2', 'Tito', 'Glavias', 'tglavias2@yelp.com', '263-598-9535','Super Store');

insert into AdminAccount(AdminUserId,AdminPassword) VALUES ('mpadberry0','$2y$10$SKPlTNhQV/AMlqSQxsYDnehG/P0Y3R/kQjhlwxvULvk.9tgD5Pjua');
    insert into AdminAccount(AdminUserId,AdminPassword) VALUES ('pgwillim1','$2y$10$Eq6Pj5oP/YbJo4wuaHJ6ZOnDz9mrKm.PpdO1RbWUcRCvNg/IPWoe2');
    insert into AdminAccount(AdminUserId,AdminPassword) VALUES ('tglavias2','$2y$10$jC5bsmi4mgNkbCUe0zbNn.VHGFjssRbQKcZe8aRuDFy70qreTIkRu');


insert into Shift (ShiftTimeId, ShiftOfWork) VALUES (1,'Monrning');
insert into Shift (ShiftTimeId, ShiftOfWork) VALUES (2,'Evening');
insert into Shift (ShiftTimeId, ShiftOfWork) VALUES (3,'Night');



insert into Title (JobTitleId,AdminUserId, JobTitleName) values (1,'mpadberry0', 'Service Clerk');
insert into Title (JobTitleId,AdminUserId, JobTitleName) values (2,'mpadberry0', 'Cashier');
insert into Title (JobTitleId,AdminUserId, JobTitleName) values (3,'mpadberry0', 'Cold Bar Clerk');
insert into Title (JobTitleId,AdminUserId, JobTitleName) values (4,'mpadberry0', 'Salad Bar Clerk');
insert into Title (JobTitleId,AdminUserId, JobTitleName) values (5,'mpadberry0', 'Bakery Clerk');
insert into Title (JobTitleId,AdminUserId, JobTitleName) values (6,'mpadberry0', 'Produce Clerk');


insert into Availability (DayId, DateOfWork) VALUES (1,'Monday');
insert into Availability (DayId, DateOfWork) VALUES (2,'Tuesday');
insert into Availability (DayId, DateOfWork) VALUES (3,'Wednesday');
insert into Availability (DayId, DateOfWork) VALUES (4,'Thursday');
insert into Availability (DayId, DateOfWork) VALUES (5,'Friday');
insert into Availability (DayId, DateOfWork) VALUES (6,'Saturday');
insert into Availability (DayId, DateOfWork) VALUES (7,'Sunday');


-- ADD Employee Data
insert into Employee (EmployeeUserId, FirstName, LastName,  Email, Phone, JobtitleId, AdminUserId) values ('vwitter0', 'Veronique', 'Witter', 'vwitter0@merriam-webster.com', '615-625-1389', 1, 'mpadberry0');
insert into Employee (EmployeeUserId, FirstName, LastName,  Email, Phone, JobtitleId, AdminUserId) values ('gbrittles1', 'Giselle', 'Brittles', 'gbrittles1@blog.com', '488-743-5352', 2, 'mpadberry0');
insert into Employee (EmployeeUserId, FirstName, LastName,  Email, Phone, JobtitleId, AdminUserId) values ('dpruckner2', 'Dominic', 'Pruckner', 'dpruckner2@ted.com', '651-181-7917', 3, 'mpadberry0');
insert into Employee (EmployeeUserId, FirstName, LastName,  Email, Phone, JobtitleId, AdminUserId) values ('akitchenside3', 'Adah', 'Kitchenside', 'akitchenside3@ebay.co.uk', '305-551-8383', 4, 'pgwillim1');
insert into Employee (EmployeeUserId, FirstName, LastName,  Email, Phone, JobtitleId, AdminUserId) values ('akenforth4', 'Alair', 'Kenforth', 'akenforth4@cocolog-nifty.com', '213-711-5992', 5,'pgwillim1');
insert into Employee (EmployeeUserId, FirstName, LastName,  Email, Phone, JobtitleId, AdminUserId) values ('ecresswell5', 'Emylee', 'Cresswell', 'ecresswell5@jalbum.net', '335-710-2723', 1,'pgwillim1');
insert into Employee (EmployeeUserId, FirstName, LastName,  Email, Phone, JobtitleId, AdminUserId) values ('cricardin6', 'Colan', 'Ricardin', 'cricardin6@comsenz.com', '142-914-1403', 2,'pgwillim1');
insert into Employee (EmployeeUserId, FirstName, LastName,  Email, Phone, JobtitleId, AdminUserId) values ('pjeandeau7', 'Patrice', 'Jeandeau','pjeandeau7@g.co', '293-386-4695', 3,'tglavias2');
insert into Employee (EmployeeUserId, FirstName, LastName,  Email, Phone, JobtitleId, AdminUserId) values ('rkineton8', 'Rice', 'Kineton',  'rkineton8@soup.io', '426-960-0698', 4,'tglavias2');
insert into Employee (EmployeeUserId, FirstName, LastName,  Email, Phone, JobtitleId, AdminUserId) values ('sriglesford9', 'Sauncho', 'Riglesford', 'sriglesford9@sitemeter.com', '716-609-1262', 6,'tglavias2');



insert into EmployeeAccount(EmployeeUserId,EmployeePassword) VALUES ('vwitter0','$2y$10$Lj2vyxjhGb82kX9b/4k8YuLBVdFZ7QN/xEdQgWG3.fgiIkBvq8EKS');
    insert into EmployeeAccount(EmployeeUserId,EmployeePassword) VALUES ('gbrittles1','$2y$10$eZlq24gloAHOxTP6q./TG.tJuJ6LQmJuMZY/H8YN3whDumAvnMqGS');
    insert into EmployeeAccount(EmployeeUserId,EmployeePassword) VALUES ('dpruckner2','$2y$10$eVPQ0h1gFlYuQiAbvSeaBuSKEwKz1Vp.yLPJ6y37z3kPgYMt83rBq');
    insert into EmployeeAccount(EmployeeUserId,EmployeePassword) VALUES ('akitchenside3','$2y$10$McYtwmeFxzcEJXcFk/d8/.n2PFs2IQR6H.dR4Pn/jWE84cRIGl1wq');
    insert into EmployeeAccount(EmployeeUserId,EmployeePassword) VALUES ('akenforth4','$2y$10$VFUpM7t/Pwekgh9I1B8JXO5hbjrMotcppswUQMkZWnzHKMMtDWEdu');
    insert into EmployeeAccount(EmployeeUserId,EmployeePassword) VALUES ('ecresswell5','$2y$10$tdtnitV/mjLfeWts7q5/CuuKHWMX2h9lJ6DQfTV5wwF1nHTe34E4u');
    insert into EmployeeAccount(EmployeeUserId,EmployeePassword) VALUES ('cricardin6','$2y$10$YL1dRiipLgPbTpWCassEluS3/COfLsKDL52LwdMtiPXnTmiWTSaFC');
    insert into EmployeeAccount(EmployeeUserId,EmployeePassword) VALUES ('pjeandeau7','$2y$10$H.mrO25ki4iT48zNj6/hquoFny90BagSAyW/35CIxUUuU5fCtJcm2');
    insert into EmployeeAccount(EmployeeUserId,EmployeePassword) VALUES ('rkineton8','$2y$10$DkZZK73j0fzopj8B3LX8A.GW4OFJwuex6oSdYHWlT51wBtx1.m6Ri');
    insert into EmployeeAccount(EmployeeUserId,EmployeePassword) VALUES ('sriglesford9','$2y$10$mOMr/Wq/MkSY7OLIOZpWv.DInekCa7lzRs6im2bOyiz1.s6uGuo6G');



insert into AssignedShift (EmployeeUserId,Date,ShiftTimeId) VALUES('vwitter0','2020-04-06',1);
insert into AssignedShift (EmployeeUserId,Date,ShiftTimeId) VALUES('vwitter0','2020-04-02',1);
insert into AssignedShift (EmployeeUserId,Date,ShiftTimeId) VALUES('vwitter0','2020-04-03',2);
insert into AssignedShift (EmployeeUserId,Date,ShiftTimeId) VALUES('akitchenside3','2020-04-04',2);
insert into AssignedShift (EmployeeUserId,Date,ShiftTimeId) VALUES('akenforth4','2020-04-04',3);
insert into AssignedShift (EmployeeUserId,Date,ShiftTimeId) VALUES('ecresswell5','2020-04-03',3);
insert into AssignedShift (EmployeeUserId,Date,ShiftTimeId) VALUES('cricardin6','2020-04-02',2);
insert into AssignedShift (EmployeeUserId,Date,ShiftTimeId) VALUES('pjeandeau7','2020-04-04',2);
insert into AssignedShift (EmployeeUserId,Date,ShiftTimeId) VALUES('rkineton8','2020-04-03',1);
insert into AssignedShift (EmployeeUserId,Date,ShiftTimeId) VALUES('sriglesford9','2020-04-05',1);


insert into employeeavailable(EmployeeUserId,DayId,ShiftTimeId,jobTitleId) VALUES ('vwitter0',2,3,1);
insert into employeeavailable(EmployeeUserId,DayId,ShiftTimeId,jobTitleId) VALUES ('gbrittles1',4,1,2);
insert into employeeavailable(EmployeeUserId,DayId,ShiftTimeId,jobTitleId) VALUES ('dpruckner2',3,2,3);
insert into employeeavailable(EmployeeUserId,DayId,ShiftTimeId,jobTitleId) VALUES ('akitchenside3',4,2,4);
insert into employeeavailable(EmployeeUserId,DayId,ShiftTimeId,jobTitleId) VALUES ('akenforth4',6,1,5);
insert into employeeavailable(EmployeeUserId,DayId,ShiftTimeId,jobTitleId) VALUES ('ecresswell5',6,1,1);
insert into employeeavailable(EmployeeUserId,DayId,ShiftTimeId,jobTitleId) VALUES ('cricardin6',4,2,2);
insert into employeeavailable(EmployeeUserId,DayId,ShiftTimeId,jobTitleId) VALUES ('pjeandeau7',3,3,3);
insert into employeeavailable(EmployeeUserId,DayId,ShiftTimeId,jobTitleId) VALUES ('rkineton8',1,2,4);
insert into employeeavailable(EmployeeUserId,DayId,ShiftTimeId,jobTitleId) VALUES ('sriglesford9',3,2,6);

insert into employeeavailable(EmployeeUserId,DayId,ShiftTimeId,jobTitleId) VALUES ('vwitter0',1,2,1);
insert into employeeavailable(EmployeeUserId,DayId,ShiftTimeId,jobTitleId) VALUES ('gbrittles1',1,3,2);
insert into employeeavailable(EmployeeUserId,DayId,ShiftTimeId,jobTitleId) VALUES ('dpruckner2',3,1,3);
insert into employeeavailable(EmployeeUserId,DayId,ShiftTimeId,jobTitleId) VALUES ('akitchenside3',4,3,4);
insert into employeeavailable(EmployeeUserId,DayId,ShiftTimeId,jobTitleId) VALUES ('akenforth4',5,1,5);
insert into employeeavailable(EmployeeUserId,DayId,ShiftTimeId,jobTitleId) VALUES ('ecresswell5',3,2,1);
insert into employeeavailable(EmployeeUserId,DayId,ShiftTimeId,jobTitleId) VALUES ('cricardin6',1,2,2);
insert into employeeavailable(EmployeeUserId,DayId,ShiftTimeId,jobTitleId) VALUES ('pjeandeau7',6,2,3);
insert into employeeavailable(EmployeeUserId,DayId,ShiftTimeId,jobTitleId) VALUES ('rkineton8',1,1,4);
insert into employeeavailable(EmployeeUserId,DayId,ShiftTimeId,jobTitleId) VALUES ('sriglesford9',2,2,6);

