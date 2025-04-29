	
	INSERT INTO operations (op_id,op_cost,op_dur,op_name,op_desc,op_type,op_us_position)
	VALUES (NULL, '20', '50', 'Электромонтаж', 'Формовка выводов резисторов','Производственная','Сотрудник'
	);


	INSERT INTO operations (op_id,op_cost,op_dur,op_name,op_desc,op_type,op_us_position)
	VALUES (NULL, '9', '50', 'Электромонтаж', 'Устновка резисторов','Производственная','Сотрудник'
	);
	
	INSERT INTO operations (op_id,op_cost,op_dur,op_name,op_desc,op_type,op_us_position)
	VALUES (NULL, '198', '200', 'Сборка', 'Монтаж подпайков выводов VT, DD, HG, X, C','Производственная','Сотрудник'
	);
	
	INSERT INTO operations (op_id,op_cost,op_dur,op_name,op_desc,op_type,op_us_position)
	VALUES (NULL, '146', '200', 'Сборка', 'Установка выводов VT, DD, HG, X, C','Производственная','Сотрудник'
	);
	
	INSERT INTO operations (op_id,op_cost,op_dur,op_name,op_desc,op_type,op_us_position)
	VALUES (NULL, '9', '100', 'Сборка', 'Визуальный осмотр','Производственная','Сотрудник'
	);
	
	INSERT INTO operations (op_id,op_cost,op_dur,op_name,op_desc,op_type,op_us_position)
	VALUES (NULL, '39', '50', 'Пайка', 'Настройка паяльной станции','Производственная','Сотрудник'
	);
	
	INSERT INTO operations (op_id,op_cost,op_dur,op_name,op_desc,op_type,op_us_position)
	VALUES (NULL, '108', '40', 'Пайка', 'Пайка волной','Производственная','Сотрудник'
	);
	
	INSERT INTO operations (op_id,op_cost,op_dur,op_name,op_desc,op_type,op_us_position)
	VALUES (NULL, '9', '15', 'Пайка', 'Визуальный контроль качества','Производственная','Сотрудник'
	);
	
	INSERT INTO operations (op_id,op_cost,op_dur,op_name,op_desc,op_type,op_us_position)
	VALUES (NULL, '87', '100', 'Операции общего назначения', 'Отмывка','Производственная','Сотрудник'
	);

	
	INSERT INTO operations (op_id,op_cost,op_dur,op_name,op_desc,op_type,op_us_position)
	VALUES (NULL, '48', '100', 'Операции общего назначения', 'Сушка','Производственная','Сотрудник'
	);

	
	INSERT INTO operations (op_id,op_cost,op_dur,op_name,op_desc,op_type,op_us_position)
	VALUES (NULL, '150', '125', 'Технический контроль', 'Проведение испытаний','Производственная','Глава отдела'
	);

	
	INSERT INTO operations (op_id,op_cost,op_dur,op_name,op_desc,op_type,op_us_position)
	VALUES (NULL, '150', '125', 'Технический контроль', 'Сверка с теоретическими данными','Производственная','Глава отдела'
	);

	
	INSERT INTO operations (op_id,op_cost,op_dur,op_name,op_desc,op_type,op_us_position)
	VALUES (NULL, '169', '350', 'Технический контроль', 'Документирование исправного изделия','Производственная','Глава отдела'
	);

	
	INSERT INTO operations (op_id,op_cost,op_dur,op_name,op_desc,op_type,op_us_position)
	VALUES (NULL, '87', '350', 'Технический контроль', 'Документирование брака','Производственная','Глава отдела'
	);
	
	
	INSERT INTO equipment (equip_id,equip_name,equip_type,equip_op_id)
	VALUES (NULL,'Стол монтажный','Производственный','8'
	);
		
	INSERT INTO equipment (equip_id,equip_name,equip_type,equip_op_id)
	VALUES (NULL,'Стол монтажный','Производственный','9'
	);
		
	INSERT INTO equipment (equip_id,equip_name,equip_type,equip_op_id)
	VALUES (NULL,'Устновка пайки волной','Производственный','10'
	);
			
	INSERT INTO equipment (equip_id,equip_name,equip_type,equip_op_id)
	VALUES (NULL,'Устновка пайки волной','Производственный','11'
	);
			
	INSERT INTO equipment (equip_id,equip_name,equip_type,equip_op_id)
	VALUES (NULL,'Стол монтажный','Производственный','12'
	);
			
	INSERT INTO equipment (equip_id,equip_name,equip_type,equip_op_id)
	VALUES (NULL,'Промывочная ванна','Производственный','13'
	);
			
	INSERT INTO equipment (equip_id,equip_name,equip_type,equip_op_id)
	VALUES (NULL,'Сушильный шкаф','Производственный','14'
	);
			
	INSERT INTO equipment (equip_id,equip_name,equip_type,equip_op_id)
	VALUES (NULL,'Стол монтажный','Производственный','15'
	);
			
	INSERT INTO equipment (equip_id,equip_name,equip_type,equip_op_id)
	VALUES (NULL,'Стол монтажный','Производственный','16'
	);
			
	INSERT INTO equipment (equip_id,equip_name,equip_type,equip_op_id)
	VALUES (NULL,'Стол монтажный','Производственный','17'
	);
			
	INSERT INTO equipment (equip_id,equip_name,equip_type,equip_op_id)
	VALUES (NULL,'Стол монтажный','Производственный','18'
	);
			
	INSERT INTO equipment (equip_id,equip_name,equip_type,equip_op_id)
	VALUES (NULL,'Стол монтажный','Производственный','19'
	);
	
	
	INSERT INTO products (prod_id,prod_date,prod_condition,prod_name,prod_op_id)
	VALUES (NULL, '01.03.21','Выполнено','Отсортировано','3'
	);
		
	INSERT INTO products (prod_id,prod_date,prod_condition,prod_name,prod_op_id)
	VALUES (NULL, '01.03.21','Выполнено','Произведение настройки','4'
	);
		
	INSERT INTO products (prod_id,prod_date,prod_condition,prod_name,prod_op_id)
	VALUES (NULL, '01.03.21','Выполнено','Отсортировано','5'
	);
		
	INSERT INTO products (prod_id,prod_date,prod_condition,prod_name,prod_op_id)
	VALUES (NULL, '01.03.21','Выполнено','Формовка произведена','6'
	);
		
	INSERT INTO products (prod_id,prod_date,prod_condition,prod_name,prod_op_id)
	VALUES (NULL, '01.03.21','Выполнено','Установлено','7'
	);
		
	INSERT INTO products (prod_id,prod_date,prod_condition,prod_name,prod_op_id)
	VALUES (NULL, '01.03.21','Выполнено','Установлено','8'
	);
		
	INSERT INTO products (prod_id,prod_date,prod_condition,prod_name,prod_op_id)
	VALUES (NULL, '01.03.21','Выполнено','Монтад произведен','9'
	);
		
	INSERT INTO products (prod_id,prod_date,prod_condition,prod_name,prod_op_id)
	VALUES (NULL, '01.03.21','Выполнено','Осмотр','10'
	);
		
	INSERT INTO products (prod_id,prod_date,prod_condition,prod_name,prod_op_id)
	VALUES (NULL, '01.03.21','Выполнено','Настройка паяльной устновки','11'
	);
		
	INSERT INTO products (prod_id,prod_date,prod_condition,prod_name,prod_op_id)
	VALUES (NULL, '01.03.21','Выполнено','Пайка волной','12'
	);
		
	INSERT INTO products (prod_id,prod_date,prod_condition,prod_name,prod_op_id)
	VALUES (NULL, '01.03.21','Выполнено','Визуальный контроль','13'
	);
		
	INSERT INTO products (prod_id,prod_date,prod_condition,prod_name,prod_op_id)
	VALUES (NULL, '01.03.21','Выполнено','Промывка','14');
		
	INSERT INTO products (prod_id,prod_date,prod_condition,prod_name,prod_op_id)
	VALUES (NULL, '01.03.21','Выполнено','Сушка','15'
	);
		
	INSERT INTO products (prod_id,prod_date,prod_condition,prod_name,prod_op_id)
	VALUES (NULL, '01.03.21','Выполнено','Испытания','16'
	);
		
	INSERT INTO products (prod_id,prod_date,prod_condition,prod_name,prod_op_id)
	VALUES (NULL, '01.03.21','Выполнено','Сверка с теорией','17'
	);
		
	INSERT INTO products (prod_id,prod_date,prod_condition,prod_name,prod_op_id)
	VALUES (NULL, '01.03.21','Выполнено','Документирование исправного изделия','18'
	);
		
	INSERT INTO products (prod_id,prod_date,prod_condition,prod_name,prod_op_id)
	VALUES (NULL, '01.03.21','Выполнено','Документирование брака','19'
	);