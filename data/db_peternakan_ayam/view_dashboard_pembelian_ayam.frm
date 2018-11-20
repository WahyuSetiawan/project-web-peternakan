TYPE=VIEW
query=select `db_peternakan_ayam`.`view_periode_transaksi`.`tahun` AS `tahun`,`db_peternakan_ayam`.`view_periode_transaksi`.`bulan` AS `bulan`,monthname(concat(`db_peternakan_ayam`.`view_periode_transaksi`.`tahun`,\'-\',`db_peternakan_ayam`.`view_periode_transaksi`.`bulan`,\'-\',1)) AS `monthname`,(select ifnull(sum(`db_peternakan_ayam`.`detail_pemasukan_ayam`.`jumlah_ayam`),0) from `db_peternakan_ayam`.`detail_pemasukan_ayam` where ((year(`db_peternakan_ayam`.`detail_pemasukan_ayam`.`tanggal`) = `db_peternakan_ayam`.`view_periode_transaksi`.`tahun`) and (month(`db_peternakan_ayam`.`detail_pemasukan_ayam`.`tanggal`) = `db_peternakan_ayam`.`view_periode_transaksi`.`bulan`))) AS `jumlah_ayam` from `db_peternakan_ayam`.`view_periode_transaksi`
md5=0392aa424ca4b959cd0f6807bbfda5c5
updatable=0
algorithm=0
definer_user=root
definer_host=localhost
suid=1
with_check_option=0
timestamp=2018-11-20 16:00:28
create-version=1
source=select `view_periode_transaksi`.`tahun` AS `tahun`,`view_periode_transaksi`.`bulan` AS `bulan`,monthname(concat(`view_periode_transaksi`.`tahun`,\'-\',`view_periode_transaksi`.`bulan`,\'-\',1)) AS `monthname`,(select ifnull(sum(`detail_pemasukan_ayam`.`jumlah_ayam`),0) from `detail_pemasukan_ayam` where ((year(`detail_pemasukan_ayam`.`tanggal`) = `view_periode_transaksi`.`tahun`) and (month(`detail_pemasukan_ayam`.`tanggal`) = `view_periode_transaksi`.`bulan`))) AS `jumlah_ayam` from `view_periode_transaksi`
client_cs_name=utf8
connection_cl_name=utf8_general_ci
view_body_utf8=select `db_peternakan_ayam`.`view_periode_transaksi`.`tahun` AS `tahun`,`db_peternakan_ayam`.`view_periode_transaksi`.`bulan` AS `bulan`,monthname(concat(`db_peternakan_ayam`.`view_periode_transaksi`.`tahun`,\'-\',`db_peternakan_ayam`.`view_periode_transaksi`.`bulan`,\'-\',1)) AS `monthname`,(select ifnull(sum(`db_peternakan_ayam`.`detail_pemasukan_ayam`.`jumlah_ayam`),0) from `db_peternakan_ayam`.`detail_pemasukan_ayam` where ((year(`db_peternakan_ayam`.`detail_pemasukan_ayam`.`tanggal`) = `db_peternakan_ayam`.`view_periode_transaksi`.`tahun`) and (month(`db_peternakan_ayam`.`detail_pemasukan_ayam`.`tanggal`) = `db_peternakan_ayam`.`view_periode_transaksi`.`bulan`))) AS `jumlah_ayam` from `db_peternakan_ayam`.`view_periode_transaksi`
