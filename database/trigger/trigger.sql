drop trigger if exists trigger_before_insert_pembelian;

DELIMITER $$
create trigger trigger_before_insert_pembelian
before insert on tb_detail_pembelian_ayam for each row begin 
	set @count = 0;
	set @id = function_id_group_transaksi();
    set @oldid = "";
    
	select jumlah, id_detail_group_transaksi into @count, @oldid from view_stok_ayam where id_kandang = NEW.id_kandang;
    
    if @count > 0 then
		set @id = @oldid;
	else
		insert into tb_detail_group_transaksi (id_detail_group_transaksi) values (@id);
    end if;
    
    set NEW.id_detail_group_transaksi = @id;
end $$

show triggers;