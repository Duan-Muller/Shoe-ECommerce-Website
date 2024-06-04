create table shoes
(
    shoe_id    int auto_increment
        primary key,
    brand      varchar(50)      null,
    model      varchar(100)     null,
    size       int              null,
    color      varchar(35)      null,
    price      decimal(10, 2)   null,
    image_path varchar(255)     null,
    quantity   int              null,
    gender     text default 'M' not null
);

create table users
(
    id       int auto_increment
        primary key,
    name     varchar(30)                            not null,
    surname  varchar(30)                            not null,
    email    varchar(100)                           not null,
    password varchar(255)                           not null,
    usertype varchar(5) default 'user'              not null,
    joined   date       default current_timestamp() not null
);

create table cart_items
(
    cart_id    int auto_increment
        primary key,
    user_id    int            not null,
    shoe_id    int            not null,
    color      varchar(50)    not null,
    size       int            not null,
    price      decimal(10, 2) not null,
    quantity   int            not null,
    image_path varchar(255)   not null,
    constraint cart_items_ibfk_1
        foreign key (user_id) references users (id),
    constraint cart_items_ibfk_2
        foreign key (shoe_id) references shoes (shoe_id)
);

create index shoe_id
    on cart_items (shoe_id);

create index user_id
    on cart_items (user_id);

create table orders
(
    order_id    int auto_increment
        primary key,
    user_id     int                                  not null,
    full_name   varchar(100)                         not null,
    email       varchar(100)                         not null,
    address     text                                 not null,
    city        varchar(100)                         not null,
    province    varchar(100)                         not null,
    zip_code    varchar(20)                          not null,
    total_price decimal(10, 2)                       not null,
    order_date  datetime default current_timestamp() not null,
    constraint orders_ibfk_1
        foreign key (user_id) references users (id)
);

create table order_items
(
    order_item_id int auto_increment
        primary key,
    order_id      int            not null,
    shoe_id       int            not null,
    color         varchar(50)    not null,
    size          varchar(10)    not null,
    quantity      int            not null,
    price         decimal(10, 2) not null,
    constraint order_items_ibfk_1
        foreign key (order_id) references orders (order_id),
    constraint order_items_ibfk_2
        foreign key (shoe_id) references shoes (shoe_id)
);

create index order_id
    on order_items (order_id);

create index shoe_id
    on order_items (shoe_id);

create index user_id
    on orders (user_id);

INSERT INTO shoes (brand, model, size, color, price, image_path, quantity, gender) VALUES
    ('Nike', 'Air Max 90', 9, 'Black/White', 1999.99, 'img/nike_air_max_90_black_white.jpg', 50, 'M'),
    ('Adidas', 'Superstar', 8, 'White/Black', 1499.99, 'img/adidas_superstar_white_black.jpg', 30, 'M'),
    ('Converse', 'Chuck Taylor All Star', 7, 'Red', 1299.99, 'img/converse_chuck_taylor_red.jpg', 20, 'F'),
    ('Nike', 'Air Force 1', 10, 'White', 1899.99, 'img/nike_air_force_1_white.jpg', 40, 'M'),
    ('Adidas', 'Stan Smith', 8, 'Green', 1599.99, 'img/adidas_stan_smith_green.jpg', 25, 'F'),
    ('Converse', 'All Star Ox', 9, 'Navy', 1399.99, 'img/converse_all_star_ox_navy.jpg', 35, 'M'),
    ('Nike', 'React Element 55', 9, 'Blue', 2099.99, 'img/nike_react_element_55_blue.jpg', 30, 'M'),
    ('Adidas', 'NMD R1', 10, 'Black', 1799.99, 'img/adidas_nmd_r1_black.jpg', 20, 'M'),
    ('Converse', 'Chuck 70', 8, 'White', 1699.99, 'img/converse_chuck_70_white.jpg', 15, 'M'),
    ('Nike', 'Air Jordan 1', 9, 'Black/Red', 2399.99, 'img/nike_air_jordan_1_black_red.jpg', 25, 'M'),
    ('Adidas', 'UltraBoost', 8, 'Black', 2199.99, 'img/adidas_ultraboost_black.jpg', 30, 'M'),
    ('Converse', 'Chuck Taylor Lift', 7, 'White', 1599.99, 'img/converse_chuck_taylor_lift_white.jpg', 40, 'F'),
    ('Nike', 'Air Zoom Pegasus 38', 10, 'Grey/Blue', 1899.99, 'img/nike_air_zoom_pegasus_38_grey_blue.jpg', 20, 'M'),
    ('Adidas', 'Yeezy Boost 350 V2', 9, 'Cream', 5999.99, 'img/adidas_yeezy_boost_350_v2_cream.jpg', 10, 'M'),
    ('Converse', 'One Star Ox', 8, 'Pink', 1499.99, 'img/converse_one_star_ox_pink.jpg', 15, 'F'),
    ('Nike', 'Air Max 90', 8, 'Black/Grey', 1999.99, 'img/nike_air_max_90_black_grey.jpg', 50, 'M'),
    ('Adidas', 'Superstar', 7, 'White/Blue', 1499.99, 'img/adidas_superstar_white_blue.jpg', 30, 'F'),
    ('Converse', 'Chuck Taylor All Star', 6, 'Green', 1299.99, 'img/converse_chuck_taylor_green.jpg', 20, 'F'),
    ('Nike', 'Air Force 1', 9, 'Black', 1899.99, 'img/nike_air_force_1_black.jpg', 40, 'M'),
    ('Adidas', 'Stan Smith', 9, 'Red', 1599.99, 'img/adidas_stan_smith_red.jpg', 25, 'F'),
    ('Converse', 'All Star Ox', 8, 'Grey', 1399.99, 'img/converse_all_star_ox_grey.jpg', 35, 'M'),
    ('Nike', 'React Element 55', 8, 'Purple', 2099.99, 'img/nike_react_element_55_purple.jpg', 30, 'M'),
    ('Adidas', 'NMD R1', 9, 'Blue/Black', 1799.99, 'img/adidas_nmd_r1_blue_black.jpg', 20, 'M'),
    ('Converse', 'Chuck 70', 7, 'Black', 1699.99, 'img/converse_chuck_70_black.jpg', 15, 'M'),
    ('Nike', 'Air Jordan 1', 8, 'White/Red', 2399.99, 'img/nike_air_jordan_1_white_red.jpg', 25, 'M'),
    ('Adidas', 'UltraBoost', 7, 'Grey', 2199.99, 'img/adidas_ultraboost_grey.jpg', 30, 'M'),
    ('Converse', 'Chuck Taylor Lift', 6, 'Blue', 1599.99, 'img/converse_chuck_taylor_lift_blue.jpg', 40, 'F'),
    ('Nike', 'Air Zoom Pegasus 38', 9, 'Black', 1899.99, 'img/nike_air_zoom_pegasus_38_black.jpg', 20, 'M'),
    ('Adidas', 'Yeezy Boost 350 V2', 8, 'Beige', 5999.99, 'img/adidas_yeezy_boost_350_v2_beige.jpg', 10, 'M'),
    ('Converse', 'One Star Ox', 7, 'Yellow', 1499.99, 'img/converse_one_star_ox_yellow.jpg', 15, 'M'),
    ('Reebok', 'Noice', 12, 'Red', 200.00, './img/image.png', 12, 'M');