SPOOL C:\ApacheDocs\dz.bakulevskiy\sql\log\create_fk.lst
PROMPT Скрипт создания внешних ключей
PROMPT Бакулевский М. В. ИУ4-82Б

PROMPT Удаление внешних ключей

ALTER TABLE equipment
DROP CONSTRAINT equip_op_id_fk;

ALTER TABLE products
DROP CONSTRAINT prod_op_id_fk;

ALTER TABLE operations
DROP CONSTRAINT op_us_position_fk;

ALTER TABLE elements
DROP CONSTRAINT elem_op_id_fk;

COMMIT;

PROMPT Добавление внешнего в таблицу equipment
ALTER TABLE equipment ADD CONSTRAINT  equip_op_id_fk FOREIGN KEY (equip_op_id) REFERENCES operations (op_id) ON DELETE CASCADE;

PROMPT Добавление внешнего в таблицу products
ALTER TABLE products ADD CONSTRAINT  prod_op_id_fk FOREIGN KEY (prod_op_id) REFERENCES operations (op_id) ON DELETE CASCADE;

PROMPT Добавление внешнего в таблицу elements
ALTER TABLE elements ADD CONSTRAINT  elem_op_id_fk FOREIGN KEY (elem_op_id) REFERENCES operations (op_id) ON DELETE CASCADE;

PROMPT Добавление внешнего в таблицу operaions
ALTER TABLE operations ADD CONSTRAINT  op_us_position_fk FOREIGN KEY (op_us_position) REFERENCES users (us_position);


COMMIT;

SPOOL off;