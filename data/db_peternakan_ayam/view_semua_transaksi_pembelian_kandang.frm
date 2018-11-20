TYPE=VIEW
query=select `db_peternakan_ayam`.`detail_pemasukan_ayam`.`id_detail_pemasukan_ayam` AS `id_detail_pemasukan_ayam`,`db_peternakan_ayam`.`detail_pemasukan_ayam`.`id_kandang` AS `id_kandang`,`db_peternakan_ayam`.`detail_pemasukan_ayam`.`tanggal` AS `tanggal`,`db_peternakan_ayam`.`detail_pemasukan_ayam`.`jumlah_ayam` AS `jumlah_ayam`,`db_peternakan_ayam`.`kandang`.`nama` AS `nama_kandang` from (`db_peternakan_ayam`.`kandang` join `db_peternakan_ayam`.`detail_pemasukan_ayam` on((`db_peternakan_ayam`.`detail_pemasukan_ayam`.`id_kandang` = `db_peternakan_ayam`.`kandang`.`id_kandang`))) order by `db_peternakan_ayam`.`detail_pemasukan_ayam`.`id_detail_pemasukan_ayam`
md5=ec6b96b353a01b1dc352745cde03e90e
updatable=1
algorithm=0
definer_user=root
definer_host=localhost
suid=1
with_check_option=0
timestamp=2018-11-20 16:00:30
create-version=1
source=select `detail_pemasukan_ayam`.`id_detail_pemasukan_ayam` AS `id_detail_pemasukan_ayam`,`detail_pemasukan_ayam`.`id_kandang` AS `id_kandang`,`detail_pemasukan_ayam`.`tanggal` AS `tanggal`,`detail_pemasukan_ayam`.`jumlah_ayam` AS `jumlah_ayam`,`kandang`.`nama` AS `nama_kandang` from (`kandang` join `detail_pemasukan_ayam` on((`detail_pemasukan_ayam`.`id_kandang` = `kandang`.`id_kandang`))) order by `detail_pemasukan_ayam`.`id_detail_pemasukan_ayam`
client_cs_name=utf8
connection_cl_name=utf8_general_ci
view_body_utf8=select `db_peternakan_ayam`.`detail_pemasukan_ayam`.`id_detail_pemasukan_ayam` AS `id_detail_pemasukan_ayam`,`db_peternakan_ayam`.`detail_pemasukan_ayam`.`id_kandang` AS `id_kandang`,`db_peternakan_ayam`.`detail_pemasukan_ayam`.`tanggal` AS `tanggal`,`db_peternakan_ayam`.`detail_pemasukan_ayam`.`jumlah_ayam` AS `jumlah_ayam`,`db_peternakan_ayam`.`kandang`.`nama` AS `nama_kandang` from (`db_peternakan_ayam`.`kandang` join `db_peternakan_ayam`.`detail_pemasukan_ayam` on((`db_peternakan_ayam`.`detail_pemasukan_ayam`.`id_kandang` = `db_peternakan_ayam`.`kandang`.`id_kandang`))) order by `db_peternakan_ayam`.`detail_pemasukan_ayam`.`id_detail_pemasukan_ayam`
