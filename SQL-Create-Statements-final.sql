DROP DATABASE IF EXISTS 17ac3d20;

CREATE DATABASE 17ac3d20;

USE 17ac3d20;

SET FOREIGN_KEY_CHECKS = 0;

CREATE TABLE IF NOT EXISTS Organisation
(OrganisationID integer(10) NOT NULL AUTO_INCREMENT, OrganisationName char(20) NOT NULL, Address char(30), Revenue float(5), 
PRIMARY KEY (OrganisationID));

CREATE TABLE IF NOT EXISTS Department
(DepartmentID integer(10) NOT NULL AUTO_INCREMENT, HeadOfOffice char(255) NOT NULL, Budget float(10), PhoneNo integer(10), OrganisationID integer(10) NOT NULL,
PRIMARY KEY (DepartmentID), 
FOREIGN KEY(OrganisationID) REFERENCES Organisation(OrganisationID));

CREATE TABLE IF NOT EXISTS Staff
(StaffID integer(10)NOT NULL AUTO_INCREMENT, Firstname char(15), Surname char(15), HouseNo char(255), Street char(255), City char(255), Postcode char(10), Country char(255), DateOfBirth date, Email char(255), PhoneNumber integer(11), JobTitle char(20), Salary integer(10), ContractHours integer(10), vPassword char(255), DepartmentID integer(10), SupervisorID integer(10)NOT NULL, 
PRIMARY KEY (StaffID),
FOREIGN KEY (DepartmentID) REFERENCES Department(DepartmentID),
FOREIGN KEY (SupervisorID) REFERENCES Staff (StaffID));

CREATE TABLE IF NOT EXISTS Supplier
(SupplierID integer(10) NOT NULL AUTO_INCREMENT, CompanyName char(20), Specialisation char(20), HouseNumber integer(4), Postcode char(6), StreetName char(20), ContactNumber integer(10),
PRIMARY KEY (SupplierID));

CREATE TABLE IF NOT EXISTS SupplyOrder
(SupplyOrderId integer(10)NOT NULL AUTO_INCREMENT, TotalCost float(10), TimePlaced timestamp, ExpectedDeliveryDate timestamp, ActualDeliveryDate timestamp, SupplierID integer(10) NOT NULL, StaffID integer(10) NOT NULL,
PRIMARY KEY (SupplyOrderID),
FOREIGN KEY (SupplierID) REFERENCES Supplier(SupplierID),
FOREIGN KEY (StaffID) REFERENCES Staff(StaffID));

CREATE TABLE IF NOT EXISTS SupplyOrderBundle
(SupplyOrderBundleID integer(10)NOT NULL AUTO_INCREMENT, WholesalePrice float(10), AmountOrdered integer(10), SupplyOrderID integer(10), ProductID integer(10) NOT NULL,
PRIMARY KEY (SupplyOrderBundleID),
FOREIGN KEY (SupplyOrderID) REFERENCES SupplyOrder(SupplyOrderID),
FOREIGN KEY (ProductID) REFERENCES Product(ProductID));

CREATE TABLE IF NOT EXISTS Product
(ProductID integer(10)NOT NULL AUTO_INCREMENT, ProductName char(20), Description char(255), SalePrice float(10), Stock integer(10), Image blob, ImageURL char(255), MartialArt char(10), ClothingCategory char(10), DepartmentID integer(10) NOT NULL,
PRIMARY KEY (ProductID),
FOREIGN KEY (DepartmentID) REFERENCES Department(DepartmentID));

CREATE TABLE IF NOT EXISTS Customer
(CustomerID integer(10)NOT NULL AUTO_INCREMENT, Firstname char(20), Surname char(20), HouseNo integer(4), Street char(30), City char(20), Postcode char(7), Country char(20), DoB date, PreviousOrders integer(10), vUsername char(30), vPassword char(30), Phonenumber char(15), Email char(50),
PRIMARY KEY (CustomerID));

CREATE TABLE IF NOT EXISTS PaymentCard
(PaymentCardID integer(10)NOT NULL AUTO_INCREMENT, CustomerNumber integer(10), CardNumber integer(16), SortCode integer(6), SecurityNumber integer(3), Type char(15), CustomerID integer(10) NOT NULL,
PRIMARY KEY (PaymentCardID),
FOREIGN KEY (CustomerID) REFERENCES Customer(CustomerID));

CREATE TABLE IF NOT EXISTS CustomerOrder
(CustomerOrderID integer(10)NOT NULL AUTO_INCREMENT, TotalCost float(10), TimePlaced timestamp, ExpectedDeliveryDate timestamp, ActualDeliveryDate timestamp, CarrierName char(20), ShippingCost float(10), StaffID integer(10) NOT NULL, CustomerID integer(10) NOT NULL,
PRIMARY KEY (CustomerOrderID),
FOREIGN KEY (StaffID) REFERENCES Staff (StaffID),
FOREIGN KEY (CustomerID) REFERENCES Customer(CustomerID));

CREATE TABLE IF NOT EXISTS OrderItemBundle
(OrderItemBundleID integer(10)NOT NULL AUTO_INCREMENT, Quantity integer(10), SubTotal float(10), ProductID integer(10), CustomerOrderID integer(10) NOT NULL,
PRIMARY KEY (OrderItemBundleID),
FOREIGN KEY (CustomerOrderID) REFERENCES CustomerOrder(CustomerOrderID),
FOREIGN KEY (ProductID) REFERENCES Product(ProductID));

CREATE VIEW CustomerView AS
SELECT vUsername, Firstname, Surname, HouseNo, Street, City, Postcode, Country, DoB, PreviousOrders, Phonenumber, Email
FROM customer;

CREATE VIEW  EmployeeDetails AS
SELECT StaffID, Firstname, Surname, DateOfBirth, Email, PhoneNumber, JobTitle, Salary, ContractHours, HouseNo, Street, City, Postcode, Country
FROM Staff;

CREATE VIEW ProductListView AS
SELECT ProductID, ProductName, SalePrice, ImageURL, ClothingCategory, MartialArt
FROM product
WHERE Stock > 0;

CREATE VIEW ProductDetailView AS
SELECT ProductID, Description, SalePrice, Stock, ImageURL
FROM product
WHERE Stock > 0;