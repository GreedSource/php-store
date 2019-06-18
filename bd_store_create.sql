-- Created by Vertabelo (http://vertabelo.com)
-- Last modification date: 2019-06-01 22:39:37.076

-- tables
-- Table: brand
CREATE TABLE brand (
    id_brand int NOT NULL AUTO_INCREMENT,
    name varchar(50) NOT NULL,
    img varchar(100) NOT NULL,
    active tinyint NOT NULL,
    created_at timestamp NULL,
    updated_at timestamp NULL,
    CONSTRAINT brand_pk PRIMARY KEY (id_brand)
);

-- Table: cart_item
CREATE TABLE cart_item (
    id_cart_item int NOT NULL AUTO_INCREMENT,
    id_cart int NOT NULL,
    id_product int NOT NULL,
    created_at timestamp NULL,
    updated_at timestamp NULL,
    CONSTRAINT cart_item_pk PRIMARY KEY (id_cart_item)
);

-- Table: category
CREATE TABLE category (
    id_category int NOT NULL AUTO_INCREMENT,
    name varchar(50) NOT NULL,
    active tinyint NOT NULL,
    created_at timestamp NULL,
    updated_at timestamp NULL,
    CONSTRAINT category_pk PRIMARY KEY (id_category)
);

-- Table: city
CREATE TABLE city (
    id_city int NOT NULL AUTO_INCREMENT,
    name varchar(100) NOT NULL,
    id_state int NOT NULL,
    active tinyint NOT NULL,
    created_at timestamp NULL,
    updated_at timestamp NULL,
    CONSTRAINT city_pk PRIMARY KEY (id_city)
);

-- Table: country
CREATE TABLE country (
    id_country int NOT NULL AUTO_INCREMENT,
    name varchar(100) NOT NULL,
    active tinyint NOT NULL,
    created_at timestamp NULL,
    updated_at timestamp NULL,
    CONSTRAINT country_pk PRIMARY KEY (id_country)
);

-- Table: customer_address
CREATE TABLE customer_address (
    id_address int NOT NULL AUTO_INCREMENT,
    address varchar(100) NOT NULL,
    number varchar(10) NOT NULL,
    zip_code int NOT NULL,
    id_user int NOT NULL,
    id_city int NOT NULL,
    created_at timestamp NULL,
    updated_at timestamp NULL,
    CONSTRAINT customer_address_pk PRIMARY KEY (id_address)
);

-- Table: order
CREATE TABLE `order` (
    id_order int NOT NULL AUTO_INCREMENT,
    id_user int NOT NULL,
    id_status int NOT NULL,
    id_address int NOT NULL,
    created_at timestamp NULL,
    updated_at timestamp NOT NULL,
    CONSTRAINT order_pk PRIMARY KEY (id_order)
);

-- Table: order_item
CREATE TABLE order_item (
    id_order_item int NOT NULL AUTO_INCREMENT,
    id_order int NOT NULL,
    id_product int NOT NULL,
    created_at timestamp NULL,
    updated_at timestamp NULL,
    CONSTRAINT order_item_pk PRIMARY KEY (id_order_item)
);

-- Table: order_status
CREATE TABLE order_status (
    id_status int NOT NULL AUTO_INCREMENT,
    status_name varchar(50) NOT NULL,
    created_at timestamp NULL,
    updated_at timestamp NULL,
    CONSTRAINT order_status_pk PRIMARY KEY (id_status)
);

-- Table: password_resets
CREATE TABLE password_resets (
    email varchar(100) NOT NULL,
    token varchar(100) NOT NULL,
    created_at timestamp NOT NULL,
    CONSTRAINT password_resets_pk PRIMARY KEY (email)
);

-- Table: permission
CREATE TABLE permission (
    id_permission int NOT NULL AUTO_INCREMENT,
    name varchar(25) NULL,
    description varchar(150) NULL,
    active tinyint NOT NULL,
    created_at timestamp NULL,
    updated_at timestamp NULL,
    CONSTRAINT permission_pk PRIMARY KEY (id_permission)
);

-- Table: product
CREATE TABLE product (
    id_product int NOT NULL AUTO_INCREMENT,
    description varchar(50) NOT NULL,
    price decimal(5,2) NOT NULL,
    stock int NOT NULL,
    product_img varchar(100) NOT NULL,
    active tinyint NOT NULL,
    id_brand int NOT NULL,
    id_supplier int NOT NULL,
    id_category int NOT NULL,
    created_at timestamp NULL,
    updated_at timestamp NULL,
    CONSTRAINT product_pk PRIMARY KEY (id_product)
);

-- Table: role
CREATE TABLE role (
    id_role int NOT NULL AUTO_INCREMENT,
    name varchar(30) NOT NULL,
    description varchar(150) NOT NULL,
    active tinyint NOT NULL,
    created_at timestamp NULL,
    updated_at timestamp NULL,
    CONSTRAINT role_pk PRIMARY KEY (id_role)
);

-- Table: role_permission
CREATE TABLE role_permission (
    id_role_permission int NOT NULL AUTO_INCREMENT,
    id_role int NOT NULL,
    id_permission int NOT NULL,
    created_at timestamp NULL,
    updated_at timestamp NULL,
    CONSTRAINT role_permission_pk PRIMARY KEY (id_role_permission)
);

-- Table: shopping_cart
CREATE TABLE shopping_cart (
    id_cart int NOT NULL AUTO_INCREMENT,
    id_custumer int NOT NULL,
    created_at timestamp NULL,
    updated_at timestamp NULL,
    CONSTRAINT shopping_cart_pk PRIMARY KEY (id_cart)
);

-- Table: state
CREATE TABLE state (
    id_state int NOT NULL AUTO_INCREMENT,
    name varchar(100) NOT NULL,
    active tinyint NOT NULL,
    id_country int NOT NULL,
    created_at timestamp NULL,
    updated_at timestamp NULL,
    CONSTRAINT state_pk PRIMARY KEY (id_state)
);

-- Table: supplier
CREATE TABLE supplier (
    id_supplier int NOT NULL AUTO_INCREMENT,
    supplier_short_name varchar(30) NOT NULL,
    supplier_long_name varchar(150) NOT NULL,
    address varchar(200) NOT NULL,
    active tinyint NULL,
    created_at timestamp NULL,
    updated_at timestamp NULL,
    CONSTRAINT supplier_pk PRIMARY KEY (id_supplier)
);

-- Table: user
CREATE TABLE user (
    id_user int NOT NULL AUTO_INCREMENT,
    username varchar(20) NOT NULL,
    password varchar(100) NOT NULL,
    firstname varchar(50) NOT NULL,
    lastname varchar(50) NOT NULL,
    email varchar(50) NOT NULL,
    user_img varchar(100) NOT NULL,
    active tinyint NOT NULL,
    id_role int NOT NULL,
    remember_token varchar(100) NULL,
    created_at timestamp NULL,
    updated_at timestamp NULL,
    UNIQUE INDEX user_ak_username (username),
    CONSTRAINT user_pk PRIMARY KEY (id_user)
);

-- foreign keys
-- Reference: Order_customer_address (table: order)
ALTER TABLE `order` ADD CONSTRAINT Order_customer_address FOREIGN KEY Order_customer_address (id_address)
    REFERENCES customer_address (id_address);

-- Reference: Order_user (table: order)
ALTER TABLE `order` ADD CONSTRAINT Order_user FOREIGN KEY Order_user (id_user)
    REFERENCES user (id_user);

-- Reference: cart_item_product (table: cart_item)
ALTER TABLE cart_item ADD CONSTRAINT cart_item_product FOREIGN KEY cart_item_product (id_product)
    REFERENCES product (id_product);

-- Reference: city_state (table: city)
ALTER TABLE city ADD CONSTRAINT city_state FOREIGN KEY city_state (id_state)
    REFERENCES state (id_state);

-- Reference: customer_address_city (table: customer_address)
ALTER TABLE customer_address ADD CONSTRAINT customer_address_city FOREIGN KEY customer_address_city (id_city)
    REFERENCES city (id_city);

-- Reference: customer_address_user (table: customer_address)
ALTER TABLE customer_address ADD CONSTRAINT customer_address_user FOREIGN KEY customer_address_user (id_user)
    REFERENCES user (id_user);

-- Reference: order_item_Order (table: order_item)
ALTER TABLE order_item ADD CONSTRAINT order_item_Order FOREIGN KEY order_item_Order (id_order)
    REFERENCES `order` (id_order);

-- Reference: order_item_product (table: order_item)
ALTER TABLE order_item ADD CONSTRAINT order_item_product FOREIGN KEY order_item_product (id_product)
    REFERENCES product (id_product);

-- Reference: order_item_shopping_card (table: cart_item)
ALTER TABLE cart_item ADD CONSTRAINT order_item_shopping_card FOREIGN KEY order_item_shopping_card (id_cart)
    REFERENCES shopping_cart (id_cart);

-- Reference: order_order_status (table: order)
ALTER TABLE `order` ADD CONSTRAINT order_order_status FOREIGN KEY order_order_status (id_status)
    REFERENCES order_status (id_status);

-- Reference: product_brand (table: product)
ALTER TABLE product ADD CONSTRAINT product_brand FOREIGN KEY product_brand (id_brand)
    REFERENCES brand (id_brand);

-- Reference: product_catergory (table: product)
ALTER TABLE product ADD CONSTRAINT product_catergory FOREIGN KEY product_catergory (id_category)
    REFERENCES category (id_category);

-- Reference: product_supplier (table: product)
ALTER TABLE product ADD CONSTRAINT product_supplier FOREIGN KEY product_supplier (id_supplier)
    REFERENCES supplier (id_supplier);

-- Reference: role_permission_permission (table: role_permission)
ALTER TABLE role_permission ADD CONSTRAINT role_permission_permission FOREIGN KEY role_permission_permission (id_permission)
    REFERENCES permission (id_permission);

-- Reference: role_permission_role (table: role_permission)
ALTER TABLE role_permission ADD CONSTRAINT role_permission_role FOREIGN KEY role_permission_role (id_role)
    REFERENCES role (id_role);

-- Reference: shopping_card_user (table: shopping_cart)
ALTER TABLE shopping_cart ADD CONSTRAINT shopping_card_user FOREIGN KEY shopping_card_user (id_custumer)
    REFERENCES user (id_user);

-- Reference: state_country (table: state)
ALTER TABLE state ADD CONSTRAINT state_country FOREIGN KEY state_country (id_country)
    REFERENCES country (id_country);

-- Reference: user_role (table: user)
ALTER TABLE user ADD CONSTRAINT user_role FOREIGN KEY user_role (id_role)
    REFERENCES role (id_role);

-- End of file.

