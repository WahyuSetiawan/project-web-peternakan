<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-07-21 08:41:35 --> 404 Page Not Found: Faviconico/index
ERROR - 2019-07-21 08:41:35 --> Severity: error --> Exception: Unable to locate the model you have specified: DetailPersediaanModel /usr/share/httpd/www/system/core/Loader.php 344
ERROR - 2019-07-21 10:22:24 --> Severity: error --> Exception: Unable to locate the model you have specified: DetailPersediaanModel /usr/share/httpd/www/system/core/Loader.php 344
ERROR - 2019-07-21 12:49:52 --> 404 Page Not Found: Faviconico/index
ERROR - 2019-07-21 13:47:22 --> 404 Page Not Found: Faviconico/index
ERROR - 2019-07-21 14:02:53 --> Query error: Column 'id_supplier' in where clause is ambiguous - Invalid query: SELECT *
FROM `tb_detail_supplier_jenis`
LEFT JOIN `tb_supplier` ON `tb_supplier`.`id_supplier` = `tb_detail_supplier_jenis`.`id_supplier`
LEFT JOIN `tb_gudang` ON `tb_gudang`.`id_gudang` = `tb_detail_supplier_jenis`.`id_gudang`
WHERE 0 = ''
AND `tb_supplier`.`id_supplier` = 'SP_0001'
AND `id_supplier` != `null`
AND `id_gudang` != `null`
ERROR - 2019-07-21 14:03:19 --> Query error: Unknown column 'null' in 'where clause' - Invalid query: SELECT *
FROM `tb_detail_supplier_jenis`
LEFT JOIN `tb_supplier` ON `tb_supplier`.`id_supplier` = `tb_detail_supplier_jenis`.`id_supplier`
LEFT JOIN `tb_gudang` ON `tb_gudang`.`id_gudang` = `tb_detail_supplier_jenis`.`id_gudang`
WHERE 0 = ''
AND `tb_supplier`.`id_supplier` = 'SP_0001'
AND `tb_detail_supplier_jenis`.`id_supplier` != `null`
AND `tb_detail_supplier_jenis`.`id_gudang` != `null`
ERROR - 2019-07-21 14:03:33 --> Severity: Notice --> Undefined offset: 1 /usr/share/httpd/www/application/cache/views/d66fc62a82b907ea1c719e82b73eb330 71
ERROR - 2019-07-21 14:55:09 --> 404 Page Not Found: Faviconico/index
ERROR - 2019-07-21 16:47:01 --> Query error: Unknown column 'id' in 'where clause' - Invalid query: SELECT *
FROM `tb_supplier`
WHERE `nama` = 'Supplier 1'
AND `id` != 'Supplier 1'
 LIMIT 1
ERROR - 2019-07-21 16:48:19 --> Could not find the language line "form_validation_edit_unique"
ERROR - 2019-07-21 16:49:00 --> Severity: Notice --> Use of undefined constant a - assumed 'a' /usr/share/httpd/www/application/libraries/MY_Form_validation.php 15
ERROR - 2019-07-21 16:49:17 --> Severity: Notice --> Use of undefined constant a - assumed 'a' /usr/share/httpd/www/application/libraries/MY_Form_validation.php 15
ERROR - 2019-07-21 16:49:21 --> Severity: Notice --> Use of undefined constant a - assumed 'a' /usr/share/httpd/www/application/libraries/MY_Form_validation.php 15
ERROR - 2019-07-21 16:49:53 --> Query error: Unknown column 'id_supplierasdf' in 'where clause' - Invalid query: SELECT *
FROM `tb_supplier`
WHERE `nama` = 'a'
AND `id_supplierasdf` != 'a'
 LIMIT 1
ERROR - 2019-07-21 16:51:57 --> Query error: Unknown column 'id_supplierasdf' in 'where clause' - Invalid query: SELECT *
FROM `tb_supplier`
WHERE `nama` = 'a'
AND `id_supplierasdf` != 'SP_0001'
 LIMIT 1
ERROR - 2019-07-21 16:52:08 --> Severity: Notice --> Use of undefined constant a - assumed 'a' /usr/share/httpd/www/application/libraries/MY_Form_validation.php 16
ERROR - 2019-07-21 16:52:39 --> Severity: Notice --> Use of undefined constant a - assumed 'a' /usr/share/httpd/www/application/libraries/MY_Form_validation.php 16
ERROR - 2019-07-21 16:52:55 --> Severity: Notice --> Use of undefined constant a - assumed 'a' /usr/share/httpd/www/application/libraries/MY_Form_validation.php 16
ERROR - 2019-07-21 16:53:56 --> Could not find the language line "form_validation_edit_unique"
ERROR - 2019-07-21 17:49:01 --> Severity: Notice --> Undefined variable: supplier /usr/share/httpd/www/application/cache/views/9f3fe66d8cb8a3c6fdcfd756d24ff74f 62
ERROR - 2019-07-21 17:49:01 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/9f3fe66d8cb8a3c6fdcfd756d24ff74f 62
