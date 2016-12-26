SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS Warehouse, Supplier, SupplierMobileNumber, Product, Located_In, SalesRepres, SalesRepresMobileNumber, Customer, CustomerMobileNumber, Serves, Orders, Lists;

CREATE TABLE Warehouse (
WarehouseName varchar(100),
Address varchar(255) NOT NULL,
PRIMARY KEY(WarehouseName)
);
CREATE TABLE Supplier (
Name varchar(100),
Address varchar(255) NOT NULL,
PRIMARY KEY(Name)
);
CREATE TABLE SupplierMobileNumber (
SName varchar(100),
MobileNumber varchar(15) NOT NULL,
PRIMARY KEY(SName),
FOREIGN KEY(SName) REFERENCES Supplier(Name) ON DELETE CASCADE ON UPDATE CASCADE
);
CREATE TABLE Product (
SerialNumber int,
Name varchar(100),
Price int NOT NULL,
SName varchar(100),
PRIMARY KEY (SerialNumber),
FOREIGN KEY (SName) REFERENCES Supplier(Name) ON DELETE Set Null ON UPDATE CASCADE
);
CREATE TABLE Located_In(
WarehouseN varchar(100),
SerialNumber int,
Count int,
PRIMARY KEY (WarehouseN,SerialNumber),
FOREIGN KEY (WarehouseN) REFERENCES Warehouse(WarehouseName) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY (SerialNumber) REFERENCES Product(SerialNumber) ON DELETE RESTRICT ON UPDATE CASCADE
);
CREATE TABLE SalesRepres(
S_ID int,
Name varchar(100) NOT NULL,
PRIMARY KEY(S_ID)
);
CREATE TABLE SalesRepresMobileNumber(
S_ID int,
MobileNumber int NOT NULL,
PRIMARY KEY(S_ID),
FOREIGN KEY(S_ID) REFERENCES SalesRepres(S_ID) ON DELETE CASCADE ON UPDATE CASCADE
);
CREATE TABLE Customer (
CID int,
Name varchar(100) NOT NULL,
Address varchar(255) NOT NULL,
PRIMARY KEY (CID)
);
CREATE TABLE CustomerMobileNumber(
CID int,
MobileNumber int NOT NULL,
PRIMARY KEY(CID),
FOREIGN KEY(CID) REFERENCES Customer(CID) ON DELETE CASCADE ON UPDATE CASCADE
);
CREATE TABLE Serves (
S_ID int,
CID int,
PRIMARY KEY (S_ID,CID),
FOREIGN KEY(S_ID) REFERENCES SalesRepres(S_ID) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY(CID) REFERENCES Customer(CID) ON DELETE CASCADE ON UPDATE CASCADE
);
CREATE TABLE Orders(
OrderNumber int,
Date Timestamp NOT NULL,
CID int,
PRIMARY KEY (OrderNumber),
FOREIGN KEY (CID) REFERENCES Customer(CID) ON DELETE RESTRICT ON UPDATE CASCADE
);
CREATE TABLE Lists(
OrderNumber int,
SerialNumber int,
Quantity int,
PRIMARY KEY (OrderNumber,SerialNumber),
FOREIGN KEY(OrderNumber) REFERENCES Orders(OrderNumber) ON DELETE RESTRICT ON UPDATE CASCADE,
FOREIGN KEY(SerialNumber) REFERENCES Product(SerialNumber) ON DELETE RESTRICT ON UPDATE CASCADE
);

SET FOREIGN_KEY_CHECKS = 1;