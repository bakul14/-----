SPOOL C:\ApacheDocs\dz.bakulevskiy\sql\log\create_values.lst
PROMPT Скрипт заполнения таблиц тестовыми данными
PROMPT Бакулевский М. В. ИУ4-82Б

	PROMPT Внесение данных в таблицу users
	
	INSERT INTO users (us_id, us_login, us_password, us_permission
	, us_firstname, us_surname, us_lastname, us_position)
	VALUES (NULL, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'Администратор','Администратор','Администратор','Администратор'
	);

	INSERT INTO users (us_id, us_login, us_password, us_permission
	, us_firstname, us_surname, us_lastname, us_position)
	VALUES (NULL, 'boss', 'ceb8447cc4ab78d2ec34cd9f11e4bed2', 'boss', 'Глава отдела','Глава отдела','Глава отдела','Глава отдела'
	);

	INSERT INTO users (us_id, us_login, us_password, us_permission
	, us_firstname, us_surname, us_lastname, us_position)
	VALUES (NULL, 'employee', 'fa5473530e4d1a5a1e1eb53d2fedb10c', 'employee', 'Сотрудник1','Сотрудник1','Сотрудник1','Позиция1'
	);

	INSERT INTO users (us_id, us_login, us_password, us_permission
	, us_firstname, us_surname, us_lastname, us_position)
	VALUES (NULL, 'employee', 'fa5473530e4d1a5a1e1eb53d2fedb10c', 'employee', 'Тест','Тестович','Тесточов','Бедолага'
	);

	INSERT INTO users (us_id, us_login, us_password, us_permission
	, us_firstname, us_surname, us_lastname, us_position)
	VALUES (NULL, 'employee', 'fa5473530e4d1a5a1e1eb53d2fedb10c', 'employee', 'Абоба','Абобич','Абобов','Позция2'
	);

	INSERT INTO operations (op_id,op_cost,op_dur,op_name,op_desc,op_type,op_us_position)
	VALUES (NULL, '55', '300', 'Консервация и упаковывание', 'Вскрытие упаковки','Производственная','Сотрудник'
	);

	INSERT INTO operations (op_id,op_cost,op_dur,op_name,op_desc,op_type,op_us_position)
	VALUES (NULL, '80', '250', 'Консервация и упаковывание', 'Визуальный контроль','Производственная','Сотрудник'
	);

	INSERT INTO operations (op_id,op_cost,op_dur,op_name,op_desc,op_type,op_us_position)
	VALUES (NULL, '900', '350', 'Консервация и упаковывание', 'Сортирование','Производственная','Сотрудник'
	);

	INSERT INTO operations (op_id,op_cost,op_dur,op_name,op_desc,op_type,op_us_position)
	VALUES (NULL, '74', '50', 'Электромонтаж', 'Настройка оборудования','Производственная','Сотрудник'
	);

	INSERT INTO operations (op_id,op_cost,op_dur,op_name,op_desc,op_type,op_us_position)
	VALUES (NULL, '102', '50', 'Электромонтаж', 'Сортирование ЭРЭ и ИМС','Производственная','Сотрудник'
	);

	INSERT INTO elements (elem_id,elem_name,elem_provider,elem_nominal,elem_type,elem_op_id)
	VALUES (NULL,'Конденсатор','США', '1мкФ','Керамика','7'
	);
	INSERT INTO elements (elem_id,elem_name,elem_provider,elem_nominal,elem_type,elem_op_id)
	VALUES (NULL,'Резистор','США', '620Ом','Пленочный','8'
	);

	INSERT INTO equipment (equip_id,equip_name,equip_type,equip_op_id)
	VALUES (NULL,'Стол монтажный','Производственный','1'
	);
	INSERT INTO equipment (equip_id,equip_name,equip_type,equip_op_id)
	VALUES (NULL,'Стол монтажный','Производственный','2'
	);
	
	INSERT INTO equipment (equip_id,equip_name,equip_type,equip_op_id)
	VALUES (NULL,'Стол монтажный','Производственный','3'
	);
		
	INSERT INTO equipment (equip_id,equip_name,equip_type,equip_op_id)
	VALUES (NULL,'Стол монтажный','Производственный','4'
	);
		
	INSERT INTO equipment (equip_id,equip_name,equip_type,equip_op_id)
	VALUES (NULL,'Стол монтажный','Производственный','5'
	);
		
	INSERT INTO equipment (equip_id,equip_name,equip_type,equip_op_id)
	VALUES (NULL,'Стол монтажный','Производственный','6'
	);
		
	INSERT INTO equipment (equip_id,equip_name,equip_type,equip_op_id)
	VALUES (NULL,'Стол монтажный','Производственный','7'
	);
	
	INSERT INTO products (prod_id,prod_date,prod_condition,prod_name,prod_op_id)
	VALUES (NULL, '01.03.21','Выполнено','Вскрытая упаковка','1'
	);
	
	INSERT INTO products (prod_id,prod_date,prod_condition,prod_name,prod_op_id)
	VALUES (NULL, '01.03.21','Выполнено','Контроль произведен','2'
	);
		

	COMMIT;
SPOOL off;