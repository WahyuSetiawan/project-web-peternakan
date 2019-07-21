DELIMITER $$

drop function if exists kode_barang;
create function kode_barang() returns varchar(11)
begin
	declare id INT;
	declare count_id INT;
	declare code varchar(11);
	
	select count(id) into count_id from test;
	
	IF count_id > 0 then
		set id = 2;
	else
		set id = 1;
	end if;
	
	set code = concat('00000', id + 1);
	set code = concat('KAD_', substring(code, LENGTH(code) - 3));
	
	return count_id;
end
