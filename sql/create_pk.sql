SPOOL C:\ApacheDocs\dz.bakulevskiy\sql\log\create_pk.lst
PROMPT Скрипт создания первичных ключей
PROMPT Бакулевский М. В. ИУ4-82Б

PROMPT Удаление первичных ключей
ALTER TABLE equipment 
DROP CONSTRAINT i_equip_pk;

ALTER TABLE products 
DROP CONSTRAINT i_prod_pk;

ALTER TABLE operations
DROP CONSTRAINT i_op_pk;

ALTER TABLE elements
DROP CONSTRAINT	i_elem_pk;

ALTER TABLE users
DROP CONSTRAINT	i_users_pk;

COMMIT;

PROMPT Добавление первичного ключа в таблицу equipment
ALTER TABLE equipment ADD CONSTRAINT  i_equip_pk PRIMARY KEY (equip_id);

PROMPT Добавление первичного ключа в таблицу products
ALTER TABLE products ADD CONSTRAINT  i_prod_pk PRIMARY KEY (prod_id);

PROMPT Добавление первичного ключа в таблицу operations
ALTER TABLE operations ADD CONSTRAINT  i_op_pk PRIMARY KEY (op_id);

PROMPT Добавление первичного ключа в таблицу elements
ALTER TABLE elements ADD CONSTRAINT  i_elem_pk PRIMARY KEY (elem_id);

PROMPT Добавление первичного ключа в таблицу users
ALTER TABLE users ADD CONSTRAINT  i_users_pk PRIMARY KEY (us_id);


COMMIT;

SPOOL off;